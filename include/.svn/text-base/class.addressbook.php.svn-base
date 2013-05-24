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
class addressbook
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
     * Creates a addressbook
     *
     */
    function add($type, $code, $speciality, $inami, $company, $firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $web, $tva, $textcomment) {
    	
        $type = mysql_real_escape_string($type);
        $code = mysql_real_escape_string($code);
        $speciality = mysql_real_escape_string($speciality);
        $inami = mysql_real_escape_string($inami);
        $company = mysql_real_escape_string($company);
        $firstname = mysql_real_escape_string($firstname);
        $familyname = mysql_real_escape_string($familyname);
        $mutuelle_code = mysql_real_escape_string($mutuelle_code);
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
        $web = mysql_real_escape_string($web);
        $textcomment = mysql_real_escape_string($textcomment);

        if ($code != '')
        $sql = "INSERT INTO addressbook (ID, type, speciality, inami, company, firstname, familyname, address1, zip1, city1, state1, country1, workphone, privatephone, mobilephone, fax, email, web, tva, textcomment) VALUES ('$code','$type', '$speciality', '$inami', '$company', '$firstname', '$familyname', '$address1', '$zip1', '$city1', '$state1', '$country1', '$workphone', '$privatephone', '$mobilephone', '$fax', '$email','$web','$tva', '$textcomment')";
		else
		$sql = "INSERT INTO addressbook (type, speciality, inami, company, firstname, familyname, address1, zip1, city1, state1, country1, workphone, privatephone, mobilephone, fax, email, web, tva, textcomment) VALUES ('$type', '$speciality', '$inami', '$company', '$firstname', '$familyname', '$address1', '$zip1', '$city1', '$state1', '$country1', '$workphone', '$privatephone', '$mobilephone', '$fax', '$email','$web','$tva', '$textcomment')";
		
        $ins = mysql_query($sql);

        // get current ID
        $insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
        
    }
    
    /**
     * UPDATE addressbook
     *
     */
    function update($type, $code, $speciality, $inami, $company, $firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email,$web,$tva, $textcomment, $id)
    {
    	
        $type = mysql_real_escape_string($type);
		$speciality = mysql_real_escape_string($speciality);
        $inami = mysql_real_escape_string($inami);
        $company = mysql_real_escape_string($company);
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
        $web = mysql_real_escape_string($web);
        $tva = mysql_real_escape_string($tva);
        $textcomment = mysql_real_escape_string($textcomment);
        $id = mysql_real_escape_string($id);
        
        $id = (int) $id;
        
        $sql = "UPDATE addressbook set type='$type' , speciality='$speciality', inami='$inami', company='$company', firstname='$firstname', familyname='$familyname', address1='$address1', zip1='$zip1', city1='$city1', state1='$state1', country1='$country1', workphone='$workphone', privatephone='$privatephone', mobilephone='$mobilephone', fax='$fax', email='$email', web='$web', tva='$tva', textcomment='$textcomment' where id='$id'";
        
        $upd = mysql_query($sql);
        if ($upd) {
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
    function delete($id) {
    	
        $id = (int) $id;
        
        $sql1 = "DELETE FROM debt WHERE addressbook_ID = $id";
        $sql2 = "DELETE FROM addressbook WHERE ID = $id";
        
        $del1 = mysql_query($sql1);
        $del2 = mysql_query($sql2);
        
        if ($del2) {
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
        $sel = mysql_query("SELECT *, date_format(birthday, '%d/%m/%Y') AS birthdate FROM addressbook WHERE ID = $id");
        $addressbooks = mysql_fetch_array($sel);
        if (!empty($addressbooks))
        {
            if (isset($addressbooks["name"]))
            {
                $addressbooks["name"] = stripcslashes($addressbooks["name"]);
            }
            if (isset($addressbooks["familyname"]))
            {
                $addressbooks["familyname"] = stripcslashes($addressbooks["familyname"]);
            }
            if (isset($addressbooks["firstname"]))
            {
                $addressbooks["firstname"] = stripcslashes($addressbooks["firstname"]);
            }
            if (isset($addressbooks["company"]))
            {
                $addressbooks["company"] = stripcslashes($addressbooks["company"]);
            }
            if (isset($addressbooks["adress1"]))
            {
                $addressbooks["address1"] = stripcslashes($addressbooks["address1"]);
            }
            if (isset($addressbooks["city1"]))
            {
                $addressbooks["city1"] = stripcslashes($addressbooks["city1"]);
            }
            if (isset($addressbooks["state1"]))
            {
                $addressbooks["state1"] = stripcslashes($addressbooks["state1"]);
            }
            if (isset($addressbooks["country1"]))
            {
                $addressbooks["country1"] = stripcslashes($addressbooks["country1"]);
            }
            if (isset($addressbooks["adress2"]))
            {
                $addressbooks["adress2"] = stripcslashes($addressbooks["adress2"]);
            }
            return $addressbooks;
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
    function modulesearch($id,$value,$limit,$types) {
    
    	if ($id!='undefined' && $id!='undefined' && $id!= null)
			$sql = "SELECT * FROM addressbook WHERE ID='$id'";
		else
			$sql = "SELECT *, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE( type, 'other', '$types[1]' ),'doctor','$types[2]'),'supplier','$types[3]'),'client','$types[4]'),'mutuel','$types[5]') as type FROM addressbook WHERE ((lower(concat(familyname, ' ' ,firstname))) regexp '$value' OR (lower(concat(firstname, ' ' ,familyname))) regexp '$value' OR lower(company) regexp '$value' OR lower(ID) regexp '$value') Limit $limit";
		
        $sel = mysql_query($sql);

        $addressbooks = array();

        while ($addressbook = mysql_fetch_array($sel)) {
            $addressbook["ID"] = stripslashes($addressbook["ID"]);
            $addressbook["type"] = stripslashes($addressbook["type"]);
            $addressbook["firstname"] = stripslashes($addressbook["firstname"]);
            $addressbook["familyname"] = stripslashes($addressbook["familyname"]);
            $addressbook["address1"] = stripslashes($addressbook["address1"]);
            $addressbook["zip1"] = stripslashes($addressbook["zip1"]);
            $addressbook["city1"] = stripslashes($addressbook["city1"]);
            $addressbook["workphone"] = stripslashes($addressbook["workphone"]);
            $addressbook["mobilephone"] = stripslashes($addressbook["mobilephone"]);
            $addressbook["privatephone"] = stripslashes($addressbook["privatephone"]);
            $addressbook["fax"] = stripslashes($addressbook["fax"]);
            $addressbook["email"] = stripslashes($addressbook["email"]);
            $addressbook["tva"] = stripslashes($addressbook["tva"]);
            array_push($addressbooks, $addressbook);
        }

        if (!empty($addressbooks))  {	
            return $addressbooks;
        }
        else  {
            return false;
        }

    }

    function autocomplete($id,$value) {
    
	    if ($id!='undefined' && $id!='undefined' && $id!= null)
			$sql = "SELECT ID, familyname, firstname FROM addressbook WHERE ID='$id'";
		else
			$sql = "SELECT ID, familyname, firstname FROM addressbook WHERE ((lower(concat(familyname, ' ' ,firstname))) regexp '$value' OR (lower(concat(firstname, ' ' ,familyname))) regexp '$value') Limit 2";
			
		$result = mysql_query($sql);
	
		if(mysql_num_rows($result)==1) {
		
			$data = mysql_fetch_assoc($result);
			$ID = $data['ID'];
			$addressbook = $data['familyname']." ".$data['firstname'];
		}
	
		$reponse['ID'] = $ID;
		$reponse['addressbook'] = utf8_encode($addressbook);
  
		header('Content-Type: application/json');
		echo json_encode($reponse);

    }

    function getLogInfo($id) {

    	$id = (int) $id;
    	
        $sql = "SELECT concat(firstname,' ',familyname,' - ',ID) FROM addressbook WHERE ID = $id";
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