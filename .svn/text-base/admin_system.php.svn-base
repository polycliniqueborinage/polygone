<?php

	require("./init.php");

	if (!session_is_registered("userid")){
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
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management", "admin" => "admin_active", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("system" => "active");
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
	$theset = new settings();
	
	switch ($action) {
		case "editsets":
			$name = getArrayVal($_POST,"name");
			$subtitle = getArrayVal($_POST,"subtitle");
			$locale = getArrayVal($_POST,"locale");
			$timezone = getArrayVal($_POST,"timezone");
			$template = getArrayVal($_POST,"template");
			$favicon = getArrayVal($_POST,"favicon");
			if ($theset->editSettings($name, $subtitle, $locale, $timezone, $template, $favicon)) {
		    	$_SESSION["userlocale"] = $locale;
		    	$users = $user->getAllUsers(100000);
		    	//foreach($users as $usr) {
		    		//set the new locale for all the users
		    	//	$user->edit($usr["ID"],$usr["name"],$usr["email"],0,$usr["zip"],$usr["gender"],$usr["url"],$usr["adress"],$usr["adress2"],$usr["state"],$usr["country"],$usr["tags"],$locale,"",$usr["admin"]);
		    	//}
	        	header("Location: admin_system.php?mode=edited");
    		}
		break;
		

    
	    case "editmailsets":
			$status = getArrayVal($_POST,"mailstatus");
			$mailfrom = getArrayVal($_POST,"mailfrom");
			$method = getArrayVal($_POST,"mailmethod");
			$server = getArrayVal($_POST,"server");
			$mailuser = getArrayVal($_POST,"mailuser");
			$mailpass = getArrayVal($_POST,"mailpass");
			if($theset->editMailsettings($status,$mailfrom,$method,$server,$mailuser,$mailpass)) {
				header("Location: admin_system?mode=edited");
			}
		break;



		default:
			$title = $langfile['navigation_title_admin_system'];
			$languages = getAvailableLanguages();
			$languages_fin = array();
			foreach($languages as $lang) {
		        $lang2 = $langfile[$lang];
		        $fin = countLanguageStrings($lang);
		
		        if (!empty($lang2))
		        {
		            $lang2 .= " (" . $fin . "%)";
		            $fin = array("val" => $lang, "str" => $lang2);
		        }
		        else
		        {
		            $lang2 = $lang . " (" . $fin . "%)";
		            $fin = array("val" => $lang, "str" => $lang2);
		        }
		        array_push($languages_fin, $fin);
		    }
		    $sets = $theset->getSettings();
		    $templates = $theset->getTemplates();
		    $timezones = DateTimeZone::listIdentifiers();
		    
			$template->assign("title", $title);
			$template->assign("mode", $mode);
		    $template->assign("languages_fin", $languages_fin);
		    $template->assign("settings", $sets);
		    $template->assign("timezones", $timezones);
		    $template->assign("templates", $templates);
    
		    $template->display("template_admin_system.tpl");
			
}

?>