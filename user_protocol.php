<?php

	require("./init.php");

	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	$action = getArrayVal($_GET, "action");
	$id = getArrayVal($_GET, "id");
	$mode = getArrayVal($_GET, "mode");
	$format = getArrayVal($_GET, "format");
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$value = utf8_decode(trim(getArrayVal($_POST, "value")));
	$limit = getArrayVal($_POST, "limit");
			
	$mainclasses = array("user" => "user_active", "management_current" => "management", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
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
	
	//protocol webservice url
	if ($_SERVER['SERVER_NAME'] == '192.168.100.123')
	$protocol_webservice_url="http://192.168.100.123:55555";
	else{ if ($_SERVER['SERVER_NAME'] == '192.168.100.200')
			$protocol_webservice_url="http://protocol.polycliniqueborinage.org";	
		  else
			$protocol_webservice_url="http://protocol.polycliniqueborinage.org";	
	}
	
	// my log
	$mylog = (object) new mylog();
	$group = (object) new group();
	$protocol = (object) new protocol();
	
	switch ($action) {
		
		// AJAX CALL
		case "modulesearch":
			
			$export_html = $langfile["dico_management_protocol_export_html"];
			$export_pdf = $langfile["dico_management_protocol_export_pdf"];
			$export_rtf = $langfile["dico_management_protocol_export_rtf"];
			$export_txt = $langfile["dico_management_protocol_export_txt"];
			$export_xml = $langfile["dico_management_protocol_export_xml"];
			
			$protocols = $protocol->modulesearchfromuser($userid,$value,$limit,$type);
			
			$template->assign("protocols", $protocols);
			$template->assign("export_html", $export_html);
			$template->assign("export_pdf", $export_pdf);
			$template->assign("export_rtf", $export_rtf);
			$template->assign("export_txt", $export_txt);
			$template->assign("export_xml", $export_xml);
			
			$template->display("template_user_gestion_complete_search.tpl");
			
			break;

		// LIST			
		case "list":

			$detail_alt = $langfile["dico_management_protocol_detail_alt"];
			
			$tool_html_alt = $langfile["dico_management_protocol_export_html"];
			$tool_pdf_alt = $langfile["dico_management_protocol_export_pdf"];
			$tool_rtf_alt = $langfile["dico_management_protocol_export_rtf"];
			$tool_txt_alt = $langfile["dico_management_protocol_export_txt"];
			$tool_xml_alt = $langfile["dico_management_protocol_export_xml"];
			
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
			
			$sql = "SELECT LOWER(CONCAT(pa.nom, ' ', pa.prenom, ' - ', date_format(pa.date_naissance, '%d/%m/%Y'))), LOWER(CONCAT(uss.firstname, ' ', uss.familyname)), LOWER(CONCAT(usr1.familyname, ' ', usr1.firstname,' ',usr2.familyname, ' ', usr2.firstname,' ',usr3.familyname, ' ', usr3.firstname,' ',usr4.familyname, ' ', usr4.firstname,' ',usr5.familyname, ' ', usr5.firstname)), CONCAT('<div style=display:none>',pr.date,'</div>',date_format(pr.date, '%d/%m/%Y')), concat('$tool_html1',pr.ID,'$tool_html2',' ','$tool_pdf1',pr.ID,'$tool_pdf2',' ','$tool_word1',pr.ID,'$tool_word2',' ','$tool_xml1',pr.ID,'$tool_xml2') FROM protocol pr, patients pa, user uss, user usr1, user usr2, user usr3, user usr4, user usr5 WHERE pr.patient_ID = pa.id AND pr.user_sender_ID = uss.ID AND pr.user_recipient1_ID = usr1.ID AND pr.user_recipient2_ID = usr2.ID AND pr.user_recipient3_ID = usr3.ID AND pr.user_recipient4_ID = usr4.ID AND pr.user_recipient5_ID = usr5.ID AND ( pr.user_recipient1_ID = '$userid' OR pr.user_recipient2_ID = '$userid' OR pr.user_recipient3_ID = '$userid' OR pr.user_recipient4_ID = '$userid' OR pr.user_recipient5_ID = '$userid' OR pr.user_sender_ID = '$userid' ) ORDER BY pa.nom";
			
			$_SESSION['protocollist']=$sql;

			$title = $langfile["navigation_title_user_protocol_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_user_protocol_list.tpl");
		
			break;
		
		case "load":
			switch ($format) {
				case "xml":
					$submit_url = $protocol_webservice_url."/protocol.xml";
					$protocol = $protocol->getXML($id);
					$template->assign("submit_url", $submit_url);
					$template->assign("protocol", $protocol);
					$template->display("template_management_protocol_submit_form.tpl");
				break;
				case "html":
					$submit_url = $protocol_webservice_url."/protocol.html";
					$protocol = $protocol->getXML($id);
					$template->assign("submit_url", $submit_url);
					$template->assign("protocol", $protocol);
					$template->display("template_management_protocol_submit_form.tpl");
				break;
				case "pdf":
					$submit_url = $protocol_webservice_url."/protocol.pdf";
					$protocol = $protocol->getXML($id);
					$template->assign("submit_url", $submit_url);
					$template->assign("protocol", $protocol);
					$template->display("template_management_protocol_submit_form.tpl");
				break;
				case "rtf":
					$submit_url = $protocol_webservice_url."/protocol.rtf";
					$protocol = $protocol->getXML($id);
					$template->assign("submit_url", $submit_url);
					$template->assign("protocol", $protocol);
					$template->display("template_management_protocol_submit_form.tpl");
				break;
				case "txt":
					$submit_url = $protocol_webservice_url."/protocol.txt";
					$protocol = $protocol->getXML($id);
					$template->assign("submit_url", $submit_url);
					$template->assign("protocol", $protocol);
					$template->display("template_management_protocol_submit_form.tpl");
				break;
			}

		break;

		// GLOBAL SEARCH
		case "global_search":
	    	$title = $langfile["navigation_title_user_protocol_global_search"];
	
			$template->assign("title", $title);

			$template->display("template_user_protocol_global_search.tpl");
			
			break;
			
		// PERSONAL SEARCH
		// SHOW ONLY DOCUMENT CREATE BY ME OR SEND TO ME
		default:
	    	$title = $langfile["navigation_title_user_protocol_personal_search"];
	
			$template->assign("title", $title);

			$template->display("template_user_protocol_personal_search.tpl");
	}

?>
