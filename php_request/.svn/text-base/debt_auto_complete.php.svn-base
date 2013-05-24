<?php

	include("../init.php");
	
	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("login.tpl");
	    die();
	}
	
	$jsSearch = isset($_POST['search']) ? utf8_decode(trim($_POST['search'])) : '';
	
	if ($jsSearch=="") $jsSearch="%";
	
	$ID = "";

	$sql = "SELECT ID, firstname, familyname, address1, zip1, city1, workphone, privatephone, mobilephone, fax, email FROM addressbook WHERE ((lower(concat(familyname, ' ' ,firstname))) regexp '$jsSearch' OR (lower(concat(firstname, ' ' ,familyname))) regexp '$jsSearch') Limit 15";
	echo $sql;
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
  
  // on a notre objet $reponse (un array en fait)
  // reste juste ˆ l'encoder en JSON et l'envoyer

  header('Content-Type: application/json');
  echo json_encode($reponse);
?>

