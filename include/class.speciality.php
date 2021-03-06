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
class speciality
{
    public $mylog;

    function __construct()
    {
        $this->mylog = new mylog;
    }

	function getall() {
    	
    	$sql = "SELECT * FROM speciality ORDER BY value";
    	
	  	$sel = mysql_query($sql);

	  	$specialities = array();

        while ($speciality = mysql_fetch_array($sel)) {
            $speciality["ID"] = $speciality["value"];
            $speciality["VALUE"] = $speciality["label_fr"];
            array_push($specialities, $speciality);
        } 	
        
        if (!empty($specialities))  {	
            return $specialities;
        } else  {
            return false;
        }
        
    }
    
	function gettable($lang) {
    	
    	$sql = "SELECT * FROM speciality ORDER BY value";
    	
	  	$sel = mysql_query($sql);

	  	$specialities = array();

        while ($speciality = mysql_fetch_array($sel)) {
            $specialities[$speciality["value"]] = $speciality["label_".$lang];
        } 	
	  	        
        if (!empty($specialities))  {	
            return $specialities;
        } else  {
            return false;
        }
        
    }    
    
}

?>