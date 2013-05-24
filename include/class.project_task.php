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
class project_task
{
    public $mylog;

    /**
     * Konstruktor
     * Initialisiert den Eventlog
     */
    function __construct()
    {
        $this->mylog = new mylog;
    }

    function get($id) {
    	
        $id = (int) $id;
        $sql = "SELECT ID, name, description FROM project_task WHERE ID = $id";
        echo $sql;
        
        $sel = mysql_query($sql);
        $cost_center = mysql_fetch_array($sel);
        
        if (!empty($cost_center)) {
            $cost_center["name"] = stripcslashes($cost_center["name"]);
            $cost_center["description"] = stripcslashes($cost_center["description"]);
            return $cost_center;
        } else {
            return false;
        }
    }
    
	function getByRangeDate($resources,$startdate,$enddate) {
    	
        $sql = "SELECT DISTINCT project_task.ID AS project_task_id, project_task.name AS project_task_name, project_task.description AS project_task_description, cost_center.ID AS cost_center_id, cost_center.code AS cost_center_code, cost_center.name AS cost_center_name, cost_center.description AS cost_center_description 
        		FROM project_task, cost_center, timesheet 
        		WHERE project_task.cost_center_id = cost_center.ID 
        		AND timesheet.project_task_id = project_task.ID 
        		AND `date_booked` < '$enddate' 
        		AND `date_booked` > '$startdate'
        		AND timesheet.assigned_user_id in (".$resources.")
        		ORDER BY cost_center.name, project_task.name LIMIT 0,1000";
        		
        //echo $sql;
       	
        $sel = mysql_query($sql);
        
        $project_tasks = array();
        
        while ($project_task = mysql_fetch_array($sel)) {
            $project_task["name"] = stripcslashes($project_task["name"]);
            $project_task["description"] = stripcslashes($project_task["description"]);
        	array_push($project_tasks, $project_task);
        }

        if (!empty($project_tasks)) {
            return $project_tasks;
        } else {
            return false;
        }
        
    }
    
    function getByUser($userid) {
    	
        $sql = "SELECT project_task.ID AS project_task_id, project_task.name AS project_task_name, project_task.description AS project_task_description, cost_center.ID AS cost_center_id, cost_center.code AS cost_center_code, cost_center.name AS cost_center_name, cost_center.description AS cost_center_description 
        		FROM project_task, cost_center, project_task_assigned 
        		WHERE project_task.cost_center_id = cost_center.ID AND project_task.ID = project_task_assigned.project_task_id AND project_task_assigned.user_id = '$userid' order by cost_center.name, project_task.name LIMIT 0,1000";
        //echo $sql;
        $sel = mysql_query($sql);
        
        $project_tasks = array();
        while ($project_task = mysql_fetch_array($sel)) {
            $project_task["name"] = stripcslashes($project_task["name"]);
            $project_task["description"] = stripcslashes($project_task["description"]);
        	array_push($project_tasks, $project_task);
        }

        if (!empty($project_tasks)) {
            return $project_tasks;
        } else {
            return false;
        }
        
    }
    
    function getAll() {
    	
        $sql = "SELECT project_task.ID AS project_task_id, project_task.name AS project_task_name, project_task.description AS project_task_description, cost_center.ID AS cost_center_id, cost_center.code AS cost_center_code, cost_center.name AS cost_center_name, cost_center.description AS cost_center_description FROM project_task, cost_center WHERE project_task.cost_center_id = cost_center.ID order by cost_center.name, project_task.name LIMIT 0,1000";
        $sel = mysql_query($sql);
        
        $project_tasks = array();
        while ($project_task = mysql_fetch_array($sel)) {
            $project_task["name"] = stripcslashes($project_task["name"]);
            $project_task["description"] = stripcslashes($project_task["description"]);
        	array_push($project_tasks, $project_task);
        }

        if (!empty($project_tasks)) {
            return $project_tasks;
        } else {
            return false;
        }
        
    }

   	function get_json($sql) {
    	
        $i = 0;
		$rows = array();
		
        $sel = mysql_query($sql);
        
        while ($cost_center = mysql_fetch_array($sel)) {
        	$rows[$i]['id']=$cost_center[project_task_ID];
			$rows[$i]['cell']=array(
				$cost_center[cost_center_code],
				$cost_center[cost_center_name],
				$cost_center[project_task_code],
				$cost_center[project_task_name],
			    $cost_center[project_task_description],
			);
			$i++;
        }
        
        if (!empty($rows)) {
            return $rows;
        } else {
            return false;
        }
			
        
    }
    
    function add($cost_center, $project_task_code, $project_task_name, $project_task_description) {
        
    	$cost_center = (int)($cost_center);
    	$project_task_code = mysql_real_escape_string($project_task_code);
    	$project_task_name = mysql_real_escape_string($project_task_name);
    	$project_task_description = mysql_real_escape_string($project_task_description);
    	    	
        $sql = "INSERT INTO project_task ( cost_center_id, code, name, description ) VALUES ('$cost_center', '$project_task_code', '$project_task_name','$project_task_description')";
        echo $sql;
        
        $ins = mysql_query($sql);

        // get current ID
        $insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
   	}
    
    function update($ID, $cost_center, $project_task_code, $project_task_name, $project_task_description) {
        
    	$ID = (int) $ID;
        $cost_center = (int)($cost_center);
    	$project_task_code = mysql_real_escape_string($project_task_code);
    	$project_task_name = mysql_real_escape_string($project_task_name);
    	$project_task_description = mysql_real_escape_string($project_task_description);
    	
        $sql = "UPDATE project_task SET cost_center_id='$cost_center', code='$project_task_code', name='$project_task_name', description='$project_task_description' WHERE ID='$ID' LIMIT 1";
        echo $sql;
        
        $ins = mysql_query($sql);
        if ($ins) {
            return true;
        } else {
            return false;
        }
        
    }    
    
    function delete($id) {

    	$id = (int) $id;
        
        $sql = "DELETE FROM project_task WHERE ID = $id LIMIT 1";
        echo $sql;
        
        $del = mysql_query($sql);
        
        if ($del) {
            return true;
        } else {
            return false;
        }

    }    
    
    function assign($userid, $id) {
    	
        $sql = "INSERT INTO project_task_assigned ( user_id, project_task_id ) VALUES ('$userid', '$id')";
        $ins = mysql_query($sql);

        // get current ID
        $insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
    	
    }    
    
    function unassign($userid, $id) {
    	
        $sql = "DELETE FROM project_task_assigned WHERE user_id='$userid' AND project_task_id = '$id'";
        $del = mysql_query($sql);
        
        if ($del) {
            return true;
        } else {
            return false;
        }
            	
    }    
    
}

?>