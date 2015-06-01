<?php
require("init.php");
  if (!isset($_SESSION['userid'])) {
    $template->assign("loginerror", 0);
    $template->display("login.tpl");
    die();
}

$project = (object) new project();

$action = getArrayVal($_GET, "action");
$redir = getArrayVal($_GET, "redir");
$id = getArrayVal($_GET, "id");
$usr = getArrayVal($_GET, "user");
$assignto = getArrayVal($_POST, "assignto");
$name = getArrayVal($_POST, "name");
$desc = getArrayVal($_POST, "desc");
$end = getArrayVal($_POST, "end");
$status = getArrayVal($_POST, "status");
$user = getArrayVal($_POST, "user");
$assign = getArrayVal($_POST, "assginme");


$strproj = utf8_decode($langfile["project"]);
$struser = utf8_decode($langfile["user"]);
$activity = utf8_decode($langfile["activity"]);
$straction = utf8_decode($langfile["action"]);
$strtext = utf8_decode($langfile["text"]);
$strdate = utf8_decode($langfile["day"]);
$strstarted = utf8_decode($langfile["started"]);
$strdays = utf8_decode($langfile["daysleft"]);
$strdue = utf8_decode($langfile["due"]);
$stropen = utf8_decode($langfile["openprogress"]);
$strdone = utf8_decode($langfile["done"]);
$strdesc = utf8_decode($langfile["description"]);

$mode = getArrayVal($_GET, "mode");
$template->assign("mode", $mode);
// define the active tab in the project navigation
$classes = array("overview" => "overview_active", "msgs" => "msgs", "tasks" => "tasks", "miles" => "miles", "files" => "files", "users" => "users", "tracker" => "tracking");
$template->assign("classes", $classes);

if ($action == "editform")
{
    if ($adminstate < 5)
    {
        $errtxt = $langfile["notyourproject"];
        $noperm = $langfile["accessdenied"];
        $template->assign("errortext", "$errtxt<br>$noperm");
        $template->assign("mode", "error");
        $template->display("error.tpl");
        die();
    }
    $thisproject = $project->getProject($id);
    $title = $langfile["editproject"];

    $template->assign("title", $title);
    $template->assign("project", $thisproject);
    $template->display("editform.tpl");
} elseif ($action == "edit")
{
    if ($adminstate < 5)
    {
        $errtxt = $langfile["nopermission"];
        $noperm = $langfile["accessdenied"];
        $template->assign("errortext", "$errtxt<br>$noperm");
        $template->assign("mode", "error");
        $template->display("error.tpl");
        die();
    }
    if ($project->edit($id, $name, $desc, $end))
    {
        header("Location: manageproject.php?action=showproject&id=$id&mode=edited");
    }
    else
    {
        $template->assign("editproject", 0);
    }
} elseif ($action == "del")
{
    if ($adminstate < 5)
    {
        $errtxt = $langfile["nopermission"];
        $noperm = $langfile["accessdenied"];
        $template->assign("errortext", "$errtxt<br>$noperm");
        $template->assign("mode", "error");
        $template->display("error.tpl");
    }
    if ($project->del($id))
    {
        if ($redir)
        {
            $redir = $url . $redir;
            header("Location: $redir");
        }
        else
        {
            header("Location: myprojects.php");
        }
    }
    else
    {
        $template->assign("delproject", 0);
    }
} elseif ($action == "open")
{
    if ($adminstate < 5)
    {
        $errtxt = $langfile["nopermission"];
        $noperm = $langfile["accessdenied"];
        $template->assign("errortext", "$errtxt<br>$noperm");
        $template->assign("mode", "error");
        $template->display("error.tpl");
    }
    $id = $_GET['id'];
    if ($project->open($id))
    {
        header("Location: manageproject.php?action=showproject&id=$id");
    }
    else
    {
        $template->assign("openproject", 0);
    }
} elseif ($action == "close")
{
    if ($adminstate < 5)
    {
        $errtxt = $langfile["nopermission"];
        $noperm = $langfile["accessdenied"];
        $template->assign("errortext", "$errtxt<br>$noperm");
        $template->display("error.tpl");
    }
    $id = $_GET['id'];
    if ($project->close($id))
    {
        header("Location: index.php");
    }
    else
    {
        $template->assign("closeproject", 0);
    }
} elseif ($action == "assign")
{
    if ($adminstate < 5)
    {
        $errtxt = $langfile["nopermission"];
        $noperm = $langfile["accessdenied"];
        $template->assign("errortext", "$errtxt<br>$noperm");
        $template->display("error.tpl");
    }
    if ($project->assign($user, $id))
    {
	if($settings["mailnotify"])
	    {
		$usr = (object) new user();
		$user = $usr->getProfile($user);
	
		if (!empty($user["email"]))
		{
			//send email
			$themail = new emailer();
			$themail->send_mail($user["email"], $langfile["projectassignedsubject"] , $langfile["projectassignedtext"] . " <a href = \"" . $url . "manageproject.php?action=showproject&id=$id\">" . $url . "manageproject.php?action=showproject&id=$id</a>");
		}
	    }
        header("Location: manageuser.php?action=showproject&id=$id&mode=assigned");
    }
} elseif ($action == "deassignform")
{
    if ($adminstate < 5)
    {
        $errtxt = $langfile["nopermission"];
        $noperm = $langfile["accessdenied"];
        $template->assign("errortext", "$errtxt<br>$noperm");
        $template->display("error.tpl");
    }

    $userobj = new user();
    $user = $userobj->getProfile($usr);
    $proj = $project->getProject($id);
    // Get members of the project
    $members = $project->getProjectMembers($id);

    $title = $langfile["deassignuser"];

    $template->assign("title", $title);
    $template->assign("redir", $redir);
    $template->assign("user", $user);
    $template->assign("project", $proj);
    $template->assign("members", $members);
    $template->display("deassignuserform.tpl");
} elseif ($action == "deassign")
{
    if ($adminstate < 5)
    {
        $errtxt = $langfile["nopermission"];
        $noperm = $langfile["accessdenied"];
        $template->assign("errortext", "$errtxt<br>$noperm");
        $template->display("error.tpl");
    }

    $task = new task();
    $tasks = $task->getAllMyProjectTasks($id, 100, $usr);

    if ($id > 0 and $assignto > 0)
    {
        if (!empty($tasks))
        {
            foreach($tasks as $mytask)
            {
                if ($task->deassign($mytask["ID"], $usr))
                {
                    $task->assign($mytask["ID"], $assignto);
                }
            }
        }
    }
    else
    {
        if (!empty($tasks))
        {
            foreach($tasks as $mytask)
            {
                $task->del($mytask["ID"]);
            }
        }
    }

    if ($project->deassign($usr, $id))
    {
        if ($redir)
        {
            $redir = $url . $redir;
            $redir = $redir . "&mode=deassigned";
            header("Location: $redir");
        }
        else
        {
            header("Location: manageuser.php?action=showproject&id=$id&mode=deassigned");
        }
    }
} elseif ($action == "projectlogpdf")
{
    if ($adminstate < 5)
    {
        $template->assign("errortext", "Permission denied.");
        $template->display("error.tpl");
        die();
    }

    $headline = array(array(" ", $strtext, $straction, $strdate, $struser), array(20, 115, 20, 20, 20));
    $thelog = new mylog();
    $datlog = array();
    $tlog = $thelog->getProjectLog($id, 100000);
    $tlog = $thelog->formatdate($tlog, "d.m.y");
    if (!empty($tlog))
    {
        foreach($tlog as $logged)
        {
            if ($logged["type"] == "datei")
            {
                $logged["type"] = "file";
            } elseif ($logged["type"] == "projekt")
            {
                $logged["type"] = "project";
            } elseif ($logged["type"] == "track")
            {
                $logged["type"] = "timetracker";
            }

            $icon = utf8_decode($langfile[$logged["type"]]);
            if ($logged["action"] == 1)
            {
                $actstr = utf8_decode($langfile["added"]);
            } elseif ($logged["action"] == 2)
            {
                $actstr = utf8_decode($langfile["edited"]);
            } elseif ($logged["action"] == 3)
            {
                $actstr = utf8_decode($langfile["deleted"]);
            } elseif ($logged["action"] == 4)
            {
                $actstr = utf8_decode($langfile["opened"]);
            } elseif ($logged["action"] == 5)
            {
                $actstr = utf8_decode($langfile["closed"]);
            } elseif ($logged["action"] == 6)
            {
                $actstr = utf8_decode($langfile["assigned"]);
            }

            $obstr = $logged["name"];
            $obstr = utf8_decode($obstr);
            $obstr = substr($obstr, 0, 75);

            $data = array($icon, $obstr, $actstr, $logged["datum"], $logged["username"], $logged["action"]);
            array_push($datlog, $data);
        }
    }
    // print_r($datlog);
    include("./include/class.fpdf.php");
    $tproject = $project->getProject($id);

    $pdf = (object) new PDF_plog();
    $pdf->AddPage();
    $headstr = $tproject["name"] . " " . $activity;
    $headstr = utf8_decode($headstr);
    $pdf->FancyTable($headline, $datlog, 9, $headstr);
    $pdf->Output("project-$id-log.pdf", "d");
} elseif ($action == "projectlogxls")
{

    if ($adminstate < 5)
    {
        $template->assign("errortext", "Permission denied.");
        $template->display("error.tpl");
        die();
    }

    $excel = new xls(CL_ROOT . "/files/" . CL_CONFIG . "/ics/project-$id-log.xls");

    $headline = array(" ", $strtext, $straction, $strdate, $struser);
    $excel->writeHeadLine($headline, "128");

    $thelog = new mylog();
    $datlog = array();
    $tlog = $thelog->getProjectLog($id, 100000);
    $tlog = $thelog->formatdate($tlog, "d.m.y");
    if (!empty($tlog))
    {
        foreach($tlog as $logged)
        {
            if ($logged["type"] == "datei")
            {
                $logged["type"] = "file";
            } elseif ($logged["type"] == "projekt")
            {
                $logged["type"] = "project";
            } elseif ($logged["type"] == "track")
            {
                $logged["type"] = "timetracker";
            }

            $icon = utf8_decode($langfile[$logged["type"]]);
            if ($logged["action"] == 1)
            {
                $actstr = utf8_decode($langfile["added"]);
            } elseif ($logged["action"] == 2)
            {
                $actstr = utf8_decode($langfile["edited"]);
            } elseif ($logged["action"] == 3)
            {
                $actstr = utf8_decode($langfile["deleted"]);
            } elseif ($logged["action"] == 4)
            {
                $actstr = utf8_decode($langfile["opened"]);
            } elseif ($logged["action"] == 5)
            {
                $actstr = utf8_decode($langfile["closed"]);
            } elseif ($logged["action"] == 6)
            {
                $actstr = utf8_decode($langfile["assigned"]);
            }

            $obstr = $logged["name"];
            $obstr = utf8_decode($obstr);
            $obstr = substr($obstr, 0, 75);

            $data = array($icon, $obstr, $actstr, $logged["datum"], $logged["username"]);
            $excel->writeLine($data);
        }
    }
    $excel->close();
    $loc = $url . "files/" . CL_CONFIG . "/ics/project-$id-log.xls";
    header("Location: $loc");
} elseif ($action == "pdfreport")
{
    $theproject = $project->getProject($id);
    $done = $project->getProgress($id);
    $open = 100 - $done;

    $headline = array(array(" ", $strtext, $straction, $strdate, $struser), array(20, 115, 20, 20, 20));
    $thelog = (object) new mylog();
    $datlog = array();
    $tlog = $thelog->getProjectLog($id, 25);
    $tlog = $thelog->formatdate($tlog, "d.m.y");
    if (!empty($tlog))
    {
        foreach($tlog as $logged)
        {
            if ($logged["type"] == "datei")
            {
                $logged["type"] = "file";
            } elseif ($logged["type"] == "projekt")
            {
                $logged["type"] = "project";
            } elseif ($logged["type"] == "track")
            {
                $logged["type"] = "timetracker";
            }

            $icon = utf8_decode($langfile[$logged["type"]]);
            if ($logged["action"] == 1)
            {
                $actstr = utf8_decode($langfile["added"]);
            } elseif ($logged["action"] == 2)
            {
                $actstr = utf8_decode($langfile["edited"]);
            } elseif ($logged["action"] == 3)
            {
                $actstr = utf8_decode($langfile["deleted"]);
            } elseif ($logged["action"] == 4)
            {
                $actstr = utf8_decode($langfile["opened"]);
            } elseif ($logged["action"] == 5)
            {
                $actstr = utf8_decode($langfile["closed"]);
            } elseif ($logged["action"] == 6)
            {
                $actstr = utf8_decode($langfile["assigned"]);
            }

            $obstr = $logged["name"];
            $obstr = utf8_decode($obstr);
            $obstr = substr($obstr, 0, 75);

            $data = array($icon, $obstr, $actstr, $logged["datum"], $logged["username"], $logged["action"]);
            array_push($datlog, $data);
        }
    }
    include("./include/class.fpdf.php");

    $pdf = (object) new pdfhtml();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, "Report for $theproject[name]", 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 14);
    $started = $strstarted . ":";

    $pdf->writeHTML("<b>$started</b> $theproject[startstring]<br><b>$strdue:</b> $theproject[endstring]<br><br><br><b>$strdesc:</b><br>$theproject[desc]<br><br>");

    $pdf->SetFont('Arial', 'B', 18);
    $pdf->writeHTML("$activity<br>");
    $headstr = $theproject["name"] . " " . $activity;
    $headstr = utf8_decode($headstr);
    $pdf->FancyTable($headline, $datlog, 9, $headstr);
    $pdf->SetFont('Arial', '', 14);
    // diagramm
    $data = array($stropen => $open, $strdone => $done);
    $pdf->SetXY(100, 20);
    $col1 = array(255, 0, 0);
    $col2 = array(33, 215, 3);
    $pdf->PieChart(95, 30, $data, '%l (%p)', array($col1, $col2));
    $pdf->SetXY(10, 50);

    $pdf->Output("project$id-report.pdf", "d");
} elseif ($action == "donegraph")
{
    include_once("./include/flash-chart.php");
    $g = (object) new graph();
    $g->bg_colour = "#d9dee8";
    $done = $_GET['done'];
    $open = 100 - $done;
    $g->pie(90, '#505050', '{font-size: 12px; color: #404040;');
    $donestr = $langfile["done"];
    $openstr = $langfile["openprogress"];

	$thelink = "managetask.php?action=showproject&id=$id";
	$thelink = urlencode($thelink);

	$thelinks = array($thelink,$thelink);

	if ($done < $open)
    {
        $data = array($open, $done);
        $g->pie_values($data, array($openstr, $donestr),$thelinks);
        $g->pie_slice_colours(array('#FF0000', '#21D703'));
    }
    else
    {
        $data = array($done, $open);
        $g->pie_values($data, array($donestr, $openstr),$thelinks);
        $g->pie_slice_colours(array('#21D703', '#FF0000'));
    }

    $g->set_tool_tip('#val#%');

    echo $g->render();
} elseif ($action == "showproject")
{
    if (!chkproject($userid, $id))
    {
        $errtxt = $langfile["notyourproject"];
        $noperm = $langfile["accessdenied"];
        $template->assign("errortext", "$errtxt<br>$noperm");
        $template->assign("mode", "error");
        $template->display("error.tpl");
        die();
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
    if (getArrayVal($_COOKIE, "trackerhead"))
    {
        $trackstyle = "display:" . $_COOKIE['trackerhead'];
        $template->assign("trackstyle", $trackstyle);
        $trackbar = "win_" . $_COOKIE['trackerhead'];
    }
    else
    {
        $trackbar = "win_block";
    }
    if (getArrayVal($_COOKIE, "loghead"))
    {
        $logstyle = "display:" . $_COOKIE['loghead'];
        $template->assign("logstyle", $logstyle);
        $logbar = "win_" . $_COOKIE['loghead'];
    }
    else
    {
        $logbar = "win_block";
    }
    if (getArrayVal($_COOKIE, "status"))
    {
        $statstyle = "display:" . $_COOKIE['status'];
        $template->assign("statstyle", $statstyle);
        $statbar = "win_" . $_COOKIE['status'];
    }
    else
    {
        $statbar = "win_block";
    }
    $template->assign("milebar", $milebar);
    $template->assign("trackbar", $trackbar);
    $template->assign("logbar", $logbar);
    $template->assign("statbar", $statbar);
    $milestone = (object) new milestone();
    $mylog = (object) new mylog();
    $task = new task();
    $ptasks = $task->getProjectTasks($id, 1);
    $timeline1 = $project->getTimeline($id, 0, 7);
    $timeline2 = $project->getTimeline($id, 7, 14);
    $timestr = $project->getTimestr();
    $today = date("d");

    $timestring = array();
    foreach($timestr as $times)
    {
        $times = $langfile[$times];
        array_push($timestring, $times);
    }
    $log = $mylog->getProjectLog($id);
    $log = $mylog->formatdate($log);

    $tproject = $project->getProject($id);
    $done = $project->getProgress($id);

    include("./include/chart_object.php");
    $loc = "manageproject.php?action=donegraph&done=$done&id=$id";
    $flashstr = open_flash_chart_object_str(200, 190, "$loc");

    $template->assign("flashstr", $flashstr);

	$cloud = new tags();
	$cloud->cloudlimit = 1;
	$thecloud = $cloud->getTagcloud($id);
	if(strlen($thecloud))
	{
		$template->assign("cloud",$thecloud);
	}
    $title = $langfile['project'];
    $title = $title . " " . $tproject["name"];
    $template->assign("title", $title);

    $template->assign("project", $tproject);
    $template->assign("done", $done);

    $template->assign("ptasks", $ptasks);
    $template->assign("timeline1", $timeline1);
    $template->assign("timeline2", $timeline2);
    $template->assign("timestr", $timestring);
    $template->assign("today", $today);

    $template->assign("log", $log);
    SmartyPaginate::assign($template);
    $template->display("project.tpl");
}

