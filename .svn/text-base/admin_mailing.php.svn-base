<?php

	require("./init.php");

	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
	
	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['admin_mailing_adminstate']== null || $adminstate < $modules['admin_mailing_adminstate']) {
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
	
	$mainmenu = array("mailing" => "active");
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
	
	$mailing = new mailing();
	$emailer = new emailer();
	
	switch ($action) {
		
		case "sendmail":
			
			$to = 'targoo@gmail.com';
			$subject = 'test-subject';
			$text = 'test-text';
			$emailer->send_mail($to,$subject,$text);
			
		break;
		
		case "cron":

			$mails = $mailing->getAllMailToSend();
			echo "<br/> mail send : ";
			print_r($mails);
			foreach ($mails as $mail) {
				$emailer->send_mail($mail["recipient_email"],$mail['object'],$mail['content']);
				$mailing->markAsSend($mail['ID']);
			}
			
		break;
		
		case "all":

			$title = $langfile['navigation_title_admin_mailing_all'];
			
			$mailsend1 = "<input type=\'checkbox\' ";
			$mailsend2 = " disabled=\'true\' />";
			
			$_SESSION['mailinglist']= "SELECT rubric, recipient_name, recipient_email, subject, content, concat('<div style=\'display: none;\' >',date,'</div>',date_format(date, '%d/%m/%Y %h:%m:%s')), concat('$mailsend1',send,'$mailsend2') FROM `mailing`";
			
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_admin_mailing_list.tpl");
			
			break;
			

   		default:
		
			$title = $langfile['navigation_title_admin_mailing_day'];
			$date = date("Y-m-d");
	    	$mailings = $mailing->getTodayMailSend($date);
			$template->assign("title", $title);
			$template->assign("mailings", $mailings);
			
			$template->display("template_admin_mailing_day.tpl");

}
?>