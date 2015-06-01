<?php 

	include("../init.php");

	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	$id = getArrayVal($_GET, "id");
	$name = utf8_decode(trim(strtolower($_GET["name"])));
	
	if ($id!='') {
		$sql = "SELECT ID from `product` where lower(name) = '$name' and ID!='$id'";
	} else {
		$sql = "SELECT ID from `product` where lower(name) = '$name'";
	}
	
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result)!=0) {
		echo "false";
	} else {
		echo "true";
	}
	

	
?>