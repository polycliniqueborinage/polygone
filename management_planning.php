<?php

	require("./init.php");

  if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}

	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['management_planning_adminstate']== null || $adminstate < $modules['management_planning_adminstate']) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
	
	$sessionUserID = $userid;
	$sessionDate = isset($_SESSION['management_planning_date']) ? $_SESSION['management_planning_date'] : date("Y-m-d");
	$sessionPlanningVersion = isset($_SESSION['management_planning_version']) ? $_SESSION['management_planning_version'] : '';
	
	$action = getArrayVal($_REQUEST, "action");
	$mode = getArrayVal($_GET, "mode");
	$id = getArrayVal($_REQUEST, "id");
	
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$limit = getArrayVal($_POST, "limit");
	$value = strtolower(utf8_decode(trim(getArrayVal($_POST, "value"))));
	
	// height
	$height = getArrayVal($_POST, "height");
	
	// change week
	$nbr = trim(getArrayVal($_POST, "nbr"));
	
	// save
	$planningID = getArrayVal($_POST, "planning_ID");
	$ouvrierID = getArrayVal($_REQUEST, "ouvrier_ID");
	$dayofweek = getArrayVal($_POST, "dayofweek");
	$currentDate = getArrayVal($_POST, "date");
	$bonusRecurrent = getArrayVal($_POST, "bonus_recurrent");
	$bonusRecurrentComment = strtolower(utf8_decode(trim(getArrayVal($_POST, "bonus_recurrent_comment"))));
	$coutRecurrent = getArrayVal($_POST, "cout_recurrent");
	$coutRecurrentComment = strtolower(utf8_decode(trim(getArrayVal($_POST, "cout_recurrent_comment"))));
	$salaireHoraire = getArrayVal($_POST, "salaire_horaire");
	$revenue = getArrayVal($_POST, "revenue");
	$top = getArrayVal($_POST, "top");
	$length = getArrayVal($_POST, "length");
	$resource = strtolower(utf8_decode(trim(getArrayVal($_POST, "resource"))));
	$resourceID = getArrayVal($_POST, "resource_ID");
	$comment = strtolower(utf8_decode(trim(getArrayVal($_POST, "comment"))));
	$color1 = getArrayVal($_POST, "color1");
	$color2 = getArrayVal($_POST, "color2");
	
	// Version
	$versionName = getArrayVal($_POST, "version_name");
	$versionID = getArrayVal($_REQUEST, "version_id");
	
	$mainclasses = array("user" => "user_active", "management_current" => "management", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("planning" => "active");
	$template->assign("mainmenu", $mainmenu);

	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass);
	}
	else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	$date 		= (object) new dates();
	$ouvrier	= (object) new ouvrier();
	$planning	= (object) new planning();
	$date		= (object) new dates();
	$mylog		= (object) new mylog();
	
	switch ($action) {
		
		case "load_version":
			
			$result = $planning->loadVersion($versionID);
			$result = $planning->getVersionName($versionID);
			echo $result;
			
		break;
		
		// not used by savini
		case "changeweek":
			
			$sessionDate = isset($_SESSION['management_planning_date']) ? $_SESSION['management_planning_date'] : date("Y-m-d");
			$result = $date->operationDate($sessionDate, $nbr, 0, 0);
			$_SESSION['management_planning_date'] = $result;
			echo $result;
			
		break;
		
		case "build_ouvrier":
			
			$ouvriers = $ouvrier->getAllPlanning();
			$height = $height * 2;
			
			$template->assign("ouvriers", $ouvriers);
			$template->assign("height", $height);
			$template->display("template_management_planning_build_ouvrier.tpl");

			break;

		case "build_event":
			
			$ouvriers = $ouvrier->getAllPlanning($dayofweek);
			
			$height = $height;
			
			$sessionDate = $_SESSION['management_planning_date'];
			//$sessionPlanningVersion = $_SESSION['management_planning_version'];
			
			$week = $date->getWeek($sessionDate);
			
			$template->assign("ouvriers", $ouvriers);
			$template->assign("dayofweek", $dayofweek);
			$template->assign("week", $week);
			$template->assign("height", $height);
			//$template->assign("versionid", $sessionPlanningVersion);
			$template->display("template_management_planning_build_event.tpl");

			break;
			
		case "build_worker_total":
			
			$ouvriers = $ouvrier->getAllPlanning();
			$height = $height;
			
			$template->assign("ouvriers", $ouvriers);
			$template->assign("height", $height);
			$template->display("template_management_planning_build_worker_total.tpl");

			break;	
			
		case "build_chip":

			$height = $height * 2;
			$sessionDate = $_SESSION['management_planning_date'];
			$sessionPlanningVersion = $_SESSION['management_planning_version'];
			
			$week = $date->getWeek($sessionDate);
			$plannings = $planning->getChipDay($dayofweek,$week[$dayofweek],$sessionPlanningVersion,$height);
			
			$template->assign("plannings", $plannings);
			$template->assign("dayofweek", $dayofweek);
			$template->assign("height", $height);

			$template->display("template_management_planning_build_chip.tpl");

			break;

		case "ajax_detail":
			$result = $planning->detail($id);
			break;

		case "save_new_version":

			echo $versionName;
			$currentVersionID = $planning->createVersion($versionName);
			$_SESSION['management_planning_version'] = $currentVersionID;
			
			break;
			
		case "delete":
			
			if ($planningID !='') {
				$planning->delete($planningID);
			}

			break;

		case "delete_for_user":
			
			if ($ouvrierID !='') {
				$planning->deleteForUser($ouvrierID);
			}

			break;
			
		case "delete_for_day":
			
			if ($dayofweek !='') {
				$planning->deleteForDay($dayofweek);
			}

			break;

		case "delete_all":
			
			$planning->deleteAll();
			
			break;

		case "delete_version":
			
			if ($versionID !='') {
				$planning->deleteVersion($versionID);
			}
			
			break;
			
		case "save":
			
			$sessionPlanningVersion = '';
			
			if ($planningID !='') {
				// update
				$planning->update($planningID,$sessionPlanningVersion,$top,$length,$bonusRecurrent,$coutRecurrent,$bonusRecurrentComment,$coutRecurrentComment,$salaireHoraire,$revenue,$resourceID,$resource,$comment,$color1,$color2);
			} else {
				// add
				$planning->add($ouvrierID,$dayofweek,$currentDate,$sessionPlanningVersion,$top,$length,$bonusRecurrent,$coutRecurrent,$bonusRecurrentComment,$coutRecurrentComment,$salaireHoraire,$revenue,$resourceID,$resource,$comment,$color1,$color2);
			}
			break;
			
		case "archive":
			
			$title = $langfile["navigation_title_management_planning_archive"];
			$sessionDate = isset($_SESSION['management_planning_date']) ? $_SESSION['management_planning_date'] : date("Y-m-d");
			
			$template->assign("title", $title);
			$template->assign("date", $sessionDate);
			
			$template->display("template_management_planning_archive.tpl");
			
			break;

		case "modulesearch":

			$plannings = $planning->modulesearch($id,$value,$limit);
			
			$template->assign("plannings", $plannings);

			if ($type == 'complete') {
				$template->display("template_management_gestion_complete_search.tpl");
			} else {
				if ($type == 'simple') {
					$template->display("template_management_gestion_simple_search.tpl");
				} else {
				}
			}
			
			break;
			
		case 'global_pdf':

			require_once('./libraries/tcpdf/config/lang/eng.php');
			require_once('./libraries/tcpdf/tcpdf.php');
			
            $trans = get_html_translation_table(HTML_ENTITIES);
            $trans = array_flip($trans);
            
			$mondayDico     	= strtr($langfile["dico_general_monday"], $trans);
            $tuesdayDico    	= strtr($langfile["dico_general_tuesday"], $trans);
            $wednesdayDico  	= strtr($langfile["dico_general_wednesday"], $trans);
            $thursdayDico   	= strtr($langfile["dico_general_thursday"], $trans);
            $fridayDico     	= strtr($langfile["dico_general_friday"], $trans);
            $saturdayDico   	= strtr($langfile["dico_general_saturday"], $trans);
            $sundayDico   		= strtr($langfile["dico_general_sunday"], $trans);
            $hourDico     		= strtr($langfile["dico_planning_hour"], $trans);
            $resourceDico   	= strtr($langfile["dico_planning_chantier"], $trans);
            $commentDico		= strtr($langfile["dico_planning_comment"], $trans);
            $ouvrierDico		= strtr($langfile["dico_planning_ouvrier"], $trans);
            
            $header=array($mondayDico,$tuesdayDico,$wednesdayDico,$thursdayDico,$fridayDico,$saturdayDico,$sundayDico);
			
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('MariqueCalcus');
			$pdf->SetTitle('Planning complet');
			$pdf->SetSubject('Planning complet');
			
			// set default header data
			//$pdf->SetHeaderData('', 30, 'Planning individuel', 'power by MariqueCalcus');
			$pdf->SetHeaderData('saviniconstruct.jpg', 70, 'Avenue Reine Astrid 43 - 1140 Waterloo', 'Tel: 0032 472 64 69 08 - Mail: Saviniconstruct@hotmail.com');
			
			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			
			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
			
			//set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			
			//set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			
			//set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
			
			//set some language-dependent strings
			$pdf->setLanguageArray($l); 
			
			// ---------------------------------------------------------
			
			// set font
			$pdf->SetFont('dejavusans', '', 10);
			
			$ouvriers = $ouvrier->getAll();
			
			// add a page
			foreach ($ouvriers as $ouvrier) {

				$jours = $planning->getWeekUser($ouvrier['ID']);

				if ($jours) {
					$pdf->AddPage();
					$pdf->Bookmark(utf8_encode($ouvrier['nom']).' '.utf8_encode($ouvrier['prenom']), 0, 0);
					$pdf->writeHTML("<H2>".utf8_encode($ouvrier['nom'])." ".utf8_encode($ouvrier['prenom'])."</H2>", true, 0, true, 0);
				
					// add a page
					foreach ($jours as $key=>$jour) {
						$htmlpage = "";
	                    $htmlpage .= "<b>";
	                    $htmlpage .= $header[$jour['planning_day_week']-1];
	                    $htmlpage .= "</b>";
	                    $htmlpage .= "<ul>";
	                    $htmlpage .= "<li>";
	                    $htmlpage .= "<u>".$hourDico." : </u>".$jour['planning_hour'];
	                    $htmlpage .= "</li>";
	                    $htmlpage .= "<li>";
	                    $htmlpage .= "<u>".$resourceDico." : </u>".$jour['planning_resource'];
	                    $htmlpage .= "</li>";
	                    $htmlpage .= "<li>";
	                    $htmlpage .= "<u>".$commentDico." : </u>".$jour['planning_comment'];
	                    $htmlpage .= "</li>";
	                    $htmlpage .= "</ul>";
	                    $pdf->writeHTML($htmlpage, true, 0, true, 0);
					}
				
				}
				
				
			}
			
			$pdf->AddPage('L', 'A4');
			$pdf->Bookmark('Semaine', 0, 0);
			$pdf->Cell(0, 0, 'Semaine', 1, 1, 'C');
			
			
			// create some HTML content
			$htmltable = '<table border="1" cellspacing="2" cellpadding="2">
							<tr>
								<th bgcolor="#FEF0C9" align="center">'.$ouvrierDico.'</th>
								<th bgcolor="#FEF0C9" align="center">'.$mondayDico.'</th>
								<th bgcolor="#FEF0C9" align="center">'.$tuesdayDico.'</th>
								<th bgcolor="#FEF0C9" align="center">'.$wednesdayDico.'</th>
								<th bgcolor="#FEF0C9" align="center">'.$thursdayDico.'</th>
								<th bgcolor="#FEF0C9" align="center">'.$fridayDico.'</th>
								<th bgcolor="#FEF0C9" align="center">'.$saturdayDico.'</th>
								<th bgcolor="#FEF0C9" align="center">'.$sundayDico.'</th>
							</tr>';
			
			// add a page
			foreach ($ouvriers as $ouvrier) {
				$color = ($color == '#FEFFF1') ? '#FCF8DC' : '#FEFFF1';
				$htmltable .= '<tr>';
				$jours = $planning->getWeekUser($ouvrier['ID']);
				// add a page
				$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($ouvrier['nom']).' '.utf8_encode($ouvrier['prenom']).'</td>';
				foreach ($header as $key=>$value) {
					$htmltable .= '<td bgcolor="'.$color.'">';
					$htmltable .= "<u>".$hourDico." : </u>".utf8_encode($jours[$key+1]['planning_hour']);
					$htmltable .= "<br/>";
					$htmltable .= "<u>".$resourceDico." : </u>".utf8_encode($jours[$key+1]['planning_resource']);
					$htmltable .= "<br/>";
					$htmltable .= "<u>".$commentDico." : </u>".utf8_encode($jours[$key+1]['planning_comment']);
					$htmltable .= '</td>';
				}
				$htmltable .= '</tr>';
			}
			
			$htmltable .= "</table>";
			
			// output the HTML content
			$pdf->writeHTML($htmltable, true, 0, true, 0);
			
			// ---------------------------------------------------------
			
			//Close and output PDF document
			$pdf->Output('planning_complet.pdf', 'I');
			
			//============================================================+
			// END OF FILE                                                 
			//============================================================+
			
			break;
			
		case 'simple_pdf':
            
			require_once('./libraries/tcpdf/config/lang/eng.php');
			require_once('./libraries/tcpdf/tcpdf.php');
			
            $trans = get_html_translation_table(HTML_ENTITIES);
            $trans = array_flip($trans);
            
			$mondayDico     	= strtr($langfile["dico_general_monday"], $trans);
            $tuesdayDico    	= strtr($langfile["dico_general_tuesday"], $trans);
            $wednesdayDico  	= strtr($langfile["dico_general_wednesday"], $trans);
            $thursdayDico   	= strtr($langfile["dico_general_thursday"], $trans);
            $fridayDico     	= strtr($langfile["dico_general_friday"], $trans);
            $saturdayDico   	= strtr($langfile["dico_general_saturday"], $trans);
            $sundayDico   		= strtr($langfile["dico_general_sunday"], $trans);
            $hourDico     		= strtr($langfile["dico_planning_hour"], $trans);
            $resourceDico   	= strtr($langfile["dico_planning_chantier"], $trans);
            $commentDico		= strtr($langfile["dico_planning_comment"], $trans);
            $ouvrierDico		= strtr($langfile["dico_planning_ouvrier"], $trans);
            
            $header=array($mondayDico,$tuesdayDico,$wednesdayDico,$thursdayDico,$fridayDico,$saturdayDico,$sundayDico);
			
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('MariqueCalcus');
			$pdf->SetTitle('Planning individuel');
			$pdf->SetSubject('Planning individuel');
			
			// set default header data
			//$pdf->SetHeaderData('', 30, 'Planning individuel', 'power by MariqueCalcus');
			$pdf->SetHeaderData('saviniconstruct.jpg', 70, 'Avenue Reine Astrid 43 - 1140 Waterloo', 'Tel: 0032 472 64 69 08 - Mail: Saviniconstruct@hotmail.com');
			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			
			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
			
			//set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			
			//set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			
			//set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
			
			//set some language-dependent strings
			$pdf->setLanguageArray($l); 
			
			// ---------------------------------------------------------
			
			// set font
			$pdf->SetFont('dejavusans', '', 10);
			
			$ouvrier = $ouvrier->get($ouvrierID);
			$jours = $planning->getWeekUser($ouvrier['ID']);

			$pdf->AddPage();
			$pdf->Bookmark(utf8_encode($ouvrier['nom']).' '.utf8_encode($ouvrier['prenom']), 0, 0);
			$pdf->writeHTML("<H2>".utf8_encode($ouvrier['nom'])." ".utf8_encode($ouvrier['prenom'])."</H2>", true, 0, true, 0);
				
			// add a page
			foreach ($jours as $key=>$jour) {
				$htmlpage = "";
				$htmlpage .= "<b>";
				$htmlpage .= $header[$jour['planning_day_week']-1];
				$htmlpage .= "</b>";
				$htmlpage .= "<ul>";
				$htmlpage .= "<li>";
				$htmlpage .= "<u>".$hourDico." : </u>".$jour['planning_hour'];
				$htmlpage .= "</li>";
				$htmlpage .= "<li>";
				$htmlpage .= "<u>".$resourceDico." : </u>".$jour['planning_resource'];
				$htmlpage .= "</li>";
				$htmlpage .= "<li>";
				$htmlpage .= "<u>".$commentDico." : </u>".$jour['planning_comment'];
				$htmlpage .= "</li>";
				$htmlpage .= "</ul>";
				$pdf->writeHTML($htmlpage, true, 0, true, 0);
			}
				
			// output the HTML content
			$pdf->writeHTML($htmltable, true, 0, true, 0);
			
			// ---------------------------------------------------------
			
			//Close and output PDF document
			$pdf->Output('planning_'.$ouvrier['nom'].'.pdf', 'I');
			
			break;
			
		case 'search':

			$title = $langfile["navigation_title_planning_week"];
	
			$template->assign("title", $title);

			$template->display("template_management_planning_search.tpl");
            
            break;
			
	    default:
	    	
			$title = $langfile["navigation_title_management_planning_week"];
			$_SESSION['management_planning_date']  = date("Y-m-d");
			
			$template->assign("title", $title);
			$template->assign("date", $sessionDate);
			
			$template->display("template_management_planning_week.tpl");
	}
	
	
?>