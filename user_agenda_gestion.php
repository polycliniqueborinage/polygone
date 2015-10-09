<?php
	require("./init.php");
	
  if (!isset($_SESSION['userid'])) {
	    $template->assign("loginerror", 0);
	    $mode = getArrayVal($_GET, "mode");
	    $template->assign("mode", $mode);
	    $template->display("login.tpl");
	    die();
	}

	$userid = $_SESSION["userid"];
	$adminstate = $_SESSION["adminstate"];

	$action = getArrayVal($_POST, "action");
	$day = trim(getArrayVal($_POST, "day"));
	$id = getArrayVal($_POST, "id");
	$hours = getArrayVal($_POST, "hours");
	$top = getArrayVal($_POST, "top");
	$length = getArrayVal($_POST, "length");
	$start = getArrayVal($_POST, "start");
	$end = getArrayVal($_POST, "end");
	$nbr = trim(getArrayVal($_POST, "nbr"));
	$width = getArrayVal($_POST, "width");
	$date = trim(getArrayVal($_POST, "date"));
	$color = getArrayVal($_POST, "color");
	$color1 = getArrayVal($_POST, "color1");
	$color2 = getArrayVal($_POST, "color2");
	
	$patient = utf8_decode(getArrayVal($_POST, "patient"));
	$patientID = getArrayVal($_POST, "patient_id");
	$motif = utf8_decode(getArrayVal($_POST, "motif"));
	$motifID = getArrayVal($_POST, "motif_id");
	$location = utf8_decode(getArrayVal($_POST, "location"));
	$comment = utf8_decode(getArrayVal($_POST, "comment"));
	
	// Week calendar
	$dayofweek = getArrayVal($_POST, "dayofweek");

	// Calendar Structure
	$topMin = getArrayVal($_POST, "topMin");
	$topMax = getArrayVal($_POST, "topMax");
	$pixelPerSlot = getArrayVal($_POST, "pixelPerSlot");
	$minutePerSlot = getArrayVal($_POST, "minutePerSlot");
	
	// Search and calendar
	$templ = getArrayVal($_POST, "template");
	$value = utf8_decode(trim(getArrayVal($_POST, "value")));

	$agenda = new agenda();
	$mylog = new mylog();
	$user = new user();
	
	$currentDate = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
	$currentYear = strtok($currentDate,"-");
	$currentMonth = strtok("-");
	$currentDay = strtok("-");
	
	switch ($action) {

		case "add":
			
			$result = $agenda->add($userid,$color1,$color2,$day,$top,$length,$start,$end,$patient,$patientID,$motif,$motifID,$location,$comment);
			
			if ($result) {
				// move
				//$result = $agenda->move($userid,'chip'.$result,$day,$top,$length,$start,$end);
				//$action = $agenda->getLogInfo($userid,$result).' - '.$user->getLogInfo($userid);
				//$mylog->add('agenda','add',$action);
			}
			
		break;

		case "delete":
			$action = $agenda->getLogInfo($userid,$id).' - '.$user->getLogInfo($userid);
			$result = $agenda->delete($userid,$id);
			if ($result) {
				$mylog->add('agenda','delete',$action);
			}
		break;
		
		case "move":
			$result = $agenda->move($userid,$id,$day,$top,$length,$start,$end);
			if ($result) {
				$id = (int) substr($id, 4);
				$action = $agenda->getLogInfo($userid,$id).' - '.$user->getLogInfo($userid);
				$mylog->add('agenda','move',$action);
			}
		break;

		case "update":
			$action = $agenda->getLogInfo($userid,$id);
			$result = $agenda->update($userid,$id,$patient,$patientID,$motif,$motifID,$location,$comment);
			if ($result) {
				$action .= ' become '.$agenda->getLogInfo($userid,$id).' - '.$user->getLogInfo($userid);
				$mylog->add('agenda','update',$action);
			}
		break;

		case "changedayfromcalendar":
			$from = $langfile["dico_user_agenda_agenda_from"];
			$result = $agenda->changeDateFromDate($from,$date);
		break;
		
		case "changeday":
			$from = $langfile["dico_user_agenda_agenda_from"];
			if ($nbr=='d') 
				$result = $agenda->changeDateFromDate($from,date("Y-m-d"));
			else
				$result = $agenda->changeDateFromNumber($from,(int)$nbr);
		break;

		/* GET MEETING FOR A DAY
		*  PARAM : date
		*  PARAM : userid
		*  PARAM : dayofweek (may be empty)	
		*  PARAM : topMin
		*  PARAM : topMax
		*  PARAM : pixelPerMinute
		*  PARAM : minutePerSlot 
		* */
		case "agenda_day":
    		
    		$date = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
			$year = strtok($date,"-");
			$month = strtok("-");
			$day = strtok("-");
			
    		if ($dayofweek != 0) {
    			// si dimanche datenaumber = 0 mais devrait être 7
				$dateNumber =  date("w", mktime(0, 0, 0, $month, $day, $year)); 
				if ($dateNumber == 0) $dateNumber = 7;
				$temp = ($dayofweek - $dateNumber);
				$date = date ("Y-m-d",mktime(0, 0, 0, $month , $day + $temp, $year));
    		}
    		
    		$agendas = $agenda->getAgendaDay($userid,$date,$topMin,$topMax,$pixelPerSlot,$minutePerSlot);

			$template->assign("agendas", $agendas);
    		$template->assign("dayofweek", $dayofweek);
			$template->assign("templ", $templ);
			
   		 	$template->display("template_user_agenda_gestion_agenda_chip.tpl");
   		 	
			break;
			
		/* GET RESUME FOR WEEK TEMPLATE ONLY */
		case "agenda_week_days":

			$currentWeekArray = Array();
			$currentWeekArrayLangFormat = Array();
			
			$currentWeek =  date("w", mktime(0, 0, 0, $currentMonth, $currentDay, $currentYear)); 
			if ($currentWeek == 0) $currentWeek = 7;
			
			setlocale(LC_TIME, fr_FR);

			$currentWeekArray[0] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (1 - $currentWeek), $currentYear));
			$currentWeekArray[1] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (2 - $currentWeek), $currentYear));
			$currentWeekArray[2] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (3 - $currentWeek), $currentYear));
			$currentWeekArray[3] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (4 - $currentWeek), $currentYear));
			$currentWeekArray[4] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (5 - $currentWeek), $currentYear));
			$currentWeekArray[5] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (6 - $currentWeek), $currentYear));
			$currentWeekArray[6] = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + (7 - $currentWeek), $currentYear));
			
			$currentWeekArrayLangFormat[0] = utf8_decode(strftime('%A, %d %B',strtotime(date ("m/d/Y",mktime(0, 0, 0, $currentMonth , $currentDay + (1 - $currentWeek), $currentYear)))));
			$currentWeekArrayLangFormat[1] = utf8_decode(strftime('%A, %d %B',strtotime(date ("m/d/Y",mktime(0, 0, 0, $currentMonth , $currentDay + (2 - $currentWeek), $currentYear)))));
			$currentWeekArrayLangFormat[2] = utf8_decode(strftime('%A, %d %B',strtotime(date ("m/d/Y",mktime(0, 0, 0, $currentMonth , $currentDay + (3 - $currentWeek), $currentYear)))));
			$currentWeekArrayLangFormat[3] = utf8_decode(strftime('%A, %d %B',strtotime(date ("m/d/Y",mktime(0, 0, 0, $currentMonth , $currentDay + (4 - $currentWeek), $currentYear)))));
			$currentWeekArrayLangFormat[4] = utf8_decode(strftime('%A, %d %B',strtotime(date ("m/d/Y",mktime(0, 0, 0, $currentMonth , $currentDay + (5 - $currentWeek), $currentYear)))));
			$currentWeekArrayLangFormat[5] = utf8_decode(strftime('%A, %d %B',strtotime(date ("m/d/Y",mktime(0, 0, 0, $currentMonth , $currentDay + (6 - $currentWeek), $currentYear)))));
			$currentWeekArrayLangFormat[6] = utf8_decode(strftime('%A, %d %B',strtotime(date ("m/d/Y",mktime(0, 0, 0, $currentMonth , $currentDay + (7 - $currentWeek), $currentYear)))));
						
    		$width =round($width/7)-8.5;

    		$template->assign("width", $width);
			$template->assign("currentWeekArrayLangFormat", $currentWeekArrayLangFormat);
    		$template->assign("currentWeekArray", $currentWeekArray);
    		
   		 	$template->display("template_user_agenda_gestion_agenda_week_days.tpl");
   		 	
			break;
			

		/* GET RESUME FOR DAY TEMPLATE ONLY */
		case "agenda_resume":
			
    		$agendas = $agenda->getAgendaDayResume($userid,$width);
    		$width =round($width/24)-8.5;

    		$template->assign("width", $width);
			$template->assign("agendas", $agendas);
    		
   		 	$template->display("template_user_agenda_gestion_agenda_resume.tpl");
   		 	
			break;
			
			
		
		/* GET HOURS INFORMATION FOR A DAY*/
		case "agenda_hour":
			
			// todo
			if ($dayofweek != 0) {
				$dateNumber = $dayofweek;
			} else {
				$dateNumber =  date("w", mktime(0, 0, 0, $currentMonth, $currentDay, $currentYear)); 
			}
			
			$agendas = $agenda->getAgendaHour($userid,$dateNumber,$topMin,$topMax,$pixelPerSlot,$minutePerSlot);
			
			$template->assign("agendas", $agendas);
			
   		 	$template->display("template_user_agenda_gestion_agenda_hour.tpl");

   			 break;
   			 
   			 
		/* BUILD EVENT ROW */
   		case "agenda_event":

   			if ($dayofweek != 0) {
    			// si dimanche datenaumber = 0 mais devrait être 7
				$dateNumber =  date("w", mktime(0, 0, 0, $currentMonth, $currentDay, $currentYear)); 
				if ($dateNumber == 0) $dateNumber = 7;
				$temp = ($dayofweek - $dateNumber);
				$currentDate = date ("Y-m-d",mktime(0, 0, 0, $currentMonth , $currentDay + $temp, $currentYear));
    		}
   			
    		$construct = array();
    		// todo get number of slot diplayed
			for ($i=1; $i<200 ; $i++) { $construct[$i] = $i;}
			
			$template->assign("construct", $construct);
			$template->assign("dayofweek", $dayofweek);
			$template->assign("currentDate", $currentDate);
			$template->assign("height", $pixelPerSlot);
			
   		 	$template->display("template_user_agenda_gestion_agenda_event.tpl");

   			 break;
   			 
   			 
   			 
		
		case "list":
			
    		$agendas = $agenda->getList($userid);

			$template->assign("agendas", $agendas);
    		
   		 	$template->display("template_user_agenda_gestion_list.tpl");
   		 	
			break;

		case "agenda_list":
			
			$patient = $langfile["dico_user_agenda_addbox_patient"];
			$motif = $langfile["dico_user_agenda_addbox_motif"];
			$start = $langfile["dico_user_agenda_addbox_start"];
			$end = $langfile["dico_user_agenda_addbox_end"];
			$location = $langfile["dico_user_agenda_addbox_location"];
			$comment = $langfile["dico_user_agenda_addbox_comment"];
					
    		$agendas = $agenda->getList($userid);

			$template->assign("agendas", $agendas);
			$template->assign("start", $start);
			$template->assign("end", $end);
			$template->assign("patient", $patient);
			$template->assign("motif", $motif);
			$template->assign("location", $location);
			$template->assign("comment", $comment);
			
   		 	$template->display("template_user_agenda_gestion_agenda_list.tpl");
   		 	
			break;
		
		case "patient_autocomplete":
			
    		$agendas = $agenda->patient_autocomplete($value,$id);
    		
    		break;
		
		case "motif_autocomplete":
    		$agendas = $agenda->motif_autocomplete($userid,$id);
    		break;
    		
   		case "detail":
			$result = $agenda->detail($userid,$id);
			break;
    		
   		case "change_schedule_color":
   			$result = $agenda->changeScheduleColor($userid,$day,$hours,$color);
			break;
    		
		
    	default:
    		// "timeline":
    		$agendas = $agenda->getTimeLine($userid);
	   		break;
		
	}

?>
