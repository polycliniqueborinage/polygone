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
class mutuel
{
    public $mylog;

    function __construct()
    {
        $this->mylog = new mylog;
    }

    function getall() {
    	
    	$sql = "SELECT * FROM mutuelles ORDER BY code";
	  	$sel = mysql_query($sql);

	  	$mutuels = array();

        while ($mutuel = mysql_fetch_array($sel)) {
            $mutuel["ID"] 		= $mutuel["code"];
            $mutuel["VALUE"]	 = $mutuel["code"]." - ".stripslashes($mutuel["nom"]);
            array_push($mutuels, $mutuel);
        } 	
        
        if (!empty($mutuels))  {	
            return $mutuels;
        } else  {
            return false;
        }
        
    }

}

?>