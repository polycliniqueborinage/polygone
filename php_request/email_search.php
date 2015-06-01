<?php 

include("../init.php");

	if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("login.tpl");
	    die();
	}

	$search = isset($_GET['q']) ? $_GET['q'] : '';
	$search = trim($search);
	
	if (strpos($search,'@')>0){
		$prefix = substr($search,0, strpos($search,'@'));
		$postfix = substr($search, strpos($search,'@')+1);
	} else {
		$prefix = $search;
		$postfix = "";
	}

	$sql = "SELECT email FROM emails where email like '$postfix%' ORDER BY email limit 10";
	
	$result = mysql_query($sql);
		
	if(mysql_num_rows($result)!=0) {
			while($data = mysql_fetch_assoc($result)) 	{
				echo $prefix."@";
				echo ($data['email']);
				// BUG : - is a possible value in the field 'localite'
				echo "#";
			}
	}

?>
