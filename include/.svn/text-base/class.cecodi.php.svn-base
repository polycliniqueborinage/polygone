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
class cecodi
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
     * Creates a cecodi
     *
     */
    function add($type, $code, $company, $firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email, $web, $tva, $textcomment) {
    	
        $type = mysql_real_escape_string($type);
        $code = mysql_real_escape_string($code);
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
        $sql = "INSERT INTO cecodi (ID, type, company, firstname, familyname, address1, zip1, city1, state1, country1, workphone, privatephone, mobilephone, fax, email, web, tva, textcomment) VALUES ('$code','$type', '$company', '$firstname', '$familyname', '$address1', '$zip1', '$city1', '$state1', '$country1', '$workphone', '$privatephone', '$mobilephone', '$fax', '$email','$web','$tva', '$textcomment')";
		else
		$sql = "INSERT INTO cecodi (type, company, firstname, familyname, address1, zip1, city1, state1, country1, workphone, privatephone, mobilephone, fax, email, web, tva, textcomment) VALUES ('$type', '$company', '$firstname', '$familyname', '$address1', '$zip1', '$city1', '$state1', '$country1', '$workphone', '$privatephone', '$mobilephone', '$fax', '$email','$web','$tva', '$textcomment')";
		
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
     * UPDATE cecodi
     *
     */
    function update($type, $company, $firstname, $familyname, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $email,$web,$tva, $textcomment, $id)
    {
    	
        $type = mysql_real_escape_string($type);
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
        
        $sql = "UPDATE cecodi set type='$type' , company='$company', firstname='$firstname', familyname='$familyname', address1='$address1', zip1='$zip1', city1='$city1', state1='$state1', country1='$country1', workphone='$workphone', privatephone='$privatephone', mobilephone='$mobilephone', fax='$fax', email='$email', web='$web', tva='$tva', textcomment='$textcomment' where id='$id'";
        
        $ins1 = mysql_query($sql);
        if ($ins1) {
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
        
        $sql1 = "DELETE FROM debt WHERE cecodi_ID = $id";
        $sql2 = "DELETE FROM cecodi WHERE ID = $id";
        
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
        $sel = mysql_query("SELECT *, date_format(birthday, '%d/%m/%Y') AS birthdate FROM cecodi WHERE ID = $id");
        $cecodis = mysql_fetch_array($sel);
        if (!empty($cecodis))
        {
            if (isset($cecodis["name"]))
            {
                $cecodis["name"] = stripcslashes($cecodis["name"]);
            }
            if (isset($cecodis["familyname"]))
            {
                $cecodis["familyname"] = stripcslashes($cecodis["familyname"]);
            }
            if (isset($cecodis["firstname"]))
            {
                $cecodis["firstname"] = stripcslashes($cecodis["firstname"]);
            }
            if (isset($cecodis["company"]))
            {
                $cecodis["company"] = stripcslashes($cecodis["company"]);
            }
            if (isset($cecodis["adress1"]))
            {
                $cecodis["address1"] = stripcslashes($cecodis["address1"]);
            }
            if (isset($cecodis["city1"]))
            {
                $cecodis["city1"] = stripcslashes($cecodis["city1"]);
            }
            if (isset($cecodis["state1"]))
            {
                $cecodis["state1"] = stripcslashes($cecodis["state1"]);
            }
            if (isset($cecodis["country1"]))
            {
                $cecodis["country1"] = stripcslashes($cecodis["country1"]);
            }
            if (isset($cecodis["adress2"]))
            {
                $cecodis["adress2"] = stripcslashes($cecodis["adress2"]);
            }
            return $cecodis;
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
			$sql = "SELECT * FROM cecodis2 WHERE id='$id'";
		else
			$sql = "SELECT *, REPLACE(REPLACE( propriete, 'acte', '$types[1]' ),'consultation','$types[2]') as type FROM cecodis2 WHERE ( lower(description) regexp '$value' OR cecodi like '$value%' ) Limit $limit";
		
		//echo $sql;
			
        $sel = mysql_query($sql);

        $cecodis = array();

        while ($cecodi = mysql_fetch_array($sel)) {
            $cecodi["ID"] = (int) stripslashes($cecodi["id"]);
            $cecodi["description"] = stripslashes($cecodi["description"]);
            $cecodi["cond"] = stripslashes($cecodi["cond"]);
            $cecodi["age_short"] = stripslashes($cecodi["age_short"]);
            $cecodi["amount_tp"] = stripslashes($cecodi["prix_tp"]);
            $cecodi["amount_tr"] = stripslashes($cecodi["prix_tr"]);
            $cecodi["amount_vp"] = stripslashes($cecodi["prix_vp"]);
            array_push($cecodis, $cecodi);
        }
        
        if (!empty($cecodis))  {	
            return $cecodis;
        }
        else  {
            return false;
        }

    }

    function autocomplete($id,$value) {
    
	    if ($id!='undefined' && $id!='undefined' && $id!= null)
			$sql = "SELECT ID, familyname, firstname FROM cecodi WHERE ID='$id'";
		else
			$sql = "SELECT ID, familyname, firstname FROM cecodi WHERE ((lower(concat(familyname, ' ' ,firstname))) regexp '$value' OR (lower(concat(firstname, ' ' ,familyname))) regexp '$value') Limit 2";
			
		$result = mysql_query($sql);
	
		if(mysql_num_rows($result)==1) {
		
			$data = mysql_fetch_assoc($result);
			$ID = $data['ID'];
			$cecodi = $data['familyname']." ".$data['firstname'];
		}
	
		$reponse['ID'] = $ID;
		$reponse['cecodi'] = utf8_encode($cecodi);
  
		header('Content-Type: application/json');
		echo json_encode($reponse);

    }

    function getLogInfo($id) {

    	$id = (int) $id;
    	
        $sql = "SELECT concat(firstname,' ',familyname,' - ',ID) FROM cecodi WHERE ID = $id";
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