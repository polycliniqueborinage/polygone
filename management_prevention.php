<?php

	require("./init.php");

		  if (!isset($_SESSION['userid'])) {
$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	if ($adminstate < 4) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}

	$action = getArrayVal($_GET, "action");
	$id_list = getArrayVal($_GET, "id_list");
	$id = getArrayVal($_GET, "id");
	$value = getArrayVal($_GET, "value");
	$mode = getArrayVal($_GET, "mode");

	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management_active", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("prevention" => "active");
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
	$prevention = (object) new prevention();
	$patient = (object) new patient();
	
	switch ($action) {
		
		case "add":
			
			$title = $langfile["navigation_title_management_prevention_add"];
			
			$template->assign("title", $title);
			
			$template->display("template_management_prevention_add.tpl");
						
			break;

		case "edit":

			$title = $langfile["navigation_title_management_prevention_edit"];
			$motif = $prevention->getMotif($id);
			
			$template->assign("title", $title);
			$template->assign("motif", $motif);
			
			$template->display("template_management_prevention_add.tpl");
				    	
			break;
	    
		case "submit":
				
			$id = getArrayVal($_POST, "id");
			$description = getArrayVal($_POST, "description");
			$period = getArrayVal($_POST, "period");
			$period_unit = getArrayVal($_POST, "period_unit");
			$main_text = getArrayVal($_POST, "main_text");
			$rappel = getArrayVal($_POST, "rappel");
			$request = getArrayVal($_POST, "request");
			$frequency = getArrayVal($_POST, "frequency");
			$sender_name  = getArrayVal($_POST, "sender_name");
			$sender_address1 = getArrayVal($_POST, "sender_address1");
			$sender_zip1city1 = getArrayVal($_POST, "sender_zip1city1");
			$sender_mail = getArrayVal($_POST, "sender_mail");
			$sender_reply = getArrayVal($_POST, "sender_reply");
						
			if ($id != '') {
				
				$result = $prevention->updateMotif($description, $period, $period_unit, $main_text, $rappel, $frequency, $sender_name, $sender_address1, $sender_zip1city1, $sender_mail, $sender_reply, $id);
					
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('addressbook','update',$action);
					$loc = $url . "management_prevention.php?action=activation&mode=edited";
	        	    header("Location: $loc");
	       		}
				
			} else {
				
				$result = $prevention->addMotif($description, $period, $period_unit, $main_text, $rappel, $request, $frequency, $sender_name, $sender_address1, $sender_zip1city1, $sender_mail, $sender_reply);
	        	
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('addressbook','add',$action);
					$loc = $url . "management_prevention.php?action=activation&mode=added";
	        	    header("Location: $loc");
	       		}
	       		
	        }

	        break;
	        
		case "list":
			
			$title = $langfile["navigation_title_management_prevention_list"];
			
			$status1 = $langfile["dico_management_prevention_to_contact"];
			$status2 = $langfile["dico_management_prevention_contacted"];
			$status3 = $langfile["dico_management_prevention_presented"];
			$status4 = $langfile["dico_management_prevention_call_back"];
			$status5 = $langfile["dico_management_prevention_close"];
		
			$template->assign("title", $title);
		
			$checkbox1 = "<input type=\'checkbox\' name=\'cases\' value=\'";
			$checkbox2 = "\' onclick=javascript:controle(\'";
			$checkbox3 = "\') id=\'check";
			$checkbox4 = "\' />";
			
			$sqlglobal= "SELECT pa.nom, pa.prenom, concat(pa.rue,' ',pa.code_postal,' ',pa.commune), pa.telephone, pa.gsm, pa.mail, mp.description, CONCAT('<div style=display:none>',pi.date_derniere_modification,'</div>', date_format(pi.date_derniere_modification, '%d/%m/%Y')), REPLACE(REPLACE(REPLACE(REPLACE(REPLACE( pi.statut, 'a_contacter', '$status1' ),'contacte','$status2'),'rdv_pris','$status3'),'a_rappeler','$status4'),'termine','$status5'), concat('$checkbox1',pi.id_motif,'_',pi.id_patient,'$checkbox2',pi.id_motif,'_',pi.id_patient,'$checkbox3',pi.id_motif,'_',pi.id_patient,'$checkbox4') FROM mp_pile pi, patients pa, medecine_preventive mp WHERE statut!='termine' AND pa.id = pi.id_patient AND mp.motif_ID = pi.id_motif ORDER BY statut";
			
			$_SESSION['preventionlist']=$sqlglobal;
			
			$title = $langfile["navigation_title_management_prevention_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_prevention_list.tpl");
						
			break;
			
		case "list_deleted":
			
			$title = $langfile["navigation_title_management_prevention_list_deleted"];
			
			$sqlglobal= "SELECT pa.nom, pa.prenom, concat(pa.rue,' ',pa.code_postal,' ',pa.commune), pa.telephone, pa.gsm, pa.mail, mp.description, CONCAT('<div style=display:none>',pi.date_derniere_modification,'</div>', date_format(pi.date_derniere_modification, '%d/%m/%Y')) FROM mp_pile pi, patients pa, medecine_preventive mp WHERE pa.id = pi.id_patient AND mp.motif_ID = pi.id_motif AND statut='termine' ORDER BY date_derniere_modification DESC";
			$_SESSION['preventionlistdeleted']=$sqlglobal;
			
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_prevention_list_deleted.tpl");
						
			break;
			
		case "activation":
			
			$title = $langfile["navigation_title_management_prevention_activation"];
    		$motifs = $prevention->getAllMotif();
			$today = date("Y-m-d");
    		
			$template->assign("title", $title);
			$template->assign("mode", $mode);
			$template->assign("motifs", $motifs);
			$template->assign("today", $today);
			
			$template->display("template_management_prevention_activation.tpl");
						
			break;
			
		// INTERNE
		case "print_courriel_test":
			
			include("./include/class.fpdf.php");
		    $pdf = (object) new pdfhtml('P', 'pt', 'A4');
		    
		    $preventioni = $prevention->getMotif($id);
			$patienti = $patient->get(1);
			
			$pdf->AddPage();
				
			$pdf->SetFont('Arial', 'B', '10');
				
			$pdf->Image('./templates/standard/img/letter/entete_poly.png', 0, 0, 595, 170);
				
			//espace
			$pdf->Cell(0, 100, '', '', 2);
				
			$gender = $langfile["dico_management_prevention_colum_gender_".$patienti["gender"]];
				
			$pdf->Cell(0,  50, '', '', 2);
			
			//descriptif du patient - alignement gauche
			$pdf->Cell(500, 10, $gender." ".$patienti['familyname']." ".$patienti['firstname'], 'R', 2, 'R');
			$pdf->Cell(500, 10, $patienti['address1'], 'R', 2, 'R');
			$pdf->Cell(500, 10, $patienti['zip1']." ".$patienti['city1'], 'R', 2, 'R');
		
			//texte pour le rappel
			$pdf->Cell(0, 10, '', '', 2);
			$pdf->Cell(0, 20, $preventioni['rappel'], '', 2, 'L');
				
			//espace
			$pdf->Cell(0, 10, '', '', 2);
				
			// get date
			setlocale(LC_TIME, fr_FR);
			$today = ucfirst(strftime('%A, %d %B %Y',strtotime(date("m/d/Y"))));
			$pdf->Cell(500, 70, $today, '', 2, 'L');

			//texte principale de la lettre - alignement gauche
			$pdf->Cell(0, 30, '', '', 2);
			$pdf->Cell(0, 20, $gender." ".$patienti['familyname'].',', '', 2, 'L');
			$pdf->Cell(0, 40, '', '', 2);
			
			$mainText = $preventioni['main_text'];
				
			$pdf->WriteHTML($mainText);
				
			$tok = strtok("||");
				
			$pdf->output();
			
			break;
			
			
		// INTERNE
		case "print_courriel_contact":
			
			include("./include/class.fpdf.php");
		    $pdf = (object) new pdfhtml('P', 'pt', 'A4');
		    
		    $id_list = substr($id_list,1)."|";
		    
			$tok = strtok($id_list,"||");
			
			while ($tok !== false && $tok!='') {
				
				$id_motif = substr($tok, 0, strrpos($tok, "_")); 
				$id_patient = substr($tok, strrpos($tok, "_")+1);
				
				$preventioni = $prevention->getMotif($id_motif);
				
				$contactStatus = $prevention->getContactStatus($id_patient,$id_motif);
				
				$patienti = $patient->get($id_patient);
				
				// change status
				$prevention->changeContactStatus($id_patient,$id_motif,"contacte");
				
				$pdf->AddPage();
				
				$pdf->SetFont('Arial', 'B', '10');
				
				$pdf->Image('./templates/standard/img/letter/entete_poly.png', 0, 0, 595, 170);
				
				//espace
				$pdf->Cell(0, 100, '', '', 2);
				
				$gender = $langfile["dico_management_prevention_colum_gender_".$patienti["gender"]];
				
				$pdf->Cell(0,  50, '', '', 2);
			
				//descriptif du patient - alignement gauche
				$pdf->Cell(500, 10, $gender." ".$patienti['familyname']." ".$patienti['firstname'], 'R', 2, 'R');
				$pdf->Cell(500, 10, $patienti['address1'], 'R', 2, 'R');
				$pdf->Cell(500, 10, $patienti['zip1']." ".$patienti['city1'], 'R', 2, 'R');
		
				//texte pour le rappel
				if ($contactStatus == "a_rappeler") {
					$pdf->Cell(0, 10, '', '', 2);
					$pdf->Cell(0, 20, $preventioni['rappel'], '', 2, 'L');
					$pdf->Cell(0, 10, '', '', 2);
				} else {
					//espace
					$pdf->Cell(0, 30, '', '', 2);
				}
				
				
				// get date
				setlocale(LC_TIME, fr_FR);
				$today = ucfirst(strftime('%A, %d %B %Y',strtotime(date("m/d/Y"))));
				$pdf->Cell(500, 70, $today, '', 2, 'L');

				//texte principale de la lettre - alignement gauche
				$pdf->Cell(0, 30, '', '', 2);
				$pdf->Cell(0, 20, $gender." ".$patienti['familyname'].',', '', 2, 'L');
				$pdf->Cell(0, 40, '', '', 2);
				
				$mainText = $preventioni['main_text'];
				
				$pdf->WriteHTML($mainText);
				
				$tok = strtok("||");
				
			}

			$pdf->output();
			break;
			
		case "mailing_contact":
			
		    $id_list = substr($id_list,1)."|";
			$tok = strtok($id_list,"||");
			
			while ($tok !== false && $tok!='') {
				
				$id_motif = substr($tok, 0, strrpos($tok, "_")); 
				$id_patient = substr($tok, strrpos($tok, "_")+1);
				
				$preventioni = $prevention->mailingContact($id_patient,$id_motif);
				
				$tok = strtok("||");
			}

			break;
			
		case "delete_contact":
			
		    $id_list = substr($id_list,1)."|";
			$tok = strtok($id_list,"||");
			
			while ($tok !== false && $tok!='') {
				
				$id_motif = substr($tok, 0, strrpos($tok, "_")); 
				$id_patient = substr($tok, strrpos($tok, "_")+1);
				
				$prevention->deleteContact($id_patient,$id_motif);
				
				$tok = strtok("||");
			}

			break;
			
		case "change_motif_activation":
			
			$prevention->changeMotifActivation($id,$value);

			break;			
		
		case "change_motif_time_agv":
			
			$prevention->changeMotifTimeAgv($id,$value);

			break;			
			
		case "delete_motif":
			
		    $prevention->deleteMotif($id,$value);

			break;
						
		case "detail_motif":

			$motif = $prevention->getMotif($id);
			
			$template->assign("motif", $motif);
			
			$template->display("template_management_prevention_motif_detail.tpl");
			
	        break;

			
		case "detail_patient":

			//$patient = $patient->get($id);
			//$tarifications = $tarification->getAllTarificationForPatient($id);
			
			$template->assign("motif", $motif);
			
			$template->display("template_management_patient_full_detail.tpl");
			
	        break;
	        
	    case "start_motif_batch":
			
	  		$reponse['first_insertion'] = 0;
	  		$reponse['to_call_back'] = 0;
	  		$reponse['init_contact'] = 0;
	  		$reponse['still_exist'] = 0;
	  		$reponse['deleted'] = 0;
	  		$reponse['contacted'] = 0;
	  		
	  		$motif = $prevention->getMotif($id);
			
			// periode avant le rappel !
			switch($motif['periode_base']){
				case 'jours':
					$periodNB = round($motif['periode_nb']);
					break;
				case 'mois':
					$periodNB = round($motif['periode_nb'] * 30);
					break;
				case 'annees':
					$periodNB = round($motif['periode_nb'] * 365);
				break; 
			}
			
			// what id recurrence
			switch($motif['recurrence']){
				case 'annuelle':
					$recurrence = 365;
					break;
				case 'semestrielle':
					$recurrence = 183;
					break;
				case 'trimestrielle':
					$recurrence = 91;
					break;
				case 'mensuelle':
					$recurrence = 30;
					break;
				case 'hebdomadaire':
					$recurrence = 7;
					break;
			}
			
			$today = date("Y-m-d");
			
			// get request for this id
			$request = str_replace('\\', '', $motif['requete']);

			for($i=0; $i<strlen($request); $i++){
				
				if($request[$i] == 0 && $request[$i+4] == '-' && $request[$i+7] == '-'){
					
					$annee     = date("Y") - substr($request, $i, 4);
					$mois      = date("m") - substr($request, $i+5, 2);
					$jour      = date("d") - substr($request, $i+8, 2);
						
					if(strlen($mois) == 1){
						$mois = '0'.$mois; 
					}
						
					if(strlen($jour) == 1){
						$jour = '0'.$jour; 
					}
					
					$request = substr_replace($request, $annee, $i,   4);
					$request = substr_replace($request, $mois,  $i+5, 2);
					$request = substr_replace($request, $jour,  $i+8, 2);
				}
			}
			
			// execute request which has been modified
			$records = $prevention->executeQuery($request);
			
			while($record = mysql_fetch_assoc($records)){
				
				// for each record we need to check what to do with it
				$contact = $prevention->getContact($record['id'],$id);
				
				if($contact) {
					
					//Un record existe deja pour ce motif et cette personne
					// Si status = contacte
					// Si le patient a ete contacté depuis plus de la moiter du temps du rappel
					if($recurrence < $prevention->getDiffDay($contact['date_derniere_modification'],$today)){
							//supprimer l'ancien record and ajouter le nouveau
							$sql = "UPDATE `mp_pile` SET statut='a_contacter', date_derniere_modification='$today', date_derniere_verification='$today' WHERE id_motif = ".$id." AND id_patient = ".$record['id']."  AND statut != 'deleted'";
							$reponse['init_contact'] ++;
							$prevention->executeQuery($sql);	
					} else{

						if($periodNB <= $prevention->getDiffDay($contact['date_derniere_modification'],$today) && $contact['statut'] == 'contacte'){
						
						//si la date de rappel est depassee et qu'on a deja contacte, il faut avertir l'utilisateur pour effectuer un rappel
						$sql= "UPDATE `mp_pile` SET statut='a_rappeler', date_derniere_modification='$today', date_derniere_verification='$today'  WHERE id_motif = '".$id."' AND id_patient  	= '".$record['id']."' AND statut != 'deleted'";
						$reponse['to_call_back'] ++; 
						$prevention->executeQuery($sql);
						} else {
							
							//sinon, si la periode entre maintenant et le dernier contact est plus grande que la recurrence du motif
							if($recurrence < $prevention->getDiffDay($contact['date_derniere_modification'],$today)){
								//supprimer l'ancien record and ajouter le nouveau
								$sql = "UPDATE `mp_pile` SET statut='a_contacter', date_derniere_modification='$today', date_derniere_verification='$today' WHERE id_motif = ".$id." AND id_patient = ".$record['id']."  AND statut != 'deleted'";
								$reponse['init_contact'] ++;
								$prevention->executeQuery($sql);	
							} else {
	
								$sql = "UPDATE `mp_pile` SET date_derniere_verification='$today' WHERE id_motif = ".$id." AND id_patient = ".$record['id']."  AND statut != 'deleted'";
								$reponse['still_exist'] ++;
								$prevention->executeQuery($sql);	
								
							}

						}
						
					}
					
				} else{
						
						// si contact existe pas alors il faut inserer un record car la personne doit etre contactee
						$sql = "INSERT INTO `mp_pile` ( `id_motif` , `id_patient` , `date_derniere_modification` , `date_derniere_verification`, `statut`) VALUES ('$id', '".$record['id']."',  '$today', '$today', 'a_contacter')";
						$reponse['first_insertion'] ++;
						$prevention->executeQuery($sql);
						
				}
					
			}
			
			//quid de suppression qui n'ont pas été touchés et donc ne sont plus valides
			$sql = "UPDATE `mp_pile` SET date_derniere_modification='$today', date_derniere_verification='$today', `statut`='termine' WHERE `date_derniere_verification` < '$today' AND `statut` != 'termine'  AND `id_motif` = '$id'";
			$result = mysql_query($sql); 
			$reponse['deleted'] = mysql_affected_rows();

			//get all current contacted
			$sql = "SELECT COUNT(id_patient) as count from `mp_pile` WHERE `statut`='contacte' AND `id_motif` = '$id'";
			$sel = mysql_query($sql);
       		$result = mysql_fetch_array($sel);
			$reponse['contacted'] = $result['count'];
			
			// LOG IN DB
			$result = $prevention->saveMotifBatch($id,$reponse['first_insertion'],$reponse['to_call_back'],$reponse['init_contact'],$reponse['still_exist'],$reponse['deleted'],$reponse['contacted']);
			
			header('Content-Type: application/json');
			echo json_encode($reponse);
			
			break;
			
		case "timeplot":	
			
			$title = $langfile["navigation_title_management_prevention_timeplot"];
			$motifs = $prevention->getAllMotif();
			
			$template->assign("motifs", $motifs);
			$template->assign("title", $title);
			
			$template->display("template_management_prevention_timeplot.tpl");
						
			break;
			
		case "timeplot_data":	
			
			$status = $prevention->getTimeplotData($id);
						
			break;
			
		case "json_list":
			
			$examp 	= $_REQUEST["q"]; //query number
			$page 	= $_REQUEST['page']; // get the requested page
			$limit 	= $_REQUEST['rows']; // get how many rows we want to have into the grid
			$sidx 	= $_REQUEST['sidx']; // get index row - i.e. user click to sort
			$sord 	= $_REQUEST['sord']; // get the direction
			if($sidx == '') $sidx = 'statut';
			if($sord == '') $sidx = 'ASC';
			
			// search on
			$searchOn = $_REQUEST['_search'];
			
			// filter
			$filterOn = $_REQUEST['filters'];
			
			$wh = " 1 = 1 ";
			
			if($searchOn  || $filterOn) {
			    
			    $searchString = html_entity_decode($_REQUEST['filters']);
			    
			    // add simple search
			    if ($search_account_name) {
			        $wh .= "AND a.name like '".$search_account_name."%'";
			    }
			        
			}
			
			$search_name 		= $_REQUEST['nom'];
			$search_firstname 	= $_REQUEST['prenom'];
			$search_address 	= $_REQUEST['address'];
			$search_telephone	= $_REQUEST['telephone'];
			$search_gsm			= $_REQUEST['gsm'];
			$search_mail		= $_REQUEST['mail'];
			$search_description	= $_REQUEST['description'];
			$search_date		= $_REQUEST['date_derniere_modification'];
			$search_statut		= $_REQUEST['statut'];
			
			$wh = "";
			    // add simple search
		    if ($search_name != "") {
		        $wh .= "AND nom like '%".$search_name."%'";
		    }
			if ($search_firstname != "") {
		        $wh .= "AND prenom like '%".$search_firstname."%'";
		    }
			if ($search_address != "") {
		        $wh .= "AND (rue like '%".$search_address."%' OR code_postal like '%".$search_address."%' OR commune like '%".$search_address."%')";
		    }		    
			if ($search_telephone != "") {
		        $wh .= "AND telephone like '%".$search_telephone."%'";
		    }
			if ($search_gsm != "") {
		        $wh .= "AND gsm like '%".$search_gsm."%'";
		    }
			if ($search_mail != "") {
		        $wh .= "AND mail like '%".$search_mail."%'";
		    }
			if ($search_description != "") {
		        $wh .= "AND description like '%".$search_description."%'";
		    }		    
			if ($search_date != "") {
		        $wh .= "AND date_derniere_modification like '%".$search_date."%'";
		    }
			if ($search_statut != "") {
		        $wh .= "AND statut like '%".$search_statut."%'";
		    }
			
			// pagination
			$count = $prevention->countGeneral($wh);
			$total_pages = ($count > 0) ? ceil($count/$limit) : 0;
			$page = ($page > $total_pages) ? $total_pages : $page;
			$start = $limit * $page - $limit;			
			$start = ($start < 0) ? 0 : $start;
			
			//$sqlglobal= "select * FROM user WHERE ".$wh." ORDER BY ".$sidx." ".$sord." LIMIT ".$start.",".$limit;
			$sqlglobal= "SELECT pa.nom, pa.prenom, concat(pa.rue,' ',pa.code_postal,' ',pa.commune) as address, pa.telephone, pa.gsm, pa.mail, mp.description as description, pi.date_derniere_modification, pi.statut, pi.id_motif,pi.id_patient FROM mp_pile pi, patients pa, medecine_preventive mp WHERE statut!='termine' AND pa.id = pi.id_patient AND mp.motif_ID = pi.id_motif ".$wh." ORDER BY ".$sidx." ".$sord;
			
			
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $count;
			
			$responce->rows = $prevention->get_jsonGeneral($sqlglobal,$langfile,'management_prevention.php');
			
			echo json_encode($responce);
			
		break;

	case "json_list_traite":
			
			$examp 	= $_REQUEST["q"]; //query number
			$page 	= $_REQUEST['page']; // get the requested page
			$limit 	= $_REQUEST['rows']; // get how many rows we want to have into the grid
			$sidx 	= $_REQUEST['sidx']; // get index row - i.e. user click to sort
			$sord 	= $_REQUEST['sord']; // get the direction
			if($sidx == '') $sidx = 'statut';
			if($sord == '') $sidx = 'ASC';
			
			// search on
			$searchOn = $_REQUEST['_search'];
			
			// filter
			$filterOn = $_REQUEST['filters'];
			
			$search_name 		= $_REQUEST['nom'];
			$search_firstname 	= $_REQUEST['prenom'];
			$search_address 	= $_REQUEST['address'];
			$search_telephone	= $_REQUEST['telephone'];
			$search_gsm			= $_REQUEST['gsm'];
			$search_mail		= $_REQUEST['mail'];
			$search_description	= $_REQUEST['description'];
			$search_date		= $_REQUEST['date_derniere_modification'];
			$search_statut		= $_REQUEST['statut'];
			
			    // add simple search
		    if ($search_name != "") {
		        $wh .= "AND nom like '%".$search_name."%'";
		    }
			if ($search_firstname != "") {
		        $wh .= "AND prenom like '%".$search_firstname."%'";
		    }
			if ($search_address != "") {
		        $wh .= "AND (rue like '%".$search_address."%' OR code_postal like '%".$search_address."%' OR commune like '%".$search_address."%')";
		    }		    
			if ($search_telephone != "") {
		        $wh .= "AND telephone like '%".$search_telephone."%'";
		    }
			if ($search_gsm != "") {
		        $wh .= "AND gsm like '%".$search_gsm."%'";
		    }
			if ($search_mail != "") {
		        $wh .= "AND mail like '%".$search_mail."%'";
		    }
			if ($search_description != "") {
		        $wh .= "AND description like '%".$search_description."%'";
		    }		    
			if ($search_date != "") {
		        $wh .= "AND date_derniere_modification like '%".$search_date."%'";
		    }
			if ($search_statut != "") {
		        $wh .= "AND statut like '%".$search_statut."%'";
		    }
		
			
			// pagination
			$count = $prevention->countTraite($wh);
			$total_pages = ($count > 0) ? ceil($count/$limit) : 0;
			$page = ($page > $total_pages) ? $total_pages : $page;
			$start = $limit * $page - $limit;			
			$start = ($start < 0) ? 0 : $start;
			
			//$sqlglobal= "select * FROM user WHERE ".$wh." ORDER BY ".$sidx." ".$sord." LIMIT ".$start.",".$limit;
			$sqlglobal= "SELECT pa.nom, pa.prenom, concat(pa.rue,' ',pa.code_postal,' ',pa.commune) as address, pa.telephone, pa.gsm, pa.mail, mp.description as description, pi.date_derniere_modification, pi.statut, pi.id_motif,pi.id_patient FROM mp_pile pi, patients pa, medecine_preventive mp WHERE statut='termine' AND pa.id = pi.id_patient AND mp.motif_ID = pi.id_motif ".$wh." ORDER BY ".$sidx." ".$sord;
			
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $count;
			
			$responce->rows = $prevention->get_jsonTraite($sqlglobal,$langfile,'management_prevention.php');
			
			echo json_encode($responce);
			
		break;	
		
		default:
	    	$title = $langfile["navigation_title_management_prevention_status"];
			$status = $prevention->getStatus();
	    	
			$template->assign("title", $title);
			$template->assign("status", $status);
			
			$template->display("template_management_prevention_status.tpl");
	}

?>
