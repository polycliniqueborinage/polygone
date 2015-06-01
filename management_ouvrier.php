<?php

	require("./init.php");

	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	$action = getArrayVal($_REQUEST, "action");
	$id = getArrayVal($_REQUEST, "id");
	$mode = getArrayVal($_GET, "mode");
	
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$limit = getArrayVal($_POST, "limit");
	$value = strtolower(utf8_decode(trim(getArrayVal($_POST, "value"))));

	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['management_ouvrier_adminstate']== null || $adminstate < $modules['management_ouvrier_adminstate']) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management_active", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("ouvrier" => "active");
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
	$ouvrier = (object) new ouvrier();
	
	switch ($action) {
		
		case "add":

			$title = $langfile["navigation_title_ouvrier_add"];
			
			$template->assign("title", $title);
			
			$template->display("template_management_ouvrier_add.tpl");
	    
			break;
	    
	    case "edit":
	    	
	    	$title   = $langfile["navigation_title_management_ouvrier_edit"];
	    	$ouvrier = $ouvrier->get($id);

			$template->assign("title", $title);
			$template->assign("ouvrier", $ouvrier);

	    	$template->display("template_management_ouvrier_add.tpl");

			break;
	    
		case "submit":
			
			$familyname  		= ucfirst(strtolower(getArrayVal($_POST, "familyname")));
			$firstname 			= ucfirst(strtolower(getArrayVal($_POST, "firstname")));
			$salaire_horaire 	= getArrayVal($_POST, "salaire_horaire");
			$bonus_recurrent 	= getArrayVal($_POST, "bonus_recurrent");
			$cout_recurrent  	= getArrayVal($_POST, "cout_recurrent");

			if ($id != '') {
				
				$result = $ouvrier->update($firstname, $familyname, $salaire_horaire, $bonus_recurrent, $cout_recurrent, $id);
					
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('ouvrier','update',$action);
					$loc = $url . "management_ouvrier.php?action=view&mode=edited&id=" .$id;
	        	    header("Location: $loc");
	       		}
				
			} else {
				
				$result = $ouvrier->add($firstname, $familyname, $salaire_horaire, $bonus_recurrent, $cout_recurrent);
	        	
				if ($result) {
					$action = $firstname." ".$familyname;
	        		$mylog->add('ouvrier','add',$action);
					$loc = $url . "management_ouvrier.php?action=view&mode=saved&id=" . $result;
	        	    header("Location: $loc");
	       		}
	       		
	        }

			break;
		
		case "list":
			
			$edit_alt = $langfile["dico_ouvrier_edit_alt"];
			$detail_alt = $langfile["dico_ouvrier_detail_alt"];
		
			$view1 = "<a onclick=\"javascript=viewOuvrier(";
			$view2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_comment.png\" alt=\"".$detail_alt."\" title=\"".$detail_alt."\" border=\"0\" /></a>";
			
			$edit1 = "<a onclick=\"javascript=editOuvrier(";
			$edit2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/img/16x16/user_edit.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			$sqlglobal= "select concat('$edit1',o.ID,'$edit2',' ','$view1',o.ID,'$view2'), o.nom, o.prenom, o.salaire_horaire, o.bonus_recurrent, o.cout_recurrent FROM ouvriers o";
			
			$_SESSION['ouvrierlist']=$sqlglobal;
			
			$title = $langfile["navigation_title_management_ouvrier_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_ouvrier_list.tpl");
			
		break;

		case "view":
	    	$title = $langfile["navigation_title_management_ouvrier_view"];
			$ouvrier = $ouvrier->get($id);

			$template->assign("mode", $mode);
			$template->assign("title", $title);
			$template->assign("ouvrier", $ouvrier);
			
			$template->display("template_management_ouvrier_view.tpl");
			
			break;
		
		case "updateorder":
			
			foreach ($_GET['worker'] as $position => $id) {
				$result = $ouvrier->updatePosition($position,$id);
			}

			break;
		
		case "ajax_detail":
			$result = $ouvrier->detail($id);
			break;
			
			
		case "delete":

			$ouvrier->delete($id);

			break;
			
		case "modulesearch":

			$ouvriers = $ouvrier->modulesearch($id,$value,$limit);
			
			$template->assign("ouvriers", $ouvriers);

			if ($type == 'complete') {
				$template->display("template_management_gestion_complete_search.tpl");
			} else {
				if ($type == 'simple') {
					$template->display("template_management_gestion_simple_search.tpl");
				} else {
				}
			}
			
			break;
			
	    default:
	    	
	    	$title = $langfile["navigation_title_management_ouvrier_search"];
	
			$template->assign("title", $title);

			$template->display("template_management_ouvrier_search.tpl");
	}

?>