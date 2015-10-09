<?php 

	include("../init.php");

		  if (!isset($_SESSION['userid'])) {
$template->assign("loginerror", 0);
		$template->display("login.tpl");
	    die();
	}

	$jsPatient = isset($_POST['patient']) ? trim($_POST['patient']) : '';
	
	if ($jsPatient=="") $jsPatient="%";
	$sql = "SELECT p.id as patient_id, p.nom as patient_nom, p.prenom as patient_prenom, DATE_FORMAT(p.date_naissance, GET_FORMAT(DATE, 'EUR')) as patient_date_naissance,	p.telephone as patient_telephone, p.gsm as patient_gsm, t.nom as titulaire_nom, t.prenom as titulaire_prenom FROM patients p, patients t WHERE (p.titulaire_id = t.id) AND ((lower(concat(p.nom, ' ' ,p.prenom))) regexp '$jsPatient' OR (lower(concat(p.prenom, ' ' ,p.nom))) regexp '$jsPatient') Limit 7";
	
	$result = mysql_query($sql);
	
	$count = 0;
	
	if(mysql_num_rows($result)!=0) {
		
			echo "<ul  class='ui-accordion'>";
			
			while($data = mysql_fetch_assoc($result)) 	{

				$formDetail = "".$data['patient_id'];
				if (($count%2) == 0) echo "<li class='bg_b'>"; else echo "<li class='bg_a'>";
				echo $data['patient_nom']." ".$data['patient_prenom'];
				echo "</li>";
				
				$count++;
				
			}
			
		echo "</ul>";
			

	} else {
		
		echo "";
			
	}
	
?>
