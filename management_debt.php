<?php

	require("./init.php");

	if (!session_is_registered("userid")){
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
	
	$mainclasses = array("user" => "user", "management_current" => "management_active", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("debt" => "active");
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
	$debt = (object) new debt();
	
	switch ($action) {
		
		case "add":
			$title = $langfile["navigation_title_management_debt_add"];
			$debt = Array();
			$debt["creation_date"] = date("d/m/Y");
                
			$template->assign("title", $title);
			$template->assign("debt", $debt);
			
			$template->display("template_management_debt_add.tpl");
	    break;

		case "edit":
			$title = $langfile["navigation_title_management_debt_edit"];
			$debt = $debt->get($id);
			
			$template->assign("title", $title);
			$template->assign("debt", $debt);
			
			$template->display("template_management_debt_add.tpl");
	    break;
	    
		case "submit":
			
			$ID = getArrayVal($_POST, "ID");
			$addressbook_ID = getArrayVal($_POST, "addressbook_ID");
			
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
			
			$amount = getArrayVal($_POST, "amount");
			$creation_date = getArrayVal($_POST, "creation_date");
						
			$textcomment = getArrayVal($_POST, "textcomment");
			
			if ($ID != '') {
				
				if ($addressbook_ID != '') {
					
					// update debt and update adressebook
					$result = $debt->update_debt_update_addressbook($firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $amount, $creation_date, $textcomment, $ID, $addressbook_ID);
					
					if ($result) {
						$mylog->add('dept','update',"update debt and update addressbook");
				        $loc = $url . "management_debt.php?action=view&mode=edited&id=" .$ID;
	    	    	    header("Location: $loc");
	       			}
				
				} else {
					
					// update debt and add a new adressebook
					$result = $debt->update_debt_add_addressbook($firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $amount, $creation_date, $textcomment, $ID);
					
					if ($result) {
						$mylog->add('dept','update',"update debt and add new addressbook");
						$loc = $url . "management_debt.php?action=view&mode=edited&id=" .$ID;
	    	    	    header("Location: $loc");
	       			}
					
				}
				
			} else {
				
				if ($addressbook_ID != '') {
					
					// add new debt and update addressbok
					$result = $debt->add_debt_update_addressbook($firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $amount, $creation_date, $textcomment, $addressbook_ID);
					echo $result;
					if ($result) {
						$mylog->add('dept','add',"add debt and update addressbook");
						$loc = $url . "management_debt.php?action=view&mode=saved&id=" .$result;
	    	    	    header("Location: $loc");
	       			}
				
				} else {
					
					// add a new debt and a new addressbook
					$result = $debt->add_debt_add_addressbook($firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $amount, $creation_date, $textcomment);
					
					if ($result) {
						$mylog->add('dept','add',"add debt and add addressbook");
						$loc = $url . "management_debt.php?action=view&mode=saved&id=" .$result;
	    	    	    header("Location: $loc");
	       			}
					
				}
	       		
	        }

	        break;
		
		case "delete":
			$action = $debt->getLogInfo($id);
			$result = $debt->delete($id);
			if ($result) {
				$mylog->add('debt','delete',$action);
	       	}
			
			break;
	        
		case "contact_list":
			
			$image1 = "<img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/debt/";
			$image2 = ".png\" alt=\"";
			$image3 = "\" title=\"";
			$image4 = "\" border=\"0\" />";
			
			$_SESSION['contactdebtlist']="SELECT ROUND(SUM(d.amount),2), concat('$image1',COUNT(d.amount),'$image2',COUNT(d.amount),'$image3',COUNT(d.amount),'$image4'),  concat(a.familyname,' ',a.firstname),  a.workphone AS workphone, a.mobilephone AS workphone, a.privatephone AS privatephone FROM addressbook a, debt d WHERE d.addressbook_ID = a.ID GROUP BY d.addressbook_ID ORDER BY a.familyname";

			$title = $langfile["navigation_title_management_debt_contact_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_debt_contact_list.tpl");
			
			break;

		case "list":
			
			$edit_alt = $langfile["dico_management_debt_edit_alt"];
			$detail_alt = $langfile["dico_management_debt_detail_alt"];

			$detail1 = "<a onclick=\"javascript=viewDebt(";
			$detail2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-view-hover.png\" alt=\"".$detail_alt."\" title=\"".$detail_alt."\" border=\"0\" /></a>";
			
			$edit1 = "<a onclick=\"javascript=editDebt(";
			$edit2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-edit-hover.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			$_SESSION['debtlist']="SELECT concat('$edit1',d.ID,'$edit2',' ','$detail1',d.ID,'$detail2'),  d.amount as amount, CONCAT('<div style=display:none>',d.creation_date,'</div>',date_format(d.creation_date, '%d/%m/%Y')), concat(a.familyname,' ',a.firstname),  a.workphone AS workphone, a.mobilephone AS workphone, a.privatephone, d.textcomment AS privatephone FROM addressbook a, debt d WHERE d.addressbook_ID = a.ID ORDER BY d.creation_date DESC ";
			$title = $langfile["navigation_title_management_debt_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_debt_list.tpl");
		break;

		case "view":
	    	$title = $langfile["navigation_title_management_debt_view"];
			$debt = $debt->get($id);
			
			$template->assign("title", $title);
			$template->assign("debt", $debt);
			$template->assign("mode", $mode);
			
			$template->display("template_management_debt_view.tpl");
			break;

		case "modulesearch":

			$edit_alt = $langfile["dico_management_debt_edit_alt"];
			$detail_alt = $langfile["dico_management_debt_detail_alt"];
			$delete_alt = $langfile["dico_management_debt_delete_alt"];
			$debts = $debt->modulesearch($id,$value,$limit);
			
			$template->assign("debts", $debts);
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
			
			$debts = $debt->autocomplete($value,$id);
			
			break;
		
	    default:
	    	$title = $langfile["navigation_title_management_debt_search"];
	
			$template->assign("title", $title);

			$template->display("template_management_debt_search.tpl");
	}

?>