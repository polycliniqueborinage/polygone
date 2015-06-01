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

	$sql = "SELECT country FROM `country` WHERE country like '$search%' limit 10";
	$result = mysql_query($sql);
		
	if(mysql_num_rows($result)!=0) {
		while($data = mysql_fetch_assoc($result)) 	{
			echo utf8_encode($data['country']);
			echo "\n";
		}
	}
				

?>