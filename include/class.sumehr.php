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
class sumehr
{
    public $mylog;
    
    /**
     * Konstruktor
     * Initialisiert den Eventlog
     */
    function __construct() {
        $this->mylog = new mylog;
    }

    // unAssign Report
    function unAssignAll($sumehrReportID) {
   		if ($sumehrReportID != '') {
    		// Delete old assigned group
	    	$sql = "DELETE FROM sumehr_report_assigned WHERE sumehr_report=$sumehrReportID";
    		$del = mysql_query($sql);
    	}
        if ($del) {
            return true;
        }  else {
            return false;
        }
    }
    
    // Assign Report
    function assign($sumehrReportID, $groupID) {
        $sumehrReportID = (int) mysql_real_escape_string($sumehrReportID);
        $groupID = (int) mysql_real_escape_string($groupID);
		$sql = "INSERT INTO `sumehr_report_assigned` (`sumehr_report`,`group`) VALUES ($sumehrReportID,$groupID)";
		$ins = mysql_query($sql);
        if ($ins) {
            return true;
        }  else {
            return false;
        }
    }
    
    /**
     * Add new dossier
     * 
     */
    function add($patientID,$userID) {
    	
		$sql = "INSERT INTO `sumehr` (`patient_ID` , `user_ID`) VALUES ('$patientID', '$userID');";
		$ins = mysql_query($sql);
		$id = mysql_insert_id();
		
        if ($ins) {
            return $id;
        } else {
            return false;
        }
        
    }

     /**
     * Add new sumehr report
     * 
     */
    function addReport($sumehrID,$datetime,$text) {
    	
    	$text = mysql_real_escape_string($text);
    	$sumehrID = (int) mysql_real_escape_string($sumehrID);
    	
		$sql = "INSERT INTO `sumehr_report` (`sumehr_ID` ,`datetime` ,`text`) VALUES ('$sumehrID', '$datetime', '$text');";
		
		$ins = mysql_query($sql);
		$id = mysql_insert_id();
		
        if ($ins) {
            return $id;
        } else {
            return false;
        }
        
    }
    
     /**
     * Delete sumehr report
     * 
     */
    function deleteReport($reportID) {
    	
   	 	$sql1 = "DELETE FROM `sumehr_report` WHERE ID = '$reportID'";
   	 	echo $sql1;
   	 	$del1 = mysql_query($sql1);
   	 	$sql2 = "DELETE FROM `sumehr_upload` WHERE sumher_report_ID = '$reportID'";
   	 	$del2 = mysql_query($sql2);
		$sql3 = "DELETE FROM `sumehr_report_assigned` WHERE sumehr_report = '$reportID'";
   	 	$del3 = mysql_query($sql3);
		
		if ($del1) {
            return true;
        } else {
            return false;
        }		
        
    }
    
     /**
     * Update new sumehr report
     * 
     */
    function updateReport($sumehrID,$reportID,$datetime,$text) {
    	
    	$text = mysql_real_escape_string($text);
    	$sumehrID = (int) mysql_real_escape_string($sumehrID);
    	$reportID = (int) mysql_real_escape_string($reportID);
    	
		$sql = "UPDATE `sumehr_report` SET `datetime` = '$datetime', `text` = '$text' WHERE `ID` = $reportID LIMIT 1 ;";

		$upd = mysql_query($sql);
		
        if ($upd) {
            return $reportID;
        } else {
            return false;
        }
        
    }
    
     /**
     * Add new sumehr report
     * 
     */
    function addFile($key,$sumehr_report_id,$file_name,$file_extension,$file_size,$file_type,$file_tmpname,$thumbnail1,$thumbnail2,$thumbnail3) {
    	
		$fp      = fopen($file_tmpname, 'r');
		$file_content = fread($fp, filesize($file_tmpname));
		$file_content = addslashes($file_content);
		fclose($fp);
		unlink($file_tmpname);
		
		$fp      = fopen($thumbnail1, 'r');
		$thumbnail1 = fread($fp, filesize($thumbnail1));
		$thumbnail1 = addslashes($thumbnail1);
		fclose($fp);
		unlink($file_tmpname);
		
		$fp      = fopen($thumbnail2, 'r');
		$thumbnail2 = fread($fp, filesize($thumbnail2));
		$thumbnail2 = addslashes($thumbnail2);
		fclose($fp);
		unlink($file_tmpname);
		
		$fp      = fopen($thumbnail3, 'r');
		$thumbnail3 = fread($fp, filesize($thumbnail3));
		$thumbnail3 = addslashes($thumbnail3);
		fclose($fp);
		unlink($file_tmpname);
		
		$sql = "INSERT INTO `sumehr_upload` ( `sumher_report_ID` , `key` , `name` , `extension` , `size` , `type` , `file` , `thumbnail_1`, `thumbnail_2`, `thumbnail_3` )
				VALUES ( '$sumehr_report_id', '$key', '$file_name', '$file_extension', '$file_size', '$file_type', '$file_content', '$thumbnail1', '$thumbnail2', '$thumbnail3');";
		$ins = mysql_query($sql);
		$id = mysql_insert_id();
		
		if ($ins) {
            return $id;
        } else {
            return false;
        }
        
    }

    /*
    * Delete File
	*/
	function deleteFile($sumehrReportFileID) {
    	
		$sql = "UPDATE `sumehr_upload` set `delete` = 1 WHERE ID = '$sumehrReportFileID'";
		$del = mysql_query($sql);
		if ($del) {
            return true;
        } else {
            return false;
        }
        
    }
    
    /**
     * Get dossier if exist
     * 
     */
    function get($patientID,$userID) {
    	
	    $patientID 	= (int) $patientID;
	    $userID 	= (int) $userID;
	    $sql 		= "SELECT ID, patient_ID, user_ID FROM sumehr WHERE patient_ID='$patientID' AND user_ID='$userID' LIMIT 1";
	    
        $sel = mysql_query($sql);
        $sumehr = mysql_fetch_array($sel);
        if (!empty($sumehr)) {
            return $sumehr;
        } else {
            return false;
        }
        
    }
    
	/*
	 * Get all sumehr
	*/
	function getAll($patientID,$userID) {
	    $patientID 	= (int) $patientID;
	    $sql 		= "SELECT DISTINCT ID, patient_ID, user_ID, ABS(user_ID-$userID) as calcul FROM sumehr WHERE patient_ID='$patientID' ORDER BY calcul";
	    //echo $sql;
	    $sel = mysql_query($sql);
	 	$sumehrs = array();
        while ($sumehr = mysql_fetch_array($sel)) {
            array_push($sumehrs, $sumehr);
        }
        if (!empty($sumehrs)) {
            return $sumehrs;
        } else {
            return false;
        }
    }
    
    /*
     * Get all reports between user and patietn
     */
	function getReports($patientID,$userID,$currentUserID){
		
    	/*$sql =  "SELECT DISTINCT s.user_ID AS user_id, u.firstname AS user_firstname, u.familyname AS user_familyname, p.prenom AS patient_firstname, p.nom AS patient_familyname, p.id AS patient_id,date_format(sr.datetime, '%d/%m/%Y %H:%i') AS datetime, sr.text AS sumehr_report_text, sr.ID AS sumehr_report_id 
    			FROM 
				patients AS p, 
				user AS u, 
				sumehr AS s, 
				sumehr_report sr
				LEFT JOIN group_assigned gr_a on gr_a.user ='$currentUserID'
				LEFT JOIN sumehr_report_assigned sr_a on sr_a.group = gr_a.group AND sr_a.sumehr_report = sr.id
				WHERE s.patient_ID = p.ID 
				AND s.user_ID = u.ID 
				AND s.ID = sr.sumehr_ID 
				AND s.patient_ID = '$patientID' 
				AND s.user_ID = '$userID'
				AND (sr_a.group != '' or s.user_ID = '$currentUserID') ORDER BY sr.datetime DESC";
	*/


    	$sql =  "SELECT DISTINCT s.user_ID AS user_id, u.firstname AS user_firstname, u.familyname AS user_familyname, p.prenom AS patient_firstname, p.nom AS patient_familyname, p.id AS patient_id,date_format(sr.datetime, '%d/%m/%Y %H:%i') AS datetime, sr.text AS sumehr_report_text, sr.ID AS sumehr_report_id 
    			FROM 
				patients AS p, 
				user AS u, 
				sumehr AS s, 
				sumehr_report sr
				LEFT JOIN group_assigned gr_a on gr_a.user ='$currentUserID'
				LEFT JOIN sumehr_report_assigned sr_a on sr_a.group = gr_a.group
				WHERE s.patient_ID = p.ID 
				AND s.user_ID = u.ID 
				AND s.ID = sr.sumehr_ID 
				AND s.patient_ID = '$patientID' 
				AND s.user_ID = '$userID'
				AND (sr_a.group != '' or s.user_ID = '$currentUserID') ORDER BY sr.datetime DESC";
				
			
		//echo "<br/>".$sql;
		
		$sel = mysql_query($sql);
        
        $sumehrReports = array();
                
        while ($sumehrReport = mysql_fetch_array($sel)) {
        	
            $sumehrReport["sumehr_report_id"] 			= $sumehrReport["sumehr_report_id"];
            $sumehrReport["patient_firstname"] 			= stripslashes($sumehrReport["patient_firstname"]);
            $sumehrReport["patient_familyname"] 		= stripslashes($sumehrReport["patient_familyname"]);
            $sumehrReport["user_familyname"] 			= stripslashes($sumehrReport["user_familyname"]);
            $sumehrReport["user_firstname"]				= stripslashes($sumehrReport["user_firstname"]);
            $sumehrReport["sumehr_report_text_short"] 	= stripslashes($this->subHTML($sumehrReport["sumehr_report_text"]));
            $sumehrReport["sumehr_report_text"] 		= stripslashes($sumehrReport["sumehr_report_text"]);
            
            array_push($sumehrReports, $sumehrReport);
        }
        
        if (!empty($sumehrReports)) {
        	return $sumehrReports;
        } else {
            return false;
        }
        		
	}
	
    /**
     * Get report if exist
     * 
     */
    function getReport($reportID,$userID,$currentUserID) {
    	
	    $reportID 	= (int) $reportID;
	    $sql =  "SELECT s.user_ID AS user_ID,s.patient_ID AS patient_ID, sr.ID AS ID, sr.sumehr_ID AS sumehr_ID, date_format(sr.datetime, '%d/%m/%Y %H:%i') AS datetime, sr.text AS text 
    			FROM 
				sumehr AS s, 
				sumehr_report sr
				LEFT JOIN group_assigned gr_a on gr_a.user ='$currentUserID'
				LEFT JOIN sumehr_report_assigned sr_a on sr_a.group = gr_a.group AND sr_a.sumehr_report = sr.id
				WHERE s.ID = sr.sumehr_ID 
				AND sr.ID = '$reportID'
				AND (sr_a.group != '' or s.user_ID = '$currentUserID') LIMIT 1";
	    
        $sel = mysql_query($sql);
        $sumehrReport = mysql_fetch_array($sel);
        if (!empty($sumehrReport)) {
            return $sumehrReport;
        } else {
            return false;
        }
        
    }
    
	function getReportFile($reportID) {
   		
	    $sql = " SELECT `name`, `type`, `size`, `file`, `ID`, `extension`, `key`, `thumbnail_1`, `thumbnail_2`, `thumbnail_3` FROM `sumehr_upload` WHERE `sumher_report_ID`='$reportID' AND `delete`='0'";
	    //echo $sql;	
	    $sel = mysql_query($sql);
        $sumehrReportFiles = array();
                
        while ($sumehrReportFile = mysql_fetch_array($sel)) {

        	$sumehrReportFile["size"] 	= round($sumehrReportFile["size"]/1000,2);
        	$sumehrReportFile["ID"] 	= $sumehrReportFile["ID"];
        	$sumehrReportFile["name"] 	= stripslashes($sumehrReportFile["name"]);
        	$sumehrReportFile["numberimage"] = 0;
        	if ($sumehrReportFile["thumbnail_1"] != '') $sumehrReportFile["numberimage"] = 1;
        	if ($sumehrReportFile["thumbnail_2"] != '') $sumehrReportFile["numberimage"] = 2;
        	if ($sumehrReportFile["thumbnail_3"] != '') $sumehrReportFile["numberimage"] = 3;
        	array_push($sumehrReportFiles, $sumehrReportFile);

        }

        if (!empty($sumehrReportFiles)) {
        	return $sumehrReportFiles;
        } else {
            return false;
        }
        
    }
    
	function getReportPermission($reportID) {
   		
	    $sql = " SELECT g.name as name FROM `sumehr_report_assigned` sra, `group` g WHERE g.ID = sra.group AND sra.sumehr_report='$reportID' order by g.name";
		$sel = mysql_query($sql);
        $ReportPermissions = array();
                
        while ($ReportPermission = mysql_fetch_array($sel)) {
        	$ReportPermission["name"] = stripslashes($ReportPermission["name"]);
            array_push($ReportPermissions, $ReportPermission);
        }

        if (!empty($ReportPermissions)) {
        	return $ReportPermissions;
        } else {
            return false;
        }
        
    }
    
	function count($filter, $userid, $patientid){
		
		$sql = "SELECT DISTINCT count(pr.ID) FROM protocol pr, user uss, user usr1, user usr2, user usr3, user usr4, user usr5, protocol_assigned pr_a, `group` gr, group_assigned gr_a WHERE gr_a.user ='$userid' AND pr.patient_ID = '$patientid' AND pr.user_sender_ID = uss.ID AND pr.user_recipient1_ID = usr1.ID AND pr.user_recipient2_ID = usr2.ID AND pr.user_recipient3_ID = usr3.ID AND pr.user_recipient4_ID = usr4.ID AND pr.user_recipient5_ID = usr5.ID AND pr_a.protocol = pr.ID AND pr_a.group = gr_a.group ".$wh;
		$sel = mysql_query($sql);
		
        $count = mysql_fetch_array($sel);
        
        if (!empty($count)) {
            return $count['total'];
        } else {
            return 0;
        }
	}
	
	function get_json($sql,$langfile,$url) {
   		
		$tool_html_alt = $langfile["dico_sumehr_export_html"];
		$tool_pdf_alt  = $langfile["dico_sumehr_export_pdf"];
		$tool_rtf_alt  = $langfile["dico_sumehr_export_rtf"];
		$tool_txt_alt  = $langfile["dico_sumehr_export_txt"];
		$tool_xml_alt  = $langfile["dico_sumehr_export_xml"];
		
		$tool_html1 = "<a onclick=javascript=exportProtocol(";
		$tool_html2 = ",'html') ><img width='16' height='16' src='./templates/standard/images/butn-html-hover.png' alt='".$tool_html_alt."' title='".$tool_html_alt."' border=0 />";
		
		$tool_pdf1 = "<a onclick=javascript=exportProtocol(";
		$tool_pdf2 = ",'pdf') ><img width='16' height='16' src='./templates/standard/images/butn-pdf-hover.gif' alt='".$tool_pdf_alt."' title='".$tool_pdf_alt."' border=0 />";
		
		$tool_word1 = "<a onclick=javascript=exportProtocol(";
		$tool_word2 = ",'rtf') ><img width='16' height='16' src='./templates/standard/images/butn-word-hover.png' alt='".$tool_rtf_alt."' title='".$tool_rtf_alt."' border=0 />";
		
		$tool_txt1 = "<a onclick=javascript=exportProtocol(";
		$tool_txt2 = ",'txt')><img width='16' height='16' src='./templates/standard/images/butn-txt-hover.png' alt='".$tool_txt_alt."' title='".$tool_txt_alt."' border=0 />";
		
		$tool_xml1 = "<a onclick=javascript=exportProtocol(";
		$tool_xml2 = ",'xml') ><img width='16' height='16' src='./templates/standard/images/butn-xml-hover.png' alt='".$tool_xml_alt."' title='".$tool_xml_alt."' border=0 />";
		
		$i = 0;
		$rows = array();
		
        $sel = mysql_query($sql);
        
        while ($res = mysql_fetch_array($sel)) {        	
        	$rows[$i]['id']=$res["id"];
        	$res["export"] = $tool_html1.$res["id"].$tool_html2." ".$tool_pdf1.$res["id"].$tool_pdf2." ".$tool_word1.$res["id"].$tool_word2." ".$tool_txt1.$res["id"].$tool_txt2." ".$tool_xml1.$res["id"].$tool_xml2;
        	$rows[$i]['cell']=array(
				$res["id"],
			    $res["user"],
			    $res["doctor"],
				$res["protocole_date"],
			    $res["export"]
			);
			$i++;
        }
        
        if (!empty($rows)) {
            return $rows;
        } else {
            return false;
        }
        
    }
    
   	function getFile($key,$userID,$currentUserID) {
   		
   		// select one file with the key for the current id
	    $sql = " SELECT 
	    		`name`, `type`, `size`, `file` 
	    		FROM `sumehr_upload` as su
   				LEFT JOIN sumehr_report AS sr on sr.ID = su.sumher_report_ID
   				LEFT JOIN sumehr AS s on s.ID = sr.sumehr_ID
	    		WHERE `key`='$key' AND `delete`='0'  
   				AND s.user_ID = '$userID'
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
    
   	function getImage($key,$thumbnail,$userID,$currentUserID) {
   		
   		$sql =  "SELECT `thumbnail_".$thumbnail."` AS thumbnail
    			FROM 
				sumehr_upload AS su,
				sumehr AS s, 
				sumehr_report AS sr
				LEFT JOIN group_assigned gr_a on gr_a.user ='$currentUserID'
				LEFT JOIN sumehr_report_assigned sr_a on sr_a.group = gr_a.group AND sr_a.sumehr_report = sr.id
				WHERE su.key='$key' 
				AND su.delete='0' 
				AND s.ID = sr.sumehr_ID
				AND su.sumher_report_ID = sr.ID 
				AND s.user_ID = '$userID'
				AND (sr_a.group != '' or s.user_ID = '$currentUserID') LIMIT 1";
		
   		$sel = mysql_query($sql);
	    $file = mysql_fetch_array($sel);
        if (!empty($file)) {
        	header("Content-type: image/jpeg"); // act as a jpg file to browser 
			echo $file['thumbnail'];
        } else {
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
   			$sql = "SELECT DISTINCT MAX(sr.datetime) as latest_modification_date, p.id as patient_id, p.nom as patient_nom, p.prenom as patient_prenom, date_format(p.date_naissance, '%d/%m/%Y') as patient_date_naissance, s.ID as sumehr_id
   					FROM patients AS p
   					LEFT JOIN sumehr AS s on s.patient_ID = p.ID
   					LEFT JOIN sumehr_report AS sr on sr.sumehr_ID = s.ID
   					LEFT JOIN user AS u on s.user_ID = u.ID
   					WHERE ( lower(concat(p.nom,' ',p.prenom)) regexp '$value' OR lower(concat(p.prenom,' ',p.nom)) regexp '$value' ) 
	   				GROUP BY sr.sumehr_ID, p.id
   					ORDER BY patient_nom, patient_prenom 
   					LIMIT $limit";
   		} else {
   			
   			$sql = "SELECT 
					p.id as patient_id, 
					p.nom as patient_nom, 
					p.prenom as patient_prenom, 
					date_format(p.date_naissance, '%d/%m/%Y') as patient_date_naissance,
					concat(u.familyname,' ',u.firstname) as user,
					u.ID as user_id
					FROM patients AS p
   					LEFT JOIN user AS u on 1=1
					WHERE u.ID = '$userid' 
					AND( lower(concat(p.nom,' ',p.prenom)) regexp '$value' OR lower(concat(p.prenom,' ',p.nom)) regexp '$value' ) 
   					LIMIT $limit";
   					
   			$sel1 = mysql_query($sql);

        	$sumehrs = array();

        	while ($sumehr = mysql_fetch_array($sel1)) {
        	
           	 	$sumehr["patient_id"] 				= $sumehr["patient_id"];
            	$sumehr["patient_familyname"] 		= stripslashes($sumehr["patient_nom"]);
            	$sumehr["patient_firstname"] 		= stripslashes($sumehr["patient_prenom"]);
            	$sumehr["patient_birthdate"] 		= stripslashes($sumehr["patient_date_naissance"]);
           		$sumehr["user_id"] 					= stripslashes($sumehr["user_id"]);
            	$sumehr["user"] 					= stripslashes($sumehr["user"]);
            
           		$sql = "SELECT 
           			MAX(sr.datetime) as latest_modification_date, 
           			s.ID as sumehr_id
   					FROM sumehr AS s
   					LEFT JOIN sumehr_report AS sr ON sr.sumehr_ID = s.ID
   					WHERE s.patient_ID = '".$sumehr["patient_id"]."'
   					AND s.user_ID = '".$sumehr["user_id"]."'
   					GROUP BY sr.sumehr_ID
   					LIMIT 1";
   				
   				$sel2 = mysql_query($sql);
   			
        		if (mysql_num_rows($sel2) == 1) {
        			$sumehrdetail = mysql_fetch_array($sel2);
        			$sumehr["sumehr_id"] 				= $sumehrdetail["sumehr_id"];
        			$sumehr["latest_modification_date"] = stripslashes($sumehrdetail["latest_modification_date"]);
				}
            
            	array_push($sumehrs, $sumehr);
            
        	}
    	}

        if (!empty($sumehrs))  {	
            return $sumehrs;
        } else  {
            return false;
        }

    }
    
    /** Make a search for sumehr report
     *
     * @param value
     * @return array
     * 
     **/
	function modulesearchfrommanager($patientID,$patient,$doctorID,$doctor,$limit) {
    	
		$sql = "SELECT 
					DISTINCT MAX(sr.datetime) as latest_modification_date,
					p.id as patient_id, 
					p.nom as patient_nom, 
					p.prenom as patient_prenom, 
					date_format(p.date_naissance, '%d/%m/%Y') as patient_date_naissance,
					concat(u.familyname,' ',u.firstname) as user,
					u.ID as user_id,
					s.ID as sumehr_id
   					FROM patients AS p
   					LEFT JOIN user AS u on 1=1
					LEFT JOIN sumehr AS s on s.patient_ID = p.id AND s.user_ID = u.id 
   					LEFT JOIN sumehr_report AS sr ON sr.sumehr_ID = s.ID
   					WHERE ( lower(concat(p.nom,' ',p.prenom)) regexp '$patient' OR lower(concat(p.prenom,' ',p.nom)) regexp '$patient' ) 
   					AND ( lower(concat(u.firstname,' ',u.familyname)) regexp '$doctor' OR lower(concat(u.familyname,' ',u.firstname)) regexp '$doctor' ) 
   					GROUP BY sr.sumehr_ID, p.id, u.ID
   					ORDER BY patient_nom, patient_prenom 
   					LIMIT $limit";
   					
		$sql = "SELECT 
					p.id as patient_id, 
					p.nom as patient_nom, 
					p.prenom as patient_prenom, 
					date_format(p.date_naissance, '%d/%m/%Y') as patient_date_naissance,
					concat(u.familyname,' ',u.firstname) as user,
					u.ID as user_id
					FROM patients AS p
   					LEFT JOIN user AS u on 1=1
					WHERE ( lower(concat(p.nom,' ',p.prenom)) regexp '$patient' OR lower(concat(p.prenom,' ',p.nom)) regexp '$patient' ) 
   					AND ( lower(concat(u.firstname,' ',u.familyname)) regexp '$doctor' OR lower(concat(u.familyname,' ',u.firstname)) regexp '$doctor' ) 
   					LIMIT $limit";
   					
   	        //echo $sql;				
   		$sel1 = mysql_query($sql);

        $sumehrs = array();

        while ($sumehr = mysql_fetch_array($sel1)) {
        	
            $sumehr["patient_id"] 				= $sumehr["patient_id"];
            $sumehr["patient_familyname"] 		= stripslashes($sumehr["patient_nom"]);
            $sumehr["patient_firstname"] 		= stripslashes($sumehr["patient_prenom"]);
            $sumehr["patient_birthdate"] 		= stripslashes($sumehr["patient_date_naissance"]);
            $sumehr["user_id"] 					= stripslashes($sumehr["user_id"]);
            $sumehr["user"] 					= stripslashes($sumehr["user"]);
            
           	$sql = "SELECT 
           			MAX(sr.datetime) as latest_modification_date, 
           			s.ID as sumehr_id
   					FROM sumehr AS s
   					LEFT JOIN sumehr_report AS sr ON sr.sumehr_ID = s.ID
   					WHERE s.patient_ID = '".$sumehr["patient_id"]."'
   					AND s.user_ID = '".$sumehr["user_id"]."'
   					GROUP BY sr.sumehr_ID
   					LIMIT 1";
   					
	   		//echo $sql;
           	
   			$sel2 = mysql_query($sql);
   			
        	if (mysql_num_rows($sel2) == 1) {
        		$sumehrdetail = mysql_fetch_array($sel2);
        		$sumehr["sumehr_id"] 				= $sumehrdetail["sumehr_id"];
        		$sumehr["latest_modification_date"] = stripslashes($sumehrdetail["latest_modification_date"]);
			}
            
            array_push($sumehrs, $sumehr);
            
        }

        if (!empty($sumehrs))  {	
            return $sumehrs;
        } else  {
            return false;
        }

    }

    function subHTML($html) {
    	$maxchar = 256;
    	if (strlen($html)>$maxchar) {
    		return substr(html_entity_decode($html, ENT_COMPAT | ENT_HTML401, 'ISO-8859-1'),0,$maxchar)."...";
    	} else {
    		return substr(html_entity_decode($html, ENT_COMPAT | ENT_HTML401, 'ISO-8859-1'),0,$maxchar);
    	}
    }


	// get all Report order by date
	

}

?>
