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
	
	$mainmenu = array("project" => "active");
	$template->assign("mainmenu", $mainmenu);

	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass); }
	else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	$timesheet 		= (object) new timesheet();
	$project_task 	= (object) new project_task();
	$cost_center 	= (object) new cost_center();
	$user 			= (object) new user();
	
	switch ($action) {
		
		case "assign_task":
			
			$id = getArrayVal($_POST, "id");
			$project_task->assign($userid,$id);
			
		break;

		case "unassign_task":
			
			$id = getArrayVal($_POST, "id");
			$project_task->unassign($userid,$id);
			
		break;
		
		case "save_time":
			
			$date 	= getArrayVal($_POST, "date");
			$project_task_id 	= getArrayVal($_POST, "project_task_id");
			$value 	= round(getArrayVal($_POST, "value"),2);
			$timesheet->save($userid,$date,$project_task_id,$value);
			
		break;
		
		
		case "udpate":
			
		break;
		
		case "list":
			
    	break;

		case "timesheet_add":

			$date = getArrayVal($_POST, "date");
			$format = getArrayVal($_POST, "format");
			$format = getArrayVal($_POST, "format");
			
		break;
		
		
		case "google_json":
			
			$date 				= getArrayVal($_POST, "date");
			$format 			= getArrayVal($_POST, "format");
			
			$group 				= getArrayVal($_POST, "group");
			$interval 			= getArrayVal($_POST, "interval");
			
			$resource_selected 	= getArrayVal($_POST, "resource_selected");
			
			$rows = array();
			
			// YYYY DD MM
			$tab=split('[/.-]',$date);
			// 0 0 0 month day year
			$dateint = mktime(0, 0, 0, $tab[2], $tab[1], $tab[0]);
			
			switch ($format) {

				case '':
				case 'day':
					
					$rows['dateinterval'][0]['datebefore']	=	date('Y-m-d', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-1, date('Y',$dateint)));
					$rows['dateinterval'][0]['dateafter']	=	date('Y-m-d', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)+1, date('Y',$dateint)));
					$rows['dateinterval'][0]['date']		=	date('d/m/Y', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint), date('Y',$dateint)));
					
					$rows['datebefore'] 				=	$rows['dateinterval'][0]['datebefore'];
					$rows['dateafter'] 					=	$rows['dateinterval'][0]['dateafter'];
					
					$rows['datefrom'] 					=	date('Y-d-m', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint), date('Y',$dateint)));
					$rows['dateto'] 					=	date('Y-d-m', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint), date('Y',$dateint)));
					
					break;
			    
			   	case 'week':
			   		
					for ($i = 0; $i < 7; $i++) {
						$rows['dateinterval'][$i]['datebefore']	=	date('Y-m-d', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint)+$i, date('Y',$dateint)));
						$rows['dateinterval'][$i]['dateafter']	=	date('Y-m-d', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint)+$i+2, date('Y',$dateint)));
						$rows['dateinterval'][$i]['date']		=	date('d/m/Y', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint)+$i+1, date('Y',$dateint)));
					}
			   		
					$rows['datebefore'] 				=	$rows['dateinterval'][0]['datebefore'];
					$rows['dateafter'] 					=	$rows['dateinterval'][6]['dateafter'];
										
					$rows['datefrom'] 					=	date('Y-d-m', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint)+1, date('Y',$dateint)));
					$rows['dateto'] 					=	date('Y-d-m', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint)+7, date('Y',$dateint)));
					
					break;
			
			   	case 'month':
			   		
			   		$numberfdaypermonth = date('t', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint), date('Y',$dateint)));

					for ($i = 0; $i < $numberfdaypermonth; $i++) {
						
						if($interval == 'month') {
							$key 										= date('m', mktime(0, 0, 0, date('m',$dateint), $i+1, date('Y',$dateint)));
						} else if ($interval == 'week'){
							$key 										= date('W', mktime(0, 0, 0, date('m',$dateint), $i+1, date('Y',$dateint)));
						} else {
							$key 										= date('d', mktime(0, 0, 0, date('m',$dateint), $i+1, date('Y',$dateint)));
						}
						
						$rows['dateinterval'][$key]['datebefore']	=	($rows['dateinterval'][$key]['datebefore']) ? $rows['dateinterval'][$key]['datebefore'] : date('Y-m-d', mktime(0, 0, 0, date('m',$dateint), +$i, date('Y',$dateint)));
						$rows['dateinterval'][$key]['dateafter']	=	date('Y-m-d', mktime(0, 0, 0, date('m',$dateint), $i+2, date('Y',$dateint)));
						
						if($interval == 'month') {
							$rows['dateinterval'][$key]['date']			=	date('M', mktime(0, 0, 0, date('m',$dateint), $i+1, date('Y',$dateint)));
						} else if ($interval == 'week'){
							$rows['dateinterval'][$key]['date']			=	"Sem ".date('W', mktime(0, 0, 0, date('m',$dateint), $i+1, date('Y',$dateint)));
						} else {
							$rows['dateinterval'][$key]['date']			=	date('d/m/Y', mktime(0, 0, 0, date('m',$dateint), $i+1, date('Y',$dateint)));
						}

					}
			   		
					$firstday = reset($rows['dateinterval']);
					$lastday  = end($rows['dateinterval']);
					
					$rows['datebefore'] 				=	$firstday['datebefore'];
					$rows['dateafter'] 					=	$lastday['dateafter'];
										
					$rows['datefrom'] 					=	date('Y-d-m', mktime(0, 0, 0, date('m',$dateint), 1, date('Y',$dateint)));
					$rows['dateto'] 					=	date('Y-d-m', mktime(0, 0, 0, date('m',$dateint), $numberfdaypermonth, date('Y',$dateint)));
			   							
					break;
					
			   	case 'trimestre':
			   		
			   		$currentmonth = date('m', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint), date('Y',$dateint)));
			   		
			   		$numberfdaypermonth = 0;
			   		
			   		$currentmonth = (floor($currentmonth/4))*3;
			   		
			   		for ($j = 1; $j < 4; $j++) {

			   			$numberfdaypermonth = date('t', mktime(0, 0, 0, $currentmonth + $j, 1, date('Y',$dateint)));
			   			
						for ($i = 0; $i < $numberfdaypermonth; $i++) {
							
							if($interval == 'month') {
								$key 										= date('m', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint)));
							} else if ($interval == 'week'){
								$key 										= date('W', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint)));
							} else {
								$key 										= date('m', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint))).'-'.date('d', mktime(0, 0, 0, $currentmonth, $i+1, date('Y',$dateint)));
							}
						
							$rows['dateinterval'][$key]['datebefore']	=	($rows['dateinterval'][$key]['datebefore']) ? $rows['dateinterval'][$key]['datebefore'] : date('Y-m-d', mktime(0, 0, 0, $currentmonth + $j, +$i, date('Y',$dateint)));
							$rows['dateinterval'][$key]['dateafter']	=	date('Y-m-d', mktime(0, 0, 0, $currentmonth + $j, $i+2, date('Y',$dateint)));
							
							if($interval == 'month') {
								$rows['dateinterval'][$key]['date']			=	date('M', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint)));
							} else if ($interval == 'week'){
								$rows['dateinterval'][$key]['date']			=	"Sem ".date('W', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint)));
							} else {
								$rows['dateinterval'][$key]['date']			=	date('d/m/Y', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint)));
							}

						}
						
					}
					
					$firstday = reset($rows['dateinterval']);
					$lastday  = end($rows['dateinterval']);
					
					$rows['datebefore'] 				=	$firstday['datebefore'];
					$rows['dateafter'] 					=	$lastday['dateafter'];
										
					$rows['datefrom'] 					=	date('Y-d-m', mktime(0, 0, 0, ($currentmonth * 3) + 1, 1, date('Y',$dateint)));
					$rows['dateto'] 					=	date('Y-d-m', mktime(0, 0, 0, ($currentmonth * 3) + 3, $numberfdaypermonth, date('Y',$dateint)));
					
			   		
					break;					
			
			   	case 'semestre':
			   		
			   		$currentmonth = date('m', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint), date('Y',$dateint)));
			   		
			   		$numberfdaypermonth = 0;
			   		
			   		$currentmonth = (floor($currentmonth/7))*6;
			   		
			   		for ($j = 1; $j < 7; $j++) {

			   			$numberfdaypermonth = date('t', mktime(0, 0, 0, $currentmonth + $j, 1, date('Y',$dateint)));
			   			
						for ($i = 0; $i < $numberfdaypermonth; $i++) {
							
							if($interval == 'month') {
								$key 										= date('m', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint)));
							} else if ($interval == 'week'){
								$key 										= date('W', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint)));
							} else {
								$key 										= date('m', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint))).'-'.date('d', mktime(0, 0, 0, $currentmonth, $i+1, date('Y',$dateint)));
							}
						
							$rows['dateinterval'][$key]['datebefore']	=	($rows['dateinterval'][$key]['datebefore']) ? $rows['dateinterval'][$key]['datebefore'] : date('Y-m-d', mktime(0, 0, 0, $currentmonth + $j, +$i, date('Y',$dateint)));
							$rows['dateinterval'][$key]['dateafter']	=	date('Y-m-d', mktime(0, 0, 0, $currentmonth + $j, $i+2, date('Y',$dateint)));
							
							if($interval == 'month') {
								$rows['dateinterval'][$key]['date']			=	date('M', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint)));
							} else if ($interval == 'week'){
								$rows['dateinterval'][$key]['date']			=	"Sem ".date('W', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint)));
							} else {
								$rows['dateinterval'][$key]['date']			=	date('d/m/Y', mktime(0, 0, 0, $currentmonth + $j, $i+1, date('Y',$dateint)));
							}

						}
						
					}
					
					$firstday = reset($rows['dateinterval']);
					$lastday  = end($rows['dateinterval']);
					
					$rows['datebefore'] 				=	$firstday['datebefore'];
					$rows['dateafter'] 					=	$lastday['dateafter'];
										
					$rows['datefrom'] 					=	date('Y-d-m', mktime(0, 0, 0, ($currentmonth * 3) + 1, 1, date('Y',$dateint)));
					$rows['dateto'] 					=	date('Y-d-m', mktime(0, 0, 0, ($currentmonth * 3) + 3, $numberfdaypermonth, date('Y',$dateint)));
					
			   							
					break;	

			   	case 'year':
			   		
			   		for ($j = 1; $j < 13; $j++) {

			   			$numberfdaypermonth = date('t', mktime(0, 0, 0, $j, 1, date('Y',$dateint)));
			   			
						for ($i = 0; $i < $numberfdaypermonth; $i++) {
							
							if($interval == 'month') {
								$key 										= date('m', mktime(0, 0, 0, $j, $i+1, date('Y',$dateint)));
							} else if ($interval == 'week'){
								$key 										= date('W', mktime(0, 0, 0, $j, $i+1, date('Y',$dateint)));
							} else {
								$key 										= date('m', mktime(0, 0, 0, $j, $i+1, date('Y',$dateint))).'-'.date('d', mktime(0, 0, 0, $j, $i+1, date('Y',$dateint)));
							}
						
							$rows['dateinterval'][$key]['datebefore']	=	($rows['dateinterval'][$key]['datebefore']) ? $rows['dateinterval'][$key]['datebefore'] : date('Y-m-d', mktime(0, 0, 0, $currentmonth + $j, +$i, date('Y',$dateint)));
							$rows['dateinterval'][$key]['dateafter']	=	date('Y-m-d', mktime(0, 0, 0, $j, $i+2, date('Y',$dateint)));
							
							if($interval == 'month') {
								$rows['dateinterval'][$key]['date']			=	date('M', mktime(0, 0, 0, $j, $i+1, date('Y',$dateint)));
							} else if ($interval == 'week'){
								$rows['dateinterval'][$key]['date']			=	"Sem ".date('W', mktime(0, 0, 0, $j, $i+1, date('Y',$dateint)));
							} else {
								$rows['dateinterval'][$key]['date']			=	date('d/m/Y', mktime(0, 0, 0, $j, $i+1, date('Y',$dateint)));
							}

						}
						
					}
					
					$firstday = reset($rows['dateinterval']);
					$lastday  = end($rows['dateinterval']);
					
					$rows['datebefore'] 				=	$firstday['datebefore'];
					$rows['dateafter'] 					=	$lastday['dateafter'];
										
					$rows['datefrom'] 					=	date('Y-d-m', mktime(0, 0, 0, 1, 1, date('Y',$dateint)));
					$rows['dateto'] 					=	date('Y-d-m', mktime(0, 0, 0, 12, $numberfdaypermonth, date('Y',$dateint)));
												
					break;					
					
			}
						
			// CC // Tasks
			$activities	=	$project_task->getByRangeDate($resource_selected,$rows['datebefore'],$rows['dateafter']);
			
			foreach ($activities as $activity) {
				if ($group == "cc") {
					$rows['activity'][$activity[cost_center_id]]['id']			= $activity['cost_center_id'];
					$rows['activity'][$activity[cost_center_id]]['name']		= $activity['cost_center_name'];
				} else {
					$rows['activity'][$activity[project_task_id]]['id']			= $activity['project_task_id'];
					$rows['activity'][$activity[project_task_id]]['name']		= $activity['project_task_name'];
				}
			}
			
			// 
			$timesheets	=	$timesheet->getByUserByRangeGrouped($resource_selected,$rows['dateinterval'],$group);
			foreach ($timesheets as $key => $value) {
				$rows['dateinterval'][$key]['tasks'] = $value;
			}
						
			header("Content-type: text/plain");
			echo json_encode($rows);
			
			
    	break;		
    	
		case "timesheet_json":
			
			$date 		= getArrayVal($_POST, "date");
			$format 	= getArrayVal($_POST, "format");
			$we 		= getArrayVal($_POST, "we");
			
			$today		= date('Y-d-m');
			
			$rows = array();
			// YYYY DD MM
			$tab=split('[/.-]',$date);
			// 0 0 0 month day year
			$dateint = mktime(0, 0, 0, $tab[2], $tab[1], $tab[0]);
			
			switch ($format) {

				case '':
				case 'day':
					
					$rows['dateinterval'][0]['date']		=	date('Y-d-m', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint), date('Y',$dateint)));
					$rows['dateinterval'][0]['class_css']	=	"date day_".date('N', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint), date('Y',$dateint)));
					if ($today == $rows['dateinterval'][0]['date']) $rows['dateinterval'][0]['class_css'] .= " today";
					$rows['datebefore'] 				=	date('Y-m-d', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-1, date('Y',$dateint)));
					$rows['dateafter'] 					=	date('Y-m-d', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)+1, date('Y',$dateint)));
					$rows['datefrom'] 					=	$rows['dateinterval'][0]['date'];
					$rows['dateto'] 					=	'';
					break;
			    
			   	case 'week':
			   		
					if ($we == 'true') {
						$numberofday = 7;
					} else {
						$numberofday = 5;
					}
					for ($i = 0; $i < $numberofday; $i++) {
						$rows['dateinterval'][$i]['date']			=	date('Y-d-m', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint)+$i+1, date('Y',$dateint)));
						$rows['dateinterval'][$i]['class_css']		=	"date day_".date('N', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint)+$i+1, date('Y',$dateint)));
						if ($today == $rows['dateinterval'][$i]['date']) $rows['dateinterval'][$i]['class_css']	.= " today";
					}
			   		$rows['datebefore'] 				=	date('Y-m-d', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint), date('Y',$dateint)));
					$rows['dateafter'] 					=	date('Y-m-d', mktime(0, 0, 0, date('m',$dateint), date('d',$dateint)-date('N',$dateint)+$numberofday+1, date('Y',$dateint)));
					$rows['datefrom'] 					=	$rows['dateinterval'][0]['date'];
					$rows['dateto'] 					=	$rows['dateinterval'][$numberofday-1]['date'];
					
					break;
			
			}
			
			$timesheets	=	$timesheet->getByUserByRange($userid,$rows['datebefore'],$rows['dateafter']);
			//var_dump($timesheets);
						
			// Project by range
			$project_tasks_range_dates	=	$project_task->getByRangeDate($userid,$rows['datebefore'],$rows['dateafter']);
			foreach ($project_tasks_range_dates as $project_tasks_range_date) {
				$rows['timesheet'][$project_tasks_range_date[project_task_id]]['class_css']			= 'unassign';
				$rows['timesheet'][$project_tasks_range_date[project_task_id]]['id']				= $project_tasks_range_date['project_task_id'];
				$rows['timesheet'][$project_tasks_range_date[project_task_id]]['project_task_name']	= $project_tasks_range_date['project_task_name'];
				$rows['timesheet'][$project_tasks_range_date[project_task_id]]['cost_center_name']	= $project_tasks_range_date['cost_center_name'];
				$rows['timesheet'][$project_tasks_range_date[project_task_id]]['cell']				= $timesheets[$project_tasks_range_date[project_task_id]];
			}
			
			$project_tasks_assigneds	=	$project_task->getByUser($userid);
			foreach ($project_tasks_assigneds as $project_tasks_assigned) {
				$rows['timesheet'][$project_tasks_assigned[project_task_id]]['class_css']			= 'assign';
				$rows['timesheet'][$project_tasks_assigned[project_task_id]]['id']					= $project_tasks_assigned['project_task_id'];
				$rows['timesheet'][$project_tasks_assigned[project_task_id]]['project_task_name']	= $project_tasks_assigned['project_task_name'];
				$rows['timesheet'][$project_tasks_assigned[project_task_id]]['cost_center_name']	= $project_tasks_assigned['cost_center_name'];
				$rows['timesheet'][$project_tasks_assigned[project_task_id]]['cell']				= $timesheets[$project_tasks_assigned[project_task_id]];
			}
			
			// All projects
			$project_tasks 				=	$project_task->getAll();
			// Default projects
			foreach ($project_tasks as $project_task) {
				$rows['tasks']['cc'][$project_task[cost_center_id]]['name']											= $project_task[cost_center_name];
				$rows['tasks']['cc'][$project_task[cost_center_id]]['task'][$project_task[project_task_id]]['name']	= $project_task[project_task_name];
			}
			
			$rows['format'] 				=	$format;
			$rows['currentuserid']			=	"'".$userid."'";
			
			header("Content-type: text/plain");
			echo json_encode($rows);
			
			
			
			
    	break;
    	
    	
		case "resource_json":
			
			$users	=	$user->getAllEmployeesByLetter('%');
						
			$rows = array();
			
			// Default projects
			foreach ($users as $user) {
				$rows['resource'][$user['ID']] = $user;
			}
			
			header("Content-type: text/plain");
			echo json_encode($rows);
			
			
    	break;    	
    	
	    default:
	
			$title = $langfile["navigation_title_user_project"];
			$template->display("template_user_timesheet_week.tpl");
	}
	
	
?>