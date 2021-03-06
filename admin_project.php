<?php

	require("./init.php");

		  if (!isset($_SESSION['userid'])) {
$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
	
	// check if current client has this module enable
	// check if current user has enough permission to access this page
	if ($modules['admin_project_adminstate']== null || $adminstate < $modules['admin_project_adminstate']) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}
	
	$sessionUserID = $userid;
	$sessionDate = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
	
	$action = getArrayVal($_GET, "action");
	$mode = getArrayVal($_GET, "mode");
	$id = getArrayVal($_REQUEST, "id");
	$start = getArrayVal($_GET, "start");
	$end = getArrayVal($_GET, "end");
	
	$mainclasses = array("user" => "user_active", "management_current" => "management", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("project" => "active");
	$template->assign("mainmenu", $mainmenu);

	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass); }
	else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	$mylog 			= (object) new mylog();
	$project_task 	= (object) new project_task();
	$cost_center 	= (object) new cost_center();
	$timesheet 		= (object) new timesheet();
	$user 			= (object) new user();
	
	

	function constructWhere($searchString){

    $qwery = "";
	//['eq','ne','lt','le','gt','ge','bw','bn','in','ni','ew','en','cn','nc']
    $qopers = array(
				  'eq'=>" = ",
				  'ne'=>" <> ",
				  'lt'=>" < ",
				  'le'=>" <= ",
				  'gt'=>" > ",
				  'ge'=>" >= ",
				  'bw'=>" LIKE ",
				  'bn'=>" NOT LIKE ",
				  'in'=>" IN ",
				  'ni'=>" NOT IN ",
				  'ew'=>" LIKE ",
				  'en'=>" NOT LIKE ",
				  'cn'=>" LIKE " ,
				  'nc'=>" NOT LIKE " );
    
    if ($searchString) {
    
        $searchJson = json_decode($searchString,true);
        
        if(is_array($searchJson)){
        
        	// AND , OR
			$groupe_operation = $searchJson['groupOp'];
			
			// All the rule
			$rules = $searchJson['rules'];
			
			if (sizeof($rules)>0) {
				
				// init
	        	$qwery = " AND ( ";
				
				$i = 0;
	            foreach($rules as $key=>$val) {
	            
	            	$field 		= $val['field'];
	                $operation 	= $val['op'];
	                $value 		= $val['data'];
	                
	                if($value && $operation) {
		            
	                	//$value = ToSql($field,$op,$v);
	                	if ($i!=0) $qwery .= " " .$groupe_operation." ";
						
						switch ($operation) {
							// in need other thing
						    case 'in' :
						    case 'ni' :
						        $qwery .= $field.$qopers[$operation]." (".$value.")";
						        break;
						    case 'bw' :
						    case 'bn' :
						        $qwery .= $field.$qopers[$operation]." '".$value."%'";
						        break;
						    case 'ew' :
						    case 'en' :
						        $qwery .= $field.$qopers[$operation]." '%".$value."'";
						        break;
						    case 'cn' :
						    case 'nc' :
						        $qwery .= $field.$qopers[$operation]." '%".$value."%'";
						        break;
						    default:
						        $qwery .= $field.$qopers[$operation]."'".$value."'";
						}
						
						$i++;
					}
					
	            }
	            
	            // end
	            $qwery .= " ) ";
				
			}
			
        }
    }
    return $qwery;
}
	
	switch ($action) {
		
		case "action_cost_center":
			
			$oper 	= $_REQUEST["oper"]; //query number
			
			switch ($oper) {
				case "del":
			    	$result = $cost_center->delete($id);
			    break;
				case "add":
					$code = getArrayVal($_POST, "code");
					$name = getArrayVal($_POST, "name");
					$description = getArrayVal($_POST, "description");
					$result = $cost_center->add($code, $name, $description);
					if ($result) {
	        			$mylog->add('cost_center','add',$name);
					}
			    break;
				case "edit":
					$ID = getArrayVal($_POST, "id");
					$code = getArrayVal($_POST, "code");
					$name = getArrayVal($_POST, "name");
					$description = getArrayVal($_POST, "description");
					$result = $cost_center->update($ID, $code, $name, $description);
					if ($result) {
	        			$mylog->add('cost_center','update',$name);
					}
			    break;
			}
			
		break;
			
		case "json_cost_center":
			
			$examp 	= $_REQUEST["q"]; //query number
			$page 	= $_REQUEST['page']; // get the requested page
			$limit 	= $_REQUEST['rows']; // get how many rows we want to have into the grid
			$sidx 	= $_REQUEST['sidx']; // get index row - i.e. user click to sort
			$sord 	= $_REQUEST['sord']; // get the direction

			$search_code = $_REQUEST['code'];

			// search on
			$searchOn = $_REQUEST['_search'];
			
			// filter
			$filterOn = $_REQUEST['filters'];
			
			$wh = " 1 = 1 ";
			
			
			$sqlglobal= "select ID, code, name, description FROM cost_center WHERE ".$wh." ORDER BY ".$sidx." ".$sord;
			
			$responce->page = $page;
			$responce->total = 7;
			$responce->records = 7;
			$responce->rows = $cost_center->get_json($sqlglobal);
			
			echo json_encode($responce);
			
		break;
				
		case "list_cost_center":
			
			$title = $langfile["navigation_title_admin_project_cost_center_list"];
			
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_admin_project_cost_center_list.tpl");
			
		break;
		
		
		case "action_project_task":
			
			$oper 	= $_REQUEST["oper"]; //query number
			
			switch ($oper) {
				case "del":
			    	$result = $project_task->delete($id);
			    break;
				case "add":
					$cost_center 				= getArrayVal($_POST, "cost_center_code");
					$project_task_code 			= getArrayVal($_POST, "project_task_code");
					$project_task_name 			= getArrayVal($_POST, "project_task_name");
					$project_task_description 	= getArrayVal($_POST, "project_task_description");
					$result = $project_task->add($cost_center, $project_task_code, $project_task_name, $project_task_description);
					if ($result) {
	        			$mylog->add('project_task','add',$name);
					}
			    break;
				case "edit":
					$ID 						= getArrayVal($_POST, "id");
					$cost_center 				= getArrayVal($_POST, "cost_center_code");
					$project_task_code 			= getArrayVal($_POST, "project_task_code");
					$project_task_name 			= getArrayVal($_POST, "project_task_name");
					$project_task_description 	= getArrayVal($_POST, "project_task_description");
					$result = $project_task->update($ID, $cost_center, $project_task_code, $project_task_name, $project_task_description);
					if ($result) {
	        			$mylog->add('project_task','update',$name);
					}
			    break;
			    
			}
			
		break;
			
		case "json_project_task":
			
			$examp 	= $_REQUEST["q"]; //query number
			$page 	= $_REQUEST['page']; // get the requested page
			$limit 	= $_REQUEST['rows']; // get how many rows we want to have into the grid
			$sidx 	= $_REQUEST['sidx']; // get index row - i.e. user click to sort
			$sord 	= $_REQUEST['sord']; // get the direction

			$search_code = $_REQUEST['center'];

			// search on
			$searchOn = $_REQUEST['_search'];
			
			// filter
			$filterOn = $_REQUEST['filters'];
			
			if($searchOn || $filterOn) {
			    
			$searchString = html_entity_decode ($_REQUEST['filters'], ENT_COMPAT | ENT_HTML401, 'ISO-8859-1');
			$wh= constructWhere($searchString);
			    
			}

			$sqlglobal= "select count(0) as count FROM project_task, cost_center 
						 WHERE project_task.cost_center_id = cost_center.ID ".$wh;
			
			$select = mysql_query($sqlglobal);
			
			while ($countable = mysql_fetch_array($select)) {
        		$count = $countable[count];
			}
			
			if( $count >0 ) {
			    $total_pages = ceil($count/$limit);
			} else {
			    $total_pages = 0;
			}
			
			if ($page > $total_pages) $page=$total_pages;
			$start = $limit*$page - $limit; // do not put $limit*($page - 1)
			if ($start<0) $start = 0;
			
			$sqlglobal= "select project_task.ID as project_task_ID, project_task.name as project_task_name, project_task.code as project_task_code, project_task.description AS project_task_description, cost_center.code AS cost_center_code, cost_center.name AS cost_center_name FROM project_task, cost_center 
						 WHERE project_task.cost_center_id = cost_center.ID ".$wh." ORDER BY ".$sidx." ".$sord." LIMIT ".$start." , ".$limit;
			//echo $sqlglobal;
			
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $count;
			$responce->rows = $project_task->get_json($sqlglobal);
			
			echo json_encode($responce);
			
		break;
				
		case "list_project_task":
			
			$title = $langfile["navigation_title_admin_project_project_task_list"];
			
			$cost_centers = $cost_center->get_all();
			$cost_centers_string = '';
			
			foreach ($cost_centers as $cost_center) {
		    	$cost_centers_string .= ($cost_centers_string == '') ? $cost_center["ID"].":".$cost_center["code"]." - ".$cost_center["name"] : ";".$cost_center["ID"].":".$cost_center["code"]." - ".$cost_center["name"];
			}
			
			$template->assign("cost_centers_string", $cost_centers_string);
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_admin_project_task_list.tpl");
			
		break;

		case "assign_task":
			
			$title = $langfile["navigation_title_admin_project_assign_task"];
			
			$title = $langfile[''];
   			$letter = getArrayVal($_GET, "letter");
   			$letter = ($letter == '') ? 'A':$letter;
   			
    		$users = $user->getAllEmployeesByLetter($letter);
    		$project_tasks = $project_task->getAll();
	    
    		$i2 = 0;

    		if (!empty($users)) {

    			foreach($users as $usr)  {

		            $i = 0;
		            if (!empty($project_tasks)) {
		            	foreach ($project_tasks as $pt) {
	                   		if (chktaskuser($usr["ID"], $grp["ID"])) {
	                   			$chk = 1;
	                   		} else {
	                   			$chk = 0;
	                   		}
	                   		$groups[$i]['assigned'] = $chk;
	                   		$i = $i + 1;
		            	}
		            }
		            $users[$i2]['groups'] = $groups;
		            if (!empty($users[$i2]['lastlogin'])) {
		            	$users[$i2]["lastlogin"] = date("d.m.y / H:i:s", $users[$i2]['lastlogin']);
		            }
		            $i2 = $i2 + 1;
    			}
	   	 	}		
	   	 	
			$template->assign("title", $title);
			$template->assign("mode", $mode);
		    $template->assign("users", $users);
		    $template->assign("project_tasks", $project_tasks);
	    
			$template->display("template_admin_project_tache_assign.tpl");
			
		break;


		case "stat_task":
			
			$title = $langfile["navigation_title_timesheet_stats_tasks"]; 
			$template->assign("title", $title);
			
			$begda = getArrayVal($_POST, "begda"); 
			if($begda=="") $begda = date("Y")."-".date("m")."-01"; 
			$endda = getArrayVal($_POST, "endda"); 
			if($endda=="") $endda = date("Y")."-".date("m")."-".cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
			$userid = getArrayVal($_POST, "userid");
			
			$table_tasks = $timesheet->computeTasks($begda, $endda, $userid);
			
			
			$nbhours_cumul = 0;
			for($i=0;$i<count($table_tasks);$i++){
				$nbhours_cumul = $nbhours_cumul + $table_tasks[$i][3];
				$table_cumul[$i][0] = $nbhours_cumul;
			}
			$pourcentage_cumul = 0;
			for($i=0;$i<count($table_tasks);$i++){
				$table_cumul[$i][1] = round((100 / $table_cumul[count($table_tasks)-1][0]) * $table_tasks[$i][3], 2);
				$pourcentage_cumul = $pourcentage_cumul + $table_cumul[$i][1];
				$table_cumul[$i][2] = $pourcentage_cumul;
			}
			
			
			$template->assign("stats", $table_tasks);
			$template->assign("cumul", $table_cumul);
			$type = "T";
			$template->assign("type", $type);			
			$template->assign("begda", $begda);
			$template->assign("endda", $endda);
			$ts_users = $user->getAllTimesheetUsers();
			$template->assign("selected_user", $userid);
			$template->assign("ts_users", $ts_users);
			$template->display("template_admin_project_stats.tpl");	
		break;
		
		case "stat_costs_task":
			
			$title = $langfile["navigation_title_timesheet_stats_tasks"]; 
			$template->assign("title", $title);
			
			$begda = getArrayVal($_POST, "begda"); 
			if($begda=="") $begda = date("Y")."-".date("m")."-01"; 
			$endda = getArrayVal($_POST, "endda"); 
			if($endda=="") $endda = date("Y")."-".date("m")."-".cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
			$userid = getArrayVal($_POST, "userid");
			
			$table_tasks = $timesheet->computeCostsTasks($begda, $endda, $userid);
			
			
			$nbhours_cumul = 0;
			for($i=0;$i<count($table_tasks);$i++){
				$nbhours_cumul = $nbhours_cumul + $table_tasks[$i][3];
				$table_cumul[$i][0] = $nbhours_cumul;
			}
			$pourcentage_cumul = 0;
			for($i=0;$i<count($table_tasks);$i++){
				$table_cumul[$i][1] = round((100 / $table_cumul[count($table_tasks)-1][0]) * $table_tasks[$i][3], 2);
				$pourcentage_cumul = $pourcentage_cumul + $table_cumul[$i][1];
				$table_cumul[$i][2] = $pourcentage_cumul;
			}
			
			
			$template->assign("stats", $table_tasks);
			$template->assign("cumul", $table_cumul);
			$type = "CT";
			$template->assign("type", $type);			
			$template->assign("begda", $begda);
			$template->assign("endda", $endda);
			$ts_users = $user->getAllTimesheetUsers();
			$template->assign("selected_user", $userid);
			$template->assign("ts_users", $ts_users);
			$template->display("template_admin_project_stats.tpl");	
		break;		
		
		case "stat_cc":
			
			$title = $langfile["navigation_title_timesheet_stats_cc"]; 
			$template->assign("title", $title);
			
			$begda = getArrayVal($_POST, "begda"); 
			if($begda=="") $begda = date("Y")."-".date("m")."-01"; 
			$endda = getArrayVal($_POST, "endda"); 
			if($endda=="") $endda = date("Y")."-".date("m")."-".cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
			$userid = getArrayVal($_POST, "userid");
			$table_cc = $timesheet->computeCC($begda, $endda, $userid);

			$nbhours_cumul = 0;
			for($i=0;$i<count($table_cc);$i++){
				$nbhours_cumul = $nbhours_cumul + $table_cc[$i][3];
				$table_cumul[$i][0] = $nbhours_cumul;
			}
			$pourcentage_cumul = 0;
			for($i=0;$i<count($table_cc);$i++){
				$table_cumul[$i][1] = round((100 / $table_cumul[count($table_cc)-1][0]) * $table_cc[$i][3], 2);
				$pourcentage_cumul = $pourcentage_cumul + $table_cumul[$i][1];
				$table_cumul[$i][2] = $pourcentage_cumul;
			}			
			
			$type = "C";
			$template->assign("stats", $table_cc);
			$template->assign("type", $type);
			$template->assign("cumul", $table_cumul);			
			$template->assign("begda", $begda);
			$template->assign("endda", $endda);	
			$ts_users = $user->getAllTimesheetUsers();
			$template->assign("selected_user", $userid);
			$template->assign("ts_users", $ts_users);		
			$template->display("template_admin_project_stats.tpl");	
		break;
		
		case "stat_costs_cc":
			
			$title = $langfile["navigation_title_timesheet_stats_cc"]; 
			$template->assign("title", $title);
			
			$begda = getArrayVal($_POST, "begda"); 
			if($begda=="") $begda = date("Y")."-".date("m")."-01"; 
			$endda = getArrayVal($_POST, "endda"); 
			if($endda=="") $endda = date("Y")."-".date("m")."-".cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
			$userid = getArrayVal($_POST, "userid");
			$table_cc = $timesheet->computeCostsCC($begda, $endda, $userid);

			$nbhours_cumul = 0;
			for($i=0;$i<count($table_cc);$i++){
				$nbhours_cumul = $nbhours_cumul + $table_cc[$i][3];
				$table_cumul[$i][0] = $nbhours_cumul;
			}
			$pourcentage_cumul = 0;
			for($i=0;$i<count($table_cc);$i++){
				$table_cumul[$i][1] = round((100 / $table_cumul[count($table_cc)-1][0]) * $table_cc[$i][3], 2);
				$pourcentage_cumul = $pourcentage_cumul + $table_cumul[$i][1];
				$table_cumul[$i][2] = $pourcentage_cumul;
			}			
			
			$type = "CC";
			$template->assign("stats", $table_cc);
			$template->assign("type", $type);
			$template->assign("cumul", $table_cumul);			
			$template->assign("begda", $begda);
			$template->assign("endda", $endda);	
			$ts_users = $user->getAllTimesheetUsers();
			$template->assign("selected_user", $userid);
			$template->assign("ts_users", $ts_users);		
			$template->display("template_admin_project_stats.tpl");	
		break;		
		
		case "stat_print":
			
			$title = $langfile["navigation_title_timesheet_stats_cc"]; 
			$template->assign("title", $title);
			
			$type = getArrayVal($_GET, "type");
			$begda = getArrayVal($_GET, "begda"); 
			if($begda=="") $begda = date("Y")."-".date("m")."-01"; 
			$endda = getArrayVal($_GET, "endda"); 
			if($endda=="") $endda = date("Y")."-".date("m")."-".cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
			$userid = getArrayVal($_GET, "userid");
			
			switch($type){
				case 'T':
					$table_tasks = $timesheet->computeTasks($begda, $endda, $userid);
					$nbhours_cumul = 0;
					for($i=0;$i<count($table_tasks);$i++){
						$nbhours_cumul = $nbhours_cumul + $table_tasks[$i][3];
						$table_cumul[$i][0] = $nbhours_cumul;
					}
					$pourcentage_cumul = 0;
					for($i=0;$i<count($table_tasks);$i++){
						$table_cumul[$i][1] = round((100 / $table_cumul[count($table_tasks)-1][0]) * $table_tasks[$i][3], 2);
						$pourcentage_cumul = $pourcentage_cumul + $table_cumul[$i][1];
						$table_cumul[$i][2] = $pourcentage_cumul;
					}
					$table_content = $table_tasks;	
					$title = $langfile["navigation_title_timesheet_stats_tasks"];
					break;
				case 'CT':
					$table_tasks = $timesheet->computeCostsTasks($begda, $endda, $userid);
					$nbhours_cumul = 0;
					for($i=0;$i<count($table_tasks);$i++){
						$nbhours_cumul = $nbhours_cumul + $table_tasks[$i][3];
						$table_cumul[$i][0] = $nbhours_cumul;
					}
					$pourcentage_cumul = 0;
					for($i=0;$i<count($table_tasks);$i++){
						$table_cumul[$i][1] = round((100 / $table_cumul[count($table_tasks)-1][0]) * $table_tasks[$i][3], 2);
						$pourcentage_cumul = $pourcentage_cumul + $table_cumul[$i][1];
						$table_cumul[$i][2] = $pourcentage_cumul;
					}	
					$table_content = $table_tasks;
					$title = $langfile["navigation_title_timesheet_stats_tasks"];
					break;
				case 'C':
					$table_cc = $timesheet->computeCC($begda, $endda, $userid);
					$nbhours_cumul = 0;
					for($i=0;$i<count($table_cc);$i++){
						$nbhours_cumul = $nbhours_cumul + $table_cc[$i][3];
						$table_cumul[$i][0] = $nbhours_cumul;
					}
					$pourcentage_cumul = 0;
					for($i=0;$i<count($table_cc);$i++){
						$table_cumul[$i][1] = round((100 / $table_cumul[count($table_cc)-1][0]) * $table_cc[$i][3], 2);
						$pourcentage_cumul = $pourcentage_cumul + $table_cumul[$i][1];
						$table_cumul[$i][2] = $pourcentage_cumul;
					}
					$table_content = $table_cc;
					$title = $langfile["navigation_title_timesheet_stats_cc"];
					break;
				case 'CC':
					$table_cc = $timesheet->computeCostsCC($begda, $endda, $userid);
		
					$nbhours_cumul = 0;
					for($i=0;$i<count($table_cc);$i++){
						$nbhours_cumul = $nbhours_cumul + $table_cc[$i][3];
						$table_cumul[$i][0] = $nbhours_cumul;
					}
					$pourcentage_cumul = 0;
					for($i=0;$i<count($table_cc);$i++){
						$table_cumul[$i][1] = round((100 / $table_cumul[count($table_cc)-1][0]) * $table_cc[$i][3], 2);
						$pourcentage_cumul = $pourcentage_cumul + $table_cumul[$i][1];
						$table_cumul[$i][2] = $pourcentage_cumul;
					}
					$table_content = $table_cc;
					$title = $langfile["navigation_title_timesheet_stats_cc"];
					break;			 
			}
			
			$code = $langfile["dico_management_timesheet_stats_code"];
			$name = $langfile["dico_management_timesheet_stats_name"];
			if($type=='T' || $type=='C'){
				$nb = $langfile["dico_management_timesheet_stats_nbhours"];
				$nb_cumul = $langfile["dico_management_timesheet_stats_nbhours_cumule"];
			}	
			else{
				$nb = $langfile["dico_management_timesheet_stats_couts"];
				$nb_cumul = $langfile["dico_management_timesheet_stats_couts_cumule"];
			}
			$percentage = $langfile["dico_management_timesheet_stats_pourcentage"];
			$percentage_cumul = $langfile["dico_management_timesheet_stats_pourcentage_cumule"];
				
					
			
			require_once('./libraries/tcpdf/config/lang/eng.php');
			require_once('./libraries/tcpdf/tcpdf.php');
			
			$trans = get_html_translation_table(HTML_ENTITIES);
            $trans = array_flip($trans);
            
            // create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('MariqueCalcus');
			$pdf->SetTitle('Statistiques:');
			
			// set default header data
			//$pdf->SetHeaderData('', 30, 'Planning individuel', 'power by MariqueCalcus');
			$pdf->SetHeaderData('mariquecalcus.jpg', 25, 'Nouvelle Polyclinique du Borinage', 'Route Provinciale 15A - 7340 Colfontaine');
			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			
			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
			
			//set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			
			//set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			
			//set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
			
			//set some language-dependent strings
			$pdf->setLanguageArray($l); 
            
			$pdf->AddPage();
			$pdf->Bookmark('Statistiques', 0, 0);
			$pdf->Cell(0, 0, 'Statistiques', 1, 1, 'C');
			
			
			// create some HTML content
			$htmltable = '<table border="1" cellspacing="2" cellpadding="2">
							<tr>
								<th bgcolor="#FEF0C9" align="center"><b>'.$code.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$name.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$nb.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$percentage.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$nb_cumul.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$percentage_cumul.'</b></th>
							</tr>';
			
			for($i=0; $i<count($table_content); $i++){
				if( ($i%20 == 0) && ($i != 0) ){
					$htmltable .= '</table>';
					$pdf->writeHTML($htmltable, true, 0, true, 0);
					$pdf->AddPage();
					$pdf->Bookmark('Statistiques', 0, 0);
					$pdf->Cell(0, 0, 'Statistiques', 1, 1, 'C');
					$htmltable = '<table border="1" cellspacing="2" cellpadding="2">
							<tr>
								<th bgcolor="#FEF0C9" align="center"><b>'.$code.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$name.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$nb.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$percentage.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$nb_cumul.'</b></th>
								<th bgcolor="#FEF0C9" align="center"><b>'.$percentage_cumul.'</b></th>
							</tr>';
				}
				$color = ($color == '#FEFFF1') ? '#FCF8DC' : '#FEFFF1';
					$htmltable .= '<tr>';
						$htmltable .= '<td bgcolor="'.$color.'" align="left">'.$table_content[$i][1].'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$table_content[$i][2].'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$table_content[$i][3].'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$table_cumul[$i][1].'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$table_cumul[$i][0].'</td>';
						$htmltable .= '<td bgcolor="'.$color.'" align="center">'.$table_cumul[$i][2].'</td>';
					$htmltable .= '</tr>';
			}
			$htmltable .= '</table>';
			// output the HTML content
			$pdf->writeHTML($htmltable, true, 0, true, 0);
			
			//Close and output PDF document
			$pdf->Output('Stat_projet_'.$begda.'_'.$endda.'.pdf', 'I');
				
		break;			
		
	    default:
	
			$title = $langfile["navigation_title_user_project"];
			$template->display("template_admin_project_default.tpl");
			
	}
	
	
?>
