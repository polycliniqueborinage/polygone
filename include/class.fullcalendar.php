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
class fullcalendar
{
    public $mylog;

    /**
     * Konstruktor
     * Initialisiert den Eventlog
     */
    function __construct() {
        $this->mylog = new mylog;
    }

	function getEvents($userid, $start, $end) {

    	$userid = mysql_real_escape_string($userid);
    	$start = mysql_real_escape_string($start);
    	$end = mysql_real_escape_string($end);
    	$events = Array();
    	
		$sql = "SELECT * 
				FROM `agenda_".$userid."` 
				WHERE `start_date`>='$start' 
				AND `end_date`<='$end' 
				AND `type` = 'event'
				ORDER BY start_date";
				
		
       	$sel = mysql_query($sql);
       	
        while ($event = mysql_fetch_array($sel)) {
        	
        	$events[] = array(
        		'title' => $event['patient'],
        		'start' => $event['start_date'],
        		'end' => $event['end_date'],
        		'url' => 'user_sumehr.php?action=view&patient_id='.$event['patient_ID'],
			);
            
        }

        if (!empty($events)) {	
            return $events;
        }
        else {
            return false;
        }
        
	}
    
    
    
}

?>