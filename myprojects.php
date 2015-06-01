<?php
include("init.php");
if (!isset($_SESSION['userid'])) {
{
    $template->assign("loginerror", 0);
    $template->display("login.tpl");
    die();
}
$project = new project();
$myprojects = $project->getMyProjects($userid);
$oldprojects = $project->getMyProjects($userid, 0);

$title = $langfile["myprojects"];

$template->assign("title", $title);
$template->assign("myprojects", $myprojects);
$template->assign("oldprojects", $oldprojects);

$template->display("myprojects.tpl");

?>