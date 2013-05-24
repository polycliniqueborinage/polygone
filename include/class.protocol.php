<?php
/**
 * Provides methods to interact with users
 *
 * @author Open Dynamics <info@o-dyn.de>
 * @name user
 * @version 0.4.7
 * @package Collabtive
 * @link http://www.o-dyn.de
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License v3 or laterg
 */
class protocol
{
    public $mylog;
    
    /**
     * Konstruktor
     * Initialisiert den Eventlog
     */
    function __construct() {
        $this->mylog = new mylog;
    }

    /**
     * Edit protocol (add or update)
     *
     */
    function edit($date, $patientID, $userSenderID, $userRecipient1ID, $userRecipient2ID, $userRecipient3ID, $userRecipient4ID, $userRecipient5ID, $text, $id) {
    	
    	if ($id != '') {
    		// Delete old assigned group
	    	$sql = "DELETE FROM protocol_assigned WHERE protocol=$id";
    		$del = mysql_query($sql);
    	}
    	
    	// Current date
    	$currentDate = date ("Y-m-d");
    	$currentTime = date ("h:i");
		
		// Consultation date
        $date = mysql_real_escape_string($date);
        $date_day = strtok($date,"/");
		$date_month = strtok("/");
		$date_year = strtok("/");
		$date = $date_year."-".$date_month."-".$date_day;
		
		echo $text.'<br/>';
		
		// Insert or update metadata
		if ($id !='') {
			$sql = "UPDATE protocol set date='$date', patient_ID='$patientID', user_sender_ID='$userSenderID', user_recipient1_ID='$userRecipient1ID', user_recipient2_ID='$userRecipient2ID', user_recipient3_ID='$userRecipient3ID', user_recipient4_ID='$userRecipient4ID', user_recipient5_ID='$userRecipient5ID' WHERE ID=$id";
			echo $sql;
			$upd = mysql_query($sql);
		} else {
			$sql = "INSERT INTO protocol (date, patient_ID, user_sender_ID, user_recipient1_ID, user_recipient2_ID, user_recipient3_ID, user_recipient4_ID, user_recipient5_ID) VALUES ('$date', '$patientID', '$userSenderID', '$userRecipient1ID', '$userRecipient2ID', '$userRecipient3ID', '$userRecipient4ID', '$userRecipient5ID')";
			echo $sql;
			$ins = mysql_query($sql);
			$id = mysql_insert_id();
		}
		
		// Get info from patient
		$patientID = mysql_real_escape_string($patientID);
		$patient = (object) new patient();
		$patient = $patient->get($patientID);
		
		// Get info from sender user
        $userSenderID = mysql_real_escape_string($userSenderID);
		$user = (object) new user();
		$userSender = $user->getProfile($userSenderID);
        
		// Get info from 1 recipient user
		$userRecipient1ID = mysql_real_escape_string($userRecipient1ID);
		$user = (object) new user();
		$userRecipient1 = $user->getProfile($userRecipient1ID);

		// Get info from 2 recipient user
		$userRecipient2ID = mysql_real_escape_string($userRecipient2ID);
		$user = (object) new user();
		$userRecipient2 = $user->getProfile($userRecipient2ID);
		
		// Get info from 3 recipient user
		$userRecipient3ID = mysql_real_escape_string($userRecipient3ID);
		$user = (object) new user();
		$userRecipient3 = $user->getProfile($userRecipient3ID);
		
		// Get info from 4 recipient user
		$userRecipient4ID = mysql_real_escape_string($userRecipient4ID);
		$user = (object) new user();
		$userRecipient4 = $user->getProfile($userRecipient4ID);
		
		// Get info from 5 recipient user
		$userRecipient5ID = mysql_real_escape_string($userRecipient5ID);
		$user = (object) new user();
		$userRecipient5 = $user->getProfile($userRecipient5ID);
		
		// Convert DOC Element
		$right = array("'","µ");
		$wrong = array("&rsquo;","&micro;");
		$text = str_replace($wrong, $right, $text);
		$text = mysql_real_escape_string($text);
		
		
		// Get empty xml file
        $norme =  "files/" . CL_CONFIG . "/norme/xml/kmehr.xml";
		
        // Create a new XML document and Xpath
		$doc = new DOMDocument('1.0');
		$doc->load($norme);
		$xpath = new DomXpath($doc);
		
		// Define all the path
		$find_id = $xpath->query('/kmehrmessage/header/id/text()')->item(0);
		$find_date = $xpath->query('/kmehrmessage/header/date/text()')->item(0);
		$find_time = $xpath->query('/kmehrmessage/header/time/text()')->item(0);
		
		$find_sender_firstname = $xpath->query('/kmehrmessage/header/sender/hcparty/firstname')->item(0);
		$find_sender_familyname = $xpath->query('/kmehrmessage/header/sender/hcparty/familyname')->item(0);
		$find_sender_id = $xpath->query('/kmehrmessage/header/sender/hcparty/id')->item(0);
		$find_sender_cd = $xpath->query('/kmehrmessage/header/sender/hcparty/cd')->item(0);
		
		$find_recipient1_firstname = $xpath->query('/kmehrmessage/header/recipient/hcparty[1]/firstname')->item(0);
		$find_recipient1_familyname = $xpath->query('/kmehrmessage/header/recipient/hcparty[1]/familyname')->item(0);
		$find_recipient1_id = $xpath->query('/kmehrmessage/header/recipient/hcparty[1]/id')->item(0);
		$find_recipient1_cd = $xpath->query('/kmehrmessage/header/recipient/hcparty[1]/cd')->item(0);
		$find_recipient1_country = $xpath->query('/kmehrmessage/header/recipient/hcparty[1]/address/country/cd')->item(0);
		$find_recipient1_zip = $xpath->query('/kmehrmessage/header/recipient/hcparty[1]/address/zip')->item(0);
		$find_recipient1_city = $xpath->query('/kmehrmessage/header/recipient/hcparty[1]/address/city')->item(0);
		$find_recipient1_street = $xpath->query('/kmehrmessage/header/recipient/hcparty[1]/address/street')->item(0);
		
		$find_recipient2_firstname = $xpath->query('/kmehrmessage/header/recipient/hcparty[2]/firstname')->item(0);
		$find_recipient2_familyname = $xpath->query('/kmehrmessage/header/recipient/hcparty[2]/familyname')->item(0);
		$find_recipient2_id = $xpath->query('/kmehrmessage/header/recipient/hcparty[2]/id')->item(0);
		$find_recipient2_cd = $xpath->query('/kmehrmessage/header/recipient/hcparty[2]/cd')->item(0);
		$find_recipient2_country = $xpath->query('/kmehrmessage/header/recipient/hcparty[2]/address/country/cd')->item(0);
		$find_recipient2_zip = $xpath->query('/kmehrmessage/header/recipient/hcparty[2]/address/zip')->item(0);
		$find_recipient2_city = $xpath->query('/kmehrmessage/header/recipient/hcparty[2]/address/city')->item(0);
		$find_recipient2_street = $xpath->query('/kmehrmessage/header/recipient/hcparty[2]/address/street')->item(0);

		$find_recipient3_firstname = $xpath->query('/kmehrmessage/header/recipient/hcparty[3]/firstname')->item(0);
		$find_recipient3_familyname = $xpath->query('/kmehrmessage/header/recipient/hcparty[3]/familyname')->item(0);
		$find_recipient3_id = $xpath->query('/kmehrmessage/header/recipient/hcparty[3]/id')->item(0);
		$find_recipient3_cd = $xpath->query('/kmehrmessage/header/recipient/hcparty[3]/cd')->item(0);
		$find_recipient3_country = $xpath->query('/kmehrmessage/header/recipient/hcparty[3]/address/country/cd')->item(0);
		$find_recipient3_zip = $xpath->query('/kmehrmessage/header/recipient/hcparty[3]/address/zip')->item(0);
		$find_recipient3_city = $xpath->query('/kmehrmessage/header/recipient/hcparty[3]/address/city')->item(0);
		$find_recipient3_street = $xpath->query('/kmehrmessage/header/recipient/hcparty[3]/address/street')->item(0);

		$find_recipient4_firstname = $xpath->query('/kmehrmessage/header/recipient/hcparty[4]/firstname')->item(0);
		$find_recipient4_familyname = $xpath->query('/kmehrmessage/header/recipient/hcparty[4]/familyname')->item(0);
		$find_recipient4_id = $xpath->query('/kmehrmessage/header/recipient/hcparty[4]/id')->item(0);
		$find_recipient4_cd = $xpath->query('/kmehrmessage/header/recipient/hcparty[4]/cd')->item(0);
		$find_recipient4_country = $xpath->query('/kmehrmessage/header/recipient/hcparty[4]/address/country/cd')->item(0);
		$find_recipient4_zip = $xpath->query('/kmehrmessage/header/recipient/hcparty[4]/address/zip')->item(0);
		$find_recipient4_city = $xpath->query('/kmehrmessage/header/recipient/hcparty[4]/address/city')->item(0);
		$find_recipient4_street = $xpath->query('/kmehrmessage/header/recipient/hcparty[4]/address/street')->item(0);

		$find_recipient5_firstname = $xpath->query('/kmehrmessage/header/recipient/hcparty[5]/firstname')->item(0);
		$find_recipient5_familyname = $xpath->query('/kmehrmessage/header/recipient/hcparty[5]/familyname')->item(0);
		$find_recipient5_id = $xpath->query('/kmehrmessage/header/recipient/hcparty[5]/id')->item(0);
		$find_recipient5_cd = $xpath->query('/kmehrmessage/header/recipient/hcparty[5]/cd')->item(0);
		$find_recipient5_country = $xpath->query('/kmehrmessage/header/recipient/hcparty[5]/address/country/cd')->item(0);
		$find_recipient5_zip = $xpath->query('/kmehrmessage/header/recipient/hcparty[5]/address/zip')->item(0);
		$find_recipient5_city = $xpath->query('/kmehrmessage/header/recipient/hcparty[5]/address/city')->item(0);
		$find_recipient5_street = $xpath->query('/kmehrmessage/header/recipient/hcparty[5]/address/street')->item(0);

		$find_author_firstname = $xpath->query('/kmehrmessage/folder/transaction/author/hcparty/firstname')->item(0);
		$find_author_familyname = $xpath->query('/kmehrmessage/folder/transaction/author/hcparty/familyname')->item(0);
		$find_author_id = $xpath->query('/kmehrmessage/folder/transaction/author/hcparty/id')->item(0);
		$find_author_cd = $xpath->query('/kmehrmessage/folder/transaction/author/hcparty/cd')->item(0);
		
		$find_patient_id = $xpath->query("/kmehrmessage/folder/patient/id[@S='ID-PATIENT']")->item(0);
		$find_patient_id_local = $xpath->query("/kmehrmessage/folder/patient/id[@S='LOCAL']")->item(0);
		$find_patient_firstname = $xpath->query('/kmehrmessage/folder/patient/firstname')->item(0);
		$find_patient_familyname = $xpath->query('/kmehrmessage/folder/patient/familyname')->item(0);
		$find_patient_birthdate = $xpath->query('/kmehrmessage/folder/patient/birthdate/date')->item(0);
		$find_patient_sex = $xpath->query('/kmehrmessage/folder/patient/sex/cd')->item(0);
		$find_patient_country = $xpath->query('/kmehrmessage/folder/patient/address/country/cd')->item(0);
		$find_patient_zip = $xpath->query('/kmehrmessage/folder/patient/address/zip')->item(0);
		$find_patient_city = $xpath->query('/kmehrmessage/folder/patient/address/city')->item(0);
		$find_patient_street = $xpath->query('/kmehrmessage/folder/patient/address/street')->item(0);

		$find_protocol_date = $xpath->query('/kmehrmessage/folder/transaction/date')->item(0);
		$find_protocol_time = $xpath->query('/kmehrmessage/folder/transaction/time')->item(0);
		$find_protocol_text = $xpath->query('/kmehrmessage/folder/transaction/text')->item(0);
		
		// Update value
		$find_id->nodeValue = $userSender["inami"].".".$id;
		$find_date->nodeValue = $currentDate;
		$find_time->nodeValue = $currentTime;
		
		$find_sender_firstname->nodeValue = utf8_encode($userSender["firstname"]);
		$find_sender_familyname->nodeValue = utf8_encode($userSender["familyname"]);
		$find_sender_id->nodeValue = utf8_encode($userSender["inami"]);
		$find_sender_cd->nodeValue = utf8_encode($userSender["speciality"]);
		
		$find_recipient1_firstname->nodeValue = utf8_encode(addslashes($userRecipient1["firstname"]));
		$find_recipient1_familyname->nodeValue = utf8_encode(addslashes($userRecipient1["familyname"]));
		$find_recipient1_id->nodeValue = utf8_encode($userRecipient1["inami"]);
		$find_recipient1_cd->nodeValue = utf8_encode($userRecipient1["speciality"]);
		$find_recipient1_country->nodeValue = utf8_encode($userRecipient1["country1"]);
		$find_recipient1_zip->nodeValue = utf8_encode($userRecipient1["zip1"]);
		$find_recipient1_city->nodeValue = utf8_encode(addslashes($userRecipient1["city1"]));
		$find_recipient1_street->nodeValue = utf8_encode(addslashes($userRecipient1["address1"]));
		
		$find_recipient2_firstname->nodeValue = utf8_encode(addslashes($userRecipient2["firstname"]));
		$find_recipient2_familyname->nodeValue = utf8_encode(addslashes($userRecipient2["familyname"]));
		$find_recipient2_id->nodeValue = utf8_encode($userRecipient2["inami"]);
		$find_recipient2_cd->nodeValue = utf8_encode($userRecipient2["speciality"]);
		$find_recipient2_country->nodeValue = utf8_encode($userRecipient2["country1"]);
		$find_recipient2_zip->nodeValue = utf8_encode($userRecipient2["zip1"]);
		$find_recipient2_city->nodeValue = utf8_encode(addslashes($userRecipient2["city1"]));
		$find_recipient2_street->nodeValue = utf8_encode(addslashes($userRecipient2["address1"]));
				
		$find_recipient3_firstname->nodeValue = utf8_encode(addslashes($userRecipient3["firstname"]));
		$find_recipient3_familyname->nodeValue = utf8_encode(addslashes($userRecipient3["familyname"]));
		$find_recipient3_id->nodeValue = utf8_encode($userRecipient3["inami"]);
		$find_recipient3_cd->nodeValue = utf8_encode($userRecipient3["speciality"]);
		$find_recipient3_country->nodeValue = utf8_encode($userRecipient3["country1"]);
		$find_recipient3_zip->nodeValue = utf8_encode($userRecipient3["zip1"]);
		$find_recipient3_city->nodeValue = utf8_encode(addslashes($userRecipient3["city1"]));
		$find_recipient3_street->nodeValue = utf8_encode(addslashes($userRecipient3["address1"]));
				
		$find_recipient4_firstname->nodeValue = utf8_encode(addslashes($userRecipient4["firstname"]));
		$find_recipient4_familyname->nodeValue = utf8_encode(addslashes($userRecipient4["familyname"]));
		$find_recipient4_id->nodeValue = utf8_encode($userRecipient4["inami"]);
		$find_recipient4_cd->nodeValue = utf8_encode($userRecipient4["speciality"]);
		$find_recipient4_country->nodeValue = utf8_encode($userRecipient4["country1"]);
		$find_recipient4_zip->nodeValue = utf8_encode($userRecipient4["zip1"]);
		$find_recipient4_city->nodeValue = utf8_encode(addslashes($userRecipient4["city1"]));
		$find_recipient4_street->nodeValue = utf8_encode(addslashes($userRecipient4["address1"]));
				
		$find_recipient5_firstname->nodeValue = utf8_encode(addslashes($userRecipient5["firstname"]));
		$find_recipient5_familyname->nodeValue = utf8_encode(addslashes($userRecipient5["familyname"]));
		$find_recipient5_id->nodeValue = utf8_encode($userRecipient5["inami"]);
		$find_recipient5_cd->nodeValue = utf8_encode($userRecipient5["speciality"]);
		$find_recipient5_country->nodeValue = utf8_encode($userRecipient5["country1"]);
		$find_recipient5_zip->nodeValue = utf8_encode($userRecipient5["zip1"]);
		$find_recipient5_city->nodeValue = utf8_encode(addslashes($userRecipient5["city1"]));
		$find_recipient5_street->nodeValue = utf8_encode(addslashes($userRecipient5["address1"]));
				
		$find_author_firstname->nodeValue = utf8_encode(addslashes($userSender["firstname"]));
		$find_author_familyname->nodeValue = utf8_encode(addslashes($userSender["familyname"]));
		$find_author_id->nodeValue = utf8_encode($userSender["inami"]);
		$find_author_cd->nodeValue = utf8_encode($userSender["speciality"]);
		
		$find_patient_id->nodeValue = utf8_encode($patient["patient_sis"]);
		$find_patient_id_local->nodeValue = utf8_encode($patient["patient_id"]);
		$find_patient_firstname->nodeValue = utf8_encode(addslashes($patient["patient_prenom"]));
		$find_patient_familyname->nodeValue = utf8_encode(addslashes($patient["patient_nom"]));
		$find_patient_birthdate->nodeValue = utf8_encode($patient["patient_birthdate"]);
		if ($patient["patient_sexe"] == 'F') $find_patient_sex->nodeValue = 'female';
		if ($patient["patient_sexe"] == 'M') $find_patient_sex->nodeValue = 'male';
		if ($patient["patient_sexe"] == '') $find_patient_sex->nodeValue = '';
		$find_patient_zip->nodeValue = utf8_encode($patient["patient_code_postal"]);
		$find_patient_city->nodeValue = utf8_encode(addslashes($patient["patient_localite"]));
		$find_patient_street->nodeValue = utf8_encode(addslashes($patient["patient_rue"]));
		
		$find_protocol_date->nodeValue = $date;
		$find_protocol_time->nodeValue = "12:00";
		
		$text = utf8_encode(html_entity_decode($text));
		
		$f = $doc->createDocumentFragment();
		$f->appendXML($text);
		$find_protocol_text->nodeValue = "";
		$find_protocol_text->appendChild($f);
		
		// Nice format
		$doc->formatOutput = true;

		// get completed xml document
		$xml_string = $doc->saveXML();
		
		echo $xml_string;
		
		
		$sql = "UPDATE protocol set xml='$xml_string' WHERE ID=$id";
		
		echo $sql;
		
		$upd = mysql_query($sql);
		
		echo "<br><br><br>".$upd;
		
		if ($upd) {
            return $id;
        } else {
            return false;
        }
        
    }
    
    /**
     * Delete a user
     *
     * @param int $id User ID
     * @return bool
     */
    function delete($id) {

    	$id = (int) $id;

        $sql1 = "DELETE FROM protocol WHERE ID = $id";
	    $sql2 = "DELETE FROM protocol_assigned WHERE protocol=$id";
        
	    $del1 = mysql_query($sql1);
        $del2 = mysql_query($sql2);
        
    	if ($del1 and $del2) {
            //$this->mylog->add($name, 'user', 3, 0);
            return true;
        } else {
            return false;
        }
    }

    function getContent($id) {
        
    	$xslPath =  "files/" . CL_CONFIG . "/norme/xsl/html.xsl";
    	$id = (int) $id;
        $sql = "SELECT xml FROM protocol WHERE ID = $id";
        $sel = mysql_query($sql);
        $result = mysql_fetch_array($sel);
        $xp = new XsltProcessor();
		// create a DOM document and load the XSL stylesheet
		$xsl = new DomDocument;
	  	$xsl->load($xslPath);
  		// import the XSL styelsheet into the XSLT process
		$xp->importStylesheet($xsl);
		// create a DOM document and load the XML datat
	  	$xml = new DomDocument;
	  	$xml->loadHTML($result["xml"]);
	  	// TODO add new node to xml with all attachment
	  	// amend xslt to cope with new structure
	  	// 
	  	
	  	
		// transform the XML into HTML using the XSL file
		if ($html = $xp->transformToXML($xml)) {
	    	return utf8_decode($html);
	  	} else {
	    	trigger_error('XSL transformation failed.', E_USER_ERROR);
	  	} // if 
    }
    
	function getXML($id) {
        $sql = "SELECT xml FROM protocol WHERE ID = $id";
        $sel = mysql_query($sql);
        $result = mysql_fetch_array($sel);
		$result = str_replace("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>", "", $result);
        return $result["xml"];
    }
    
    function get($id) {
    	$id = (int) $id;
        $sql = "SELECT 
        		pr.ID as protocol_ID, 
        		pr.xml as protocol_xml, 
        		date_format(pr.date, '%d/%m/%Y') as protocol_date, 
        		pr.patient_ID as protocol_patient_ID, CONCAT(pa.nom, ' ', pa.prenom) as patient,
        		pr.user_sender_ID as protocol_user_sender_ID, CONCAT(uss.firstname, ' ', uss.familyname) as user_sender,
        		pr.user_recipient1_ID as protocol_user_recipient1_ID, CONCAT(usr1.firstname, ' ', usr1.familyname) as user_recipient1,
        		pr.user_recipient2_ID as protocol_user_recipient2_ID, CONCAT(usr2.firstname, ' ', usr2.familyname) as user_recipient2,
        		pr.user_recipient3_ID as protocol_user_recipient3_ID, CONCAT(usr3.firstname, ' ', usr3.familyname) as user_recipient3,
        		pr.user_recipient4_ID as protocol_user_recipient4_ID, CONCAT(usr4.firstname, ' ', usr4.familyname) as user_recipient4,
        		pr.user_recipient5_ID as protocol_user_recipient5_ID, CONCAT(usr5.firstname, ' ', usr5.familyname) as user_recipient5
        		FROM protocol pr, patients pa, user uss, user usr1, user usr2, user usr3, user usr4, user usr5 
        		WHERE pr.patient_ID = pa.id 
        		AND pr.user_sender_ID = uss.ID  
        		AND pr.user_recipient1_ID = usr1.ID 
        		AND pr.user_recipient2_ID = usr2.ID 
        		AND pr.user_recipient3_ID = usr3.ID 
        		AND pr.user_recipient4_ID = usr4.ID 
        		AND pr.user_recipient5_ID = usr5.ID 
        		AND pr.ID=$id";
        		
        $sel = mysql_query($sql);
        $protocol = mysql_fetch_array($sel);
        if (!empty($protocol)) {
            $protocol["ID"] = stripcslashes($protocol["protocol_ID"]);
            $protocol["patient_ID"] = stripcslashes($protocol["protocol_patient_ID"]);
            $protocol["user_sender_ID"] = stripcslashes($protocol["protocol_user_sender_ID"]);
            
            $protocol["user_recipient1_ID"] = stripcslashes($protocol["protocol_user_recipient1_ID"]);
            if ($protocol["user_recipient1_ID"] == 0) {
            	$protocol["user_recipient1_ID"] = "";
            }
            $protocol["user_recipient2_ID"] = stripcslashes($protocol["protocol_user_recipient2_ID"]);
            if ($protocol["user_recipient2_ID"] == 0) {
            	$protocol["user_recipient2_ID"] = "";
            	$protocol["user_recipient2_display"] = "none";
            }
            $protocol["user_recipient3_ID"] = stripcslashes($protocol["protocol_user_recipient3_ID"]);
            if ($protocol["user_recipient3_ID"] == 0) {
            	$protocol["user_recipient3_ID"] = "";
            	$protocol["user_recipient3_display"] = "none";
            }
            $protocol["user_recipient4_ID"] = stripcslashes($protocol["protocol_user_recipient4_ID"]);
            if ($protocol["user_recipient4_ID"] == 0) {
            	$protocol["user_recipient4_ID"] = "";
            	$protocol["user_recipient4_display"] = "none";
            }
            $protocol["user_recipient5_ID"] = stripcslashes($protocol["protocol_user_recipient5_ID"]);
            if ($protocol["user_recipient5_ID"] == 0) {
            	$protocol["user_recipient5_ID"] = "";
            	$protocol["user_recipient5_display"] = "none";
            }
            
            $protocol["date"] = stripcslashes($protocol["protocol_date"]);
			$protocol["patient"] = stripcslashes($protocol["patient"]);
            $protocol["user_sender"] = stripcslashes($protocol["user_sender"]);
            $protocol["user_recipient1"] = stripcslashes($protocol["user_recipient1"]);
            $protocol["user_recipient2"] = stripcslashes($protocol["user_recipient2"]);
            $protocol["user_recipient3"] = stripcslashes($protocol["user_recipient3"]);
            $protocol["user_recipient4"] = stripcslashes($protocol["user_recipient4"]);
            $protocol["user_recipient5"] = stripcslashes($protocol["user_recipient5"]);
            $xp = new XsltProcessor();
			// create a DOM document and load the XSL stylesheet
			$xslPath =  "files/" . CL_CONFIG . "/norme/xsl/editor.xsl";
			$xsl = new DomDocument;
		  	$xsl->load($xslPath);
			// import the XSL styelsheet into the XSLT process
			$xp->importStylesheet($xsl);
			// create a DOM document and load the XML datat
		  	$xml = new DomDocument;
		  	$xml->loadHTML($protocol["protocol_xml"]);
		  	$html = $xp->transformToXML($xml);
		  	$protocol["text"] =  utf8_decode($html);
            return $protocol;
        } else {
            return false;
        }
        	        
    }
    
    function assign($protocol, $id) {
        $protocol = mysql_real_escape_string($protocol);
        $id = mysql_real_escape_string($id);
        $protocol = (int) $protocol;
        $id = (int) $id;
		$sql = "INSERT INTO `protocol_assigned` (`protocol`,`group`) VALUES ($protocol,$id)";
        $ins = mysql_query($sql);
        if ($ins) {
            return true;
        }  else {
            return false;
        }
    }

	/** Make a search for manager
     *
     * @param value
     * @return array
     */
    function modulesearchfrommanager($id,$value,$limit) {
    	
    	if ($id!='' && $id!='undefined' && $id!= null)
    		$sql = "";
    		else
    		$sql = "SELECT 
    				GROUP_CONCAT(pu.ID,',') as files_id, 
    				GROUP_CONCAT(pu.key,',') as files_key, 
    				GROUP_CONCAT(pu.extension,',') as files_extension, 
    				GROUP_CONCAT(pu.name,',') as files_name, 
    				pa.nom as patient_nom, pa.prenom as patient_prenom, date_format(pa.date_naissance, '%d/%m/%Y') as patient_date_naissance, 
    				uss.firstname as user_sender_firstname, uss.familyname as user_sender_familyname, 
    				usr1.familyname as user_recipient1_familyname , usr1.firstname as user_recipient1_firstname, 
    				usr2.familyname as user_recipient2_familyname , usr2.firstname as user_recipient2_firstname, 
    				usr3.familyname as user_recipient3_familyname , usr3.firstname as user_recipient3_firstname, 
    				usr4.familyname as user_recipient4_familyname , usr4.firstname as user_recipient4_firstname, 
    				usr5.familyname as user_recipient5_familyname , usr5.firstname as user_recipient5_firstname, 
    				pr.ID as protocol_ID, date_format(pr.date, '%d/%m/%Y') as protocol_date  
    				FROM patients pa, user uss, user usr1, user usr2, user usr3, user usr4, user usr5, protocol pr 
    				LEFT JOIN protocol_upload AS pu ON pr.ID = pu.protocol_ID
    				WHERE pr.patient_ID = pa.id 
    				AND pr.user_sender_ID = uss.ID  
    				AND pr.user_recipient1_ID = usr1.ID 
    				AND pr.user_recipient2_ID = usr2.ID 
    				AND pr.user_recipient3_ID = usr3.ID 
    				AND pr.user_recipient4_ID = usr4.ID 
    				AND pr.user_recipient5_ID = usr5.ID 
    				AND ( 
	    				lower(concat(pa.nom,' ',pa.prenom)) regexp '$value' OR lower(concat(pa.prenom,' ',pa.nom)) regexp '$value' 
	    				OR lower(concat(uss.familyname,' ',uss.firstname)) regexp '$value' OR lower(concat(uss.firstname,' ',uss.familyname)) regexp '$value' 
	    				OR lower(concat(usr1.familyname,' ',usr1.firstname)) regexp '$value' OR lower(concat(usr1.firstname,' ',usr1.familyname)) regexp '$value'
	    				OR lower(concat(usr2.familyname,' ',usr2.firstname)) regexp '$value' OR lower(concat(usr2.firstname,' ',usr2.familyname)) regexp '$value'
	    				OR lower(concat(usr3.familyname,' ',usr3.firstname)) regexp '$value' OR lower(concat(usr3.firstname,' ',usr3.familyname)) regexp '$value'
	    				OR lower(concat(usr4.familyname,' ',usr4.firstname)) regexp '$value' OR lower(concat(usr4.firstname,' ',usr4.familyname)) regexp '$value'
	    				OR lower(concat(usr5.familyname,' ',usr5.firstname)) regexp '$value' OR lower(concat(usr5.firstname,' ',usr5.familyname)) regexp '$value'
    				) 
    				GROUP BY pr.ID
    				ORDER BY pr.date DESC, patient_nom, patient_prenom LIMIT $limit";
        $sel = mysql_query($sql);

        $protocols = array();

        while ($protocol = mysql_fetch_array($sel)) {
        	
            $ids = explode(",", $protocol["files_id"]);
            $keys = explode(",", $protocol["files_key"]);
            $extensions = explode(",", $protocol["files_extension"]);
            $names = explode(",", $protocol["files_name"]);
            
            $protocol["attachment"] = "";
            foreach ($ids as $key => $value) {
            	if ($value!='') {
            		$protocol["attachment"] .= "<a target='_blank' title='".$names[$key]."' href='management_protocol.php?action=download_file&id=".$value."&key=".$keys[$key]."' class='tool_".$extensions[$key]."'></a>";
            	}
			}
            $protocol["ID"] = $protocol["protocol_ID"];
            $protocol["patient"] = stripslashes($protocol["patient_nom"].' '.$protocol["patient_prenom"]);
            $protocol["user_sender"] = stripslashes($protocol["user_sender_firstname"].' '.$protocol["user_sender_familyname"]);
            $protocol["user_recipient"] = stripslashes($protocol["user_recipient1_familyname"].' '.$protocol["user_recipient1_firstname"]);
            if ($protocol["user_recipient2_familyname"]!='') $protocol["user_recipient"] .= " ; ".stripslashes($protocol["user_recipient2_familyname"].' '.$protocol["user_recipient2_firstname"]);
            if ($protocol["user_recipient3_familyname"]!='') $protocol["user_recipient"] .= " ; ".stripslashes($protocol["user_recipient3_familyname"].' '.$protocol["user_recipient3_firstname"]);
            if ($protocol["user_recipient4_familyname"]!='') $protocol["user_recipient"] .= " ; ".stripslashes($protocol["user_recipient4_familyname"].' '.$protocol["user_recipient4_firstname"]);
            if ($protocol["user_recipient5_familyname"]!='') $protocol["user_recipient"] .= " ; ".stripslashes($protocol["user_recipient5_familyname"].' '.$protocol["user_recipient5_firstname"]);
            $protocol["date"] = $protocol["protocol_date"];
            
            array_push($protocols, $protocol);
            
        }

        if (!empty($protocols))  {	
            return $protocols;
        } else  {
            return false;
        }

    }
    
	/** Make a search for user
     *
     * @param value
     * @return array
     */
    function modulesearchfromuser($userid, $value, $limit, $type) {
    	
    	if ($type == 'global' ) {
   			$sql = "SELECT distinct 
   				pa.nom as patient_nom, pa.prenom as patient_prenom, date_format(pa.date_naissance, '%d/%m/%Y') as patient_date_naissance, 
   				uss.firstname as user_sender_firstname, uss.familyname as user_sender_familyname, 
   				usr1.firstname as user_recipient1_firstname, usr1.familyname as user_recipient1_familyname, 
   				usr2.firstname as user_recipient2_firstname, usr2.familyname as user_recipient2_familyname, 
   				usr3.firstname as user_recipient3_firstname, usr3.familyname as user_recipient3_familyname, 
   				usr4.firstname as user_recipient4_firstname, usr4.familyname as user_recipient4_familyname, 
   				usr5.firstname as user_recipient5_firstname, usr5.familyname as user_recipient5_familyname, 
   				pr.ID as protocol_ID, date_format(pr.date, '%d/%m/%Y') as protocol_date 
   				FROM protocol pr, patients pa, user uss, user usr1, user usr2, user usr3, user usr4, user usr5, protocol_assigned pr_a, `group` gr, group_assigned gr_a
   				WHERE gr_a.user ='$userid' 
   				AND pr.patient_ID = pa.id 
				AND pr.user_sender_ID = uss.ID 
				AND pr.user_recipient1_ID = usr1.ID 
				AND pr.user_recipient2_ID = usr2.ID 
				AND pr.user_recipient3_ID = usr3.ID 
				AND pr.user_recipient4_ID = usr4.ID 
				AND pr.user_recipient5_ID = usr5.ID 
				AND pr_a.protocol = pr.ID 
				AND pr_a.group = gr_a.group 
   				AND ( 
    				lower(concat(pa.nom,' ',pa.prenom)) regexp '$value' OR lower(concat(pa.prenom,' ',pa.nom)) regexp '$value' 
    				OR lower(concat(uss.familyname,' ',uss.firstname)) regexp '$value' OR lower(concat(uss.firstname,' ',uss.familyname)) regexp '$value' 
    				OR lower(concat(usr1.familyname,' ',usr1.firstname)) regexp '$value' OR lower(concat(usr1.firstname,' ',usr1.familyname)) regexp '$value'
    				OR lower(concat(usr2.familyname,' ',usr2.firstname)) regexp '$value' OR lower(concat(usr2.firstname,' ',usr2.familyname)) regexp '$value'
    				OR lower(concat(usr3.familyname,' ',usr3.firstname)) regexp '$value' OR lower(concat(usr3.firstname,' ',usr3.familyname)) regexp '$value'
    				OR lower(concat(usr4.familyname,' ',usr4.firstname)) regexp '$value' OR lower(concat(usr4.firstname,' ',usr4.familyname)) regexp '$value'
    				OR lower(concat(usr5.familyname,' ',usr5.firstname)) regexp '$value' OR lower(concat(usr5.firstname,' ',usr5.familyname)) regexp '$value'
    				)
    			ORDER BY pr.date DESC, patient_nom, patient_prenom 
     			LIMIT $limit";
    	} else {
   			$sql = "SELECT distinct pa.nom as patient_nom, pa.prenom as patient_prenom, date_format(pa.date_naissance, '%d/%m/%Y') as patient_date_naissance, 
   				uss.firstname as user_sender_firstname, uss.familyname as user_sender_familyname, 
   				usr1.firstname as user_recipient1_firstname, usr1.familyname as user_recipient1_familyname, 
   				usr2.firstname as user_recipient2_firstname, usr2.familyname as user_recipient2_familyname, 
   				usr3.firstname as user_recipient3_firstname, usr3.familyname as user_recipient3_familyname, 
   				usr4.firstname as user_recipient4_firstname, usr4.familyname as user_recipient4_familyname, 
   				usr5.firstname as user_recipient5_firstname, usr5.familyname as user_recipient5_familyname, 
   				pr.ID as protocol_ID, date_format(pr.date, '%d/%m/%Y') as protocol_date 
   				FROM protocol pr, patients pa, user uss, user usr1, user usr2, user usr3, user usr4, user usr5
   				WHERE pr.patient_ID = pa.id
				AND pr.user_sender_ID = uss.ID 
				AND pr.user_recipient1_ID = usr1.ID 
				AND pr.user_recipient2_ID = usr2.ID 
				AND pr.user_recipient3_ID = usr3.ID 
				AND pr.user_recipient4_ID = usr4.ID 
				AND pr.user_recipient5_ID = usr5.ID 
				AND (
					pr.user_recipient1_ID = '$userid' OR
					pr.user_recipient2_ID = '$userid' OR
					pr.user_recipient3_ID = '$userid' OR
					pr.user_recipient4_ID = '$userid' OR
					pr.user_recipient5_ID = '$userid' OR
					pr.user_sender_ID = '$userid'
					)
   				AND ( lower(concat(pa.nom,' ',pa.prenom)) regexp '$value' OR lower(concat(pa.prenom,' ',pa.nom)) regexp '$value' ) 
   				ORDER BY pr.date DESC, patient_nom, patient_prenom 
   				LIMIT $limit";
    	}
		
		//echo $sql;
        
    	$sel = mysql_query($sql);

        $protocols = array();

        while ($protocol = mysql_fetch_array($sel)) {
        	
            $protocol["ID"] = $protocol["protocol_ID"];
            $protocol["patient"] = stripslashes($protocol["patient_nom"].' '.$protocol["patient_prenom"]);
            $protocol["user_sender"] = stripslashes($protocol["user_sender_familyname"].' '.$protocol["user_sender_firstname"]);
            $protocol["user_recipient"] = stripslashes($protocol["user_recipient1_familyname"].' '.$protocol["user_recipient1_firstname"]);
            if ($protocol["user_recipient2_familyname"]!='') $protocol["user_recipient"] .= " ; ".stripslashes($protocol["user_recipient2_familyname"].' '.$protocol["user_recipient2_firstname"]);
            if ($protocol["user_recipient3_familyname"]!='') $protocol["user_recipient"] .= " ; ".stripslashes($protocol["user_recipient3_familyname"].' '.$protocol["user_recipient3_firstname"]);
            if ($protocol["user_recipient4_familyname"]!='') $protocol["user_recipient"] .= " ; ".stripslashes($protocol["user_recipient4_familyname"].' '.$protocol["user_recipient4_firstname"]);
            if ($protocol["user_recipient5_familyname"]!='') $protocol["user_recipient"] .= " ; ".stripslashes($protocol["user_recipient5_familyname"].' '.$protocol["user_recipient5_firstname"]);
            $protocol["date"] = $protocol["protocol_date"];
            
            array_push($protocols, $protocol);
            
        }

        if (!empty($protocols))  {	
            return $protocols;
        } else  {
            return false;
        }

    }
    
    /*
     * FILE MANAGEMENT
     */
    
     /**
     * Add new protocol report
     * 
     */
    function addFile($key,$protocol_id,$file_name,$file_extension,$file_size,$file_type,$file_tmpname) {
    	
		$fp      = fopen($file_tmpname, 'r');
		$file_content = fread($fp, filesize($file_tmpname));
		$file_content = addslashes($file_content);
		fclose($fp);
		$sql = "INSERT INTO `protocol_upload` ( `protocol_ID` , `key` , `name` , `extension` , `size` , `type` , `file` )
				VALUES ( '$protocol_id', '$key', '$file_name', '$file_extension', '$file_size', '$file_type', '$file_content');";
		$ins = mysql_query($sql);
		$id = mysql_insert_id();
        if ($ins) {
            return $id;
        } else {
            return false;
        }
        
    }
    
    // not secure
	function getProtocolFiles($ID) {
   		
	    $sql = " SELECT `name`, `type`, `size`, `file`, `ID`, `key` FROM `protocol_upload` WHERE `protocol_ID`='$ID' AND `delete`='0'";
		$sel = mysql_query($sql);
        $protocolFiles = array();
                
        while ($protocolFile = mysql_fetch_array($sel)) {
        	$protocolFile["ID"] 	= (int) $protocolFile["ID"];
            $protocolFile["name"] 	= stripslashes($protocolFile["name"]);
            array_push($protocolFiles, $protocolFile);
        }

        if (!empty($protocolFiles)) {
        	return $protocolFiles;
        } else {
            return false;
        }
        
    }

    // not secure function
    // use only for admin
   	function getFile($key) {
   		
   		// select one file with the key for the current id
	    $sql = " SELECT `name`, `type`, `size`, `file` 
	    		FROM `protocol_upload` as pu
   				WHERE `key`='$key' AND `delete`='0'  
	    		LIMIT 1";

	    $sel = mysql_query($sql);
        $file = mysql_fetch_array($sel);
        if (!empty($file)) {
        	$size = $file['size'];
        	$type = $file['type'];
        	$name = $file['name'];
        	header("Content-length: $size");
			header("Content-type: $type");
			header("Content-Disposition: attachment; filename=$name");
			echo $file['file'];
        } else {
            return false;
        }
        
    }

	function deleteFile($ID) {
		$sql = "UPDATE `protocol_upload` set `delete` = 1 WHERE ID = '$ID'";
		$del = mysql_query($sql);
		if ($del) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>
