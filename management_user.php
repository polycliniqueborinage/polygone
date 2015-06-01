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
	$id = getArrayVal($_GET, "id");
	$mode = getArrayVal($_GET, "mode");
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$value = utf8_decode(trim(getArrayVal($_POST, "value")));
	$limit = getArrayVal($_POST, "limit");
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management_active", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("user" => "active");
	$template->assign("mainmenu", $mainmenu);

	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass);
	} else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	$user = new user();
	$speciality = new speciality();
	$mylog = (object) new mylog();
	$group = (object) new group();
	
	switch ($action) {

	    case "add":
	    	
			$title = $langfile['navigation_title_management_user_add'];
    		$languages_fin = array();
		    foreach($languages as $lang) {
		        $lang2 = $langfile[$lang];
		        $fin = countLanguageStrings($lang);
		        if (!empty($lang2)) {
		            $lang2 .= " (" . $fin . "%)";
		            $fin = array("val" => $lang, "str" => $lang2);
		        } else {
		            $lang2 = $lang . " (" . $fin . "%)";
		            $fin = array("val" => $lang, "str" => $lang2);
		        }
		        array_push($languages_fin, $fin);
	    	}
	    	$specialities = $speciality->getall();
	    	$groups = $group->getGroups(1, 10000);
	    
	    	$template->assign("title", $title);
	    	$template->assign("languages_fin", $languages_fin);
			$template->assign("specialities", $specialities);
			$template->assign("groups", $groups);
		
	    	$template->display("template_management_user_edit.tpl");
    		
	    break;
	    	
	    case "edit":
	    	
			$title = $langfile['navigation_title_management_user_edit'];
    		$languages_fin = array();
		    foreach($languages as $lang) {
		        $lang2 = $langfile[$lang];
		        $fin = countLanguageStrings($lang);
		        if (!empty($lang2)) {
		            $lang2 .= " (" . $fin . "%)";
		            $fin = array("val" => $lang, "str" => $lang2);
		        } else {
		            $lang2 = $lang . " (" . $fin . "%)";
		            $fin = array("val" => $lang, "str" => $lang2);
		        }
		        array_push($languages_fin, $fin);
	    	}
	    	$user = $user->getProfile($id);
	    	$specialities = $speciality->getall();
	    	$groups = $group->getGroups(1, 10000);
	    	$default_group = array_fill_keys(unserialize($user['default_group']), '1');
	    	if (!empty($groups)) {
            	foreach ($groups as $key=>$value) {
            		$groups[$key]['assigned'] = ($default_group[$groups[$key]['ID']] == 1) ? 1 : 0;
                }
            }
	    	
	    	$template->assign("title", $title);
	    	$template->assign("languages_fin", $languages_fin);
	    	$template->assign("user", $user);
			$template->assign("specialities", $specialities);
			$template->assign("groups", $groups);
			
	    	$template->display("template_management_user_edit.tpl");
    		
	    break;

		case "submit":
			
			$id = getArrayVal($_POST, "id");
			$firstname = getArrayVal($_POST, "firstname");
			$familyname  = getArrayVal($_POST, "familyname");
			$birthday = getArrayVal($_POST, "birthday");
			$gender = getArrayVal($_POST, "gender");
			$locale  = getArrayVal($_POST, "locale");
			$address1 = getArrayVal($_POST, "address1");
			$zip1city1 = getArrayVal($_POST, "zip1city1");
			$zip1 = substr($zip1city1,0,4);
			$city1 = trim(substr($zip1city1,4));
			$state1 = getArrayVal($_POST, "state1");
			$country1 = getArrayVal($_POST, "country1");
			$company  = getArrayVal($_POST, "company");
			$workphone = getArrayVal($_POST, "workphone");
			$privatephone = getArrayVal($_POST, "privatephone");
			$mobilephone = getArrayVal($_POST, "mobilephone");
			$fax = getArrayVal($_POST, "fax");
			$email = getArrayVal($_POST, "email");
			$web = getArrayVal($_POST, "web");
			$type = getArrayVal($_POST, "type");
			$speciality = getArrayVal($_POST, "speciality");
			$inami = getArrayVal($_POST, "inami");
			
			$agenda_slotminutes = getArrayVal($_POST, "agenda_slotminutes");
			$agenda_mintime = getArrayVal($_POST, "agenda_mintime");
			$agenda_maxtime = getArrayVal($_POST, "agenda_maxtime");
			$agenda_firsthour = getArrayVal($_POST, "agenda_firsthour");
			$agenda_sessionminutes = getArrayVal($_POST, "agenda_sessionminutes");
			$agenda_permission = getArrayVal($_POST, "agenda_permission");
			$assignto = getArrayVal($_POST, "assignto");
			
		    $_SESSION['userlocale'] = $locale;
		    $_SESSION['username'] = $name;
		    
			if ($id != '') {
				
				$user->manager_submit($id, $firstname, $familyname, $birthday, $gender, $email, $web, $company, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $type, $speciality, $inami, $agenda_slotminutes, $agenda_mintime, $agenda_maxtime, $agenda_firsthour, $agenda_sessionminutes, $agenda_permission, $assignto);
	        	$action = $firstname.' '.$familyname;
	        	$mylog->add('user','add',$action);
				$loc = $url . "management_user.php?action=detail&id=$id&mode=edited";
	            header("Location: $loc");
				
			} else {
				
				$id = $user->manager_add($firstname, $familyname);
	        	$user->manager_submit($id, $firstname, $familyname, $birthday, $gender, $email, $web, $company, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $type, $speciality, $inami, $agenda_slotminutes, $agenda_mintime, $agenda_maxtime, $agenda_firsthour, $agenda_sessionminutes, $agenda_permission, $assignto);
				$action = $firstname.' '.$familyname;
	        	$mylog->add('user','update',$action);
	        	$loc = $url . "management_user.php?action=detail&id=$id&mode=added";
	            header("Location: $loc");
				
	        }
	    
		break;
		
	
		case "list":
			
			$title = $langfile["navigation_title_management_user_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_user_list.tpl");
			
		break;
		
		case "json_user":
			
			$examp 	= $_REQUEST["q"]; //query number
			$page 	= $_REQUEST['page']; // get the requested page
			$limit 	= $_REQUEST['rows']; // get how many rows we want to have into the grid
			$sidx 	= $_REQUEST['sidx']; // get index row - i.e. user click to sort
			$sord 	= $_REQUEST['sord']; // get the direction

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
			
			// pagination
			$count = $user->count();
			$total_pages = ($count > 0) ? ceil($count/$limit) : 0;
			$page = ($page > $total_pages) ? $total_pages : $page;
			$start = $limit * $page - $limit;			
			$start = ($start < 0) ? 0 : $start;
			
			$sqlglobal= "select * FROM user WHERE ".$wh." ORDER BY ".$sidx." ".$sord." LIMIT ".$start.",".$limit;
			
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $count;
			
			$specialities = $speciality->gettable('fr');
			
			$responce->rows = $user->get_json($sqlglobal,$specialities,$langfile,'management_user.php');
			
			echo json_encode($responce);
			
		break;
		
		case "modulesearch":

			$users = $user->modulesearch($id,$value,$limit);
			$template->assign("users", $users);

			if ($type == 'complete') {
				$template->display("template_management_gestion_complete_search.tpl");
			} else {
				$template->display("template_management_gestion_simple_search.tpl");
			}
			
			break;
			
		case "autocomplete":
			
			$user->autocomplete($id,$value);
			
			break;

		case "detail":
		
			$profile = $user->getProfile($id);
	    	$template->assign("mode", $mode);
			$template->assign("user", $profile);
			$template->display("template_management_user_detail.tpl");
		
			break;
			
		default:
	    	$title = $langfile["navigation_title_management_user_search"];
	
			$template->assign("title", $title);

			$template->display("template_management_user_search.tpl");
	}

?>