<?php

	require("./init.php");

  if (!isset($_SESSION['userid'])) {
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
	
	$mainmenu = array("grh" => "active");
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
	$user_group   = (object) new user_group();
	$user         = (object) new user(); 
	
	switch ($action) {
		case "teamcalendar":
			
			$title = $langfile["navigation_title_admin_grh_teamcalendar"]; 
			$template->assign("title", $title); 
			$template->display("template_admin_grh_teamcalendar.tpl");
	    	
		break;
		
		case "add_usergroup":
			
			$title = $langfile["navigation_title_admin_usergroup_add"]; 
			$users = $user->getAllUsers($lim = 999);
			$template->assign("title", $title);
			$template->assign("users", $users); 
			$template->display("template_admin_usergroup_add.tpl");
	    	
		break;
		
		case "submit_usergroup":
			
			$ug_id           = getArrayVal($_POST, "id");
			$ug_description  = getArrayVal($_POST, "description");
			$ug_leaderid     = getArrayVal($_POST, "leader");
			
			if($user_group->get($ug_id)){
				$user_group->update($ug_id, $ug_description, $ug_leaderid);
				$mylog->add('ug','admin',$ug_id);
			} else {
				$user_group->add($ug_description, $ug_leaderid);
				$mylog->add('ug','admin',$ug_id);
			}
			$title = $langfile["navigation_title_admin_usergroup_list"];
			$template->assign("title", $title);
			$template->display("template_admin_usergroup_group_list.tpl");
	    	
		break;

		case "edit_usergroup":
			
			$ug_id     = getArrayVal($_GET, "id");
			$usergroup = $user_group->get($ug_id);
			
			$title = $langfile["navigation_title_admin_usergroup_edit"]; 
			$template->assign("title", $title);
			$template->assign("usergroup", $usergroup);
			
			$template->display("template_admin_usergroup_add.tpl");
	    	
		break;
		
		case "list_usergroup":
			$edit_alt   = mysql_real_escape_string($langfile["navigation_title_management_daily_wsr_edit"]);
			$delete_alt = mysql_real_escape_string($langfile["dico_management_dws_delete"]);
		
			//$view1 = "<a onclick=\"javascript=viewClient(";
			//$view2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_comment.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			//$detail1 = "<a onclick=\"javascript=detailClient(";
			//$detail2 = ")\" >";
			//$detail3 = "</a>";
			
			$edit1 = "<a onclick=\"javascript=editUserGroup(\'";
			$edit2 = "\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_edit.png\" alt=\"".$edit_alt.  "\" title=\"".$edit_alt.  "\" border=\"0\" /></a>";
			//$edit1 = "<a href=\"management_workschedule.php?action=edit_dws&id=";
			//$edit2 = "\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_edit.png\" alt=\"".$edit_alt.  "\" title=\"".$edit_alt.  "\" border=\"0\" /></a>";
			
			$delete1 = "<a onclick=\"javascript=deleteUserGroupConfirmBox(\'";
			$delete2 = "\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_delete.png\" alt=\"".$delete_alt."\" title=\"".$delete_alt."\" border=\"0\" /></a>";
			
			$sqlglobal= "select concat('$edit1',ug.id,'$edit2',' ','$delete1',ug.id,'$delete2'), ug.description, concat(u.familyname, ' ', u.firstname) FROM user_group ug, user u WHERE ug.leader = u.ID";
			 
			$_SESSION['usergrouplist']=$sqlglobal;
			
			$title = $langfile["navigation_title_admin_usergroup_list"];
			$template->assign("title", $title);
			$template->display("template_admin_usergroup_group_list.tpl");
			
		break;
		
		    
		case "delete_ug":
			
			$ug_id = getArrayVal($_GET, "id");
			$user_group->delete($ug_id);
			$loc = $url . "admin_grh.php?action=list_usergroup";
            header("Location: $loc");
			
			break;
		
		case "add_assignment":
			
			$ug_id = getArrayVal($_POST, "group_id");
			$u_id  = getArrayVal($_POST, "user_id");
			
			$allGroup = $user_group->getAll();
			$allUser  = $users = $user->getAllUsers($lim = 999);
			$title = $langfile["navigation_title_admin_usergroup_list"];
			$template->assign("title", $title);
			$template->assign("users", $allUser);
			$template->assign("groupes", $allGroup);
			$template->display("template_admin_usergroup_assignment_add.tpl");
	    	
		break;
		
		case "submit_assignment":
			
			$ug_id = getArrayVal($_POST, "group");
			$u_id  = getArrayVal($_POST, "member");
			
			$next_ponderation = $user_group->getPonderation($u_id) + 1;
			
			$user_group->addAssignment($ug_id, $u_id, $next_ponderation);
			$loc = $url . "admin_grh.php?action=list_assignment";
            header("Location: $loc");
	    	
		break;
		
		case "list_assignment":
			
			$delete_alt = mysql_real_escape_string($langfile["dico_management_wsr_delete"]);
			
			$delete1 = "<a onclick=\"javascript=deleteUserAssignmentConfirmBox(\'";
			$delete2 = "\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/calendar_delete.png\" alt=\"".$delete_alt."\" title=\"".$delete_alt."\" border=\"0\" /></a>";
			
			$sqlglobal= "select concat('$delete1',u.id,'$delete2'), ug.description, concat(u2.familyname, ' ', u2.firstname), concat(u.familyname, ' ', u.firstname) FROM user u, user u2, user_group ug, group_assignment ga WHERE ga.user_id = u.ID AND ga.group_id = ug.id AND u2.ID = ug.leader";
			 
			$_SESSION['assignmentlist']=$sqlglobal;
			
			$title = $langfile["navigation_title_admin_usergroup_assignment_list"];
			$template->assign("title", $title);
			$template->display("template_admin_usergroup_assignment_list.tpl");
			
		break;	
/*A continuer ici*/
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
			
			$ug_id = getArrayVal($_POST, "group_id");
			$u_id  = getArrayVal($_POST, "user_id");
			
			$allGroup = $user_group->getAll();
			$allUser  = $users = $user->getAllUsers($lim = 999);
			$title = $langfile["navigation_title_admin_usergroup_list"];
			$template->assign("title", $title);
			$template->assign("users", $allUser);
			$template->assign("groupes", $allGroup);
			$template->display("template_admin_usergroup_assignment_add.tpl");
	    	

}

?>