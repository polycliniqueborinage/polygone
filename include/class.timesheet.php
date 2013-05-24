<?php
/**
 * Provides methods to interact with users
 *
 * @author Open Dynamics <info@o-dyn.de>
 * @name user
 * @version 0.4.7
 * @package Collabtive
 * @link http://www.o-dyn.de
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License v3 or laterg
 */
class timesheet
{
    public $mylog;

    function __construct()
    {
        $this->mylog = new mylog;
    }

    function save($userid,$date,$project_task_id,$value) {
    	
        $sql = "DELETE FROM timesheet WHERE `assigned_user_id`='$userid' AND `date_booked`='$date' AND `project_task_id`='$project_task_id'";
        $del = mysql_query($sql);
    	
        $sql = "INSERT INTO timesheet ( `assigned_user_id`, `date_booked`, `project_task_id`, `actual` ) VALUES ('$userid', '$date', '$project_task_id', $value)";
    	
        if ($value!='') $ins = mysql_query($sql);

        if ($ins) {
            return true;
        } else {
            return false;
        }
    	
    }
    
    
   	function update() {
    	
		$sql = 'SELECT distinct ct1, ct2, type, label FROM cts where ct1!=0 and ct2!=0';
		$sel = mysql_query($sql);
	  	$ct1ct2s = array();

        while ($ct1ct2 = mysql_fetch_array($sel)) {
            $ct1ct2["ID"] = $ct1ct2["ct1"]."-".$ct1ct2["ct2"];
            $ct1ct2["VALUE"] = $ct1ct2["ct1"]."-".$ct1ct2["ct2"]." ".stripslashes($ct1ct2["label"]);
            array_push($ct1ct2s, $ct1ct2);
        } 	
	  	
        if (!empty($ct1ct2s))  {	
            return $ct1ct2s;
        } else  {
            return false;
        }
        
    }

   	function insert() {
    	
		$sql = 'SELECT distinct ct1, ct2, type, label FROM cts where ct1!=0 and ct2!=0';
		$sel = mysql_query($sql);
	  	$ct1ct2s = array();

        while ($ct1ct2 = mysql_fetch_array($sel)) {
            $ct1ct2["ID"] = $ct1ct2["ct1"]."-".$ct1ct2["ct2"];
            $ct1ct2["VALUE"] = $ct1ct2["ct1"]."-".$ct1ct2["ct2"]." ".stripslashes($ct1ct2["label"]);
            array_push($ct1ct2s, $ct1ct2);
        } 	
	  	
        if (!empty($ct1ct2s))  {	
            return $ct1ct2s;
        } else  {
            return false;
        }
        
    }
    
   	function get() {
    	
		$sql = 'SELECT distinct ct1, ct2, type, label FROM cts where ct1!=0 and ct2!=0';
		$sel = mysql_query($sql);
	  	$ct1ct2s = array();

        while ($ct1ct2 = mysql_fetch_array($sel)) {
            $ct1ct2["ID"] = $ct1ct2["ct1"]."-".$ct1ct2["ct2"];
            $ct1ct2["VALUE"] = $ct1ct2["ct1"]."-".$ct1ct2["ct2"]." ".stripslashes($ct1ct2["label"]);
            array_push($ct1ct2s, $ct1ct2);
        } 	
	  	
        if (!empty($ct1ct2s))  {	
            return $ct1ct2s;
        } else  {
            return false;
        }
        
    }   

   	function getByUserByRange($user_id,$startdate,$enddate) {
    	
		$sql = "SELECT * FROM timesheet, project_task, cost_center
				WHERE timesheet.project_task_id = project_task.id AND cost_center.ID = project_task.cost_center_id AND `date_booked` < '$enddate' AND `date_booked` > '$startdate' AND `assigned_user_id` = '$user_id'";
		$sel = mysql_query($sql);
	  	$timesheets = array();

        while ($timesheet = mysql_fetch_array($sel)) {
            $timesheets[$timesheet['project_task_id']][$timesheet['date_booked']]		= $timesheet['actual'];
        } 	
	  	
        if (!empty($timesheets))  {	
            return $timesheets;
        } else  {
            return false;
        }
        
    }       

    function getByUserByRangeGrouped($resources,$dateintervals,$group) {
    	
    	$timesheets = array();
    	
    	foreach ($dateintervals as $key => $dateinterval) {
    		
	    	if ($group == 'cc') {
				
	    		$sql = "SELECT sum(actual) as actual, cost_center.ID AS id FROM timesheet, project_task, cost_center
					WHERE 
					timesheet.project_task_id = project_task.id 
					AND cost_center.ID = project_task.cost_center_id 
					AND `date_booked` < '".$dateinterval['dateafter']."' AND `date_booked` > '".$dateinterval['datebefore']."' 
					AND `assigned_user_id` IN (".$resources.")
					GROUP BY cost_center.ID";
	    		
	    	} else {
				
	    		$sql = "SELECT sum(actual) as actual, project_task.id AS id FROM timesheet, project_task, cost_center
					WHERE 
					timesheet.project_task_id = project_task.id 
					AND cost_center.ID = project_task.cost_center_id 
					AND `date_booked` < '".$dateinterval['dateafter']."' AND `date_booked` > '".$dateinterval['datebefore']."' 
					AND `assigned_user_id` IN (".$resources.")
	    			GROUP BY project_task.id";
	    		
	    	}
	    	
	    	//echo $sql;
    		$sel = mysql_query($sql);

        	while ($timesheet = mysql_fetch_array($sel)) {
            	$timesheets[$key][$timesheet['id']]		= $timesheet['actual'];
        	}
    		
		}
    	
	  	
        if (!empty($timesheets))  {	
            return $timesheets;
        } else  {
            return false;
        }
        
    }   

function computeTasks($begda, $endda, $userid){
    	
		if($userid=="")
	    	$sql = "SELECT t.project_task_id as task_id,
	    			p.code as task_code,
	    			p.name as task_name,
	    			ROUND(SUM(t.actual), 2) as sum_hours 
	    			FROM timesheet t, project_task p
	    			WHERE date_booked >= '$begda'
	    			AND   date_booked <= '$endda'
	    			AND   p.id = t.project_task_id
	    			GROUP BY t.project_task_id
	    			ORDER BY sum_hours DESC";
	    else
	    	$sql = "SELECT t.project_task_id as task_id,
	    			p.code as task_code,
	    			p.name as task_name,
	    			ROUND(SUM(t.actual), 2) as sum_hours 
	    			FROM timesheet t, project_task p
	    			WHERE date_booked >= '$begda'
	    			AND   date_booked <= '$endda'
	    			AND   p.id = t.project_task_id
	    			AND   t.assigned_user_id = '$userid'
	    			GROUP BY t.project_task_id
	    			ORDER BY sum_hours DESC";	

    	$sel = mysql_query($sql);
		$i=0;
        while( $res = mysql_fetch_array($sel) ){
        
	            $res["task_id"]   = stripcslashes($res["task_id"]);
	            $res["task_code"] = stripcslashes($res["task_code"]);
	            $res["task_name"] = stripcslashes($res["task_name"]);
	            $res["sum_hours"] = stripcslashes($res["sum_hours"]);

	            $result[$i] = $res;
	            $i++;
        }
        
        if (!empty($result))  {	
            return $result;
        } else  {
            return 0;
        }
	
	}

	function computeCostsTasks($begda, $endda, $userid){
    	
		if($userid=="")
	    	$sql = "SELECT t.project_task_id as task_id,
	    			p.code as task_code,
	    			p.name as task_name,
	    			u.hourly_cost * ROUND(SUM(t.actual), 2) as sum_costs 
	    			FROM timesheet t, project_task p, user u
	    			WHERE date_booked >= '$begda'
	    			AND   date_booked <= '$endda'
	    			AND   p.id = t.project_task_id
	    			AND   u.ID = t.assigned_user_id
	    			GROUP BY t.project_task_id
	    			ORDER BY sum_costs DESC";
	    else
	    	$sql = "SELECT t.project_task_id as task_id,
	    			p.code as task_code,
	    			p.name as task_name,
	    			u.hourly_cost * ROUND(SUM(t.actual), 2) as sum_costs 
	    			FROM timesheet t, project_task p, user u
	    			WHERE date_booked >= '$begda'
	    			AND   date_booked <= '$endda'
	    			AND   p.id = t.project_task_id
	    			AND   u.ID = t.assigned_user_id
	    			AND   t.assigned_user_id = '$userid'
	    			GROUP BY t.project_task_id
	    			ORDER BY sum_costs DESC";
	    			
    	$sel = mysql_query($sql);
		$i=0;
        while( $res = mysql_fetch_array($sel) ){
        
	            $res["task_id"]   = stripcslashes($res["task_id"]);
	            $res["task_code"] = stripcslashes($res["task_code"]);
	            $res["task_name"] = stripcslashes($res["task_name"]);
	            $res["sum_costs"] = stripcslashes($res["sum_costs"]);

	            $result[$i] = $res;
	            $i++;
        }
        
        if (!empty($result))  {	
            return $result;
        } else  {
            return 0;
        }
	
	}	
	
function computeCC($begda, $endda, $userid){
    	/*
    	$tasks = $this->computeTasks($begda, $endda);
		
    	for($i=0; $i<$tasks.length(); $i++){    		
    		$result[$i]["cc_id"]     = $this_>getcctask($tasks[$i]["id"]);
    		$result[$i]["sum_hours"] = $tasks[$i]["sum_hours"];
    		$result[$i]["task_id"]   = $tasks[$i]["task_id"];
    	}*/
    	if($userid == "")
	    	$sql = "SELECT p.cost_center_id as cc_id, 
	    			cc.code as cc_code,
	    			cc.name as cc_name,
	    			ROUND(SUM(t.actual), 2) as sum_hours 
	    			FROM timesheet t, project_task p, cost_center cc
	    			WHERE t.date_booked >= '$begda'
	    			AND   t.date_booked <= '$endda'
	    			AND   t.project_task_id = p.id
	    			AND   cc.id = p.cost_center_id
	    			GROUP BY p.cost_center_id
	    			ORDER BY sum_hours DESC";
    	else
    		$sql = "SELECT p.cost_center_id as cc_id, 
	    			cc.code as cc_code,
	    			cc.name as cc_name,
	    			ROUND(SUM(t.actual), 2) as sum_hours 
	    			FROM timesheet t, project_task p, cost_center cc
	    			WHERE t.date_booked >= '$begda'
	    			AND   t.date_booked <= '$endda'
	    			AND   t.project_task_id = p.id
	    			AND   cc.id = p.cost_center_id
	    			AND   t.assigned_user_id = '$userid'
	    			GROUP BY p.cost_center_id
	    			ORDER BY sum_hours DESC";

    	$sel = mysql_query($sql);
		$i=0;
        while( $res = mysql_fetch_array($sel) ){
        
	            $res["cc_id"]     = stripcslashes($res["cc_id"]);
	            $res["cc_code"]   = stripcslashes($res["cc_code"]);
	            $res["cc_name"]   = stripcslashes($res["cc_name"]);
	            $res["sum_hours"] = stripcslashes($res["sum_hours"]);

	            $result[$i] = $res;
	            $i++;
        }
        
        if (!empty($result))  {	
            return $result;
        } else  {
            return 0;
        }
	
	}
	
	function computeCostsCC($begda, $endda, $userid){
    
    	if($userid == "")
	    	$sql = "SELECT p.cost_center_id as cc_id, 
	    			cc.code as cc_code,
	    			cc.name as cc_name,
	    			u.hourly_cost * ROUND(SUM(t.actual), 2) as sum_costs 
	    			FROM timesheet t, project_task p, cost_center cc, user u
	    			WHERE t.date_booked >= '$begda'
	    			AND   t.date_booked <= '$endda'
	    			AND   t.project_task_id = p.id
	    			AND   cc.id = p.cost_center_id
	    			AND   t.assigned_user_id = u.ID
	    			GROUP BY p.cost_center_id
	    			ORDER BY sum_costs DESC";
    	else
    		$sql = "SELECT p.cost_center_id as cc_id, 
	    			cc.code as cc_code,
	    			cc.name as cc_name,
	    			u.hourly_cost * ROUND(SUM(t.actual), 2) as sum_costs 
	    			FROM timesheet t, project_task p, cost_center cc, user u
	    			WHERE t.date_booked >= '$begda'
	    			AND   t.date_booked <= '$endda'
	    			AND   t.project_task_id = p.id
	    			AND   cc.id = p.cost_center_id
	    			AND   t.assigned_user_id = '$userid'
	    			AND   t.assigned_user_id = u.ID
	    			GROUP BY p.cost_center_id
	    			ORDER BY sum_costs DESC";

    	$sel = mysql_query($sql);
		$i=0;
        while( $res = mysql_fetch_array($sel) ){
        
	            $res["cc_id"]     = stripcslashes($res["cc_id"]);
	            $res["cc_code"]   = stripcslashes($res["cc_code"]);
	            $res["cc_name"]   = stripcslashes($res["cc_name"]);
	            $res["sum_hours"] = stripcslashes($res["sum_hours"]);

	            $result[$i] = $res;
	            $i++;
        }
        
        if (!empty($result))  {	
            return $result;
        } else  {
            return 0;
        }
	
	}	
    
    
}

?>
