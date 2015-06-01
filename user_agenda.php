<?php

	require("./init.php");

if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
	
	$sessionUserID = $userid;
	$sessionDate = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
	
	$action = getArrayVal($_GET, "action");
	$mode = getArrayVal($_GET, "mode");
	$id = getArrayVal($_GET, "id");
	$start = getArrayVal($_GET, "start");
	$end = getArrayVal($_GET, "end");
	
	$mainclasses = array("user" => "user_active", "management_current" => "management", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("agenda" => "active");
	$template->assign("mainmenu", $mainmenu);

	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass); }
	else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	$fullcalendar 	= (object) new fullcalendar();
	$user 			= (object) new user();
	$date 			= (object) new dates();
	$task 			= (object) new task();
	$mailing		= (object) new mailing();
	$mylog			= (object) new mylog();
	
	switch ($action) {
		
		case "schedule":
			
	    	$profile = $user->getProfile($userid);
			$title = $langfile["navigation_title_user_agenda_schedule"];
			$construct = Array();
			for ($i=1; $i<145 ; $i++) {
				$construct[$i] = $i;
			}
			
			$template->assign("title", $title);
			$template->assign("today", $sessionDate);
			$template->assign("mode", $mode);
			$template->assign("construct", $construct);
			$template->assign("user", $profile);
	
			$template->display("template_user_agenda_schedule.tpl");	    
			
			break;

		case "timeline":
			
	    	$profile = $user->getProfile($userid);
			$title = $langfile["navigation_title_user_agenda_timeline"];
			
			$day = $date->getTimelineDate($sessionDate,0);
			$day_1 = $date->getTimelineDate($sessionDate,-1);
			$day_2 = $date->getTimelineDate($sessionDate,-2);
			$day_3 = $date->getTimelineDate($sessionDate,-3);
			$day_4 = $date->getTimelineDate($sessionDate,-4);
			$day_5 = $date->getTimelineDate($sessionDate,-5);
			$day_6 = $date->getTimelineDate($sessionDate,-6);
			$day1 = $date->getTimelineDate($sessionDate,1);
			$day2 = $date->getTimelineDate($sessionDate,2);
			$day3 = $date->getTimelineDate($sessionDate,3);
			$day4 = $date->getTimelineDate($sessionDate,4);
			$day5 = $date->getTimelineDate($sessionDate,5);
			$day6 = $date->getTimelineDate($sessionDate,6);
			$template->assign("day", $day);
			$template->assign("day_1", $day_1);
			$template->assign("day_2", $day_2);
			$template->assign("day_3", $day_3);
			$template->assign("day_4", $day_4);
			$template->assign("day_5", $day_5);
			$template->assign("day_6", $day_6);
			$template->assign("day1", $day1);
			$template->assign("day2", $day2);
			$template->assign("day3", $day3);
			$template->assign("day4", $day4);
			$template->assign("day5", $day5);
			$template->assign("day6", $day6);
			
			$template->assign("title", $title);
			$template->assign("mode", $mode);
			$template->assign("user", $profile);
	
			$template->display("template_user_agenda_timeline.tpl");
			
			break;
		
		case "list":
			
    		$date = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
			
    		// current task
    		$tasks = $task->getAllMyProjectTasks($userid, 100);
	    	$sort = array();
			foreach($tasks as $etask) {
 	   			array_push($sort, $etask["daysleft"]);	
			}
			array_multisort($sort, SORT_NUMERIC, SORT_ASC, $tasks);
			if ($tasks  != false) $tasknum = count ($tasks); else $tasknum = O ;
			
    		// old task
			$otasks = $task->getMyLateProjectTasks($userid, 100);
	    	$osort = array();
			foreach($otasks as $eotask) {
 	   			array_push($osort, $eotask["daysleft"]);	
			}
			array_multisort($osort, SORT_NUMERIC, SORT_ASC, $otasks);
			if ($otasks  != false) $otasknum = count ($tasks); else $otasknum = O ;
			
			$template->assign("mode", $mode);
			$template->assign("tasks", $tasks);
			$template->assign("tasknum", $tasknum);
			$template->assign("otasks", $otasks);
			$template->assign("otasknum", $otasknum);
			
			$template->display("template_user_agenda_list.tpl");
			
			break;

			
		case "fulllist":
			
			$sqlglobal= "SELECT patient, start, end, concat('<div style=\'display: none;\' >',date,'</div>',date_format(date, '%d/%m/%Y')), motif, location, comment FROM `agenda_".$userid."` order by date";

			$_SESSION['listing_user_agenda'] = $sqlglobal;
			
			$title = $langfile["navigation_title_user_agenda_fulllist"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_user_agenda_fulllist.tpl");
			
			break;
			
		case "week":
			
			$title = $langfile["navigation_title_user_agenda_week"];
			
			$profile = $user->getProfile($userid);
			
			// Construct the agenda
			$construct = Array();
			for ($i=1; $i<145 ; $i++) {
				$construct[$i] = $i;
			}

			// Get all day for this week
			$currentWeekArray = Array();
			
			$currentDate = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
			
			$currentYear = strtok($currentDate,"-");
			$currentMonth = strtok("-");
			$currentDay = strtok("-");
			
			$currentWeek =  date("w", mktime(0, 0, 0, $currentMonth, $currentDay, $currentYear)); 
			if ($currentWeek == 0) $currentWeek = 7;
			
			$currentWeekArray[0] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (1 - $currentWeek), $currentYear));
			$currentWeekArray[1] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (2 - $currentWeek), $currentYear));
			$currentWeekArray[2] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (3 - $currentWeek), $currentYear));
			$currentWeekArray[3] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (4 - $currentWeek), $currentYear));
			$currentWeekArray[4] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (5 - $currentWeek), $currentYear));
			$currentWeekArray[5] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (6 - $currentWeek), $currentYear));
			$currentWeekArray[6] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (7 - $currentWeek), $currentYear));
			
			$template->assign("title", $title);
			$template->assign("today", $sessionDate);
			$template->assign("mode", $mode);
			$template->assign("user", $profile);
			$template->assign("construct", $construct);
			$template->assign("currentWeekArray", $currentWeekArray);
			
			$template->display("template_user_agenda_week.tpl");
		
		break;
		
		case "task_add":
			
			$title = $langfile["navigation_title_user_agenda_task_add"];
			$task = Array();
			$task["end_date"] = date("d/m/Y");
			$template->assign("title", $title);
			$template->assign("task", $task);
			
			$template->display("template_user_agenda_task_add.tpl");
		
		break;

		case "task_edit":

			$title = $langfile["navigation_title_user_agenda_task_edit"];
			$task = $task->get($id);
			$mailing = $mailing->get($task['mailing_id']);

			$task['reminder']=round((strtotime($mailing['date']) - $task['end'])/(60*60*24)-1)+1;

			$template->assign("title", $title);
			$template->assign("task", $task);
			
			$template->display("template_user_agenda_task_add.tpl");
				    	
			break;
	    
		case "task_submit":
			
			$id = getArrayVal($_POST, "id");
			$endDate = getArrayVal($_POST, "end_date");
			$endDateDay = strtok($endDate,"/");
			$endDateMonth = strtok("/");
			$endDateYear = strtok("/");
			$endDate = $endDateYear."-".$endDateMonth."-".$endDateDay;
			$title = getArrayVal($_POST, "title");
			$textcomment = getArrayVal($_POST, "textcomment");
			$reminder = getArrayVal($_POST, "reminder");
			
			if ($id != '') {
				
				//remove old reminder (just one)
				$otask = $task->get($id);
				$mailing->del($otask['mailing_id']);
				
				//add reminder
				if ($reminder != '') {
					$profile = $user->getProfile($userid);
					$date_reminder = $date->operationDate($endDate, $reminder, 0, 0).' 08:00:00';
					$mailing_id = $mailing->add('task','polygone','polygone@polycliniqueborinage.org',$profile['familyname'].' '.$profile['firstname'],$profile['email'],$date_reminder,$title,$textcomment);
				}
				
				$result = $task->update($endDate, $title, $textcomment, 0, $userid, 0,$mailing_id, $id);
				
	       		if ($result) {
					$action = $endDate." ".$title;
					$mylog->add('task','update',$action);
					$loc = $url . "user_agenda.php?action=list&mode=task_edited";
	        	   	header("Location: $loc");
	       		}
	       		
				
			} else {
				
				//add reminder
				if ($reminder != '') {
					$profile = $user->getProfile($userid);
					$date_reminder = $date->operationDate($endDate, $reminder, 0, 0).' 08:00:00';
					$mailing_id = $mailing->add('task','polygone','polygone@polycliniqueborinage.org',$profile['familyname'].' '.$profile['firstname'],$profile['email'],$date_reminder,$title,$textcomment);
				}
				
			 	$result = $task->add($endDate, $title, $textcomment, 0, $userid, 0,$mailing_id);
			 	
				if ($result) {
					$action = $endDate." ".$title;
	        		$mylog->add('task','add',$action);
					$loc = $url . "user_agenda.php?action=list&mode=task_added";
	        		header("Location: $loc");
	       		}
	       		
	        }

	        break;

	  	case "task_delete":
			
	  		$otask = $task->get($id);
		    $task->del($id);
		    $mailing->del($otask['mailing_id']);
		    
			break;

	  	case "task_close":
			
		    $task->close($id);

			break;
			
	  	case "task_open":
			
		    $task->open($id);

			break;
			
		case "task_view":
			
			$task = $task->get($id);
			
			$template->assign("task", $task);
			
			$template->display("template_user_agenda_task_detail.tpl");
			
			break;
			
		case "personal_agenda_gestion":
			
			$events = $fullcalendar->getEvents($userid,$start,$end);
			
   			echo json_encode($events);
			
			break;
			
		case "personal_agenda":
			$profile = $user->getProfile($userid);
			$profile["agenda_selectable"] = ($profile["agenda_permission"]=='write') ? 'true' : 'false';
			$profile["agenda_editable"] = ($profile["agenda_permission"]=='write') ? 'true' : 'false';
			$template->assign("user", $profile);
			$template->display("template_user_agenda_personal_agenda.tpl");
			break;	
		
	    default:
	
			$title = $langfile["navigation_title_user_agenda_day"];
	    	$profile = $user->getProfile($userid);
			$onlinelist = $user->getOnlinelist();
			$construct = Array();
			for ($i=1; $i<145 ; $i++) {
				$construct[$i] = $i;
			}
			$currentDate = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
			
			$template->assign("title", $title);
			$template->assign("construct", $construct);
			$template->assign("currentDate", $currentDate);
			$template->assign("user", $profile);
			$template->assign("onlinelist", $onlinelist);
			
			$template->display("template_user_agenda_day.tpl");
	}
	
	
?>
