<?php 

	include("../init.php");

  if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("login.tpl");
	    die();
	}
	
	$id = getArrayVal($_GET, "id");
	$code = utf8_decode(trim(strtolower($_GET["code"])));
	
	if ($id!='') {
		$sql = "SELECT ID from `actes` where lower(code) = '$code' and id!='$id'";
	} else {
		$sql = "SELECT ID from `actes` where lower(code) = '$code'";
	}
	
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result)!=0) {
		echo "false";
	} else {
		echo "true";
	}
	

	
?>