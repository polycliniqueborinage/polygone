<?php

	require("./init.php");

	if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
	
	// get data from POST and GET
	$action = getArrayVal($_GET, "action");
	$mode = getArrayVal($_GET, "mode");
	$id = getArrayVal($_GET, "id");
	$mid = getArrayVal($_GET, "mid");

	$mainclasses = array("user" => "user_active", "management" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);

	$mainmenu = array("menu" => "","agenda" => "","profil" => "", "message" =>"active");
	$template->assign("mainmenu", $mainmenu);
	
	$msg = new message();
	$group = new group();
	
	$thefile = getArrayVal($_POST, "mode");
	$numfiles = getArrayVal($_POST, "numfiles");
	$userfile = getArrayVal($_POST, "userfiles");
	$tags = getArrayVal($_POST, "tags");
	$message = getArrayVal($_POST, "text");
	$title = getArrayVal($_POST, "title");
	$mid_post = getArrayVal($_POST, "mid");
	$text = getArrayVal($_POST, "text");
	$milestone = getArrayVal($_POST,"milestone");

	$group = array('ID' => $id);
	$template->assign("group", $group);
	
	switch ($action) {
		case "addform":
    		$template->display("addmessageform.tpl");
		break;
		case "add":
			$tagobj = new tags();
		    $tags = $tagobj->formatInputTags($tags);
		    // add message
		    
		    $themsg = $msg->add($id, $title, $message, $tags, $userid, $username, 0, $milestone);
		
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
		        $loc = $url . "user_message.php?action=showgroup&id=$id&mode=added";
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
		            $loc = $url . "user_message.php?action=showgroup&id=$id&mode=edited";
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
		            $loc = $url . "user_message.php?action=showgroup&id=$id&mode=deleted";
		            header("Location: $loc");
		        }
		    }			
		break;
		
		
		case "replyform":
			$title = $langfile['navigation_title_user_message_view_reply'];
		    $myfile = new datei();
		    $ordner = $myfile->getGroupFiles($id, 1000);
		    $message = $msg->getMessage($mid);

		    $template->assign("message", $message);
		    $template->assign("files", $ordner);
		    $template->assign("title", $title);

		   $template->display("template_replyform.tpl");
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
		        $loc = $url . "user_message.php?action=showmessage&mid=$mid_post&id=$id&mode=replied";
		        header("Location: $loc");
		    }
		break;
		

		
		case "showgroup":
		    $messages = $msg->getGroupMessages($id);
		    $pro = $group->getGroup($id);
		    $groupname = $pro['name'];
			$title = $langfile['navigation_title_user_message_view_group'];
		    if (!empty($messages))  {
		        $mcount = count($messages);
		    } else {
		        $mcount = 0;
		    }
		    //get files of the group
		    $datei = new datei();
		    $thefiles = $datei->getGroupFiles($id);
		
		    $template->assign("title", $title);
		    $template->assign("groupname", $groupname);
		    $template->assign("files", $thefiles);
		    $template->assign("messages", $messages);
		    $template->assign("messagenum", $mcount);

		    $template->display("template_groupmessages.tpl");
   		break;
    
		case "showmessage":
			    $message = $msg->getMessage($mid);
			    $replies = $msg->getReplies($mid);
			    $pro = $group->getGroup($id);
			    $myfile = new datei();
			    $ordner = $myfile->getGroupFiles($id);
			    $groupname = $pro['name'];
			    $title = $langfile['navigation_title_user_message_view_detail'];
			
			    $template->assign("title", $title);
			    $template->assign("groupname", $groupname);
			    $template->assign("mode", $mode);
			    $template->assign("message", $message);
			    $template->assign("ordner", $ordner);
			    $template->assign("replies", $replies);

			    $template->display("template_message.tpl");
	    break;
    
		default:
		    $myfile = new datei();
		    $mygroups = $group->getMyGroups($userid);
		    $cou = 0;
		    $messages = array();
		    foreach($mygroups as $proj)
		    {
		        $message = $msg->getGroupMessages($proj[0]);
		        $ordner = $myfile->getGroupFiles($proj[0], 1000);
				$mygroups[$cou]["messages"] = $message;
		        $mygroups[$cou]["files"] = $ordner;
		        $cou = $cou + 1;
		    }
		    $title = $langfile['navigation_title_user_message_view'];

		    $template->assign("title", $title);
		    $template->assign("mygroups", $mygroups);
		    
		    $template->display("template_mymessages.tpl");
		break;
		    
    
	}



?>
