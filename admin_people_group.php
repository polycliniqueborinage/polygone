<?php

	require("./init.php");

  if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
	
	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['admin_people_group_adminstate']== null || $adminstate < $modules['admin_people_group_adminstate']) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
		
	$action = getArrayVal($_GET, "action");
	$mode = getArrayVal($_GET, "mode");
	$id = getArrayVal($_GET, "id");
	//??
	$usr = getArrayVal($_GET, "user");
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management", "admin" => "admin_active", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("group" => "active");
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

	$user = new user();
	$group = new group();

	
switch ($action) {

	case "add":
		$name = getArrayVal($_POST, "name");
		$desc = getArrayVal($_POST, "desc");
		$assignme = getArrayVal($_POST, "assignme");
		$assignto = getArrayVal($_POST, "assignto");
		
		$add = $group->add($name, $desc, $assignme);
		
		if ($add) {

			foreach ($assignto as $member) {
				echo $member;
				echo $add;

				$group->assign($member, $add);
		        
			}	

			header("Location: admin_people_group.php?mode=added");

		} else {

			header("Location: admin_people_group.php?mode=error1");
    		
		}
		
    	break;
    	
    
    case "delete":
    if ($group->delete($id)){
        header("Location: admin_people_group.php?mode=deleted");
    }
    break;
    
    
    case "deassign":
    	if ($group->deassign($usr, $id)) {
        	header("Location: admin_people_group.php?mode=deassigned");
    	}
    	
	break;

	    
	default:
		
		$title = $langfile['navigation_title_admin_people_group_view'];
		$ogroups = $group->getGroups(1, 10000);
		$i = 0;
		if (!empty($ogroups)) {
		        foreach($ogroups as $ogroup)
		        {
		            $membs = $group->getGroupMembers($ogroup["ID"], 1000);
		            $ogroups[$i]['members'] = $membs;
		            $i = $i + 1;
		        }
		}
		$users = $user->getAllUsers(1000000);
		
		$template->assign("title", $title);
		$template->assign("ogroups", $ogroups);
		$template->assign("users", $users);
		$template->assign("mode", $mode);
		$template->assign("display", $display);
		
		$template->display("template_admin_people_group.tpl");
}


?>