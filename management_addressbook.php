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
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$value = utf8_decode(trim(getArrayVal($_POST, "value")));
	$limit = getArrayVal($_POST, "limit");
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management_active", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("addressbook" => "active");
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
	$addressbook = (object) new addressbook();
	$speciality = (object) new speciality();
	
	switch ($action) {
		
		case "add":
			$title = $langfile["navigation_title_management_addressbook_add"];
			$specialities = $speciality->getall();
		
			$template->assign("title", $title);
			$template->assign("specialities", $specialities);
			
			$template->display("template_management_addressbook_add.tpl");
	    	
			break;

		case "edit":
			$title = $langfile["navigation_title_management_addressbook_edit"];
			$specialities = $speciality->getall();
			$addressbook = $addressbook->get($id);
			
			$template->assign("title", $title);
			$template->assign("specialities", $specialities);
			$template->assign("addressbook", $addressbook);
			
			$template->display("template_management_addressbook_add.tpl");
	    	
			break;
	    
		case "submit":
			
			$id = getArrayVal($_POST, "id");
			$code = getArrayVal($_POST, "code");
			
			$speciality = getArrayVal($_POST, "speciality");
			$inami = getArrayVal($_POST, "inami");
			
			$type = getArrayVal($_POST, "type");
			$company = getArrayVal($_POST, "company");
			$firstname = ucfirst(strtolower(getArrayVal($_POST, "firstname")));
			$familyname  = ucfirst(strtolower(getArrayVal($_POST, "familyname")));

			$address1 = getArrayVal($_POST, "address1");
			$zip1city1 = getArrayVal($_POST, "zip1city1");
			$zip1 = substr($zip1city1,0,4);
			$city1 = trim(substr($zip1city1,4));
			$state1 = getArrayVal($_POST, "state1");
			$country1 = getArrayVal($_POST, "country1");
			
			$workphone = getArrayVal($_POST, "workphone");
			$privatephone = getArrayVal($_POST, "privatephone");
			$mobilephone = getArrayVal($_POST, "mobilephone");
			$fax = getArrayVal($_POST, "fax");
			$email = getArrayVal($_POST, "email");
			$web = getArrayVal($_POST, "web");
			
			$tva = getArrayVal($_POST, "tva");

			$textcomment = getArrayVal($_POST, "textcomment");
			
			if ($id != '') {
				
				$result = $addressbook->update($type,  $code, $speciality, $inami, $company, $firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email,$web,$tva, $textcomment, $id);
					
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('addressbook','update',$action);
					$loc = $url . "management_addressbook.php?action=view&mode=edited&id=" .$id;
	        	    header("Location: $loc");
	       		}
				
			} else {
				
				$result = $addressbook->add($type, $code, $speciality, $inami, $company,$firstname, $familyname, $adress1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $web, $tva, $textcomment);
	        	
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('addressbook','add',$action);
					$loc = $url . "management_addressbook.php?action=view&mode=saved&id=" . $result;
	        	    header("Location: $loc");
	       		}
	       		
	        }

	        break;
		
		case "delete":
			
			$action = $addressbook->getLogInfo($id);
			$result = $addressbook->delete($id);
			if ($result) {
				$mylog->add('addressbook','delete',$action);
	       	}
			
			break;
	        
	        
		case "list":
			
			$type1 = $langfile["dico_management_addressbook_other"];
			$type2 = $langfile["dico_management_addressbook_doctor"];
			$type3 = $langfile["dico_management_addressbook_supplier"];
			$type4 = $langfile["dico_management_addressbook_client"];
			$type5 = $langfile["dico_management_addressbook_mutuel"];
			
			$edit_alt = $langfile["dico_management_addressbook_edit_alt"];
			$detail_alt = $langfile["dico_management_addressbook_detail_alt"];
		
			$detail1 = "<a onclick=\"javascript=viewAddressbook(";
			$detail2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-view-hover.png\" alt=\"".$detail_alt."\" title=\"".$detail_alt."\" border=\"0\" /></a>";
			
			$edit1 = "<a onclick=\"javascript=editAddressbook(";
			$edit2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-edit-hover.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
		
			$_SESSION['addressbooklist']="SELECT concat('$edit1',ID,'$edit2',' ','$detail1',ID,'$detail2'), REPLACE(REPLACE(REPLACE(REPLACE(REPLACE( type, 'client', '$type4' ),'supplier','$type3'),'doctor','$type2'),'other','$type1'),'mutuel','$type5'), ID, company, familyname, firstname, workphone, mobilephone, privatephone FROM addressbook";
			$title = $langfile["navigation_title_management_addressbook_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_addressbook_list.tpl");
			
			break;

		case "view":
	    	$title = $langfile["navigation_title_management_addressbook_view"];
			$addressbook = $addressbook->get($id);

			$template->assign("title", $title);
			$template->assign("addressbook", $addressbook);
			$template->assign("mode", $mode);
			
			$template->display("template_management_addressbook_view.tpl");
			break;
		
		case "modulesearch":
			
			$types = Array();
			$types[1] = $langfile["dico_management_addressbook_other"];
			$types[2] = $langfile["dico_management_addressbook_doctor"];
			$types[3] = $langfile["dico_management_addressbook_supplier"];
			$types[4] = $langfile["dico_management_addressbook_client"];
			$types[5] = $langfile["dico_management_addressbook_mutuel"];
			
			$edit_alt = $langfile["dico_management_addressbook_edit_alt"];
			$detail_alt = $langfile["dico_management_addressbook_detail_alt"];
			$delete_alt = $langfile["dico_management_addressbook_delete_alt"];
			
			$addressbooks = $addressbook->modulesearch($id,$value,$limit,$types);
			
			$template->assign("addressbooks", $addressbooks);
			$template->assign("edit_alt", $edit_alt);
			$template->assign("detail_alt", $detail_alt);
			$template->assign("delete_alt", $delete_alt);
			
			if ($type != 'simple') {
				$template->display("template_management_gestion_complete_search.tpl");
			} else {
				$template->display("template_management_gestion_simple_search.tpl");
			}
			
			break;
			
		case "autocomplete":
			
			$addressbook->autocomplete($id,$value);
			
			break;
			
		default:
	    	$title = $langfile["navigation_title_management_addressbook_search"];
	
			$template->assign("title", $title);

			$template->display("template_management_addressbook_search.tpl");
	}

?>