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
class ouvrier
{
    public $mylog;

    function __construct()
    {
        $this->mylog = new mylog;
    }

    /**
     * Add Ouvrier
     *
     */
    function add($firstname, $familyname, $salaire_horaire, $bonus_recurrent, $cout_recurrent) {
    	
    	
    	$familyname      = mysql_real_escape_string($familyname);
        $firstname       = mysql_real_escape_string($firstname);
        $salaire_horaire = mysql_real_escape_string($salaire_horaire);
        $bonus_recurrent = mysql_real_escape_string($bonus_recurrent);
        $cout_recurrent  = mysql_real_escape_string($cout_recurrent);
		$position		 = $this->getMaxPosition() + 1;
		
        $sql = "INSERT `ouvriers` ( `nom` , `prenom` , `salaire_horaire` , `bonus_recurrent` , `cout_recurrent`, `position` )
				VALUES ( '$familyname', '$firstname', '$salaire_horaire', '$bonus_recurrent', '$cout_recurrent', '$position' );";

		$ins = mysql_query($sql);
		$insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
        
    }
    
    /**
     * Update Ouvrier
     *
     */
    function update($firstname, $familyname, $salaire_horaire, $bonus_recurrent, $cout_recurrent, $id) {
    	
        $ouvrierID = (int) mysql_real_escape_string($id);
        
        $familyname = mysql_real_escape_string($familyname);
        $firstname = mysql_real_escape_string($firstname);
        $salaire_horaire = mysql_real_escape_string($salaire_horaire);
        $bonus_recurrent = mysql_real_escape_string($bonus_recurrent);
        $cout_recurrent  = mysql_real_escape_string($cout_recurrent);
        
        $id = mysql_real_escape_string($id);
        
        $id = (int) $id;
        
        $sql = "UPDATE ouvriers SET nom='$familyname', prenom='$firstname', salaire_horaire='$salaire_horaire', bonus_recurrent='$bonus_recurrent', cout_recurrent='$cout_recurrent' WHERE ID='$id'";
        
        $upd = mysql_query($sql);
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }
    
    // Get actual max position
	function getMaxPosition() {
    	
        $sql = "SELECT MAX(position) AS max_position FROM ouvriers";
		$sel = mysql_query($sql);
	  	$result = mysql_fetch_array($sel);
	  	if (!empty($result)) {
	  		return $result['max_position'];
	        } else {
            return false;
        }
    }
    
    // Get postion current user
	function getCurrentPosition($ID) {
    	
        $sql = "SELECT position FROM ouvriers WHERE ID='$ID'";
		$sel = mysql_query($sql);
	  	$result = mysql_fetch_array($sel);
	  	if (!empty($result)) {
	  		return $result['position'];
	        } else {
            return false;
        }
    }
    
    // Update all position
    function updatePosition($position,$id) {
    	
        $position = (int) mysql_real_escape_string($position);
        $id = (int) mysql_real_escape_string($id);
        
        $sql = "UPDATE ouvriers SET position='$position' WHERE ID='$id' Limit 1";
        echo $sql;
        
        $upd = mysql_query($sql);
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }
    
	/**
     * 
     * FOR A DAY
     */
    function getAllPlanning($dayofweek) {
    	
    	// GET ALL WORKER
        $sql1 = "SELECT
			ID AS ID,
			nom AS nom, 
			prenom AS prenom,
			salaire_horaire AS salaire_horaire,
			bonus_recurrent AS bonus_recurrent,
			cout_recurrent  AS cout_recurrent
			FROM ouvriers 
			ORDER BY position ASC";
        
        // GET PLANNING GROUP BY WORKER
     	$sql2 = "SELECT
			o.ID AS ID,
			SUM(p.length) AS week_length,
			SUM(p.salaire_horaire) AS week_salaire,
			SUM(p.bonus_recurrent) AS week_bonus_recurrent,
			SUM(p.cout_recurrent) AS week_cout_recurrent
			FROM ouvriers o 
			LEFT JOIN planning p ON o.ID = p.ouvrier_ID
			WHERE p.planning_version_ID = '0'
			GROUP BY o.ID";

        // GET PLANNING GROUP BY DAY
     	$sql3 = "SELECT 
     		SUM(length) AS day_length,
			SUM(salaire_horaire) AS day_salaire,
			SUM(bonus_recurrent) AS day_bonus_recurrent,
			SUM(cout_recurrent) AS day_cout_recurrent
			FROM planning
			WHERE planning_version_ID = '0'
			AND day_week = '$dayofweek'
			GROUP BY day_week";
     	
	  	$sel1 = mysql_query($sql1);
	  	$sel2 = mysql_query($sql2);
	  	$sel3 = mysql_query($sql3);
	  	
	    $ouvrier = array();
	  	$ouvriers = array();
	    $total = array();
	    
	    // GET ALL WORKER
        while ($ouvrier = mysql_fetch_array($sel1)) {
        	$ouvrier["ID"] = stripslashes($ouvrier["ID"]);
            $ouvrier["nom"] = stripslashes($ouvrier["nom"]);
            $ouvrier["prenom"] = stripslashes($ouvrier["prenom"]);
        	$ouvrier["week_hour"] = 0;
            $ouvrier["week_salaire"] = 0;
            $ouvriers[$ouvrier["ID"]] = $ouvrier;
        }

        // GET PLANNING GROUP BY WORKER
        while ($ouvrier = mysql_fetch_array($sel2)) {
            $ouvriers[$ouvrier["ID"]]["week_hour"] = round ($ouvrier["week_length"] / 60,2);
            $ouvriers[$ouvrier["ID"]]["week_salaire"] = round($ouvrier["week_salaire"],2);
            $ouvriers[$ouvrier["ID"]]["week_salaire_net"] = round($ouvrier["week_salaire"]+$ouvrier["week_bonus_recurrent"]+$ouvrier["week_cout_recurrent"],2);
            $total["week_hour"] += $ouvriers[$ouvrier["ID"]]["week_hour"];
           	$total["week_salaire"] += $ouvriers[$ouvrier["ID"]]["week_salaire"];
           	$total["week_salaire_net"] += $ouvriers[$ouvrier["ID"]]["week_salaire_net"];
        }
        
        // GET PLANNING GROUP BY DAY
        while ($ouvrier = mysql_fetch_array($sel3)) {
        	$total["day_hour"]		= round ($ouvrier["day_length"] / 60,2);
        	$total["day_salaire"]	= round ($ouvrier["day_salaire"],2);
        	$total["day_salaire_net"]	= round ($ouvrier["day_salaire"] + $ouvrier["day_bonus_recurrent"] + $ouvrier["day_cout_recurrent"] ,2);
        }
        
        $ouvriers[9999999] = $total;
        
        if (!empty($ouvriers)) {	
            return $ouvriers;
        }
        else {
            return false;
        }
    	
    }
    
    // ??
    function getAll() {
    	
        $sql = "SELECT
			ID AS ID,
			nom AS nom, 
			prenom AS prenom,
			salaire_horaire AS salaire_horaire,
			bonus_recurrent AS bonus_recurrent,
			cout_recurrent  AS cout_recurrent
			FROM ouvriers 
			ORDER BY position ASC";
        
	  	$sel = mysql_query($sql);
	  	
	  	$ouvriers = array();
	    
        while ($ouvrier = mysql_fetch_array($sel)) {
        	$ouvrier["ID"] = stripslashes($ouvrier["ID"]);
            $ouvrier["nom"] = stripslashes($ouvrier["nom"]);
            $ouvrier["prenom"] = stripslashes($ouvrier["prenom"]);
        	array_push($ouvriers, $ouvrier);
        }
        
        if (!empty($ouvriers)) {	
            return $ouvriers;
        }
        else {
            return false;
        }
    	
    }
    
	/**
     * Get a ouvrier
     *
     * @param int $id ouvier ID
     * @return array $ouvrier
     */
    function get($ID) {
        
    	$ID = (int) $ID;
        $sql = "SELECT * FROM ouvriers WHERE id ='$ID' LIMIT 1";
			
	  	$sel = mysql_query($sql);
	  	$ouvrier = mysql_fetch_array($sel);

	  	if (!empty($ouvrier)) {

  			$ouvrier["ID"]              = $ouvrier["ID"];
	  		$ouvrier["nom"]      = stripcslashes($ouvrier["nom"]);
	  		$ouvrier["prenom"]       = stripcslashes($ouvrier["prenom"]);
  			$ouvrier["familyname"]      = stripcslashes($ouvrier["nom"]);
	  		$ouvrier["firstname"]       = stripcslashes($ouvrier["prenom"]);
	  		$ouvrier["salaire_horaire"] = stripcslashes($ouvrier["salaire_horaire"]);
	  		$ouvrier["bonus_recurrent"] = stripcslashes($ouvrier["bonus_recurrent"]);
	  		$ouvrier["cout_recurrent"]  = stripcslashes($ouvrier["cout_recurrent"]);
	  		return $ouvrier;
	  	
	  	} else {
            return false;
        }
    	
    }
    
	 /* Make a search
     *
     * @param value
     * @return array
     */
    function modulesearch($id,$value,$limit) {

    	if ($id!='' && $id!='undefined' && $id!= null)
    		$sql = "SELECT 
    				o.ID as ID, 
    				o.nom as ouvrier_nom, 
    				o.prenom as ouvrier_prenom, 
    				o.salaire_horaire as ouvrier_salaire_horaire, 
    				o.bonus_recurrent as ouvrier_bonus_recurrent, 
    				o.cout_recurrent as ouvrier_cout_recurrent 
    				FROM ouvriers o WHERE o.ID='$id'";
		else 
    		$sql = "SELECT 
    				o.ID as ID, 
    				o.nom as ouvrier_nom, 
    				o.prenom as ouvrier_prenom, 
    				o.salaire_horaire as ouvrier_salaire_horaire, 
    				o.bonus_recurrent as ouvrier_bonus_recurrent, 
    				o.cout_recurrent as ouvrier_cout_recurrent 
    				FROM ouvriers o 
    				WHERE (
    				lower(concat(o.nom, ' ' ,o.prenom)) regexp '$value'
    				OR 
    				lower(concat(o.prenom, ' ' ,o.nom)) regexp '$value'
    				) ORDER BY ouvrier_nom, ouvrier_prenom Limit $limit";
		
    	$sel = mysql_query($sql);

        $ouvriers = array();

        while ($ouvrier = mysql_fetch_array($sel)) {
        	
            $ouvrier["ID"]       				= stripslashes($ouvrier["ID"]);
            $ouvrier["ouvrier_nom"]      		= stripslashes($ouvrier["ouvrier_nom"]);
            $ouvrier["ouvrier_prenom"]   		= stripslashes($ouvrier["ouvrier_prenom"]);
            $ouvrier["ouvrier_salaire_horaire"] = stripslashes($ouvrier["ouvrier_salaire_horaire"]);
            $ouvrier["ouvrier_bonus_recurrent"] = stripslashes($ouvrier["ouvrier_bonus_recurrent"]);
            $ouvrier["ouvrier_cout_recurrent"]  = stripslashes($ouvrier["ouvrier_cout_recurrent"]);
           
            array_push($ouvriers, $ouvrier);
        }

        if (!empty($ouvriers))  {	
            return $ouvriers;
        }
        else  {
            return false;
        }

    }
    
    // delete a user
    function delete($ID) {
    	
        $ID = (int) $ID;

        $currentPosition = $this->getCurrentPosition($ID);
        
        $sql1 = "DELETE FROM ouvriers WHERE ID = $ID LIMIT 1";
        $sql2 = "DELETE FROM planning WHERE ouvrier_ID = $ID";
        $sql3 = "UPDATE ouvriers SET position=position-1 WHERE position > $currentPosition";
        
        $del1 = mysql_query($sql1);
        $del2 = mysql_query($sql2);
        $upd3 = mysql_query($sql3);
        
        if ($del1) {
            return true;
        } else {
            return false;
        }
        
    }

	/* Make a autocomplete
     *
     * @param value
     * @return array
     */
    function detail($id) {
    
		$sql = "SELECT 
				ID, 
				nom,
				prenom,
				salaire_horaire,
				bonus_recurrent,
				cout_recurrent
				FROM `ouvriers`
				WHERE ID = '$id'";
    	
	    $result = mysql_query($sql);
	
		if(mysql_num_rows($result)==1) {
			$data = mysql_fetch_assoc($result);
			$ouvrierID = $data['ID'];
			$ouvrierNom = $data['nom'];
			$ouvrierPrenom = $data['prenom'];
			$ouvrierSalaireHoraire = $data['salaire_horaire'];
			$ouvrierBonusRecurrent = $data['bonus_recurrent'];
			$ouvrierCoutRecurrent = $data['cout_recurrent'];
		}
	
		$reponse['ouvrier_ID'] = utf8_encode($ouvrierID);
		$reponse['ouvrier_nom'] = utf8_encode($ouvrierNom);
		$reponse['ouvrier_prenom'] = utf8_encode($ouvrierPrenom);
		$reponse['ouvrier_salaire_horaire'] = utf8_encode($ouvrierSalaireHoraire);
		$reponse['ouvrier_bonus_recurrent'] = utf8_encode($ouvrierBonusRecurrent);
		$reponse['ouvrier_cout_recurrent'] = utf8_encode($ouvrierCoutRecurrent);
		
		header('Content-Type: application/json');
		echo json_encode($reponse);

    }

}
?>