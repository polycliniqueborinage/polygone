<?php
/*
 * This class provides methods to realize the logging of different activities
 *
 * @author Open Dynamics <info@o-dyn.de>
 * @name mylog
 * @version 0.4.5
 * @package Collabtive
 * @link http://www.o-dyn.de
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License v3 or later
 */
class mailing
{
    /*
    * Constructor
    */
    function __construct()
    {
        $this->userid = getArrayVal($_SESSION,"userid");
        $this->uname = getArrayVal($_SESSION,"username");
    }

    /*
     * Add an mailing entry
     *
     * @return bool
     */
    function add($rubric, $from_name, $to_email, $recipient_name, $recipient_email, $date, $subject, $content) {
    	
        $object = mysql_real_escape_string($object);
        $type = mysql_real_escape_string($type);
        $action = mysql_real_escape_string($action);

        $sql = "INSERT INTO mailing (rubric, sender_name, sender_email, recipient_name, recipient_email, date, subject, content) VALUES ('$rubric', '$from_name', '$to_email', '$recipient_name', '$recipient_email', '$date', '$subject', '$content')";
        echo $sql;
        $ins = mysql_query($sql);
        
        if ($ins) {
        	$insid = mysql_insert_id();
            return $insid;
        } else {
            return false;
        }
    }

    /*
     * Delete an mailing entry
     *
     * @param int $id Mailing entry ID
     * @return bool
     */
    function del($id)
    {
        $id = (int) $id;
        // dont delete record if mail already send
        $sql = "DELETE FROM mailing WHERE ID = $id LIMIT 1 AND `send` != 'checked'";
        $del = mysql_query($sql);
        if ($del)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function get($id) {

		$sql = "SELECT * FROM mailing WHERE `ID` = '$id'";
		$sel = mysql_query($sql);
        $mailing = mysql_fetch_array($sel);

        if (!empty($mailing))  {
            return $mailing;
        } else  {
            return false;
        }

    }

    function getTodayMailSend($date) {

		$sql = "SELECT rubric, recipient_name, recipient_email, sender_name, sender_email, subject, content FROM `mailing` WHERE `date` != now() AND `send` = 'checked'";
		$sel = mysql_query($sql);

        $mails = array();

        while ($mail = mysql_fetch_array($sel)) {
        	
            $mail['rubric'] 				= stripslashes($mail["rubric"]);
            $mail['recipient_name'] 		= stripslashes($mail["recipient_name"]);
            $mail['recipient_email']		= stripslashes($mail["recipient_email"]);
            $mail['sender_name'] 			= stripslashes($mail["sender_name"]);
            $mail['sender_email']			= stripslashes($mail["sender_email"]);
            $mail['object'] 				= stripslashes($mail["object"]);
            $mail['content'] 				= stripslashes($mail["content"]);
             
            array_push($mails, $mail);
            
        }

        if (!empty($mails))  {
            return $mails;
        } else  {
            return false;
        }

    }
    
    function getAllMailToSend() {

		$sql = "SELECT ID, recipient_name, recipient_email, sender_name, sender_email, subject, content FROM `mailing` WHERE `date` < now() AND `send` = ''";
		
		$sel = mysql_query($sql);

        $mails = array();

        while ($mail = mysql_fetch_array($sel)) {
        	
            $mail['recipient_name'] 		= stripslashes($mail["recipient_name"]);
            $mail['recipient_email']		= stripslashes($mail["recipient_email"]);
            $mail['sender_name'] 			= stripslashes($mail["sender_name"]);
            $mail['sender_email']			= stripslashes($mail["sender_email"]);
            $mail['subject'] 				= stripslashes($mail["subject"]);
            $mail['content'] 				= stripslashes($mail["content"]);
             
            array_push($mails, $mail);
            
        }

        if (!empty($mails))  {
            return $mails;
        } else  {
            return false;
        }

    }
    
    function markAsSend($id)
    {
        $id = (int) $id;
        $sql = "UPDATE mailing set send='checked' WHERE ID = $id LIMIT 1";
        $upd = mysql_query($sql);
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }
    
}
?>