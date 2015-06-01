<?php

	require("./init.php");

	$action = getArrayVal($_GET, "action");
	$id = getArrayVal($_GET, "id");
	$mode = getArrayVal($_GET, "mode");
	
	if ($action != "login" and $action != "login_bckg" and $action != "logout") {
		if (!isset($_SESSION['userid'])) {
			$locale = getArrayVal($_GET, "locale");
			if (!empty($locale)){
			    $_SESSION['userlocale'] = $locale;
			} else {
			    $locale = $_SESSION['userlocale'];
			}
			if (empty($locale))  {
		    	$locale = "en";
			}
		    
			$template->assign("locale", $locale);
		    $template->config_dir = "./language/$locale/";
			
		    $template->display("template_login.tpl");
		    die();
		}
	}

	$mainclasses = array("user" => "user_active", "management_current" => "management", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);

	$mainmenu = array("menu" => "active","agenda" => "","profil" => "", "message" =>"");
	$template->assign("mainmenu", $mainmenu);

	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass);
	}
	else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	$mylog = new mylog();
	$user = (object) new user();
	$group = new group();
	$msg = new messages();
	$mtask = new task();
	
/* open/reduce message boxs
if (getArrayVal($_COOKIE, "messagecookie")) {
    $messagetyle = "display:" . $_COOKIE['messagecookie'];
    $template->assign("messagetyle", $messagetyle);
    $messageclass = "win_" . $_COOKIE['messagecookie'];
	$template->assign("messageclass", $messageclass);
}
else {
    $messageclass = "win_block";
	$template->assign("messageclass", $messageclass);
}*/

	switch ($action) {
		
		case "login":
			
			// todo regenerate ID
		    $mode = getArrayVal($_GET, "openid_mode");
		    $username = getArrayVal($_POST, "username");
		    $pass = getArrayVal($_POST, "pass");
		    // openid validation
		    if ($mode == "id_res") {
		        $openid = new openid();
		        $openid->SetIdentity($_GET['openid_identity']);
		        $openid_validation_result = $openid->ValidateWithServer();
		        if ($openid_validation_result == true)
		        {
		            $name = getArrayVal($_REQUEST,"openid_sreg_fullname");
		            $lang = getArrayVal($_REQUEST,"openid_sreg_language");
		            $email = getArrayVal($_REQUEST,"openid_sreg_email");
		            // try to login using openid username w/o Pass
		            if ($user->login($name, ""))
		            {
		                $loc = $url . "index.php?mode=login";
		                header("Location: $loc");
		            }
		            else
		            {
		                // if user doesnt exist, create it and log it in
		                if ($user->add($name, $email, 0, "", 1, $lang))
		                {
		                    if ($user->login($name, ""))
		                    {
		                        $loc = $url . "index.php?mode=login";
		                        header("Location: $loc");
		                    }
		                }
		            }
		        }
		        else
		        {
		            $template->assign("loginerror", 1);
		            $template->display("login.tpl");
		        }
		    }
		    else {
		        // normal login
		        if ($user->login($username, $pass)) {
		            $loc = $url . "user_menu.php";
		            header("Location: $loc");
		        }
		        else
		        {
		            // openid
		            if (empty($pass) and stristr($username, "http"))
		            {
		                $openid = new openid();
		                $openid->SetIdentity($username);
		                $url = substr($url, 0, strlen($url)-1);
		                $openid->SetTrustRoot($url);
		                $openid->SetRequiredFields(array('email', 'fullname'));
		                $openid->SetOptionalFields(array('language', 'timezone'));
		                if ($openid->GetOpenIDServer())
		                {
		                    $openid->SetApprovedURL($url . "/manageuser.php?action=login"); // Send Response from OpenID server to this script
		                    $openid->Redirect(); // This will redirect user to OpenID Server
		                }
		            }
		            else
		            {
		                $template->assign("loginerror", 1);
		                $template->display("template_login.tpl");
		            }
		        }
		    }
	    break;
	    
	    case "login_bckg":
			
			// todo regenerate ID
		    $mode = getArrayVal($_GET, "openid_mode");
		    $username = getArrayVal($_GET, "username");
		    $pass = getArrayVal($_GET, "pass"); 
		    // openid validation
		    if ($mode == "id_res") {
		        $openid = new openid();
		        $openid->SetIdentity($_GET['openid_identity']);
		        $openid_validation_result = $openid->ValidateWithServer();
		        if ($openid_validation_result == true)
		        {
		            $name = getArrayVal($_REQUEST,"openid_sreg_fullname");
		            $lang = getArrayVal($_REQUEST,"openid_sreg_language");
		            $email = getArrayVal($_REQUEST,"openid_sreg_email");
		            // try to login using openid username w/o Pass
		            if ($user->login($name, ""))
		            {
		                $loc = $url . "index.php?mode=login";
		                header("Location: $loc");
		            }
		            else
		            {
		                // if user doesnt exist, create it and log it in
		                if ($user->add($name, $email, 0, "", 1, $lang))
		                {
		                    if ($user->login($name, ""))
		                    {
		                        $loc = $url . "index.php?mode=login";
		                        header("Location: $loc");
		                    }
		                }
		            }
		        }
		        else
		        {
		            $template->assign("loginerror", 1);
		            $template->display("login.tpl");
		        }
		    }
		    else { 
		        // normal login
		        if ($user->login($username, $pass)) {
		            //$loc = $url . "user_menu.php";
		            $loc = $url."management_sumehr.php?action=load_analyse";
		        	header("Location: $loc");
		        }
		        else
		        {
		            // openid
		            if (empty($pass) and stristr($username, "http"))
		            {
		                $openid = new openid();
		                $openid->SetIdentity($username);
		                $url = substr($url, 0, strlen($url)-1);
		                $openid->SetTrustRoot($url);
		                $openid->SetRequiredFields(array('email', 'fullname'));
		                $openid->SetOptionalFields(array('language', 'timezone'));
		                if ($openid->GetOpenIDServer())
		                {
		                    $openid->SetApprovedURL($url . "/manageuser.php?action=login"); // Send Response from OpenID server to this script
		                    $openid->Redirect(); // This will redirect user to OpenID Server
		                }
		            }
		            else
		            {
		                $template->assign("loginerror", 1);
		                $template->display("template_login.tpl");
		            }
		        }
		    }
	    break;

	    
		case "logout":
		    if ($user->logout()) {
		        header("Location: user_menu.php");
		    }
	    break;
	    
		case "newcal":
			
		    $thisd = date("j");
		    $thism = date("n");
		    $thisy = date("Y");

		    $m = getArrayVal($_GET, "m");
		    $y = getArrayVal($_GET, "y");
		    if (!$m) {
		        $m = $thism;
		    }
		    if (!$y) {
		        $y = $thisy;
		    }
		
		    $nm = $m + 1;
		    $pm = $m -1;
		    if ($nm > 12) {
		        $nm = 1;
		        $ny = $y + 1;
		    }  else {
		        $ny = $y;
		    }
		    if ($pm < 1) {
		        $pm = 12;
		        $py = $y-1;
		    } else {
		        $py = $y;
		    }
		
		    $today = date("d");
		
		    $calobj = new calendar();
		    $cal = $calobj->getCal($m, $y, $userid);
		    $weeks = $cal->calendar;
		    // print_r($weeks);
		    $mstring = strtolower(date('F', mktime(0, 0, 0, $m, 1, $y)));
		    $mstring = $langfile[$mstring];
		    
		    $template->assign("mstring", $mstring);
		
		    $template->assign("m", $m);
		    $template->assign("y", $y);
		    $template->assign("thism", $thism);
		    $template->assign("thisd", $thisd);
		    $template->assign("thisy", $thisy);
		    $template->assign("nm", $nm);
		    $template->assign("pm", $pm);
		    $template->assign("ny", $ny);
		    $template->assign("py", $py);
		    $template->assign("weeks", $weeks);
		    $template->display("template_calbody.tpl");
	    break;

	    default:
	    	
	    	$title = $langfile["navigation_title_user_menu"];
	    	$today = date("d");
	    	
	    	$tasks = $mtask->getAllMyProjectTasks($userid, 100);
	    	$sort = array();
			foreach($etasks as $etask) {
 	   			array_push($sort, $etask["daysleft"]);	
			}
			array_multisort($sort, SORT_NUMERIC, SORT_ASC, $tasks);
			
			$mygroups = $group->getMyGroups($userid);
			$messages = array();
			$cou = 0;
			if (!empty($mygroups))	{
			    foreach($mygroups as $proj)
			    {
			        $msgs = $msg->getGroupMessages($proj[0]);
			        if (!empty($msgs))
			        {
			            array_push($messages, $msgs);
			        }
			        $cou = $cou + 1;
			    }
			}
			if (!empty($messages)){
			    $messages = reduceArray($messages);
			}
			
			$groupnum = count($mygroups);
			$msgnum = count($messages);
			if ($tasks  != false) $tasknum = count ($tasks); else $tasknum = O ;
			$onlinelist = $user->getOnlinelist();
			
			$template->assign("mode", $mode);
			$template->assign("title", $title);
			$template->assign("onlinelist", $onlinelist);
			$template->assign("today", $today);
			$template->assign("tasks", $tasks);
			$template->assign("tasknum", $tasknum);
			$template->assign("mygroups", $mygroups);
			$template->assign("groupnum", $groupnum);
			$template->assign("messages", $messages);
			$template->assign("msgnum", $msgnum);
			
			$template->display("template_user_menu.tpl");    		
	}
	    
?>
