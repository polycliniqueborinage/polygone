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
class debt
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

	function update_debt_update_addressbook($firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $amount, $creation_date, $textcomment, $ID, $addressbook_ID) {

		$firstname = mysql_real_escape_string($firstname);
        $familyname = mysql_real_escape_string($familyname);
        $address1 = mysql_real_escape_string($address1);
        $zip1 = mysql_real_escape_string($zip1);
        $city1 = mysql_real_escape_string($city1);
        $state1 = mysql_real_escape_string($state1);
        $country1 = mysql_real_escape_string($country1);
        $workphone = mysql_real_escape_string($workphone);
        $privatephone = mysql_real_escape_string($privatephone);
        $mobilephone = mysql_real_escape_string($mobilephone);
        $fax = mysql_real_escape_string($fax);
        $email = mysql_real_escape_string($email);
        
        $amount = mysql_real_escape_string($amount);
        $creation_date = mysql_real_escape_string($creation_date);
		$creation_date_day = strtok($creation_date,"/");
		$creation_date_month = strtok("/");
		$creation_date_year = strtok("/");
		$creation_date = $creation_date_year."-".$creation_date_month."-".$creation_date_day;
        $textcomment = mysql_real_escape_string($textcomment);

        $ID = mysql_real_escape_string($ID);
        $addressbook_ID = mysql_real_escape_string($addressbook_ID);
        
        $sql1 = "UPDATE addressbook set firstname='$firstname', familyname='$familyname', address1='$address1', zip1='$zip1', city1='$city1', state1='$state1', country1='$country1', workphone='$workphone', privatephone='$privatephone', mobilephone='$mobilephone', fax='$fax', email='$email', web='$web', tva='$tva' where id='$addressbook_ID'";
        $ins1 = mysql_query($sql1);
        
        $sql2 = "UPDATE debt set `addressbook_ID`='$addressbook_ID', `amount`='$amount', `creation_date`='$creation_date', `textcomment`='$textcomment' where ID='$ID'";
        $ins2 = mysql_query($sql2);
        
        if ($ins2) {
            return true;
        } else {
            return false;
        }
    }
    
    
    /**
     * ADD a new debt and a new addressbook
     *
     */
	function add_debt_add_addressbook($firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $amount, $creation_date, $textcomment) {

		$firstname = mysql_real_escape_string($firstname);
        $familyname = mysql_real_escape_string($familyname);
        $address1 = mysql_real_escape_string($address1);
        $zip1 = mysql_real_escape_string($zip1);
        $city1 = mysql_real_escape_string($city1);
        $state1 = mysql_real_escape_string($state1);
        $country1 = mysql_real_escape_string($country1);
        $workphone = mysql_real_escape_string($workphone);
        $privatephone = mysql_real_escape_string($privatephone);
        $mobilephone = mysql_real_escape_string($mobilephone);
        $fax = mysql_real_escape_string($fax);
        $email = mysql_real_escape_string($email);
        
        $amount = mysql_real_escape_string($amount);
        $creation_date = mysql_real_escape_string($creation_date);
		$creation_date_day = strtok($creation_date,"/");
		$creation_date_month = strtok("/");
		$creation_date_year = strtok("/");
		$creation_date = $creation_date_year."-".$creation_date_month."-".$creation_date_day;
        $textcomment = mysql_real_escape_string($textcomment);
        
        $sql = "INSERT INTO addressbook (firstname, familyname, address1, zip1, city1, state1, country1, workphone, privatephone, mobilephone, fax, email) VALUES ('$firstname', '$familyname', '$address1', '$zip1', '$city1', '$state1', '$country1', '$workphone', '$privatephone', '$mobilephone', '$fax', '$email')";
		
        $ins1 = mysql_query($sql);

        if ($ins1) {
            
            $addressbook_ID =  (int) mysql_insert_id();
            
            $sql = "INSERT INTO debt (addressbook_ID, creation_date, type, amount, textcomment) VALUES ('$addressbook_ID', '$creation_date', '$type', '$amount', '$textcomment')";
            
            $ins2 = mysql_query($sql);
            
            $insid = mysql_insert_id();
            
            return $insid;
                                    
        } else {
        	
            return false;
            
        }
        
    }
    
    
    /**
     * ADD a new debt and a new addressbook
     *
     */
    function add_debt_update_addressbook($firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $amount, $creation_date, $textcomment, $addressbook_ID) {

    	$firstname = mysql_real_escape_string($firstname);
        $familyname = mysql_real_escape_string($familyname);
        $address1 = mysql_real_escape_string($address1);
        $zip1 = mysql_real_escape_string($zip1);
        $city1 = mysql_real_escape_string($city1);
        $state1 = mysql_real_escape_string($state1);
        $country1 = mysql_real_escape_string($country1);
        $workphone = mysql_real_escape_string($workphone);
        $privatephone = mysql_real_escape_string($privatephone);
        $mobilephone = mysql_real_escape_string($mobilephone);
        $fax = mysql_real_escape_string($fax);
        $email = mysql_real_escape_string($email);
        
        $amount = mysql_real_escape_string($amount);
        $creation_date = mysql_real_escape_string($creation_date);
		$creation_date_day = strtok($creation_date,"/");
		$creation_date_month = strtok("/");
		$creation_date_year = strtok("/");
		$creation_date = $creation_date_year."-".$creation_date_month."-".$creation_date_day;
        $textcomment = mysql_real_escape_string($textcomment);
        
        $ID = mysql_real_escape_string($ID);
        $addressbook_ID = mysql_real_escape_string($addressbook_ID);
        
        $sql1 = "UPDATE addressbook set firstname='$firstname', familyname='$familyname', address1='$address1', zip1='$zip1', city1='$city1', state1='$state1', country1='$country1', workphone='$workphone', privatephone='$privatephone', mobilephone='$mobilephone', fax='$fax', email='$email' where id='$addressbook_ID'";
        $ins1 = mysql_query($sql1);
        
		$sql2 = "INSERT INTO debt (addressbook_ID, creation_date, type, amount, textcomment) VALUES ('$addressbook_ID', '$creation_date', '$type', '$amount', '$textcomment')";
        $ins2 = mysql_query($sql2);

        if ($ins2) {

            $insid = mysql_insert_id();
            return $insid;
                                    
        } else {
        	
            return false;
            
        }
        
    }
    
   
    /**
     * ADD a update debt and a new addressbook
     *
     */
	function update_debt_add_addressbook($firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $amount, $creation_date, $textcomment, $ID) {

		$firstname = mysql_real_escape_string($firstname);
        $familyname = mysql_real_escape_string($familyname);
        $address1 = mysql_real_escape_string($address1);
        $zip1 = mysql_real_escape_string($zip1);
        $city1 = mysql_real_escape_string($city1);
        $state1 = mysql_real_escape_string($state1);
        $country1 = mysql_real_escape_string($country1);
        $workphone = mysql_real_escape_string($workphone);
        $privatephone = mysql_real_escape_string($privatephone);
        $mobilephone = mysql_real_escape_string($mobilephone);
        $fax = mysql_real_escape_string($fax);
        $email = mysql_real_escape_string($email);
        
        $amount = mysql_real_escape_string($amount);
        $creation_date = mysql_real_escape_string($creation_date);
		$creation_date_day = strtok($creation_date,"/");
		$creation_date_month = strtok("/");
		$creation_date_year = strtok("/");
		$creation_date = $creation_date_year."-".$creation_date_month."-".$creation_date_day;
        $textcomment = mysql_real_escape_string($textcomment);
        
        $ID = mysql_real_escape_string($ID);
        
        $sql = "INSERT INTO addressbook (firstname, familyname, address1, zip1, city1, state1, country1, workphone, privatephone, mobilephone, fax, email) VALUES ('$firstname', '$familyname', '$address1', '$zip1', '$city1', '$state1', '$country1', '$workphone', '$privatephone', '$mobilephone', '$fax', '$email')";
        
        $ins1 = mysql_query($sql);

        if ($ins1) {
            
            $addressbook_ID = (int) mysql_insert_id();
            $sql2 = "UPDATE debt set `addressbook_ID`='$addressbook_ID', `amount`='$amount', `creation_date`='$creation_date', `type`='$type', `textcomment`='$textcomment' where ID='$ID'";
        	$ins2 = mysql_query($sql2);
            
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
    function delete($id)
    {
        $id = (int) $id;
        $del = mysql_query("DELETE FROM debt WHERE ID = $id");
        if ($del) {
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
    function get($id)
    {
        $id = (int) $id;
        $sql = "SELECT d.ID as ID, d.addressbook_ID as addressbook_ID, d.amount as amount, d.textcomment as textcomment_debt, date_format(d.creation_date, '%d/%m/%Y') as creation_date, d.type as type, a.firstname as firstname, a.familyname as familyname, a.address1 as address1, a.zip1 as zip1, a.city1 as city1,  a.state1 as state1,  a.country1 as country1, a.workphone AS workphone, a.mobilephone AS mobilephone, a.privatephone AS privatephone, a.fax AS fax, a.email as email, a.textcomment as textcomment_addressbook FROM addressbook a, debt d WHERE d.ID = $id  AND d.addressbook_ID = a.ID";
        
        $sel = mysql_query($sql);
        $profile = mysql_fetch_array($sel);
        if (!empty($profile)) {
            if (isset($profile["ID"]))
            {
                $profile["ID"] = stripcslashes($profile["ID"]);
            }
            return $profile;
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
    
    	if ($id!='undefined' && $id!='undefined' && $id!= null)
    		$sql = "SELECT d.ID as ID, d.addressbook_ID as addressbook_ID, d.amount as amount, d.textcomment as textcomment, date_format(d.creation_date, '%d/%m/%Y') as creation_date, a.firstname as firstname, a.familyname as familyname, a.address1 as address1, a.zip1 as zip1, a.city1 as city1, a.workphone as workphone, a.privatephone as privatephone, a.mobilephone as mobilephone, a.fax as fax, a.email as email FROM addressbook a, debt d WHERE d.addressbook_ID = a.ID AND ID='$id'";
		else
    		$sql = "SELECT d.ID as ID, d.addressbook_ID as addressbook_ID, d.amount as amount, d.textcomment as textcomment, date_format(d.creation_date, '%d/%m/%Y') as creation_date, a.firstname as firstname, a.familyname as familyname, a.address1 as address1, a.zip1 as zip1, a.city1 as city1, a.workphone as workphone, a.privatephone as privatephone, a.mobilephone as mobilephone, a.fax as fax, a.email as email FROM addressbook a, debt d WHERE d.addressbook_ID = a.ID AND ((lower(concat(a.familyname, ' ' ,a.firstname))) regexp '$value' OR (lower(concat(a.firstname, ' ' ,a.familyname))) regexp '$value') Limit $limit";
				
		//echo $sql;
    	
        $sel = mysql_query($sql);

        $debts = array();

        while ($debt = mysql_fetch_array($sel)) {
            $debt["ID"] = stripslashes($debt["ID"]);
            $debt["addressbook_ID"] = stripslashes($debt["addressbook_ID"]);
            $debt["amount"] = stripslashes($debt["amount"]);
            $debt["creation_date"] = stripslashes($debt["creation_date"]);
            $debt["textcomment"] = stripslashes($debt["textcomment"]);
            $debt["firstname"] = stripslashes($debt["firstname"]);
            $debt["familyname"] = stripslashes($debt["familyname"]);
            $debt["address1"] = stripslashes($debt["address1"]);
            $debt["zip1"] = stripslashes($debt["zip1"]);
            $debt["city1"] = stripslashes($debt["city1"]);
            $debt["workphone"] = stripslashes($debt["workphone"]);
            $debt["mobilephone"] = stripslashes($debt["mobilephone"]);
            $debt["privatephone"] = stripslashes($debt["privatephone"]);
            $debt["fax"] = stripslashes($debt["fax"]);
            $debt["email"] = stripslashes($debt["email"]);
            array_push($debts, $debt);
        }

        if (!empty($debts))  {	
            return $debts;
        }
        else  {
            return false;
        }

    }
    
   	 /* Make a autocomplete
     *
     * @param value
     * @return array
     */
    function autocomplete($value,$id) {
    
	    if ($id!='undefined' && $id!='undefined' && $id!= null)
			$sql = "SELECT ID, firstname, familyname, address1, zip1, city1, state1,  country1, workphone, privatephone, mobilephone, fax, email FROM addressbook WHERE ID='$id'";
		else
			$sql = "SELECT ID, firstname, familyname, address1, zip1, city1, state1,  country1, workphone, privatephone, mobilephone, fax, email FROM addressbook WHERE ((lower(concat(familyname, ' ' ,firstname))) regexp '$value' OR (lower(concat(firstname, ' ' ,familyname))) regexp '$value') Limit 2";
			
		$result = mysql_query($sql);
	
		if(mysql_num_rows($result)==1) {
		
			$data = mysql_fetch_assoc($result);
			$ID = $data['ID'];
			$familyname = $data['familyname'];
			$firstname = $data['firstname'];
			$address1 = $data['address1'];
			$zip1 = $data['zip1'];
			$city1 = $data['city1'];
			$state1 = $data['state1'];
			$country1 = $data['country1'];
			$workphone = $data['workphone'];
			$mobilephone = $data['mobilephone'];
			$privatephone = $data['privatephone'];
			$fax = $data['fax'];
			$email = $data['email'];
		
		} else {
			
			$ID = "";
			
		}
	
		$reponse['ID'] = $ID;
		$reponse['familyname'] = utf8_encode($familyname);
		$reponse['firstname'] = utf8_encode($firstname);
		$reponse['address1'] = utf8_encode($address1);
		$reponse['zip1city1'] = $zip1.' '.$city1;
		$reponse['state1'] = utf8_encode($state1);
		$reponse['country1'] = utf8_encode($country1);
		$reponse['workphone'] = utf8_encode($workphone);
		$reponse['mobilephone'] = utf8_encode($mobilephone);
		$reponse['privatephone'] = utf8_encode($privatephone);
		$reponse['fax'] = utf8_encode($fax);
		$reponse['email'] = utf8_encode($email);
  
		header('Content-Type: application/json');
		echo json_encode($reponse);

    }

	function getLogInfo($id) {

    	$id = (int) $id;
    	
        $sql = "SELECT concat(a.firstname,' ',a.familyname,' - ',d.amount) FROM addressbook a, debt d WHERE d.ID = $id  AND d.addressbook_ID = a.ID";
        $sel = mysql_query($sql);
        
        $profile = mysql_fetch_row($sel);
        $profile = $profile[0];
        
        if (!empty($profile)) {
            return $profile;
        } else {
            return false;
        }
    }
    
}

?>