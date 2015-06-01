<?php

require("./init.php");

if (!session_is_registered("userid")){
    $template->assign("loginerror", 0);
    $mode = getArrayVal($_GET, "mode");
    $template->assign("mode", $mode);
    $template->display("login.tpl");
    die();
}

$mainclasses = array("user" => "user_active", "management" => "management", "admin" => "admin", "logout" => "logout");
$template->assign("mainclasses", $mainclasses);

$mainmenu = array("agenda" => "","tarification" => "","prothese" => "active", "patient" => "", "prestation" => "", "caisse" => "");
$template->assign("mainmenu", $mainmenu);

$mylog = new mylog();
$project = new projects();

// open/reduce workspace
if (getArrayVal($_COOKIE, "workspacecookie")) {
    $workspaceclass = $_COOKIE['workspacecookie'];
	$template->assign("workspaceclass", $workspaceclass);
}
else {
    $workspaceclass = "";
	$template->assign("workspaceclass", $workspaceclass);
}

$title = $langfile["navigation_title_management_prothese"];

$template->assign("title", $title);

$template->display("template_management_tarification_add.tpl");

?>