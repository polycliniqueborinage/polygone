<?php

	require("./init.php");

  if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
	
	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['admin_activity_adminstate']== null || $adminstate < $modules['admin_activity_adminstate']) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
			
	$action = getArrayVal($_GET, "action");
	$mode = getArrayVal($_GET, "mode");
	$id = getArrayVal($_GET, "id");
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management", "admin" => "admin_active", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("activity" => "active");
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
	
	switch ($action) {

		case "all":

			$title = $langfile['navigation_title_admin_activity_all'];
			
			$_SESSION['activitylist']= "SELECT `date`, user_name, object, type, action FROM log";
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_admin_activity_list.tpl");
			
			break;
			

   		default:
		
			$title = $langfile['navigation_title_admin_activity_day'];
			$date = date("Y-m-d");
	    	$logs = $mylog->get($date);
	    	
			$template->assign("title", $title);
			$template->assign("logs", $logs);
			
			$template->display("template_admin_activity_day.tpl");

}
?>