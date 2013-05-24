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
class ct1ct2
{
    public $mylog;

    function __construct()
    {
        $this->mylog = new mylog;
    }

   	function getall() {
    	
		$sql = 'SELECT distinct ct1, ct2, type, label FROM cts where ct1!=0 and ct2!=0';
		$sel = mysql_query($sql);
	  	$ct1ct2s = array();

        while ($ct1ct2 = mysql_fetch_array($sel)) {
            $ct1ct2["ID"] = $ct1ct2["ct1"]."-".$ct1ct2["ct2"];
            $ct1ct2["VALUE"] = $ct1ct2["ct1"]."-".$ct1ct2["ct2"]." ".stripslashes($ct1ct2["label"]);
            array_push($ct1ct2s, $ct1ct2);
        } 	
	  	
        if (!empty($ct1ct2s))  {	
            return $ct1ct2s;
        } else  {
            return false;
        }
        
    }

}

?>