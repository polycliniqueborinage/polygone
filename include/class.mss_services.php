<?php
/**
 * Provides methods to interact with user groups
 *
 * @name user
 * @version 0.4.7
 * @package Collabtive
 */
class mss_services
{
    public $mylog;

    
    /**
     * Konstruktor
     * Initialisiert den Eventlog
     */
    function __construct()
    {
        $this->mylog = new mylog;
    }
    
    function getPendingTasksUser($manager){
    	
    	$tasks = array();
    	
    	//time stuff
        $timemanagement	= (object) new timemanagement();
    	
		$sql = "SELECT 	ua.requestid							as requestid, 
						ua.absence_id 							as absence_id, 
						ua.begda								as begda, 
						ua.endda								as endda, 
						ua.beghr								as beghr, 
						ua.endhr								as endhr, 
						ua.comment								as textcomment, 
						ua.status								as status_id, 
						wf.id									as wf_id, 
						wf.description	 						as status_description, 
						wf.next_status	 						as nextstatus, 
						ua.user_id								as requester,
						ab.type									as typehd, 
						concat(u.firstname, ' ', u.familyname) 	as requester_name 
				FROM user_absences ua, workflow wf, user u, absences ab 
				WHERE wf.id          =  ab.wf_id 
				AND   wf.status		 =  ua.status 
				AND   ab.groupe 	 =  u.timegroupe 
				AND   ab.id  		 =  ua.absence_id 
				AND   u.ID    		 =  ua.user_id 
				AND   ua.owner	 	 =  '$manager'
				AND ( wf.next_status <> '' AND wf.next_status <> '1' )
				ORDER BY begda DESC";

		$absences = array();
	    $sel = mysql_query($sql);
        while ($absence = mysql_fetch_array($sel)) {
		  	
	        $absence["requestid"] 	 		= stripslashes($absence["requestid"]);
        	$absence["absence_id"] 	 		= stripslashes($absence["absence_id"]);
	        $absence["type"] 				= "abs";
	        $absence["typehd"] 				= $absence["typehd"];
        	$absence["begda"] 				= stripslashes(date("d-m-Y", strtotime($absence["begda"])));
	        $absence["endda"]  				= stripslashes(date("d-m-Y", strtotime($absence["endda"])));
	        $absence["beghr"] 				= stripslashes($absence["beghr"]);
	        $absence["endhr"] 				= stripslashes($absence["endhr"]);
	        $absence["nb_hours"]			= $timemanagement->getNbHours($absence["endhr"], $absence["beghr"]);
	        if($absence["nb_hours"] == 0){
	        	if($absence["begda"] == $absence["endda"])
	        		$absence["nb_hours"] = 1;
	        	else
	        		$absence["nb_hours"] = abs(strtotime($absence["endda"]) - strtotime($absence["begda"]))/(24*60*60) + 1;

	        	$absence["typehd"] 				= 'D';	
	        }
	        $absence["comment"]  			= stripslashes($absence["textcomment"]);
	        $absence["wf_id"] 				= stripslashes($absence["wf_id"]);
	        $absence["status"] 				= stripslashes($absence["status_id"]);
	        $absence["status_description"]	= stripslashes($absence["status_description"]);
	        $absence["nextstatus"]			= stripslashes($absence["nextstatus"]);
	        $absence["requester"] 			= stripslashes($absence["requester"]);
	        $absence["requester_name"] 		= stripslashes($absence["requester_name"]);
	        array_push($absences, $absence);
        }
        
        $tasks = $absences;
        //end time stuff
        
        //insert here other kind of requests - !! do not forget to insert type of tasks
        
        if (!empty($tasks)) {	
            return $tasks;
        }
        else {
            return false;
        }
    }
    
    function getWFStatus($wf_id, $status){
    	$sql = "SELECT
				id,
				status,
				description,
				action,
				next_status 
				FROM workflow
				WHERE id 	 = '$wf_id'
				AND   status = '$status'";

	    $sel = mysql_query($sql);
        $status = mysql_fetch_array($sel);
		  	
        $status["id"]			= stripslashes($status["id"]);
        $status["status"]		= stripslashes($status["status"]);
        $status["description"]	= stripslashes($status["description"]);
        $status["action"]		= stripslashes($status["action"]);
        $status["nextstatus"]	= stripslashes($status["nextstatus"]);
        
        
        if (!empty($status)) {	
            return $status;
        }
        else {
            return false;
        }
    }	

	 /* Make a search
     *
     * @param value
     * @return array
     */
    function modulesearch($id,$value,$limit) {
    
    	$workschedule 	= (object) new workschedule();
    	
    	if ($id!='undefined' && $id!='undefined' && $id!= null)
			$sql = "SELECT * FROM user WHERE ID='$id'";
		else
			$sql = "SELECT * FROM user WHERE ( lower(concat(familyname, ' ' ,firstname)) regexp '$value' OR lower(concat(firstname, ' ' ,familyname)) regexp '$value' OR lower(name) regexp '$value' ) Limit $limit";
		
		$sel = mysql_query($sql);

        $users = array();

        while ($user = mysql_fetch_array($sel)) {
        	$user["name"] 			= stripslashes($user["name"]);
            $user["firstname"] 		= stripslashes($user["firstname"]);
            $user["familyname"] 	= stripslashes($user["familyname"]);
        	
            $user["wsr"] = $workschedule->get_detailed_wsr($user["wsr_id"]);
            
            array_push($users, $user);
        }

        if (!empty($users))  {	
            return $users;
        }
        else  {
            return false;
        }

    }   
    
}

?>
