<?php 

	include("../init.php");

	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("login.tpl");
	    die();
	}
	
	$id = (int) getArrayVal($_GET, "id");
	$code = (int) utf8_decode(trim($_GET["code"]));
	
	if ($id!='') {
		$sql = "SELECT ID from `addressbook` where ID = '$code' and ID!='$id'";
	} else {
		$sql = "SELECT ID from `addressbook` where ID = '$code'";
	}
	
//	echo $sql;
	
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result)!=0) {
		echo "false";
	} else {
		echo "true";
	}
		
?>