<?php 

	include("../init.php");
	header('Content-Type: text/html; charset=utf-8');

  if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("login.tpl");
	    die();
	}

	$search = isset($_GET['q']) ? $_GET['q'] : '';
	$search = trim($search);
	
	$code_postal = substr($search,0,4);
	if (strlen($search)>4) {
		$ville=ucfirst(trim(substr($search,4)));
	} else {
		$ville="";
	}
	
	//echo "code_postal".$code_postal."<br/>";
	//echo "ville".$ville."<br/>";
	
	if ($code_postal != '' && is_numeric($code_postal)) {
		
		$sql = "SELECT code_postal, ville FROM localite where code_postal like '$code_postal%' and ville like '$ville%' ORDER BY ville limit 10";
		$result = mysql_query($sql);
		
		if(mysql_num_rows($result)!=0) {
			while($data = mysql_fetch_assoc($result)) 	{
				echo ($data['code_postal'])." ";
				echo utf8_encode($data['ville']);
				// BUG : - is a possible value in the field 'localite'
				echo "\n";
			}
		} else {
			//echo htmlentities($search);
		}
										
	} else {
		//echo htmlentities($search);
	}

?>