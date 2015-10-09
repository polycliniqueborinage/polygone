<?php

require("./init.php");

if ($adminstate < 3) {
    $errtxt = $langfile["nopermission"];
    $noperm = $langfile["accessdenied"];
    $template->assign("errortext", "$errtxt<br>$noperm");
    $template->display("error.tpl");
    die();
}

$mainclasses = array("user" => "user", "management" => "management_active", "admin" => "admin", "logout" => "logout");
$template->assign("mainclasses", $mainclasses);

$mainmenu = array("agenda" => "","tarification" => "","prothese" => "", "patient" => "", "prestation" => "", "caisse" => "active");
$template->assign("mainmenu", $mainmenu);



$title = $langfile['navigation_title_management_agenda_day'];
    
$template->assign("title", $title);

$template->display("template_management_agenda_day.tpl");

?>
