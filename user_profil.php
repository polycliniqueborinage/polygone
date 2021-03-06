<?php

	require("./init.php");

	if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}

	$action = getArrayVal($_GET, "action");
	$mode = getArrayVal($_GET, "mode");

	$mainclasses = array("user" => "user_active", "management_current" => "management", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);

	$mainmenu = array("menu" => "","agenda" => "","profil" => "active", "message" =>"");
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

	$mylog = (object) new mylog();
	$user = (object) new user();

	switch ($action) {
	
		case "edit":
			
			$title = $langfile["navigation_title_user_profil_edit"];
			$languages_fin = array();
		    foreach($languages as $lang){
		    	$lang2 = $langfile[$lang];
		       	$fin = countLanguageStrings($lang);
		        if (!empty($lang2)){
		            $lang2 .= " (" . $fin . "%)";
		            $fin = array("val" => $lang, "str" => $lang2);
	       		} else {
		            $lang2 = $lang . " (" . $fin . "%)";
		            $fin = array("val" => $lang, "str" => $lang2);
	        	}
	        	array_push($languages_fin, $fin);
	    	}
			$profile = $user->getProfile($userid);
			$onlinelist = $user->getOnlinelist();
					    
	    	$template->assign("title", $title);
		    $template->assign("onlinelist", $onlinelist);
	    	$template->assign("languages_fin", $languages_fin);
		    $template->assign("user", $profile);
	    	$template->assign("mode", $mode);
		    
		    $template->display("template_user_profil_edit.tpl");
		break;
		
		
		
		case "submit":
			
			$name  = getArrayVal($_POST, "name");
			$oldpass = getArrayVal($_POST, "oldpass");
			$newpass = getArrayVal($_POST, "newpass");
			$repeatpass = getArrayVal($_POST, "repeatpass");
			$locale  = getArrayVal($_POST, "locale");
			$firstname = ucfirst(strtolower(getArrayVal($_POST, "firstname")));
			$familyname  = ucfirst(strtolower(getArrayVal($_POST, "familyname")));
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
			
			$agenda_slotminutes = getArrayVal($_POST, "agenda_slotminutes");
			$agenda_mintime = getArrayVal($_POST, "agenda_mintime");
			$agenda_maxtime = getArrayVal($_POST, "agenda_maxtime");
			$agenda_firsthour = getArrayVal($_POST, "agenda_firsthour");
			$agenda_sessionminutes = getArrayVal($_POST, "agenda_sessionminutes");
			
			// no error
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
		            $loc = $url . "user_profil.php?action=edit";
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
	        
	    	} else {
	    		$avatar = "";
	    	}
	    	
			if ($user->submit($userid, $name, $locale, $firstname, $familyname, $birthday, $gender, $email, $web, $company, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $avatar, $agenda_slotminutes, $agenda_mintime, $agenda_maxtime, $agenda_firsthour, $agenda_sessionminutes)) {
	        	$action = $user->getLogInfo($userid). " and change avatar";
	        	$mylog->add('profil','update',$action);
	        	if ( $oldpass!='' and $newpass!='' and $repeatpass!='' ) {
	                if ($user->editpass($userid, $oldpass, $newpass, $repeatpass)){
			            $loc = $url . "user_profil.php?action=view&mode=edited";
			            header("Location: $loc");
			            die();
	                } else {
			            $loc = $url . "user_profil.php?action=edit&mode=error4";
			            header("Location: $loc");
			            die();
	                }
	            }
	        	$loc = $url . "user_profil.php?action=view&mode=edited";
	        	header("Location: $loc");
	        }
	    
		break;
	
		
		case "vcard":
		    $theuser = $user->getProfile($userid);
		    $vCard = (object) new vCard($theuser["locale"]);
		    $vCard->setFirstName($theuser["firstname"]);
		    $vCard->setMiddleName('Mobil');
		    $vCard->setLastName($theuser["lastname"]);
		    $vCard->setEducationTitle('Doctor');
		    $vCard->setCompany($theuser["company"]);
		    $vCard->setDepartment('Product Placement');
		    $vCard->setJobTitle('CEO');
		    $vCard->setWorkStreet($theuser["address1"]);
		    $vCard->setWorkZIP($theuser["zip1"]);
		    $vCard->setWorkCity($theuser["city1"]);
		    $vCard->setWorkRegion($theuser["state1"]);
		    $vCard->setWorkCountry($theuser["country1"]);
		    $vCard->setPostalStreet($theuser["adress1"]);
		    $vCard->setPostalZIP($theuser["zip1"]);
		    $vCard->setPostalCity($theuser["city1"]);
		    $vCard->setPostalRegion($theuser["state"]);
		    $vCard->setPostalCountry($theuser["country1"]);
		    $vCard->setHomeZIP($theuser["zip"]);
		    $vCard->setHomeCity($theuser["adress2"]);
		    $vCard->setUrlWork($theuser["web"]);
		    $vCard->setEMail($theuser["email"]);
		    $vCard->outputFile('vcf');
		    header('Content-Type: text/x-vcard');
		    header('Content-Disposition: inline; filename=' . $theuser["name"] . '_' . date("d-m-Y") . '.vcf');
		    echo $vCard->getCardOutput();
		break;
		
		
		default:
			$title = $langfile["navigation_title_user_profil_view"];
			$profile = $user->getProfile($userid);
			$onlinelist = $user->getOnlinelist();
			
			$template->assign("title", $title);
			$template->assign("onlinelist", $onlinelist);
	    	$template->assign("user", $profile);
			$template->assign("mode", $mode);
			
			$template->display("template_user_profil_view.tpl");	
	}


?>




