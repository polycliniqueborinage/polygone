<?php
/**
 * Provides methods to interact with planning
 *
 * @author Calcus David, Marique Benjamin
 * @name user
 * @version 2
 * @package Polygone
 * @link http://www.mariquecalcus.be
 */
class planning
{
    public $mylog;

    /**
     * Konstruktor
     * Initialisiert den Eventlog
     */
    function __construct() {
        $this->mylog = new mylog;
    }
    
    //  Version Loading
	function loadVersion($ID) {
		
		// DELETE
		$sql = "DELETE FROM `planning` WHERE planning_version_ID = '0'";
		
		$del = mysql_query($sql);

		$sql = "SELECT * FROM `planning` WHERE ( planning_version_ID = '$ID' )";

		$sel = mysql_query($sql);
	
	    while ($planning = mysql_fetch_array($sel)) {

    		$this->add($planning["ouvrier_ID"],$planning["day_week"],$planning["date"],0,$planning["top"],$planning["length"],$planning["bonus_recurrent"],$planning["cout_recurrent"],$planning["bonus_recurrent_comment"],$planning["cout_recurrent_comment"],$planning["salaire_horaire"],$planning["revenue"],$planning["resource_ID"],$planning["resource"],$planning["comment"],$planning["color1"],$planning["color2"]);
	    
	    }
    	
    }
    
    //  Version Creating
    function createVersion($name) {
    	
    	$name = mysql_real_escape_string($name);
    	
    	$sql = " INSERT INTO `planning_version` (`name`,`time`) VALUES ( '$name',now())";
        
		$ins = mysql_query($sql);
        $insid = mysql_insert_id();
		
        if ($ins) {
			
			$sql = "SELECT * FROM `planning` WHERE ( planning_version_ID = '0' )";

			$sel = mysql_query($sql);
	
	        while ($planning = mysql_fetch_array($sel)) {

    	    	$this->add($planning["ouvrier_ID"],$planning["day_week"],$planning["date"],$insid,$planning["top"],$planning["length"],$planning["bonus_recurrent"],$planning["cout_recurrent"],$planning["bonus_recurrent_comment"],$planning["cout_recurrent_comment"],$planning["salaire_horaire"],$planning["revenue"],$planning["resource_ID"],$planning["resource"],$planning["comment"],$planning["color1"],$planning["color2"]);
	            
	        }
			
            return $insid;
            
        } else {
            return false;
        }
    	
    }
    
	function deleteVersion($ID) {
    	
		$sql1 = "DELETE FROM `planning` WHERE ( planning_version_ID = '$ID' )";
		echo $sql1;
		$sql2 = "DELETE FROM `planning_version` WHERE ( ID = '$ID' )";
		$del1 = mysql_query($sql1);
		echo $sql2;
		$del2 = mysql_query($sql2);
		
		if ($del) {
            return true;
        } else {
            return false;
        }
    
    }

    // Version Get name
    function getVersionName($ID) {

    	$sql = "SELECT * FROM planning_version WHERE ID='$ID'";
		
    	$sel = mysql_query($sql);

        $planning = mysql_fetch_array($sel);
       
        if (!empty($planning))  {	
        	return stripslashes($planning["name"]);
        }
        else  {
            return false;
        }

    }
    
    function getChipDay($dayofweek,$date,$versionID,$height) {
    	
		$sql = "SELECT 
				
				p.ID AS planning_ID, 
				p.top AS planning_top,
				p.length AS planning_length,
				p.salaire_horaire AS planning_salaire,
				p.bonus_recurrent AS planning_bonus_recurrent,
				p.cout_recurrent AS planning_cout_recurrent,
				p.revenue AS planning_revenue,
				p.resource_ID AS planning_resource_ID,
				p.resource AS planning_resource,
				p.comment AS planning_comment,
				p.color1 AS planning_color1, 
				p.color2 AS planning_color2,
				
				o.position as top
				FROM `planning` AS p 
				LEFT JOIN ouvriers AS o ON p.ouvrier_ID = o.ID 
				WHERE `day_week` = '$dayofweek' 
				AND ( planning_version_ID = '0' )
				ORDER BY o.position ASC";
				
       	$sel = mysql_query($sql);

        $plannings = array();
        
        while ($planning = mysql_fetch_array($sel)) {
        	
            $planning["planning_hour"] = round ($planning["planning_length"] / 60,2); 
        	$planning["top"] = $planning["top"] * $height; 
            $planning["planning_color1"] = "#".$planning["planning_color1"]; 
            $planning["planning_color2"] = "#".$planning["planning_color2"];
            $planning["planning_salaire"] = stripslashes($planning["planning_salaire"]);
            $planning["planning_revenue"] = stripslashes($planning["planning_revenue"]);
            $planning["planning_resource"] = stripslashes($planning["planning_resource"]);
            $planning["planning_comment"] = stripslashes($planning["planning_comment"]);
            
            array_push($plannings, $planning);
        }

        if (!empty($plannings)) {	
            return $plannings;
        }
        else {
            return false;
        }

    }
    
    // Add new entry in current planning
    function add($ouvrierID,$dayofweek,$date,$versionID,$top,$length,$bonusRecurrent,$coutRecurrent,$bonusRecurrentComment,$coutRecurrentComment,$salaireHoraire,$revenue,$resourceID,$resource,$comment,$color1,$color2) {
    	
    	$ouvrierID = (int) mysql_real_escape_string($ouvrierID);
    	$dayofweek = (int) mysql_real_escape_string($dayofweek);
    	$date = mysql_real_escape_string($date);
    	$versionID = (int) mysql_real_escape_string($versionID);
    	$top = mysql_real_escape_string($top);
    	$length = mysql_real_escape_string($length);
    	$bonusRecurrent = mysql_real_escape_string($bonusRecurrent);
    	$bonusRecurrentComment = mysql_real_escape_string($bonusRecurrentComment);
    	$coutRecurrent = mysql_real_escape_string($coutRecurrent);
    	$coutRecurrentComment = mysql_real_escape_string($coutRecurrentComment);
    	$salaireHoraire = mysql_real_escape_string($salaireHoraire);
    	$revenue = mysql_real_escape_string($revenue);
    	$resourceID = mysql_real_escape_string($resourceID);
    	$resource = mysql_real_escape_string($resource);
    	$comment = mysql_real_escape_string($comment);
    	$color1 = mysql_real_escape_string($color1);
    	$color2 = mysql_real_escape_string($color2);
    	
    	$sql = " INSERT INTO `planning` 
    			(`ouvrier_ID` , `day_week` , `date`, `planning_version_ID`, `top` , `length` , `salaire_horaire` , `bonus_recurrent` , `cout_recurrent`, `bonus_recurrent_comment` , `cout_recurrent_comment`, `revenue` , `resource_ID` ,  `resource` , `comment` , `color1` , `color2` )
				VALUES ( '$ouvrierID', '$dayofweek', '$date', '$versionID', '$top', '$length', '$salaireHoraire', '$bonusRecurrent', '$coutRecurrent', 		'$bonusRecurrentComment', '$coutRecurrentComment',  	'$revenue' , '$resourceID','$resource', '$comment', '$color1', '$color2')";
        
		$ins = mysql_query($sql);
        $insid = mysql_insert_id();
		if ($ins) {
            return $insid;
        } else {
            return false;
        }
    	
    }

    // Update entry in current planning
    function update($planningID,$versionID,$top,$length,$bonusRecurrent,$coutRecurrent,$bonusRecurrentComment,$coutRecurrentComment,$salaireHoraire,$revenue,$resourceID,$resource,$comment,$color1,$color2) {
    	
    	$versionID = (int) mysql_real_escape_string($versionID);
    	$top = mysql_real_escape_string($top);
    	$length = mysql_real_escape_string($length);
    	$bonusRecurrent = mysql_real_escape_string($bonusRecurrent);
    	$coutRecurrent = mysql_real_escape_string($coutRecurrent);
    	$salaireHoraire = mysql_real_escape_string($salaireHoraire);
    	$revenue = mysql_real_escape_string($revenue);
    	$resourceID = mysql_real_escape_string($resourceID);
    	$resource = mysql_real_escape_string($resource);
    	$comment = mysql_real_escape_string($comment);
    	$color1 = mysql_real_escape_string($color1);
    	$color2 = mysql_real_escape_string($color2);
    	
    	$sql = "UPDATE `planning` 
    			SET 
    			`top` = '$top',
				`length` = '$length',
				`salaire_horaire` = '$salaireHoraire',
				`bonus_recurrent` = '$bonusRecurrent',
				`cout_recurrent` = '$coutRecurrent',
				`bonus_recurrent_comment` = '$bonusRecurrentComment',
				`cout_recurrent_comment` = '$coutRecurrentComment',
				`revenue` = '$revenue',
				`resource_ID` = '$resourceID',
				`resource` = '$resource',
				`comment` = '$comment',
				`color1` = '$color1', 
				`color2` = '$color2' 
				WHERE ID = $planningID LIMIT 1";
				
    	$udp = mysql_query($sql);
        
    	if ($udp) {
            return true;
        } else {
            return false;
        }
    	
    }
    
    // Delete entry in current planning
    function delete($planningID) {
    	
		// DELETE
		$sql = "DELETE FROM `planning` WHERE ID = '$planningID' LIMIT 1";
		$del = mysql_query($sql);
		
		if ($del) {
            return true;
        } else {
            return false;
        }
    
    }

  	function deleteForUser($userID) {
    	
		$sql = "DELETE FROM `planning`
				WHERE `ouvrier_ID` = '$userID'
				AND ( planning_version_ID = '0' )";
				
		echo $sql;
		
		
  		$del = mysql_query($sql);
		
		if ($del) {
            return true;
        } else {
            return false;
        }
    
    }

    function deleteForDay($dayofweek) {
    	
		$sql = "DELETE FROM `planning`
				WHERE `day_week` = '$dayofweek' 
				AND ( planning_version_ID = '0' )";
		$del = mysql_query($sql);
		
		if ($del) {
            return true;
        } else {
            return false;
        }
    
    }

   	function deleteAll() {
    	
		$sql = "DELETE FROM `planning`
				WHERE ( planning_version_ID = '0' )";
		$del = mysql_query($sql);
		
		if ($del) {
            return true;
        } else {
            return false;
        }
    
    }
    
    function detail($id) {
    
		$sql = "SELECT 
				
				o.position as top, 
				o.nom as ouvrier_nom,
				o.prenom as ouvrier_prenom,
				o.salaire_horaire AS ouvrier_salaire_horaire,
				o.bonus_recurrent AS ouvrier_bonus_recurrent,
				o.cout_recurrent AS ouvrier_cout_recurrent,
				
				p.ID AS planning_ID, 
				p.top AS planning_top,
				p.length AS planning_length,
				p.salaire_horaire AS planning_salaire_horaire,
				p.bonus_recurrent AS planning_bonus_recurrent,
				p.cout_recurrent AS planning_cout_recurrent,
				p.bonus_recurrent_comment AS planning_bonus_recurrent_comment,
				p.cout_recurrent_comment AS planning_cout_recurrent_comment,
				p.revenue AS planning_revenue,
				p.resource_ID AS planning_resource_ID,
				p.resource AS planning_resource,
				p.comment AS planning_comment
				
				FROM `planning` AS p 
				LEFT JOIN ouvriers AS o ON p.ouvrier_ID = o.ID 
				WHERE p.ID = '$id'";
    	
				
				//echo $sql;
				
	    $result = mysql_query($sql);
	
		if(mysql_num_rows($result)==1) {
			$data = mysql_fetch_assoc($result);
			
			$ouvrierNom = $data['ouvrier_nom'];
			$ouvrierPrenom = $data['ouvrier_prenom'];
			$ouvrierSalaireHoraire = $data['ouvrier_salaire_horaire'];
			$ouvrierBonusRecurrent = $data['ouvrier_bonus_recurrent'];
			$ouvrierCoutRecurrent = $data['ouvrier_cout_recurrent'];
			
			$planningID = $data['planning_ID'];
			$planningHour = round ($data["planning_length"] / 60,2); 
			$planningSalaire = $data['planning_salaire_horaire'];
			$planningBonusRecurrent = $data['planning_bonus_recurrent'];
			$planningCoutRecurrent = $data['planning_cout_recurrent'];
			$planningBonusRecurrentComment = $data['planning_bonus_recurrent_comment'];
			$planningCoutRecurrentComment = $data['planning_cout_recurrent_comment'];
			$planningRevenue = $data['planning_revenue'];			
			$planningResourceID = $data['planning_resource_ID'];
			$planningResource = $data['planning_resource'];
			$planningComment = $data['planning_comment'];
			
		}
	
		$reponse['planning_ID'] 					= $planningID;
		$reponse['ouvrier_nom'] 					= utf8_encode($ouvrierNom);
		$reponse['ouvrier_prenom'] 					= utf8_encode($ouvrierPrenom);
		$reponse['ouvrier_salaire_horaire'] 		= utf8_encode($ouvrierSalaireHoraire);
		$reponse['ouvrier_bonus_recurrent'] 		= utf8_encode($ouvrierBonusRecurrent);
		$reponse['ouvrier_cout_recurrent'] 			= utf8_encode($ouvrierCoutRecurrent);
		$reponse['planning_hour'] 					= utf8_encode($planningHour);
		$reponse['planning_salaire'] 				= utf8_encode($planningSalaire);
		$reponse['planning_bonus_recurrent'] 		= utf8_encode($planningBonusRecurrent);
		$reponse['planning_cout_recurrent'] 		= utf8_encode($planningCoutRecurrent);
		$reponse['planning_bonus_recurrent_comment']= utf8_encode($planningBonusRecurrentComment);
		$reponse['planning_cout_recurrent_comment'] = utf8_encode($planningCoutRecurrentComment);
		$reponse['planning_revenue'] 				= utf8_encode($planningRevenue);
		$reponse['planning_resource_ID'] 			= utf8_encode($planningResourceID);
		$reponse['planning_resource'] 				= utf8_encode($planningResource);
		$reponse['planning_comment'] 				= utf8_encode($planningComment);
		
		header('Content-Type: application/json');
		echo json_encode($reponse);

    }
    
	function modulesearch($id,$value,$limit) {

    	if ($id!='' && $id!='undefined' && $id!= null)
    		$sql = "SELECT * FROM planning_version WHERE ID='$id'";
		else 
    		$sql = "SELECT * FROM planning_version WHERE ( lower(name) regexp '$value' ) ORDER BY name Limit $limit";
		
    	$sel = mysql_query($sql);

        $plannings = array();

        while ($planning = mysql_fetch_array($sel)) {
        	
            $planning["ID"]       				= stripslashes($planning["ID"]);
            $planning["name"]      				= stripslashes($planning["name"]);
           
            array_push($plannings, $planning);
        }

        if (!empty($plannings))  {	
            return $plannings;
        }
        else  {
            return false;
        }

    }
    
    // get all entry for a User
    function getWeekUser($ID) {
    
        $sql = "SELECT 
        		length AS planning_length,
				salaire_horaire AS planning_salaire_horaire,
                day_week AS planning_day_week,
                resource AS planning_resource,
                comment AS planning_comment
                FROM `planning`
                WHERE ouvrier_ID = '$ID'
				AND planning_version_ID = '0'
				ORDER BY planning_day_week ASC";
				
        $result = mysql_query($sql);
    
        $jours = array();
        
        while ($jour = mysql_fetch_array($result)) {
            
            $jour['ouvrier_nom']        = stripslashes($jour['ouvrier_nom']);
            $jour['ouvrier_prenom']     = stripslashes($jour['ouvrier_prenom']);
            $jour['planning_hour']      = round ($jour["planning_length"] / 60,2);
            $jour['planning_day_week']  = stripslashes($jour['planning_day_week']);
            $jour['planning_resource']	= stripslashes($jour['planning_resource']);
            $jour['planning_comment']   = stripslashes($jour['planning_comment']);
            
            $jours[$jour['planning_day_week']] = $jour;
        }
        
        if (!empty($jours)) {    
            return $jours;
        }
        else {
            return false;
        }

    }
    
}

?>