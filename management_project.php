<?php

	require("./init.php");
	
		  if (!isset($_SESSION['userid'])) {
$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
	
	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['management_project_adminstate']== null || $adminstate < $modules['management_project_adminstate']) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}

	$action = getArrayVal($_GET, "action");
	$id = getArrayVal($_GET, "id");
	$mode = getArrayVal($_GET, "mode");
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$value = utf8_decode(trim(getArrayVal($_POST, "value")));
	$limit = getArrayVal($_POST, "limit");
	
	$mainclasses = array("user" => "user", "management_current" => "management_active", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("project" => "active");
	$template->assign("mainmenu", $mainmenu);

	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass);
	} else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	// my log
	$mylog = (object) new mylog();
	$product = (object) new product();
	
	switch ($action) {
		
		case "add":
			
			$title = $langfile["navigation_title_management_project_add"];
		
			$template->assign("title", $title);
			
			$template->display("template_management_project_add.tpl");
	    	
			break;
		
		case "pdf":
			
			include("./include/class.fpdf.php");
			
			break;
		
			
		default:
	    	$title = $langfile["navigation_title_management_project_gantt_chart"];
	
			$template->assign("title", $title);

			$template->display("template_management_project_gantt_chart.tpl");
	}

?>
