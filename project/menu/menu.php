<?php

require("../../init.php");


if (!session_is_registered("userid"))
{
    $template->assign("loginerror", 0);
    $mode = getArrayVal($_GET, "mode");
    $template->assign("mode", $mode);
    $template->display("login.tpl");
    die();
}

$mainclasses = array("desktop" => "desktop_active", "profil" => "profil", "admin" => "admin");

$template->assign("mainclasses", $mainclasses);


$mylog = new mylog();
$project = new project();
$milestone = new milestone();
$mtask = new task();
$msg = new message();

// $log = $mylog->getLog();
$myprojects = $project->getMyProjects($userid);
$messages = array();
$milestones = array();
$tasks = array();
$cou = 0;

if (!empty($myprojects))
{
    foreach($myprojects as $proj)
    {
        $task = $mtask->getAllMyProjectTasks($proj[0], 5);
        $msgs = $msg->getProjectMessages($proj[0]);
        if (!empty($msgs))
        {
            array_push($messages, $msgs);
        }

        if (!empty($task))
        {
            array_push($tasks, $task);
        }

        $cou = $cou + 1;
    }
}

$mile = $project->getTimeline(0, 0, 7);
if (!empty($mile))
{
    array_push($milestones, $mile);
}

$timestr = $project->getTimestr();
$timestring = array();
foreach($timestr as $times)
{
    $times = $langfile[$times];
    array_push($timestring, $times);
}

if (!empty($messages))
{
    $messages = reduceArray($messages);
}
$etasks = reduceArray($tasks);
$emilestones = reduceArray($milestones);

$sort = array();
foreach($etasks as $etask)
{
    array_push($sort, $etask["daysleft"]);
}
array_multisort($sort, SORT_NUMERIC, SORT_ASC, $etasks);

if (getArrayVal($_COOKIE, "taskhead"))
{
    $taskstyle = "display:" . $_COOKIE['taskhead'];
    $template->assign("taskstyle", $taskstyle);
    $taskbar = "win_" . $_COOKIE['taskhead'];
}
else
{
    $taskbar = "win_block";
}
if (getArrayVal($_COOKIE, "milehead"))
{
    $milestyle = "display:" . $_COOKIE['milehead'];
    $template->assign("milestyle", $milestyle);
    $milebar = "win_" . $_COOKIE['milehead'];
}
else
{
    $milebar = "win_block";
}
if (getArrayVal($_COOKIE, "projecthead"))
{
    $projectstyle = "display:" . $_COOKIE['projecthead'];
    $template->assign("projectstyle", $projectstyle);
    $projectbar = "win_" . $_COOKIE['projecthead'];
}
else
{
    $projectbar = "win_block";
}
if (getArrayVal($_COOKIE, "activityhead"))
{
    $actstyle = "display:" . $_COOKIE['activityhead'];
    $template->assign("actstyle", $actstyle);
    $activitybar = "win_" . $_COOKIE['activityhead'];
}
else
{
    $activitybar = "win_block";
}
$today = date("d");
$tasknum = count($etasks);
$milenum = count($emilestones);
$projectnum = count($myprojects);
$msgnum = count($messages);

$title = $langfile["desktop"];

echo "test";


$template->assign("title", $title);

echo "test";

//$template->assign("taskbar", $taskbar);
//$template->assign("milebar", $milebar);
//$template->assign("projectbar", $projectbar);
//$template->assign("actbar", $activitybar);

//$template->assign("timeline", $emilestones);
//$template->assign("timestr", $timestring);
//$template->assign("today", $today);
//$template->assign("milenum", $milenum);

//$template->assign("myprojects", $myprojects);
//$template->assign("projectnum", $projectnum);
//$mode = getArrayVal($_GET, "mode");
//$template->assign("mode", $mode);

//$template->assign("tasks", $etasks);
//$template->assign("tasknum", $tasknum);

//$template->assign("messages", $messages);
//$template->assign("msgnum", $msgnum);
$template->display("menu.tpl");
echo "test3";

?>