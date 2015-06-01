<?php 

	include("../init.php");

  if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
	    die();
	}
	
	$oldpass = $_GET["oldpass"];
	$oldpass = sha1($oldpass);
	
	$sql = "SELECT * from user where pass = '$oldpass' and id=$userid";
	
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result)!=0) {
		echo "true";
	} else {
		echo "false";
	}
	

	
?>