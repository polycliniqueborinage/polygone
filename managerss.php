<?php
require("init.php");
include("./include/class.rss.php");
$rss = new UniversalFeedCreator();
$rss->useCached();

$action = getArrayVal($_GET, "action");
$user = getArrayVal($_GET, "user");
$project = getArrayVal($_GET, "project");
$username = $_SESSION["username"];
error_reporting(0);
if ($action == "rss-tasks")
{
    $thetask = new task();

    $tit = $langfile["mytasks"];

    $rss->title = $tit;
    $rss->description = "";

    $rss->descriptionHtmlSyndicated = true;

    $loc = $url . "/manageproject.php?action=showproject&amp;id=$project";
    $rss->link = $loc;
    $rss->syndicationURL = $loc;

    $project = new project();
    $myprojects = $project->getMyProjects($user);
    $tasks = array();
    foreach($myprojects as $proj)
    {
        $task = $thetask->getAllMyProjectTasks($proj[0], 10000, $user);

        if (!empty($task))
        {
            array_push($tasks, $task);
        }
    }

    $etasks = reduceArray($tasks);

    foreach($etasks as $mytask)
    {
        $item = new FeedItem();
        $item->title = $mytask["title"];
        $loc = $url . "managetask.php?action=showtask&tid=$mytask[ID]&id=$mytask[project]";
        $item->link = $loc;
        $item->source = $loc;

        $item->description = $mytask["text"];
        // optional
        $item->descriptionTruncSize = 500;
        $item->descriptionHtmlSyndicated = true;

        $item->pubDate = $mytask["start"];

        $item->author = "";

        $rss->addItem($item);
    }
    // valid format strings are: RSS0.91, RSS1.0, RSS2.0, PIE0.1 (deprecated),
    // MBOX, OPML, ATOM, ATOM0.3, HTML, JS
    echo $rss->saveFeed("RSS2.0", CL_ROOT . "/files/" . CL_CONFIG . "/ics/feedtask-$user.xml");
} elseif ($action == "mymsgs-rss")
{
    $tproject = new project();
    $myprojects = $tproject->getMyProjects($user);

    $msg = new message();
    $messages = array();
    foreach($myprojects as $proj)
    {
        $message = $msg->getProjectMessages($proj[0]);
        if (!empty($message))
        {
            array_push($messages, $message);
        }
    }
    if (!empty($messages))
    {
        $messages = reduceArray($messages);
    }

    $strpro = $langfile["project"];
    $tit = $langfile["mymessages"];

    $rss->title = $tit;
    $rss->description = "";

    $rss->descriptionHtmlSyndicated = true;

    $loc = $url . "managemessage.php?action=mymsgs";
    $rss->link = $loc;
    $rss->syndicationURL = $loc;

    foreach($messages as $message)
    {
        $item = new FeedItem();
        $item->title = $message["title"];
        $loc = $url . "managemessage.php?action=showmessage&mid=$message[ID]&id=$message[project]";
        $item->link = $loc;
        $item->source = $loc;

        $item->description = $message["text"];
        // optional
        $item->descriptionTruncSize = 500;
        $item->descriptionHtmlSyndicated = true;

        $item->pubDate = $message["posted"];
        $item->author = $message["username"];

        $rss->addItem($item);
    }
    echo $rss->saveFeed("RSS2.0", CL_ROOT . "/files/" . CL_CONFIG . "/ics/mymsgs-$user.xml");
}

?>