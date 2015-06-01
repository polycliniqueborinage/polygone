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
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$limit = getArrayVal($_POST, "limit");
	$value = strtolower(utf8_decode(trim(getArrayVal($_POST, "value"))));

	if ($adminstate < 3 and $action!='modulesearch') {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management_active", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("client" => "active");
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
	$client = (object) new patient();
	
	switch ($action) {
		
		case "add":

			$title = $langfile["navigation_title_management_client_add"];
			
			$template->assign("title", $title);
			
			$template->display("template_management_client_add.tpl");
	    
			break;
	    
	    case "edit":
	    	
	    	$title = $langfile["navigation_title_management_client_edit"];
	    	$client = $client->get($id);

			$template->assign("title", $title);
			$template->assign("client", $client);

	    	$template->display("template_management_client_add.tpl");

			break;
	    
		case "submit":
			
			$ID = getArrayVal($_POST, "id"); 
			$familyname  = ucfirst(strtolower(getArrayVal($_POST, "familyname")));
			$firstname = ucfirst(strtolower(getArrayVal($_POST, "firstname")));
			$birthday = getArrayVal($_POST, "birthday");
			$gender = getArrayVal($_POST, "gender");
			$address1 = getArrayVal($_POST, "address1");
			$zip1city1 = getArrayVal($_POST, "zip1city1");
			
			$privatephone = getArrayVal($_POST, "privatephone");
			$mobilephone = getArrayVal($_POST, "mobilephone");
			$email = getArrayVal($_POST, "email");
			
			if ($ID != '') {
				
				$result = $client->update($titulaireID, $firstname, $familyname, $birthday, $gender, $nationality, $niss, $address1, $zip1city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $receiveMail, $mutuelCode, $mutuelMatricule, $sis, $ct1ct2,  $tiersPayant, $doctor, $ID);
					
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('client','update',$action);
					$loc = $url . "management_client.php?action=view&mode=edited&id=" .$ID;
	        	    header("Location: $loc");
	       		}
				
			} else {
				
				$result = $client->add($titulaireID, $firstname, $familyname, $birthday, $gender, $nationality, $niss, $address1, $zip1city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $receiveMail, $mutuelCode, $mutuelMatricule, $sis, $ct1ct2,  $tiersPayant, $doctor);
	        	
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('client','add',$action);
					$loc = $url . "management_client.php?action=view&mode=added&id=" .$result;
	        		header("Location: $loc");
	       		}
	       		
	        }

	        break;
		    
		break;
		
		case "delete":
			
			$result = $client->delete($id);
			if ($result) {
				$mylog->add('client','delete',$id);
	       	}

			break;
		
		case "list":
			
			$edit_alt = $langfile["dico_management_client_edit_alt"];
			$detail_alt = $langfile["dico_management_client_detail_alt"];
		
			$view1 = "<a onclick=\"javascript=viewClient(";
			$view2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_comment.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			$detail1 = "<a onclick=\"javascript=detailClient(";
			$detail2 = ")\" >";
			$detail3 = "</a>";
			
			$edit1 = "<a onclick=\"javascript=editClient(";
			$edit2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_edit.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			$tierspayant1 = "<input type=\'checkbox\' ";
			$tierspayant2 = " disabled=\'true\' />";
			
			$sqlglobal= "select concat('$edit1',p.id,'$edit2',' ','$view1',p.id,'$view2'), p.nom, p.prenom, concat('<div style=\'display: none;\' >',p.date_naissance,'</div>',date_format(p.date_naissance, '%d/%m/%Y')), p.telephone, p.gsm, p.mail FROM patients p";
			
			$_SESSION['clientlist']=$sqlglobal;
			
			$title = $langfile["navigation_title_management_client_list"];
	
			$template->assign("title", $title);
			//$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_client_list.tpl");
		break;

		case "view":
			
			$title = $langfile["navigation_title_management_client_view"];
			$client = $client->get($id);
	    	
			$template->assign("title", $title);
			$template->assign("mode", $mode);
			$template->assign("client", $client);
			
			$template->display("template_management_client_view.tpl");
		break;
		
		
		case "modulesearch":

			$clients = $client->modulesearch($id,$value,$limit);
			
			$template->assign("clients", $clients);

			if ($type == 'complete') {
				$template->display("template_management_gestion_complete_search.tpl");
			} else {
				if ($type == 'simple') {
					$template->display("template_management_gestion_simple_search.tpl");
				} else {
					$template->display("template_management_client_gestion_overlay_search.tpl");
				}
			}
			
			break;
			
		case "autocomplete":
			
			$client->autocomplete($id,$value);
			
			break;
					
	    default:
	    	
	    	$title = $langfile["navigation_title_management_client_search"];
	
			$template->assign("title", $title);

			$template->display("template_management_client_search.tpl");
	}

?>