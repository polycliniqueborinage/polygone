<?php

	require("./init.php");

	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
	
	if ($adminstate < 5) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}

	$action = getArrayVal($_GET, "action");
	$mode = getArrayVal($_GET, "mode");
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management", "admin" => "admin_active", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("workschedule" => "active");
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
	
	$mylog = (object) new mylog();
	$workschedule = (object) new workschedule(); 
	
	switch ($action) {
		case "add_dws":
			
			$title = $langfile["navigation_title_management_daily_wsr_add"]; 
			$template->assign("title", $title);
			$template->display("template_management_workschedule_dws_add.tpl");
	    	
		break;
		
		case "submit_dws":
			
			$dws_id          = getArrayVal($_POST, "id");
			$dws_description = getArrayVal($_POST, "description");
			$dws_begtime     = getArrayVal($_POST, "begtime");
			$dws_endtime     = getArrayVal($_POST, "endtime");
			$dws_begbreak    = getArrayVal($_POST, "begbreak");
			$dws_endbreak    = getArrayVal($_POST, "endbreak");
			$dws_nb_hours    = getArrayVal($_POST, "nb_hours");
			
			if($workschedule->get_daily($dws_id)){
				$workschedule->update_daily_wsr($dws_id, $dws_description, $dws_begtime, $dws_endtime, $dws_begbreak, $dws_endbreak, $dws_nb_hours);
				$mylog->add('dws','admin',$dws_id);
			} else {
				$workschedule->add_daily_wsr($dws_id, $dws_description, $dws_begtime, $dws_endtime, $dws_begbreak, $dws_endbreak, $dws_nb_hours);
				$mylog->add('dws','admin',$dws_id);
			}
			
			$title = $langfile["navigation_title_management_daily_wsr_liste"];
			$template->assign("title", $title);
			$template->display("template_management_workschedule_dws_list.tpl");
	    	
		break;

		case "edit_dws":
			
			$dws_id = getArrayVal($_GET, "id");
			$dws = $workschedule->get_daily($dws_id);
			
			$title = $langfile["navigation_title_management_daily_wsr_edit"]; 
			$template->assign("title", $title);
			$template->assign("daily_wsr", $dws);
			
			$template->display("template_management_workschedule_dws_add.tpl");
	    	
		break;
		
		case "list_dws":
			$edit_alt   = mysql_real_escape_string($langfile["navigation_title_management_daily_wsr_edit"]);
			$delete_alt = mysql_real_escape_string($langfile["dico_management_dws_delete"]);
		
			//$view1 = "<a onclick=\"javascript=viewClient(";
			//$view2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_comment.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			//$detail1 = "<a onclick=\"javascript=detailClient(";
			//$detail2 = ")\" >";
			//$detail3 = "</a>";
			
			$edit1 = "<a onclick=\"javascript=editDws(\'";
			$edit2 = "\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_edit.png\" alt=\"".$edit_alt.  "\" title=\"".$edit_alt.  "\" border=\"0\" /></a>";
			//$edit1 = "<a href=\"management_workschedule.php?action=edit_dws&id=";
			//$edit2 = "\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_edit.png\" alt=\"".$edit_alt.  "\" title=\"".$edit_alt.  "\" border=\"0\" /></a>";
			
			$delete1 = "<a onclick=\"javascript=deleteDwsConfirmBox(\'";
			$delete2 = "\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_delete.png\" alt=\"".$delete_alt."\" title=\"".$delete_alt."\" border=\"0\" /></a>";
			
			$sqlglobal= "select concat('$edit1',d.id,'$edit2',' ','$delete1',d.id,'$delete2'), d.id, d.description, d.begtime, d.endtime, d.begbreak, d.endbreak, d.nb_hours FROM daily_wsr d ORDER BY d.id";
			 
			$_SESSION['dws_list']=$sqlglobal;
			
			$title = $langfile["navigation_title_management_daily_wsr_liste"];
			$template->assign("title", $title);
			$template->display("template_management_workschedule_dws_list.tpl");
			
		break;
		
		case 'dws_pdf':
            
			require_once('./libraries/tcpdf/config/lang/eng.php');
			require_once('./libraries/tcpdf/tcpdf.php');
			
            $trans = get_html_translation_table(HTML_ENTITIES);
            $trans = array_flip($trans);
            
            
			$dws_id         	= strtr($langfile["dico_management_dws_column_id"], $trans);
            $dws_description   	= strtr($langfile["dico_management_dws_column_description"], $trans);
            $dws_begtime    	= strtr($langfile["dico_management_dws_column_begtime"], $trans);
            $dws_endtime    	= strtr($langfile["dico_management_dws_column_endtime"], $trans);
            $dws_begbreak     	= strtr($langfile["dico_management_dws_column_begbreak"], $trans);
            $dws_endbreak   	= strtr($langfile["dico_management_dws_column_endbreak"], $trans);
            $dws_nbhours   		= strtr($langfile["dico_management_dws_column_nb_hours"], $trans);
            
            $header=array($dws_id,$dws_description,$dws_begtime,$dws_endtime,$dws_begbreak,$dws_endbreak,$dws_nbhours);
			
			// create new PDF document
			$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('MariqueCalcus');
			$pdf->SetTitle('Gestion des horaires');
			$pdf->SetSubject('Liste des horaires journaliers');
			
			// set default header data
			//$pdf->SetHeaderData('', 30, 'Planning individuel', 'power by MariqueCalcus');
			$pdf->SetHeaderData('mariquecalcus.jpg', 25, 'MariqueCalcus', 'Rue d\'Orleans 42 - 6000 Charleroi');
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
			//$pdf->SetFont('dejavusans', '', 10);
			
			$dws = $workschedule->get_all_daily();

			$pdf->AddPage();
			$pdf->writeHTML("<H2><u>"."Liste des horaires journaliers"."</u></H2><br><br>", true, 0, true, 0);
				
			// add a page			
			$htmltable = '<table border="1" cellspacing="2" cellpadding="2">
							<tr>
								<th bgcolor="#FEF0C9" align="center"><b>'.$dws_id.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$dws_description.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$dws_begtime.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$dws_endtime.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$dws_begbreak.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$dws_endbreak.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$dws_nbhours.'</b></th>
						
							</tr>';
			
			for($i=0; $i<count($dws); $i++) {
					$color = ($color == '#FEFFF1') ? '#FCF8DC' : '#FEFFF1';
					$htmltable .= '<tr>';
					
						$htmltable .= '<td bgcolor="'.$color.'" align="left">'.utf8_encode($dws[$i]['id']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left">'.utf8_encode($dws[$i]['description']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($dws[$i]['begtime']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($dws[$i]['endtime']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($dws[$i]['begbreak']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($dws[$i]['endbreak']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($dws[$i]['nb_hours']).'</td>';
					
						$htmltable .= '</tr>';
			}
			
			$htmltable .= "</table>";			
				
			// output the HTML content
			$pdf->writeHTML($htmltable, true, 0, true, 0);
			
			// ---------------------------------------------------------
			
			//Close and output PDF document
			$pdf->Output('Liste des horaires journaliers.pdf', 'I');
			
			break;

			
    
		case "delete_dws":
			
			$delete_dws_id = getArrayVal($_GET, "id");
			$workschedule->delete_dws($delete_dws_id);
			$title = $langfile["navigation_title_management_daily_wsr_liste"];
			$template->assign("title", $title);
			$template->display("template_management_workschedule_dws_list.tpl"); 
			
			break;
		
		case "add_wsr":
			
			$title = $langfile["navigation_title_management_workschedule_add"]; 
			$current_index = 1;
			$all_dws = $workschedule->get_all_daily();
			$template->assign("title", $title);
			$template->assign("current_index", $current_index);
			$template->assign("dws", $all_dws);
			$template->display("template_management_workschedule_wsr_add.tpl");
	    	
		break;
		
		case "edit_wsr":
			
			$title = $langfile["navigation_title_management_workschedule_edit"]; 
			$wsr_id = getArrayVal($_GET, "id");
			
			$wsr = $workschedule->get_wsr($wsr_id);
			$current_index = count($wsr);
			$all_dws = $workschedule->get_all_daily();
			$template->assign("title", $title);
			$template->assign("wsr_id", $wsr_id);
			$template->assign("current_index", $current_index);
			$template->assign("horaire", $wsr);
			$template->assign("dws", $all_dws);
			$template->display("template_management_workschedule_wsr_add.tpl");
	    	
		break;

		case "submit_wsr":
			
			$wsr_id            = getArrayVal($_POST, "id");
			$wsr_description   = getArrayVal($_POST, "description");
			$wsr_current_index = getArrayVal($_POST, "current_index");
			
			for($i=1; $i<$wsr_current_index; $i++){ 
 
				$wsr_weekly[$i]["day1"] = getArrayVal($_POST, "day1-".$i);
				$wsr_weekly[$i]["day2"] = getArrayVal($_POST, "day2-".$i);
				$wsr_weekly[$i]["day3"] = getArrayVal($_POST, "day3-".$i);
				$wsr_weekly[$i]["day4"] = getArrayVal($_POST, "day4-".$i);
				$wsr_weekly[$i]["day5"] = getArrayVal($_POST, "day5-".$i);
				$wsr_weekly[$i]["day6"] = getArrayVal($_POST, "day6-".$i);
				$wsr_weekly[$i]["day7"] = getArrayVal($_POST, "day7-".$i);
			
			}
			if(getArrayVal($_POST, "day1-".$wsr_current_index) != ""){
				$wsr_weekly[$wsr_current_index]["day1"] = getArrayVal($_POST, "day1-".$wsr_current_index);
				$wsr_weekly[$wsr_current_index]["day2"] = getArrayVal($_POST, "day2-".$wsr_current_index);
				$wsr_weekly[$wsr_current_index]["day3"] = getArrayVal($_POST, "day3-".$wsr_current_index);
				$wsr_weekly[$wsr_current_index]["day4"] = getArrayVal($_POST, "day4-".$wsr_current_index);
				$wsr_weekly[$wsr_current_index]["day5"] = getArrayVal($_POST, "day5-".$wsr_current_index);
				$wsr_weekly[$wsr_current_index]["day6"] = getArrayVal($_POST, "day6-".$wsr_current_index);
				$wsr_weekly[$wsr_current_index]["day7"] = getArrayVal($_POST, "day7-".$wsr_current_index);				
			} else {
				$wsr_current_index = $wsr_current_index - 1;
			}
			
			
			if($workschedule->get_wsr($wsr_id)){
				for($i=$workschedule->get_max_index($wsr_id); $i>$wsr_current_index; $i--){
					$workschedule->delete_wsr($wsr_id, $i);
					$mylog->add('wsr','delete',$wsr_id." index: ".$i);
				}
				for($i=1; $i<=$workschedule->get_max_index($wsr_id); $i++){
					$workschedule->update_wsr($wsr_id, $i, $wsr_description, $wsr_weekly[$i]["day1"], $wsr_weekly[$i]["day2"], $wsr_weekly[$i]["day3"], $wsr_weekly[$i]["day4"], $wsr_weekly[$i]["day5"], $wsr_weekly[$i]["day6"], $wsr_weekly[$i]["day7"]);
					$mylog->add('wsr','update',$wsr_id." index: ".$i);
				}
				for($i=$workschedule->get_max_index($wsr_id)+1; $i<=$wsr_current_index; $i++){
					$workschedule->add_wsr($wsr_id, $i, $wsr_description, $wsr_weekly[$i]["day1"], $wsr_weekly[$i]["day2"], $wsr_weekly[$i]["day3"], $wsr_weekly[$i]["day4"], $wsr_weekly[$i]["day5"], $wsr_weekly[$i]["day6"], $wsr_weekly[$i]["day7"]);
					$mylog->add('wsr','add',$wsr_id." index: ".$i);
				}	
			} else {
				for($i=1; $i<=$wsr_current_index; $i++){
					$workschedule->add_wsr($wsr_id, $i, $wsr_description, $wsr_weekly[$i]["day1"], $wsr_weekly[$i]["day2"], $wsr_weekly[$i]["day3"], $wsr_weekly[$i]["day4"], $wsr_weekly[$i]["day5"], $wsr_weekly[$i]["day6"], $wsr_weekly[$i]["day7"]);
					$mylog->add('wsr','add',$wsr_id." index: ".$i);
				}
			}
			
			$title = $langfile["navigation_title_management_daily_wsr_liste"];
			$template->assign("title", $title);
			$template->display("template_management_workschedule_wsr_list.tpl");
	    	
		break;
		
		case "list_wsr":
			$edit_alt   = mysql_real_escape_string($langfile["navigation_title_management_workschedule_edit"]);
			$delete_alt = mysql_real_escape_string($langfile["dico_management_wsr_delete"]);
			
			$edit1 = "<a onclick=\"javascript=editWsr(\'";
			$edit2 = "\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_edit.png\" alt=\"".$edit_alt.  "\" title=\"".$edit_alt.  "\" border=\"0\" /></a>";
			//$edit1 = "<a href=\"management_workschedule.php?action=edit_dws&id=";
			//$edit2 = "\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_edit.png\" alt=\"".$edit_alt.  "\" title=\"".$edit_alt.  "\" border=\"0\" /></a>";
			
			$delete1 = "<a onclick=\"javascript=deleteWsrConfirmBox(\'";
			$delete2 = "\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_delete.png\" alt=\"".$delete_alt."\" title=\"".$delete_alt."\" border=\"0\" /></a>";
			
			$sqlglobal= "select concat('$edit1',w.id,'$edit2',' ','$delete1',w.id,'$delete2'), w.id, w.description, COUNT(w.index) FROM work_schedule w ORDER BY w.id GROUP BY w.id";
			 
			$_SESSION['wsr_list']=$sqlglobal;
			
			$title = $langfile["navigation_title_management_workschedule_liste"];
			$template->assign("title", $title);
			$template->display("template_management_workschedule_wsr_list.tpl");
			
		break;	

		case 'wsr_pdf':
            
			require_once('./libraries/tcpdf/config/lang/eng.php');
			require_once('./libraries/tcpdf/tcpdf.php');
			
            $trans = get_html_translation_table(HTML_ENTITIES);
            $trans = array_flip($trans);
            
            
			$wsr_id         	= strtr($langfile["dico_management_dws_column_id"], $trans);
            $wsr_description   	= strtr($langfile["dico_management_dws_column_description"], $trans);
            $wsr_index      	= strtr($langfile["dico_management_wsr_column_index"], $trans);
            $wsr_day1       	= strtr($langfile["dico_management_wsr_jour1"], $trans);
            $wsr_day2       	= strtr($langfile["dico_management_wsr_jour2"], $trans);
            $wsr_day3       	= strtr($langfile["dico_management_wsr_jour3"], $trans);
            $wsr_day4       	= strtr($langfile["dico_management_wsr_jour4"], $trans);
            $wsr_day5       	= strtr($langfile["dico_management_wsr_jour5"], $trans);
            $wsr_day6       	= strtr($langfile["dico_management_wsr_jour6"], $trans);
            $wsr_day7       	= strtr($langfile["dico_management_wsr_jour7"], $trans);
            $wsr_nbhours        = strtr($langfile["dico_management_wsr_column_nb_hours"], $trans);
            $avg_text           = strtr($langfile["dico_management_wsr_column_avg_text"], $trans);
            
            $header=array($wsr_id,$wsr_description,$wsr_index,$wsr_day1,$wsr_day2,$wsr_day3,$wsr_day4,$wsr_day5,$wsr_day6,$wsr_day7,$wsr_nb_hours);
			
			// create new PDF document
			$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('MariqueCalcus');
			$pdf->SetTitle('Gestion des horaires');
			$pdf->SetSubject('Liste des horaires');
			
			// set default header data
			//$pdf->SetHeaderData('', 30, 'Planning individuel', 'power by MariqueCalcus');
			$pdf->SetHeaderData('mariquecalcus.jpg', 25, 'MariqueCalcus', 'Rue d\'Orleans 42 - 6000 Charleroi');
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
			//$pdf->SetFont('dejavusans', '', 10);
			
			$wsr = $workschedule->get_all_wsr();

			$pdf->AddPage();
			$pdf->writeHTML("<H2><u>"."Liste des horaires"."</u></H2><br><br>", true, 0, true, 0);
				
			// add a page			
			$htmltable = '<table border="1" cellspacing="2" cellpadding="2">
							<tr>
								<th bgcolor="#FEF0C9" align="center"><b>'.$wsr_id.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$wsr_description.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$wsr_index.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$wsr_day1.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$wsr_day2.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$wsr_day3.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$wsr_day4.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$wsr_day5.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$wsr_day6.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$wsr_day7.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$wsr_nbhours.'</b></th>
						
							</tr>';
			
			$previous_id = null;
			$avg_hours = 0;
			$last_index = 0;

			for($i=0; $i<count($wsr); $i++) {
					if($i!=0 && $previous_id != $wsr[$i]['id']){
						$avg_hours = round($avg_hours / $last_index, 2);
						
						$htmltable .= '<tr>';						
						$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
						$htmltable .= '<th bgcolor="'.$color.'" align="center"><b>'.$avg_text.'</b></th>';
						$htmltable .= '<th bgcolor="'.$color.'" align="center"><b>'.$avg_hours.'</b></th>';
						
						$htmltable .= '</tr>';
						
						$avg_hours = 0;
						$last_index = 0;
					}
				
					$color = ($color == '#FEFFF1') ? '#FCF8DC' : '#FEFFF1';
					$htmltable .= '<tr>';
					if($wsr[$i]['id'] != $previous_id){
						$htmltable .= '<td bgcolor="'.$color.'" align="left"><b>'.utf8_encode($wsr[$i]['id']).'</b></td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left"><b>'.utf8_encode($wsr[$i]['description']).'</b></td>';
					}
					else{
						$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
					}
						
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($wsr[$i]['index']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($wsr[$i]['day1']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($wsr[$i]['day2']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($wsr[$i]['day3']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($wsr[$i]['day4']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($wsr[$i]['day5']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($wsr[$i]['day6']).'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($wsr[$i]['day7']).'</td>';

						$week_nb_hours = 0;	
						for($j=1; $j<=7;$j++){
							$dws = $workschedule->get_daily($wsr[$i]['day'.$j]);
							$week_nb_hours += $dws["nb_hours"];	
						}
						
						$avg_hours += $week_nb_hours;
						$last_index = $wsr[$i]['index'];
						
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$week_nb_hours.'</td>';
						
						$htmltable .= '</tr>';
						
						$previous_id = $wsr[$i]['id'];
			}
			
			$avg_hours = round($avg_hours / $last_index, 2);
			
			$htmltable .= '<tr>';
			
			$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
			$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
			$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
			$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
			$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
			$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
			$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
			$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
			$htmltable .= '<td bgcolor="'.$color.'" align="left"></td>';
			$htmltable .= '<th bgcolor="'.$color.'" align="center">'.$avg_text.'</th>';
			$htmltable .= '<th bgcolor="'.$color.'" align="center">'.$avg_hours.'</th>';
			
			$htmltable .= '</tr>';
			
			$htmltable .= "</table>";			
				
			// output the HTML content
			$pdf->writeHTML($htmltable, true, 0, true, 0);
			
			// ---------------------------------------------------------
			
			//Close and output PDF document
			$pdf->Output('Liste des horaires.pdf', 'I');
			
		break;
		
		case "delete_wsr":
			
			$wsr_id = getArrayVal($_GET, "id");
			
			for($i=1; $i<=$workschedule->get_max_index($wsr_id); $i++){
					$workschedule->delete_wsr($wsr_id, $i);
					$mylog->add('wsr','delete',$wsr_id." index: ".$i);
				}
			$title = $langfile["navigation_title_management_workschedule_liste"];
			$template->assign("title", $title);
			$template->display("template_management_workschedule_wsr_list.tpl");	
		break;	

		default:
			
			$edit_alt   = mysql_real_escape_string($langfile["navigation_title_management_workschedule_edit"]);
			$delete_alt = mysql_real_escape_string($langfile["dico_management_wsr_delete"]);
			
			$edit1 = "<a onclick=\"javascript=editWsr(\'";
			$edit2 = "\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_edit.png\" alt=\"".$edit_alt.  "\" title=\"".$edit_alt.  "\" border=\"0\" /></a>";
			//$edit1 = "<a href=\"management_workschedule.php?action=edit_dws&id=";
			//$edit2 = "\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_edit.png\" alt=\"".$edit_alt.  "\" title=\"".$edit_alt.  "\" border=\"0\" /></a>";
			
			$delete1 = "<a onclick=\"javascript=deleteWsrConfirmBox(\'";
			$delete2 = "\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_delete.png\" alt=\"".$delete_alt."\" title=\"".$delete_alt."\" border=\"0\" /></a>";
			
			$sqlglobal= "select concat('$edit1',w.id,'$edit2',' ','$delete1',w.id,'$delete2'), w.id, w.description, COUNT(w.index) FROM work_schedule w ORDER BY w.id GROUP BY w.id";
			 
			$_SESSION['wsr_list']=$sqlglobal;
			
			$title = $langfile["navigation_title_management_workschedule_liste"];
			$template->assign("title", $title);
			$template->display("template_management_workschedule_wsr_list.tpl");
			

}

?>