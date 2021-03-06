<?php
//
	require("./init.php");

		  if (!isset($_SESSION['userid'])) {
$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
	
	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['user_sumehr_adminstate']== null || $adminstate < $modules['user_sumehr_adminstate']) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
	
	ini_set('upload_max_filesize', '20M');
   	ini_set('post_max_size', '20M');  
   	ini_set('max_input_time', 300);  
   	ini_set('max_execution_time', 300);  
   
	$POST_MAX_SIZE = ini_get('post_max_size');
	$POST_MAX_SIZE = $POST_MAX_SIZE . "B";
	
	$UPLOAD_MAX_FILESIZE = ini_get('upload_max_filesize');
	$UPLOAD_MAX_FILESIZE = $UPLOAD_MAX_FILESIZE . "B";
	
	// Post param
	$action 			= getArrayVal($_GET, "action");
	$patientID 			= getArrayVal($_GET, "patient_id");
	$examenID 			= getArrayVal($_GET, "examen_id");
	$userID 			= getArrayVal($_GET, "user_id");
	$reportID 			= getArrayVal($_GET, "report_id");
	$delete 			= getArrayVal($_POST, "delete");
	$mode 				= getArrayVal($_GET, "mode");
	$format 			= getArrayVal($_GET, "format");
	
	// SEARCH
	$searchType 		= getArrayVal($_POST, "search_type");
	$searchValue 		= utf8_decode(trim(getArrayVal($_POST, "search_value")));
	$searchPatientID 	= utf8_decode(trim(getArrayVal($_POST, "search_patient_id")));
	$searchPatient 		= utf8_decode(trim(getArrayVal($_POST, "search_patient")));
	$searchDoctorID 	= utf8_decode(trim(getArrayVal($_POST, "search_doctor_id")));
	$searchDoctor 		= utf8_decode(trim(getArrayVal($_POST, "search_doctor")));
	$searchLimit 		= getArrayVal($_POST, "limit");
	
	// Download File
	$key 		= getArrayVal($_GET, "key");
	$thumbnail 	= getArrayVal($_GET, "thumbnail");
		
	$mainclasses = array("user" => "user_active", "management_current" => "management", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);

	$mainmenu = array("sumehr" => "active");
	$template->assign("mainmenu", $mainmenu);

	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass);
	} else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	//protocol webservice url
	if ($_SERVER['SERVER_NAME'] == 'localhost')
	$protocol_webservice_url="http://localhost:55555";
	else
	$protocol_webservice_url="https://protocol.polycliniqueborinage.org";

	$path_convert = "/usr/bin/convert ";
	$path_doc2pdf = "/usr/local/bin/doc2pdf ";
	
	// my log
	$mylog = (object) new mylog();
	$group = (object) new group();
	$sumehr = (object) new sumehr();
	$patient = (object) new patient();
	$user = (object) new user();
	$myfile = new datei();
	$exam = (object) new examen();
	
	switch ($action) {
		
		// AJAX CALL
		case "module_search":
			
			$sumehrs = $sumehr->modulesearchfromuser($userid,$searchValue,$searchLimit,$searchType);
			
			$template->assign("sumehrs", $sumehrs);
			
			$template->display("template_user_gestion_complete_search.tpl");
			
			break;

		case "edit": 
			
			$title = $langfile["navigation_title_user_sumehr_edit"];
			
			if ($patientID!='') {

				$sumehrReport 			= $sumehr->getReport($reportID,$userID,$userid);
				$sumehrReport['date'] 	= date('d/m/Y');
				$sumehrReportFiles 		= $sumehr->getReportFile($reportID);
				$sumehr					= $sumehr->get($patientID,$userid);
				$patient 				= $patient->get($patientID);
				$user					= $user->getProfile($userid);
				
				$template->assign("title", $title);
				$template->assign("patient", $patient);
				$template->assign("user", $user);
				$template->assign("sumehr", $sumehr);
				$template->assign("sumehrReport", $sumehrReport);
				$template->assign("sumehrReportFiles", $sumehrReportFiles);
				
				$template->display("template_user_sumehr_add.tpl");
				
			}
			
	    break;

	   	case "submit":
   			
			// Delete unused file
   			foreach ($delete as $reportFileID) {
				$result = $sumehr->deleteFile($reportFileID);
			}
   			
			// Date
			$date = getArrayVal($_POST, "date");
			list($day, $month, $year) = explode('/', $date);
			$timestamp = mktime (date('H'), date('i'), 0, $month, $day, $year);
			$datetime = date('Y-m-d H:i:s',$timestamp);

			$id 			= getArrayVal($_POST, "id");
			$reportID 		= getArrayVal($_POST, "report_id");
			$patientID 		= getArrayVal($_POST, "patient_id");
			$userID 		= $userid;
			$text 			= getArrayVal($_POST, "text");
			$assignto 		= getArrayVal($_POST, "assignto");
			
			if ($id!=''){
				// Udpate Dossier
				if ($reportID!=''){
					// Update Report
					$reportID = $sumehr->updateReport($id,$reportID,$datetime,$text);
				} else {
					echo "add report";
					// Add report
					$reportID = $sumehr->addReport($id,$datetime,$text);
		  			$mylog->add('sumehr','add','create report');
				}	
			} else {
				// Create dossier
				$id = $sumehr->add($patientID,$userID);
				$reportID = $sumehr->addReport($id,$datetime,$text);
		  		$mylog->add('sumehr','add','create dossier');
		  		$mylog->add('sumehr','add','create report');
			}
			
			// Unassign all group
			$sumehr->unAssignAll($reportID);
			
			// assign group
			$user 				= $user->getProfile($userid);
			$default_group 		= unserialize($user['default_group']);
			foreach ($default_group as $group) {
				$sumehr->assign($reportID, $group);
		  	}
			
			while (list ($k, $v) = each ($_FILES['file']['name'])) {
				
				if ($_FILES['file']['name'][$k] != ''){
					//The original name of the file on the client machine
					$file_name = $_FILES['file']['name'][$k];
					//The mime type of the file
					$file_type = $_FILES['file']['type'][$k];
			 	    $file_extension = substr($file_name, strrpos($file_name, '.') + 1);
					//The size, in bytes, of the uploaded file. 
					$file_size = $_FILES['file']['size'][$k];
					//The size, in bytes, of the uploaded file. 
					$file_tmpname = $_FILES['file']['tmp_name'][$k];
					
					echo "<br>new file".$file_tmpname;
					
	        		$file_error = $_FILES['file']['error'][$k];
	        		//generate unique key
	        		$key = md5(uniqid (rand (),true));
	        		
	        		echo "<br>".$file_tmpname_jpg;
	        		
	        		// file uploaded
	        		if (file_exists($file_tmpname)) {
					
	        		echo "<br>file exist";
	        		
	        			if(move_uploaded_file($file_tmpname, '/tmp/php/files/upload.pdf')) {
    						echo "The file has been uploaded";
						} else{
    						echo "There was an error uploading the file, please try again!";
						}
	        			
	        			// by default no thumbnail
	        			$thumbnail1_path = null;
	        			$thumbnail2_path = null;
	        			$thumbnail3_path = null;
	        			
	        			switch ($file_extension) {

							case "pdf":
								
								echo "<br>pdf";
								
								// first thumbnail
								$file_tmpname_jpg = "/tmp/php/files/upload_1.jpg";
	        					$cmd = $path_convert." /tmp/php/files/upload.pdf[0] -colorspace RGB -geometry 600 ".$file_tmpname_jpg;
	        					exec($cmd, $output, $error);
								if (file_exists($file_tmpname_jpg)) {
									$thumbnail1 = new thumbnail($file_tmpname_jpg);
									$thumbnail1_path = "/tmp/php/files/upload_thumb_1.jpg";
									$thumbOptions = array('width'=>500);
									$thumbnail1->createThumb($thumbOptions,$thumbnail1_path);
                				}
                				unlink($file_tmpname_jpg);
                				
                				// second thumbnail
								$file_tmpname_jpg = "/tmp/php/files/upload_2.jpg";
                				$cmd = $path_convert." /tmp/php/files/upload.pdf[1] -colorspace RGB -geometry 600 ".$file_tmpname_jpg;
                				exec($cmd, $output, $error);
                				if (file_exists($file_tmpname_jpg)) {
		        					echo "<br>create thumb";
		        					$thumbnail2 = new thumbnail($file_tmpname_jpg);
									$thumbnail2_path = "/tmp/php/files/upload_thumb_2.jpg";
									$thumbOptions = array('width'=>500);
									$thumbnail2->createThumb($thumbOptions,$thumbnail2_path);
                				}
                				unlink($file_tmpname_jpg);
                				
                				
                				// second thumbnail
								$file_tmpname_jpg = "/tmp/php/files/upload_3.jpg";
                				$cmd = $path_convert." /tmp/php/files/upload.pdf[2] -colorspace RGB -geometry 600 ".$file_tmpname_jpg;
                				exec($cmd, $output, $error);
                				if (file_exists($file_tmpname_jpg)) {
		        					echo "<br>create thumb";
		        					$thumbnail3 = new thumbnail($file_tmpname_jpg);
									$thumbnail3_path = "/tmp/php/files/upload_thumb_3.jpg";
									$thumbOptions = array('width'=>500);
									$thumbnail3->createThumb($thumbOptions,$thumbnail3_path);
                				}
                				unlink($file_tmpname_jpg);
                				
                				
                				
	        				break;
	        				
	        				case "jpg":
	        				case "jpeg":
	        					$thumbnail1 = new thumbnail($file_tmpname);
								$thumbnail1_path = $file_tmpname.'_thumb1';
								$thumbOptions = array('width'=>100);
								$thumbnail1->createThumb($thumbOptions,$thumbnail1_path);
	        				break;
	        				
	        			}
					
					}
					
	        		//save db
	        		// key - reportID - sumher_id - name - extension - size - type - file
	        		$result = $sumehr->addFile($key, $reportID, $file_name, $file_extension, $file_size, $file_type, '/tmp/php/files/upload.pdf',$thumbnail1_path,$thumbnail2_path,$thumbnail3_path);
					$mylog->add('sumehr','add','add file');
				}
        		
			}
			
			$mylog->add('sumehr','add','report');
			$loc = $url . "user_sumehr.php?action=view&mode=edited&patient_id=" . $patientID;
	        header("Location: $loc");

	  	break;
	  	
	  	case "view_report":
			
	  		$sumehrReport 			= $sumehr->getReport($reportID,$userID,$userid);
	  		if($sumehrReport) {
		  		$sumehrFiles 			= $sumehr->getReportFile($reportID);
		  		if (!$sumehrFiles) unset ($sumehrFiles);
		  		$sumehrPermissions 		= $sumehr->getReportPermission($reportID);
		  		$template->assign("sumehr_report", $sumehrReport);
				$template->assign("sumehr_files", $sumehrFiles);
				$template->assign("sumehr_permission", $sumehrPermissions);
				$template->display("template_user_sumehr_report_view.tpl");
	  		}
			
		break;
	  	
	  	case "json_view":
			$examp 	= $_REQUEST["q"]; //query number
			$page 	= $_REQUEST['page']; // get the requested page
			$limit 	= $_REQUEST['rows']; // get how many rows we want to have into the grid
			$sidx 	= $_REQUEST['sidx']; // get index row - i.e. user click to sort
			$sord 	= $_REQUEST['sord']; // get the direction
			
			if($sidx == '') $sidx = 'id';
			if($sord == '') $sidx = 'ASC';
			
			// search on
			$searchOn = $_REQUEST['_search'];
			
			// filter
			$filterOn = $_REQUEST['filters'];
			
			$search_id	 			= $_REQUEST['id'];
			$search_user	 		= $_REQUEST['user'];
			$search_doctor 			= $_REQUEST['doctor'];
			$search_protocole_date	= $_REQUEST['protocole_date'];
			
			    // add simple search
		    if ($search_id != "") {
		        $wh .= "AND id like '%".$search_id."%'";
		    }
			if ($search_user != "") {
		        $wh .= "AND user like '%".$search_user."%'";
		    }		    
			if ($search_doctor != "") {
		        $wh .= "AND doctor like '%".$search_doctor."%'";
		    }
			if ($search_protocole_date != "") {
		        $wh .= "AND protocole_date like '%".$search_protocole_date."%'";
		    }
		    	
			// pagination
			$count = $sumehr->count($wh, $userid, $patientID);
			$total_pages = ($count > 0) ? ceil($count/$limit) : 0;
			$page = ($page > $total_pages) ? $total_pages : $page;
			$start = $limit * $page - $limit;			
			$start = ($start < 0) ? 0 : $start;
			
			//$sqlglobal= "select * FROM user WHERE ".$wh." ORDER BY ".$sidx." ".$sord." LIMIT ".$start.",".$limit;
			$sqlglobal = "SELECT DISTINCT pr.ID as id, LOWER(CONCAT(uss.firstname, ' ', uss.familyname)) as user, LOWER(CONCAT(usr1.familyname, ' ', usr1.firstname,' ',usr2.familyname, ' ', usr2.firstname,' ',usr3.familyname, ' ', usr3.firstname,' ',usr4.familyname, ' ', usr4.firstname,' ',usr5.familyname, ' ', usr5.firstname)) as doctor, date_format(pr.date, '%d/%m/%Y') as protocole_date FROM protocol pr, user uss, user usr1, user usr2, user usr3, user usr4, user usr5, protocol_assigned pr_a, `group` gr, group_assigned gr_a WHERE gr_a.user ='$userid' AND pr.patient_ID = '$patientID' AND pr.user_sender_ID = uss.ID AND pr.user_recipient1_ID = usr1.ID AND pr.user_recipient2_ID = usr2.ID AND pr.user_recipient3_ID = usr3.ID AND pr.user_recipient4_ID = usr4.ID AND pr.user_recipient5_ID = usr5.ID AND pr_a.protocol = pr.ID AND pr_a.group = gr_a.group ".$wh." ORDER BY ".$sidx." ".$sord;
			
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $count;
			
			$responce->rows = $sumehr->get_json($sqlglobal,$langfile,'user_sumehr.php');
			
			echo json_encode($responce);
			
		break;
		
		case "view":
			
			$title = $langfile["navigation_title_user_sumehr_view"];
			
			// Protocol
			$tool_html_alt = $langfile["dico_sumehr_export_html"];
			$tool_pdf_alt = $langfile["dico_sumehr_export_pdf"];
			$tool_rtf_alt = $langfile["dico_sumehr_export_rtf"];
			$tool_txt_alt = $langfile["dico_sumehr_export_txt"];
			$tool_xml_alt = $langfile["dico_sumehr_export_xml"];
			$tool_html1 = "<a onclick=\"javascript=exportProtocol(";
			$tool_html2 = ",\'html\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-html-hover.png\" alt=\"".$tool_html_alt."\" title=\"".$tool_html_alt."\" border=\"0\" /></a>";
			$tool_pdf1 = "<a onclick=\"javascript=exportProtocol(";
			$tool_pdf2 = ",\'pdf\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-pdf-hover.gif\" alt=\"".$tool_pdf_alt."\" title=\"".$tool_pdf_alt."\" border=\"0\" /></a>";
			$tool_word1 = "<a onclick=\"javascript=exportProtocol(";
			$tool_word2 = ",\'rtf\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-word-hover.png\" alt=\"".$tool_rtf_alt."\" title=\"".$tool_rtf_alt."\" border=\"0\" /></a>";
			$tool_txt1 = "<a onclick=\"javascript=exportProtocol(";
			$tool_txt2 = ",\'txt\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-txt-hover.png\" alt=\"".$tool_txt_alt."\" title=\"".$tool_txt_alt."\" border=\"0\" /></a>";
			$tool_xml1 = "<a onclick=\"javascript=exportProtocol(";
			$tool_xml2 = ",\'xml\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-xml-hover.png\" alt=\"".$tool_xml_alt."\" title=\"".$tool_xml_alt."\" border=\"0\" /></a>";
			$sql = "SELECT DISTINCT pr.ID, LOWER(CONCAT(uss.firstname, ' ', uss.familyname)), LOWER(CONCAT(usr1.familyname, ' ', usr1.firstname,' ',usr2.familyname, ' ', usr2.firstname,' ',usr3.familyname, ' ', usr3.firstname,' ',usr4.familyname, ' ', usr4.firstname,' ',usr5.familyname, ' ', usr5.firstname)), CONCAT('<div style=display:none>',pr.date,'</div>',date_format(pr.date, '%d/%m/%Y')), concat('$tool_html1',pr.ID,'$tool_html2',' ','$tool_pdf1',pr.ID,'$tool_pdf2',' ','$tool_word1',pr.ID,'$tool_word2',' ','$tool_xml1',pr.ID,'$tool_xml2') FROM protocol pr, user uss, user usr1, user usr2, user usr3, user usr4, user usr5, protocol_assigned pr_a, `group` gr, group_assigned gr_a WHERE gr_a.user ='$userid' AND pr.patient_ID = $patientID AND pr.user_sender_ID = uss.ID AND pr.user_recipient1_ID = usr1.ID AND pr.user_recipient2_ID = usr2.ID AND pr.user_recipient3_ID = usr3.ID AND pr.user_recipient4_ID = usr4.ID AND pr.user_recipient5_ID = usr5.ID AND pr_a.protocol = pr.ID AND pr_a.group = gr_a.group ";
			echo "<!--".$sql."-->";
			$_SESSION['sumehrlist'] = $sql;
			
			// Get all other sumher in my group
			$sumehrs = array();
			
			$sumehrGroup 		= $sumehr->getAll($patientID,$userid);
			//todo order
			
			// For each dossier
			foreach ((array) $sumehrGroup as $key => $val) {
				
				$sumehrs[$val['user_ID']] = $sumehr->getReports($patientID,$val['user_ID'],$userid);
				
				if ($sumehrs[$val['user_ID']]) {
					// For each report
					foreach ($sumehrs[$val['user_ID']] as $key2 => $val2) {
						// Get Files
						$sumehrs[$val['user_ID']][$key2]['files'] = $sumehr->getReportFile($val2['sumehr_report_id']);
						if (!$sumehrs[$val['user_ID']][$key2]['files']) unset ($sumehrs[$val['user_ID']][$key2]['files']);
						// Get Permission
						$sumehrs[$val['user_ID']][$key2]['permissions'] = $sumehr->getReportPermission($val2['sumehr_report_id']);
					}
				} else {
					unset($sumehrs[$val['user_ID']]);	
				}
				
			}
			
			//echo "<br/>".count($sumehrs);
			
			if (count($sumehrs)==0) {
				$patient 				= $patient->get($patientID);
				$user					= $user->getProfile($userid);
				$sumehrs[$userid] = array('0'=>array('user_id'=>$userid,'user_firstname'=>$user['firstname'],'user_familyname'=>$user['familyname'],'patient_firstname'=>$patient['patient_prenom'],'patient_familyname'=>$patient['patient_nom'],'patient_id'=>$patient['patient_id']));
			}
			
			$template->assign("user_id", $userid);
			$template->assign("patient_id", $patientID);
			$template->assign("sumehrs", $sumehrs);
			$template->display("template_user_sumehr_view.tpl");
			
		break;
	  	
		
		case "download_file":
			$sumehrs = $sumehr->getFile($key,$userID,$userid);
			die();
			
		break;
		
		case "download_image":
			$sumehrs = $sumehr->getImage($key,$thumbnail,$userID,$userid);
			die();
			
		break;
		
		
		// LIST			
		case "list":

			$edit_alt = $langfile["dico_management_sumehr_edit_alt"];
			$detail_alt = $langfile["dico_management_sumehr_detail_alt"];
			
			$tool_html_alt = $langfile["dico_management_sumehr_export_html"];
			$tool_pdf_alt = $langfile["dico_management_sumehr_export_pdf"];
			$tool_rtf_alt = $langfile["dico_management_sumehr_export_rtf"];
			$tool_txt_alt = $langfile["dico_management_sumehr_export_txt"];
			$tool_xml_alt = $langfile["dico_management_sumehr_export_xml"];
			
			$detail1 = "<a onclick=\"javascript=viewSumehr(";
			$detail2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-view-hover.png\" alt=\"".$detail_alt."\" title=\"".$detail_alt."\" border=\"0\" /></a>";
			
			$edit1 = "<a onclick=\"javascript=editSumehr(";
			$edit2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-edit-hover.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";

			$tool_html1 = "<a onclick=\"javascript=exportSumehr(";
			$tool_html2 = ",\'html\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-html-hover.png\" alt=\"".$tool_html_alt."\" title=\"".$tool_html_alt."\" border=\"0\" /></a>";

			$tool_pdf1 = "<a onclick=\"javascript=exportSumehr(";
			$tool_pdf2 = ",\'pdf\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-pdf-hover.gif\" alt=\"".$tool_pdf_alt."\" title=\"".$tool_pdf_alt."\" border=\"0\" /></a>";
			
			$tool_word1 = "<a onclick=\"javascript=exportSumehr(";
			$tool_word2 = ",\'rtf\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-word-hover.png\" alt=\"".$tool_rtf_alt."\" title=\"".$tool_rtf_alt."\" border=\"0\" /></a>";
			
			$tool_txt1 = "<a onclick=\"javascript=exportSumehr(";
			$tool_txt2 = ",\'txt\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-txt-hover.png\" alt=\"".$tool_txt_alt."\" title=\"".$tool_txt_alt."\" border=\"0\" /></a>";
			
			$tool_xml1 = "<a onclick=\"javascript=exportSumehr(";
			$tool_xml2 = ",\'xml\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-xml-hover.png\" alt=\"".$tool_xml_alt."\" title=\"".$tool_xml_alt."\" border=\"0\" /></a>";
			
			$sql = "SELECT concat('$edit1',p.id,'$edit2',' ','$detail1',p.id,'$detail2'), LOWER(CONCAT(p.nom, ' ', p.prenom)), CONCAT('<div style=display:none>',p.date_naissance,'</div>',date_format(p.date_naissance, '%d/%m/%Y')), date_format(MAX(sr.datetime), '%d/%m/%Y %h:%m'), concat('$tool_html1',s.ID,'$tool_html2',' ','$tool_pdf1',s.ID,'$tool_pdf2',' ','$tool_word1',s.ID,'$tool_word2',' ','$tool_xml1',s.ID,'$tool_xml2') FROM sumehr s, sumehr_report sr, patients p, user u WHERE s.patient_ID = p.id AND s.user_ID = u.ID GROUP BY sr.sumehr_ID ORDER BY p.nom";
			
			$_SESSION['sumehrlist']=$sql;
			
			$title = $langfile["navigation_title_user_protocol_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_user_sumehr_list.tpl");
		
			break;

		// GRID			
		case "grid":
			
			$edit_alt = $langfile["dico_management_sumehr_edit_alt"];
			$detail_alt = $langfile["dico_management_sumehr_detail_alt"];
			
			$tool_html_alt = $langfile["dico_management_sumehr_export_html"];
			$tool_pdf_alt = $langfile["dico_management_sumehr_export_pdf"];
			$tool_rtf_alt = $langfile["dico_management_sumehr_export_rtf"];
			$tool_txt_alt = $langfile["dico_management_sumehr_export_txt"];
			$tool_xml_alt = $langfile["dico_management_sumehr_export_xml"];
			
			$detail1 = "<a onclick=\"javascript=viewSumehr(";
			$detail2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-view-hover.png\" alt=\"".$detail_alt."\" title=\"".$detail_alt."\" border=\"0\" /></a>";
			
			$edit1 = "<a onclick=\"javascript=editSumehr(";
			$edit2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-edit-hover.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";

			$tool_html1 = "<a onclick=\"javascript=exportSumehr(";
			$tool_html2 = ",\'html\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-html-hover.png\" alt=\"".$tool_html_alt."\" title=\"".$tool_html_alt."\" border=\"0\" /></a>";

			$tool_pdf1 = "<a onclick=\"javascript=exportSumehr(";
			$tool_pdf2 = ",\'pdf\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-pdf-hover.gif\" alt=\"".$tool_pdf_alt."\" title=\"".$tool_pdf_alt."\" border=\"0\" /></a>";
			
			$tool_word1 = "<a onclick=\"javascript=exportSumehr(";
			$tool_word2 = ",\'rtf\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-word-hover.png\" alt=\"".$tool_rtf_alt."\" title=\"".$tool_rtf_alt."\" border=\"0\" /></a>";
			
			$tool_txt1 = "<a onclick=\"javascript=exportSumehr(";
			$tool_txt2 = ",\'txt\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-txt-hover.png\" alt=\"".$tool_txt_alt."\" title=\"".$tool_txt_alt."\" border=\"0\" /></a>";
			
			$tool_xml1 = "<a onclick=\"javascript=exportSumehr(";
			$tool_xml2 = ",\'xml\')\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-xml-hover.png\" alt=\"".$tool_xml_alt."\" title=\"".$tool_xml_alt."\" border=\"0\" /></a>";
			
			//$sql = " LOWER(CONCAT(p.nom, ' ', p.prenom)), CONCAT('<div style=display:none>',p.date_naissance,'</div>',date_format(p.date_naissance, '%d/%m/%Y')), date_format(MAX(sr.datetime), '%d/%m/%Y %h:%m'), concat('$tool_html1',s.ID,'$tool_html2',' ','$tool_pdf1',s.ID,'$tool_pdf2',' ','$tool_word1',s.ID,'$tool_word2',' ','$tool_xml1',s.ID,'$tool_xml2') FROM sumehr s, sumehr_report sr, patients p, user u WHERE s.patient_ID = p.id AND s.user_ID = u.ID GROUP BY sr.sumehr_ID ORDER BY p.nom";
			
			
			function Strip($value) {
				if(get_magic_quotes_gpc() != 0)
			  	{
			    	if(is_array($value))  
						if ( array_is_associative($value) )
						{
							foreach( $value as $k=>$v)
								$tmp_val[$k] = stripslashes($v);
							$value = $tmp_val; 
						}				
						else  
							for($j = 0; $j < sizeof($value); $j++)
			        			$value[$j] = stripslashes($value[$j]);
					else
						$value = stripslashes($value);
				}
				return $value;
			}
			function array_is_associative ($array) {
			    if ( is_array($array) && ! empty($array) )
			    {
			        for ( $iterator = count($array) - 1; $iterator; $iterator-- )
			        {
			            if ( ! array_key_exists($iterator, $array) ) { return true; }
			        }
			        return ! array_key_exists(0, $array);
			    }
			    return false;
			}
			
			$wh = "";
			$searchOn = Strip($_POST['_search']);
			if($searchOn=='true') {
				
				$fld = Strip($_POST['searchField']);
				//echo $fld;
				$fldata = Strip($_POST['searchString']);
				//echo $fldata;
				$foper = Strip($_POST['searchOper']);
				//echo $foper;
				
				// costruct where
				$wh .= " AND ".$fld;
				switch ($foper) {
					case "bw":
						$fldata .= "%";
						$wh .= " LIKE '".$fldata."'";
						break;
					case "eq":
						if(is_numeric($fldata)) {
							$wh .= " = ".$fldata;
						} else {
							$wh .= " = '".$fldata."'";
						}
						break;
					case "ne":
						if(is_numeric($fldata)) {
							$wh .= " <> ".$fldata;
						} else {
							$wh .= " <> '".$fldata."'";
						}
						break;
					case "lt":
						if(is_numeric($fldata)) {
							$wh .= " < ".$fldata;
						} else {
							$wh .= " < '".$fldata."'";
						}
						break;
					case "le":
						if(is_numeric($fldata)) {
							$wh .= " <= ".$fldata;
						} else {
							$wh .= " <= '".$fldata."'";
						}
						break;
					case "gt":
						if(is_numeric($fldata)) {
							$wh .= " > ".$fldata;
						} else {
							$wh .= " > '".$fldata."'";
						}
						break;
					case "ge":
						if(is_numeric($fldata)) {
							$wh .= " >= ".$fldata;
						} else {
							$wh .= " >= '".$fldata."'";
						}
						break;
					case "ew":
						$wh .= " LIKE '%".$fldata."'";
						break;
					case "cn":
						$wh .= " LIKE '%".$fldata."%'";
						break;
					default :
						$wh = "";
				}
			}
			//echo "where".$wh;

			$page = $_POST['page'];
			 
			// get how many rows we want to have into the grid - rowNum parameter in the grid  
			$limit = $_POST['rows'];  
			 
			// get index row - i.e. user click to sort. At first time sortname parameter - 
			// after that the index from colModel  
			$sidx = $_POST['sidx'];  
			 
			// sorting order - at first time sortorder  
			$sord = $_POST['sord'];  
			 
			// if we not pass at first time index use the first column for the index or what you want 
			if(!$sidx) $sidx =1;  
			 
			// connect to the MySQL database server  
			//$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error());  
			 
			// select the database  
			//mysql_select_db($database) or die("Error connecting to db.");  
			 
			// calculate the number of rows for the query. We need this for paging the result  
			$result = mysql_query("SELECT COUNT(*) AS count FROM patients WHERE 1=1 $wh");
			$row = mysql_fetch_array($result,MYSQL_ASSOC);  
			$count = $row['count'];  
			 
			// calculate the total pages for the query  
			if( $count > 0 ) {  
			              $total_pages = ceil($count/$limit);  
			} else {  
			              $total_pages = 0;  
			}  
			 
			// if for some reasons the requested page is greater than the total  
			// set the requested page to total page  
			if ($page > $total_pages) $page=$total_pages; 
			 
			// calculate the starting position of the rows  
			$start = $limit*$page - $limit; 
			 
			// if for some reasons start position is negative set it to 0  
			// typical case is that the user type 0 for the requested page  
			if($start <0) $start = 0;  
			 
			// the actual query for the grid data  
			$SQL = "SELECT
					concat('$edit1',p.id,'$edit2',' ','$detail1',p.id,'$detail2') AS patient_link, 
					p.id AS patient_id, 
					LOWER(CONCAT(p.nom, ' ', p.prenom)) AS patient, 
					p.date_naissance AS patient_date_naissance 
					FROM patients AS p WHERE 1=1 $wh ORDER BY $sidx $sord LIMIT $start , $limit";
			
			$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error());  
			 
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $count;
			$total = 0;
			$i=0;
			while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
				$total += $row[patient_id]; 
				$responce->rows[$i]['id']=$row[patient_id];
				$responce->rows[$i]['cell']=array(
					$row[patient_link],
					$row[patient],
					$row[patient_date_naissance],
					$row[patient_id]
				); 
				$i++;
			} 
			$responce->userdata['patient_id'] = $total; 
			$responce->userdata['patient_date_naissance'] = 'Totals:'; 
			
			echo json_encode($responce); 
			 
				
			break;
		
		case "load":
			switch ($format) {
				case "xml":
					$submit_url = $protocol_webservice_url."/sumehr.xml";
					$sumehr = $sumehr->getAllXML($id,$userid);
					$template->assign("submit_url", $submit_url);
					$template->assign("sumehr", $sumehr);
					$template->display("template_user_sumehr_submit_form.tpl");
				break;
				case "html":
					$submit_url = $protocol_webservice_url."/sumehr.html";
					$sumehrs = $sumehr->getAllXML($id,$userid);
					$template->assign("submit_url", $submit_url);
					$template->assign("sumehr", $sumehr);
					$template->display("template_user_sumehr_submit_form.tpl");
				break;
				case "pdf":
					$submit_url = $protocol_webservice_url."/sumehr.pdf";
					$sumehrs = $sumehr->getAllXML($id,$userid);
					$template->assign("submit_url", $submit_url);
					$template->assign("sumehr", $sumehr);
					$template->display("template_user_sumehr_submit_form.tpl");
				break;
				case "rtf":
					$submit_url = $protocol_webservice_url."/protocol.rtf";
					$sumehrs = $sumehr->getAllXML($id,$userid);
					$template->assign("submit_url", $submit_url);
					$template->assign("sumehr", $sumehr);
					$template->display("template_user_sumehr_submit_form.tpl");
				break;
				case "txt":
					$submit_url = $protocol_webservice_url."/protocol.txt";
					$sumehrs = $sumehr->getAllXML($id,$userid);
					$template->assign("submit_url", $submit_url);
					$template->assign("sumehr", $sumehr);
					$template->display("template_user_sumehr_submit_form.tpl");
				break;
			}

		break;

		// GLOBAL SEARCH
		case "global_search":
	    	//$title = $langfile["navigation_title_user_protocol_global_search"];
			//$template->assign("title", $title);
			//$template->display("template_user_protocol_global_search.tpl");
			
			break;
			
		case "module_analyse":
			$title = $langfile["dico_sumehr_menu_search_analyse"];
			$template->assign("title", $title);
			$template->display("template_user_sumehr_global_search_analyse.tpl");
			break;
		
		case "module_search_analyse":
			
			if ($searchPatient!='' or $searchDoctor!='') { 
				$analyses = $exam->modulesearch($searchPatient,$searchDoctor,$searchLimit);
				$template->assign("exams", $analyses); 
				$template->display("template_user_gestion_complete_search.tpl");
			}
			
			break;	
			
		case "view_analyse":
			
			$patient_id	= getArrayVal($_GET, "patient_id");
			$examen_id	= getArrayVal($_GET, "examen_id");
			
			$analyse = $exam->getResultats($patient_id,$examen_id);
			$nb_entries = count($analyse); 
			$template->assign("exams", $analyse);
			$template->assign("nb_entries", $nb_entries);
			$template->assign("patient_id", $patient_id);
			$template->assign("examen_id", $examen_id); 
			$template->display("template_user_sumehr_view_analyse.tpl");
			
			break;	
			
		case "print_analyse":
			require_once('./libraries/tcpdf/config/lang/eng.php');
			require_once('./libraries/tcpdf/tcpdf.php');

			$patient_id	= getArrayVal($_GET, "patient_id");
			$examen_id	= getArrayVal($_GET, "examen_id");
			
			$analyse = $exam->getResultats($patient_id,$examen_id);
			
            $trans = get_html_translation_table(HTML_ENTITIES);
    
			$textAnalyseCode		= strtr($langfile["dico_sumehr_tableheader_analyse_code"], 			$trans);
			$textAnalyseLabel		= strtr($langfile["dico_sumehr_tableheader_analyse_label"], 		$trans);
			$textAnalyseReference	= strtr($langfile["dico_sumehr_tableheader_analyse_reference_pdf"], $trans);
			$textAnalyseUnite		= strtr($langfile["dico_sumehr_tableheader_analyse_unite_pdf"], 	$trans);
			$textAnalyseInfo		= strtr($langfile["dico_sumehr_tableheader_analyse_info"], 			$trans);
			$textAnalyseResultat	= strtr($langfile["dico_sumehr_tableheader_analyse_resultat_pdf"], 	$trans);
            
            $header=array($annee2, $annee1, $delta, $deltaPourcentage,);
			
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('MariqueCalcus');
			$pdf->SetTitle(strtr($langfile["dico_sumehr_menu_view_analyse_pdf"], $trans));
			$pdf->SetSubject($analyse[0]["patient_prenom"].' '.$analyse[0]["patient_nom"].' - Dr '.$analyse[0]["medecin_prenom"].' '.$analyse[0]["medecin_nom"].' - '.$analyse[0]["examen_date"]);
			
			// set default header data
			$pdf->SetHeaderData('logonpb.png', 40, strtr($langfile["dico_sumehr_menu_view_analyse_pdf"], $trans), $analyse[0]["patient_prenom"].' '.$analyse[0]["patient_nom"].' - Dr '.$analyse[0]["medecin_prenom"].' '.$analyse[0]["medecin_nom"].' - '.$analyse[0]["examen_date"]);
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
			
			$prev_groupe = "";
			for($i=0; $i<count($analyse); $i++){
			
				if($analyse[$i]["groupe_label"] != $prev_groupe){
					if($i != 0){
						$htmltable .= "</table>";
						// output the HTML content
						$pdf->writeHTML($htmltable, true, 0, true, 0);
						$htmltable = "";
					}
					$pdf->AddPage();
					$pdf->Bookmark($analyse[$i]["groupe_label"], 0, 0);
					$pdf->Cell(0, 0, $analyse[$i]["groupe_label"], 1, 1, 'C');
					//$color = ($color == '#FEFFF1') ? '#FCF8DC' : '#FEFFF1';
					$htmltable = '<table border="1" cellspacing="2" cellpadding="2">
							<tr>
								<th bgcolor="#FEF0C9" align="center"><b>'.$textAnalyseCode.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$textAnalyseLabel.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$textAnalyseReference.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$textAnalyseUnite.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$textAnalyseInfo.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$textAnalyseResultat.'</b></th>
							</tr>';
				}
				
				
				// create some HTML content

					/*$lineTitle = '<br><h5><u>'.$comptes[$i]["numero"].' - '.$comptes[$i]["descr"].'</u></h5>';
					$pdf->writeHTML($lineTitle, true, 0, true, 0);*/
					
				$htmltable .= '<tr>';
				
				$prev_groupe = $analyse[$i]["groupe_label"];
					
					$analyseCode   	  = utf8_encode($analyse[$i]['analyse_code']); 
					$analyseLabel 	  = utf8_encode($analyse[$i]['analyse_label']);
					$analyseReference = utf8_encode($analyse[$i]['analyse_reference']);
					$analyseUnite     = utf8_encode($analyse[$i]['analyse_unite']);
					$analyseInfo      = utf8_encode($analyse[$i]['analyse_info']);
					$analyseResultat  = utf8_encode($analyse[$i]['analyse_resultat']);
		
					$htmltable .= '<td align="left"> '.$analyseCode.'</td>';
					$htmltable .= '<td align="left"> '.$analyseLabel.'</td>';
					$htmltable .= '<td align="right">'.$analyseReference.'</td>';
					$htmltable .= '<td align="right">'.$analyseUnite.'</td>';
					$htmltable .= '<td align="right">'.$analyseInfo.'</td>';
					$htmltable .= '<td align="right">'.$analyseResultat.'</td>';
				
				$htmltable .= '</tr>';
			
				}
				
				$htmltable .= "</table>";
				// output the HTML content
				$pdf->writeHTML($htmltable, true, 0, true, 0);
				$htmltable = "";
				
			// ---------------------------------------------------------
			//Close and output PDF document
			$pdf->Output('PDS_'.$analyse[0]["patient_prenom"].$analyse[0]["patient_nom"].'_Dr'.$analyse[0]["medecin_prenom"].$analyse[0]["medecin_nom"].'.pdf', 'I');
			
			break;	
			
		// PERSONAL SEARCH
		default:
	    	$title = $langfile["navigation_title_user_sumehr_personal_search"];
	
			$template->assign("title", $title);

			$template->display("template_user_sumehr_personal_search.tpl");
	}

?>
