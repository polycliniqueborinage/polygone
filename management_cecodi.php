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
	
	$mainmenu = array("cecodi" => "active");
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
	$cecodi = (object) new cecodi();
	$url = "https://www.riziv.fgov.be/webapp/nomen/Honoraria.aspx?lg=F&id=";
	
	switch ($action) {
		
		case "add":
			$title = $langfile["navigation_title_management_cecodi_add"];
		
			$template->assign("title", $title);
			
			$template->display("template_management_cecodi_add.tpl");
	    	
			break;

		case "edit":
			$title = $langfile["navigation_title_management_cecodi_edit"];
			$cecodi = $cecodi->get($id);
			
			$template->assign("title", $title);
			$template->assign("cecodi", $cecodi);
			
			$template->display("template_management_cecodi_add.tpl");
	    	
			break;
	    
		case "submit":
			
			$id = getArrayVal($_POST, "id");
			$code = getArrayVal($_POST, "code");
			
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
				
				$result = $cecodi->update($type, $company, $firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email,$web,$tva, $textcomment, $id);
					
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('cecodi','update',$action);
					$loc = $url . "management_cecodi.php?action=view&mode=edited&id=" .$id;
	        	    header("Location: $loc");
	       		}
				
			} else {
				
				$result = $cecodi->add($type, $code, $company,$firstname, $familyname, $adress1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $web, $tva, $textcomment);
	        	
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('cecodi','add',$action);
					$loc = $url . "management_cecodi.php?action=view&mode=saved&id=" . $result;
	        	    header("Location: $loc");
	       		}
	       		
	        }

	        break;
		
		case "delete":
			$action = $cecodi->getLogInfo($id);
			$result = $cecodi->delete($id);
			if ($result) {
				$mylog->add('cecodi','delete',$action);
	       	}
			
			break;
	        
	        
		case "list":
			
			$type1 = $langfile["dico_management_cecodi_consultation"];
			$type2 = $langfile["dico_management_cecodi_acte"];
			
			$edit_alt = $langfile["dico_management_cecodi_edit_alt"];
			$detail_alt = $langfile["dico_management_cecodi_detail_alt"];
		
			$detail1 = "<a onclick=\"javascript=viewCecodi(";
			$detail2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_comment.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			$edit1 = "<a onclick=\"javascript=editCecodi(";
			$edit2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_edit.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
		
			//$url1 = "<a href=\'$url";
			//$url2 = "\' target=\'blank\' >url</a>";
			
			$_SESSION['cecodilist']="SELECT concat('$edit1',ID,'$edit2',' ','$detail1',ID,'$detail2'), cecodi, age_short, description, cond, REPLACE(REPLACE(propriete,'consultation', '$type1'),'acte','$type2'), kdb, bc, hono_travailleur, b_tiers_payant, a_vipo, prix_vp, prix_tp, prix_tr, concat('$url1',cecodi,'$url2') FROM cecodis2";
			$title = $langfile["navigation_title_management_cecodi_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_cecodi_list.tpl");
			
			break;

		case "view":
	    	$title = $langfile["navigation_title_management_cecodi_view"];
			$cecodi = $cecodi->get($id);

			$template->assign("title", $title);
			$template->assign("cecodi", $cecodi);
			$template->assign("mode", $mode);
			
			$template->display("template_management_cecodi_view.tpl");
			break;
		
		case "modulesearch":
			
			$types = Array();
			$types[1] = $langfile["dico_management_cecodi_consultation"];
			$types[2] = $langfile["dico_management_cecodi_acte"];
			
			$edit_alt = $langfile["dico_management_cecodi_edit_alt"];
			$detail_alt = $langfile["dico_management_cecodi_detail_alt"];
			$delete_alt = $langfile["dico_management_cecodi_delete_alt"];
			
			$cecodis = $cecodi->modulesearch($id,$value,$limit,$types);
			
			$template->assign("cecodis", $cecodis);
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
			
			$cecodi->autocomplete($id,$value);
			
			break;
			
		default:
	    	$title = $langfile["navigation_title_management_cecodi_search"];
	
			$template->assign("title", $title);

			$template->display("template_management_cecodi_search.tpl");
	}

?>