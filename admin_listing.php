<?php

	require("./init.php");

	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['admin_listing_adminstate']== null || $adminstate < $modules['admin_listing_adminstate']) {
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
	$stats = (object) new statistiques();
	
	// GET CURRENT DAY
	if (isset($_SESSION['listing_day'])) {
		$listingDay = $_SESSION['listing_day']; 
	} else { 
		$_SESSION['listing_day'] = date("d");
		$listingDay = $_SESSION['listing_day']; 
	}
	
	switch ($action) {
		 
		case "till": 
			
			// transform date
			$date_start_before  = $date->operationDate($date->date_format_be2us($date_start),0,0,0);
			$date_end_after  = $date->operationDate($date->date_format_be2us($date_end),1,0,0);
			
			$sqlglobal  = "SELECT concat('<div style=\'display: none;\' >',date,'</div>',date_format(date, '%d/%m/%Y')), heure, caisse, code,  montant , mode, description FROM caisses_transaction WHERE code!=5000";
			$sqlglobal .= " AND date >= '$date_start_before'";
			$sqlglobal .= " AND date < '$date_end_after'";
			$sqlglobal .= "  ORDER BY date";
		
			$_SESSION['listing_till'] = $sqlglobal;
			$_SESSION['listing_till_resume'] = $sqlglobalresume;

			$title = $langfile["navigation_title_admin_listing_till"];
	
			$template->assign("date_start", $date_start);
			$template->assign("date_end", $date_end);
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_admin_listing_till.tpl");
			
			break;
			
		case "till_pdf":

			require_once('./libraries/tcpdf/config/lang/eng.php');
			require_once('./libraries/tcpdf/tcpdf.php');

			$trans = get_html_translation_table(HTML_ENTITIES);
            		$trans = array_flip($trans);
            
			$sql = $_SESSION['latestrequest'];
			
			$pos_from 		= strpos($sql, 'FROM');
			$pos_where 		= strpos($sql, 'WHERE');
			$pos_orderby 	= strpos($sql, 'ORDER BY');
			$pos_limit 		= strpos($sql, 'LIMIT');

			$from 			= substr($sql, $pos_from+4, $pos_where-($pos_from+4));
			$where 			= substr($sql, $pos_where+5, $pos_orderby-($pos_where+5));
			$orderby 		= substr($sql, $pos_orderby+8, $pos_limit-($pos_orderby+8));

			$trans = get_html_translation_table(HTML_ENTITIES);
            		$trans = array_flip($trans);
            
			$dateDico     		= strtr($langfile["dico_admin_listing_till_colum_date"], $trans);
            		$hourDico    		= strtr($langfile["dico_admin_listing_till_colum_hour"], $trans);
           		$tillDico  		= strtr($langfile["dico_admin_listing_till_colum_till"], $trans);
            		$codeDico   		= strtr($langfile["dico_admin_listing_till_colum_code"], $trans);
            		$amountDico     	= strtr($langfile["dico_admin_listing_till_colum_amount"], $trans);
            		$typeDico   		= strtr($langfile["dico_admin_listing_till_colum_type"], $trans);
            		$descriptionDico   	= strtr($langfile["dico_admin_listing_till_colum_description"], $trans);
            
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Polyclinique Borinage');
			$pdf->SetTitle('Listing Caisse');
			$pdf->SetSubject('Listing Caisse');
			
			// set default header data
			$pdf->SetHeaderData('', 30, 'Listing Caisse', 'power by MariqueCalcus');
			
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
			
			// set font
			$pdf->SetFont('dejavusans', '', 10);
			
			// get all till
			$sql_till = "SELECT DISTINCT caisse FROM ".$from." WHERE".$where;
			
			$result_till = mysql_query($sql_till);
			
			while($till = mysql_fetch_assoc($result_till)) 	{

				$pdf->AddPage();
				$pdf->Bookmark(utf8_encode($till['caisse']), 0, 0);
				$pdf->writeHTML("<H2>".$till['caisse']."</H2><br/>", true, 0, true, 0);
				
				// Create some HTML content
				$htmltable 		= "<table border='1' cellspacing='2' cellpadding='2'>";
				$htmltable 		.= "<tr>";
				$htmltable 		.= "<th bgcolor='#FEF0C9' align='center'>".$dateDico."</th>";
				$htmltable 		.= "<th bgcolor='#FEF0C9' align='center'>".$hourDico."</th>";
				$htmltable 		.= "<th bgcolor='#FEF0C9' align='center'>".$codeDico."</th>";
				$htmltable 		.= "<th bgcolor='#FEF0C9' align='center'>".$amountDico."</th>";
				$htmltable 		.= "<th bgcolor='#FEF0C9' align='center'>".$typeDico."</th>";
				$htmltable 		.= "<th bgcolor='#FEF0C9' align='center'>".$descriptionDico."</th>";
				$htmltable 		.= "</tr>";
				
				// add a page
				$sql = "SELECT date_format(date, '%d/%m/%Y') AS date, heure,caisse,code,montant ,mode,description FROM ".$from." WHERE caisse='".$till['caisse']."'  AND ".$where;
				
				$result = mysql_query($sql);
				while($row = mysql_fetch_assoc($result)) 	{
					
					$color = ($color == '#FEFFF1') ? '#FCF8DC' : '#FEFFF1';
					
					$htmltable .= "<tr>";
					$htmltable .= "<td bgcolor='".$color."' align='center'>".$row['date']."</td>";
					$htmltable .= "<td bgcolor='".$color."' align='center'>".$row['heure']."</td>";
					$htmltable .= "<td bgcolor='".$color."' align='center'>".$row['code']."</td>";
					$htmltable .= "<td bgcolor='".$color."' align='center'>".$row['montant']."</td>";
					$htmltable .= "<td bgcolor='".$color."' align='center'>".$row['mode']."</td>";
					$htmltable .= "<td bgcolor='".$color."' align='center'>".$row['description']."</td>";
					$htmltable .= '</tr>';
				
				}
				
				$htmltable .= "</table>";
				// output the HTML content
				
				$pdf->writeHTML($htmltable, true, 0, true, 0);
				
			}
			
			$pdf->AddPage();
			$pdf->writeHTML("<H2>Resume</H2><br/>", true, 0, true, 0);

			// Build resume
                        $sql  = "SELECT ROUND(SUM(montant),2) as total, caisse, code FROM ".$from." WHERE".$where." GROUP BY caisse, code";
	
			$table_raw = array();
			$caisse_raw = array();
	
			$results = mysql_query($sql);
			
			while($result = mysql_fetch_assoc($results)) {
			
				$caisse_raw[$result['caisse']] += $result['total'];

				$table_raw[$result['code']][$result['caisse']] = $result['total'];
			}

			$htmltable = "<table border='1' cellspacing='2' cellpadding='2'>";
			$htmltable .= "<tr>";
			$htmltable .= "<th bgcolor='#EEEEEE' align='center'></th>";
	
			foreach($caisse_raw as $caisse=>$row) {
                                
                                $htmltable .= "<th bgcolor='#EFEFEF' align='center'>" . $caisse. "</th>";

                        }
			$htmltable .= "<th bgcolor='#FEF0C9' align='center'>Total</th>";
			$htmltable .= "</tr>";
	
			foreach($table_raw as $code=>$row) {
				
				$htmltable .= "<tr>";
		
				$htmltable .= "<td bgcolor='#EFEFEF' align='center'>" . $code. "</td>";
	
				$sum = 0;	
				foreach($row as $caisse=>$row) {

					$htmltable .= "<td bgcolor='#FFFFFF' align='center'>" . $row. "</td>";
					$sum += $row;
				
				}
				
				$htmltable .= "<td bgcolor='#FEF0C9' align='center'>" . $sum. "</td>";
				
				$htmltable .= "</tr>";	
			}

			$htmltable .= "<tr>";
                        $htmltable .= "<td bgcolor='#EEEEEE' align='center'></td>";
       
			$sum = 0; 
                        foreach($caisse_raw as $caisse=>$row) {
                                
				$sum += $row;
                                $htmltable .= "<td bgcolor='#FEF0C9' align='center'>" . $row. "</td>";

                        }
                        $htmltable .= "<td bgcolor='#FEF0C9' align='center'>".$sum."</td>";
                        $htmltable .= "</tr>";

			$htmltable .= "</table>";
			//echo $htmltable;

			
			$pdf->writeHTML($htmltable, true, 0, true, 0);
	
			// ---------------------------------------------------------
			
			//Close and output PDF document
			$pdf->Output('listing_caisse.pdf', 'I');
			
			//============================================================+
			// END OF FILE                                                 
			//============================================================+	
			
			break;
			
		case "specialist_pdf":
			
			include("./include/class.fpdf.php");
			
    		$title1 = "Total";
			$title2 = "Médecin";
			$title3 = "Polyclinique";
			$title4 = "Ticket modérateur";

			$title31 = "Médecin";
			$title32 = "Total";
			$title33 = "Méd.";
			$title34 = "Poly";
			$title35 = "T.M.";
			$title36 = "Code Analytique";
			
			//Set maximum rows per page
			$max = 43;
			
			$widthglobal				=array(187, 187, 186);
			$headerglobal				=array($title1,$title2,$title3);
			$row_heightglobale			= 16;
			
			$width						= array(50,30,150,110,44,52,50,50);
			$header						= array($title5,$title6,$title7,$title8,$title9,$title10,$title11,$title12);
			$row_height					= 12;
			
			$widthglobalresume			=array(164, 122, 122, 122);
			$headerglobalresume			=array($title31,$title32,$title33,$title34,$title35,$title36);
			$row_heightglobaleresume	= 16;
			
			$pos_from 		= strpos($_SESSION['latestrequest'], 'FROM');
			$pos_where 		= strpos($_SESSION['latestrequest'], 'WHERE');
			$pos_orderby 	= strpos($_SESSION['latestrequest'], 'ORDER BY');
			$pos_limit 		= strpos($_SESSION['latestrequest'], 'LIMIT');

			$from 			= substr($_SESSION['latestrequest'], $pos_from+4, $pos_where-($pos_from+4));
			$where 			= substr($_SESSION['latestrequest'], $pos_where+5, $pos_orderby-($pos_where+5));
			$orderby 		= substr($_SESSION['latestrequest'], $pos_orderby+8, $pos_limit-($pos_orderby+8));

			// create PDF
		    $pdf = (object) new pdfhtml('P', 'pt', 'A4');
			
			// for each doctor
			$sql = "SELECT DISTINCT me.nom AS medecin_nom, me.prenom AS medecin_prenom, me.code_analytique AS medecin_code_analytique, me.inami AS medecin_inami FROM $from WHERE $where ORDER BY medecin_nom, medecin_prenom";
			
			$result = mysql_query($sql);
			
			while($data = mysql_fetch_assoc($result)) 	{

				// pour chaque medecin
				$doctor_familyname 			= $data['medecin_nom'];
				$doctor_firstname 			= $data['medecin_prenom'];
				$doctor_inami 				= $data['medecin_inami'];
				$doctor_code_analytique		= $data['medecin_code_analytique'];
				
				//Add first page
				$pdf->AddPage();
				
				//initialize counter
				$i = 7;

				// Titre
				$pdf->SetFont('Arial','B',16);
				$pdf->Cell(18,10,"Listing pour ".$doctor_familyname." ".$doctor_firstname);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Ln();
				
				// Resume sans prendre la correction dans le cout_mutuelle qui aurait cout_poly et cout_medecin=0
				$sqlglobalresume= "SELECT sum(round(td.cout_mutuelle,2)) AS cout_mutuelle, SUM(ROUND(td.cout_poly,2)) AS cout_poly, SUM(ROUND(td.cout_medecin,2)) AS cout_medecin, SUM(GREATEST(ROUND(td.cout_mutuelle - (td.cout_medecin + td.cout_poly),2),0)) AS cout_tm FROM $from WHERE (td.cout_poly != '0' or td.cout_medecin != '0') AND ta.medecin_inami = '".$doctor_inami."' AND $where";
				//echo $sqlglobalresume."<br/><br/>";
				
				$resultglobalresume = mysql_query($sqlglobalresume);
				$data = mysql_fetch_assoc($resultglobalresume);
	
				$pdf->SetFillColor(220,220,232);
				$pdf->SetFont('Arial','B',12);
				$pdf->Cell($widthglobal[0], $row_heightglobale, $headerglobal[0], 'LTB');
		    	$pdf->Cell($widthglobal[1], $row_heightglobale, $headerglobal[1], 'LTB');
		    	$pdf->Cell($widthglobal[2], $row_heightglobale, $headerglobal[2], 'LRTB');
		    	//$pdf->Cell($widthglobal[3], $row_heightglobale, $headerglobal[3], 'LRTB');
				$pdf->Ln();
		    	$pdf->Cell($widthglobal[0], $row_heightglobale, round($data['cout_mutuelle'],2), 'LTB');
		    	$pdf->Cell($widthglobal[1], $row_heightglobale, round($data['cout_medecin'],2), 'LTB');
		    	$pdf->Cell($widthglobal[2], $row_heightglobale, round($data['cout_poly'],2), 'LRTB');
		    	//$pdf->Cell($widthglobal[3], $row_heightglobale, round($data['cout_tm'],2), 'LRTB');
				
		    	$pdf->Ln();
				$pdf->Ln();
		    	
				$pdf->SetFont('Arial','B',11);
				$pdf->Cell($width[0],$row_height,'Date','LTB');
				$pdf->Cell($width[1],$row_height,'Mut','LTB');
				$pdf->Cell($width[2],$row_height,'Patient','LTB');
				$pdf->Cell($width[3],$row_height,'Matricule','LTB');
				$pdf->Cell($width[4],$row_height,'% Méd.','LTB');
				$pdf->Cell($width[5],$row_height,'Cecodi','LTB');	
				$pdf->Cell($width[6],$row_height,'Méd.','LTB');
				$pdf->Cell($width[7],$row_height,'Poly','LRTB');
				//$pdf->Cell($width[8],$row_height,'T.M.','LRTB');
				$pdf->Ln();
				
				$sqlglobal= "SELECT ta.date AS tarification_date, ta.mutuelle_code AS tarification_mutuelle_code, ta.patient_matricule AS tarification_patient_matricule, pa.nom AS patient_nom, pa.prenom AS patient_prenom, td.cecodi AS cecodi, ROUND(td.cout_mutuelle,2) AS cout_mutuelle, ROUND(td.cout_poly,2) AS cout_poly, ROUND(td.cout_medecin,2) AS cout_medecin, GREATEST(ROUND(td.cout_mutuelle - (td.cout_medecin + td.cout_poly),2),0) AS cout_tm FROM $from WHERE td.cout_medecin != '0' AND ta.medecin_inami = '".$doctor_inami."' AND $where ";
				$sqlglobal .= " ORDER BY ta.cloture, td.id";
				//echo $sqlglobal."<br/><br/>";
				$resulttarif = mysql_query($sqlglobal);
			
				while($data = mysql_fetch_assoc($resulttarif)) 	{
					
					if ($i == $max) {
					
						// saut de page
						$pdf->AddPage();
						
						//initialize counter
						$i = 0;
						
						$pdf->SetFont('Arial','B',11);
						$pdf->SetFillColor(232,232,232);
						$pdf->Cell($width[0],$row_height,'Date','LTB');
						$pdf->Cell($width[1],$row_height,'Mut','LTB');
						$pdf->Cell($width[2],$row_height,'Patient','LTB');
						$pdf->Cell($width[3],$row_height,'Matricule','LTB');
						$pdf->Cell($width[4],$row_height,'% Méd.','LTB');
						$pdf->Cell($width[5],$row_height,'Cecodi','LTB');	
						$pdf->Cell($width[6],$row_height,'Méd.','LTB');
						$pdf->Cell($width[7],$row_height,'Poly','LRTB');
						//$pdf->Cell($width[8],$row_height,'T.M.','LRTB');
						$pdf->Ln();
			
					}
					
				    $date 				= substr($data['tarification_date'],2);
				    $mut 				= $data['tarification_mutuelle_code'];
					$patient 			= $data['patient_nom']." ".$patient_prenom = $data['patient_prenom'];
					$patient_matricule 	= $data['tarification_patient_matricule'];
					$cecodi 			= $data['cecodi'];
					$cout_mutuelle 		= $data['cout_mutuelle'];
					$cout_medecin 		= $data['cout_medecin'];
					$cout_poly 			= $data['cout_poly'];
					
					// gestion des corrections
					//if ($cout_poly == 0 AND $cout_medecin == 0) {$cout_mutuelle=0;}
					$cout_tm = round($cout_mutuelle-($cout_medecin+$cout_poly),2);
					if ($cout_mutuelle != 0) {
						$pourcentage = round((100*($cout_medecin/$cout_mutuelle)),0);
					} else {
						$pourcentage = "";
					}
					
					$pdf->SetFillColor(255,255,255);
					$pdf->SetFont('Arial','',10);
					$pdf->Cell($width[0],$row_height,$date,'LB');
					$pdf->Cell($width[1],$row_height,$mut,'LB');
					$pdf->Cell($width[2],$row_height,$patient,'LB');
					$pdf->Cell($width[3],$row_height,$patient_matricule,'LB');
					$pdf->Cell($width[4],$row_height,$pourcentage,'LB');
					$pdf->Cell($width[5],$row_height,$cecodi,'LB');	
					$pdf->Cell($width[6],$row_height,$cout_medecin,'LB');
					$pdf->Cell($width[7],$row_height,$cout_poly,'LRB');
					//$pdf->Cell($width[8],$row_height,$cout_tm,'LRB');
					$pdf->Ln();
									
				    $i = $i + 1;
				
				}
				
			}
			
			// envoie mail
			$mail = "<html><table>";
			
			// print resume
			$pdf->AddPage();
	
			//initialize counter
			$i = 3;

			// Titre
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(18,10,"Récapitulatif");
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			
			$pdf->SetFont('Arial','',12);
			$pdf->SetFillColor(232,232,232);

			$pdf->Cell($widthglobalresume[0], $row_heightglobaleresume, $headerglobalresume[0], 'LTB');
		    $pdf->Cell($widthglobalresume[1], $row_heightglobaleresume, $headerglobalresume[1], 'LTB');
		    $pdf->Cell($widthglobalresume[2], $row_heightglobaleresume, $headerglobalresume[2], 'LTB');
		    $pdf->Cell($widthglobalresume[3], $row_heightglobaleresume, $headerglobalresume[3], 'LRTB');
		    //$pdf->Cell($widthglobalresume[4], $row_heightglobaleresume, $headerglobalresume[4], 'LRTB');
		    $pdf->Ln();
		    
			//mail
			$mail .= "<tr><td>".$headerglobalresume[0]."</td><td>".$headerglobalresume[5]."</td><td>".$headerglobalresume[1]."</td><td>".$headerglobalresume[2]."</td><td>".$headerglobalresume[3]."</td><td>".$headerglobalresume[4]."</td></tr>";
			
		    $result = mysql_query($sql);

			// for each doctor
			while($data = mysql_fetch_assoc($result)) 	{

				$doctor_familyname 		= $data['medecin_nom'];
				$doctor_firstname 		= $data['medecin_prenom'];
				$doctor_inami 			= $data['medecin_inami'];
				$doctor_code_analytique	= $data['medecin_code_analytique'];
				
				if ($i == $max) {
					$pdf->AddPage();
					$i = 0;
					$pdf->SetFillColor(232,232,232);
					$pdf->Cell($widthglobalresume[0], $row_heightglobaleresume, $headerglobalresume[0], 'LRTB');
				    $pdf->Cell($widthglobalresume[1], $row_heightglobaleresume, $headerglobalresume[1], 'LRTB');
				    $pdf->Cell($widthglobalresume[2], $row_heightglobaleresume, $headerglobalresume[2], 'LRTB');
				    $pdf->Cell($widthglobalresume[3], $row_heightglobaleresume, $headerglobalresume[3], 'LRTB');
				    //$pdf->Cell($widthglobalresume[4], $row_heightglobaleresume, $headerglobalresume[4], 'LRTB');
					$pdf->Ln();
				}
	
				// Resume sans prendre la correction dans le cout_mutuelle qui aurait cout_poly et cout_medecin=0
				$sqlglobalresume= "SELECT SUM(ROUND(td.cout_mutuelle,2)) AS cout_mutuelle, SUM(ROUND(td.cout_poly,2)) AS cout_poly, SUM(ROUND(td.cout_medecin,2)) AS cout_medecin, SUM(GREATEST(ROUND(td.cout_mutuelle - (td.cout_medecin + td.cout_poly),2),0)) AS cout_tm FROM $from WHERE (td.cout_poly != '0' or td.cout_medecin != '0') AND ta.medecin_inami = '".$doctor_inami."' AND $where";
				//echo $sqlglobalresume."<br/><br/>";
				$resulttarifresume = mysql_query($sqlglobalresume);
				$dataresume = mysql_fetch_assoc($resulttarifresume);
		
				$pdf->Cell($widthglobalresume[0], $row_heightglobaleresume, $doctor_familyname." ".$doctor_firstname, 'LRTB');
			    $pdf->Cell($widthglobalresume[1], $row_heightglobaleresume, round($dataresume['cout_mutuelle'],2), 'LRTB');
			    $pdf->Cell($widthglobalresume[2], $row_heightglobaleresume, round($dataresume['cout_medecin'],2), 'LRTB');
			    $pdf->Cell($widthglobalresume[3], $row_heightglobaleresume, round($dataresume['cout_poly'],2), 'LRTB');
			    //$pdf->Cell($widthglobalresume[4], $row_heightglobaleresume, round($dataresume['cout_tm'],2), 'LRTB');
			    
			    $pdf->Ln();
			    
			    //mail
			    $mail .= "<tr><td>".$doctor_familyname." ".$doctor_firstname."</td><td>".$doctor_code_analytique."</td><td>".round($dataresume['cout_mutuelle'],2)."</td><td>".round($dataresume['cout_medecin'],2)."</td><td>".round($dataresume['cout_poly'],2)."</td><td>".round($dataresume['cout_tm'],2)."</td></tr>";
			    
			    $i = $i + 1;
		
			}

			// GRAND TOTALE
			$sqlglobalresumetotal	= "SELECT SUM(ROUND(td.cout_mutuelle,2)) AS cout_mutuelle, SUM(ROUND(td.cout_poly,2)) AS cout_poly, SUM(ROUND(td.cout_medecin,2)) AS cout_medecin, SUM(GREATEST(ROUND(td.cout_mutuelle - (td.cout_medecin + td.cout_poly),2),0)) AS cout_tm FROM $from WHERE (td.cout_poly != '0' or td.cout_medecin != '0') AND $where";
			//echo $sqlglobalresumetotal."<br/><br/>";
			$resulttarifresumetotal = mysql_query($sqlglobalresumetotal);
			$dataresumetotal 		= mysql_fetch_assoc($resulttarifresumetotal);
	
			$pdf->SetFont('Arial','B',16);
		
			$pdf->Cell($widthglobalresume[0], 18, "TOTAL", 'LTB');
			$pdf->Cell($widthglobalresume[1], 18, round($dataresumetotal['cout_mutuelle'],2), 'LTB');
			$pdf->Cell($widthglobalresume[2], 18, round($dataresumetotal['cout_medecin'],2), 'LTB');
			$pdf->Cell($widthglobalresume[3], 18, round($dataresumetotal['cout_poly'],2), 'LRTB');
			//$pdf->Cell($widthglobalresume[4], $row_heightglobaleresume, round($dataresumetotal['cout_tm'],2), 'LRTB');
			
			//mail
			$mail .= "<tr><td>TOTAL</td><td></td><td>".round($dataresumetotal['cout_mutuelle'],2)."</td><td>".round($dataresumetotal['cout_medecin'],2)."</td><td>".round($dataresumetotal['cout_poly'],2)."</td><td>".round($dataresumetotal['cout_tm'],2)."</td></tr>";
			
			//$pdf->AutoPrint(true);
			
		    $pdf->Output("listing-medecin.pdf", "d");
		    
		    // Envoi mail ˆ ponchon
		    $mail .= "</table></html>";
		    $maildate = date('Y-m-d h:m:s');
		    $mailing_id = $mailing->add('listing','polygone','polygone@polycliniqueborinage.org','Michel Ponchon','mponchon@gmail.com',$maildate,'Impression du listing des mŽdecins',$mail);
			
			break;

			
			case "doctor_pdf":
			
			include("./include/class.fpdf.php");
			
    		$title1 = "Total";
			$title2 = "Médecin";
			$title3 = "Polyclinique";
			$title4 = "Ticket modérateur";

			$title31 = "Médecin";
			$title32 = "Total";
			$title33 = "Méd.";
			$title34 = "Poly";
			$title35 = "T.M.";
			$title36 = "Code Analytique";
			
			//Set maximum rows per page
			$max = 43;
			
			$widthglobal				=array(187, 187, 186);
			$headerglobal				=array($title1,$title2,$title3);
			$row_heightglobale			= 16;
			
			$width						= array(50,30,150,110,44,52,50,50);
			$header						= array($title5,$title6,$title7,$title8,$title9,$title10,$title11,$title12);
			$row_height					= 12;
			
			$widthglobalresume			=array(164, 122, 122, 122);
			$headerglobalresume			=array($title31,$title32,$title33,$title34,$title35,$title36);
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
			
			// for each doctor
			$sql = "SELECT DISTINCT me.nom AS medecin_nom, me.prenom AS medecin_prenom, me.code_analytique AS medecin_code_analytique, me.inami AS medecin_inami FROM $from WHERE $where ORDER BY medecin_nom, medecin_prenom";
			//echo $sql."<br/>";
			
			$result = mysql_query($sql);
			
			while($data = mysql_fetch_assoc($result)) 	{

				// pour chaque medecin
				$doctor_familyname 			= $data['medecin_nom'];
				$doctor_firstname 			= $data['medecin_prenom'];
				$doctor_inami 				= $data['medecin_inami'];
				$doctor_code_analytique		= $data['medecin_code_analytique'];
				
				//Add first page
				$pdf->AddPage();
				
				//initialize counter
				$i = 7;

				// Titre
				$pdf->SetFont('Arial','B',16);
				$pdf->Cell(18,10,"Listing pour ".$doctor_familyname." ".$doctor_firstname);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Ln();
				
				// Resume sans prendre la correction dans le cout_mutuelle qui aurait cout_poly et cout_medecin=0
				$sqlglobalresume= "SELECT sum(round(td.cout_mutuelle,2)) AS cout_mutuelle, SUM(ROUND(td.cout_poly,2)) AS cout_poly, SUM(ROUND(td.cout_medecin,2)) AS cout_medecin, SUM(GREATEST(ROUND(td.cout_mutuelle - (td.cout_medecin + td.cout_poly),2),0)) AS cout_tm FROM $from WHERE (td.cout_poly != '0' or td.cout_medecin != '0') AND ta.medecin_inami = '".$doctor_inami."' AND $where";
				//echo $sqlglobalresume."<br/><br/>";
				
				$resultglobalresume = mysql_query($sqlglobalresume);
				$data = mysql_fetch_assoc($resultglobalresume);
	
				$pdf->SetFillColor(220,220,232);
				$pdf->SetFont('Arial','B',12);
				$pdf->Cell($widthglobal[0], $row_heightglobale, $headerglobal[0], 'LTB');
		    	$pdf->Cell($widthglobal[1], $row_heightglobale, $headerglobal[1], 'LTB');
		    	$pdf->Cell($widthglobal[2], $row_heightglobale, $headerglobal[2], 'LRTB');
		    	//$pdf->Cell($widthglobal[3], $row_heightglobale, $headerglobal[3], 'LRTB');
				$pdf->Ln();
		    	$pdf->Cell($widthglobal[0], $row_heightglobale, round($data['cout_mutuelle'],2), 'LTB');
		    	$pdf->Cell($widthglobal[1], $row_heightglobale, round($data['cout_medecin'],2), 'LTB');
		    	$pdf->Cell($widthglobal[2], $row_heightglobale, round($data['cout_poly'],2), 'LRTB');
		    	//$pdf->Cell($widthglobal[3], $row_heightglobale, round($data['cout_tm'],2), 'LRTB');
				
		    	$pdf->Ln();
				$pdf->Ln();
		    	
				$pdf->SetFont('Arial','B',11);
				$pdf->Cell($width[0],$row_height,'Date','LTB');
				$pdf->Cell($width[1],$row_height,'Mut','LTB');
				$pdf->Cell($width[2],$row_height,'Patient','LTB');
				$pdf->Cell($width[3],$row_height,'Matricule','LTB');
				$pdf->Cell($width[4],$row_height,'% Méd.','LTB');
				$pdf->Cell($width[5],$row_height,'Cecodi','LTB');	
				$pdf->Cell($width[6],$row_height,'Méd.','LTB');
				$pdf->Cell($width[7],$row_height,'Poly','LRTB');
				//$pdf->Cell($width[8],$row_height,'T.M.','LRTB');
				$pdf->Ln();
				
				$sqlglobal= "SELECT ta.date AS tarification_date, ta.mutuelle_code AS tarification_mutuelle_code, ta.patient_matricule AS tarification_patient_matricule, pa.nom AS patient_nom, pa.prenom AS patient_prenom, td.cecodi AS cecodi, ROUND(td.cout_mutuelle,2) AS cout_mutuelle, ROUND(td.cout_poly,2) AS cout_poly, ROUND(td.cout_medecin,2) AS cout_medecin, GREATEST(ROUND(td.cout_mutuelle - (td.cout_medecin + td.cout_poly),2),0) AS cout_tm FROM $from WHERE td.cout_medecin != '0' AND ta.medecin_inami = '".$doctor_inami."' AND $where ";
				$sqlglobal .= " ORDER BY ta.cloture, td.id";
				//echo $sqlglobal."<br/><br/>";
				$resulttarif = mysql_query($sqlglobal);
			
				while($data = mysql_fetch_assoc($resulttarif)) 	{
					
					if ($i == $max) {
					
						// saut de page
						$pdf->AddPage();
						
						
						//initialize counter
						$i = 0;
						
						$pdf->SetFont('Arial','B',11);
						$pdf->SetFillColor(232,232,232);
						$pdf->Cell($width[0],$row_height,'Date','LTB');
						$pdf->Cell($width[1],$row_height,'Mut','LTB');
						$pdf->Cell($width[2],$row_height,'Patient','LTB');
						$pdf->Cell($width[3],$row_height,'Matricule','LTB');
						$pdf->Cell($width[4],$row_height,'% Méd.','LTB');
						$pdf->Cell($width[5],$row_height,'Cecodi','LTB');	
						$pdf->Cell($width[6],$row_height,'Méd.','LTB');
						$pdf->Cell($width[7],$row_height,'Poly','LRTB');
						//$pdf->Cell($width[8],$row_height,'T.M.','LRTB');
						$pdf->Ln();
				
			
					}
					
				    $date 				= substr($data['tarification_date'],2);
				    $mut 				= $data['tarification_mutuelle_code'];
					$patient 			= $data['patient_nom']." ".$patient_prenom = $data['patient_prenom'];
					$patient_matricule 	= $data['tarification_patient_matricule'];
					$cecodi 			= $data['cecodi'];
					$cout_mutuelle 		= $data['cout_mutuelle'];
					$cout_medecin 		= $data['cout_medecin'];
					$cout_poly 			= $data['cout_poly'];
					
					// gestion des corrections
					//if ($cout_poly == 0 AND $cout_medecin == 0) {$cout_mutuelle=0;}
					$cout_tm = round($cout_mutuelle-($cout_medecin+$cout_poly),2);
					if ($cout_mutuelle != 0) {
						$pourcentage = round((100*($cout_medecin/$cout_mutuelle)),0);
					} else {
						$pourcentage = "";
					}
					
					$pdf->SetFillColor(255,255,255);
					$pdf->SetFont('Arial','',10);
					$pdf->Cell($width[0],$row_height,$date,'LB');
					$pdf->Cell($width[1],$row_height,$mut,'LB');
					$pdf->Cell($width[2],$row_height,$patient,'LB');
					$pdf->Cell($width[3],$row_height,$patient_matricule,'LB');
					$pdf->Cell($width[4],$row_height,$pourcentage,'LB');
					$pdf->Cell($width[5],$row_height,$cecodi,'LB');	
					$pdf->Cell($width[6],$row_height,$cout_medecin,'LB');
					$pdf->Cell($width[7],$row_height,$cout_poly,'LRB');
					//$pdf->Cell($width[8],$row_height,$cout_tm,'LRB');
					$pdf->Ln();
									
				    $i = $i + 1;
				
				}
				
			}
			
			// envoie mail
			$mail = "<html><table>";
			
			// print resume
			$pdf->AddPage();
	
			//initialize counter
			$i = 3;

			// Titre
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(18,10,"Récapitulatif");
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			
			$pdf->SetFont('Arial','',12);
			$pdf->SetFillColor(232,232,232);

			$pdf->Cell($widthglobalresume[0], $row_heightglobaleresume, $headerglobalresume[0], 'LTB');
		    $pdf->Cell($widthglobalresume[1], $row_heightglobaleresume, $headerglobalresume[1], 'LTB');
		    $pdf->Cell($widthglobalresume[2], $row_heightglobaleresume, $headerglobalresume[2], 'LTB');
		    $pdf->Cell($widthglobalresume[3], $row_heightglobaleresume, $headerglobalresume[3], 'LRTB');
		    //$pdf->Cell($widthglobalresume[4], $row_heightglobaleresume, $headerglobalresume[4], 'LRTB');
		    $pdf->Ln();
		    
			//mail
			$mail .= "<tr><td>".$headerglobalresume[0]."</td><td>".$headerglobalresume[5]."</td><td>".$headerglobalresume[1]."</td><td>".$headerglobalresume[2]."</td><td>".$headerglobalresume[3]."</td><td>".$headerglobalresume[4]."</td></tr>";
			
			
		    $result = mysql_query($sql);

			// for each doctor
			while($data = mysql_fetch_assoc($result)) 	{

				$doctor_familyname 		= $data['medecin_nom'];
				$doctor_firstname 		= $data['medecin_prenom'];
				$doctor_inami 			= $data['medecin_inami'];
				$doctor_code_analytique	= $data['medecin_code_analytique'];
				
				
				if ($i == $max) {
					$pdf->AddPage();
					$i = 0;
					$pdf->SetFillColor(232,232,232);
					$pdf->Cell($widthglobalresume[0], $row_heightglobaleresume, $headerglobalresume[0], 'LRTB');
				    $pdf->Cell($widthglobalresume[1], $row_heightglobaleresume, $headerglobalresume[1], 'LRTB');
				    $pdf->Cell($widthglobalresume[2], $row_heightglobaleresume, $headerglobalresume[2], 'LRTB');
				    $pdf->Cell($widthglobalresume[3], $row_heightglobaleresume, $headerglobalresume[3], 'LRTB');
				    //$pdf->Cell($widthglobalresume[4], $row_heightglobaleresume, $headerglobalresume[4], 'LRTB');
					$pdf->Ln();
				}
	
				// Resume sans prendre la correction dans le cout_mutuelle qui aurait cout_poly et cout_medecin=0
				$sqlglobalresume= "SELECT SUM(ROUND(td.cout_mutuelle,2)) AS cout_mutuelle, SUM(ROUND(td.cout_poly,2)) AS cout_poly, SUM(ROUND(td.cout_medecin,2)) AS cout_medecin, SUM(GREATEST(ROUND(td.cout_mutuelle - (td.cout_medecin + td.cout_poly),2),0)) AS cout_tm FROM $from WHERE (td.cout_poly != '0' or td.cout_medecin != '0') AND ta.medecin_inami = '".$doctor_inami."' AND $where";
				//echo $sqlglobalresume."<br/><br/>";
				$resulttarifresume = mysql_query($sqlglobalresume);
				$dataresume = mysql_fetch_assoc($resulttarifresume);
		
				$pdf->Cell($widthglobalresume[0], $row_heightglobaleresume, $doctor_familyname." ".$doctor_firstname, 'LRTB');
			    $pdf->Cell($widthglobalresume[1], $row_heightglobaleresume, round($dataresume['cout_mutuelle'],2), 'LRTB');
			    $pdf->Cell($widthglobalresume[2], $row_heightglobaleresume, round($dataresume['cout_medecin'],2), 'LRTB');
			    $pdf->Cell($widthglobalresume[3], $row_heightglobaleresume, round($dataresume['cout_poly'],2), 'LRTB');
			    //$pdf->Cell($widthglobalresume[4], $row_heightglobaleresume, round($dataresume['cout_tm'],2), 'LRTB');
			    
			    $pdf->Ln();
			    
			    //mail
			    $mail .= "<tr><td>".$doctor_familyname." ".$doctor_firstname."</td><td>".$doctor_code_analytique."</td><td>".round($dataresume['cout_mutuelle'],2)."</td><td>".round($dataresume['cout_medecin'],2)."</td><td>".round($dataresume['cout_poly'],2)."</td><td>".round($dataresume['cout_tm'],2)."</td></tr>";
			    
			    $i = $i + 1;
		
			}

			// GRAND TOTALE
			$sqlglobalresumetotal	= "SELECT SUM(ROUND(td.cout_mutuelle,2)) AS cout_mutuelle, SUM(ROUND(td.cout_poly,2)) AS cout_poly, SUM(ROUND(td.cout_medecin,2)) AS cout_medecin, SUM(GREATEST(ROUND(td.cout_mutuelle - (td.cout_medecin + td.cout_poly),2),0)) AS cout_tm FROM $from WHERE (td.cout_poly != '0' or td.cout_medecin != '0') AND $where";
			//echo $sqlglobalresumetotal."<br/><br/>";
			$resulttarifresumetotal = mysql_query($sqlglobalresumetotal);
			$dataresumetotal 		= mysql_fetch_assoc($resulttarifresumetotal);
	
			$pdf->SetFont('Arial','B',16);
		
			$pdf->Cell($widthglobalresume[0], 18, "TOTAL", 'LTB');
			$pdf->Cell($widthglobalresume[1], 18, round($dataresumetotal['cout_mutuelle'],2), 'LTB');
			$pdf->Cell($widthglobalresume[2], 18, round($dataresumetotal['cout_medecin'],2), 'LTB');
			$pdf->Cell($widthglobalresume[3], 18, round($dataresumetotal['cout_poly'],2), 'LRTB');
			//$pdf->Cell($widthglobalresume[4], $row_heightglobaleresume, round($dataresumetotal['cout_tm'],2), 'LRTB');
			
			//mail
			$mail .= "<tr><td>TOTAL</td><td></td><td>".round($dataresumetotal['cout_mutuelle'],2)."</td><td>".round($dataresumetotal['cout_medecin'],2)."</td><td>".round($dataresumetotal['cout_poly'],2)."</td><td>".round($dataresumetotal['cout_tm'],2)."</td></tr>";
			
			//$pdf->AutoPrint(true);
			
		    $pdf->Output("listing-medecin.pdf", "d");
		    
		    // Envoi mail ˆ ponchon
		    $mail .= "</table></html>";
		    $maildate = date('Y-m-d h:m:s');
		    $mailing_id = $mailing->add('listing','polygone','polygone@polycliniqueborinage.org','Michel Ponchon','mponchon@gmail.com',$maildate,'Impression du listing des mŽdecins',$mail);
			
			break;	
				
		case "doctor":
			
			$date_start_before  = $date->operationDate($date->date_format_be2us($date_start),0,0,0);
			$date_end_after  = $date->operationDate($date->date_format_be2us($date_end),1,0,0);
			$sqlglobal= "SELECT concat('<div style=\'display: none;\' >',ta.cloture,'</div>',date_format(ta.cloture, '%d/%m/%Y')), concat('<div style=\'display: none;\' >',ta.date,'</div>',date_format(ta.date, '%d/%m/%Y')), pa.nom as patient_nom, pa.prenom as patient_prenom, concat(ta.ct1, '/' ,ta.ct2) as tarification_cts, ta.type as tarification_type, u.firstname as doctor_firstname, u.familyname as doctor_familyname, td.description as tarification_description, td.cecodi as tarification_cecodi, round(td.cout_mutuelle,2) as cout, td.cout_poly as cout_poly, round((td.cout_medecin/td.cout_mutuelle*100),0) as pourcentage, td.cout_medecin as cout_medecin, greatest(round(td.cout_mutuelle - (td.cout_medecin + td.cout_poly),2),0) as cout_tm from tarifications ta, tarifications_detail td, user u, patients pa where ta.etat = 'close' and ta.user_id = u.ID and ta.patient_id = pa.id and td.tarification_id = ta.id";
			$sqlglobal .= " AND ta.cloture >= '$date_start_before'";
			$sqlglobal .= " AND ta.cloture < '$date_end_after'";
			$sqlglobal .= " ORDER BY ta.cloture, td.id";
			
			$_SESSION['listing_doctor'] = $sqlglobal;

			$title = $langfile["navigation_title_admin_listing_doctor"];
	
			$template->assign("date_start", $date_start);
			$template->assign("date_end", $date_end);
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_admin_listing_doctor.tpl");
						
			break;

		case "prestations_medecins":
			
			$date_start_before  = $date->operationDate($date->date_format_be2us($date_start),0,0,0);
			$date_end_after  = $date->operationDate($date->date_format_be2us($date_end),1,0,0);
		
			$filter = $_POST['filter'];
			
			$medecins             = $stats->getAllMedecins();
			$prestations_medecins = $stats->getPrestations($date_start_before, $date_end_after, $medecins, $filter);
			
			$title = $langfile["navigation_title_admin_listing_prestations_medecins"];
	
			$template->assign("date_start", $date_start);
			$template->assign("date_end", $date_end);
			$template->assign("title", $title);
			$template->assign("filter", $filter);
			$template->assign("prestations", $prestations_medecins);
			$template->assign("workspaceclass", "fullpage");
			
			$_SESSION['filter'] = $filter;
			$_SESSION['begda']  = $date_start_before;
			$_SESSION['endda']  = $date_end_after;
			
			$template->display("template_admin_listing_prestations_medecins.tpl");
						
			break;	
			
		case "print_prestations_medecins":
			require_once('./libraries/tcpdf/config/lang/eng.php');
			require_once('./libraries/tcpdf/tcpdf.php');
			
			$filter = $_SESSION['filter'];
			$begda  = $_SESSION['begda'];
			$endda  = $_SESSION['endda'];
			//echo $filter.'-'.$begda.'-'.$endda;
			//$begda  = $date->operationDate($date->date_format_be2us($begda),0,0,0);
			//$endda  = $date->operationDate($date->date_format_be2us($endda),1,0,0);
			
			$medecins             = $stats->getAllMedecins();
			$prestations_medecins = $stats->getPrestations($begda, $endda, $medecins, $filter);
			
            $trans = get_html_translation_table(HTML_ENTITIES);
    
			$textMedecin		= strtr($langfile["dico_admin_listing_prestations_colum_medecin_pdf"], 	$trans);
			$textMedecinInami	= strtr($langfile["dico_admin_listing_prestations_colum_inami_pdf"], 	$trans);
			$textDuration		= strtr($langfile["dico_admin_listing_prestations_colum_duration_pdf"], $trans);
			$textDuration2		= strtr($langfile["dico_admin_listing_prestations_colum_duration2_pdf"],$trans);
			$textDuration3 	  	= strtr($langfile["dico_admin_listing_prestations_colum_duration3_pdf"],$trans);
			$textPourcentage	= strtr($langfile["dico_admin_listing_prestations_colum_pourcentage_pdf"],$trans);
			$textPourcentageCum = strtr($langfile["dico_admin_listing_prestations_colum_pourcentage_cum_pdf"],$trans);
           
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('MariqueCalcus');
			$pdf->SetTitle(strtr($langfile["navigation_title_admin_listing_prestations_medecins_pdf"], $trans));
			$pdf->SetSubject('Prestations medecins du '.$begda. ' au '.$endda);
			
			// set default header data
			$pdf->SetHeaderData('logonpb.png', 40, strtr($langfile["navigation_title_admin_listing_prestations_medecins_pdf"], $trans), '');
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
			
			
			
				/*if($analyse[$i]["groupe_label"] != $prev_groupe){
					if($i != 0){
						$htmltable .= "</table>";
						// output the HTML content
						$pdf->writeHTML($htmltable, true, 0, true, 0);
						$htmltable = "";
					}*/
					$pdf->AddPage();
					//$pdf->Bookmark($analyse[$i]["groupe_label"], 0, 0);
					//$pdf->Cell(0, 0, $analyse[$i]["groupe_label"], 1, 1, 'C');
					//$color = ($color == '#FEFFF1') ? '#FCF8DC' : '#FEFFF1';
					$htmltable = '<table border="1" cellspacing="2" cellpadding="2">
							<tr>
								<th bgcolor="#FEF0C9" align="center"><b>'.$textMedecin.'</b></th>
								
								<th bgcolor="#FEF0C9" align="center"><b>'.$textDuration.'</b></th>
								
								<th bgcolor="#FEF0C9" align="center"><b>'.$textDuration3.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$textPourcentage.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$textPourcentageCum.'</b></th>
							</tr>';
				
				// create some HTML content

					/*$lineTitle = '<br><h5><u>'.$comptes[$i]["numero"].' - '.$comptes[$i]["descr"].'</u></h5>';
					$pdf->writeHTML($lineTitle, true, 0, true, 0);*/
					
			for($i=0; $i<count($prestations_medecins); $i++){
				$htmltable .= '<tr>';
				 
					$medecinPrenom  = utf8_encode($prestations_medecins[$i]['prenom']);
					$medecinNom     = utf8_encode($prestations_medecins[$i]['nom']);
					$medecinInami   = utf8_encode($prestations_medecins[$i]['inami']);
					$duration       = utf8_encode($prestations_medecins[$i]['duration']);
					$duration2      = utf8_encode($prestations_medecins[$i]['duration2']);
					$duration3      = utf8_encode($prestations_medecins[$i]['duration3']);
					$pourcentage    = utf8_encode($prestations_medecins[$i]['pourcentage']);
					$pourcentageCum = utf8_encode($prestations_medecins[$i]['pourcentage_cum']);
		
					$htmltable .= '<td align="left"> '.$medecinPrenom.' '.$medecinNom.'</td>';
					//$htmltable .= '<td align="left"> '.$medecinInami.'</td>';
					$htmltable .= '<td align="right">'.$duration.'</td>';
					//$htmltable .= '<td align="right">'.$duration2.'</td>';
					$htmltable .= '<td align="right">'.$duration3.'</td>';
					$htmltable .= '<td align="right">'.$pourcentage.'</td>';
					$htmltable .= '<td align="right">'.$pourcentageCum.'</td>';
					
				
				$htmltable .= '</tr>';
			
				}
				
				$htmltable .= "</table>";
				// output the HTML content
				$pdf->writeHTML($htmltable, true, 0, true, 0);
				$htmltable = "";
				
			// ---------------------------------------------------------
			//Close and output PDF document
			$pdf->Output('prestations_medecins_'.$begda.'_'.$endda.'.pdf', 'I');
			
			break;	
			
		default:
			
			$date_start_before  = $date->operationDate($date->date_format_be2us($date_start),0,0,0);
			$date_end_after  = $date->operationDate($date->date_format_be2us($date_end),1,0,0);
			$sqlglobal= "SELECT concat('<div style=\'display: none;\' >',ta.cloture,'</div>',date_format(ta.cloture, '%d/%m/%Y')), concat('<div style=\'display: none;\' >',ta.date,'</div>',date_format(ta.date, '%d/%m/%Y')), pa.nom as patient_nom, pa.prenom as patient_prenom, concat(ta.ct1, '/' ,ta.ct2) as tarification_cts, ta.type as tarification_type, me.nom as medecin_nom, me.prenom as medecin_prenom, td.description as tarification_description, td.cecodi as tarification_cecodi, round(td.cout_mutuelle,2) as cout, td.cout_poly as cout_poly, round((td.cout_medecin/td.cout_mutuelle*100),0) as pourcentage, td.cout_medecin as cout_medecin, greatest(round(td.cout_mutuelle - (td.cout_medecin + td.cout_poly),2),0) as cout_tm from tarifications ta, tarifications_detail td, medecins me, patients pa where ta.etat = 'close' and ta.medecin_inami = me.inami and ta.patient_id = pa.id and td.tarification_id = ta.id";
			$sqlglobal .= " AND ta.cloture >= '$date_start_before'";
			$sqlglobal .= " AND ta.cloture < '$date_end_after'";
			$sqlglobal .= " ORDER BY ta.cloture, td.id";
			
			$_SESSION['listing_specialist'] = $sqlglobal;

			$title = $langfile["navigation_title_admin_listing_specialist"];
	
			$template->assign("date_start", $date_start);
			$template->assign("date_end", $date_end);
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_admin_listing_specialist.tpl");
			
	}

?>