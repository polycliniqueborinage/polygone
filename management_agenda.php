<?php

	require("./init.php");

	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}

	if ($adminstate < 3) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
	
	$sessionUserID = $userid;
	$sessionDate = isset($_SESSION['management_agenda_date']) ? $_SESSION['management_agenda_date'] : date("Y-m-d");
	
	$action = getArrayVal($_GET, "action");
	$mode = getArrayVal($_GET, "mode");
	$id = getArrayVal($_GET, "id");
	
	$mainclasses = array("user" => "user_active", "management_current" => "management", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("agenda" => "active");
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
	
	$user 		= (object) new user();
	$date 		= (object) new dates();
	$task 		= (object) new task();
	$mailing	= (object) new mailing();
	$mylog		= (object) new mylog();
	
	switch ($action) {
		
	    default:
	
			$title = $langfile["navigation_title_user_agenda_day"];
	    	$profile = $user->getProfile($userid);
			$onlinelist = $user->getOnlinelist();
			
			$currentDate = isset($_SESSION['management_agenda_date']) ? $_SESSION['management_agenda_date'] : date("Y-m-d");
			
			$template->assign("title", $title);
			$template->assign("construct", $construct);
			$template->assign("currentDate", $currentDate);
			$template->assign("user", $profile);
			$template->assign("onlinelist", $onlinelist);
			
			$template->display("template_user_agenda_day.tpl");
	}
	
	
?>