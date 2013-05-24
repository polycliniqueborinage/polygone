<?php
/*
* @author Melih Onvural
* @package Collabtive
* @name Importer
* @version 0.4.6
* @link http://www.o-dyn.de
* @license http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt (LGPLv2.1)
*
*/

class importer
{
	private $peopleHash;
	private $mylog;
	public $projectCount;
	public $peopleCount;
	public $taskCount;
	public $msgCount;
	public $milesCount;


	function __construct()
    {
		$this->mylog = new mylog;
		$this->peopleHash = array( );
		$this->projectCount  = 0;
		$this->peopleCount  = 0;
		$this->taskCount  = 0;
		$this->msgCount  = 0;
	}

	function checkUploadFile($upload_file)
    {
		$err_upload = 1;

		$temporary_name = $upload_file["tmp_name"];

		if (is_uploaded_file($temporary_name))
        {
			$rc = move_uploaded_file($temporary_name, "files/upload/{$upload_file['name']}");

			if (!$rc)
            {
					$err_upload = "Sorry something went wrong with your upload.";
			}

		}
		else
        {
			// some error occurred: handle it
			switch ($upload_file["error"])
			{
			case 1: // file too big (based on php.ini)
			case 2: // file too big (based on MAX_FILE_SIZE)
				$err_upload = "Sorry file too big.";
				break;
			case 3: // file only partially uploaded
			case 4: // no file was uploaded
			case 6: // missing a temporary folder
			case 7: // failed to write to disk (only in PHP 5.1+)
				$err_upload = "Sorry failed to upload - problem with server.";
				break;
			}
		}

		return $err_upload;
	}

	/*
	* Imports the result of a Basecamp Project Export file
	*
	* @param
	*/
	function importBasecampXmlFile($upload_file)
    {
		$file = simplexml_load_file($upload_file);

		$this->addPeople($file->firm->people);
		$this->addProjects($file->projects);
	}

	private function addMessages($project_id, $messagesArray)
    {
		$addMessage = new message();
		$userObj = new user();

		foreach($messagesArray->{'post'} as $message)
        {
			$title = $message->{'title'};
			$text = $message->{'body'};
			$uid = $message->{'author-id'};
			$user = $this->peopleHash["$uid"];
			$userProfile = $userObj->getProfile($user);
			$username = $userProfile["name"];

			if($addMessage->add($project_id, $title, $text, "", $user, $username, 0))
			{
			++$this->msgCount;
			}
		}
	}

	private function addMilestones($project_id, $milestonesArray)
    {
		$milestonesHash = array();
		$addMilestone = new milestone();

		foreach($milestonesArray->{'milestone'} as $milestone)
        {
			$name = $milestone->{'title'};
			$desc = $name;
			$end = $milestone->{'deadline'};
		//	$status = $milestone->completed != "completed" ? 0 : 1;

			$status = 1;
			if($milestone->{'completed'} == "completed")
			{
				$status = 0;
			}

			$mid = $addMilestone->add($project_id, $name, $desc, $end, $status);

			if ($mid) {
				$iid = "".$milestone->id;
				$milestonesHash[$iid] = $mid;
				++$this->milesCount;
			}
		}

		return $milestonesHash;
	}

	private function addPeople($peopleArray)
    {
		$user = new user();

		foreach($peopleArray->person as $person) {
			$company = 0; //note that this should be updated when company becomes a used object

			$isAdmin = 1;

			if($person->{'administrator'} == "true")
			{
				$isAdmin = 5;
			}
			elseif($person->{'client-id'} != 0)
			{
				$isAdmin = 0;
			}

			$username = $person->{'user-name'};
			$email = $person->{'email-address'};
			$pass = $email;

			$uid = $user->add($username, $email, $company, $pass, $isAdmin);

			if($uid) {
				$iid = "".$person->{'id'};
				$this->peopleHash[$iid] = $uid;
				++$this->peopleCount;
			}
		}
	}

	private function addProjects($projectsArray)
    {
		$addProject = new project();

		foreach($projectsArray->project as $project)
        {
			$name = $project->{'name'};
			$desc = $name;
			$start = $project->{'created-on'};

			//get the
			$uid = $project->{'participants'}->{'person'};
			$user = $this->peopleHash["$uid"];

			$status = 1;
			if($project->{'status'} != "active")
			{
				$status = 0;
			}

			$project_id = $addProject->AddFromBasecamp($name, $desc, $start, $status);

			if($project_id)
            {
				$addProject->assign($user,$project_id);
				$milestonesHash = $this->addMilestones($project_id, $project->{'milestones'});
				$this->addTasks($project_id, $milestonesHash, $project->{'todo-lists'});
				$this->addMessages($project_id, $project->{'posts'});
				++$this->projectCount;
				//need to add timetracker information
			}
		}
	}

	private function addTasks($project_id, $milestonesHash, $taskListArray)
    {
		$addTaskList = new tasklist();
		$addTask = new task();

		foreach($taskListArray->{'todo-list'} as $taskList)
        {

			$name = $taskList->{'name'};

			if(isset($milestonesHash))
            {
				$mid = $taskListArray->{'milestone-id'};
				if(strlen($mid) > 0)
				{
					$milestoneId = $milestonesHash["$mid"];
				}
				else
				{
					$milestoneId = 0;
				}
			}

			$desc = $taskListArray->{'description'};
			$access = 0;
			$tasklistId = $addTaskList->add_liste($project_id, $name, $desc, $access, $milestoneId);

			foreach($taskList->{'todo-items'}->{'todo-item'} as $todo)
            {
				//$end = strtotime("+1 month", strtotime($todo->{'created-on'}));
				$end = strtotime($todo->{'created-on'} . " +1month");
				$title = $todo->{'content'};
				$text = $title;
				$uid = $todo->{'responsible-party-id'};
				$assigned = $this->peopleHash["$uid"];

				//class.task::add() needed to be modified to pass a timestamp directly.
				if($addTask->add($end, $title, $text, $tasklistId, $assigned, $project_id))
				{
				++$this->taskCount;
				}
			}
		}
	}
}
?>