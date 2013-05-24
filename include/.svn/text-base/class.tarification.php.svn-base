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
class tarification
{
    public $mylog;

    function __construct()
    {
        $this->mylog = new mylog;
    }


	/**
     * Get a user profile
     *
     * @param int $id User ID
     * @return array $profile Profile
     */
    function getAllForOnePatient($id) {
        $id = (int) $id;
        
        $tarifications = array();
        $tarificationDetails = array();

        $sql1 = "SELECT date_format(date,'%d/%m/%Y') as tarification_date, id, caisse, etat, a_payer, paye, cloture  FROM tarifications WHERE patient_id = $id ORDER BY date DESC";
        

        $sel1 = mysql_query($sql1);
        
        while ($tarification = mysql_fetch_array($sel1)) {
        	
            if (!empty($tarification)) {
            	
            	$tarificationID = $tarification["id"];

            	$sql2 = "SELECT * FROM tarifications_detail WHERE tarification_id = $tarificationID ORDER BY CECODI ASC";
            	
                $sel2 = mysql_query($sql2);
                
	       	 	$tarificationDetails = array();
                                
                 while ($tarificationDetail = mysql_fetch_array($sel2)) {
                 	array_push($tarificationDetails, $tarificationDetail);
                 }
                
                $tarification['date'] = $tarification['tarification_date'];
                $tarification['tarification_details'] = $tarificationDetails;
                
                array_push($tarifications, $tarification);
                
            }
        }
        

        if (!empty($tarifications)) {
            return $tarifications;
        } else {
            return false;
        }
    	
    }
		
}

?>