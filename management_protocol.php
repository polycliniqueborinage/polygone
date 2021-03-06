<?php

	require("./init.php");

		  if (!isset($_SESSION['userid'])) {
$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['management_protocol_adminstate']== null || $adminstate < $modules['management_protocol_adminstate']) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
	
	$POST_MAX_SIZE = ini_get('post_max_size');
	$POST_MAX_SIZE = $POST_MAX_SIZE . "B";
	
	$action = getArrayVal($_GET, "action");
	$id = getArrayVal($_GET, "id");
	$mode = getArrayVal($_GET, "mode");
	
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$value = utf8_decode(trim(getArrayVal($_POST, "value")));
	$limit = getArrayVal($_POST, "limit");

	// Download File
	$key = getArrayVal($_GET, "key");
	
	// Delete files
	$delete = getArrayVal($_POST, "delete");
	
	$mainclasses = array("user" => "user", "management_current" => "management_active", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("protocol" => "active");
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
	$group = (object) new group();
	$protocol = (object) new protocol();
	
	switch ($action) {
		
		// AJAX
		case "modulesearch":
			
			$edit_alt = $langfile["dico_management_protocol_edit_alt"];
			$detail_alt = $langfile["dico_management_protocol_detail_alt"];
			$delete_alt = $langfile["dico_management_protocol_delete_alt"];
			
			$export_html = $langfile["dico_management_protocol_export_html"];
			$export_pdf = $langfile["dico_management_protocol_export_pdf"];
			$export_rtf = $langfile["dico_management_protocol_export_rtf"];
			$export_txt = $langfile["dico_management_protocol_export_txt"];
						
			$protocols = $protocol->modulesearchfrommanager($id,$value,$limit);
			
			$template->assign("protocols", $protocols);
			$template->assign("edit_alt", $edit_alt);
			$template->assign("detail_alt", $detail_alt);
			$template->assign("delete_alt", $delete_alt);
			$template->assign("export_html", $export_html);
			$template->assign("export_pdf", $export_pdf);
			$template->assign("export_rtf", $export_rtf);
			$template->assign("export_txt", $export_txt);

			$template->display("template_management_gestion_complete_search.tpl");
			
			break;

		// AJAX
		case "delete":
			$action = $id;
			$result = $protocol->delete($id);
			if ($result) {
				$mylog->add('protocol','delete',$action);
	       	}
			
			break;
			
		case "add":

			$title = $langfile["navigation_title_management_protocol_add"];
			$groups = $group->getGroups(1, 10000);
			$protocol = Array();
			$protocol['date'] = date("d/m/Y");
			$protocol["user_recipient2_display"] = "none";
			$protocol["user_recipient3_display"] = "none";
			$protocol["user_recipient4_display"] = "none";
			$protocol["user_recipient5_display"] = "none";
			$template->assign("title", $title);
			$template->assign("protocol", $protocol);
			$template->assign("groups", $groups);
			$template->display("template_management_protocol_add.tpl");
			
	    break;

		case "edit":

			$title = $langfile["navigation_title_management_protocol_edit"];
			$groups = $group->getGroups(1, 10000);
			$i = 0;
		    if (!empty($groups)) {
                foreach ($groups as $group) {
                    if (chkgroupforprotocol($id, $group["ID"])) {
                        $chk = 1;
                    } else {
                        $chk = 0;
                    }
                    $groups[$i]['assigned'] = $chk;
                    $i = $i + 1;
                }
            }
			$protocolFiles 	= $protocol->getProtocolFiles($id);
			$protocol = $protocol->get($id);
			
			$template->assign("title", $title);
			$template->assign("protocol", $protocol);
			$template->assign("protocol_files", $protocolFiles);
			$template->assign("groups", $groups);
			$template->assign("groups_assigned", $groups_assigned);
			
			$template->display("template_management_protocol_add.tpl");
			
	    break;
	    
		case "autosubmit":
			
			

	        break;

	 	case "submit":
			
			// Delete unused file
			foreach ($delete as $reportFileID) {
				$result = $protocol->deleteFile($reportFileID);
			}
			
			$id = getArrayVal($_POST, "id");
			$date = getArrayVal($_POST, "date");
			$patientID = getArrayVal($_POST, "patient_id");
			$userSenderID = getArrayVal($_POST, "user_sender_id");
			$userRecipient1ID = getArrayVal($_POST, "user_recipient1_id");
			$userRecipient2ID = getArrayVal($_POST, "user_recipient2_id");
			$userRecipient3ID = getArrayVal($_POST, "user_recipient3_id");
			$userRecipient4ID = getArrayVal($_POST, "user_recipient4_id");
			$userRecipient5ID = getArrayVal($_POST, "user_recipient5_id");
			$text = getArrayVal($_POST, "text");
			$assignto = getArrayVal($_POST, "assignto");
			
			$protocolID = $protocol->edit($date, $patientID, $userSenderID, $userRecipient1ID, $userRecipient2ID, $userRecipient3ID, $userRecipient4ID, $userRecipient5ID, $text, $id);
			
			// assign group
			foreach ($assignto as $group) {
				$protocol->assign($protocolID, $group);
		  	}
		  	
			// add files
		  	while (list ($k, $v) = each ($_FILES['file']['name'])) {
				if ($_FILES['file']['name'][$k] != ''){
					echo "add file ".$_FILES['file']['name'][$k];
					//The original name of the file on the client machine
					$file_name = $_FILES['file']['name'][$k];
					//The mime type of the file
					$file_type = $_FILES['file']['type'][$k];
			 	    $file_extension = substr($file_name, strrpos($file_name, '.') + 1);
					//The size, in bytes, of the uploaded file. 
					$file_size = $_FILES['file']['size'][$k];
					//The size, in bytes, of the uploaded file. 
					$file_tmpname = $_FILES['file']['tmp_name'][$k];
	        		$file_error = $_FILES['file']['error'][$k];
	        		//generate unique key
	        		$key = md5(uniqid (rand (),true));
	        		$result = $protocol->addFile($key, $protocolID, $file_name, $file_extension, $file_size, $file_type, $file_tmpname);
	        		$mylog->add('protocol','add','add file');
				}
			}
		  	
		  	//$mylog->add('protocol','add','');
			$loc = $url . "management_protocol.php?action=view&mode=edited&id=" . $protocolID;
	        header("Location: $loc");

	        break;
		
		case "list":

			$edit_alt = $langfile["dico_management_protocol_edit_alt"];
			$detail_alt = $langfile["dico_management_protocol_detail_alt"];
			
			$tool_html_alt = $langfile["dico_management_protocol_export_html"];
			$tool_pdf_alt = $langfile["dico_management_protocol_export_pdf"];
			$tool_rtf_alt = $langfile["dico_management_protocol_export_rtf"];
			$tool_txt_alt = $langfile["dico_management_protocol_export_txt"];
			$tool_xml_alt = $langfile["dico_management_protocol_export_xml"];
			
			$detail1 = "<a onclick=\"javascript=viewProtocol(";
			$detail2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-view-hover.png\" alt=\"".$detail_alt."\" title=\"".$detail_alt."\" border=\"0\" /></a>";
			
			$edit1 = "<a onclick=\"javascript=editProtocol(";
			$edit2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-edit-hover.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";

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
			
			// TODO 2->5
			$sql = "SELECT concat('$edit1',pr.ID,'$edit2',' ','$detail1',pr.ID,'$detail2'), LOWER(CONCAT(pa.nom, ' ', pa.prenom, ' - ', date_format(pa.date_naissance, '%d/%m/%Y'))), LOWER(CONCAT(uss.firstname, ' ', uss.familyname)), LOWER(CONCAT(usr1.familyname, ' ', usr1.firstname,' ',usr2.familyname, ' ', usr2.firstname)), CONCAT('<div style=display:none>',pr.date,'</div>',date_format(pr.date, '%d/%m/%Y')), concat('$tool_html1',pr.ID,'$tool_html2',' ','$tool_pdf1',pr.ID,'$tool_pdf2',' ','$tool_word1',pr.ID,'$tool_word2',' ','$tool_xml1',pr.ID,'$tool_xml2') FROM protocol pr, patients pa, user uss, user usr1, user usr2, user usr3, user usr4, user usr5 WHERE pr.patient_ID = pa.id AND pr.user_sender_ID = uss.ID AND pr.user_recipient1_ID = usr1.ID AND pr.user_recipient2_ID = usr2.ID AND pr.user_recipient3_ID = usr3.ID AND pr.user_recipient4_ID = usr4.ID AND pr.user_recipient5_ID = usr5.ID ORDER BY pa.nom";
			
			
			$_SESSION['protocollist']=$sql;

			$title = $langfile["navigation_title_management_protocol_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_protocol_list.tpl");
		break;

		case "view":

			$title = $langfile["navigation_title_management_protocol_view"];
			$protocolFiles 	= $protocol->getProtocolFiles($id);
			$protocol = $protocol->getContent($id);
			$template->assign("title", $title);
			$template->assign("protocol", $protocol);
			$template->assign("protocol_files", $protocolFiles);
			$template->assign("id", $id);
			$template->assign("mode", $mode);
			$template->display("template_management_protocol_view.tpl");
			
		break;

		case "download_file":
			$protocol->getFile($key);
			
		break;
		
		
	    default:

	    	$title = $langfile["navigation_title_management_protocol_search"];
	
			$template->assign("title", $title);

			$template->display("template_management_protocol_search.tpl");
	}

?>
