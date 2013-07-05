<?php
/**
 * Provides methods to interact with users
 *
 * @author MariqueCalcus
 * @Benjamin
 * @version 3
 * @package Collabtive
 */
class workschedule
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

    /**
     * Creates a daily wsr
     *
     */
    function add_daily_wsr($id, $description, $begtime, $endtime, $begbreak, $endbreak, $nb_hours) {
    	
        $id          = mysql_real_escape_string($id);
    	$description = mysql_real_escape_string($description);
        $begtime     = mysql_real_escape_string($begtime);
        $endtime     = mysql_real_escape_string($endtime);
        $begbreak    = mysql_real_escape_string($begbreak);
        $endbreak    = mysql_real_escape_string($endbreak); 
        $nb_hours    = mysql_real_escape_string($nb_hours); 
        
        $sql = "INSERT INTO daily_wsr (id, description, begtime, endtime, begbreak, endbreak, nb_hours) VALUES ('$id', '$description', '$begtime', '$endtime', '$begbreak', '$endbreak', '$nb_hours')";

        $ins = mysql_query($sql);
        $insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
        
    }
    

    /**
     * Get all daily wsr
     *
     * @param neant
     * @return array $daily_wsrs
     */
    function get_all_daily() {
    	
    	$sql = "SELECT 
    			d.id          as id,
    			d.description as description, 
    			d.begtime     as begtime, 
    			d.endtime     as endtime, 
    			d.begbreak    as begbreak, 
    			d.endbreak    as endbreak,
    			d.nb_hours    as nb_hours 
    			FROM daily_wsr AS d
    			ORDER BY d.id";

        
        $sel = mysql_query($sql);
        $i=0;
        while( $daily_wsr = mysql_fetch_array($sel) ){
        
	            $daily_wsr["id"] = stripcslashes($daily_wsr["id"]);
	            $daily_wsr["description"] = stripcslashes($daily_wsr["description"]);
	            $daily_wsr["begtime"]     = stripcslashes($daily_wsr["begtime"]);
	            $daily_wsr["endtime"]     = stripcslashes($daily_wsr["endtime"]);
	            $daily_wsr["begbreak"]    = stripcslashes($daily_wsr["begbreak"]);
	            $daily_wsr["endbreak"]    = stripcslashes($daily_wsr["endbreak"]);
	            $daily_wsr["nb_hours"]    = stripcslashes($daily_wsr["nb_hours"]);
	            
	            $daily_wsrs[$i] = $daily_wsr;
	            $i++; 
	            
        }
        if (!empty($daily_wsrs))  {	
            return $daily_wsrs;
        } else  {
            return false;
        }
    }

    /**
     * Get specific daily wsr
     *
     * @param id id of the requested daily wsr
     * @return array $daily_wsrs
     */
    function get_daily($id) {
    	
    	$sql = "SELECT 
    			d.id          as id,
    			d.description as description, 
    			d.begtime     as begtime, 
    			d.endtime     as endtime, 
    			d.begbreak    as begbreak, 
    			d.endbreak    as endbreak,
    			d.nb_hours    as nb_hours 
    			FROM daily_wsr AS d
    			WHERE id = '$id'";

        $sel = mysql_query($sql);
        
        if($daily_wsr = mysql_fetch_array($sel)){
        
	        $daily_wsr["id"]          = stripcslashes($daily_wsr["id"]);
	        $daily_wsr["description"] = stripcslashes($daily_wsr["description"]);
	        $daily_wsr["begtime"]     = stripcslashes($daily_wsr["begtime"]);
	        $daily_wsr["endtime"]     = stripcslashes($daily_wsr["endtime"]);
	        $daily_wsr["begbreak"]    = stripcslashes($daily_wsr["begbreak"]);
	        $daily_wsr["endbreak"]    = stripcslashes($daily_wsr["endbreak"]);
	        $daily_wsr["nb_hours"]    = stripcslashes($daily_wsr["nb_hours"]);
        }
	        
        
        if (!empty($daily_wsr))  { 	
            return $daily_wsr;
        } else  {
            return false;
        }
    }    

    /**
     * Modify daily work schedule
     *
     * @param id id of the requested wsr - description - begtime - endtime - begbreak - endbreak - nb_hours
     * @return array $wsrs
     */    
    function update_daily_wsr($id, $description, $begtime, $endtime, $begbreak, $endbreak, $nb_hours)  {
    	
        $description = mysql_real_escape_string($description);
        $begtime     = mysql_real_escape_string($begtime);
        $endtime     = mysql_real_escape_string($endtime);
        $begbreak    = mysql_real_escape_string($begbreak);
        $endbreak    = mysql_real_escape_string($endbreak);
        $nb_hours    = mysql_real_escape_string($nb_hours);
        
        $sql = "UPDATE daily_wsr set description='$description' , begtime='$begtime', endtime='$endtime', begbreak='$begbreak',
        		endbreak='$endbreak', nb_hours='$nb_hours' where id='$id'";
        
        $upd = mysql_query($sql);
        
        if ($upd) {
            return true;
        } else {
            return false;
        }

    }
    
    
    /**
     * Delete daily wsr
     *
     * @param id id of the requested daily wsr
     * @return true if deletion happened correctly; false otherwise
     */    
    function delete_dws($id)  {
    	
        $sql = "DELETE FROM daily_wsr WHERE id='$id'";
        
        $del = mysql_query($sql);
        
        if ($del) {
            return true;
        } else {
            return false;
        }

    }    
    
    
    /**
     * Add wsr
     *
     * @param id of the new wsr - index of requested line
     * @return array $daily_wsrs
     */    
    function add_wsr($id, $index, $description, $day1, $day2, $day3, $day4, $day5, $day6, $day7) {
    	
        $description = mysql_real_escape_string($description);
        $day1        = mysql_real_escape_string($day1);
        $day2        = mysql_real_escape_string($day2);
        $day3        = mysql_real_escape_string($day3);
        $day4        = mysql_real_escape_string($day4); 
        $day5        = mysql_real_escape_string($day5);
        $day6        = mysql_real_escape_string($day6);
        $day7        = mysql_real_escape_string($day7);
        
        $sql = "INSERT INTO work_schedule ( `id`, `index`, `description`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`) VALUES ('$id', '$index', '$description', '$day1', '$day2', '$day3', '$day4', '$day5', '$day6', '$day7')";
        
        /*if($id == '') {
       		$sql_lastid = "SELECT MAX('id') FROM work_schedule";
       		$select = mysql_query($sql_lastid);
       		$lastid = mysql_fetch_array($select) + 1;
       		$sql = "INSERT INTO work_schedule ( id, index, description, day1, day2, day3, day4, day5, day6, day7) VALUES ('$lastid', 1, '$description', '$day1', '$day2', '$day3', '$day4', '$day5', '$day6', '$day7'=)";
       	}
       	else{
       		$sql_lastindex = "SELECT MAX('index') FROM work_schedule WHERE id='$id'";
       		$select = mysql_query($sql_lastindex);
       		$lastindex = mysql_fetch_array($select) + 1;
       		$sql = "INSERT INTO work_schedule ( id, index, description, day1, day2, day3, day4, day5, day6, day7) VALUES ('$id', '$lastindex', '$description', '$day1', '$day2', '$day3', '$day4', '$day5', '$day6', '$day7'=)";
       	}	
*/
        $ins = mysql_query($sql);
        $insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
        
    }    
    
    /**
     * Get all work schedules
     *
     * @param neant
     * @return array $wsrs
     */
    function get_all_wsr() {
    	
    	$sql = "SELECT
    			w.id    as `id`,
    			w.index as `index`,
    			w.description as `description`, 
    			w.day1  as `day1`, 
    			w.day2  as `day2`, 
    			w.day3  as `day3`, 
    			w.day4  as `day4`, 
    			w.day5  as `day5`,
    			w.day6  as `day6`,
    			w.day7  as `day7` 
    			FROM work_schedule AS w
    			ORDER BY `id`, `index`";

        
        $sel = mysql_query($sql);
        $i=0;
        while( $wsr = mysql_fetch_array($sel) ){
        
	            $wsr["id"] = stripcslashes($wsr["id"]);
	            $wsr["index"] = stripcslashes($wsr["index"]);
	            $wsr["description"] = stripcslashes($wsr["description"]);
	            $wsr["day1"] = stripcslashes($wsr["day1"]);
	            $wsr["day2"] = stripcslashes($wsr["day2"]);
	            $wsr["day3"] = stripcslashes($wsr["day3"]);
	            $wsr["day4"] = stripcslashes($wsr["day4"]);
	            $wsr["day5"] = stripcslashes($wsr["day5"]);
	            $wsr["day6"] = stripcslashes($wsr["day6"]);
	            $wsr["day7"] = stripcslashes($wsr["day7"]);
	            
	            //array_push($wsrs, $wsr);
	            $wsrs[$i] = $wsr;
	            $i++; 
	        
        }
        if (!empty($wsrs))  {	
            return $wsrs;
        } else  {
            return false;
        }
    }

    function get_all_wsr_ids() {
    	
    	$sql = "SELECT
    			w.id    as `id`,
    			w.index as `index`,
    			w.description as `description`, 
    			w.day1  as `day1`, 
    			w.day2  as `day2`, 
    			w.day3  as `day3`, 
    			w.day4  as `day4`, 
    			w.day5  as `day5`,
    			w.day6  as `day6`,
    			w.day7  as `day7` 
    			FROM work_schedule AS w
    			GROUP BY `id`
    			ORDER BY `id`, `index`";

        
        $sel = mysql_query($sql);
        $i=0;
        while( $wsr = mysql_fetch_array($sel) ){
        
	            $wsr["id"] = stripcslashes($wsr["id"]);
	            $wsr["index"] = stripcslashes($wsr["index"]);
	            $wsr["description"] = stripcslashes($wsr["description"]);
	            $wsr["day1"] = stripcslashes($wsr["day1"]);
	            $wsr["day2"] = stripcslashes($wsr["day2"]);
	            $wsr["day3"] = stripcslashes($wsr["day3"]);
	            $wsr["day4"] = stripcslashes($wsr["day4"]);
	            $wsr["day5"] = stripcslashes($wsr["day5"]);
	            $wsr["day6"] = stripcslashes($wsr["day6"]);
	            $wsr["day7"] = stripcslashes($wsr["day7"]);
	            
	            //array_push($wsrs, $wsr);
	            $wsrs[$i] = $wsr;
	            $i++; 
	        
        }
        if (!empty($wsrs))  {	
            return $wsrs;
        } else  {
            return false;
        }
    }    

    /**
     * Get specific work schedule
     *
     * @param id id of the requested wsr
     * @return array $wsrs
     */
    function get_wsr($id) {
    	
    	$sql = "SELECT
    			w.id    as `id`,
    			w.index as `index`,
    			w.description as `description`, 
    			w.day1  as `day1`, 
    			w.day2  as `day2`, 
    			w.day3  as `day3`, 
    			w.day4  as `day4`, 
    			w.day5  as `day5`,
    			w.day6  as `day6`,
    			w.day7  as `day7`  
    			FROM work_schedule AS w
    			WHERE id = '$id'";

        $sel = mysql_query($sql);
        $wsrs = array();
        $i=0;
        while( $wsr = mysql_fetch_array($sel) ){
        
	            $wsr["id"] = stripcslashes($wsr["id"]);
	            $wsr["index"] = stripcslashes($wsr["index"]);
	            $wsr["description"] = stripcslashes($wsr["description"]);
	            $wsr["day1"] = stripcslashes($wsr["day1"]);
	            $wsr["day2"] = stripcslashes($wsr["day2"]);
	            $wsr["day3"] = stripcslashes($wsr["day3"]);
	            $wsr["day4"] = stripcslashes($wsr["day4"]);
	            $wsr["day5"] = stripcslashes($wsr["day5"]);
	            $wsr["day6"] = stripcslashes($wsr["day6"]);
	            $wsr["day7"] = stripcslashes($wsr["day7"]);
	            
	            //array_push($wsrs, $wsr);
	            $wsrs[$i] = $wsr;
	            $i++;
        } 
        if (!empty($wsrs))  {	
            return $wsrs;
        } else  {
            return false;
        }
    }
    
    /**
     * Get specific work schedule
     *
     * @param id id of the requested wsr
     * @return array $wsrs
     */
    function get_detailed_wsr($id) {
    	
    	$sql = "SELECT
    			w.id    as `id`,
    			w.index as `index`,
    			w.description as `description`, 
    			w.day1  as `day1`, 
    			w.day2  as `day2`, 
    			w.day3  as `day3`, 
    			w.day4  as `day4`, 
    			w.day5  as `day5`,
    			w.day6  as `day6`,
    			w.day7  as `day7`  
    			FROM work_schedule AS w
    			WHERE id = '$id'";

        $sel = mysql_query($sql);
        $wsrs = array();
        $i=0;
        while( $wsr = mysql_fetch_array($sel) ){
        
	            $wsr["id"] 					= stripcslashes($wsr["id"]);
	            $wsr["index"] 				= stripcslashes($wsr["index"]);
	            $wsr["description"] 		= stripcslashes($wsr["description"]);
	            
	            $wsr["day1"] 				= stripcslashes($wsr["day1"]);
	            $detailed_day1 = $this->get_daily($wsr["day1"]);
	            $wsr["day1_description"] 	= $detailed_day1["description"];
	            $wsr["day1_begtime"] 		= $detailed_day1["begtime"];
	            $wsr["day1_endtime"] 		= $detailed_day1["endtime"];
	            $wsr["day1_begbreak"] 		= $detailed_day1["begbreak"];
	            $wsr["day1_endbreak"] 		= $detailed_day1["endbreak"];
	            $wsr["day1_nb_hours"] 		= $detailed_day1["nb_hours"];
	        
	            $wsr["day2"] 				= stripcslashes($wsr["day2"]);
	            $detailed_day2 = $this->get_daily($wsr["day2"]);
	            $wsr["day2_description"] 	= $detailed_day2["description"];
	            $wsr["day2_begtime"] 		= $detailed_day2["begtime"];
	            $wsr["day2_endtime"] 		= $detailed_day2["endtime"];
	            $wsr["day2_begbreak"] 		= $detailed_day2["begbreak"];
	            $wsr["day2_endbreak"] 		= $detailed_day2["endbreak"];
	            $wsr["day2_nb_hours"] 		= $detailed_day2["nb_hours"];
	            
	            $wsr["day3"] 				= stripcslashes($wsr["day3"]);
	            $detailed_day3 = $this->get_daily($wsr["day3"]);
	            $wsr["day3_description"] 	= $detailed_day3["description"];
	            $wsr["day3_begtime"] 		= $detailed_day3["begtime"];
	            $wsr["day3_endtime"] 		= $detailed_day3["endtime"];
	            $wsr["day3_begbreak"] 		= $detailed_day3["begbreak"];
	            $wsr["day3_endbreak"] 		= $detailed_day3["endbreak"];
	            $wsr["day3_nb_hours"] 		= $detailed_day3["nb_hours"];
	            
	            $wsr["day4"] 				= stripcslashes($wsr["day4"]);
	            $detailed_day4 = $this->get_daily($wsr["day4"]);
	            $wsr["day4_description"] 	= $detailed_day4["description"];
	            $wsr["day4_begtime"] 		= $detailed_day4["begtime"];
	            $wsr["day4_endtime"] 		= $detailed_day4["endtime"];
	            $wsr["day4_begbreak"] 		= $detailed_day4["begbreak"];
	            $wsr["day4_endbreak"] 		= $detailed_day4["endbreak"];
	            $wsr["day4_nb_hours"] 		= $detailed_day4["nb_hours"];
	            
	            $wsr["day5"] 				= stripcslashes($wsr["day5"]);
	            $detailed_day5 = $this->get_daily($wsr["day5"]);
	            $wsr["day5_description"] 	= $detailed_day5["description"];
	            $wsr["day5_begtime"] 		= $detailed_day5["begtime"];
	            $wsr["day5_endtime"] 		= $detailed_day5["endtime"];
	            $wsr["day5_begbreak"] 		= $detailed_day5["begbreak"];
	            $wsr["day5_endbreak"] 		= $detailed_day5["endbreak"];
	            $wsr["day5_nb_hours"] 		= $detailed_day5["nb_hours"];
	            
	            $wsr["day6"] 				= stripcslashes($wsr["day6"]);
	            $detailed_day6 = $this->get_daily($wsr["day6"]);
	            $wsr["day6_description"] 	= $detailed_day6["description"];
	            $wsr["day6_begtime"] 		= $detailed_day6["begtime"];
	            $wsr["day6_endtime"] 		= $detailed_day6["endtime"];
	            $wsr["day6_begbreak"] 		= $detailed_day6["begbreak"];
	            $wsr["day6_endbreak"] 		= $detailed_day6["endbreak"];
	            $wsr["day6_nb_hours"] 		= $detailed_day6["nb_hours"];
	            
	            $wsr["day7"] 				= stripcslashes($wsr["day7"]);
	            $detailed_day7 = $this->get_daily($wsr["day7"]);
	            $wsr["day7_description"] 	= $detailed_day7["description"];
	            $wsr["day7_begtime"] 		= $detailed_day7["begtime"];
	            $wsr["day7_endtime"] 		= $detailed_day7["endtime"];
	            $wsr["day7_begbreak"] 		= $detailed_day7["begbreak"];
	            $wsr["day7_endbreak"] 		= $detailed_day7["endbreak"];
	            $wsr["day7_nb_hours"] 		= $detailed_day7["nb_hours"];
	            
	            //array_push($wsrs, $wsr);
	            $wsrs[$i] = $wsr;
	            $i++;
        } 
        if (!empty($wsrs))  {	
            return $wsrs;
        } else  {
            return false;
        }
    }    
    
    function get_max_index($id) {
    	
    	$sql = "SELECT
    			MAX(w.index) as max 
    			FROM work_schedule AS w
    			WHERE id = '$id'";

        
        $sel = mysql_query($sql);
        $wsrs = array();
        $wsr = mysql_fetch_array($sel);
        $wsr["max"] = stripcslashes($wsr["max"]);
        
        if (!empty($wsr))  {	
            return $wsr["max"];
        } else  {
            return 0;
        }
    }    
    
    /**
     * Modify work schedule
     *
     * @param id id of the requested wsr - index index of requested line - description - day1 to day7
     * @return array $wsrs
     */    
    function update_wsr($id, $index, $description, $day1, $day2, $day3, $day4, $day5, $day6, $day7)  {
    	
        $description = mysql_real_escape_string($description);
        $day1        = mysql_real_escape_string($day1);
        $day2        = mysql_real_escape_string($day2);
        $day3        = mysql_real_escape_string($day3);
        $day4        = mysql_real_escape_string($day4);
        $day5        = mysql_real_escape_string($day5);
        $day6        = mysql_real_escape_string($day6);
        $day7        = mysql_real_escape_string($day7);
        
        $sql = "UPDATE work_schedule set `description`='$description', `day1`='$day1', `day2`='$day2', `day3`='$day3', `day4`='$day4',
                `day5`='$day5', `day6`='$day6', `day7`='$day7' where `id`='$id' AND `index`='$index'";
        
        $upd = mysql_query($sql);
        
        if ($upd) {
            return true;
        } else {
            return false;
        }

    }    


    /**
     * Delete specific work schedule
     *
     * @param id id of the requested wsr - index of the requested line
     * @return true is deletion happened correctly 
     */    
    function delete_wsr($id, $index)  {
    	
        //$sql_lastindex = "SELECT MAX('index') FROM work_schedule WHERE id='$id'";
       	//$select = mysql_query($sql_lastindex);
       	//$lastindex = mysql_fetch_array($select);
        
        $sql = "DELETE FROM work_schedule WHERE `id`='$id' AND `index`='$index'";
        $del = mysql_query($sql);
        
        /*$current_index = $index;
        $index = $index+1;
        while($current_index < $lastindex){
        	$sql_mod = "UPDATE work_schedule set index='$current_index' = WHERE index='$index'";
        	$del = mysql_query($sql);
        	$current_index = $index;
        	$index = $index+1;
        }*/
        
        if ($del) {
            return true;
        } else {
            return false;
        }

    }    
    
    function get_wsr_ondate($wsrid, $date, $refdate){
    	
    	$ref_date = substr($refdate, 6, 4)."-".substr($refdate, 3, 2)."-".substr($refdate, 0, 2);
		$diff = abs(strtotime($date) - strtotime($ref_date));
		
		$days = round($diff/ (60*60*24));
		
		$nb_weeks  = (int) ($days/7) + 1;
		$start_day = $days%7 + 1;
		$wsr 		= $this->get_wsr($wsrid);
		$max_index 	= $this->get_max_index($wsrid);
		$start_week = $nb_weeks % $max_index + 1;
		
		$current_week = $start_week;
		$current_day  = $start_day;
		
		return($this->get_daily($wsr[$current_week-1]["day".$current_day]));
    }
  
}

?>