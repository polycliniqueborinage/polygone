<?php

	require("./init.php");

	//if (!session_is_registered("userid")){
	if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
	
	$action = getArrayVal($_GET, "action");
	
	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['admin_people_user_adminstate']== null || $adminstate < $modules['admin_people_user_adminstate']) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
			
	$id = getArrayVal($_GET, "id");
	$mode = getArrayVal($_GET, "mode");
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$limit = getArrayVal($_POST, "limit");
	$value = strtolower(utf8_decode(trim(getArrayVal($_POST, "value"))));
	$letter = getArrayVal($_GET, "letter");
	
	$mainclasses = array("user" => "user", "management_current" => "management", "management_no_current" => "management", "admin" => "admin_active", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("user" => "active");
	$template->assign("mainmenu", $mainmenu);
		
	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass);
	}
	else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	$user = new user();
	$group = new group();
	$speciality = new speciality();
	
	switch ($action) {

		case "add":

			$name = getArrayVal($_POST, "name");
			$familyname = getArrayVal($_POST, "familyname");
			$firstname = getArrayVal($_POST, "firstname");
			$pass = getArrayVal($_POST, "pass");

			$assignto = getArrayVal($_POST, "assignto");
			$isadmin = getArrayVal($_POST, "isadmin");
			$sysloc = $settings["locale"];
			$admin = $isadmin;
			if (!isset($admin)){
	    	    $admin = 1;
	    	}
	    	$newid = $user->add($name, $pass, $familyname, $firstname, $admin, $sysloc);
	    	
	    	if ($newid) {
	    	    foreach ($assignto as $proj)
	    	    {
	    	        $group->assign($newid, $proj);
	    	    }
	    	   	header("Location: admin_people_user.php?mode=added");
	    	} else {
				header("Location: admin_people_user.php?mode=error1");
	    	}	
    	
	    	break;

		case "delete":
	    	if ($user->del($id)) {
	    		header("Location: admin_people_user.php?mode=deleted");
	    	}

	    	break;
		
	    case "edit":
			$title = $langfile['navigation_title_admin_people_user_edit'];
    		$languages_fin = array();
		    foreach($languages as $lang) {
	        $lang2 = $langfile[$lang];
	        $fin = countLanguageStrings($lang);
	
	        if (!empty($lang2))
	        {
	            $lang2 .= " (" . $fin . "%)";
	            $fin = array("val" => $lang, "str" => $lang2);
	        }
	        else
	        {
	            $lang2 = $lang . " (" . $fin . "%)";
	            $fin = array("val" => $lang, "str" => $lang2);
	        }
	        array_push($languages_fin, $fin);
	    }
	    $user = $user->getProfile($id);
	    $specialities = $speciality->getall();
	    
	    $template->assign("title", $title);
	    $template->assign("languages_fin", $languages_fin);
	    $template->assign("user", $user);
		$template->assign("specialities", $specialities);
	    
	    $template->display("template_admin_people_user_edit.tpl");
    		
	    break;

		case "submit":
		
			$name  = getArrayVal($_POST, "name");
			$newpass = getArrayVal($_POST, "newpass");
			$admin  = getArrayVal($_POST, "admin");
			$locale  = getArrayVal($_POST, "locale");
			$firstname = getArrayVal($_POST, "firstname");
			$familyname  = getArrayVal($_POST, "familyname");
			$birthday = getArrayVal($_POST, "birthday");
			$gender = getArrayVal($_POST, "gender");
			$email = getArrayVal($_POST, "email");
			$web = getArrayVal($_POST, "web");
			$company  = getArrayVal($_POST, "company");
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
			$comment = getArrayVal($_POST, "comment");
			$length_consult = getArrayVal($_POST, "length_consult");
			$type = getArrayVal($_POST, "type");
			$speciality = getArrayVal($_POST, "speciality");
			$inami = getArrayVal($_POST, "inami");
			$taux_acte = getArrayVal($_POST, "taux_acte");
			$taux_consultation = getArrayVal($_POST, "taux_consultation");
			$taux_prothese = getArrayVal($_POST, "taux_prothese");
			$textcomment = getArrayVal($_POST, "textcomment");
			$texthoraire = getArrayVal($_POST, "texthoraire");
				
		    $_SESSION['userlocale'] = $locale;
		    $_SESSION['username'] = $name;
	    
		    if (!empty($_FILES['userfile']['name'])) {
		    	
		    	$fname = $_FILES['userfile']['name'];
	    	    $typ = $_FILES['userfile']['type'];
	    	    $size = $_FILES['userfile']['size'];
	    	    $tmp_name = $_FILES['userfile']['tmp_name'];
	    	    $error = $_FILES['userfile']['error'];
	    	    $root = "./";
		        $desc = $_POST['desc'];
		        $teilnamen = explode(".", $fname);
		        $teile = count($teilnamen);
		        $workteile = $teile - 1;
		        $erweiterung = $teilnamen[$workteile];
		        $subname = "";
		        if ($typ != "image/jpeg" and $typ != "image/png" and $typ != "image/gif") {
		            $loc = $url . "admin_people_user.php?action=editform&id=$id";
		            header("Location: $loc");
	        	    die();
	    	    }
		        for ($i = 0; $i < $workteile; $i++) {
		            $subname .= $teilnamen[$i];
		        }
		        list($usec, $sec) = explode(' ', microtime());
		        $seed = (float) $sec + ((float) $usec * 100000);
		        srand($seed);
		        $randval = rand(1, 999999);
	
		        $subname = preg_replace("/[^-_0-9a-zA-Z]/", "_", $subname);
		        $subname = preg_replace("/\W/", "", $subname);
		        if (strlen($subname) > 200) {
		            $subname = substr($subname, 0, 200);
		        }
	
		        $fname = $subname . "_" . $randval . "." . $erweiterung;
		        
		        $datei_final = CL_ROOT . "/files/" . CL_CONFIG . "/avatar/" . $fname;
	
		        	        
		        if (move_uploaded_file($tmp_name, $datei_final)) {
		            $avatar = $fname;
		        }
	 
		        if ($user->submit_admin($id, $name, $locale, $firstname, $familyname, $birthday, $gender, $email, $web, $company, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $length_consult, $avatar, $admin, $type, $speciality, $inami, $taux_acte, $taux_prothese, $taux_consultation, $comment))
		        {
		            if ($newpass!='') {
		        		$user->admin_editpass($id, $newpass);
		            }
		            $loc = $url . "admin_people_user.php?id=$id&mode=edited";
		            header("Location: $loc");
		        }
		        
	   		} else {
		        if ($user->submit_admin($id, $name, $locale, $firstname, $familyname, $birthday, $gender, $email, $web, $company, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $length_consult, "",      $admin, $type, $speciality, $inami, $taux_acte, $taux_prothese, $taux_consultation, $comment))
		        {
		            if ($newpass!='') {
		                $user->admin_editpass($id, $newpass);
		            }
		        	$loc = $url . "admin_people_user.php?id=$id&mode=edited";
		            header("Location: $loc");
		        }
		        
	    	}
		break;
	
	
		case "list":
			
			$right0 = $langfile["dico_admin_people_user_no_login"];
			$right1 = $langfile["dico_admin_people_user_user"];
			$right3 = $langfile["dico_admin_people_user_manager"];
			$right4 = $langfile["dico_admin_people_user_manager_advanced"];
			$right5 = $langfile["dico_admin_people_user_admin"];
			
			$edit_alt = $langfile["dico_admin_people_user_edit_alt"];
			$detail_alt = $langfile["dico_admin_people_user_detail_alt"];
		
			$detail1 = "<a onclick=\"javascript=viewUser(";
			$detail2 = ",\'admin_people_user.php\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-view-hover.png\" alt=\"".$detail_alt."\" title=\"".$detail_alt."\" border=\"0\" /></a>";
			
			$edit1 = "<a onclick=\"javascript=editUser(";
			$edit2 = ",\'admin_people_user.php\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-edit-hover.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
						
			$authenificate1 = "<input type=\'checkbox\' ";
			$authenificate2 = " disabled=\'true\' />";
			
			$sql = "SELECT concat('$edit1',ID,'$edit2',' ','$detail1',ID,'$detail2'), name, firstname, familyname, concat(address1,' ',zip1,' ',city1), email, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE( admin, '0', '$right0' ),'1','$right1'),'3','$right3'),'4','$right4'),'5','$right5'), speciality, inami FROM user ORDER BY familyname, firstname WHERE ID!='0'";
				
			$_SESSION['userlist']=$sql;
			
			$title = $langfile["dico_admin_people_user_administration"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_admin_people_user_list.tpl");
			
		break;  

		case "json_user":
				
				$examp 	= $_REQUEST["q"]; //query number
				$page 	= $_REQUEST['page']; // get the requested page
				$limit 	= 15;//$_REQUEST['rows']; // get how many rows we want to have into the grid
				$sidx 	= $_REQUEST['sidx']; // get index row - i.e. user click to sort
				$sord 	= $_REQUEST['sord']; // get the direction
			
				$user_familyname	= $_REQUEST['familyname']; // get the search
				$user_name			= $_REQUEST['name']; // get the search
				$user_firstname		= $_REQUEST['firstname']; // get the search
			
				// search on
				$searchOn = $_REQUEST['_search'];
			
				// filter
				$filterOn = $_REQUEST['filters'];
					
					
				$wh = " 1 = 1 ";
			
				if($searchOn  || $filterOn) {
						
					$searchString = html_entity_decode ($_REQUEST['filters'], ENT_COMPAT | ENT_HTML401, 'ISO-8859-1');
						
					// add simple search
					if ($user_familyname) {
						$wh .= " AND familyname like '%".$user_familyname."%'";
					}
					if ($user_name) {
						$wh .= " AND name like '%".$user_name."%'";
					}
					if ($user_firstname) {
						$wh .= " AND firstname like '%".$user_firstname."%'";
					}
						
				}
			
				// pagination
				$count = $user->count($wh);
				$total_pages = ($count > 0) ? ceil($count/$limit) : 0;
				$page = ($page > $total_pages) ? $total_pages : $page;
				$start = $limit * $page - $limit;
				$start = ($start < 0) ? 0 : $start;
			
				//$sql = "SELECT p.ID, p.name, p.sail_price, p.stock as stock_minimum, ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock, REPLACE(CONCAT('+',ROUND(-1*(p.stock - SUM( pf.quantity * SIGN(pf.type) )),2)),'+-','-') as commande, REPLACE(CONCAT('+',ROUND(-1*(p.stock - SUM( pf.quantity * SIGN(pf.type) )) * p.sail_price,2)),'+-','-') as stock_sail_price FROM product p, product_flow pf WHERE p.ID = pf.product_ID AND ".$wh." GROUP BY p.ID HAVING commande <= 0";
				$sql = "SELECT ID, name, firstname, familyname, address1, zip1, city1, email, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE( admin, '0', '$right0' ),'1','$right1'),'3','$right3'),'4','$right4'),'5','$right5'), speciality, inami FROM `poly`.`user` WHERE ".$wh."  ORDER BY familyname, firstname";
				
				$_SESSION['userlist'] = $sql;
			
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
			
				$responce->rows = $user->get_json($sql, $langfile,'management_people_user.php');
		//echo $sql;
				echo json_encode($responce);
				
			break;
    
    	case "massassign":
	    	$groups = $_POST['groups'];
	    	$user = $_POST['id'];
	    	$allgroups = $group->getGroups(1, 10000);
	    	
	    	$allgpr = array();
	    	foreach($allgroups as $allgroup) {
	    	    array_push($allgpr, $allgroup[ID]);
	    	}
	    	
	    	if (!empty($allgpr) and !empty($groups)) {
	    	    $diff = array_diff($allgpr, $groups);
	    	} elseif (empty($groups)) {
	    	    $diff = $allgpr;
	    	}
	    	if (!empty($groups)) {
	        	foreach($groups as $ugroup) {
	            	if (!chkgroup($user, $ugroup)) {
					/*if($settings["mailnotify"]) {
						$usr = (object) new user();
						$tuser = $usr->getProfile($user);
			
						if (!empty($tuser["email"])) {
							//send email
							$themail = new emailer($settings);
							$themail->send_mail($tuser["email"], $langfile["groupassignedsubject"] , $langfile["groupassignedtext"] . "<a href = \"" . $url . "managegroup.php?action=showgroup&id=$group\">" . $url . "managegroup.php?action=showgroup&id=$group</a>");
						}
			    	}*/
	            	    $group->assign($user, $ugroup);
	            	}
	        	}
		    }
		    
		    if (!empty($diff)) {
	        foreach($diff as $mydiff) {
	        	$group->deassign($user, $mydiff);
	        }
	    }
	    header("Location: admin_people_user.php?mode=de-assigned");    	
   	
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
	    	$template->assign("user", $profile);
			$template->display("template_admin_people_user_detail.tpl");
		
			break;

		case "view":

			$title = $langfile['navigation_title_admin_people_user_view'];
			$users = $user->getAllUsersByLetter($letter);
			$groups = $group->getGroups(1, 10000);
			 
			$i2 = 0;
			
			if (!empty($users)) {
			
				foreach($users as $usr)  {
			
					$i = 0;
					$groups = $group->getGroups(1, 10000);
					if (!empty($groups)) {
						foreach ($groups as $grp) {
							if (chkgroup($usr["ID"], $grp["ID"])) {
								$chk = 1;
							} else {
								$chk = 0;
							}
							$groups[$i]['assigned'] = $chk;
							$i = $i + 1;
						}
					}
					$users[$i2]['groups'] = $groups;
					if (!empty($users[$i2]['lastlogin'])) {
						$users[$i2]["lastlogin"] = date("d.m.y / H:i:s", $users[$i2]['lastlogin']);
					}
					$groups = $group->getGroups(1, 10000);
					$i2 = $i2 + 1;
				}
			}
			 
			$template->assign("title", $title);
			$template->assign("mode", $mode);
			SmartyPaginate::assign($template);
			$template->assign("users", $users);
			$template->assign("groups", $groups);
			 
			$template->display("template_admin_people_user_view.tpl");
			break;	
			
		default:
		
   			$title = $langfile['navigation_title_admin_people_user_view'];
    		$users = $user->getAllUsers(10);
    		$groups = $group->getGroups(1, 10000);
	    
    		$i2 = 0;

    		if (!empty($users)) {

    			foreach($users as $usr)  {

		            $i = 0;
		            $groups = $group->getGroups(1, 10000);
		            if (!empty($groups)) {
		            	foreach ($groups as $grp) {
	                   		if (chkgroup($usr["ID"], $grp["ID"])) {
	                   			$chk = 1;
	                   		} else {
	                   			$chk = 0;
	                   		}
	                   		$groups[$i]['assigned'] = $chk;
	                   		$i = $i + 1;
		            	}
		            }
		            $users[$i2]['groups'] = $groups;
		            if (!empty($users[$i2]['lastlogin'])) {
		            	$users[$i2]["lastlogin"] = date("d.m.y / H:i:s", $users[$i2]['lastlogin']);
		            }
		            $groups = $group->getGroups(1, 10000);
		            $i2 = $i2 + 1;
    			}
	   	 	}		
	   	 	
			$template->assign("title", $title);
			$template->assign("mode", $mode);
		    SmartyPaginate::assign($template);
		    $template->assign("users", $users);
		    $template->assign("groups", $groups);
	    
			$template->display("template_admin_people_user_view.tpl");

}
?>