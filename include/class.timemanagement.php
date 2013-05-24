<?php
/**
 * Provides methods to interact with timemangement (abs/quotas)
 *
 * @author MariqueCalcus
 * @name BMarique
 * @license http://www.mariquecalcus.com
 */
class timemanagement
{
    public $mylog;

    function __construct()
    {
        $this->mylog = new mylog;
    }

    /**
     * Add Absence
     *
     */
    function addAbsence($groupe, $code, $description, $type, $commentrequired, $rule) {
    	
    	
    	$description = mysql_real_escape_string($description);
    	
        $sql = "INSERT `absences` ( `groupe` , `id` , `description` , `type` , `comment` , `rule`)
				VALUES ( '$groupe', '$code', '$description', '$type', '$comment', '$rule');";

		$ins = mysql_query($sql);
		$insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
        
    }
    
    /**
     * Update Absence
     *
     */
    function updateAbsence($groupe, $code, $description, $type, $comment, $rule) {
    	
        $description  = mysql_real_escape_string($description);
       
        $sql = "UPDATE absences SET description='$description', type='$type', comment='$comment', rule='$rule' WHERE groupe='$groupe' AND id='$code'";
        
        $upd = mysql_query($sql);
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }
    
    function getAllAbsences($groupe) {
    	
        $sql = "SELECT
			id 			AS id,
			description AS description,
			type		AS type, 
			comment		AS comment, 
			rule 		AS rule
			FROM absences
			WHERE groupe = '$groupe' 
			ORDER BY id ASC";
        
	  	$sel = mysql_query($sql);
	  	
	  	$absences = array();
	    
        while ($absence = mysql_fetch_array($sel)) {
        	$absence["id"] 	 			= stripslashes($absence["id"]);
            $absence["description"] 	= stripslashes($absence["description"]);
            $absence["type"] 			= stripslashes($absence["type"]);
            $absence["comment"] 		= stripslashes($absence["comment"]);
            $absence["rule"]  			= stripslashes($absence["rule"]);
        	array_push($absences, $absence);
        }
        
        if (!empty($absences)) {	
            return $absences;
        }
        else {
            return false;
        }
    	
    }
    
	function getAbsence($groupe, $id) {
    	
        $sql = "SELECT
			id 			AS id,
			description AS description,
			type 		AS type,
			comment 	AS comment, 
			rule 		AS rule
			FROM absences
			WHERE groupe = '$groupe' 
			AND   id     = '$id'";
        
	  	$sel = mysql_query($sql);
	  	
        $absence = mysql_fetch_array($sel);
        $absence["id"] 	 			= stripslashes($absence["id"]);
        $absence["description"] 	= stripslashes($absence["description"]);
        $absence["type"] 			= stripslashes($absence["type"]);
        $absence["commment"] 		= stripslashes($absence["comment"]);
        $absence["rule"]  			= stripslashes($absence["rule"]);
        
        
        if (!empty($absence)) {	
            return $absence;
        }
        else {
            return false;
        }
    	
    }
    
    function addQuota($groupe, $code, $description, $type, $periodicite, $cumul, $auto_solde) {
    	
    	
    	$description = mysql_real_escape_string($description);
    	
        $sql = "INSERT `quotas` ( `groupe` , `id` , `description` , `type` , `periodicite` , `cumul`, `auto_solde`)
				VALUES ( '$groupe', '$code', '$description', '$type' , '$periodicite' , '$cumul', '$auto_solde');";

		$ins = mysql_query($sql);
		$insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
        
    }
    
    /**
     * Update Quota
     *
     */
    function updateQuota($groupe, $code, $description, $type, $periodicite, $cumul, $auto_solde) {
    	
        $description  = mysql_real_escape_string($description);
       
        $sql = "UPDATE quotas SET description='$description', type='$type', periodicite='$periodicite', cumul='$cumul', auto_solde='$auto_solde' 
        		WHERE groupe='$groupe' AND id='$code'";
        
        $upd = mysql_query($sql);
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }
    
    function getAllQuotas($groupe) {
    	
        $sql = "SELECT
			id 			AS id,
			description AS description,
			type        AS type, 
			periodicite AS periodicite,
			cumul	 	AS cumul,
			auto_solde  AS auto_solde
			FROM quotas
			WHERE groupe = '$groupe'
			ORDER BY id ASC";
        
	  	$sel = mysql_query($sql);
	  	
	  	$quotas = array();
	    
        while ($quota = mysql_fetch_array($sel)) {
	        $quota["id"] 	 			= stripslashes($quota["id"]);
	        $quota["description"] 		= stripslashes($quota["description"]);
	        $quota["type"]  			= stripslashes($quota["type"]);
	        $quota["periodicite"] 		= stripslashes($quota["periodicite"]);
	        $quota["cumul"] 			= stripslashes($quota["cumul"]);
	        $quota["auto_solde"]  		= stripslashes($quota["auto_solde"]);
        	array_push($quotas, $quota);
        }
        
        if (!empty($quotas)) {	
            return $quotas;
        }
        else {
            return false;
        }
    	
    }
    
	function getQuota($groupe, $id) {
    	
        $sql = "SELECT
			id 			AS id,
			description AS description,
			type        AS type, 
			periodicite AS periodicite,
			cumul	 	AS cumul,
			auto_solde  AS auto_solde
			FROM quotas
			WHERE groupe = '$groupe' 
			AND   id     = '$id'";
        
	  	$sel = mysql_query($sql);
	  	
        $quota = mysql_fetch_array($sel);
        $quota["id"] 	 			= stripslashes($quota["id"]);
        $quota["description"] 		= stripslashes($quota["description"]);
        $quota["type"]  			= stripslashes($quota["type"]);
        $quota["periodicite"] 		= stripslashes($quota["periodicite"]);
        $quota["cumul"] 			= stripslashes($quota["cumul"]);
        $quota["auto_solde"]  		= stripslashes($quota["auto_solde"]);
        
        
        if (!empty($quota)) {	
            return $quota;
        }
        else {
            return false;
        }
    	
    }
    
	function addRule($groupe, $id, $quota_table) {
    	
    	for($i=0; $i<count($quota_table); $i++){
	        $sql = "INSERT `quota_rules` ( `groupe` , `id` , `index`, `quota_id`)
					VALUES ( '$groupe', '$id', '$index', '$quota_id');";
	
			$ins = mysql_query($sql);
			$insid = mysql_insert_id();
    	}
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
        
    }
    
    /**
     * Update Rule
     *
     */
    function updateRule($groupe, $id, $quota_table) {
    	
        $sql = "DELETE FROM quota_rules WHERE groupe = '$groupe' AND id = '$id'";
        $del = mysql_query($sql);
        
        return $this->addRule($groupe, $id, $quota_table);
        
    }
    
    function getAllQuotaRules($groupe) {
    	
        $sql = "SELECT
			r.id 			AS id,
			r.index 		AS index,
			r.quota_id 		AS quota, 
			q.description 	AS quota_description,
			q.type 			AS quota_type,
			q.periodicite 	AS quota_periodicite,
			q.cumul	 		AS quota_cumul,
			q.auto_solde  	AS quota_auto_solde
			FROM quotas q, quota_rules r
			WHERE groupe = '$groupe'
			ORDER BY id ASC";
        
	  	$sel = mysql_query($sql);
	  	
	  	$rules = array();
	    
        while ($rule = mysql_fetch_array($sel)) {
	        $rule["id"] 	 			= stripslashes($rule["id"]);
	        $rule["index"] 				= stripslashes($rule["index"]);
	        $rule["quota"]  			= stripslashes($rule["quota"]);
	        $rule["quota_description"] 	= stripslashes($rule["quota_description"]);
	        $rule["quota_type"] 		= stripslashes($rule["quota_type"]);
	        $rule["quota_periodicite"]  = stripslashes($rule["quota_periodicite"]);
	        $rule["quota_type"] 		= stripslashes($rule["quota_cumul"]);
	        $rule["quota_auto_solde"]  = stripslashes($rule["quota_auto_solde"]);
        	array_push($rules, $rule);
        }
        
        if (!empty($rules)) {	
            return $rules;
        }
        else {
            return false;
        }
    	
    }
    
	function getQuotaRule($groupe, $id) {
    	
	$sql = "SELECT
			r.id 			AS id,
			r.index 		AS index,
			r.quota_id 		AS quota, 
			q.description 	AS quota_description,
			q.type 			AS quota_type,
			q.periodicite 	AS quota_periodicite,
			q.cumul	 		AS quota_cumul,
			q.auto_solde  	AS quota_auto_solde
			FROM quotas q, quota_rules r
			WHERE groupe = '$groupe'
			AND   id     = '$id'
			ORDER BY id ASC";
        
		$rules = array();
	    
		$sel = mysql_query($sql);
	
        while ($rule = mysql_fetch_array($sel)) {
		  	
	        $rule["id"] 	 			= stripslashes($rule["id"]);
	        $rule["index"] 				= stripslashes($rule["index"]);
	        $rule["quota"]  			= stripslashes($rule["quota"]);
	        $rule["quota_description"] 	= stripslashes($rule["quota_description"]);
	        $rule["quota_type"] 		= stripslashes($rule["quota_type"]);
	        $rule["quota_periodicite"]  = stripslashes($rule["quota_periodicite"]);
	        $rule["quota_cumul"] 		= stripslashes($rule["quota_cumul"]);
	        $rule["quota_auto_solde"]   = stripslashes($rule["quota_auto_solde"]);
	        array_push($rules, $rule);
        }
        
        
        if (!empty($rules)) {	
            return $rules;
        }
        else {
            return false;
        }
    	
    }
    
	function getUserActualQuotas($userid, $begda, $endda) {
    	
	$sql = "SELECT
			uq.quota_id,
			uq.begda,
			q.description,
			q.type,
			uq.endda, 
			uq.start_saldo,
			uq.used_saldo,
			uq.requested_saldo
			FROM quota_users uq, quotas q, user u
			WHERE uq.user_id 	=  '$userid'
			AND   uq.begda 		<= '$begda'
			AND   uq.endda 		>= '$endda'
			AND   uq.quota_id 	=  q.id
			AND   q.groupe    	=  u.timegroupe
			AND   u.ID			=  '$userid'
			ORDER BY uq.quota_id ASC";
        
		$quotas = array();
	    
		$sel = mysql_query($sql);
		
        while ($quota = mysql_fetch_array($sel)) {
		  	
	        $quota["id"] 	 			= stripslashes($quota["quota_id"]);
	        $quota["description"] 		= stripslashes($quota["description"]);
	        $quota["type"] 				= stripslashes($quota["type"]);
	        $quota["begda"] 			= stripslashes($quota["begda"]);
	        $quota["endda"] 			= stripslashes($quota["endda"]);
	        $quota["start_saldo"]		= stripslashes($quota["start_saldo"]);
	        $quota["used_saldo"] 		= stripslashes($quota["used_saldo"]);
	        $quota["requested_saldo"] 	= stripslashes($quota["requested_saldo"]);
	        $quota["remaining_saldo"] 	= stripslashes($quota["start_saldo"]) - stripslashes($quota["used_saldo"]) - stripslashes($quota["requested_saldo"]);
	        array_push($quotas, $quota);
        }
        
        
        if (!empty($quotas)) {	
            return $quotas;
        }
        else {
            return false;
        }
    	
    }
    
    function checkEnoughQuota($userid, $absenceid, $begda, $endda, $beghr, $endhr, $comment, $status, $owner){
    	$user 			= (object) new user();
    	$userdetails	= $user->getProfile($userid);
    	$timegroupe		= $userdetails["timegroupe"];
    	
    	$workschedule	= (object) new workschedule();
    	
    	$absence = $this->getAbsence($timegroupe, $absenceid);
		
		//compute nb of absence unit
		if($absence["type"] == 'D'){
     		$requested_quota = floor((strtotime($endda) - strtotime($begda))/(60*60*24));
		}
		else{
			if($begda != $endda){
				$current_day_details = $workschedule->get_wsr_ondate($userdetails["wsr_id"], $begda, $userdetails["wsr_refdate"]);
				$requested_quota = $this->getNbHours($current_day_details["endtime"], $beghr);
				if($beghr < $current_day_details["begbreak"]){
					$requested_quota = $requested_quota - $this->getNbHours($current_day_details["endtime"], $current_day_details["begtime"]);
				}
				$current_day = date('Y-m-d', strtotime('+1 day', strtotime($begda))); 
				while($current_day != $endda){
					$current_day_details = $workschedule->get_wsr_ondate($userdetails["wsr_id"], $current_day, $userdetails["wsr_refdate"]);
					$requested_quota += $current_day_details["nb_hours"];
					$current_day = date('Y-m-d', strtotime('+1 day', strtotime($current_day)));
				}
				$current_day_details = $workschedule->get_wsr_ondate($userdetails["wsr_id"], $endda, $userdetails["wsr_refdate"]);
				$requested_quota += $this->getNbHours($endhr, $current_day_details["begtime"]);
				if($endhr > $current_day_details["endbreak"]){
					$requested_quota = $requested_quota - $this->getNbHours($current_day_details["endtime"], $current_day_details["begtime"]);
				}
				
			}else{
				$requested_quota = $this->getNbHours($endhr, $beghr);
			}
		}
		
		//get list of quotas to reduce
		$list_quotas = $this->getListQuotas($timegroupe, $absence["rule"], $userid, $begda, $endda);
		
		$dispo = 0;
		for ($i=0; $i<count($list_quotas);$i++){
			$dispo += $list_quotas[$i]["start_saldo"] - $list_quotas[$i]["used_saldo"] - $list_quotas[$i]["requested_saldo"];
		}
		
		if($dispo >= $requested_quota){
			return true;
		} else {
			return false;	
		} 
		
    }
    
	function getRemainingQuota($userid, $absenceid, $begda, $endda){
    	$user 			= (object) new user();
    	$userdetails	= $user->getProfile($userid);
    	$timegroupe		= $userdetails["timegroupe"];
    	
    	$workschedule	= (object) new workschedule();
    	
    	$absence = $this->getAbsence($timegroupe, $absenceid);
	
		//get list of quotas to reduce
		$list_quotas = $this->getListQuotas($timegroupe, $absence["rule"], $userid, $begda, $endda);
		
		$dispo = 0;
		for ($i=0; $i<count($list_quotas);$i++){
			$dispo += $list_quotas[$i]["start_saldo"] - $list_quotas[$i]["used_saldo"] - $list_quotas[$i]["requested_saldo"];
		}
		if(count($list_quotas) == 0)
			return (-1);
		else
			return($dispo);
		
    }
    
    function submitAbsence($requestType, $userid, $absenceid, $begda, $endda, $beghr, $endhr, $comment, $status, $owner) {
    	//$comment = mysql_real_escape_string($description);
    	if($requestType == "submit"){
	        $sql = "INSERT `user_absences` ( `requestid` , `user_id` , `absence_id` , `begda` , `endda` , `beghr` , `endhr` , `comment` , `status` , `owner`)
					VALUES ( '', '$userid', '$absenceid', '$begda' , '$endda' , '$beghr' , '$endhr', '$comment', '$status', '$owner' );";
	
	        //SEND notifications
	        
			$ins = mysql_query($sql);
			$insid = mysql_insert_id();
    	} else {
    		$begda = substr($begda, 6, 4)."-".substr($begda, 3, 2)."-".substr($begda, 0, 2);
    		$endda = substr($endda, 6, 4)."-".substr($endda, 3, 2)."-".substr($endda, 0, 2);
    	}
    	
		//get absence type -> day/hour?
		$user 			= (object) new user();
    	$userdetails	= $user->getProfile($userid);
    	$timegroupe		= $userdetails["timegroupe"];
    	
    	$workschedule	= (object) new workschedule();
    	
    	$absence = $this->getAbsence($timegroupe, $absenceid);
		
		//compute nb of absence unit
		if($absence["type"] == 'D'){
     		$requested_quota = floor((strtotime($endda) - strtotime($begda))/(60*60*24));
		}
		else{
			if($begda != $endda){
				$current_day_details = $workschedule->get_wsr_ondate($userdetails["wsr_id"], $begda, $userdetails["wsr_refdate"]);
				if($beghr == '00:00' || $beghr == '00:00:00') $beghr = $current_day_details["begtime"];
				$requested_quota = $this->getNbHours($current_day_details["endtime"], $beghr);
				
				if($beghr < $current_day_details["begbreak"] && $current_day_details["begbreak"] != '00:00:00'){
					$requested_quota = $requested_quota - $this->getNbHours($current_day_details["endbreak"], $current_day_details["begbreak"]);
				}
				
				$current_day = date('Y-m-d', strtotime('+1 day', strtotime($begda))); 
				
				while($current_day != $endda){
					$current_day_details = $workschedule->get_wsr_ondate($userdetails["wsr_id"], $current_day, $userdetails["wsr_refdate"]);
					$requested_quota += $current_day_details["nb_hours"];
					$current_day = date('Y-m-d', strtotime('+1 day', strtotime($current_day)));
					
				}
				$current_day_details = $workschedule->get_wsr_ondate($userdetails["wsr_id"], $endda, $userdetails["wsr_refdate"]);
				
				if($endhr == '00:00' || $endhr == '00:00:00') $endhr = $current_day_details["endtime"];
				$requested_quota += $this->getNbHours($endhr, $current_day_details["begtime"]);
				
				if($endhr > $current_day_details["endbreak"] && $current_day_details["endbreak"] != '00:00:00'){
					$requested_quota = $requested_quota - $this->getNbHours($current_day_details["endbreak"], $current_day_details["begbreak"]);
				}
				
			}else{
				if($beghr == "00:00" || $endhr == "00:00" || $beghr == "00:00:00" || $endhr == "00:00:00"){
					$current_day_details = $workschedule->get_wsr_ondate($userdetails["wsr_id"], $begda, $userdetails["wsr_refdate"]);
					$requested_quota = $current_day_details["nb_hours"];
				} else {
					$requested_quota = $this->getNbHours($endhr, $beghr);
				}
			}
		}
		//get list of quotas to reduce
		$list_quotas = $this->getListQuotas($timegroupe, $absence["rule"], $userid, $begda, $endda);
		
		//while there is quota to reduce, take it from the list
		$cursor = 0; 
		While($requested_quota > 0){
			if($requestType == "submit"){
				$dispo = $list_quotas[$cursor]["start_saldo"] - $list_quotas[$cursor]["used_saldo"] - $list_quotas[$cursor]["requested_saldo"];
				
				if($dispo >= $requested_quota){
					$new_requested = $list_quotas[$cursor]["requested_saldo"] + $requested_quota;
					$this->processQuotaRequested($userid, $list_quotas[$cursor]["quota_id"], $list_quotas[$cursor]["begda"], $list_quotas[$cursor]["endda"], $new_requested);
					$requested_quota = 0;
				}
				else{
					$new_requested = $list_quotas[$cursor]["requested_saldo"] + $dispo;
					$this->processQuotaRequested($userid, $list_quotas[$cursor]["quota_id"], $list_quotas[$cursor]["begda"], $list_quotas[$cursor]["endda"], $new_requested);
					$requested_quota -= $dispo;
				}
			} else { 
				$dispo = $list_quotas[$cursor]["start_saldo"] - $list_quotas[$cursor]["used_saldo"] - $list_quotas[$cursor]["requested_saldo"] + $requested_quota;
				if($dispo >= $requested_quota){
					$new_requested 	= $list_quotas[$cursor]["requested_saldo"] 	- $requested_quota;
					$new_used 		= $list_quotas[$cursor]["used_saldo"] 		+ $requested_quota;
					$this->processQuotaUsed($userid, $list_quotas[$cursor]["quota_id"], $list_quotas[$cursor]["begda"], $list_quotas[$cursor]["endda"], $new_used, $new_requested);
					$requested_quota = 0;
				}
				else{
					$new_requested 	= $list_quotas[$cursor]["requested_saldo"] 	- $dispo;
					$new_used 		= $list_quotas[$cursor]["used_saldo"] 		+ $dispo;
					$this->processQuotaUsed($userid, $list_quotas[$cursor]["quota_id"], $list_quotas[$cursor]["begda"], $list_quotas[$cursor]["endda"], $new_used, $new_requested);
					$requested_quota -= $dispo;
				}
			}
			$cursor++;
		}
    }
    
	function alignQuota($userid, $absenceid, $begda, $endda, $beghr, $endhr) {
    	

		//get absence type -> day/hour?
		$user 			= (object) new user();
    	$userdetails	= $user->getProfile($userid);
    	$timegroupe		= $userdetails["timegroupe"];
    	
    	$workschedule	= (object) new workschedule();
    	
    	$absence = $this->getAbsence($timegroupe, $absenceid);
		
		//compute nb of absence unit
		if($absence["type"] == 'D'){
     		$requested_quota = floor((strtotime($endda) - strtotime($begda))/(60*60*24));
		}
		else{
			if($begda != $endda){
				$current_day_details = $workschedule->get_wsr_ondate($userdetails["wsr_id"], $begda, $userdetails["wsr_refdate"]);
				$requested_quota = $this->getNbHours($current_day_details["endtime"], $beghr);
				if($beghr < $current_day_details["begbreak"] && $current_day_details["begbreak"] != '00:00:00'){
					$requested_quota = $requested_quota - $this->getNbHours($current_day_details["endtime"], $current_day_details["begtime"]);
				}
				$current_day = date('Y-m-d', strtotime('+1 day', strtotime($begda))); 
				while($current_day != $endda){
					$current_day_details = $workschedule->get_wsr_ondate($userdetails["wsr_id"], $current_day, $userdetails["wsr_refdate"]);
					$requested_quota += $current_day_details["nb_hours"];
					$current_day = date('Y-m-d', strtotime('+1 day', strtotime($current_day)));
				}
				$current_day_details = $workschedule->get_wsr_ondate($userdetails["wsr_id"], $endda, $userdetails["wsr_refdate"]);
				$requested_quota += $this->getNbHours($endhr, $current_day_details["begtime"]);
				if($endhr > $current_day_details["endbreak"] && $current_day_details["endbreak"] != '00:00:00'){
					$requested_quota = $requested_quota - $this->getNbHours($current_day_details["endtime"], $current_day_details["begtime"]);
				}
				
			}else{
				$requested_quota = $this->getNbHours($endhr, $beghr);
			}
		}
		
		//get list of quotas to reduce
		$list_quotas = $this->getListQuotas($timegroupe, $absence["rule"], $userid, $begda, $endda);
		
		//while there is quota to reduce, take it from the list
		$cursor = 0; 
		While($requested_quota > 0){
			$dispo = $list_quotas[$cursor]["start_saldo"] - $list_quotas[$cursor]["used_saldo"] - $list_quotas[$cursor]["requested_saldo"];
			if($dispo >= $requested_quota){
				$new_requested 	= $list_quotas[$cursor]["requested_saldo"] 	- $requested_quota;
				$new_used 		= $list_quotas[$cursor]["used_saldo"] 		+ $requested_quota;
				
				$this->processQuotaUsed($userid, $list_quotas[$cursor]["quota_id"], $begda, $endda, $new_used, $new_requested);
				$requested_quota = 0;
			}
			else{
				$new_requested 	= $list_quotas[$cursor]["requested_saldo"] 	- $requested_quota;
				$new_used 		= $list_quotas[$cursor]["used_saldo"] 		+ $requested_quota;
				echo "nr:".$new_resquested."-nu:".$new_used;
				$this->processQuotaUsed($userid, $list_quotas[$cursor]["quota_id"], $begda, $endda, $new_used, $new_requested);
				$requested_quota -= $dispo;
			} 
			$cursor++;
		}
    }
    
    function getListQuotas($groupe, $rule, $userid, $begda, $endda){
    	
	$sql = "SELECT
			uq.quota_id,
			uq.begda,
			uq.endda, 
			uq.start_saldo,
			uq.used_saldo,
			uq.requested_saldo
			FROM quota_users uq, quotas q, quota_rules qr
			WHERE uq.user_id 	=  '$userid'
			AND   uq.begda 		<= '$begda'
			AND   uq.endda 		>= '$endda'
			AND   uq.quota_id 	=  qr.quota_id
			AND   qr.groupe    	=  '$groupe'
			AND   qr.id			=  '$rule'
			ORDER BY qr.index ASC";
    
		$quotas = array(); 
	    
		$sel = mysql_query($sql);
		
        while ($quota = mysql_fetch_array($sel)) {
		  	
	        $quota["quota_id"] 		= stripslashes($quota["quota_id"]);
	        $quota["begda"] 			= stripslashes($quota["begda"]);
	        $quota["endda"] 			= stripslashes($quota["endda"]);
	        $quota["start_saldo"]		= stripslashes($quota["start_saldo"]);
	        $quota["used_saldo"] 		= stripslashes($quota["used_saldo"]);
	        $quota["requested_saldo"] 	= stripslashes($quota["requested_saldo"]);
	        array_push($quotas, $quota);
        }
        
        if (!empty($quotas)) {	
            return $quotas;
        }
        else {
            return false;
        }
    }
    
	/**
     * Process Quota requested
     *
     */
    function processQuotaRequested($userid, $quotaid, $begda, $endda, $new_requested) {
    	
    	
        $sql = "UPDATE quota_users SET requested_saldo='$new_requested' WHERE quota_id='$quotaid' AND user_id='$userid' AND begda = '$begda' AND endda = '$endda' ";
        
        $upd = mysql_query($sql);
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }
    
	/**
     * Process Quota approved
     *
     */
	function processQuotaUsed($userid, $quotaid, $begda, $endda, $new_used, $new_requested) {
    	
    	
        $sql = "UPDATE quota_users SET requested_saldo='$new_requested', used_saldo='$new_used'  WHERE quota_id='$quotaid' AND user_id='$userid' AND begda = '$begda' AND endda = '$endda' ";
        
        $upd = mysql_query($sql);
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }
	
	/**
     * Process Absences
     *
     */
    function processAbsence($requestid, $status) {
    	
        $sql = "UPDATE user_absences SET status='$status' WHERE requestid='$requestid'";
        
        $upd = mysql_query($sql);
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }
    
    function getPendingAbsencesUser($userid){
    	$user 			= (object) new user();
    	$userdetails	= $user->getProfile($userid);
    	$timegroupe		= $userdetails["timegroupe"];
		$sql = "SELECT
				ua.absence_id 							as absenceid,
				ua.begda								as begda,
				ua.endda								as endda,
				ua.beghr								as beghr,
				ua.endhr								as endhr, 
				ua.comment								as textcomment,
				ua.status								as status_id,
				wf.description	 						as status_description,
				ua.owner								as owner,
				concat(u.firstname, ' ', u.familyname) 	as owner_name 
				FROM user_absences ua, workflow wf, user u, absences ab
				WHERE ab.id         =  ua.absence_id
				AND   ab.groupe		=  '$timegroupe'
				AND   wf.id 		=  ab.wf_id
				AND   wf.status     =  ua.status
				AND   u.ID    		=  ua.owner
				AND   ua.user_id	=  '$userid'
				ORDER BY begda DESC";
	        
		$absences = array();
	    $sel = mysql_query($sql);
        while ($absence = mysql_fetch_array($sel)) {
		  	
	        $absence["absenceid"] 	 		= stripslashes($absence["absenceid"]);
	        $absence["begda"] 				= stripslashes(date("d-m-Y", strtotime($absence["begda"])));
	        $absence["endda"]  				= stripslashes(date("d-m-Y", strtotime($absence["endda"])));
	        $absence["beghr"] 				= stripslashes($absence["beghr"]);
	        $absence["endhr"] 				= stripslashes($absence["endhr"]);
	        $absence["nb_hours"]			= $this->getNbHours($absence["endhr"], $absence["beghr"]);
	        $absence["comment"]  			= stripslashes($absence["comment"]);
	        $absence["status"] 				= stripslashes($absence["status"]);
	        $absence["status_description"]	= stripslashes($absence["status_description"]);
	        $absence["owner"] 				= stripslashes($absence["owner"]);
	        $absence["owner_name"] 			= stripslashes($absence["owner_name"]);
	        array_push($absences, $absence);
        }
        
        
        if (!empty($absences)) {	
            return $absences;
        }
        else {
            return false;
        }
    }
    
	function getRequestInfo($requestid){
		$sql = "SELECT
				ua.absence_id 							 as absenceid,
				ua.begda								 as begda,
				ua.endda								 as endda,
				ua.beghr								 as beghr,
				ua.endhr								 as endhr, 
				ua.comment								 as textcomment,
				ua.status								 as status_id,
				wf.id			 						 as wf_id,
				wf.description	 						 as status_description,
				ua.owner								 as owner,
				concat(u.firstname, ' ', u.familyname) 	 as owner_name, 
				ua.user_id								 as requester,
				concat(u2.firstname, ' ', u2.familyname) as requester_name
				FROM user_absences ua, workflow wf, user u, absences ab, user u2
				WHERE ab.id         =  ua.absence_id
				AND   ab.groupe		=  u2.timegroupe
				AND   wf.id 		=  ab.wf_id
				AND   wf.status     =  ua.status
				AND   u.ID    		=  ua.owner
				AND   u2.ID    		=  ua.user_id
				AND   ua.requestid	=  '$requestid'
				ORDER BY begda DESC";
	    $sel = mysql_query($sql);
	    
		$absence = mysql_fetch_array($sel);
		  	
        $absence["absenceid"] 	 		= stripslashes($absence["absenceid"]);
        $absence["wf_id"] 				= stripslashes($absence["wf_id"]);
        $absence["begda"] 				= stripslashes(date("d-m-Y", strtotime($absence["begda"])));
        $absence["endda"]  				= stripslashes(date("d-m-Y", strtotime($absence["endda"])));
        $absence["beghr"] 				= stripslashes($absence["beghr"]);
        $absence["endhr"] 				= stripslashes($absence["endhr"]);
        $absence["nb_hours"]			= $this->getNbHours($absence["endhr"], $absence["beghr"]);
        $absence["comment"]  			= stripslashes($absence["comment"]);
        $absence["status"] 				= stripslashes($absence["status"]);
        $absence["status_description"]	= stripslashes($absence["status_description"]);
        $absence["owner"] 				= stripslashes($absence["owner"]);
        $absence["owner_name"] 			= stripslashes($absence["owner_name"]);
        $absence["requester"] 			= stripslashes($absence["requester"]);
        $absence["requester_name"] 		= stripslashes($absence["requester_name"]);
        
        
        if (!empty($absence)) {	
            return $absence;
        }
        else {
            return false;
        }
    }    
    
	function isUserAbsentOnDay($userid, $date){
    	$user 			= (object) new user();
    	$userdetails	= $user->getProfile($userid);
    	$timegroupe		= $userdetails["timegroupe"];
		$sql = "SELECT
				ua.absence_id 							as absenceid,
				ua.begda								as begda,
				ua.endda								as endda,
				ua.beghr								as beghr,
				ua.endhr								as endhr, 
				ua.comment								as textcomment,
				ua.status								as status_id,
				wf.description	 						as status_description,
				ua.owner								as owner,
				concat(u.firstname, ' ', u.familyname) 	as owner_name 
				FROM user_absences ua, workflow wf, user u, absences ab
				WHERE wf.id          =  ab.wf_id
				AND   wf.status		 =  ua.status	 
				AND   ab.groupe 	 =  '$timegroupe'
				AND   ab.id  		 =  ua.absence_id
				AND   u.ID    		 =  ua.owner
				AND   ua.user_id	 =  '$userid'
				AND   ua.begda		 <= '$date'
				AND   ua.endda		 >= '$date' 
				ORDER BY begda DESC";

		$absences = array();
	    $sel = mysql_query($sql);
        while ($absence = mysql_fetch_array($sel)) {
		  	
	        $absence["absenceid"] 	 		= stripslashes($absence["absenceid"]);
	        $absence["begda"] 				= stripslashes(date("d-m-Y", strtotime($absence["begda"])));
	        $absence["endda"]  				= stripslashes(date("d-m-Y", strtotime($absence["endda"])));
	        $absence["beghr"] 				= stripslashes($absence["beghr"]);
	        $absence["endhr"] 				= stripslashes($absence["endhr"]);
	        $absence["nb_hours"]			= $this->getNbHours($absence["endhr"], $absence["beghr"]);
	        $absence["comment"]  			= stripslashes($absence["comment"]);
	        $absence["status"] 				= stripslashes($absence["status"]);
	        $absence["status_description"]	= stripslashes($absence["status_description"]);
	        $absence["owner"] 				= stripslashes($absence["owner"]);
	        $absence["owner_name"] 			= stripslashes($absence["owner_name"]);
	        array_push($absences, $absence);
        }
        
        
        if (!empty($absences)) {	
            return $absences;
        }
        else {
            return false;
        }
    }
    
	function getAbsencesPeriod($userid, $begda, $endda){
    	$user 			= (object) new user();
    	$userdetails	= $user->getProfile($userid);
    	$timegroupe		= $userdetails["timegroupe"];
		$sql = "SELECT
				ua.absence_id 							as absenceid,
				ua.begda								as begda,
				ua.endda								as endda,
				ua.beghr								as beghr,
				ua.endhr								as endhr, 
				ua.comment								as textcomment,
				ua.status								as status_id,
				ast.description 						as status_description,
				ua.owner								as owner,
				concat(u.firstname, ' ', u.familyname) 	as owner_name 
				FROM user_absences ua, absences_status ast, user u
				WHERE ast.groupe 	 =  '$timegroupe'
				AND   ast.absence_id =  ua.absence_id
				AND   u.ID    		 =  ua.owner
				AND   ua.user_id	 =  '$userid'
				AND   begda			 >= '$begda'
				AND   endda			 <= '$endda' 
				ORDER BY begda DESC";
	        
		$absences = array();
	    $sel = mysql_query($sql);
        while ($absence = mysql_fetch_array($sel)) {
		  	
	        $absence["absenceid"] 	 		= stripslashes($absence["absenceid"]);
	        $absence["begda"] 				= stripslashes(date("d-m-Y", strtotime($absence["begda"])));
	        $absence["endda"]  				= stripslashes(date("d-m-Y", strtotime($absence["endda"])));
	        $absence["beghr"] 				= stripslashes($absence["beghr"]);
	        $absence["endhr"] 				= stripslashes($absence["endhr"]);
	        $absence["nb_hours"]			= $this->getNbHours($absence["endhr"], $absence["beghr"]);
	        $absence["comment"]  			= stripslashes($absence["comment"]);
	        $absence["status"] 				= stripslashes($absence["status"]);
	        $absence["status_description"]	= stripslashes($absence["status_description"]);
	        $absence["owner"] 				= stripslashes($absence["owner"]);
	        $absence["owner_name"] 			= stripslashes($absence["owner_name"]);
	        array_push($absences, $absence);
        }
        
        
        if (!empty($absences)) {	
            return $absences;
        }
        else {
            return false;
        }
    }
    
    function getNbHours($endhr, $beghr){
    	
    	$h   = strtotime($endhr); 
		$h2  = strtotime($beghr); 
		$res = $h - $h2;
		
		
		return (round($res/3600, 2));
    }

}
?>