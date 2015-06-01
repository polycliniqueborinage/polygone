<?php 

	include("../init.php");
	header('Content-Type: text/html; charset=utf-8'); 

	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("login.tpl");
	    die();
	}

	$search = isset($_GET['q']) ? $_GET['q'] : '';
	$search = trim($search);

	$sql = "SELECT state FROM `state` WHERE state like '$search%' limit 10";
	//echo $sql;
	
	$result = mysql_query($sql);
		
	if(mysql_num_rows($result)!=0) {
		while($data = mysql_fetch_assoc($result)) 	{
			echo utf8_encode($data['state']);
			echo "\n";
		}
	}
				

?>