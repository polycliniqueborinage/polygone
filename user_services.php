<?php

	require("./init.php");

	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	$action = getArrayVal($_GET, "action");
	$id = getArrayVal($_GET, "id");
	$mode = getArrayVal($_GET, "mode");
	$format = getArrayVal($_GET, "format");
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$value = utf8_decode(trim(getArrayVal($_POST, "value")));
	$limit = getArrayVal($_POST, "limit");
			
	$mainclasses = array("user" => "user_active", "management_current" => "management", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);

	$mainmenu = array("userservices" => "active");
	$template->assign("mainmenu", $mainmenu);

	// open/reduce workspace
	$template->assign("workspaceclass", "fullpage");
	
	//protocol webservice url
	if ($_SERVER['SERVER_NAME'] == '192.168.100.123')
	$protocol_webservice_url="http://192.168.100.123:55555";
	else{ if ($_SERVER['SERVER_NAME'] == '192.168.100.200')
			$protocol_webservice_url="http://protocol.polycliniqueborinage.org";	
		  else
			$protocol_webservice_url="https://protocol.polycliniqueborinage.org";	
	}
	
	// my log
	$mylog 			= (object) new mylog();
	$group 			= (object) new group();
	$protocol 		= (object) new protocol();
	$usergroup 		= (object) new user_group();
	$workschedule 	= (object) new workschedule();
	$user 			= (object) new user();
	$timemanagement = (object) new timemanagement();
	$mss_services   = (object) new mss_services();
	
	$myuser       	= $_SESSION["userid"];
	$mygroup      	= $usergroup->getGroupForUser($myuser);
	$groupmembers = array(); 
	for($i=0;$i<count($mygroup); $i++){
		$groupmember = $usergroup->getGroupMembers($mygroup[$i]["id"]);
		for($j=0; $j<count($groupmember); $j++){
			if($groupmember[$j]["ID"] != $myuser)
				array_push($groupmembers, $groupmember[$j]);
			else{
				if($i == 0)
					array_push($groupmembers, $groupmember[$j]);
			}	
		}
			
	}
	$groupchief   	= $usergroup->getGroupChief($mygroup[0]["id"]);
	$isManager		= $usergroup->isManager($myuser);
	
	if($isManager){
		$myTeams = $usergroup->getGroupForManager($myuser);
		$myTeamMembers = array(); 
		for($i=0;$i<count($myTeam); $i++){
			$teamMember = $usergroup->getGroupMembers($myTeams[$i]["id"]);
			for($j=0; $j<count($teamMember); $j++){
				if($teamMember[$j]["ID"] != $myuser)
					array_push($myTeamMembers, $teamMember[$j]);
				else{
					if($i == 0)
						array_push($myTeamMembers, $teamMember[$j]);
				}	
			}
				
		}
	}
	
	switch ($action) {
		
		case "team_calendar":
			$date = $_GET["date"];
			if($date == "")
				$date = date("Y-m-d");
			$year  = substr($date, 0, 4);
			$month = substr($date, 5, 2);
				
			switch ($month){
				case "01":
					$next_date = $year."-02-01";
					$year = $year - 1;
					$prev_date = $year."-12-01";
					break;
				case "02":
					$prev_date = $year."-01-01";
					$next_date = $year."-03-01";
					break;
				case "03":
					$prev_date = $year."-02-01";
					$next_date = $year."-04-01";
					break;
				case "04":
					$prev_date = $year."-03-01";
					$next_date = $year."-05-01";
					break;
				case "05":
					$prev_date = $year."-04-01";
					$next_date = $year."-06-01";
					break;
				case "06":
					$prev_date = $year."-05-01";
					$next_date = $year."-07-01";
					break;
				case "07":
					$prev_date = $year."-06-01";
					$next_date = $year."-08-01";
					break;
				case "08":
					$prev_date = $year."-07-01";
					$next_date = $year."-09-01";
					break;
				case "09":
					$prev_date = $year."-08-01";
					$next_date = $year."-10-01";
					break;
				case "10":
					$prev_date = $year."-09-01";
					$next_date = $year."-11-01";
					break;
				case "11":
					$prev_date = $year."-10-01";
					$next_date = $year."-12-01";
					break;
				case "12":
					$prev_date = $year."-11-01";
					$year = $year + 1;
					$next_date = $year."-01-01";
					break;											
			}
			$absences = array();
			for($i=0; $i < count($groupmembers); $i++){ 
				
				$date1 = $groupmembers[$i]["wsr_refdate"];
				$date2 = substr($date, 0, 8).'01';
				$diff = abs(strtotime($date2) - strtotime($date1));
				
				/*$begda = $date2;
				$endda = substr($begda, 0, 8).cal_days_in_month(CAL_GREGORIAN, substr($date2, 5, 2), substr($date2, 0, 4));
				$absences = $timemanagement->getAbsencesPeriod($groupmembers[$i]["ID"], $begda, $endda); 
				*/
				
				//$years = floor($diff / (365*60*60*24));
				//$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = round($diff/ (60*60*24));
				
				$nb_weeks  = (int) ($days/7) + 1;
				$start_day = $days%7 + 1;
				$wsr 		= $workschedule->get_wsr($groupmembers[$i]["wsr_id"]);
				$max_index 	= $workschedule->get_max_index($groupmembers[$i]["wsr_id"]);
				$start_week = $nb_weeks % $max_index + 1;
				
				$current_week = $start_week;
				$current_day  = $start_day;
				
				for($d=1; $d<=cal_days_in_month(CAL_GREGORIAN, substr($date2, 5, 2), substr($date2, 0, 4)); $d++){
					 $daily_info = $workschedule->get_daily($wsr[$current_week-1]["day".$current_day]); 

					if ($d < 10)	
						$day = substr($date, 0, 8)."0".$d;
					else
						$day = substr($date, 0, 8).$d;	
					
					$absence = $timemanagement->isUserAbsentOnDay($groupmembers[$i]["ID"], $day);	
					$absences[$i][$d-1] = $absence;
					$groupmembers[$i][$d*8-3]["id"] 			= $daily_info["id"];
					$groupmembers[$i][$d*8-2]["description"] 	= $daily_info["description"];
					$groupmembers[$i][$d*8-1]["begtime"] 		= $daily_info["begtime"];
					$groupmembers[$i][$d*8]["endtime"] 			= $daily_info["endtime"];
					$groupmembers[$i][$d*8+1]["begbreak"]		= $daily_info["begbreak"];
					$groupmembers[$i][$d*8+2]["endbreak"] 		= $daily_info["endbreak"];
					$groupmembers[$i][$d*8+3]["nb_hours"]	 	= $daily_info["nb_hours"];
					$groupmembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_working"];
					if($daily_info["nb_hours"] == 0)
						$groupmembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_nowork"]; 

					if($current_day == 6 || $current_day == 7)
						$groupmembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_weekend"];
					
						//print_r($absences[$i][$d]);
					if($absence[0][0] != ""){
						switch ($absence[0][6]){
							case '100': //Approved -> requested from customizing
								$groupmembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_approved"];
								break; 
							case '0': //Rejected -> requested from customizing
								$groupmembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_rejected"];
								break; 	
							default:  //On the way
								$groupmembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_pending"];
								break;	
						}
					if(count($absence) > 1){
						$groupmembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_multipled"];
					}	
						
					}
						
					if($i == 0){
						$dates[$d-1] = $langfile["dico_management_wsr_jour".$current_day."_short"]." ".$d;				
					}
					
					$current_day  += 1;
					
					if($current_day > 7){
						$current_day = 1;
						$current_week += 1;
					}
					if($current_week > $max_index)
						$current_week = 1;
	
				}
			}
			$title = $langfile["navigation_title_management_daily_wsr_liste"];
			$template->assign("title", $title);
			$template->assign("groupmembers", $groupmembers);
			$template->assign("absences", $absences);
			$template->assign("groupchief", $groupchief);
			$template->assign("current_date", $date2);
			$template->assign("dates", $dates);
			$template->assign("prev_date", $prev_date);
			$template->assign("next_date", $next_date);
			$template->assign("days", $days);
			$template->assign("myuserid", $myuser);
			$template->assign("size", round(85/cal_days_in_month(CAL_GREGORIAN, substr($date2, 5, 2)))); 
			$template->assign("annee", substr($date2, 0, 4));
			$template->assign("ismanager", $isManager);
			
			switch(substr($date2, 5, 2)){
				case '01':
					$template->assign("mois", $langfile["january"]);
					break;
				case '02':
					$template->assign("mois", $langfile["february"]);
					break;
				case '03':
					$template->assign("mois", $langfile["march"]);
					break;
				case '04':
					$template->assign("mois", $langfile["april"]);
					break;
				case '05':
					$template->assign("mois", $langfile["may"]);
					break;
				case '06':
					$template->assign("mois", $langfile["june"]);
					break;
				case '07':
					$template->assign("mois", $langfile["july"]);
					break;
				case '08':
					$template->assign("mois", $langfile["august"]);
					break;
				case '09':
					$template->assign("mois", $langfile["september"]);
					break;
				case '10':
					$template->assign("mois", $langfile["october"]);
					break;
				case '11':
					$template->assign("mois", $langfile["november"]);
					break;
				case '12':
					$template->assign("mois", $langfile["december"]);
					break;				
			}
			$template->display("template_user_teamcalendar.tpl");
			
			break;
		
			
		case "my_teams_calendar":
			$date = $_GET["date"];
			if($date == "")
				$date = date("Y-m-d");
			$year  = substr($date, 0, 4);
			$month = substr($date, 5, 2);
				
			switch ($month){
				case "01":
					$next_date = $year."-02-01";
					$year = $year - 1;
					$prev_date = $year."-12-01";
					break;
				case "02":
					$prev_date = $year."-01-01";
					$next_date = $year."-03-01";
					break;
				case "03":
					$prev_date = $year."-02-01";
					$next_date = $year."-04-01";
					break;
				case "04":
					$prev_date = $year."-03-01";
					$next_date = $year."-05-01";
					break;
				case "05":
					$prev_date = $year."-04-01";
					$next_date = $year."-06-01";
					break;
				case "06":
					$prev_date = $year."-05-01";
					$next_date = $year."-07-01";
					break;
				case "07":
					$prev_date = $year."-06-01";
					$next_date = $year."-08-01";
					break;
				case "08":
					$prev_date = $year."-07-01";
					$next_date = $year."-09-01";
					break;
				case "09":
					$prev_date = $year."-08-01";
					$next_date = $year."-10-01";
					break;
				case "10":
					$prev_date = $year."-09-01";
					$next_date = $year."-11-01";
					break;
				case "11":
					$prev_date = $year."-10-01";
					$next_date = $year."-12-01";
					break;
				case "12":
					$prev_date = $year."-11-01";
					$year = $year + 1;
					$next_date = $year."-01-01";
					break;											
			}
			$absences = array();
			for($i=0; $i < count($myTeamMembers); $i++){ 
				
				$date1 = $myTeamMembers[$i]["wsr_refdate"];
				$date2 = substr($date, 0, 8).'01';
				$diff = abs(strtotime($date2) - strtotime($date1));
				
				/*$begda = $date2;
				$endda = substr($begda, 0, 8).cal_days_in_month(CAL_GREGORIAN, substr($date2, 5, 2), substr($date2, 0, 4));
				$absences = $timemanagement->getAbsencesPeriod($groupmembers[$i]["ID"], $begda, $endda); 
				*/
				
				//$years = floor($diff / (365*60*60*24));
				//$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = round($diff/ (60*60*24));
				
				$nb_weeks  = (int) ($days/7) + 1;
				$start_day = $days%7 + 1;
				$wsr 		= $workschedule->get_wsr($myTeamMembers[$i]["wsr_id"]);
				$max_index 	= $workschedule->get_max_index($myTeamMembers[$i]["wsr_id"]);
				$start_week = $nb_weeks % $max_index + 1;
				
				$current_week = $start_week;
				$current_day  = $start_day;
				
				for($d=1; $d<=cal_days_in_month(CAL_GREGORIAN, substr($date2, 5, 2), substr($date2, 0, 4)); $d++){
					 $daily_info = $workschedule->get_daily($wsr[$current_week-1]["day".$current_day]); 

					if ($d < 10)	
						$day = substr($date, 0, 8)."0".$d;
					else
						$day = substr($date, 0, 8).$d;	
					
					$absence = $timemanagement->isUserAbsentOnDay($myTeamMembers[$i]["ID"], $day);	
					$absences[$i][$d-1] = $absence;
					$myTeamMembers[$i][$d*8-3]["id"] 			= $daily_info["id"];
					$myTeamMembers[$i][$d*8-2]["description"] 	= $daily_info["description"];
					$myTeamMembers[$i][$d*8-1]["begtime"] 		= $daily_info["begtime"];
					$myTeamMembers[$i][$d*8]["endtime"] 		= $daily_info["endtime"];
					$myTeamMembers[$i][$d*8+1]["begbreak"]		= $daily_info["begbreak"];
					$myTeamMembers[$i][$d*8+2]["endbreak"] 		= $daily_info["endbreak"];
					$myTeamMembers[$i][$d*8+3]["nb_hours"]	 	= $daily_info["nb_hours"];
					$myTeamMembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_working"];
					if($daily_info["nb_hours"] == 0)
						$myTeamMembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_nowork"]; 

					if($current_day == 6 || $current_day == 7)
						$myTeamMembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_weekend"];
					
						//print_r($absences[$i][$d]);
					if($absence[0][0] != ""){
						switch ($absence[0][6]){
							case '100': //Approved -> requested from customizing
								$myTeamMembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_approved"];
								break; 
							case '0': //Rejected -> requested from customizing
								$myTeamMembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_rejected"];
								break; 	
							default:  //On the way
								$myTeamMembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_pending"];
								break;	
						}
					if(count($absence) > 1){
						$myTeamMembers[$i][$d*8+4]["daycolor"]	 	= $langfile["dico_user_myservices_leaverequest_multipled"];
					}	
						
					}
						
					if($i == 0){
						$dates[$d-1] = $langfile["dico_management_wsr_jour".$current_day."_short"]." ".$d;				
					}
					
					$current_day  += 1;
					
					if($current_day > 7){
						$current_day = 1;
						$current_week += 1;
					}
					if($current_week > $max_index)
						$current_week = 1;
	
				}
			}
			$title = $langfile["navigation_title_management_daily_wsr_liste"];
			$template->assign("title", $title);
			$template->assign("groupmembers", $myTeamMembers);
			$template->assign("absences", $absences);
			$template->assign("groupchief", $groupchief);
			$template->assign("current_date", $date2);
			$template->assign("dates", $dates);
			$template->assign("prev_date", $prev_date);
			$template->assign("next_date", $next_date);
			$template->assign("days", $days);
			$template->assign("myuserid", $myuser);
			$template->assign("size", round(85/cal_days_in_month(CAL_GREGORIAN, substr($date2, 5, 2)))); 
			$template->assign("annee", substr($date2, 0, 4));
			$template->assign("ismanager", $isManager);
			$template->assign("myteams", "X");
			
			switch(substr($date2, 5, 2)){
				case '01':
					$template->assign("mois", $langfile["january"]);
					break;
				case '02':
					$template->assign("mois", $langfile["february"]);
					break;
				case '03':
					$template->assign("mois", $langfile["march"]);
					break;
				case '04':
					$template->assign("mois", $langfile["april"]);
					break;
				case '05':
					$template->assign("mois", $langfile["may"]);
					break;
				case '06':
					$template->assign("mois", $langfile["june"]);
					break;
				case '07':
					$template->assign("mois", $langfile["july"]);
					break;
				case '08':
					$template->assign("mois", $langfile["august"]);
					break;
				case '09':
					$template->assign("mois", $langfile["september"]);
					break;
				case '10':
					$template->assign("mois", $langfile["october"]);
					break;
				case '11':
					$template->assign("mois", $langfile["november"]);
					break;
				case '12':
					$template->assign("mois", $langfile["december"]);
					break;				
			}
			$template->display("template_user_teamcalendar.tpl");
			
			break;	
			
		case "absence_request":
			$begda			= date("Y-m-d");
			$endda			= date("Y-m-d");
			$myuser       	= $_SESSION["userid"];
			$myuserdetails	= $user->getProfile($myuser);
			$absences       = $timemanagement->getAllAbsences($myuserdetails["timegroupe"]);
			//$quotas 		= $timemanagement->getUserActualQuotas($myuser, $begda, $endda);
			for($i=0; $i< count($absences); $i++){
				$quota = $timemanagement->getRemainingQuota($myuser, $absences[$i]["id"], $begda, $endda);
				
				if($quota >= 0){ 
						$absences[$i]["description"] .= " (".$langfile["dico_user_myservices_remainingquota"]." ".$quota;
						switch($absences[$i]["type"]){
							case 'H':
								$absences[$i]["description"] .= " ".$langfile["dico_userservices_remainingquota_hours"].")";
								break;
							case 'D':
								$absences[$i]["description"] .= " ".$langfile["dico_userservices_remainingquota_days"].")";
								break;	
							default:
								break;
					}	
				}	
			}
			$template->assign("absences", $absences);
			$template->assign("quotas", $quotas);
			$template->assign("ismanager", $isManager);
			$template->display("template_user_leaverequest.tpl");
			break;	
			
		case "submit_absence_request":
			$begda 		= $_POST["begda"];
			$endda 		= $_POST["endda"];
			$absenceid 	= $_POST["absenceid"];
			$beghr	 	= $_POST["beghr"];
			$endhr	 	= $_POST["endhr"];
			$comment 	= $_POST["textcomment"];
			
			$timemanagement->submitAbsence("submit", $myuser, $absenceid, $begda, $endda, $beghr, $endhr, $comment, '1', $groupchief["ID"]);
			
			$loc = $url . "user_services.php?action=leave_overview";
		    header("Location: $loc");
			break;		

		case "quota_overview":
			$refdate 	= date("Y-m-d");
			$quotas 	= $timemanagement->getUserActualQuotas($myuser, $refdate, $refdate);
			
			$template->assign("quotas", $quotas);
			$template->assign("ismanager", $isManager);
			$template->display("template_user_quota_overview.tpl");
			break;
			
		case "leave_overview":
			$begda			= date("Y-m-d");
			$endda			= date("Y-m-d");
			
			$absences = $timemanagement->getPendingAbsencesUser($myuser);
			$quotas   = $timemanagement->getUserActualQuotas($myuser, $begda, $endda);
			
			$template->assign("absences", $absences);
			$template->assign("quotas", $quotas);
			$template->assign("ismanager", $isManager);
			$template->display("template_user_leaverequest_overview.tpl");
			break;

		case "tasks_overview":
			
			$tasks = $mss_services->getPendingTasksUser($myuser);
			$requests = array();
			for($i=0; $i<count($tasks); $i++){
				$status = explode('|', $tasks[$i]["nextstatus"]);
				$request["actions"] = "<table><tr>";
				for($j=0; $j<count($status); $j++){
					$wf_status   = $mss_services->getWFStatus($tasks[$i]["wf_id"], $status[$j]);
					$action 	 = $wf_status["action"];
					$requestid   = $tasks[$i]["requestid"];
					$type		 = $tasks[$i]["type"];
					$status_id   = $status[$j];
					$submission  = "'user_services.php?action=process_request&requestid=".$requestid."&type=".$type."&nextstatus=".$status_id."'"; 
					$request["actions"] .= "<td><a href=".$submission."><button type='submit'>$action</button></a></td>";
				}
				$request["actions"] .= "</tr></table>";
				$request["type"] 		= $langfile["dico_management_tasks_type_absence"];
				$request["requester"] 	= $tasks[$i]["requester_name"];
				$request["request"] 	= $tasks[$i]["absence_id"]." : ".$tasks[$i]["begda"]." - ".$tasks[$i]["endda"]." / ".$tasks[$i]["nb_hours"]."h - ".$tasks[$i]["comment"];
				array_push($requests, $request);
			}
			
			$template->assign("requests", $requests);
			$template->assign("ismanager", $isManager);
			$template->assign("message", $_GET["message"]);
			$template->display("template_user_tasks_overview.tpl");
			break;			
			
		case "process_request":
			$requestid  = $_GET["requestid"];
			$type		= $_GET["type"];
			$nextstatus = $_GET["nextstatus"];
			switch($type){
				case "abs":
					if($timemanagement->processAbsence($requestid, $nextstatus)){
						$request = $timemanagement->getRequestInfo($requestid);
						$status  = $mss_services->getWFStatus($request["wf_id"], $nextstatus);
						$message = $langfile["dico_management_tasks_request"]." ".stripslashes($status["description"]);
						
						if($nextstatus == 100){
							$timemanagement->submitAbsence("approve", $request["requester"], $request["absenceid"], $request["begda"], $request["endda"], $request["beghr"], $request["endhr"], "", "", "");
							
							//$timemanagement->alignQuota($request["requester"], $request["absenceid"], $request["begda"], $request["endda"], $request["beghr"], $request["endhr"]);
						}
					}
					break;
				default:
					
					break;	
			}
			$loc = $url . "user_services.php?action=tasks_overview&message=".$message;
		    header("Location: $loc");
		    
		    break;
			
		
			
		default:
	    	$loc = $url . "user_services.php?action=team_calendar";
		    header("Location: $loc");
	}

?>