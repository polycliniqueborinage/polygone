<?php 

	include("../init.php");

  if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	$id = getArrayVal($_GET, "id");
	$description = utf8_decode(trim(strtolower($_GET["description"])));
	
	if ($id!='') {
		$sql = "SELECT motif_ID from `medecine_preventive` where lower(description) = '$description' and ID!='$id'";
	} else {
		$sql = "SELECT motif_ID from `medecine_preventive` where lower(description) = '$description'";
	}
	
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result)!=0) {
		echo "false";
	} else {
		echo "true";
	}
	
?>