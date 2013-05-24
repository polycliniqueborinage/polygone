<?php

  	require "../../../../init.php";

	function add($user, $message,$time) {
    	
		$sql = "INSERT INTO shoutbox (user, message, time) VALUES ('$user','$message','$time')";
        $ins = mysql_query($sql);
		        
  	}
  	
	function get($time) {
    	
		$shoutbox = array();
		$sql = "SELECT * FROM shoutbox WHERE time>$time ORDER BY time ASC";
		
		$sel = mysql_query($sql);
		
        while ($mess = mysql_fetch_array($sel)) {
            $mess["nickname"] = stripslashes($mess["user"]);
            $mess["message"] = stripslashes($mess["message"]);
            $mess["time"] = stripslashes($mess["time"]);
            array_push($shoutbox, $mess);
        }
        
        return $shoutbox;
		
	}
  	    
  
  function replace(&$item, $key) {
    $item = str_replace('|', '-', $item);
  }
  
  if (!function_exists('file_put_contents')) {
		function file_put_contents($fileName, $data) {
			if (is_array($data)) {
				$data = join('', $data);
			}
			$res = @fopen($fileName, 'w+b');
			if ($res) {
				$write = @fwrite($res, $data);
				if($write === false) {
					return false;
				} else {
					return $write;
				}
			}
		}
	}
  
	//file_put_contents('debug.txt', print_r($_GET, true));
	switch($_GET['action']) {
    	
		case 'add':
			
			$user = mysql_real_escape_string($_POST['nickname']);
        	$message = mysql_real_escape_string($_POST['message']);
        	$time = time();
        	
        	add($user,$message,$time);
      		
      		$data['nickname'] = $_POST['nickname'];
      		$data['message'] = $_POST['message'];
      		$data['time'] = $time;
      		
		    break;
    
		case 'view':
			
			$data = array();
			$time = $_GET['time'];
			
      		$data = get($time);

			break;
	}
  
  	header('Content-Type: application/json');
	echo json_encode($data);
  
?>