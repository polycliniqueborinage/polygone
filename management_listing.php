<?php

	require("./init.php");

  if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	if ($adminstate < 3) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}

	$action = getArrayVal($_GET, "action");
	$id = getArrayVal($_GET, "id");
	$mode = getArrayVal($_GET, "mode");

	$date_start = isset($_SESSION['date_start_listing_doctor']) ? $_SESSION['date_start_listing_doctor'] : date('d/m/Y');
	$date_start = isset($_POST['date_start']) ? $_POST['date_start'] : $date_start;
	
	$date_end = isset($_SESSION['date_end_listing_doctor']) ? $_SESSION['date_end_listing_doctor'] : date('d/m/Y');
	$date_end = isset($_POST['date_end']) ? $_POST['date_end'] : $date_end;
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management_active", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("listing" => "active");
	$template->assign("mainmenu", $mainmenu);

	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass);
	} else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	// my log
	$mylog = new mylog();
	$date = (object) new dates();
	$mailing	= (object) new mailing();
		
	// GET CURRENT DAY
	if (isset($_SESSION['listing_day'])) {
		$listingDay = $_SESSION['listing_day']; 
	} else { 
		$_SESSION['listing_day'] = date("d");
		$listingDay = $_SESSION['listing_day']; 
	}
	
	switch ($action) {
		
		
		case "mutuelle_pdf":
			
			include("./include/class.fpdf.php");
			
    		$title1 = "Total";
			$title2 = "M�decin";
			$title3 = "Polyclinique";
			$title4 = "Ticket mod�rateur";

			$title31 = "M�decin";
			$title32 = "Total";
			$title33 = "M�d.";
			$title34 = "Poly";
			$title35 = "T.M.";
			
			//Set maximum rows per page
			$max = 43;
			
			$widthglobal				=array(140, 140, 140, 140);
			$headerglobal				=array($title1,$title2,$title3,$title4);
			$row_heightglobale			= 16;
			
			$width						= array(50,30,140,100,44,52,40,40,40);
			$header						= array($title5,$title6,$title7,$title8,$title9,$title10,$title11,$title12,$title13);
			$row_height					= 12;
			
			$widthglobalresume			=array(152, 102, 102, 102, 102);
			$headerglobalresume			=array($title31,$title32,$title33,$title34,$title35);
			$row_heightglobaleresume	= 16;
			
			//echo $_SESSION['latestrequest']."<br/><br/>";
			
			$pos_from 		= strpos($_SESSION['latestrequest'], 'FROM');
			$pos_where 		= strpos($_SESSION['latestrequest'], 'WHERE');
			$pos_orderby 	= strpos($_SESSION['latestrequest'], 'ORDER BY');
			$pos_limit 		= strpos($_SESSION['latestrequest'], 'LIMIT');

			//echo "pos_from".$pos_from."<br/><br/>";
			//echo "pos_where".$pos_where."<br/><br/>";
			//echo "pos_orderby".$pos_orderby."<br/><br/>";
			//echo "pos_limit".$pos_limit."<br/><br/>";
			
			$from 			= substr($_SESSION['latestrequest'], $pos_from+4, $pos_where-($pos_from+4));
			$where 			= substr($_SESSION['latestrequest'], $pos_where+5, $pos_orderby-($pos_where+5));
			$orderby 		= substr($_SESSION['latestrequest'], $pos_orderby+8, $pos_limit-($pos_orderby+8));

			//echo "from".$from."<br/><br/>";
			//echo "where".$where."<br/><br/>";
			//echo "orderby".$orderby."<br/><br/>";
						
			// create PDF
		    $pdf = (object) new pdfhtml('P', 'pt', 'A4');
			
			// for each mutuelle
		    $sql= "SELECT distinct ta.mutuelle_code AS mutuelle_code FROM $from WHERE $where ORDER BY mutuelle_code";
		    echo $sql."<br/>";
			
			$result = mysql_query($sql);
			
			var_dump($result);
			
			die();
			
			while($data = mysql_fetch_assoc($result)) 	{

				// pour chaque mutuelle
				$mutuelle_code 		= $data['mutuelle_code'];
				$sqlmutuelle= "SELECT nom, code FROM mutuelles WHERE code='".$mutuelle_code."' LIMIT 1";
				
			    $resultmutuelle = mysql_query($sql);
			    $datamutuelle = mysql_fetch_assoc($resultmutuelle);
				$mutuelle_nom 		= $datamutuelle['nom'];
			    
			    //Add first page
				$pdf->AddPage();
				
				//initialize counter
				$i = 7;

				// Titre
				$pdf->SetFont('Arial','B',16);
				$pdf->Cell(18,10,"Listing pour ".$mutuelle_nom." (".$mutuelle_code.")");
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Ln();
				
				$sqlglobalresume= "select sum(round((td.cout_mutuelle - td.cout),2)) as cout FROM $from WHERE ta.mutuelle_code = '".$mutuelle_code."' AND td.cout < td.cout_mutuelle AND $where";
				echo $sqlglobalresume."<br/><br/>";
				
				$resultglobalresume = mysql_query($sqlglobalresume);
				$data = mysql_fetch_assoc($resultglobalresume);
	
				$pdf->SetFillColor(220,220,232);
				$pdf->SetFont('Arial','B',12);
				$pdf->Cell($widthglobal[0], $row_heightglobale, $headerglobal[0], 'LRTB');
		    	$pdf->Cell($widthglobal[1], $row_heightglobale, $headerglobal[1], 'LRTB');
		    	$pdf->Cell($widthglobal[2], $row_heightglobale, $headerglobal[2], 'LRTB');
		    	$pdf->Cell($widthglobal[3], $row_heightglobale, $headerglobal[2], 'LRTB');
				$pdf->Ln();
		    	$pdf->Cell($widthglobal[0], $row_heightglobale, round($data['cout_mutuelle'],2), 'LRTB');
		    	$pdf->Cell($widthglobal[1], $row_heightglobale, round($data['cout_medecin'],2), 'LRTB');
		    	$pdf->Cell($widthglobal[2], $row_heightglobale, round($data['cout_poly'],2), 'LRTB');
		    	$pdf->Cell($widthglobal[3], $row_heightglobale, round($data['cout_tm'],2), 'LRTB');
				
		    	$pdf->Ln();
				$pdf->Ln();
		    	
				$pdf->SetFont('Arial','B',11);
				$pdf->Cell($width[0],$row_height,'ID','LTB');
				$pdf->Cell($width[1],$row_height,'Date','LTB');
				$pdf->Cell($width[2],$row_height,'Mut','LTB');
				$pdf->Cell($width[3],$row_height,'Patient','LTB');
				$pdf->Cell($width[4],$row_height,'Matricule','LTB');
				$pdf->Cell($width[5],$row_height,'Titulaire','LTB');	
				$pdf->Cell($width[6],$row_height,'M�decin.','LTB');
				$pdf->Cell($width[7],$row_height,'Cecodi','LTB');
				$pdf->Cell($width[8],$row_height,'Co�t','LRTB');
				$pdf->Ln();
				
				$sqlglobal= "SELECT td.id as tarification_detail_id, ta.cloture as tarification_date_cloture, DATE_FORMAT(ta.date, GET_FORMAT(DATE, 'EUR')) as tarification_date, ta.mutuelle_code as tarification_mutuelle_code, ta.patient_matricule as tarification_patient_matricule, concat(ta.ct1, '/' ,ta.ct2) as tarification_patient_cts, ta.titulaire_matricule as tarification_titulaire_matricule, ta.medecin_inami as tarification_medecin_inami, pa.nom as patient_nom, pa.prenom as patient_prenom, ti.nom as titulaire_nom, ti.prenom as titulaire_prenom, me.nom as medecin_nom, me.prenom as medecin_prenom, td.cecodi as cecodi, round((td.cout_mutuelle - td.cout),2) as cout 
							 FROM $from WHERE ta.mutuelle_code = '".$mutuelle_code."' AND td.cout < td.cout_mutuelle AND $where ORDER BY ta.cloture, td.id";
				echo $sqlglobal."<br/><br/>";
				
				$resulttarif = mysql_query($sqlglobal);
			
				while($data = mysql_fetch_assoc($resulttarif)) 	{
					
					if ($i == $max) {
					
						// saut de page
						$pdf->AddPage();
						
						//initialize counter
						$i = 0;
						
						$pdf->SetFont('Arial','B',11);
						$pdf->SetFillColor(232,232,232);
						$pdf->Cell($width[0],$row_height,'ID','LTB');
						$pdf->Cell($width[1],$row_height,'Date','LTB');
						$pdf->Cell($width[2],$row_height,'Mut','LTB');
						$pdf->Cell($width[3],$row_height,'Patient','LTB');
						$pdf->Cell($width[4],$row_height,'Matricule','LTB');
						$pdf->Cell($width[5],$row_height,'Titulaire','LTB');	
						$pdf->Cell($width[6],$row_height,'M�decin.','LTB');
						$pdf->Cell($width[7],$row_height,'Cecodi','LTB');
						$pdf->Cell($width[8],$row_height,'Co�t','LRTB');
						$pdf->Ln();
				
			
					}
					
				    $id = $data['tarification_detail_id'];
					$date = substr($data['tarification_date_cloture'],2,8);
				    $mut = $data['tarification_mutuelle_code'];
					$patient = $data['patient_nom']." ".$data['patient_prenom'];
					$patient_matricule = $data['tarification_patient_matricule'];
					$titulaire = $data['titulaire_nom']." ".$data['titulaire_prenom'];
					$patient_cts = $data['tarification_patient_cts'];
					$medecin = $data['medecin_nom']." ".$data['medecin_prenom'];
					$medecin_inami = $data['tarification_medecin_inami'];
					$cecodi = $data['cecodi'];
					$cout = $data['cout'];

					$pdf->SetFillColor(255,255,255);
					$pdf->SetFont('Arial','',10);
					$pdf->Cell($width[0],$row_height,$id,'LB');
					$pdf->Cell($width[1],$row_height,$date,'LB');
					$pdf->Cell($width[2],$row_height,$mut,'LB');
					$pdf->Cell($width[2],$row_height,$patient,'LB');
					$pdf->Cell($width[3],$row_height,$patient_matricule,'LB');
					$pdf->Cell($width[4],$row_height,$titulaire,'LB');
					$pdf->Cell($width[5],$row_height,$patient_cts,'LB');	
					$pdf->Cell($width[6],$row_height,$medecin,'LB');
					$pdf->Cell($width[7],$row_height,$cecodi,'LB');
					$pdf->Cell($width[8],$row_height,$cout,'LRB');
					$pdf->Ln();
									
				    $i = $i + 1;
				
				}

			}
			
			// print resume
			$pdf->AddPage();
	
			//initialize counter
			$i = 3;

			// Titre
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(18,10,"R�capitulatif");
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			
			$pdf->SetFont('Arial','',12);
			$pdf->SetFillColor(232,232,232);

			$pdf->Cell($widthglobalresume[0], $row_heightglobaleresume, $headerglobalresume[0], 'LRTB');
		    $pdf->Cell($widthglobalresume[1], $row_heightglobaleresume, $headerglobalresume[1], 'LRTB');
			$pdf->Ln();
		    
		    $result = mysql_query($sql);

			// for each mutuelle
			while($data = mysql_fetch_assoc($result)) 	{

				// pour chaque mutuelle
				$mutuelle_code 		= $data['mutuelle_code'];
				$sqlmutuelle= "SELECT nom, code FROM mutuelles WHERE code='".$mutuelle_code."' LIMIT 1";
				
			    $resultmutuelle = mysql_query($sql);
			    $datamutuelle = mysql_fetch_assoc($resultmutuelle);
				$mutuelle_nom 		= $datamutuelle['nom'];
				
				if ($i == $max) {
					$pdf->AddPage();
					$i = 0;
					$pdf->SetFillColor(232,232,232);
					$pdf->Cell($widthglobalresume[0], $row_heightglobaleresume, $headerglobalresume[0], 'LRTB');
				    $pdf->Cell($widthglobalresume[1], $row_heightglobaleresume, $headerglobalresume[1], 'LRTB');
				    $pdf->Cell($widthglobalresume[2], $row_heightglobaleresume, $headerglobalresume[2], 'LRTB');
				    $pdf->Cell($widthglobalresume[3], $row_heightglobaleresume, $headerglobalresume[3], 'LRTB');
				    $pdf->Cell($widthglobalresume[4], $row_heightglobaleresume, $headerglobalresume[4], 'LRTB');
					$pdf->Ln();
				}
	
				$sqlglobalresume= "SELECT sum(round((td.cout_mutuelle - td.cout),2)) as cout 
								   FROM $from WHERE ta.mutuelle_code = '".$mutuelle_code."' AND td.cout < td.cout_mutuelle AND $where";
				echo $sqlglobalresume."<br/><br/>";
				$resulttarifresume = mysql_query($sqlglobalresume);
				$dataresume = mysql_fetch_assoc($resulttarifresume);
		
				$pdf->Cell($widthglobalresume[0], $row_heightglobaleresume, $doctor_familyname." ".$doctor_firstname, 'LRTB');
			    $pdf->Cell($widthglobalresume[1], $row_heightglobaleresume, round($dataresume['cout_mutuelle'],2), 'LRTB');
			    $pdf->Cell($widthglobalresume[2], $row_heightglobaleresume, round($dataresume['cout_medecin'],2), 'LRTB');
			    $pdf->Cell($widthglobalresume[3], $row_heightglobaleresume, round($dataresume['cout_poly'],2), 'LRTB');
			    $pdf->Cell($widthglobalresume[4], $row_heightglobaleresume, round($dataresume['cout_tm'],2), 'LRTB');
				$pdf->Ln();
			    
			    $i = $i + 1;
		
			}

			// GRAND TOTALE
			$sqlglobalresumetotal= "SELECT sum(round((td.cout_mutuelle - td.cout),2)) as cout 
									FROM $from WHERE td.cout < td.cout_mutuelle AND $where";
			echo $sqlglobalresumetotal."<br/><br/>";
			$resulttarifresumetotal = mysql_query($sqlglobalresumetotal);
			$dataresumetotal 		= mysql_fetch_assoc($resulttarifresumetotal);
	
			$pdf->SetFont('Arial','B',16);
		
			$pdf->Cell($widthglobalresume[0], $row_heightglobaleresume, "TOTAL", 'LRTB');
			$pdf->Cell($widthglobalresume[1], $row_heightglobaleresume, round($dataresumetotal['cout_mutuelle'],2), 'LRTB');
			$pdf->Cell($widthglobalresume[2], $row_heightglobaleresume, round($dataresumetotal['cout_medecin'],2), 'LRTB');
			$pdf->Cell($widthglobalresume[3], $row_heightglobaleresume, round($dataresumetotal['cout_poly'],2), 'LRTB');
			$pdf->Cell($widthglobalresume[4], $row_heightglobaleresume, round($dataresumetotal['cout_tm'],2), 'LRTB');
			
			//$pdf->AutoPrint(true);
			
		    $pdf->Output("listing-medecin.pdf", "d");
			
			break;			
		

		default: // listing_mutuelle
			
			$date_start_before  = $date->operationDate($date->date_format_be2us($date_start),0,0,0);
			$date_end_after  = $date->operationDate($date->date_format_be2us($date_end),1,0,0);
			
			$sqlglobal= "SELECT td.id as tarification_detail_id, concat('<div style=\'display: none;\' >',ta.cloture,'</div>',date_format(ta.cloture, '%d/%m/%Y')) AS tarification_cloture, concat('<div style=\'display: none;\' >',ta.date,'</div>',date_format(ta.date, '%d/%m/%Y')) AS tarification_date, ta.mutuelle_code as tarification_mutuelle_code, pa.nom as patient_nom, pa.prenom as patient_prenom, ta.patient_matricule as patient_matricule, concat(ta.ct1, '/' ,ta.ct2), ti.nom as titulaire_nom, ti.prenom as titulaire_prenom, ta.titulaire_matricule as titulaire_matricule, me.nom as medecin_nom, me.prenom as medecin_prenom, td.cecodi as cecodi, round((td.cout_mutuelle - td.cout),2) as cout from tarifications ta, tarifications_detail td, medecins me, patients pa, patients ti 
						 WHERE ta.etat = 'close' and ta.medecin_inami = me.inami and ta.patient_id = pa.id and td.tarification_id = ta.id and pa.titulaire_id = ti.id ";
			$sqlglobal .= " AND ta.cloture >= '$date_start_before'";
			$sqlglobal .= " AND ta.cloture < '$date_end_after'";
			$sqlglobal .= " ORDER BY ta.cloture, td.id";
			
			$_SESSION['listing_mutuelle'] = $sqlglobal;

			$title = $langfile["navigation_title_management_listing_mutuelle"];
	
			$template->assign("date_start", $date_start);
			$template->assign("date_end", $date_end);
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_listing_mutuelle.tpl");
			
	}

?>