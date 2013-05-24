<?php 

	include("../init.php");

	if (!session_is_registered("userid")){
		$template->assign("loginerror", 0);
		$template->display("login.tpl");
	    die();
	}

	$urlId = isset($_GET['id']) ? trim($_GET['id']) : '';
	
	if ($urlId != '') {

		echo "<table width='100%'>";
		echo "<tr>";
		echo "<td><a href='./admin_people_user.php?action=delete&id=".$urlId."'>Valider</a></td>";
		echo "<td><a href='#' onclick='window.top.tb_remove();'>Cancel</a></td>";
		echo "</tr>";
		echo "</table>";
		
	}
		

?>


