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
class acte
{
    public $mylog;

    /**
     * Konstruktor
     * Initialisiert den Eventlog
     */
    function __construct()
    {
        $this->mylog = new mylog;
    }

    /**
     * Creates a acte
     *
     */
    function add($code, $description, $cecodis, $coutTR, $coutTP, $coutVP, $coutSM, $length) {
    	
		$code = mysql_real_escape_string($code);
        $description = mysql_real_escape_string($description);
        $cecodis = mysql_real_escape_string($cecodis);
        $coutTR = mysql_real_escape_string($coutTR);
        $coutTP = mysql_real_escape_string($coutVP);
        $coutVP = mysql_real_escape_string($address1);
        $coutSM = mysql_real_escape_string($coutSM);
        $length = mysql_real_escape_string($length);
        
        $sql = "INSERT INTO actes (code,description,cecodis,cout_tr,cout_tp,cout_vp,cout_sm,length) VALUES ('$code','$description','$cecodis','$coutTR','$coutTP','$coutVP','$coutSM','$length')";
       
        $ins1 = mysql_query($sql);

        // get current ID
        $insid = mysql_insert_id();
        
        if ($ins1) {
            //$this->mylog->add($name, 'user', 1, 0);
            return $insid;
        } else {
            return false;
        }
                
    }
    
    /**
     * UPDATE acte
     *
     */
    function update($code, $description, $cecodis, $coutTR, $coutTP, $coutVP, $coutSM, $length, $id) {
    	
		$code = mysql_real_escape_string($code);
        $description = mysql_real_escape_string($description);
        $cecodis = mysql_real_escape_string($cecodis);
        $coutTR = mysql_real_escape_string($coutTR);
        $coutTP = mysql_real_escape_string($coutTP);
        $coutVP = mysql_real_escape_string($coutVP);
        $coutSM = mysql_real_escape_string($coutSM);
        $length = mysql_real_escape_string($length);
		$id = mysql_real_escape_string($id);
                
        $id = (int) $id;
        
        $sql= "UPDATE actes set code='$code', description='$description', cecodis='$cecodis', cout_tr='$coutTR' , cout_tp='$coutTP', cout_vp='$coutVP', cout_sm='$coutSM', length='$length' where id = '$id'";

        $ins1 = mysql_query($sql);
        if ($ins1) {
            //$this->mylog->add($name, 'user', 1, 0);
            return true;
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
    function del($id) {
        $id = (int) $id;

        $del = mysql_query("DELETE FROM actes WHERE ID = $id");
        if ($del) {
            $this->mylog->add($name, 'user', 3, 0);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get a user profile
     *
     * @param int $id User ID
     * @return array $profile Profile
     */
    function get($id) {
        $id = (int) $id;
        $sel = mysql_query("SELECT * FROM actes WHERE ID = $id");
        $actes = mysql_fetch_array($sel);
        if (!empty($actes))
        {
            if (isset($actes["id"])) {
                $actes["ID"] = stripcslashes($actes["id"]);
            }
        	if (isset($actes["description"])) {
                $actes["description"] = stripcslashes($actes["description"]);
            }
            if (isset($actes["code"])) {
                $actes["code"] = stripcslashes($actes["code"]);
            }
            if (isset($actes["cecodis"])) {
                $actes["cecodis"] = stripcslashes($actes["cecodis"]);
            }
            if (isset($actes["cout_tr"])) {
                $actes["couttr"] = stripcslashes($actes["cout_tr"]);
            }
            if (isset($actes["cout_tp"])) {
                $actes["couttp"] = stripcslashes($actes["cout_tp"]);
            }
            if (isset($actes["cout_vp"])) {
                $actes["coutvp"] = stripcslashes($actes["cout_vp"]);
            }
            if (isset($actes["cout_sm"])) {
                $actes["coutsm"] = stripcslashes($actes["cout_sm"]);
            }
            return $actes;
        }
        else
        {
            return false;
        }
    }

    	 /* Make a search
     *
     * @param value
     * @return array
     */
    function modulesearch($id,$value,$limit) {
    
    	if ($id!='undefined' && $id!='undefined' && $id!= null)
			$sql = "SELECT * FROM actes WHERE ID='$id'";
		else
			$sql = "SELECT * FROM actes WHERE ((lower(concat(description, ' ' ,code))) regexp '$value' OR (lower(concat(code, ' ' ,description))) regexp '$value') Limit $limit";
			
		$sel = mysql_query($sql);

        $actes = array();

        while ($acte = mysql_fetch_array($sel)) {
            $acte["ID"] = stripslashes($acte["id"]);
        	$acte["code"] = stripslashes($acte["code"]);
            $acte["description"] = stripslashes($acte["description"]);
            $acte["cecodis"] = stripslashes($acte["cecodis"]);
            $acte["couttr"] = $acte["cout_tr"];
            $acte["couttp"] = $acte["cout_tp"];
            $acte["coutvp"] = $acte["cout_vp"];
            $acte["coutsm"] = $acte["cout_sm"];
            $acte["lenght"] = $acte["lenght"];
            array_push($actes, $acte);
        }

        if (!empty($actes))  {	
            return $actes;
        }
        else  {
            return false;
        }

    }
    	
    function autocomplete($id,$value) {
    
    	if ($id!='undefined' && $id!='undefined' && $id!= null)
			$sql = "SELECT * FROM actes WHERE ID='$id'";
		else
			$sql = "SELECT * FROM actes WHERE ((lower(concat(description, ' ' ,code))) regexp '$value' OR (lower(concat(code, ' ' ,description))) regexp '$value') Limit $limit";
    	    				
		$result = mysql_query($sql);
	
		if(mysql_num_rows($result)==1) {
		
			$data = mysql_fetch_assoc($result);
			$ID = $data['id'];
			$code = $data['code'];
		}
	
		$reponse['ID'] = $ID;
		$reponse['code'] = utf8_encode($code);
  
		header('Content-Type: application/json');
		echo json_encode($reponse);

    }
}

?>