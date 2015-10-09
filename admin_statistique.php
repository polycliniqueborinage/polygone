<?php

	require("./init.php");
	
		  if (!isset($_SESSION['userid'])) {
$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
	
	if ($adminstate < 5) {
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
	
	$mainmenu = array("statistique" => "active");
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
		
	    
		default:
		
			$title = $langfile['navigation_title_admin_statistique_pourcent'];
			$template->assign("title", $title);
			
			$template->assign("display", $display);
		
			$template->display("template_admin_statistique_pie.tpl");

			break;
   	
}


?>
