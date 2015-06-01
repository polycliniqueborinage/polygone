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
	
	if ($adminstate < 3 and $action!='modulesearch') {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}

	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management_active", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("acte" => "active");
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
	$acte = (object) new acte();
	
	switch ($action) {
		
		case "add":
			$title = $langfile["navigation_title_management_acte_add"];
		
			$template->assign("title", $title);
			
			$template->display("template_management_acte_add.tpl");
	    	
			break;

		case "edit":
			$title = $langfile["navigation_title_management_acte_edit"];
			$acte = $acte->get($id);
			
			$template->assign("title", $title);
			$template->assign("acte", $acte);
			
			$template->display("template_management_acte_add.tpl");
	    	
			break;
	    
		case "submit":
			
			$id = getArrayVal($_POST, "id");
			
			$code = getArrayVal($_POST, "code");
			$description = getArrayVal($_POST, "description");
			$cecodis = getArrayVal($_POST, "cecodis");
			$coutTR  = getArrayVal($_POST, "couttr");
			$coutTP  = getArrayVal($_POST, "couttp");
			$coutVP  = getArrayVal($_POST, "coutvp");
			$coutSM  = getArrayVal($_POST, "coutsm");
			$length = getArrayVal($_POST, "length");
			
			if ($id != '') {
				
				$result = $acte->update($code, $description, $cecodis, $coutTR, $coutTP, $coutVP, $coutSM, $length, $id);
					
				if ($result) {
	        	    $loc = $url . "management_acte.php?action=view&mode=edited&id=" .$id;
	        	    header("Location: $loc");
	       		}
				
			} else {
				
				$result = $acte->add($code, $description, $cecodis, $coutTR, $coutTP, $coutVP, $coutSM, $length);
	        	
				if ($result) {
	        	    $loc = $url . "management_acte.php?action=view&mode=saved&id=" . $result;
	        	    header("Location: $loc");
	       		}
	       		
	        }

	        break;
		
		case "list":
			
			$edit_alt = $langfile["dico_management_acte_edit_alt"];
			$detail_alt = $langfile["dico_management_acte_detail_alt"];
		
			$detail1 = "<a onclick=\"javascript=viewActe(";
			$detail2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_comment.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			$edit1 = "<a onclick=\"javascript=editActe(";
			$edit2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_edit.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			$_SESSION['ex2']="SELECT concat('$edit1',ID,'$edit2',' ','$detail1',ID,'$detail2'), code, description, cecodis, cout_tr, cout_tp, cout_vp, cout_sm, length FROM actes order by description";
			$title = $langfile["navigation_title_management_acte_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_acte_list.tpl");
			
			break;

		case "view":
	    	$title = $langfile["navigation_title_management_acte_view"];
			$acte = $acte->get($id);

			$template->assign("title", $title);
			$template->assign("acte", $acte);

			$template->display("template_management_acte_view.tpl");
			
			break;
		
		case "modulesearch":
			
			$actes = $acte->modulesearch($id,$value,$limit);
			
			$template->assign("actes", $actes);

			if ($type == 'complete') {
				$template->display("template_management_acte_gestion_complete_search.tpl");
			} else {
				if ($type == 'simple') {
					$template->display("template_management_acte_gestion_complete_search.tpl");
				} else {
					$template->display("template_management_acte_gestion_overlay_search.tpl");
				}
			}
						
			break;
			
		case "autocomplete":
			
			$actes = $acte->autocomplete($id,$value);
			
			break;
			
		default:
	    	$title = $langfile["navigation_title_management_acte_search"];
	
			$template->assign("title", $title);

			$template->display("template_management_acte_search.tpl");
	}

?>
