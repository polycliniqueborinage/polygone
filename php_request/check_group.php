<?php 

	include("../init.php");

  if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("login.tpl");
	    die();
	}
	
	$name = strtolower($_GET["name"]);
	
	$sql = "SELECT ID from `group` where name = '$name'";
	
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result)!=0) {
		echo "false";
	} else {
		echo "true";
	}
	

	
?>