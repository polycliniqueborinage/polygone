<?php
require("./init.php");

  if (!isset($_SESSION['userid'])) {
	{
	    $template->assign("loginerror", 0);
	    $template->display("login.tpl");
	    die();
	}

	// get data from POST and GET
	$action = getArrayVal($_GET, "action");
	$id = getArrayVal($_GET, "id");
	$mid = getArrayVal($_GET, "mid");
	$mode = getArrayVal($_GET, "mode");

	$mainclasses = array("user" => "user_active", "management" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);

	$mainmenu = array("menu" => "","agenda" => "","profil" => "", "message" =>"active");
	$template->assign("mainmenu", $mainmenu);
	
	$msg = new message();
	$objmilestone = (object) new milestone();

	$thefile = getArrayVal($_POST, "mode");
	$numfiles = getArrayVal($_POST, "numfiles");
	$userfile = getArrayVal($_POST, "userfiles");
	$tags = getArrayVal($_POST, "tags");
	$message = getArrayVal($_POST, "text");
	$title = getArrayVal($_POST, "title");
	$mid_post = getArrayVal($_POST, "mid");
	$text = getArrayVal($_POST, "text");
	$milestone = getArrayVal($_POST,"milestone");

	$project = array('ID' => $id);
	$template->assign("project", $project);
	
	switch ($action) {
		case "addform":
    		$template->display("addmessageform.tpl");
		break;
		case "add":
			
			$tagobj = new tags();
		    $tags = $tagobj->formatInputTags($tags);
		    // add message
		
		    $themsg = $msg->add($id, $title, $message, $tags, $userid, $username, 0, $milestone);
		
			die();
			
		    if ($themsg)
		    {
		        if ($thefiles > 0)
		        {
		            // if upload files are set, upload and attach
		            $msg->attachFile($thefiles, $themsg);
		        } elseif ($thefiles == 0 and $numfiles > 0)
		        {
		            // else just attach existing file
		            $msg->attachFile(0, $themsg, $id);
		        }
		        $loc = $url . "managemessage.php?action=showproject&id=$id&mode=added";
		       header("Location: $loc");
		
		    }
		break;
		case "editform":
			$title = $langfile['editmessage'];
		    $template->assign("title", $title);
		    // get the message to edit
		    $message = $msg->getMessage($mid);
		    $template->assign("message", $message);
		    $template->display("editmessageform.tpl");
   		break;
		case "edit":
			$tagobj = new tags();
		    $tags = $tagobj->formatInputTags($tags);
		    // edit the msg
		    if ($msg->edit($mid_post, $title, $text, $tags))
		    {
		        if ($redir)
		        {
		            $redir = $url . $redir;
		            header("Location: $redir");
		        }
		        else
		        {
		            $loc = $url . "managemessage.php?action=showproject&id=$id&mode=edited";
		            header("Location: $loc");
		        }
		    }			
		break;
		case "del":
			if ($msg->del($mid))
		    {
		    	//if a redir target is given, redirect to it. else redirect to standard target.
		        if ($redir)
		        {
		            $redir = $url . $redir;
		            header("Location: $redir");
		        }
		        else
		        {
		            $loc = $url . "managemessage.php?action=showproject&id=$id&mode=deleted";
		            header("Location: $loc");
		        }
		    }			
		break;
		case "replyform":
			$title = $langfile['reply'];
		    $template->assign("title", $title);
		    $myfile = new datei();
		    $ordner = $myfile->getProjectFiles($id, 1000);
		    $message = $msg->getMessage($mid);
		    $template->assign("message", $message);
		    $template->assign("files", $ordner);
		    $template->display("replyform.tpl");
  		break;
		case "reply":
		    $tagobj = new tags();
		    $tags = $tagobj->formatInputTags($tags);
		    $themsg = $msg->add($id, $title, $message, $tags, $userid, $username, $mid_post);
		    if ($themsg)
		    {
		        if ($thefiles > 0)
		        {
		            $msg->attachFile($thefiles, $themsg);
		        } elseif ($thefiles == 0 and $numfiles > 0)
		        {
		            $msg->attachFile(0, $themsg, $id);
		        }
		        $loc = $url . "managemessage.php?action=showmessage&mid=$mid_post&id=$id&mode=replied";
		        header("Location: $loc");
		    }
		break;
  		case "mymsgs":
		    $project = new project();
		    $myfile = new datei();
		    $myprojects = $project->getMyProjects($userid);
		    $cou = 0;
		    $messages = array();
		    foreach($myprojects as $proj)
		    {
		        $message = $msg->getProjectMessages($proj[0]);
		        $ordner = $myfile->getProjectFiles($proj[0], 1000);
				$milestones = $objmilestone->getProjectMilestones($proj[0], 10000);
				$myprojects[$cou]["milestones"] = $milestones;
		        $myprojects[$cou]["messages"] = $message;
		        $myprojects[$cou]["files"] = $ordner;
		        $cou = $cou + 1;
		    }
		    $title = $langfile['messages'];
		    $template->assign("title", $title);
		    $template->assign("myprojects", $myprojects);
		    $template->display("template_mymessages.tpl");
		break;
		case "showproject":
		    //get all messages of this project
		    $messages = $msg->getProjectMessages($id);
		
			//get project's name
			$myproject = new project();
		    $pro = $myproject->getProject($id);
		    $projectname = $pro['name'];
		    $template->assign("projectname", $projectname);
		
			//get the page title
			$title = $langfile['messages'];
		    $template->assign("title", $title);
		
		    if (!empty($messages))
		    {
		        $mcount = count($messages);
		    }
		    else
		    {
		        $mcount = 0;
		    }
		    //get files of the project
		    $datei = new datei();
		    $thefiles = $datei->getProjectFiles($id);
		
		    $milestones = $objmilestone->getProjectMilestones($id, 10000);
		    
		    $template->assign("milestones", $milestones);
		    $template->assign("projectname", $projectname);
		    $template->assign("files", $thefiles);
		    $template->assign("messages", $messages);
		    $template->assign("messagenum", $mcount);
		    $template->display("projectmessages.tpl");
    break;
	case "showmessage":
	//get the message and it's replies
    $message = $msg->getMessage($mid);
    $replies = $msg->getReplies($mid);

    $myproject = new project();
    $pro = $myproject->getProject($id);
    $myfile = new datei();
    $ordner = $myfile->getProjectFiles($id);

    $projectname = $pro['name'];
    $title = $langfile['message'];


    $template->assign("projectname", $projectname);
    $template->assign("title", $title);
    $template->assign("mode", $mode);
    $template->assign("message", $message);
    $template->assign("ordner", $ordner);
    $template->assign("replies", $replies);
    $template->display("message.tpl");
    break;
	}



?>