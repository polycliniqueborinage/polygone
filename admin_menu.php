<?php

	require("./init.php");
	
	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['admin_menu_adminstate']== null || $adminstate < $modules['admin_menu_adminstate']) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management", "admin" => "admin_active", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);

	$mainmenu = array("menu_no_current" => "active");
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
	
	$user = (object) new user();
	
	switch ($action) {
		
	    default:
			$title = $langfile["navigation_title_management_no_current_menu"];
			$onlinelist = $user->getOnlinelist();
			
			$template->assign("title", $title);
		    $template->assign("onlinelist", $onlinelist);
			
			$template->display("template_admin_menu.tpl");	    		
	}
	    
?>