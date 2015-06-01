<? 
	require("./init.php");
	
	
	
	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}

	$action = getArrayVal($_GET, "action");
	$mode = getArrayVal($_GET, "mode");

	$mainclasses = array("user" => "user_active", "management_current" => "management", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);

	$mainmenu = array("menu" => "","agenda" => "","profil" => "active", "message" =>"");
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

	$mylog = (object) new mylog();
	$user = (object) new user();
	
	$filename = 'upload_file.php';
	$upload  = getArrayVal($_POST, "upload");
	
	if ($upload){
	
	}
?>

<HTML>
<TITLE>
UPload
</TITLE>
<BODY>

<CENTER>
<? if(!$upload){ ?>
<FORM  enctype="multipart/form-data" ACTION=<?=$filename?> ID='upload_form' NAME='upload_form' METHOD='POST'>
<INPUT TYPE='file' NAME='filetoupload'/>
<INPUT TYPE='HIDDEN' ID='upload' NAME='upload' VALUE='1'/>

<BR>

<INPUT TYPE='SUBMIT' NAME='submit' VALUE='Charger'/>

</FORM>
<? } ?>
</CENTER>

</BODY>
</HTML>