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
class cost_center
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

    function get_all() {
    	
        $sql = "SELECT ID, code, name, description FROM cost_center";
        
        $sel = mysql_query($sql);
        
	    $cost_centers = array();

        while ($cost_center = mysql_fetch_array($sel)) {
            $cost_center["code"] = stripcslashes($cost_center["code"]);
        	$cost_center["name"] = stripcslashes($cost_center["name"]);
            $cost_center["description"] = stripcslashes($cost_center["description"]);
            array_push($cost_centers, $cost_center);
        }

        if (!empty($cost_centers))  {	
            return $cost_centers;
        }
        else  {
            return false;
        }
        
    }
    
    function get($id) {
    	
        $id = (int) $id;
        $sql = "SELECT ID, code, name, description FROM cost_center WHERE ID = $id";
        echo $sql;
        
        $sel = mysql_query($sql);
        $cost_center = mysql_fetch_array($sel);
        
        if (!empty($cost_center)) {
            $cost_center["code"] = stripcslashes($cost_center["code"]);
        	$cost_center["name"] = stripcslashes($cost_center["name"]);
            $cost_center["description"] = stripcslashes($cost_center["description"]);
            return $cost_center;
        } else {
            return false;
        }
    }

   	function get_json($sql) {
    	
        $i = 0;
		$rows = array();
		
        $sel = mysql_query($sql);
        
        while ($cost_center = mysql_fetch_array($sel)) {
        	$rows[$i]['id']=$cost_center[ID];
			$rows[$i]['cell']=array(
				$cost_center[code],
				$cost_center[name],
			    $cost_center[description],
			);
			$i++;
        }
        
        if (!empty($rows)) {
            return $rows;
        } else {
            return false;
        }
        
        
			
			
        
    }
    
    function add($code, $name, $description) {
        
        $code = mysql_real_escape_string($code);
    	$name = mysql_real_escape_string($name);
        $description = mysql_real_escape_string($description);
    	
        $sql = "INSERT INTO cost_center ( code, name, description ) VALUES ('$code', '$name','$description')";
        echo $sql;
        
        $ins = mysql_query($sql);

        // get current ID
        $insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
   	}
    
    function update($id, $code, $name, $description) {
        
    	$id = (int) $id;
        $code = mysql_real_escape_string($code);
    	$name = mysql_real_escape_string($name);
        $description = mysql_real_escape_string($description);
    	
        $sql = "UPDATE cost_center SET code='$code', name='$name', description='$description' WHERE ID='$id' LIMIT 1";
        echo $sql;
        
        $ins1 = mysql_query($sql);
        if ($ins1) {
            return true;
        } else {
            return false;
        }
        
    }    
    
    function delete($id) {

    	$id = (int) $id;
        
        $sql = "DELETE FROM cost_center WHERE ID = $id LIMIT 1";
        echo $sql;
        
        $del = mysql_query($sql);
        
        if ($del) {
            return true;
        } else {
            return false;
        }

    }    
    
}

?>