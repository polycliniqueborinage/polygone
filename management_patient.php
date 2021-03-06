<?php

	require("./init.php");

		  if (!isset($_SESSION['userid'])) {
$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	$action = getArrayVal($_GET, "action");
	$id = getArrayVal($_GET, "id");
	$mode = getArrayVal($_GET, "mode");
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$limit = getArrayVal($_POST, "limit");
	$value = strtolower(utf8_decode(trim(getArrayVal($_POST, "value"))));

	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if (($modules['management_patient_adminstate']== null || $adminstate < $modules['management_patient_adminstate']) && $action!='modulesearch') {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management_active", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("patient" => "active");
	$template->assign("mainmenu", $mainmenu);
	
	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass);
	} else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	$mylog = (object) new mylog();
	$patient = (object) new patient();
	$ct1ct2 = (object) new ct1ct2();
	$mutuelle = (object) new mutuel();
	$tarification = (object) new tarification();
	
	switch ($action) {
		
		case "add":
			// Inclus le fichier contenant les fonctions BeID
			//include_once './lib/BEIDCard.php';
			$title = $langfile["navigation_title_management_patient_add"];
			$mutuelles = $mutuelle->getall();
			$ct1ct2s = $ct1ct2->getall();
			
			$template->assign("title", $title);
			$template->assign("mutuelles", $mutuelles);
			$template->assign("ct1ct2s", $ct1ct2s);
			
			$template->display("template_management_patient_add.tpl");
	    
			break;
	    
	    case "edit":
	    	$title = $langfile["navigation_title_management_patient_edit"];
			$mutuelles = $mutuelle->getall();
			$ct1ct2s = $ct1ct2->getall();
	    	$patient = $patient->get($id);

			$template->assign("title", $title);
			$template->assign("mutuelles", $mutuelles);
			$template->assign("ct1ct2s", $ct1ct2s);
			$template->assign("patient", $patient);

	    	$template->display("template_management_patient_add.tpl");

			break;
	    
		case "submit":
			
			$ID = getArrayVal($_POST, "id");
			$titulaireID = getArrayVal($_POST, "titulaire_id");
			$familyname  = ucfirst(strtolower(getArrayVal($_POST, "familyname")));
			$firstname = ucfirst(strtolower(getArrayVal($_POST, "firstname")));
			$birthday = getArrayVal($_POST, "birthday");
			$gender = getArrayVal($_POST, "gender");
			$nationality = getArrayVal($_POST, "nationality"); 
			$niss = getArrayVal($_POST, "niss");
			
			$adress1 = getArrayVal($_POST, "address1");
			$zip1city1 = getArrayVal($_POST, "zip1city1");
			
			//$workphone = getArrayVal($_POST, "workphone");
			$privatephone = getArrayVal($_POST, "privatephone");
			$mobilephone = getArrayVal($_POST, "mobilephone");
			//$fax = getArrayVal($_POST, "fax");
			$email = getArrayVal($_POST, "email");
			$receiveMail = getArrayVal($_POST, "receive_mail"); 
			
			$mutuelCode = getArrayVal($_POST, "mutuelle_code"); 
			$mutuelMatricule = getArrayVal($_POST, "mutuelle_matricule"); 
			$sis = getArrayVal($_POST, "sis"); 
			$ct1ct2 = getArrayVal($_POST, "ct1ct2"); 
			$tiersPayant = getArrayVal($_POST, "tiers_payant"); 
			$doctor = getArrayVal($_POST, "doctor");
			$tiers_payant_info = getArrayVal($_POST, "tiers_payant_info");
			$vipo_info = getArrayVal($_POST, "vipo_info");
			$mutuelle_info = getArrayVal($_POST, "mutuelle_info");
			$interdit_info = getArrayVal($_POST, "interdit_info");
			$rating_rendez_vous_info = getArrayVal($_POST, "rating_rendez_vous_info");
			$rating_frequentation_info = getArrayVal($_POST, "rating_frequentation_info");
			$rating_preference_info = getArrayVal($_POST, "rating_preference_info");
			$commentaire = getArrayVal($_POST, "commentaire"); 
			$textcomment = getArrayVal($_POST, "textcomment");
			
			$fumeur = getArrayVal($_POST, "fumeur");
			$obese = getArrayVal($_POST, "obese");
			
			if ($ID != '') {
				
				$result = $patient->update($titulaireID, $firstname, $familyname, $birthday, $gender, $nationality, $niss, $address1, $zip1city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $receiveMail, $mutuelCode, $mutuelMatricule, $sis, $ct1ct2,  $tiersPayant, $doctor, $tiers_payant_info, $vipo_info, $mutuelle_info, $interdit_info, $rating_rendez_vous_info, $rating_frequentation_info, $rating_preference_info, $commentaire, $textcomment, $fumeur, $obese, $ID);
					
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('patient','update',$action);
					$loc = $url . "management_patient.php?action=view&mode=edited&id=" .$ID;
	        	    header("Location: $loc");
	       		}
				
			} else {
				
				$result = $patient->add($titulaireID, $firstname, $familyname, $birthday, $gender, $nationality, $niss, $address1, $zip1city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $receiveMail, $mutuelCode, $mutuelMatricule, $sis, $ct1ct2,  $tiersPayant, $doctor, $tiers_payant_info , $vipo_info , $mutuelle_info , $interdit_info , $rating_rendez_vous_info , $rating_frequentation_info , $rating_preference_info , $commentaire , $photo , $textcomment, $fumeur, $obese);
	        	
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('patient','add',$action);
					$loc = $url . "management_patient.php?action=view&mode=saved&id=" . $result;
	        	    header("Location: $loc");
	       		}
	       		
	        }

	        break;
		    

		case "delete":
			$ID = getArrayVal($_GET, "id");
			$deletedpatient = $patient->get($ID);
			$firstname = $deletedpatient["firstname"];
			$lastname = $deletedpatient["lastname"];
			$result = $patient->delete($ID);
	        	
			if ($result) {
				$action = $firstname." ".$familyname;
        		$mylog->add('patient','delete',$action);
				$loc = $url . "management_patient.php?action=search";
        	    header("Location: $loc");
       		}
	    
			break;		
		
		case "list":
			$edit_alt = $langfile["dico_management_patient_edit_alt"];
			$detail_alt = $langfile["dico_management_patient_detail_alt"];
		
			$view1 = "<a onclick=\"javascript=viewPatient(";
			$view2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_comment.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			//$view1 = "<a onclick=\'javascript=viewPatient(";
			//$view2 = ")\' ><img width=\'16\' height=\'16\' src=\'./templates/standard/img/16x16/user_comment.png\' alt=\'".$edit_alt."\' title=\'".$edit_alt."\' border=\'0\' /></a>";
			
			$detail1 = "<a onclick=\"javascript=detailPatient(";
			$detail2 = ")\" >";
			$detail3 = "</a>";
			
			//$detail1 = "<a onclick=\'javascript=detailPatient(";
			//$detail2 = ")\' >";
			//$detail3 = "</a>";
			
			$edit1 = "<a onclick=\"javascript=editPatient(";
			$edit2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_edit.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			//$edit1 = "<a onclick=\'javascript=editPatient(";
			//$edit2 = ")\' ><img width=\'16\' height=\'16\' src=\'./templates/standard/img/16x16/user_edit.png\' alt=\'".$edit_alt."\' title=\'".$edit_alt."\' border=\'0\' /></a>";
			
			$tierspayant1 = "<input type=\'checkbox\' ";
			$tierspayant2 = " disabled=\'true\' />";
			
			//$sqlglobal= "select concat('$edit1',p.id,'$edit2',' ','$view1',p.id,'$view2'), concat('$detail1',p.id,'$detail2',p.nom,'$detail3'), concat('$detail1',p.id,'$detail2',p.prenom,'$detail3'), concat('<div style=\'display: none;\' >',p.date_naissance,'</div>',date_format(p.date_naissance, '%d/%m/%Y')), concat(t.nom,' ',t.prenom),  p.mutuelle_code, CONCAT(p.ct1,'/',p.ct2), concat('$tierspayant1',p.tiers_payant,'$tierspayant2'), p.mutuelle_matricule, p.telephone, p.gsm, p.mail FROM patients p , patients t WHERE p.titulaire_id = t.id AND p.nom like '$urlLetter%' AND p.active='1' ORDER BY 1,2";
			$sqlglobal= "select concat('<a>',p.id, '</a>'), concat(p.id,p.nom), concat(p.id,p.prenom), concat(p.date_naissance,date_format(p.date_naissance, '%d/%m/%Y')), concat(t.nom,' ',t.prenom),  p.mutuelle_code, CONCAT(p.ct1,'/',p.ct2), concat(p.tiers_payant), p.mutuelle_matricule, p.telephone, p.gsm, p.mail FROM patients p , patients t WHERE p.titulaire_id = t.id AND  p.active='1' ORDER BY 1,2";
			
			echo $sqlglobal;
			$_SESSION['patientlist']=$sqlglobal;
			
			$title = $langfile["navigation_title_management_patient_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_patient_list.tpl");
		break;

		case "view":
	    	$title = $langfile["navigation_title_management_patient_view"];
			$patients = $patient->get($id);
			//print_r($patient);
		
			$tarifications = $tarification->getAllForOnePatient($id);
			

			$template->assign("mode", $mode);
			$template->assign("title", $title);
			$template->assign("patient", $patients);
			$template->assign("tarifications", $tarifications);
			
			$template->display("template_management_patient_view.tpl");
		break;
		
		case "detail":
			
			$title = $langfile["navigation_title_management_patient_view"];
			$patient = $patient->get($id);
			print_r($patient);
			$tarifications = $tarification->getAllForOnePatient($id);

			$template->assign("title", $title);
			$template->assign("patient", $patient);
			$template->assign("tarifications", $tarifications);
			
			$template->display("template_management_patient_detail.tpl");
		break;
		
		
		case "modulesearchtitulaire":

			$titulaires = $patient->modulesearch($id,$value,$limit);
			
			$template->assign("titulaires", $titulaires);

			if ($type == 'complete') {
				$template->display("template_management_gestion_complete_search.tpl");
			} else {
				if ($type == 'simple') {
					$template->display("template_management_gestion_simple_search.tpl");
				} else {
					$template->display("template_management_patient_gestion_overlay_search_titulaire.tpl");
				}
			}
			
			break;
		
		case "modulesearch":

			$patients = $patient->modulesearch($id,$value,$limit);
			
			$template->assign("patients", $patients);

			if ($type == 'complete') {
				$template->display("template_management_gestion_complete_search.tpl");
			} else {
				if ($type == 'simple') { 
					$template->display("template_management_gestion_simple_search.tpl");
				} else {
					$template->display("template_management_patient_gestion_overlay_search.tpl");
				}
			}
			
			break; 
			
		case "autocomplete":
			
			$patient->autocomplete($id,$value);
			
			break;
					
	    default:
	    	$title = $langfile["navigation_title_management_patient_search"];
	
			$template->assign("title", $title);

			$template->display("template_management_patient_search.tpl");
	}

?>
