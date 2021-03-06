<?php

	require("./init.php");

		  if (!isset($_SESSION['userid'])) {$template->assign("loginerror", 0);
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
	$type = getArrayVal($_POST, "type");
	$value = utf8_decode(trim(getArrayVal($_POST, "value")));
	$limit = getArrayVal($_POST, "limit");
	
	$mainclasses = array("user" => "user", "management_current" => "management_active", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("product" => "active");
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
	$mylog = (object) new mylog();
	// SEARCH
	$product = (object) new product();
	$comptabilite = (object) new comptabilite();
	$template->assign("workspaceclass", "fullpage");
	switch ($action) {
		
		case "overview_account":
			$title = $langfile["navigation_title_management_comptabilite_overview"];
		
			$template->assign("title", $title);
			
			$annee = date('Y');
			$template->assign("annee", $annee);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_comptabilite_overview_account.tpl");
	    	
			break;

		case "overview_account_submit":
			$title = $langfile["navigation_title_management_comptabilite_overview"];
			$account  = getArrayVal($_POST, "numero_compte");
			$annee = getArrayVal($_POST, "annee");
			$template->assign("annee", $annee);
			
			$comptes = $comptabilite->getOverview($account, $annee);
			
			$template->assign("comptes", $comptes);
			$template->assign("account", $account);			
			$template->assign("workspaceclass", "fullpage");
			$template->display("template_management_comptabilite_overview_account.tpl");
			break;

		case "comparison_account":
			$title = $langfile["navigation_title_management_comptabilite_overview_comparison"];
		
			$template->assign("title", $title);
			
			$mois = date('m');
			$annee1 = date('Y');
			$annee2 = $annee1 - 1;
			$template->assign("mois", $mois);
			$template->assign("annee1", $annee1);
			$template->assign("annee2", $annee2);
			
			$template->display("template_management_comptabilite_overview_comparison.tpl");
	    	
			break;

		case "comparison_account_submit":
			$title = $langfile["navigation_title_management_comptabilite_overview_comparison"];
			$account  = getArrayVal($_POST, "numero_compte");
			$annee1   = getArrayVal($_POST, "annee1");
			$annee2   = getArrayVal($_POST, "annee2");
			$mois     = getArrayVal($_POST, "mois");
			
			
			$comptes = $comptabilite->getComparison($account, $mois, $annee1, $annee2);
			
			$template->assign("comptes", $comptes);
			$template->assign("account", $account);
			$template->assign("annee1",  $annee1);
			$template->assign("annee2",  $annee2);
			$template->assign("mois",    $mois);			
			$template->display("template_management_comptabilite_overview_comparison.tpl");
			break;	

		case "show_comparison":
			$title = $langfile["navigation_title_management_comptabilite_overview_comparison"];
			$account  = getArrayVal($_GET, "account");
			$annee1   = getArrayVal($_GET, "annee1");
			$annee2   = $annee1 - 1;
			$mois     = getArrayVal($_GET, "mois");
			if($mois == ''){
				$mois = date('m');
			}
			
			$comptes = $comptabilite->getComparison($account, $mois, $annee1, $annee2);
			
			$template->assign("comptes", $comptes);
			$template->assign("account", $account);
			$template->assign("annee1",  $annee1);
			$template->assign("annee2",  $annee2);
			$template->assign("mois",    $mois);			
			$template->display("template_management_comptabilite_overview_comparison.tpl");
			break;	

		case "show_details":
			$title = $langfile["navigation_title_management_comptabilite_overview"];
			$account  = getArrayVal($_GET, "numero_compte");
			$annee = getArrayVal($_GET, "annee");
			$template->assign("annee", $annee);
			
			$comptes = $comptabilite->getOverview($account, $annee);
			
			$template->assign("comptes", $comptes);
			$template->assign("account", $account);			
			$template->assign("workspaceclass", "fullpage");
			$template->display("template_management_comptabilite_overview_account.tpl");
			break;	
		
			
		case "print_comparison":
			require_once('./libraries/tcpdf/config/lang/eng.php');
			require_once('./libraries/tcpdf/tcpdf.php');

			$account  = getArrayVal($_GET, "account");
			$annee1   = getArrayVal($_GET, "annee1");
			$annee2   = getArrayVal($_GET, "annee2");
			$mois     = getArrayVal($_GET, "mois");
			
			$comptes = $comptabilite->getComparison($account, $mois, $annee1, $annee2);
			
            $trans = get_html_translation_table(HTML_ENTITIES);
            $trans = array_flip($trans);
	
			$textAnnee2    	  = strtr($langfile["dico_management_comptabilite_cumul_annee"]." ".$annee2, $trans);
            $textAnnee1    	  = strtr($langfile["dico_management_comptabilite_cumul_annee"]." ".$annee1, $trans);
            $delta      	  = strtr($langfile["dico_management_comptabilite_delta"], $trans);
            $deltaPourcentage = strtr($langfile["dico_management_comptabilite_delta_pourcentage"], $trans);
            
            $header=array($annee2, $annee1, $delta, $deltaPourcentage,);
			
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('MariqueCalcus');
			$pdf->SetTitle(strtr($langfile["navigation_title_management_comptabilite_overview_comparison"], $trans));
			$pdf->SetSubject($mois.' - '.$annee1.' - '.$annee2.' - '.$account);
			
			// set default header data
			//$pdf->SetHeaderData('', 30, 'Planning individuel', 'power by MariqueCalcus');
			$pdf->SetHeaderData('mariquecalcus.jpg', 25, strtr($langfile["navigation_title_management_comptabilite_overview_comparison"], $trans), $mois.' - '.$annee1.' - '.$annee2.' - '.$account);
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
			
			
			$pdf->AddPage();
			$pdf->Bookmark('Statut', 0, 0);
			$pdf->Cell(0, 0, 'Statut', 1, 1, 'C');
			
			
			// create some HTML content
			for($i=0; $i<count($comptes); $i++) {
				$lineTitle = '<br><h5><u>'.$comptes[$i]["numero"].' - '.$comptes[$i]["descr"].'</u></h5>';
				$pdf->writeHTML($lineTitle, true, 0, true, 0);
				
				$color = ($color == '#FEFFF1') ? '#FCF8DC' : '#FEFFF1';
				$htmltable = '<table border="1" cellspacing="2" cellpadding="2">
						<tr>
							<th bgcolor="#FEF0C9" align="center"><b>'.$textAnnee2.'</b></th>
							<th bgcolor="#FEF0C9" align="center"><b>'.$textAnnee1.'</b></th>
							<th bgcolor="#FEF0C9" align="center"><b>'.$delta.'</b></th>
							<th bgcolor="#FEF0C9" align="center"><b>'.$deltaPourcentage.'</b></th>
						</tr>';
				$htmltable .= '<tr>';
					
					$prevCumul     		 = utf8_encode($comptes[$i]['prevcumul']); 
					$cumul 				 = utf8_encode($comptes[$i]['cumul']);
					$varDelta   		 = utf8_encode($comptes[$i]['delta']);
					$varDeltaPourcentage = utf8_encode($comptes[$i]['pourcentage']);
		
					$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$prevCumul.'</td>';
					$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$cumul.'</td>';
					$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$varDelta.'</td>';
					$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$varDeltaPourcentage.'</td>';
				$htmltable .= '</tr>';
				$htmltable .= "</table>";
				// output the HTML content
				$pdf->writeHTML($htmltable, true, 0, true, 0);
			
			}
			// ---------------------------------------------------------
			
			//Close and output PDF document
			$pdf->Output('Comparaison_account_'.$annee2.'-'.$annee1.'_'.$mois.'.pdf', 'I');
			
			break;
			
		case "display_state":
			$mois  = getArrayVal($_POST, "mois");
			$annee = getArrayVal($_POST, "annee");
			
			if($mois == "")
				$mois  = date("m");
			if($annee == "")
				$annee = date("Y");	
			
			$compta["mois"] = $mois;
			$compta["annee"] = $annee;
				
			$annee_prec = $annee - 1;	
			
			$title = $langfile["navigation_title_management_comptabilite_display_state"];
			
			$classe = $comptabilite->get_classe('1', $mois, $annee);
			$compta["classe1"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe1_cumul"]  = round( $comptabilite->get_cumul('1', '01', $mois, $annee), 2);
			$compta["classe1_cumul_prec"]  = round( $comptabilite->get_cumul('1', '01', $mois, $annee_prec), 2);
			$compta["classe1_cumul_rapp"]  = round( ( ($compta["classe1_cumul"] / $compta["classe1_cumul_prec"]) - 1 ) * 100, 2); 
			if($compta["classe1_cumul_rapp"] < 0)
				$compta["classe1_cumul_indicateur"] = -1;
			else{
				if($compta["classe1_cumul_rapp"] > 0)
					$compta["classe1_cumul_indicateur"] = 1;
				else	
				 	$compta["classe1_cumul_indicateur"] = 0;
			}	 	
			
			$classe = $comptabilite->get_classe('2', $mois, $annee);
			$compta["classe2"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe2_cumul"] = round( $comptabilite->get_cumul('2', '01', $mois, $annee), 2);
			$compta["classe2_cumul_prec"] = round( $comptabilite->get_cumul('2', '01', $mois, $annee_prec), 2);
			$compta["classe2_cumul_rapp"]  = round( ( ($compta["classe2_cumul"] / $compta["classe2_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe2_cumul_rapp"] < 0)
				$compta["classe2_cumul_indicateur"] = -1;
			else{
				if($compta["classe2_cumul_rapp"] > 0)
					$compta["classe2_cumul_indicateur"] = 1;
				else	
				 	$compta["classe2_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('3', $mois, $annee);
			$compta["classe3"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe3_cumul"] = round( $comptabilite->get_cumul('3', '01', $mois, $annee), 2);
			$compta["classe3_cumul_prec"] = round( $comptabilite->get_cumul('3', '01', $mois, $annee_prec), 2);
			$compta["classe3_cumul_rapp"]  = round( ( ($compta["classe3_cumul"] / $compta["classe3_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe3_cumul_rapp"] < 0)
				$compta["classe3_cumul_indicateur"] = -1;
			else{
				if($compta["classe3_cumul_rapp"] > 0)
					$compta["classe3_cumul_indicateur"] = 1;
				else	
				 	$compta["classe3_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('4', $mois, $annee);
			$compta["classe4"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe4_cumul"] = round( $comptabilite->get_cumul('4', '01', $mois, $annee), 2);
			$compta["classe4_cumul_prec"] = round( $comptabilite->get_cumul('4', '01', $mois, $annee_prec), 2);
			$compta["classe4_cumul_rapp"]  = round( ( ($compta["classe4_cumul"] / $compta["classe4_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe4_cumul_rapp"] < 0)
				$compta["classe4_cumul_indicateur"] = -1;
			else{
				if($compta["classe4_cumul_rapp"] > 0)
					$compta["classe4_cumul_indicateur"] = 1;
				else	
				 	$compta["classe4_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('5', $mois, $annee);
			$compta["classe5"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe5_cumul"] = round( $comptabilite->get_cumul('5', '01', $mois, $annee), 2);
			$compta["classe5_cumul_prec"] = round( $comptabilite->get_cumul('5', '01', $mois, $annee_prec), 2);
			$compta["classe5_cumul_rapp"]  = round( ( ($compta["classe5_cumul"] / $compta["classe5_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe5_cumul_rapp"] < 0)
				$compta["classe5_cumul_indicateur"] = -1;
			else{
				if($compta["classe5_cumul_rapp"] > 0)
					$compta["classe5_cumul_indicateur"] = 1;
				else	
				 	$compta["classe5_cumul_indicateur"] = 0;
			}			
			
			$compta["benefice"] = 		round( $compta["classe1"] + $compta["classe2"] + 
			                            $compta["classe3"] + $compta["classe4"] + 
			                            $compta["classe5"], 2);
			$compta["benefice_cumul"] = round( $compta["classe1_cumul"] + $compta["classe2_cumul"] + 
			                            $compta["classe3_cumul"] + $compta["classe4_cumul"] + 
			                            $compta["classe5_cumul"], 2);
			$compta["benefice_cumul_prec"] = round( $compta["classe1_cumul_prec"] + $compta["classe2_cumul_prec"] + 
			                                 $compta["classe3_cumul_prec"] + $compta["classe4_cumul_prec"] + 
			                                 $compta["classe5_cumul_prec"], 2);
			$compta["benefice_cumul_rapp"]  = round( ( ($compta["benefice_cumul"] / $compta["benefice_cumul_prec"]) - 1 ) * 100, 2);                                                               
			if($compta["benefice_cumul_rapp"] < 0)
				$compta["benefice_cumul_indicateur"] = -1;
			else{
				if($compta["benefice_cumul_rapp"] > 0)
					$compta["benefice_cumul_indicateur"] = 1;
				else	
				 	$compta["benefice_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('60', $mois, $annee);
			$compta["classe60_vad"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe60_vad_cumul"] = round( $comptabilite->get_cumul('60', '01', $mois, $annee), 2);
			$compta["classe60_vad_cumul_prec"] = round( $comptabilite->get_cumul('60', '01', $mois, $annee_prec), 2);
			$compta["classe60_vad_cumul_rapp"]  = round( ( ($compta["classe60_vad_cumul"] / $compta["classe60_vad_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe60_vad_cumul_rapp"] > 0)
				$compta["classe60_vad_cumul_indicateur"] = -1;
			else{
				if($compta["classe60_vad_cumul_rapp"] < 0)
					$compta["classe60_vad_cumul_indicateur"] = 1;
				else	
				 	$compta["classe60_vad_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('61', $mois, $annee);
			$compta["classe61_cgs"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe61_cgs_cumul"] = round( $comptabilite->get_cumul('61', '01', $mois, $annee), 2);
			$compta["classe61_cgs_cumul_prec"] = round( $comptabilite->get_cumul('61', '01', $mois, $annee_prec), 2);
			$compta["classe61_cgs_cumul_rapp"]  = round( ( ($compta["classe61_cgs_cumul"] / $compta["classe61_cgs_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe61_cgs_cumul_rapp"] > 0)
				$compta["classe61_cgs_cumul_indicateur"] = -1;
			else{
				if($compta["classe61_cgs_cumul_rapp"] < 0)
					$compta["classe61_cgs_cumul_indicateur"] = 1;
				else	
				 	$compta["classe61_cgs_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('62', $mois, $annee);
			$compta["classe62_cgs"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe62_cgs_cumul"] = round( $comptabilite->get_cumul('62', '01', $mois, $annee), 2);
			$compta["classe62_cgs_cumul_prec"] = round( $comptabilite->get_cumul('62', '01', $mois, $annee_prec), 2);
			$compta["classe62_cgs_cumul_rapp"]  = round( ( ($compta["classe62_cgs_cumul"] / $compta["classe62_cgs_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe62_cgs_cumul_rapp"] > 0)
				$compta["classe62_cgs_cumul_indicateur"] = -1;
			else{
				if($compta["classe62_cgs_cumul_rapp"] < 0)
					$compta["classe62_cgs_cumul_indicateur"] = 1;
				else	
				 	$compta["classe62_cgs_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('63', $mois, $annee);
			$compta["classe63_cgs"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe63_cgs_cumul"] = round( $comptabilite->get_cumul('63', '01', $mois, $annee), 2);
			$compta["classe63_cgs_cumul_prec"] = round( $comptabilite->get_cumul('63', '01', $mois, $annee_prec), 2);
			$compta["classe63_cgs_cumul_rapp"]  = round( ( ($compta["classe63_cgs_cumul"] / $compta["classe63_cgs_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe63_cgs_cumul_rapp"] > 0)
				$compta["classe63_cgs_cumul_indicateur"] = -1;
			else{
				if($compta["classe63_cgs_cumul_rapp"] < 0)
					$compta["classe63_cgs_cumul_indicateur"] = 1;
				else	
				 	$compta["classe63_cgs_cumul_indicateur"] = 0;
			}						
			 
			$classe = $comptabilite->get_classe('64', $mois, $annee);
			$compta["classe64_cgs"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe64_cgs_cumul"] = round( $comptabilite->get_cumul('64', '01', $mois, $annee), 2);
			$compta["classe64_cgs_cumul_prec"] = round( $comptabilite->get_cumul('64', '01', $mois, $annee_prec), 2);
			$compta["classe64_cgs_cumul_rapp"]  = round( ( ($compta["classe64_cgs_cumul"] / $compta["classe64_cgs_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe64_cgs_cumul_rapp"] > 0)
				$compta["classe64_cgs_cumul_indicateur"] = -1;
			else{
				if($compta["classe64_cgs_cumul_rapp"] < 0)
					$compta["classe64_cgs_cumul_indicateur"] = 1;
				else	
				 	$compta["classe64_cgs_cumul_indicateur"] = 0;
			}						
			
			$classe = $comptabilite->get_classe('65', $mois, $annee);
			$compta["classe65"]     = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe65_cumul"] = round( $comptabilite->get_cumul('65', '01', $mois, $annee), 2);
			$compta["classe65_cumul_prec"] = round( $comptabilite->get_cumul('65', '01', $mois, $annee_prec), 2);
			$compta["classe65_cumul_rapp"]  = round( ( ($compta["classe65_cumul"] / $compta["classe65_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe65_cumul_rapp"] > 0)
				$compta["classe65_cumul_indicateur"] = -1;
			else{
				if($compta["classe65_cumul_rapp"] < 0)
					$compta["classe65_cumul_indicateur"] = 1;
				else	
				 	$compta["classe65_cumul_indicateur"] = 0;
			}						 
			 
			$classe = $comptabilite->get_classe('66', $mois, $annee);
			$compta["classe66"]     = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe66_cumul"] = round( $comptabilite->get_cumul('66', '01', $mois, $annee), 2);
			$compta["classe66_cumul_prec"] = round( $comptabilite->get_cumul('66', '01', $mois, $annee_prec), 2);
			$compta["classe66_cumul_rapp"]  = round( ( ($compta["classe66_cumul"] / $compta["classe66_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe66_cumul_rapp"] > 0)
				$compta["classe66_cumul_indicateur"] = -1;
			else{
				if($compta["classe66_cumul_rapp"] < 0)
					$compta["classe66_cumul_indicateur"] = 1;
				else	
				 	$compta["classe66_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('67', $mois, $annee);
			$compta["classe67"]     = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe67_cumul"] = round( $comptabilite->get_cumul('67', '01', $mois, $annee), 2);
			$compta["classe67_cumul_prec"] = round( $comptabilite->get_cumul('67', '01', $mois, $annee_prec), 2);
			$compta["classe67_cumul_rapp"]  = round( ( ($compta["classe67_cumul"] / $compta["classe67_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe67_cumul_rapp"] > 0)
				$compta["classe67_cumul_indicateur"] = -1;
			else{
				if($compta["classe67_cumul_rapp"] < 0)
					$compta["classe67_cumul_indicateur"] = 1;
				else	
				 	$compta["classe67_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('70', $mois, $annee);
			$compta["classe70_vad"] = round($classe["credit"] - $classe["debit"], 2);
			$compta["classe70_vad_cumul"] = round( (-1) * $comptabilite->get_cumul('70', '01', $mois, $annee), 2);
			$compta["classe70_vad_cumul_prec"] = round( (-1) * $comptabilite->get_cumul('70', '01', $mois, $annee_prec), 2);
			$compta["classe70_vad_cumul_rapp"]  = round( ( ($compta["classe70_vad_cumul"] / $compta["classe70_vad_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe70_vad_cumul_rapp"] < 0)
				$compta["classe70_vad_cumul_indicateur"] = -1;
			else{
				if($compta["classe70_vad_cumul_rapp"] > 0)
					$compta["classe70_vad_cumul_indicateur"] = 1;
				else	
				 	$compta["classe70_vad_cumul_indicateur"] = 0;
			}

			$classe = $comptabilite->get_classe('72', $mois, $annee);
			$compta["classe72_vad"] = round($classe["credit"] - $classe["debit"], 2);
			$compta["classe72_vad_cumul"] = round( (-1) * $comptabilite->get_cumul('72', '01', $mois, $annee), 2);
			$compta["classe72_vad_cumul_prec"] = round( (-1) * $comptabilite->get_cumul('72', '01', $mois, $annee_prec), 2);
			$compta["classe72_vad_cumul_rapp"]  = round( ( ($compta["classe72_vad_cumul"] / $compta["classe72_vad_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe72_vad_cumul_rapp"] < 0)
				$compta["classe72_vad_cumul_indicateur"] = -1;
			else{
				if($compta["classe72_vad_cumul_rapp"] > 0)
					$compta["classe72_vad_cumul_indicateur"] = 1;
				else	
				 	$compta["classe72_vad_cumul_indicateur"] = 0;
			}
			
			$classe = $comptabilite->get_classe('74', $mois, $annee);
			$compta["classe74_vad"] = round($classe["credit"] - $classe["debit"], 2);
			$compta["classe74_vad_cumul"] = round( (-1) * $comptabilite->get_cumul('74', '01', $mois, $annee), 2);
			$compta["classe74_vad_cumul_prec"] = round( (-1) * $comptabilite->get_cumul('74', '01', $mois, $annee_prec), 2);
			$compta["classe74_vad_cumul_rapp"]  = round( ( ($compta["classe74_vad_cumul"] / $compta["classe74_vad_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe74_vad_cumul_rapp"] < 0)
				$compta["classe74_vad_cumul_indicateur"] = -1;
			else{
				if($compta["classe74_vad_cumul_rapp"] > 0)
					$compta["classe74_vad_cumul_indicateur"] = 1;
				else	
				 	$compta["classe74_vad_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('75', $mois, $annee);
			$compta["classe75"]     = round($classe["credit"] - $classe["debit"], 2);
			$compta["classe75_cumul"] = round( (-1) * $comptabilite->get_cumul('75', '01', $mois, $annee), 2);
			$compta["classe75_cumul_prec"] = round( (-1) * $comptabilite->get_cumul('75', '01', $mois, $annee_prec), 2);
			$compta["classe75_cumul_rapp"]  = round( ( ($compta["classe75_cumul"] / $compta["classe75_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe75_cumul_rapp"] < 0)
				$compta["classe75_cumul_indicateur"] = -1;
			else{
				if($compta["classe75_cumul_rapp"] > 0)
					$compta["classe75_cumul_indicateur"] = 1;
				else	
				 	$compta["classe75_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('76', $mois, $annee);
			$compta["classe76"]     = round($classe["credit"] - $classe["debit"], 2);
			$compta["classe76_cumul"] = round( (-1) * $comptabilite->get_cumul('76', '01', $mois, $annee), 2);
			$compta["classe76_cumul_prec"] = round( (-1) * $comptabilite->get_cumul('76', '01', $mois, $annee_prec), 2);
			$compta["classe76_cumul_rapp"]  = round( ( ($compta["classe76_cumul"] / $compta["classe76_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe76_cumul_rapp"] < 0)
				$compta["classe76_cumul_indicateur"] = -1;
			else{
				if($compta["classe76_cumul_rapp"] > 0)
					$compta["classe76_cumul_indicateur"] = 1;
				else	
				 	$compta["classe76_cumul_indicateur"] = 0;
			}						
			
			$compta["benefice_fr"] = round( -1 * (
									 $compta["classe70_vad"] + $compta["classe72_vad"] + $compta["classe74_vad"] + 
			                         $compta["classe75"]     + $classe["classe76"]     - 
			                        ($compta["classe60_vad"] + $compta["classe61_cgs"] + 
			                         $compta["classe62_cgs"] + $compta["classe63_cgs"] + 
			                         $compta["classe64_cgs"] + $compta["classe65"]     + 
			                         $compta["classe66"]     + $compta["classe67"]) ), 2);
			$compta["benefice_fr_cumul"] = round( -1 * (
									 $compta["classe70_vad_cumul"] + $compta["classe72_vad_cumul"] + $compta["classe74_vad_cumul"] + 
			                         $compta["classe75_cumul"]     + $classe["classe76_cumul"]     - 
			                        ($compta["classe60_vad_cumul"] + $compta["classe61_cgs_cumul"] + 
			                         $compta["classe62_cgs_cumul"] + $compta["classe63_cgs_cumul"] + 
			                         $compta["classe64_cgs_cumul"] + $compta["classe65_cumul"]     + 
			                         $compta["classe66_cumul"]     + $compta["classe67_cumul"]) ), 2);
			$compta["benefice_fr_cumul_prec"] = round( -1 * (
									 $compta["classe70_vad_cumul_prec"] + $compta["classe72_vad_cumul_prec"] + $compta["classe74_vad_cumul_prec"] + 
			                         $compta["classe75_cumul_prec"]     + $classe["classe76_cumul_prec"]     - 
			                        ($compta["classe60_vad_cumul_prec"] + $compta["classe61_cgs_cumul_prec"] + 
			                         $compta["classe62_cgs_cumul_prec"] + $compta["classe63_cgs_cumul_prec"] + 
			                         $compta["classe64_cgs_cumul_prec"] + $compta["classe65_cumul_prec"]     + 
			                         $compta["classe66_cumul_prec"]     + $compta["classe67_cumul_prec"]) ), 2);
			$compta["benefice_fr_cumul_rapp"]  = round( ( ($compta["benefice_fr_cumul"] / $compta["benefice_fr_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["benefice_fr_cumul_prec"] < 0)
				$compta["benefice_fr_cumul_rapp"] = $compta["benefice_fr_cumul_rapp"] * (-1);						                         			                         
			if($compta["benefice_fr_cumul_rapp"] > 0)
				$compta["benefice_fr_cumul_indicateur"] = -1;
			else{
				if($compta["benefice_fr_cumul_rapp"] < 0)
					$compta["benefice_fr_cumul_indicateur"] = 1;
				else	
				 	$compta["benefice_fr_cumul_indicateur"] = 0;
			}						
				
			$compta["marge_brute"] = round( $compta["classe70_vad"] - $compta["classe60_vad"], 2);
			$compta["marge_brute_cumul"] = round( $compta["classe70_vad_cumul"] - $compta["classe60_vad_cumul"], 2);
			$compta["marge_brute_cumul_prec"] = round( $compta["classe70_vad_cumul_prec"] - $compta["classe60_vad_cumul_prec"], 2);
			$compta["marge_brute_cumul_rapp"]  = round( ( ($compta["marge_brute_cumul"] / $compta["marge_brute_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["marge_brute_cumul_rapp"] < 0)
				$compta["marge_brute_cumul_indicateur"] = -1;
			else{
				if($compta["marge_brute_cumul_rapp"] > 0)
					$compta["marge_brute_cumul_indicateur"] = 1;
				else	
				 	$compta["marge_brute_cumul_indicateur"] = 0;
			}					
			
			$compta["vad"] = round( $compta["classe70_vad"] + $compta["classe72_vad"] + $compta["classe74_vad"] - $compta["classe60_vad"], 2);
			$compta["vad_cumul"] = round( $compta["classe70_vad_cumul"] + $compta["classe72_vad_cumul"] + $compta["classe74_vad_cumul"] - $compta["classe60_vad_cumul"], 2);
			$compta["vad_cumul_prec"] = round( $compta["classe70_vad_cumul_prec"] + $compta["classe72_vad_cumul_prec"] + $compta["classe74_vad_cumul_prec"] - $compta["classe60_vad_cumul_prec"], 2);
			$compta["vad_cumul_rapp"]  = round( ( ($compta["vad_cumul"] / $compta["vad_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["vad_cumul_rapp"] < 0)
				$compta["vad_cumul_indicateur"] = -1;
			else{
				if($compta["vad_cumul_rapp"] > 0)
					$compta["vad_cumul_indicateur"] = 1;
				else	
				 	$compta["vad_cumul_indicateur"] = 0;
			}				
			
			$compta["cgs"] = round( $compta["classe61_cgs"] + $compta["classe62_cgs"] + $compta["classe63_cgs"] + $compta["classe64_cgs"], 2);
			$compta["cgs_cumul"] = round( $compta["classe61_cgs_cumul"] + $compta["classe62_cgs_cumul"] + $compta["classe63_cgs_cumul"] + $compta["classe64_cgs_cumul"], 2);
			$compta["cgs_cumul_prec"] = round( $compta["classe61_cgs_cumul_prec"] + $compta["classe62_cgs_cumul_prec"] + $compta["classe63_cgs_cumul_prec"] + $compta["classe64_cgs_cumul_prec"], 2);
			$compta["cgs_cumul_rapp"]  = round( ( ($compta["cgs_cumul"] / $compta["cgs_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["cgs_cumul_rapp"] > 0)
				$compta["cgs_cumul_indicateur"] = -1;
			else{
				if($compta["cgs_cumul_rapp"] < 0)
					$compta["cgs_cumul_indicateur"] = 1;
				else	
				 	$compta["cgs_cumul_indicateur"] = 0;
			}			
			
			$compta["tee"] = round( $compta["vad"]/$compta["cgs"], 2);
			$compta["tee_cumul"] = round( $compta["vad_cumul"]/$compta["cgs_cumul"], 2);
			$compta["tee_cumul_prec"] = round( $compta["vad_cumul_prec"]/$compta["cgs_cumul_prec"], 2);
			$compta["tee_cumul_rapp"]  = round( ( ($compta["tee_cumul"] / $compta["tee_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["tee_cumul_rapp"] < 0)
				$compta["tee_cumul_indicateur"] = -1;
			else{
				if($compta["tee_cumul_rapp"] > 0)
					$compta["tee_cumul_indicateur"] = 1;
				else	
				 	$compta["tee_cumul_indicateur"] = 0;
			}						
			
			$compta["fr"]    = round( $compta["classe1"] + $compta["classe2"], 2);
			$compta["fr_cumul"]    = round( $compta["classe1_cumul"] + $compta["classe2_cumul"], 2);
			$compta["fr_cumul_prec"]    = round( $compta["classe1_cumul_prec"] + $compta["classe2_cumul_prec"], 2);
			$compta["fr_cumul_rapp"]  = round( ( ($compta["fr_cumul"] / $compta["fr_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["fr_cumul_rapp"] < 0)
				$compta["fr_cumul_indicateur"] = -1;
			else{
				if($compta["fr_cumul_rapp"] > 0)
					$compta["fr_cumul_indicateur"] = 1;
				else	
				 	$compta["fr_cumul_indicateur"] = 0;
			}			
			
			$compta["bfr"]   = round( $compta["classe3"] + $compta["classe4"], 2);
			$compta["bfr_cumul"]   = round( $compta["classe3_cumul"] + $compta["classe4_cumul"], 2);
			$compta["bfr_cumul_prec"]   = round( $compta["classe3_cumul_prec"] + $compta["classe4_cumul_prec"], 2);
			$compta["bfr_cumul_rapp"]  = round( ( ($compta["bfr_cumul"] / $compta["bfr_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["bfr_cumul_prec"] < $compta["bfr_cumul"])
				$compta["bfr_cumul_indicateur"] = -1;
			else{
				if($compta["bfr_cumul_prec"] > $compta["bfr_cumul"])
					$compta["bfr_cumul_indicateur"] = 1;
				else	
				 	$compta["bfr_cumul_indicateur"] = 0;
			}			
			
			$compta["tr"]    = round( abs($compta["fr"]) + abs($compta["bfr"]), 2);
			$compta["tr_cumul"]    = round( abs($compta["fr_cumul"]) + abs($compta["bfr_cumul"]), 2);
			$compta["tr_cumul_prec"]    = round( abs($compta["fr_cumul_prec"]) + abs($compta["bfr_cumul_prec"]), 2);
			$compta["tr_cumul_rapp"]  = round( ( ($compta["tr_cumul"] / $compta["tr_cumul_prec"]) - 1 ) * 100, 2);
			//$compta["verif"] = $compta["classe70_vad"] + $compta["classe74_vad"] - $compta["classe60_vad"];
			if($compta["tr_cumul_rapp"] < 0)
				$compta["tr_cumul_indicateur"] = -1;
			else{
				if($compta["tr_cumul_rapp"] > 0)
					$compta["tr_cumul_indicateur"] = 1;
				else	
				 	$compta["tr_cumul_indicateur"] = 0;
			}
			
			$compta["vadbfr"] = round( $compta["vad"]/$compta["bfr"], 2);
			$compta["vadbfr_cumul"] = round( $compta["vad_cumul"]/$compta["bfr_cumul"], 2);
			$compta["vadbfr_cumul_prec"] = round( $compta["vad_cumul_prec"]/$compta["bfr_cumul_prec"], 2);
			$compta["vadbfr_cumul_rapp"]  = round( ( ($compta["vadbfr_cumul"] / $compta["vadbfr_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["vadbfr_cumul_rapp"] < 0)
				$compta["vadbfr_cumul_indicateur"] = -1;
			else{
				if($compta["vadbfr_cumul_rapp"] > 0)
					$compta["vadbfr_cumul_indicateur"] = 1;
				else	
				 	$compta["vadbfr_cumul_indicateur"] = 0;
			}			
			
			$compta["tef"]    = round( $compta["fr"]/$compta["bfr"], 2);
			$compta["tef_cumul"]    = round( $compta["fr_cumul"]/$compta["bfr_cumul"], 2);
			$compta["tef_cumul_prec"]    = round( $compta["fr_cumul_prec"]/$compta["bfr_cumul_prec"], 2);
			$compta["tef_cumul_rapp"]  = round( ( ($compta["tef_cumul"] / $compta["tef_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["tef_cumul_rapp"] < 0)
				$compta["tef_cumul_indicateur"] = -1;
			else{
				if($compta["tef_cumul_rapp"] > 0)
					$compta["tef_cumul_indicateur"] = 1;
				else	
				 	$compta["tef_cumul_indicateur"] = 0;
			}			
			
			$compta["cash"]   = round( ((-1)*$compta["benefice_fr"]) + $compta["classe63_cgs"], 2);
			$compta["cash_cumul"]   = round( ((-1)*$compta["benefice_fr_cumul"]) + $compta["classe63_cgs_cumul"], 2);
			$compta["cash_cumul_prec"]   = round( ((-1)*$compta["benefice_fr_cumul_prec"]) + $compta["classe63_cgs_cumul_prec"], 2);
			$compta["cash_cumul_rapp"]  = round( ( ($compta["cash_cumul"] / $compta["cash_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["cash_cumul_rapp"] < 0)
				$compta["cash_cumul_indicateur"] = -1;
			else{
				if($compta["cash_cumul_rapp"] > 0)
					$compta["cash_cumul_indicateur"] = 1;
				else	
				 	$compta["cash_cumul_indicateur"] = 0;
			}						
			
			$template->assign("title", $title);
			$template->assign("compta", $compta);
			$template->display("template_management_comptabilite_display_state.tpl");
	        break;		

	    case 'print_comment':
            
	    	require_once('./libraries/tcpdf/config/lang/eng.php');
			require_once('./libraries/tcpdf/tcpdf.php');
			
			$trans = get_html_translation_table(HTML_ENTITIES);
            $trans = array_flip($trans);
			
			$classe_faits     	= strtr($langfile["dico_management_comptabilite_faits"], $trans);
            $classe_conclusions = strtr($langfile["dico_management_comptabilite_conclusions"], $trans);
            $classe_actions  	= strtr($langfile["dico_management_comptabilite_actions"], $trans);
            
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('MariqueCalcus');
			$pdf->SetTitle('Commentaires sur la/les classes:');
			
			// set default header data
			//$pdf->SetHeaderData('', 30, 'Planning individuel', 'power by MariqueCalcus');
			$pdf->SetHeaderData('mariquecalcus.jpg', 25, 'Nouvelle Polyclinique du Borinage', 'Route Provinciale 15A - 7340 Colfontaine');
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
	    	
	    	
	    	//$classe_id = getArrayVal($_REQUEST, "classe_id");
	    	$id_classe  = getArrayVal($_GET, "id_classe");
			if ($id_classe == '*'){
				for ($i=1; $i<=29; $i++){
					$result = $comptabilite->getcomment2($i);
		    	
					$pdf->AddPage();
					$pdf->writeHTML("<H2>".$result['nom']."</H2>", true, 0, true, 0);
						
					// add a page
						$htmlpage = "";
						$htmlpage .= "<ul>";
						$htmlpage .= "<li>";
						$htmlpage .= "<u>".$classe_faits." : </u>".$result['faits'];
						$htmlpage .= "</li>";
						$htmlpage .= "<li>";
						$htmlpage .= "<u>".$classe_conclusions." : </u>".$result['conclusions'];
						$htmlpage .= "</li>";
						$htmlpage .= "<li>";
						$htmlpage .= "<u>".$classe_actions." : </u>".$result['actions'];
						$htmlpage .= "</li>";
						$htmlpage .= "</ul>";
						$pdf->writeHTML($htmlpage, true, 0, true, 0);
					
						
					// output the HTML content
					$pdf->writeHTML($htmltable, true, 0, true, 0);
				}	
				
				//Close and output PDF document
				$pdf->Output('commentaires_toutes_classes.pdf', 'I');
			}
			else{
		    	$result = $comptabilite->getcomment2($id_classe);
		    	
				$pdf->AddPage();
				$pdf->writeHTML("<H2>".$result['nom']."</H2>", true, 0, true, 0);
					
				// add a page
				$htmlpage = "";
				$htmlpage .= "<ul>";
				$htmlpage .= "<li>";
				$htmlpage .= "<u>".$classe_faits." : </u>".$result['faits'];
				$htmlpage .= "</li>";
				$htmlpage .= "<li>";
				$htmlpage .= "<u>".$classe_conclusions." : </u>".$result['conclusions'];
				$htmlpage .= "</li>";
				$htmlpage .= "<li>";
				$htmlpage .= "<u>".$classe_actions." : </u>".$result['actions'];
				$htmlpage .= "</li>";
				$htmlpage .= "</ul>";
				$pdf->writeHTML($htmlpage, true, 0, true, 0);
			
					
				// output the HTML content
				$pdf->writeHTML($htmltable, true, 0, true, 0);
				
				
				//Close and output PDF document
				$pdf->Output('commentaire_'.$result['nom'].'.pdf', 'I');
			}
			// ---------------------------------------------------------
			
			break;    
	        
		case "print_state":
			require_once('./libraries/tcpdf/config/lang/eng.php');
			require_once('./libraries/tcpdf/tcpdf.php');

			$mois  = getArrayVal($_GET, "mois");
			$annee = getArrayVal($_GET, "annee");
			
			if($mois == "")
				$mois  = date("m");
			if($annee == "")
				$annee = date("Y");
			
			$compta["mois"] = $mois;
			$compta["annee"] = $annee;
				
			$annee_prec = $annee - 1;
			
            $trans = get_html_translation_table(HTML_ENTITIES);
            $trans = array_flip($trans);
            
			$comptaElement     	= strtr($langfile["dico_management_comptabilite_element"], $trans);
            $comptaCourant    	= strtr($langfile["dico_management_comptabilite_courant"], $trans);
            $comptaCumule   	= strtr($langfile["dico_management_comptabilite_cumule"], $trans);
            $comptaRapport   	= strtr($langfile["dico_management_comptabilite_rapport"], $trans);
            $comptaIndicateur  	= strtr($langfile["dico_management_comptabilite_indicateur"], $trans);
            
            $header=array($comptaElement, $comptaCourant, $comptaCumule, $comptaRapport, $comptaIndicateur);
			
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('MariqueCalcus');
			$pdf->SetTitle('Statut comptabilit�');
			$pdf->SetSubject($mois.' - '.$annee);
			
			// set default header data
			//$pdf->SetHeaderData('', 30, 'Planning individuel', 'power by MariqueCalcus');
			$pdf->SetHeaderData('mariquecalcus.jpg', 25, 'Statut comptabilite', $mois.' - '.$annee);
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
			
			//TO BE REPLACED	
			
			$classe = $comptabilite->get_classe('1', $mois, $annee);
			$compta[0]["nom"]         = strtr($langfile["dico_management_comptabilite_classe1"], $trans);
			$compta[0]["courant"]     = round($classe["debit"] - $classe["credit"], 2);
			$compta[0]["cumul"]       = round( $comptabilite->get_cumul('1', '01', $mois, $annee), 2);
			$compta[0]["cumul_prec"]  = round( $comptabilite->get_cumul('1', '01', $mois, $annee_prec), 2);
			$compta[0]["rapport"]     = round( ( ($compta[0]["cumul"] / $compta[0]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[0]["rapport"] < 0)
				$compta[0]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[0]["rapport"] == 0)
					$compta[0]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[0]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}	 
			 
			$classe = $comptabilite->get_classe('2', $mois, $annee);
			$compta[1]["nom"]        = strtr($langfile["dico_management_comptabilite_classe2"], $trans);
			$compta[1]["courant"]    = round($classe["debit"] - $classe["credit"], 2);
			$compta[1]["cumul"]      = round( $comptabilite->get_cumul('2', '01', $mois, $annee), 2);
			$compta[1]["cumul_prec"] = round( $comptabilite->get_cumul('2', '01', $mois, $annee_prec), 2);
			$compta[1]["rapport"]    = round( ( ($compta[1]["cumul"] / $compta[1]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[1]["rapport"] < 0)
				$compta[1]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[1]["rapport"] == 0)
					$compta[1]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[1]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}
			
			$classe = $comptabilite->get_classe('3', $mois, $annee);
			$compta[2]["nom"]        = strtr($langfile["dico_management_comptabilite_classe3"], $trans);		
			$compta[2]["courant"]    = round($classe["debit"] - $classe["credit"], 2);
			$compta[2]["cumul"]      = round( $comptabilite->get_cumul('3', '01', $mois, $annee), 2);
			$compta[2]["cumul_prec"] = round( $comptabilite->get_cumul('3', '01', $mois, $annee_prec), 2);
			$compta[2]["rapport"]    = round( ( ($compta[2]["cumul"] / $compta[2]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[2]["rapport"] < 0)
				$compta[2]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[2]["rapport"] == 0)
					$compta[2]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[2]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}
			
			$classe = $comptabilite->get_classe('4', $mois, $annee);
			$compta[3]["nom"]        = strtr($langfile["dico_management_comptabilite_classe4"], $trans);
			$compta[3]["courant"]    = round($classe["debit"] - $classe["credit"], 2);
			$compta[3]["cumul"]      = round( $comptabilite->get_cumul('4', '01', $mois, $annee), 2);
			$compta[3]["cumul_prec"] = round( $comptabilite->get_cumul('4', '01', $mois, $annee_prec), 2);
			$compta[3]["rapport"]    = round( ( ($compta[3]["cumul"] / $compta[3]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[3]["rapport"] < 0)
				$compta[3]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[3]["rapport"] == 0)
					$compta[3]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[3]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$classe = $comptabilite->get_classe('5', $mois, $annee);
			$compta[4]["nom"]        = strtr($langfile["dico_management_comptabilite_classe5"], $trans);
			$compta[4]["courant"]    = round($classe["debit"] - $classe["credit"], 2);
			$compta[4]["cumul"]      = round( $comptabilite->get_cumul('5', '01', $mois, $annee), 2);
			$compta[4]["cumul_prec"] = round( $comptabilite->get_cumul('5', '01', $mois, $annee_prec), 2);
			$compta[4]["rapport"]    = round( ( ($compta[4]["cumul"] / $compta[4]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[4]["rapport"] < 0)
				$compta[4]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[4]["rapport"] == 0)
					$compta[4]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[4]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$compta[5]["nom"]        = strtr($langfile["dico_management_comptabilite_benefice"], $trans);
			$compta[5]["courant"]    = round( $compta[0]["courant"] + $compta[1]["courant"] + 
			                            $compta[2]["courant"] + $compta[3]["courant"] + 
			                            $compta[4]["courant"], 2);
			$compta[5]["cumul"]      = round( $compta[0]["cumul"] + $compta[1]["cumul"] + 
			                            $compta[2]["cumul"] + $compta[3]["cumul"] + 
			                            $compta[4]["cumul"], 2);
			$compta[5]["cumul_prec"] = round( $compta[0]["cumul_prec"] + $compta[1]["cumul_prec"] + 
			                                 $compta[2]["cumul_prec"] + $compta[3]["cumul_prec"] + 
			                                 $compta[4]["cumul_prec"], 2);
			$compta[5]["rapport"]    = round( ( ($compta[5]["cumul"] / $compta[5]["cumul_prec"]) - 1 ) * 100, 2);                                                               
			if($compta[5]["rapport"] < 0)
				$compta[5]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[5]["rapport"] == 0)
					$compta[5]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[5]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$classe = $comptabilite->get_classe('60', $mois, $annee);
			$compta[6]["nom"]        = strtr($langfile["dico_management_comptabilite_classe60_vad"], $trans);
			$compta[6]["courant"] = round($classe["debit"] - $classe["credit"], 2);
			$compta[6]["cumul"] = round( $comptabilite->get_cumul('60', '01', $mois, $annee), 2);
			$compta[6]["cumul_prec"] = round( $comptabilite->get_cumul('60', '01', $mois, $annee_prec), 2);
			$compta[6]["rapport"]  = round( ( ($compta[6]["cumul"] / $compta[6]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[6]["rapport"] > 0)
				$compta[6]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[6]["rapport"] == 0)
					$compta[6]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[6]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}
			
			$classe = $comptabilite->get_classe('61', $mois, $annee);
			$compta[7]["nom"]        = strtr($langfile["dico_management_comptabilite_classe61_cgs"], $trans);
			$compta[7]["courant"]    = round($classe["debit"] - $classe["credit"], 2);
			$compta[7]["cumul"]      = round( $comptabilite->get_cumul('61', '01', $mois, $annee), 2);
			$compta[7]["cumul_prec"] = round( $comptabilite->get_cumul('61', '01', $mois, $annee_prec), 2);
			$compta[7]["rapport"]    = round( ( ($compta[7]["cumul"] / $compta[7]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[7]["rapport"] > 0)
				$compta[7]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[7]["rapport"] == 0)
					$compta[7]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[7]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}
			
			$classe = $comptabilite->get_classe('62', $mois, $annee);
			$compta[8]["nom"]        = strtr($langfile["dico_management_comptabilite_classe62_cgs"], $trans);
			$compta[8]["courant"]    = round($classe["debit"] - $classe["credit"], 2);
			$compta[8]["cumul"]      = round( $comptabilite->get_cumul('62', '01', $mois, $annee), 2);
			$compta[8]["cumul_prec"] = round( $comptabilite->get_cumul('62', '01', $mois, $annee_prec), 2);
			$compta[8]["rapport"]    = round( ( ($compta[8]["cumul"] / $compta[8]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[8]["rapport"] > 0)
				$compta[8]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[8]["rapport"] == 0)
					$compta[8]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[8]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			 
			
			$classe = $comptabilite->get_classe('63', $mois, $annee);
			$compta[9]["nom"]        = strtr($langfile["dico_management_comptabilite_classe63_cgs"], $trans);
			$compta[9]["courant"]    = round($classe["debit"] - $classe["credit"], 2);
			$compta[9]["cumul"]      = round( $comptabilite->get_cumul('63', '01', $mois, $annee), 2);
			$compta[9]["cumul_prec"] = round( $comptabilite->get_cumul('63', '01', $mois, $annee_prec), 2);
			$compta[9]["rapport"]    = round( ( ($compta[9]["cumul"] / $compta[9]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[9]["rapport"] > 0)
				$compta[9]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[9]["rapport"] == 0)
					$compta[9]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[9]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			 
			$classe = $comptabilite->get_classe('64', $mois, $annee);
			$compta[10]["nom"]        = strtr($langfile["dico_management_comptabilite_classe64_cgs"], $trans);
			$compta[10]["courant"]    = round($classe["debit"] - $classe["credit"], 2);
			$compta[10]["cumul"]      = round( $comptabilite->get_cumul('64', '01', $mois, $annee), 2);
			$compta[10]["cumul_prec"] = round( $comptabilite->get_cumul('64', '01', $mois, $annee_prec), 2);
			$compta[10]["rapport"]    = round( ( ($compta[10]["cumul"] / $compta[10]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[10]["rapport"] > 0)
				$compta[10]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[10]["rapport"] == 0)
					$compta[10]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[10]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$classe = $comptabilite->get_classe('65', $mois, $annee);
			$compta[11]["nom"]        = strtr($langfile["dico_management_comptabilite_classe65"], $trans);
			$compta[11]["courant"]     = round($classe["debit"] - $classe["credit"], 2);
			$compta[11]["cumul"] = round( $comptabilite->get_cumul('65', '01', $mois, $annee), 2);
			$compta[11]["cumul_prec"] = round( $comptabilite->get_cumul('65', '01', $mois, $annee_prec), 2);
			$compta[11]["rapport"]  = round( ( ($compta[11]["cumul"] / $compta[11]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[11]["rapport"] > 0)
				$compta[11]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[11]["rapport"] == 0)
					$compta[11]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[11]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			 
			 
			$classe = $comptabilite->get_classe('66', $mois, $annee);
			$compta[12]["nom"]        = strtr($langfile["dico_management_comptabilite_classe66"], $trans);
			$compta[12]["courant"]    = round($classe["debit"] - $classe["credit"], 2);
			$compta[12]["cumul"]      = round( $comptabilite->get_cumul('66', '01', $mois, $annee), 2);
			$compta[12]["cumul_prec"] = round( $comptabilite->get_cumul('66', '01', $mois, $annee_prec), 2);
			$compta[12]["rapport"]    = round( ( ($compta[12]["cumul"] / $compta[12]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[12]["rapport"] > 0)
				$compta[12]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[12]["rapport"] == 0)
					$compta[12]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[12]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$classe = $comptabilite->get_classe('67', $mois, $annee);
			$compta[13]["nom"]        = strtr($langfile["dico_management_comptabilite_classe67"], $trans);
			$compta[13]["courant"]     = round($classe["debit"] - $classe["credit"], 2);
			$compta[13]["cumul"] = round( $comptabilite->get_cumul('67', '01', $mois, $annee), 2);
			$compta[13]["cumul_prec"] = round( $comptabilite->get_cumul('67', '01', $mois, $annee_prec), 2);
			$compta[13]["rapport"]  = round( ( ($compta[13]["cumul"] / $compta[13]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[13]["rapport"] > 0)
				$compta[13]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[13]["rapport"] == 0)
					$compta[13]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[13]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$classe = $comptabilite->get_classe('70', $mois, $annee);
			$compta[14]["nom"]        = strtr($langfile["dico_management_comptabilite_classe70_vad"], $trans);
			$compta[14]["courant"]    = round($classe["credit"] - $classe["debit"], 2);
			$compta[14]["cumul"]      = round( (-1) * $comptabilite->get_cumul('70', '01', $mois, $annee), 2);
			$compta[14]["cumul_prec"] = round( (-1) * $comptabilite->get_cumul('70', '01', $mois, $annee_prec), 2);
			$compta[14]["rapport"]    = round( ( ($compta[14]["cumul"] / $compta[14]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[14]["rapport"] < 0)
				$compta[14]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[14]["rapport"] == 0)
					$compta[14]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[14]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}

			$classe = $comptabilite->get_classe('72', $mois, $annee);
			$compta[15]["nom"]        = strtr($langfile["dico_management_comptabilite_classe72_vad"], $trans);
			$compta[15]["courant"]    = round($classe["credit"] - $classe["debit"], 2);
			$compta[15]["cumul"]      = round( (-1) * $comptabilite->get_cumul('72', '01', $mois, $annee), 2);
			$compta[15]["cumul_prec"] = round( (-1) * $comptabilite->get_cumul('72', '01', $mois, $annee_prec), 2);
			$compta[15]["rapport"]    = round( ( ($compta[15]["cumul"] / $compta[15]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[15]["rapport"] < 0)
				$compta[15]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[15]["rapport"] == 0)
					$compta[15]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[15]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}
			
			$classe = $comptabilite->get_classe('74', $mois, $annee);
			$compta[16]["nom"]        = strtr($langfile["dico_management_comptabilite_classe74_vad"], $trans);
			$compta[16]["courant"]    = round($classe["credit"] - $classe["debit"], 2);
			$compta[16]["cumul"]      = round( (-1) * $comptabilite->get_cumul('74', '01', $mois, $annee), 2);
			$compta[16]["cumul_prec"] = round( (-1) * $comptabilite->get_cumul('74', '01', $mois, $annee_prec), 2);
			$compta[16]["rapport"]    = round( ( ($compta[16]["cumul"] / $compta[16]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[16]["rapport"] < 0)
				$compta[16]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[16]["rapport"] == 0)
					$compta[16]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[16]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$classe = $comptabilite->get_classe('75', $mois, $annee);
			$compta[17]["nom"]        = strtr($langfile["dico_management_comptabilite_classe75"], $trans);
			$compta[17]["courant"]    = round($classe["credit"] - $classe["debit"], 2);
			$compta[17]["cumul"]      = round( (-1) * $comptabilite->get_cumul('75', '01', $mois, $annee), 2);
			$compta[17]["cumul_prec"] = round( (-1) * $comptabilite->get_cumul('75', '01', $mois, $annee_prec), 2);
			$compta[17]["rapport"]    = round( ( ($compta[17]["cumul"] / $compta[17]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[17]["rapport"] < 0)
				$compta[17]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[17]["rapport"] == 0)
					$compta[17]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[17]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$classe = $comptabilite->get_classe('76', $mois, $annee);
			$compta[18]["nom"]        = strtr($langfile["dico_management_comptabilite_classe76"], $trans);
			$compta[18]["courant"]    = round($classe["credit"] - $classe["debit"], 2);
			$compta[18]["cumul"]      = round( (-1) * $comptabilite->get_cumul('76', '01', $mois, $annee), 2);
			$compta[18]["cumul_prec"] = round( (-1) * $comptabilite->get_cumul('76', '01', $mois, $annee_prec), 2);
			$compta[18]["rapport"]    = round( ( ($compta[18]["cumul"] / $compta[18]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[18]["rapport"] < 0)
				$compta[18]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[18]["rapport"] == 0)
					$compta[18]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[18]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}						
			
			$compta[19]["nom"]        = strtr($langfile["dico_management_comptabilite_benefice_fr"], $trans);
			$compta[19]["courant"] = round( -1 * (
									 $compta[14]["courant"] + $compta[15]["courant"] + $compta[16]["courant"] + 
			                         $compta[17]["courant"]     + $classe[18]["courant"]     - 
			                        ($compta[6]["courant"] + $compta[7]["courant"] + 
			                         $compta[8]["courant"] + $compta[9]["courant"] + 
			                         $compta[10]["courant"] + $compta[11]["courant"]     + 
			                         $compta[12]["courant"]     + $compta[13]["courant"]) ), 2);
			$compta[19]["cumul"] = round( -1 * (
									 $compta[14]["cumul"] + $compta[15]["cumul"] + $compta[16]["cumul"] +  
			                         $compta[17]["cumul"]     + $classe[18]["cumul"]     - 
			                        ($compta[6]["cumul"] + $compta[7]["cumul"] + 
			                         $compta[8]["cumul"] + $compta[9]["cumul"] + 
			                         $compta[10]["cumul"] + $compta[11]["cumul"]     + 
			                         $compta[12]["cumul"]     + $compta[13]["cumul"]) ), 2);
			$compta[19]["cumul_prec"] = round( -1 * (
									 $compta[14]["cumul_prec"] + $compta[15]["cumul_prec"] + 
			                         $compta[16]["cumul_prec"] + $classe[17]["cumul_prec"] + $classe[18]["cumul_prec"]     - 
			                        ($compta[6]["cumul_prec"]  + $compta[7]["cumul_prec"] + 
			                         $compta[8]["cumul_prec"]  + $compta[9]["cumul_prec"] + 
			                         $compta[10]["cumul_prec"] + $compta[11]["cumul_prec"]     + 
			                         $compta[12]["cumul_prec"] + $compta[13]["cumul_prec"]) ), 2);
			$compta[19]["rapport"]  = round( ( ($compta[19]["cumul"] / $compta[19]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[19]["cumul_prec"] < 0)
				$compta[19]["rapport"] = $compta[19]["rapport"] * (-1);			                         			                         
			if($compta[19]["rapport"] > 0)
				$compta[19]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[19]["rapport"] == 0)
					$compta[19]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[19]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}						
				
			$compta[20]["nom"]        = strtr($langfile["dico_management_comptabilite_marge_brute"], $trans);
			$compta[20]["courant"]    = round( $compta[14]["courant"] - $compta[6]["courant"], 2);
			$compta[20]["cumul"]      = round( $compta[14]["cumul"] - $compta[6]["cumul"], 2);
			$compta[20]["cumul_prec"] = round( $compta[14]["cumul_prec"] - $compta[6]["cumul_prec"], 2);
			$compta[20]["rapport"]    = round( ( ($compta[20]["cumul"] / $compta[20]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[20]["rapport"] < 0)
				$compta[20]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[20]["rapport"] == 0)
					$compta[20]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[20]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$compta[21]["nom"]        = strtr($langfile["dico_management_comptabilite_vad"], $trans);
			$compta[21]["courant"]    = round( $compta[14]["courant"]    + $compta[15]["courant"]    + $compta[16]["courant"]    - $compta[6]["courant"], 2);
			$compta[21]["cumul"]      = round( $compta[14]["cumul"]      + $compta[15]["cumul"]      + $compta[16]["cumul"]      - $compta[6]["cumul"], 2);
			$compta[21]["cumul_prec"] = round( $compta[14]["cumul_prec"] + $compta[15]["cumul_prec"] + $compta[16]["cumul_prec"] - $compta[6]["cumul_prec"], 2);
			$compta[21]["rapport"]    = round( ( ($compta[21]["cumul"] / $compta[21]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[21]["rapport"] < 0)
				$compta[21]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[21]["rapport"] == 0)
					$compta[21]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[21]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$compta[22]["nom"]        = strtr($langfile["dico_management_comptabilite_cgs"], $trans);
			$compta[22]["courant"]    = round( $compta[7]["courant"]    + $compta[8]["courant"]    + $compta[9]["courant"]    + $compta[10]["courant"], 2);
			$compta[22]["cumul"]      = round( $compta[7]["cumul"]      + $compta[8]["cumul"]      + $compta[9]["cumul"]      + $compta[10]["cumul"], 2);
			$compta[22]["cumul_prec"] = round( $compta[7]["cumul_prec"] + $compta[8]["cumul_prec"] + $compta[9]["cumul_prec"] + $compta[10]["cumul_prec"], 2);
			$compta[22]["rapport"]    = round( ( ($compta[22]["cumul"] / $compta[22]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[22]["rapport"] > 0)
				$compta[22]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[22]["rapport"] == 0)
					$compta[22]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[22]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}
			
			$compta[23]["nom"]        = strtr($langfile["dico_management_comptabilite_tee"], $trans);
			$compta[23]["courant"]    = round( $compta[21]["courant"]/$compta[22]["courant"], 2);
			$compta[23]["cumul"]      = round( $compta[21]["cumul"]/$compta[22]["cumul"], 2);
			$compta[23]["cumul_prec"] = round( $compta[21]["cumul_prec"]/$compta[22]["cumul_prec"], 2);
			$compta[23]["rapport"]    = round( ( ($compta[23]["cumul"] / $compta[23]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[23]["rapport"] < 0)
				$compta[23]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[23]["rapport"] == 0)
					$compta[23]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[23]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$compta[24]["nom"]        = strtr($langfile["dico_management_comptabilite_fr"], $trans);
			$compta[24]["courant"]    = round( $compta[0]["courant"]    + $compta[1]["courant"], 2);
			$compta[24]["cumul"]      = round( $compta[0]["cumul"]      + $compta[1]["cumul"], 2);
			$compta[24]["cumul_prec"] = round( $compta[0]["cumul_prec"] + $compta[1]["cumul_prec"], 2);
			$compta[24]["rapport"]    = round( ( ($compta[24]["cumul"] / $compta[24]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[24]["rapport"] < 0)
				$compta[24]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[24]["rapport"] == 0)
					$compta[24]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[24]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}
			
			$compta[25]["nom"]        = strtr($langfile["dico_management_comptabilite_bfr"], $trans);
			$compta[25]["courant"]    = round( $compta[2]["courant"]    + $compta[3]["courant"], 2);
			$compta[25]["cumul"]      = round( $compta[2]["cumul"]      + $compta[3]["cumul"], 2);
			$compta[25]["cumul_prec"] = round( $compta[2]["cumul_prec"] + $compta[3]["cumul_prec"], 2);
			$compta[25]["rapport"]    = round( ( ($compta[25]["cumul"] / $compta[25]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[25]["cumul_prec"] < $compta[25]["cumul"])
				$compta[25]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[25]["cumul_prec"] > $compta[25]["cumul"])
					$compta[25]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
				else
					$compta[25]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
			}			
			
			$compta[26]["nom"]        = strtr($langfile["dico_management_comptabilite_tr"], $trans);
			$compta[26]["courant"]    = round( abs($compta[24]["courant"])    + abs($compta[25]["courant"]), 2);
			$compta[26]["cumul"]      = round( abs($compta[24]["cumul"])      + abs($compta[25]["cumul"]), 2);
			$compta[26]["cumul_prec"] = round( abs($compta[24]["cumul_prec"]) + abs($compta[25]["cumul_prec"]), 2);
			$compta[26]["rapport"]    = round( ( ($compta[26]["cumul"] / $compta[26]["cumul_prec"]) - 1 ) * 100, 2);
			//$compta["verif"] = $compta["classe70_vad"] + $compta["classe74_vad"] - $compta["classe60_vad"];
			if($compta[26]["rapport"] < 0)
				$compta[26]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[26]["rapport"] == 0)
					$compta[26]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[26]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}
			
			
			$compta[27]["nom"]        = strtr($langfile["dico_management_comptabilite_vadbfr"], $trans);
			$compta[27]["courant"]    = round( $compta[21]["courant"]/$compta[25]["courant"], 2);
			$compta[27]["cumul"]      = round( $compta[21]["cumul"]/$compta[25]["cumul"], 2);
			$compta[27]["cumul_prec"] = round( $compta[21]["cumul_prec"]/$compta[25]["cumul_prec"], 2);
			$compta[27]["rapport"]    = round( ( ($compta[27]["cumul"] / $compta[27]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[27]["rapport"] < 0)
				$compta[27]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[27]["rapport"] == 0)
					$compta[27]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[27]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$compta[28]["nom"]        = strtr($langfile["dico_management_comptabilite_tef"], $trans);
			$compta[28]["courant"]    = round( $compta[24]["courant"]/$compta[25]["courant"], 2);
			$compta[28]["cumul"]      = round( $compta[24]["cumul"]/$compta[25]["cumul"], 2);
			$compta[28]["cumul_prec"] = round( $compta[24]["cumul_prec"]/$compta[25]["cumul_prec"], 2);
			$compta[28]["rapport"]    = round( ( ($compta[28]["cumul"] / $compta[28]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[28]["rapport"] < 0)
				$compta[28]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[28]["rapport"] == 0)
					$compta[28]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[28]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}			
			
			$compta[29]["nom"]        = strtr($langfile["dico_management_comptabilite_cash"], $trans);
			$compta[29]["courant"]    = round( ((-1)*$compta[19]["courant"])    + $compta[9]["courant"], 2);
			$compta[29]["cumul"]      = round( ((-1)*$compta[19]["cumul"])      + $compta[9]["cumul"], 2);
			$compta[29]["cumul_prec"] = round( ((-1)*$compta[19]["cumul_prec"]) + $compta[9]["cumul_prec"], 2);
			$compta[29]["rapport"]    = round( ( ($compta[29]["cumul"] / $compta[29]["cumul_prec"]) - 1 ) * 100, 2);
			if($compta[29]["rapport"] < 0)
				$compta[29]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_red.png\" alt=\"\" />";
			else{
				if($compta[29]["rapport"] == 0)
					$compta[29]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_yellow.png\" alt=\"\" />";
				else
					$compta[29]["indicateur"]  = "<img src=\"./templates/standard/img/16x16/flag_green.png\" alt=\"\" />";
			}						
			//TO BE REPLACED END

			$pdf->AddPage();
			$pdf->Bookmark('Statut', 0, 0);
			$pdf->Cell(0, 0, 'Statut', 1, 1, 'C');
			
			
			// create some HTML content
			$htmltable = '<table border="1" cellspacing="2" cellpadding="2">
							<tr>
								<th bgcolor="#FEF0C9" align="center"><b>'.$comptaElement.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$comptaCourant.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$comptaCumule.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$comptaRapport.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$comptaIndicateur.'</b></th>
							</tr>';
			
			for($i=0; $i<=28; $i++) {
					$color = ($color == '#FEFFF1') ? '#FCF8DC' : '#FEFFF1';
					$htmltable .= '<tr>';
					if($i == 5 || ( $i >= 18 && $i <= 28)){
						$nom     = '<b>'.utf8_encode($compta[$i]['nom']).'</b>'; 
						$courant = '<b>'.utf8_encode($compta[$i]['courant']).'</b>';
						$cumul   = '<b>'.utf8_encode($compta[$i]['cumul']).'</b>';
						$rapport = '<b>'.utf8_encode($compta[$i]['rapport']).'</b>'; 
					}	
					else{
						$nom     = utf8_encode($compta[$i]['nom']); 
						$courant = utf8_encode($compta[$i]['courant']);
						$cumul   = utf8_encode($compta[$i]['cumul']);
						$rapport = utf8_encode($compta[$i]['rapport']);
					}	 
						$htmltable .= '<td bgcolor="'.$color.'" align="left">'.$nom.'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$courant.'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$cumul.'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$rapport.'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.utf8_encode($compta[$i]['indicateur']).'</td>';
					$htmltable .= '</tr>';
			}
			
			$htmltable .= "</table>";
			
			// output the HTML content
			$pdf->writeHTML($htmltable, true, 0, true, 0);
			
			// ---------------------------------------------------------
			
			//Close and output PDF document
			$pdf->Output('Statut_compta_'.$annee.'_'.$mois.'.pdf', 'I');
			
			break;

		case "automatic_flow":
			$title = $langfile["navigation_title_management_comptabilite_add"];
			$mode    = getArrayVal($_GET, "mode");
			$template->assign("title", $title);
			$template->assign("mode", $mode);
			
			$template->display("template_management_comptabilite_automatic_flow.tpl");
	    	
			break;
			
		case "modify_account":
			$title = $langfile["navigation_title_management_comptabilite_modify"];
		
			$template->assign("title", $title);
			
			$mois = date("m");
			$annee = date("Y");
			$compte_s = getArrayVal($_POST, "numero_compte");
			
			$compta = $comptabilite->get_account('100000', '01', '2009');
			
			if(!($compta = $comptabilite->get_account($compte_s, $mois_s, $annee_s))){
				$compta["numero"] = '100000';
				$compta["libelle"] = ' ';
				$compta["date"] = ' ';
				$compta["debit"] = ' ';
				$compta["credit"] = ' ';
			}
			
			$template->assign("mois",   $mois);
			$template->assign("annee",  $annee);
			$template->assign("compte", $compta);
			
			$template->display("template_management_comptabilite_modify_account.tpl");
	    	
			break;
			
		case "search_account":
			$title = $langfile["navigation_title_management_comptabilite_modify"];
		
			$template->assign("title", $title);
			
			$mois_s   = getArrayVal($_POST, "mois");
			$annee_s  = getArrayVal($_POST, "annee");
			$compte_s = getArrayVal($_POST, "numero_compte");
			
			if(!($compta = $comptabilite->get_account($compte_s, $mois_s, $annee_s))){
				$compta["numero"] = $compte_s;
				$compta["libelle"] = ' ';
				$compta["date"] = ' ';
				$compta["debit"] = ' ';
				$compta["credit"] = ' ';
				$message = $langfile["navigation_title_management_comptabilite_no_account"];
			}
			
			
			if($compta["numero"] == '')
				$compta["numero"] = $compte_s;
			
			
			$template->assign("mois",    $mois_s);
			$template->assign("annee",   $annee_s);
			$template->assign("compte",  $compta);
			$template->assign("message", $message);
			
			$template->display("template_management_comptabilite_modify_account.tpl");
	    	
			break;	
			
		case "modify_account_submit":
			$title = $langfile["navigation_title_management_comptabilite_modify"];
		
			$template->assign("title", $title);
			
			$mois_s    = getArrayVal($_POST, "mois_h");
			$annee_s   = getArrayVal($_POST, "annee_h");
			$compte_s  = getArrayVal($_POST, "numero_compte_h");
			$libelle_s = getArrayVal($_POST, "libelle");
			$debit_s   = getArrayVal($_POST, "debit");
			$credit_s  = getArrayVal($_POST, "credit");

			$compte = $comptabilite->get_account($compte_s, $mois_s, $annee_s);
			if($compte["numero"] == ''){
				$date = $annee_s.'-'.$mois_s.'-01';
				$sql  = "INSERT INTO comptes (`numero`, `mois`, `annee`, `libelle`, `date`, `debit`, `credit`) VALUES ('$compte_s', '$mois_s', '$annee_s', '$libelle_s', '$date', '$debit_s', '$credit_s')";
				
				$ins  = mysql_query($sql);
			}
			$comptabilite->update($compte_s, $mois_s, $annee_s, $libelle_s, $debit_s, $credit_s);
			$compte = $comptabilite->get_account($compte_s, $mois_s, $annee_s);
			
			$modifie = 1;
			$message = $langfile["dico_comptabilite_saved"];
			
			
			$template->assign("mois", $mois_s);
			$template->assign("annee", $annee_s);
			$template->assign("compte", $compte);
			$template->assign("modifie", $modifie);
			$template->assign("message", $message);
			
			$template->display("template_management_comptabilite_modify_account.tpl");
	    	
			break;		

		case "automatic_flow_submit":

			$fname = $_FILES['filetoupload']['name'];
			$tmp_name = $_FILES['filetoupload']['tmp_name'];
			$error = $_FILES['filetoupload']['error'];
			
			$methode = getArrayVal($_POST, "methode");
			
			$mois_c  = getArrayVal($_POST, "mois");
			$annee_c = getArrayVal($_POST, "annee");
			
			$sql  = "DELETE FROM comptes WHERE mois = '$mois_c' AND annee = '$annee_c'";
			$del  = mysql_query($sql);
			
	        if($error == 0){
	        	
	        	$datei_final = CL_ROOT . "/files/" . CL_CONFIG . "/command/" . $fname;
	        	
	        	if (move_uploaded_file($tmp_name, $datei_final));
	        	else print 'Erreur lors de l\'ouverture du fichier...';
			        
        		$handle = fopen($datei_final, 'r');

        		switch($methode){ 
        			case "ernstandyoung":
		        		while (!feof($handle)){ 
		        			$data = fgetcsv($handle, 1024, ';');
		        			
		        			$date = $data[2];
		        			if( $date[1] == ' ' ){
		        				$jour   = '0'.$date[0];
		        				$mois_l = substr($date, 2, 3);
		        				$annee  = '20'.substr($date, 6, 2);
		        			}else{
		        				$jour   = substr($date, 0, 2);
		        				$mois_l = substr($date, 3, 3);
		        				$annee  = '20'.substr($date, 7, 2);
		        			}
		        			switch($mois_l){
		        				case 'JAN':
		        				$mois = '01';
		        				break;
		        				
		        				case 'FEB':
		        				$mois = '02';
		        				break;
		        				
		        				case 'MAR':
		        				$mois = '03';
		        				break;
		        				
		        				case 'APR':
		        				$mois = '04';
		        				break;
		        				
		        				case 'MAY':
		        				$mois = '05';
		        				break;
		        				
		        				case 'JUN':
		        				$mois = '06';
		        				break;
		        				
		        				case 'JUL':
		        				$mois = '07';
		        				break;
		        				
		        				case 'AUG':
		        				$mois = '08';
		        				break;
		        				
		        				case 'SEP':
		        				$mois = '09';
		        				break;
		        				
		        				case 'OCT':
		        				$mois = '10';
		        				break;
		        				
		        				case 'NOV':
		        				$mois = '11';
		        				break;
		        				
		        				case 'DEC':
		        				$mois = '12';
		        				break;
		        			}	
		        				
				        	$date   = $annee.'-'.$mois.'-'.$jour;
				        	$debit  = Str_replace ( ',', '.', $data[3]);
				        	$credit = Str_replace ( ',', '.', $data[4]);
					       	$sql  = "INSERT INTO comptes (`numero`, `mois`, `annee`, `libelle`, `date`, `debit`, `credit`) VALUES ('$data[0]', '$mois_c', '$annee_c','$data[1]', '$date', '$debit', '$credit')";
					        $ins  = mysql_query($sql);
					    
		        		}
		        		break;

        			case "autre":
        				$header_line = 14;
        				$cursor      = 0;
        				
						
		        		while (!feof($handle)){ 
		        			
			        			$data = fgetcsv($handle, 3072, ";");
			        
			    				for($i=0; $i<count($data); $i++){ 
			    					
			    					//fwrite($Handle,  is_numeric(substr($data[$i],0, 6)));
  
			    					if((is_numeric(substr($data[$i], 0, 6))) && (substr($data[$i], 7, 1) == '-')){
							        	
			    						$libelle = substr($data[$i], 9, $data[$i].length);
					        			$date   = $annee_c.'-'.$mois_c.'-01';
							        	$numero  = substr($data[$i], 0, 6);
							        	$debit  = Str_replace ( ';', '.', Str_replace ( '.', '', Str_replace ( ',', ';', $data[$i+1])));
							        	$credit = Str_replace ( ';', '.', Str_replace ( '.', '', Str_replace ( ',', ';', $data[$i+2])));
							        	if($debit == '') 	$debit  = 0;
							        	if($credit == '') 	$credit = 0;
			    						if($mois_c != '01'){
							        		$prev_mois = $comptabilite->get_previous_month($mois_c);
			    							if($numero[0] != '6' && $numero[0] != '7')
			    								$compta = $comptabilite->get_cumul_total($numero, '01', $prev_mois, $annee_c);
			    							else{
			    								$compta["debit"]  = 0;
			    								$compta["credit"] = 0;
			    							}
			    								
											$debit  = $debit - $compta["debit"];
											$credit = $credit - $compta["credit"];
										}
								       	$sql  = "INSERT INTO comptes (`numero`, `mois`, `annee`, `libelle`, `date`, `debit`, `credit`) VALUES ('$numero', '$mois_c', '$annee_c','$libelle', '$date', '$debit', '$credit')";
								        $ins  = mysql_query($sql);
								        

										while(!$comptabilite->get_account($numero, $prev_mois, $annee_c) && $prev_mois != ''){
											
											$date   = $annee_c.'-'.$prev_mois.'-01';
											$sql  = "INSERT INTO comptes (`numero`, `mois`, `annee`, `libelle`, `date`, `debit`, `credit`) VALUES ('$numero', '$prev_mois', '$annee_c','$libelle', '$date', '0', '0')";
									        $ins  = mysql_query($sql);
									        $prev_mois = $comptabilite->get_previous_month($prev_mois);
										}
			    					}    
			    				}    
		        			
					    
		        		} 
						
		        		break;
        		}
        		fclose($handle);

				$mylog->add('product','flow',"add command");
				
				$saved = 1;
				$loc = $url . "management_comptabilite.php?action=automatic_flow&mode=".$saved;
	            header("Location: $loc");
	        
       		}
			break;

		case "ajax_detail":
			//$classe_id = getArrayVal($_POST, "classe_id"); echo $classe_id;
			$classe_id = getArrayVal($_REQUEST, "classe_id");
			$result = $comptabilite->getcomment($classe_id);
			break;			
			
		case "savecomment":
			$classe_id   = utf8_decode(trim(getArrayVal($_REQUEST, "classe")));
			$nom         = utf8_decode(trim(getArrayVal($_REQUEST, "nom")));
			$faits       = utf8_decode(trim(getArrayVal($_REQUEST, "faits")));
			$conclusions = utf8_decode(trim(getArrayVal($_REQUEST, "conclusions")));
			$actions     = utf8_decode(trim(getArrayVal($_REQUEST, "actions")));
			
			$result = $comptabilite->savecomment($classe_id, $nom, $faits, $conclusions, $actions);
			break;	
			
		case "display_graphe":
			$title = $langfile["navigation_title_management_comptabilite_graphe"];
			$graphe[0]["ID"]          = 'serie1';
			$graphe[0]["description"] = $langfile["dico_management_comptabilite_fr"].' - '.$langfile["dico_management_comptabilite_bfr"];
			$graphe[1]["ID"]          = 'serie2';
			$graphe[1]["description"] = $langfile["dico_management_comptabilite_cgs"];
			$graphe[2]["ID"]          = 'serie3';
			$graphe[2]["description"] = $langfile["dico_management_comptabilite_vad"];
			$graphe[3]["ID"]          = 'serie4';
			$graphe[3]["description"] = $langfile["dico_management_comptabilite_benefice_marge_brute"];
			$graphe[4]["ID"]          = 'serie5';
			$graphe[4]["description"] = $langfile["dico_management_comptabilite_benefice_vad_delta"];
			$graphe[5]["ID"]          = 'serie6';
			$graphe[5]["description"] = $langfile["dico_management_comptabilite_point_mort"];
			
			$template->assign("graphe", $graphe);
			$template->assign("title", $title);

			$mois_de  = getArrayVal($_POST, "mois_de");
			$mois_a   = getArrayVal($_POST, "mois_a");
			$annee_de = getArrayVal($_POST, "annee_de");
			$annee_a  = getArrayVal($_POST, "annee_a"); 
			
			if($mois_de == '')
				$mois_de = '01';
			if($mois_a == '')
				$mois_a = '12';
			if($annee_de == '')
				//$annee_de = '2009';
				$annee_de = date("Y");
			if($annee_a == '')
				$annee_a = date("Y");
			
			$template->assign("annee_de", $annee_de);
			$template->assign("annee_a",  $annee_a);
			$template->assign("mois_a",   $mois_a);
			$template->assign("mois_de",  $mois_de);
			
					//try to valuate state of break event point
					$ca_prec = -1;
			 		$cd_prec = -1;
			 		/*
			 		for($i=0;$i<12;$i++){
			 			$point_mort[$i]["state"] = "green";
			 			$datecourante = $annee_de.'-'.$i.'-01';
			 			$point_mort[$i]["date"] = $datecourante;
			 		}	
			 		*/
			 		$annee = -12;
					while($annee_de <= $annee_a){
						$annee += 12;
						if($annee_de == $annee_a)
							$mois_end = $mois_a;
						else
							$mois_end = 12;					
					 	for($i=0; $i<$mois_end; $i++){
							$j = $i+1;
					 		if($j < 10)
								$curseur = '0'.$j;
							else
								$curseur = $j;
	
							$ca_current  = (-1) * $comptabilite->get_cumul('7', '01', $curseur, $annee_de); 
						    $cd_current  = $comptabilite->get_cumul('6', '01', $curseur, $annee_de);	
								
						    $point_mort[$annee+$i]["ca"] = $ca_current;
						    $point_mort[$annee+$i]["cd"] = $cd_current;
						    $point_mort[$annee+$i]["diff"] = $ca_current - $cd_current;
						    
							if($ca_current > $cd_current){
								$point_mort[$annee+$i]["state"] = "green";
							}
							if($cd_current > $ca_current){
								$point_mort[$annee+$i]["state"] = "red";
							}
							if($ca_prec > 0){
								if($ca_prec < $cd_prec && $ca_current > $cd_current){
									$point_mort[$annee+$i]["state"] = "yellow";
								}
							}
							$datecourante = '01'.'-'.$curseur.'-'.$annee_de;
							$point_mort[$annee+$i]["date"] = $datecourante;	
							$ca_prec = $ca_current;
							$cd_prec = $cd_current;
					 	}
							
						$annee_de = $annee_de + 1;
					}	
					$template->assign("pointmort", $point_mort);			
			
			$template->display("template_management_comptabilite_graphe_comptagene.tpl");
	    	
			break;	
			
		case "display_graphe_data":
			
			$id = getArrayVal($_GET, "id");
			
			$mois_de  = getArrayVal($_GET, "mois_de");
			$mois_a   = getArrayVal($_GET, "mois_a");
			$annee_de = getArrayVal($_GET, "annee_de");
			$annee_a  = getArrayVal($_GET, "annee_a"); 
			
			if($mois_de == '')
				$mois_de = '01';
			if($mois_a == '')
				$mois_a = '12';
			if($annee_de == '')
				$annee_de = date("Y");
			if($annee_a == '')
				$annee_a = date("Y");	
			
			
			switch ($id) {
				case'serie1':

					while($annee_de <= $annee_a){
						if($annee_de == $annee_a)
							$mois_end = $mois_a;
						else
							$mois_end = 12;
								 
						for($i='01'; $i<=$mois_end; $i++){
							if($i < 10 && $i != '01')
								$curseur = '0'.$i;
							else
								$curseur = $i;
							
							$datecourante = $annee_de.'-'.$curseur.'-01';
							$param1 = $comptabilite->get_cumul('1', '01', $curseur, $annee_de);
							$param2 = $comptabilite->get_cumul('2', '01', $curseur, $annee_de);
							$param3 = $comptabilite->get_cumul('3', '01', $curseur, $annee_de);
							$param4 = $comptabilite->get_cumul('4', '01', $curseur, $annee_de);
							$param5 = $comptabilite->get_cumul('5', '01', $curseur, $annee_de); 
							echo "$datecourante,$param1,$param2,$param3,$param4,$param5\n";
						}
						$annee_de = $annee_de + 1;	
					}
	    	
		 			break;
		 			
				case'serie2':
					while($annee_de <= $annee_a){
						if($annee_de == $annee_a)
							$mois_end = $mois_a;
						else
							$mois_end = 12;
					
					 	for($i='01'; $i<=$mois_end; $i++){
							if($i < 10 && $i != '01')
								$curseur = '0'.$i;
							else
								$curseur = $i;
							
							$datecourante = $annee_de.'-'.$curseur.'-01';
							$param1 = $comptabilite->get_cumul('61', '01', $curseur, $annee_de); 
							$param2 = $comptabilite->get_cumul('62', '01', $curseur, $annee_de); 
					 		$param3 = $comptabilite->get_cumul('63', '01', $curseur, $annee_de); 
					  		$param4 = $comptabilite->get_cumul('64', '01', $curseur, $annee_de);
							echo "$datecourante,$param1,$param2,$param3,$param4\n";
							
						}
						$annee_de = $annee_de + 1;
					}	
		    	
		 			break;
		 			
				case'serie3':
					while($annee_de <= $annee_a){
						if($annee_de == $annee_a)
							$mois_end = $mois_a;
						else
							$mois_end = 12;					
					 	for($i='01'; $i<=$mois_end; $i++){
							if($i < 10 && $i != '01')
								$curseur = '0'.$i;
							else
								$curseur = $i;
							
							$datecourante = $annee_de.'-'.$curseur.'-01';                         
							//$param1 = -1 * $comptabilite->get_cumul('60', '01', $curseur, $annee_de);
							$param1 = $comptabilite->get_cumul('60', '01', $curseur, $annee_de); 
						    $param2 = -1 * $comptabilite->get_cumul('70', '01', $curseur, $annee_de);
						    $param3 = -1 * $comptabilite->get_cumul('72', '01', $curseur, $annee_de); 
					  	  	$param4 = -1 * $comptabilite->get_cumul('74', '01', $curseur, $annee_de);
							echo "$datecourante,$param1,$param2,$param3,$param4\n";
						}
						$annee_de = $annee_de + 1;
					}	
		    	
		 			break;
		 					 			
		 			
		 		case'serie4':
					while($annee_de <= $annee_a){
						if($annee_de == $annee_a)
							$mois_end = $mois_a;
						else
							$mois_end = 12;		 			
					 	for($i='01'; $i<=$mois_end; $i++){
							if($i < 10 && $i != '01')
								$curseur = '0'.$i;
							else
								$curseur = $i;
							
							$datecourante = $annee_de.'-'.$curseur.'-01';
							$beneficefr_cumule = -1 * ($comptabilite->get_cumul('70', '01', $curseur, $annee_de) +
													   $comptabilite->get_cumul('72', '01', $curseur, $annee_de) + 
											 		   $comptabilite->get_cumul('74', '01', $curseur, $annee_de) +
											 		   $comptabilite->get_cumul('75', '01', $curseur, $annee_de) + 
											 		   $comptabilite->get_cumul('76', '01', $curseur, $annee_de) - 
				                    	    		  ($comptabilite->get_cumul('60', '01', $curseur, $annee_de) + 
				                        	 		   $comptabilite->get_cumul('61', '01', $curseur, $annee_de) + 
				                    		 		   $comptabilite->get_cumul('62', '01', $curseur, $annee_de) + 
				                       	  	 		   $comptabilite->get_cumul('63', '01', $curseur, $annee_de) + 
				                       	     		   $comptabilite->get_cumul('64', '01', $curseur, $annee_de) + 
				                       	     		   $comptabilite->get_cumul('65', '01', $curseur, $annee_de) + 
				                             		   $comptabilite->get_cumul('66', '01', $curseur, $annee_de) + 
				                            		   $comptabilite->get_cumul('67', '01', $curseur, $annee_de)) );
							$marge_brute = -1 * ($comptabilite->get_cumul('70', '01', $curseur, $annee_de)) - 
				    				            $comptabilite->get_cumul('60', '01', $curseur, $annee_de);                         
							 
					  	  	$param1 = $comptabilite->get_benefice_cumule('1', '5', '01', $curseur, $annee_de); 
					  	  	$param2 = $beneficefr_cumule;
					  	  	$param3 = $marge_brute;
							echo "$datecourante,$param1,$param2,$param3\n";
						}
						$annee_de = $annee_de + 1;
					}	
		    	
		 			break;				 					 			
		 		
				case'serie5':
					while($annee_de <= $annee_a){
						if($annee_de == $annee_a)
							$mois_end = $mois_a;
						else
							$mois_end = 12;					
					 	for($i='01'; $i<=$mois_end; $i++){
							if($i < 10 && $i != '01')
								$curseur = '0'.$i;
							else
								$curseur = $i;
							
							$datecourante = $annee_de.'-'.$curseur.'-01';                         
							$param1 = $comptabilite->get_cumul('60', '01', $curseur, $annee_de); 
						    $param2 = (-1) * ($comptabilite->get_cumul('70', '01', $curseur, $annee_de) + $comptabilite->get_cumul('72', '01', $curseur, $annee_de) + $comptabilite->get_cumul('74', '01', $curseur, $annee_de)); 
					  	  	$param3 = $param2 - $param1;
							echo "$datecourante,$param1,$param2,$param3\n";
						}
						$annee_de = $annee_de + 1;
					}	
		    	
			 		break;

			 	case'serie6':
			 		$ca_prec = -1;
			 		$cd_prec = -1;
			 		
					while($annee_de <= $annee_a){
						if($annee_de == $annee_a)
							$mois_end = $mois_a;
						else
							$mois_end = 12;					
					 	for($i='01'; $i<=$mois_end; $i++){
							if($i < 10 && $i != '01')
								$curseur = '0'.$i;
							else
								$curseur = $i;
							
							$datecourante = $annee_de.'-'.$curseur.'-01';                         
							$ca_current  = (-1) * $comptabilite->get_cumul('7', '01', $curseur, $annee_de);
							$ca_previous = (-1) * $comptabilite->get_cumul('7', '01', $curseur, $annee_de-1); 
						    $cd_current  = $comptabilite->get_cumul('6', '01', $curseur, $annee_de);
							$cd_previous = $comptabilite->get_cumul('6', '01', $curseur, $annee_de-1);
							echo "$datecourante,$ca_current,$cd_current\n";
							
							if($ca_current > $cd_current){
								$point_mort[$curseur]["state"] = "green";
							}
							if($cd_current > $ca_current){
								$point_mort[$curseur]["state"] = "red";
							}
							if($ca_prec > 0){
								if($ca_prec < $cd_prec && $ca_current > $cd_current){
									$point_mort[$curseur]["state"] = "yellow";
								}
							}	
							$ca_prec = $ca_current;
							$cd_prec = $cd_current;
					 	}
							
						$annee_de = $annee_de + 1;
					}	
					//$template->assign("point_mort", $point_mort);
		    	
			 		break;
			 				 			
		 		default:
		 			echo "2010-01-01,13,12,34,24\n";
				 	echo "2010-02-01,15,10,30,21\n";
				 	echo "2010-03-01,17,15,35,27\n";
				 	echo "2010-04-01,19,18,39,24\n";
	    	
		 			break;	
		 	}
			break;		
			
		case "display_histo":
			$title = $langfile["navigation_title_management_comptabilite_histo"];
			include ('./include/oc_gdhistogramme.php');
			//include ('./include/artichow/LinePlot.class.php');
			
			$mois_de  = getArrayVal($_POST, "mois_de");
			$mois_a   = getArrayVal($_POST, "mois_a");
			$annee_de = getArrayVal($_POST, "annee_de");
			$annee_a  = getArrayVal($_POST, "annee_a"); 
			
			if($mois_de == '')
				$mois_de = '01';
			if($mois_a == '')
				$mois_a = '12';
			if($annee_de == '')
				//$annee_de = '2009';
				$annee_de = date("Y");
			if($annee_a == '')
				$annee_a = date("Y");
			
			$template->assign("annee_de", $annee_de);
			$template->assign("annee_a",  $annee_a);
			$template->assign("mois_a",   $mois_a);
			$template->assign("mois_de",  $mois_de);			
			
/*************************
*  HISTOGRAMME classe 1->5
**************************/

			$maitre = new TGDHistogramme();
			
			$maitre->hauteur_pixels = 300;
			$maitre->epaisseur = 30;
			$maitre->espace = 10;
			$maitre->h_decalage = 10;
			$maitre->v_decalage = 14;
			$maitre->top = 10;
			$maitre->left = 10;
			
			for($i=$mois_de; $i<=$mois_a; $i++){
				$h[$i] = new TGDListeCouleur;
				if($i < 10)
					$curseur = '0'.$i;
				else
					$curseur = $i;
						
				$h[$i]->init(255,255,0,
				"s�rie 1",
				array($comptabilite->get_cumul('1', '01', $curseur, $annee_de), 
					  $comptabilite->get_cumul('2', '01', $curseur, $annee_de), 
				 	  $comptabilite->get_cumul('3', '01', $curseur, $annee_de), 
				  	  $comptabilite->get_cumul('4', '01', $curseur, $annee_de), 
				  	  $comptabilite->get_cumul('5', '01', $curseur, $annee_de),
			      	  $comptabilite->get_benefice_cumule('1', '5', '01', $curseur, $annee_de)));
			}
			
			for($i=$mois_de; $i<=$mois_a; $i++)
				$maitre->add($h[$i]);
			
			
			
			$h1 = new TGDListeCouleur;
			$h1->init(255,255,255,
			"s�rie 1",
			array("classe1", "classe2", "classe3", "classe4", "classe5",
			      "Benefice (+)"));
			$maitre->add($h1); 
			
			$maitre->h3=2; // 3D
			$maitre->v3=5; // 3D
			
			$adresse = "./templates/standard/images/graphe/";
			if(ImagePng($maitre->run(true), $adresse . "comptagene_ben.png")) 
				$graphe['adresse_ben'] = $adresse . "comptagene_ben.png";
			else	
				$graphe['adresse_ben'] = $adresse . "error.png";

/*************************
*  HISTOGRAMME classe 6
**************************/			
			
			$maitre = new TGDHistogramme();
			
			$maitre->hauteur_pixels = 300;
			$maitre->epaisseur = 30;
			$maitre->espace = 10;
			$maitre->h_decalage = 10;
			$maitre->v_decalage = 14;
			$maitre->top = 10;
			$maitre->left = 10;
			
			for($i=$mois_de; $i<=$mois_a; $i++){
				$h[$i] = new TGDListeCouleur;
				if($i < 10)
					$curseur = '0'.$i;
				else
					$curseur = $i;
						
				$h[$i]->init(255,255,0,
				"s�rie 2",
				array($comptabilite->get_cumul('60', '01', $curseur, $annee_de), 
					  $comptabilite->get_cumul('61', '01', $curseur, $annee_de), 
				 	  $comptabilite->get_cumul('62', '01', $curseur, $annee_de), 
				  	  $comptabilite->get_cumul('63', '01', $curseur, $annee_de), 
				  	  $comptabilite->get_cumul('64', '01', $curseur, $annee_de),
				  	  $comptabilite->get_cumul('66', '01', $curseur, $annee_de),
				  	  $comptabilite->get_cumul('67', '01', $curseur, $annee_de)));
			}
			
			for($i=$mois_de; $i<=$mois_a; $i++)
				$maitre->add($h[$i]);
			
			$h2 = new TGDListeCouleur;
			$h2->init(255,255,255,
			"s�rie 2",
			array("classe60", "classe61", "classe62", "classe63", "classe64",
			      "classe66", "classe67"));
			$maitre->add($h2); 
			
			$maitre->h3=2; // 3D
			$maitre->v3=5; // 3D
			
			$adresse = "./templates/standard/images/graphe/";
			if(ImagePng($maitre->run(true), $adresse . "comptagene_60.png")) 
				$graphe['adresse_classe60'] = $adresse . "comptagene_60.png";
			else	
				$graphe['adresse_classe60'] = $adresse . "error.png";
				
/*************************
*  HISTOGRAMME classe 7
**************************/			
			
			$maitre = new TGDHistogramme();
			
			$maitre->hauteur_pixels = 300;
			$maitre->epaisseur = 30;
			$maitre->espace = 10;
			$maitre->h_decalage = 10;
			$maitre->v_decalage = 14;
			$maitre->top = 10;
			$maitre->left = 10;
			
			for($i=$mois_de; $i<=$mois_a; $i++){
				$h[$i] = new TGDListeCouleur;
				if($i < 10)
					$curseur = '0'.$i;
				else
					$curseur = $i;
				$beneficefr_cumule = -1 * (
										 $comptabilite->get_cumul('70', '01', $curseur, $annee_de) +
										 $comptabilite->get_cumul('72', '01', $curseur, $annee_de) + 
										 $comptabilite->get_cumul('74', '01', $curseur, $annee_de) +
										 $comptabilite->get_cumul('75', '01', $curseur, $annee_de) + 
										 $comptabilite->get_cumul('76', '01', $curseur, $annee_de)) - 
			                    	    ($comptabilite->get_cumul('60', '01', $curseur, $annee_de) + 
			                        	 $comptabilite->get_cumul('61', '01', $curseur, $annee_de) + 
			                    		 $comptabilite->get_cumul('62', '01', $curseur, $annee_de) + 
			                       	  	 $comptabilite->get_cumul('63', '01', $curseur, $annee_de) + 
			                       	     $comptabilite->get_cumul('64', '01', $curseur, $annee_de) + 
			                       	     $comptabilite->get_cumul('65', '01', $curseur, $annee_de) + 
			                             $comptabilite->get_cumul('66', '01', $curseur, $annee_de) + 
			                            $comptabilite->get_cumul('67', '01', $curseur, $annee_de)) ;
				$marge_brute = -1 * ( $comptabilite->get_cumul('70', '01', $curseur, $annee_de) + $comptabilite->get_cumul('72', '01', $curseur, $annee_de) ) - 
			    		            $comptabilite->get_cumul('60', '01', $curseur, $annee_de);                         
				$h[$i]->init(255,255,0,
				"s�rie 3",
				array(-1 * $comptabilite->get_cumul('70', '01', $curseur, $annee_de),
					  -1 * $comptabilite->get_cumul('72', '01', $curseur, $annee_de), 
					  -1 * $comptabilite->get_cumul('74', '01', $curseur, $annee_de), 
				  	  -1 * $comptabilite->get_cumul('75', '01', $curseur, $annee_de), 
				  	  -1 * $comptabilite->get_cumul('76', '01', $curseur, $annee_de), 
				  	  $beneficefr_cumule,
				  	  $marge_brute));
			}
			
			for($i=$mois_de; $i<=$mois_a; $i++)
				$maitre->add($h[$i]);
			
			
			$h3 = new TGDListeCouleur;
			$h3->init(255,255,255,
			"s�rie 3",
			array("classe70", "classe72", "classe74", "classe75", "classe76", "Benefice FR", "Marge brute"));
			$maitre->add($h3); 
			
			$maitre->h3=2; // 3D
			$maitre->v3=5; // 3D
			
			$adresse = "./templates/standard/images/graphe/";
			if(ImagePng($maitre->run(true), $adresse . "comptagene_7.png")) 
				$graphe['adresse_classe7'] = $adresse . "comptagene_7.png";
			else	
				$graphe['adresse_classe7'] = $adresse . "error.png";
			
			
			/*
			
			$Graph = new Image_Graph(800, 600);
			$Plotarea =& $Graph->add(new Plotarea());
			$Plot =& $Plotarea->addPlot(new Image_Graph_Plot_Line(
					 new Image_Graph_Dataset_Random(10, 20, 100))
					);
			$Graph->done();
			
			*/
			
			/*
			
			$graph = new Graph(400, 400);
   			
   			$values = array($comptabilite->get_cumul('60', '01', '01', '2009'), 
				  			$comptabilite->get_cumul('61', '01', '01', '2009'), 
				  			$comptabilite->get_cumul('62', '01', '01', '2009'), 
				  			$comptabilite->get_cumul('63', '01', '01', '2009'), 
				  			$comptabilite->get_cumul('64', '01', '01', '2009'),
			      			$comptabilite->get_cumul('65', '01', '01', '2009'), 
			      			$comptabilite->get_cumul('67', '01', '01', '2009'));
   			$plot = new LinePlot($values);
   			$graph->add($plot);
   			$adresse = "./templates/standard/images/files/graphe/comptagene_graphe.png";
   			$graphe['adresse'] = $adresse;
   			
   			$graph->draw($adresse);
   			*/
			
				
			$template->assign("title", $title);
			$template->assign("graphe", $graphe);
			$template->display("template_management_comptabilite_histogramme_comptagene.tpl");
	    	
			break;
		
		default:
			$mois  = getArrayVal($_POST, "mois");
			$annee = getArrayVal($_POST, "annee");
			
			if($mois == "")
				$mois  = date("m");
			if($annee == "")
				$annee = date("Y");	
			
			$compta["mois"] = $mois;
			$compta["annee"] = $annee;
				
			$annee_prec = $annee - 1;	
			
			$title = $langfile["navigation_title_management_comptabilite_display_state"];
			
			$classe = $comptabilite->get_classe('1', $mois, $annee);
			$compta["classe1"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe1_cumul"]  = round( $comptabilite->get_cumul('1', '01', $mois, $annee), 2);
			$compta["classe1_cumul_prec"]  = round( $comptabilite->get_cumul('1', '01', $mois, $annee_prec), 2);
			$compta["classe1_cumul_rapp"]  = round( ( ($compta["classe1_cumul"] / $compta["classe1_cumul_prec"]) - 1 ) * 100, 2); 
			if($compta["classe1_cumul_rapp"] < 0)
				$compta["classe1_cumul_indicateur"] = -1;
			else{
				if($compta["classe1_cumul_rapp"] > 0)
					$compta["classe1_cumul_indicateur"] = 1;
				else	
				 	$compta["classe1_cumul_indicateur"] = 0;
			}	 	
			
			$classe = $comptabilite->get_classe('2', $mois, $annee);
			$compta["classe2"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe2_cumul"] = round( $comptabilite->get_cumul('2', '01', $mois, $annee), 2);
			$compta["classe2_cumul_prec"] = round( $comptabilite->get_cumul('2', '01', $mois, $annee_prec), 2);
			$compta["classe2_cumul_rapp"]  = round( ( ($compta["classe2_cumul"] / $compta["classe2_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe2_cumul_rapp"] < 0)
				$compta["classe2_cumul_indicateur"] = -1;
			else{
				if($compta["classe2_cumul_rapp"] > 0)
					$compta["classe2_cumul_indicateur"] = 1;
				else	
				 	$compta["classe2_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('3', $mois, $annee);
			$compta["classe3"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe3_cumul"] = round( $comptabilite->get_cumul('3', '01', $mois, $annee), 2);
			$compta["classe3_cumul_prec"] = round( $comptabilite->get_cumul('3', '01', $mois, $annee_prec), 2);
			$compta["classe3_cumul_rapp"]  = round( ( ($compta["classe3_cumul"] / $compta["classe3_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe3_cumul_rapp"] < 0)
				$compta["classe3_cumul_indicateur"] = -1;
			else{
				if($compta["classe3_cumul_rapp"] > 0)
					$compta["classe3_cumul_indicateur"] = 1;
				else	
				 	$compta["classe3_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('4', $mois, $annee);
			$compta["classe4"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe4_cumul"] = round( $comptabilite->get_cumul('4', '01', $mois, $annee), 2);
			$compta["classe4_cumul_prec"] = round( $comptabilite->get_cumul('4', '01', $mois, $annee_prec), 2);
			$compta["classe4_cumul_rapp"]  = round( ( ($compta["classe4_cumul"] / $compta["classe4_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe4_cumul_rapp"] < 0)
				$compta["classe4_cumul_indicateur"] = -1;
			else{
				if($compta["classe4_cumul_rapp"] > 0)
					$compta["classe4_cumul_indicateur"] = 1;
				else	
				 	$compta["classe4_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('5', $mois, $annee);
			$compta["classe5"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe5_cumul"] = round( $comptabilite->get_cumul('5', '01', $mois, $annee), 2);
			$compta["classe5_cumul_prec"] = round( $comptabilite->get_cumul('5', '01', $mois, $annee_prec), 2);
			$compta["classe5_cumul_rapp"]  = round( ( ($compta["classe5_cumul"] / $compta["classe5_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe5_cumul_rapp"] < 0)
				$compta["classe5_cumul_indicateur"] = -1;
			else{
				if($compta["classe5_cumul_rapp"] > 0)
					$compta["classe5_cumul_indicateur"] = 1;
				else	
				 	$compta["classe5_cumul_indicateur"] = 0;
			}			
			
			$compta["benefice"] = 		round( $compta["classe1"] + $compta["classe2"] + 
			                            $compta["classe3"] + $compta["classe4"] + 
			                            $compta["classe5"], 2);
			$compta["benefice_cumul"] = round( $compta["classe1_cumul"] + $compta["classe2_cumul"] + 
			                            $compta["classe3_cumul"] + $compta["classe4_cumul"] + 
			                            $compta["classe5_cumul"], 2);
			$compta["benefice_cumul_prec"] = round( $compta["classe1_cumul_prec"] + $compta["classe2_cumul_prec"] + 
			                                 $compta["classe3_cumul_prec"] + $compta["classe4_cumul_prec"] + 
			                                 $compta["classe5_cumul_prec"], 2);
			$compta["benefice_cumul_rapp"]  = round( ( ($compta["benefice_cumul"] / $compta["benefice_cumul_prec"]) - 1 ) * 100, 2);                                                               
			if($compta["benefice_cumul_rapp"] < 0)
				$compta["benefice_cumul_indicateur"] = -1;
			else{
				if($compta["benefice_cumul_rapp"] > 0)
					$compta["benefice_cumul_indicateur"] = 1;
				else	
				 	$compta["benefice_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('60', $mois, $annee);
			$compta["classe60_vad"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe60_vad_cumul"] = round( $comptabilite->get_cumul('60', '01', $mois, $annee), 2);
			$compta["classe60_vad_cumul_prec"] = round( $comptabilite->get_cumul('60', '01', $mois, $annee_prec), 2);
			$compta["classe60_vad_cumul_rapp"]  = round( ( ($compta["classe60_vad_cumul"] / $compta["classe60_vad_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe60_vad_cumul_rapp"] > 0)
				$compta["classe60_vad_cumul_indicateur"] = -1;
			else{
				if($compta["classe60_vad_cumul_rapp"] < 0)
					$compta["classe60_vad_cumul_indicateur"] = 1;
				else	
				 	$compta["classe60_vad_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('61', $mois, $annee);
			$compta["classe61_cgs"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe61_cgs_cumul"] = round( $comptabilite->get_cumul('61', '01', $mois, $annee), 2);
			$compta["classe61_cgs_cumul_prec"] = round( $comptabilite->get_cumul('61', '01', $mois, $annee_prec), 2);
			$compta["classe61_cgs_cumul_rapp"]  = round( ( ($compta["classe61_cgs_cumul"] / $compta["classe61_cgs_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe61_cgs_cumul_rapp"] > 0)
				$compta["classe61_cgs_cumul_indicateur"] = -1;
			else{
				if($compta["classe61_cgs_cumul_rapp"] < 0)
					$compta["classe61_cgs_cumul_indicateur"] = 1;
				else	
				 	$compta["classe61_cgs_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('62', $mois, $annee);
			$compta["classe62_cgs"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe62_cgs_cumul"] = round( $comptabilite->get_cumul('62', '01', $mois, $annee), 2);
			$compta["classe62_cgs_cumul_prec"] = round( $comptabilite->get_cumul('62', '01', $mois, $annee_prec), 2);
			$compta["classe62_cgs_cumul_rapp"]  = round( ( ($compta["classe62_cgs_cumul"] / $compta["classe62_cgs_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe62_cgs_cumul_rapp"] > 0)
				$compta["classe62_cgs_cumul_indicateur"] = -1;
			else{
				if($compta["classe62_cgs_cumul_rapp"] < 0)
					$compta["classe62_cgs_cumul_indicateur"] = 1;
				else	
				 	$compta["classe62_cgs_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('63', $mois, $annee);
			$compta["classe63_cgs"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe63_cgs_cumul"] = round( $comptabilite->get_cumul('63', '01', $mois, $annee), 2);
			$compta["classe63_cgs_cumul_prec"] = round( $comptabilite->get_cumul('63', '01', $mois, $annee_prec), 2);
			$compta["classe63_cgs_cumul_rapp"]  = round( ( ($compta["classe63_cgs_cumul"] / $compta["classe63_cgs_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe63_cgs_cumul_rapp"] > 0)
				$compta["classe63_cgs_cumul_indicateur"] = -1;
			else{
				if($compta["classe63_cgs_cumul_rapp"] < 0)
					$compta["classe63_cgs_cumul_indicateur"] = 1;
				else	
				 	$compta["classe63_cgs_cumul_indicateur"] = 0;
			}						
			 
			$classe = $comptabilite->get_classe('64', $mois, $annee);
			$compta["classe64_cgs"] = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe64_cgs_cumul"] = round( $comptabilite->get_cumul('64', '01', $mois, $annee), 2);
			$compta["classe64_cgs_cumul_prec"] = round( $comptabilite->get_cumul('64', '01', $mois, $annee_prec), 2);
			$compta["classe64_cgs_cumul_rapp"]  = round( ( ($compta["classe64_cgs_cumul"] / $compta["classe64_cgs_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe64_cgs_cumul_rapp"] > 0)
				$compta["classe64_cgs_cumul_indicateur"] = -1;
			else{
				if($compta["classe64_cgs_cumul_rapp"] < 0)
					$compta["classe64_cgs_cumul_indicateur"] = 1;
				else	
				 	$compta["classe64_cgs_cumul_indicateur"] = 0;
			}						
			
			$classe = $comptabilite->get_classe('65', $mois, $annee);
			$compta["classe65"]     = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe65_cumul"] = round( $comptabilite->get_cumul('65', '01', $mois, $annee), 2);
			$compta["classe65_cumul_prec"] = round( $comptabilite->get_cumul('65', '01', $mois, $annee_prec), 2);
			$compta["classe65_cumul_rapp"]  = round( ( ($compta["classe65_cumul"] / $compta["classe65_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe65_cumul_rapp"] > 0)
				$compta["classe65_cumul_indicateur"] = -1;
			else{
				if($compta["classe65_cumul_rapp"] < 0)
					$compta["classe65_cumul_indicateur"] = 1;
				else	
				 	$compta["classe65_cumul_indicateur"] = 0;
			}						 
			 
			$classe = $comptabilite->get_classe('66', $mois, $annee);
			$compta["classe66"]     = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe66_cumul"] = round( $comptabilite->get_cumul('66', '01', $mois, $annee), 2);
			$compta["classe66_cumul_prec"] = round( $comptabilite->get_cumul('66', '01', $mois, $annee_prec), 2);
			$compta["classe66_cumul_rapp"]  = round( ( ($compta["classe66_cumul"] / $compta["classe66_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe66_cumul_rapp"] > 0)
				$compta["classe66_cumul_indicateur"] = -1;
			else{
				if($compta["classe66_cumul_rapp"] < 0)
					$compta["classe66_cumul_indicateur"] = 1;
				else	
				 	$compta["classe66_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('67', $mois, $annee);
			$compta["classe67"]     = round($classe["debit"] - $classe["credit"], 2);
			$compta["classe67_cumul"] = round( $comptabilite->get_cumul('67', '01', $mois, $annee), 2);
			$compta["classe67_cumul_prec"] = round( $comptabilite->get_cumul('67', '01', $mois, $annee_prec), 2);
			$compta["classe67_cumul_rapp"]  = round( ( ($compta["classe67_cumul"] / $compta["classe67_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe67_cumul_rapp"] > 0)
				$compta["classe67_cumul_indicateur"] = -1;
			else{
				if($compta["classe67_cumul_rapp"] < 0)
					$compta["classe67_cumul_indicateur"] = 1;
				else	
				 	$compta["classe67_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('70', $mois, $annee);
			$compta["classe70_vad"] = round($classe["credit"] - $classe["debit"], 2);
			$compta["classe70_vad_cumul"] = round( (-1) * $comptabilite->get_cumul('70', '01', $mois, $annee), 2);
			$compta["classe70_vad_cumul_prec"] = round( (-1) * $comptabilite->get_cumul('70', '01', $mois, $annee_prec), 2);
			$compta["classe70_vad_cumul_rapp"]  = round( ( ($compta["classe70_vad_cumul"] / $compta["classe70_vad_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe70_vad_cumul_rapp"] < 0)
				$compta["classe70_vad_cumul_indicateur"] = -1;
			else{
				if($compta["classe70_vad_cumul_rapp"] > 0)
					$compta["classe70_vad_cumul_indicateur"] = 1;
				else	
				 	$compta["classe70_vad_cumul_indicateur"] = 0;
			}

			$classe = $comptabilite->get_classe('72', $mois, $annee);
			$compta["classe72_vad"] = round($classe["credit"] - $classe["debit"], 2);
			$compta["classe72_vad_cumul"] = round( (-1) * $comptabilite->get_cumul('72', '01', $mois, $annee), 2);
			$compta["classe72_vad_cumul_prec"] = round( (-1) * $comptabilite->get_cumul('72', '01', $mois, $annee_prec), 2);
			$compta["classe72_vad_cumul_rapp"]  = round( ( ($compta["classe72_vad_cumul"] / $compta["classe72_vad_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe72_vad_cumul_rapp"] < 0)
				$compta["classe72_vad_cumul_indicateur"] = -1;
			else{
				if($compta["classe72_vad_cumul_rapp"] > 0)
					$compta["classe72_vad_cumul_indicateur"] = 1;
				else	
				 	$compta["classe72_vad_cumul_indicateur"] = 0;
			}
			
			$classe = $comptabilite->get_classe('74', $mois, $annee);
			$compta["classe74_vad"] = round($classe["credit"] - $classe["debit"], 2);
			$compta["classe74_vad_cumul"] = round( (-1) * $comptabilite->get_cumul('74', '01', $mois, $annee), 2);
			$compta["classe74_vad_cumul_prec"] = round( (-1) * $comptabilite->get_cumul('74', '01', $mois, $annee_prec), 2);
			$compta["classe74_vad_cumul_rapp"]  = round( ( ($compta["classe74_vad_cumul"] / $compta["classe74_vad_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe74_vad_cumul_rapp"] < 0)
				$compta["classe74_vad_cumul_indicateur"] = -1;
			else{
				if($compta["classe74_vad_cumul_rapp"] > 0)
					$compta["classe74_vad_cumul_indicateur"] = 1;
				else	
				 	$compta["classe74_vad_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('75', $mois, $annee);
			$compta["classe75"]     = round($classe["credit"] - $classe["debit"], 2);
			$compta["classe75_cumul"] = round( (-1) * $comptabilite->get_cumul('75', '01', $mois, $annee), 2);
			$compta["classe75_cumul_prec"] = round( (-1) * $comptabilite->get_cumul('75', '01', $mois, $annee_prec), 2);
			$compta["classe75_cumul_rapp"]  = round( ( ($compta["classe75_cumul"] / $compta["classe75_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe75_cumul_rapp"] < 0)
				$compta["classe75_cumul_indicateur"] = -1;
			else{
				if($compta["classe75_cumul_rapp"] > 0)
					$compta["classe75_cumul_indicateur"] = 1;
				else	
				 	$compta["classe75_cumul_indicateur"] = 0;
			}			
			
			$classe = $comptabilite->get_classe('76', $mois, $annee);
			$compta["classe76"]     = round($classe["credit"] - $classe["debit"], 2);
			$compta["classe76_cumul"] = round( (-1) * $comptabilite->get_cumul('76', '01', $mois, $annee), 2);
			$compta["classe76_cumul_prec"] = round( (-1) * $comptabilite->get_cumul('76', '01', $mois, $annee_prec), 2);
			$compta["classe76_cumul_rapp"]  = round( ( ($compta["classe76_cumul"] / $compta["classe76_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["classe76_cumul_rapp"] < 0)
				$compta["classe76_cumul_indicateur"] = -1;
			else{
				if($compta["classe76_cumul_rapp"] > 0)
					$compta["classe76_cumul_indicateur"] = 1;
				else	
				 	$compta["classe76_cumul_indicateur"] = 0;
			}						
			
			$compta["benefice_fr"] = round( -1 * (
									 $compta["classe70_vad"] + $compta["classe72_vad"] + $compta["classe74_vad"] + 
			                         $compta["classe75"]     + $classe["classe76"]     - 
			                        ($compta["classe60_vad"] + $compta["classe61_cgs"] + 
			                         $compta["classe62_cgs"] + $compta["classe63_cgs"] + 
			                         $compta["classe64_cgs"] + $compta["classe65"]     + 
			                         $compta["classe66"]     + $compta["classe67"]) ), 2);
			$compta["benefice_fr_cumul"] = round( -1 * (
									 $compta["classe70_vad_cumul"] + $compta["classe72_vad_cumul"] + $compta["classe74_vad_cumul"] + 
			                         $compta["classe75_cumul"]     + $classe["classe76_cumul"]     - 
			                        ($compta["classe60_vad_cumul"] + $compta["classe61_cgs_cumul"] + 
			                         $compta["classe62_cgs_cumul"] + $compta["classe63_cgs_cumul"] + 
			                         $compta["classe64_cgs_cumul"] + $compta["classe65_cumul"]     + 
			                         $compta["classe66_cumul"]     + $compta["classe67_cumul"]) ), 2);
			$compta["benefice_fr_cumul_prec"] = round( -1 * (
									 $compta["classe70_vad_cumul_prec"] + $compta["classe72_vad_cumul_prec"] + $compta["classe74_vad_cumul_prec"] + 
			                         $compta["classe75_cumul_prec"]     + $classe["classe76_cumul_prec"]     - 
			                        ($compta["classe60_vad_cumul_prec"] + $compta["classe61_cgs_cumul_prec"] + 
			                         $compta["classe62_cgs_cumul_prec"] + $compta["classe63_cgs_cumul_prec"] + 
			                         $compta["classe64_cgs_cumul_prec"] + $compta["classe65_cumul_prec"]     + 
			                         $compta["classe66_cumul_prec"]     + $compta["classe67_cumul_prec"]) ), 2);
			$compta["benefice_fr_cumul_rapp"]  = round( ( ($compta["benefice_fr_cumul"] / $compta["benefice_fr_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["benefice_fr_cumul_prec"] < 0)
				$compta["benefice_fr_cumul_rapp"] = $compta["benefice_fr_cumul_rapp"] * (-1);						                         			                         
			if($compta["benefice_fr_cumul_rapp"] > 0)
				$compta["benefice_fr_cumul_indicateur"] = -1;
			else{
				if($compta["benefice_fr_cumul_rapp"] < 0)
					$compta["benefice_fr_cumul_indicateur"] = 1;
				else	
				 	$compta["benefice_fr_cumul_indicateur"] = 0;
			}						
				
			$compta["marge_brute"] = round( $compta["classe70_vad"] - $compta["classe60_vad"], 2);
			$compta["marge_brute_cumul"] = round( $compta["classe70_vad_cumul"] - $compta["classe60_vad_cumul"], 2);
			$compta["marge_brute_cumul_prec"] = round( $compta["classe70_vad_cumul_prec"] - $compta["classe60_vad_cumul_prec"], 2);
			$compta["marge_brute_cumul_rapp"]  = round( ( ($compta["marge_brute_cumul"] / $compta["marge_brute_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["marge_brute_cumul_rapp"] < 0)
				$compta["marge_brute_cumul_indicateur"] = -1;
			else{
				if($compta["marge_brute_cumul_rapp"] > 0)
					$compta["marge_brute_cumul_indicateur"] = 1;
				else	
				 	$compta["marge_brute_cumul_indicateur"] = 0;
			}					
			
			$compta["vad"] = round( $compta["classe70_vad"] + $compta["classe72_vad"] + $compta["classe74_vad"] - $compta["classe60_vad"], 2);
			$compta["vad_cumul"] = round( $compta["classe70_vad_cumul"] + $compta["classe72_vad_cumul"] + $compta["classe74_vad_cumul"] - $compta["classe60_vad_cumul"], 2);
			$compta["vad_cumul_prec"] = round( $compta["classe70_vad_cumul_prec"] + $compta["classe72_vad_cumul_prec"] + $compta["classe74_vad_cumul_prec"] - $compta["classe60_vad_cumul_prec"], 2);
			$compta["vad_cumul_rapp"]  = round( ( ($compta["vad_cumul"] / $compta["vad_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["vad_cumul_rapp"] < 0)
				$compta["vad_cumul_indicateur"] = -1;
			else{
				if($compta["vad_cumul_rapp"] > 0)
					$compta["vad_cumul_indicateur"] = 1;
				else	
				 	$compta["vad_cumul_indicateur"] = 0;
			}				
			
			$compta["cgs"] = round( $compta["classe61_cgs"] + $compta["classe62_cgs"] + $compta["classe63_cgs"] + $compta["classe64_cgs"], 2);
			$compta["cgs_cumul"] = round( $compta["classe61_cgs_cumul"] + $compta["classe62_cgs_cumul"] + $compta["classe63_cgs_cumul"] + $compta["classe64_cgs_cumul"], 2);
			$compta["cgs_cumul_prec"] = round( $compta["classe61_cgs_cumul_prec"] + $compta["classe62_cgs_cumul_prec"] + $compta["classe63_cgs_cumul_prec"] + $compta["classe64_cgs_cumul_prec"], 2);
			$compta["cgs_cumul_rapp"]  = round( ( ($compta["cgs_cumul"] / $compta["cgs_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["cgs_cumul_rapp"] > 0)
				$compta["cgs_cumul_indicateur"] = -1;
			else{
				if($compta["cgs_cumul_rapp"] < 0)
					$compta["cgs_cumul_indicateur"] = 1;
				else	
				 	$compta["cgs_cumul_indicateur"] = 0;
			}			
			
			$compta["tee"] = round( $compta["vad"]/$compta["cgs"], 2);
			$compta["tee_cumul"] = round( $compta["vad_cumul"]/$compta["cgs_cumul"], 2);
			$compta["tee_cumul_prec"] = round( $compta["vad_cumul_prec"]/$compta["cgs_cumul_prec"], 2);
			$compta["tee_cumul_rapp"]  = round( ( ($compta["tee_cumul"] / $compta["tee_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["tee_cumul_rapp"] < 0)
				$compta["tee_cumul_indicateur"] = -1;
			else{
				if($compta["tee_cumul_rapp"] > 0)
					$compta["tee_cumul_indicateur"] = 1;
				else	
				 	$compta["tee_cumul_indicateur"] = 0;
			}						
			
			$compta["fr"]    = round( $compta["classe1"] + $compta["classe2"], 2);
			$compta["fr_cumul"]    = round( $compta["classe1_cumul"] + $compta["classe2_cumul"], 2);
			$compta["fr_cumul_prec"]    = round( $compta["classe1_cumul_prec"] + $compta["classe2_cumul_prec"], 2);
			$compta["fr_cumul_rapp"]  = round( ( ($compta["fr_cumul"] / $compta["fr_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["fr_cumul_rapp"] < 0)
				$compta["fr_cumul_indicateur"] = -1;
			else{
				if($compta["fr_cumul_rapp"] > 0)
					$compta["fr_cumul_indicateur"] = 1;
				else	
				 	$compta["fr_cumul_indicateur"] = 0;
			}			
			
			$compta["bfr"]   = round( $compta["classe3"] + $compta["classe4"], 2);
			$compta["bfr_cumul"]   = round( $compta["classe3_cumul"] + $compta["classe4_cumul"], 2);
			$compta["bfr_cumul_prec"]   = round( $compta["classe3_cumul_prec"] + $compta["classe4_cumul_prec"], 2);
			$compta["bfr_cumul_rapp"]  = round( ( ($compta["bfr_cumul"] / $compta["bfr_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["bfr_cumul_prec"] < $compta["bfr_cumul"])
				$compta["bfr_cumul_indicateur"] = -1;
			else{
				if($compta["bfr_cumul_prec"] > $compta["bfr_cumul"])
					$compta["bfr_cumul_indicateur"] = 1;
				else	
				 	$compta["bfr_cumul_indicateur"] = 0;
			}			
			
			$compta["tr"]    = round( abs($compta["fr"]) + abs($compta["bfr"]), 2);
			$compta["tr_cumul"]    = round( abs($compta["fr_cumul"]) + abs($compta["bfr_cumul"]), 2);
			$compta["tr_cumul_prec"]    = round( abs($compta["fr_cumul_prec"]) + abs($compta["bfr_cumul_prec"]), 2);
			$compta["tr_cumul_rapp"]  = round( ( ($compta["tr_cumul"] / $compta["tr_cumul_prec"]) - 1 ) * 100, 2);
			//$compta["verif"] = $compta["classe70_vad"] + $compta["classe74_vad"] - $compta["classe60_vad"];
			if($compta["tr_cumul_rapp"] < 0)
				$compta["tr_cumul_indicateur"] = -1;
			else{
				if($compta["tr_cumul_rapp"] > 0)
					$compta["tr_cumul_indicateur"] = 1;
				else	
				 	$compta["tr_cumul_indicateur"] = 0;
			}
			
			$compta["vadbfr"] = round( $compta["vad"]/$compta["bfr"], 2);
			$compta["vadbfr_cumul"] = round( $compta["vad_cumul"]/$compta["bfr_cumul"], 2);
			$compta["vadbfr_cumul_prec"] = round( $compta["vad_cumul_prec"]/$compta["bfr_cumul_prec"], 2);
			$compta["vadbfr_cumul_rapp"]  = round( ( ($compta["vadbfr_cumul"] / $compta["vadbfr_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["vadbfr_cumul_rapp"] < 0)
				$compta["vadbfr_cumul_indicateur"] = -1;
			else{
				if($compta["vadbfr_cumul_rapp"] > 0)
					$compta["vadbfr_cumul_indicateur"] = 1;
				else	
				 	$compta["vadbfr_cumul_indicateur"] = 0;
			}			
			
			$compta["tef"]    = round( $compta["fr"]/$compta["bfr"], 2);
			$compta["tef_cumul"]    = round( $compta["fr_cumul"]/$compta["bfr_cumul"], 2);
			$compta["tef_cumul_prec"]    = round( $compta["fr_cumul_prec"]/$compta["bfr_cumul_prec"], 2);
			$compta["tef_cumul_rapp"]  = round( ( ($compta["tef_cumul"] / $compta["tef_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["tef_cumul_rapp"] < 0)
				$compta["tef_cumul_indicateur"] = -1;
			else{
				if($compta["tef_cumul_rapp"] > 0)
					$compta["tef_cumul_indicateur"] = 1;
				else	
				 	$compta["tef_cumul_indicateur"] = 0;
			}			
			
			$compta["cash"]   = round( ((-1)*$compta["benefice_fr"]) + $compta["classe63_cgs"], 2);
			$compta["cash_cumul"]   = round( ((-1)*$compta["benefice_fr_cumul"]) + $compta["classe63_cgs_cumul"], 2);
			$compta["cash_cumul_prec"]   = round( ((-1)*$compta["benefice_fr_cumul_prec"]) + $compta["classe63_cgs_cumul_prec"], 2);
			$compta["cash_cumul_rapp"]  = round( ( ($compta["cash_cumul"] / $compta["cash_cumul_prec"]) - 1 ) * 100, 2);
			if($compta["cash_cumul_rapp"] < 0)
				$compta["cash_cumul_indicateur"] = -1;
			else{
				if($compta["cash_cumul_rapp"] > 0)
					$compta["cash_cumul_indicateur"] = 1;
				else	
				 	$compta["cash_cumul_indicateur"] = 0;
			}						
			
			$template->assign("title", $title);
			$template->assign("compta", $compta);
			$template->display("template_management_comptabilite_display_state.tpl");
	        break;

	}

?>
