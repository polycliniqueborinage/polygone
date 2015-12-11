<?php

	require("./init.php");
	
	//var_dump($modules);

		  if (!isset($_SESSION['userid'])) {
$template->assign("loginerror", 0);
		$template->display("template_login.tpl");
		die();
	}
		
	if ($adminstate < 3) {
	    $errtxt = $langfile["general_nopermission"];
	    $noperm = $langfile["general_accessdenied"];
	    $template->assign("errortext", "$errtxt<br>$noperm");
	    $template->display("template_error.tpl");
	    die();
	}

	$action = getArrayVal($_GET, "action");
	$id = getArrayVal($_GET, "id");
	$mode = getArrayVal($_GET, "mode");
	// SEARCH
	$type = getArrayVal($_POST, "type");
	$value = utf8_decode(trim(getArrayVal($_POST, "value")));
	$limit = getArrayVal($_POST, "limit");
	
	$mainclasses = array("user" => "user", "management_current" => "management_active", "management_no_current" => "management", "admin" => "admin", "logout" => "logout");
	$template->assign("mainclasses", $mainclasses);
	
	$mainmenu = array("product" => "active");
	$template->assign("mainmenu", $mainmenu);

	// open/reduce workspace
	if (getArrayVal($_COOKIE, "workspacecookie")) {
	    $workspaceclass = $_COOKIE['workspacecookie'];
		$template->assign("workspaceclass", $workspaceclass);
	} else {
	    $workspaceclass = "";
		$template->assign("workspaceclass", $workspaceclass);
	}
	
	// my log
	$mylog = (object) new mylog();
	$product = (object) new product();
	
	
	
	switch ($action) {
		
		case "add":
			
			$title = $langfile["navigation_title_management_product_add"];
		
			$template->assign("title", $title);
			
			$template->display("template_management_product_add.tpl");
	    	
			break;

		case "edit":
			$title = $langfile["navigation_title_management_product_edit"];
			$product = $product->get($id);
			
			$template->assign("title", $title);
			$template->assign("product", $product);
			
			$template->display("template_management_product_add.tpl");
	    	
			break;
	    
		case "submit":
			
			$id = getArrayVal($_POST, "id");
			
			$name = getArrayVal($_POST, "name");
			$unit = getArrayVal($_POST, "unit");
			$size = getArrayVal($_POST, "size");
			$dose = getArrayVal($_POST, "dose");
			$stock  = getArrayVal($_POST, "stock");
			$startingStock  = getArrayVal($_POST, "starting_stock");
			$sailPriceHTVA      = getArrayVal($_POST, "sail_price_htva");
			$tva            = getArrayVal($_POST, "tva");
			$sailPrice          = getArrayVal($_POST, "sail_price");
			$description  = getArrayVal($_POST, "description");
			
			if ($id != '') {
				
				//New: edit stock directly => add flow correction
				$oldProduct = $product->get($id);
				$date = date("d/m/Y");
				$action = $product->getLogInfo($id);
				$result = $product->update($name, $unit, $size, $dose, $stock, $sailPriceHTVA, $tva, $sailPrice, $description, $id);
				$difference = round($startingStock - $oldProduct["current_stock"],2); 
					
				if($difference != 0) {
					$type = ($difference > 0) ? 1 : -1;
					$result2 = $product->addflow($id, $date, $type, abs($difference), '', '', 'Correction stock');
				}	else
					$result2 = 1;	
				
				if ($result && $result2) {
	        		$action .= " become ".$name;
					$mylog->add('product','update',$action);
				    $loc = $url."management_product.php?action=view&mode=edited&id=".$id;
	        	    header("Location: $loc");
	       		}
				
			} else {
				
				$result = $product->add($name, $unit, $size, $dose, $stock, $startingStock, $sailPriceHTVA, $tva, $sailPrice, $description);
	        	
				if ($result) {
					$action = $name;
					$mylog->add('product','add',$action);
					$loc = $url."management_product.php?action=view&mode=saved&id=".$result;
	        	    header("Location: $loc");
	       		}
	       		
	        }

	        break;
		
		case "delete":
			$action = $product->getLogInfo($id);
			$result = $product->delete($id);
			if ($result) {
				$mylog->add('product','delete',$action);
	       	}
			
			break;
	        
		case "manuel_flow":
			$title = $langfile["navigation_title_management_product_add"];
			
			$date = date("d/m/Y");
                
			$template->assign("title", $title);
			$template->assign("date", $date);
					
			$template->assign("title", $title);
			
			$template->display("template_management_product_manuel_flow.tpl");
	    	
			break;
			
		case "manuel_flow_submit":
			$product_ID = getArrayVal($_POST, "product_id");
			$date = getArrayVal($_POST, "date");
			$type = getArrayVal($_POST, "type");
			$quantity = round(getArrayVal($_POST, "quantity"),2);
			$consumerName = getArrayVal($_POST, "consumer_name");
			$consumerType = getArrayVal($_POST, "consumer_type");
			//$client_ID = getArrayVal($_POST, "client_id");
			$medecin_ID = getArrayVal($_POST, "consumer_id");
			$lotNumber = getArrayVal($_POST, "lot_number");
			$comment = getArrayVal($_POST, "comment");

			$action = $product->getLogInfo($id);
			
			$result = $product->addflow($product_ID, $date, $type, $quantity, $consumerName, $consumerType, $medecin_ID, $lotNumber, $comment);
	        	
			if ($result) {
				$mylog->add('product','flow',($quantity*$type)." ".$action);
				$loc = $url . "management_product.php?action=view&mode=stocked&id=" . $result;
	            header("Location: $loc");
	        }

	        break;			

		case "automatic_flow":
			$title = $langfile["navigation_title_management_product_add"];
		
			$template->assign("title", $title);
			
			$template->display("template_management_product_automatic_flow.tpl");
	    	
			break;

		case "automatic_flow_submit":

			$fname = $_FILES['filetoupload']['name'];
			$tmp_name = $_FILES['filetoupload']['tmp_name'];
			$error = $_FILES['filetoupload']['error'];
			
			$date = date("d/m/Y");
			
	        if($error == 0){
	        	
	        	$datei_final = CL_ROOT . "/files/" . CL_CONFIG . "/command/" . $fname;
	        	
	        	if (move_uploaded_file($tmp_name, $datei_final));
	        	else print 'Erreur lors de l\'ouverture du fichier...';
			        
        		$handle = fopen($datei_final, 'r');

        		$nbr_lines = 0;
        		while (!feof($handle)){
        			$nbr_lines++;
        			$data = fgetcsv($handle, 1024, ';');
        			if($nbr_lines > 2){
        				$product_id  = $product->getProductId($data[0]);
        				$product_info = $product->get($product_id);
        				$product->addflow($product_info['ID'], $date, '1', $data[2], '', '', 'Chargement par commande');
        			}
        		}
        		
        		

				$mylog->add('product','flow',"add command");
				$loc = $url . "management_product.php?action=flowlist";
	            header("Location: $loc");
	        	
       		}
			break;

		
		case "make_pdf":
			
			$pdf = new FPDF('P', 'pt', 'A4');
			$header=array('Produit','date','Entr&eacute;e/sortie','Quantit&eacute;', 'Commentaire');			
			
			$nbr_lines = 0;
			
			$products = $product->getAll();
			$i = 0;
			while($produit = $products[$i]){
				$checkbox = getArrayVal($_POST, $produit['ID']);
				if($checkbox == 'X'){
					$history = $product->history($produit['ID']);
					$j = 0;
					while($row = $products[$j]){						
						if($row['date'] >= $begda && $row['date'] <= $endda){
							if($row['type'] < 0)
								$type = 'Sortie';
							else
								$type = 'Entr&eacute;e';	
							$line=array($produit['name'], $row['date'], $type, $row['quantity'], $row['comment']);							
							$table[$nbr_lines] = $line;
							$nbr_lines++;
							$j++;
						}	
					}	
				}
				$i++;
			}
			
			$pdf->BasicTable($header,$table);
			
			break;			
			
		case "list":
			
			$unit1 = $langfile["dico_management_product_unit1"];
			$unit2 = $langfile["dico_management_product_unit2"];
			$unit3 = $langfile["dico_management_product_unit3"];
			$unit4 = $langfile["dico_management_product_unit4"];
			$unit5 = $langfile["dico_management_product_unit5"];
			/*
			$edit_alt = $langfile["dico_management_product_edit_alt"];
			$detail_alt = $langfile["dico_management_product_detail_alt"];
		
			$detail1 = "<a onclick=\"javascript=viewProduct(";
			$detail2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-view-hover.png\" alt=\"".$detail_alt."\" title=\"".$detail_alt."\" border=\"0\" /></a>";
			
			$edit1 = "<a onclick=\"javascript=editProduct(";
			$edit2 = ")\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-edit-hover.png\" alt=\"".$edit_alt."\" title=\"".$edit_alt."\" border=\"0\" /></a>";
			
			$sql = "SELECT concat('$edit1',p.ID,'$edit2',' ','$detail1',p.ID,'$detail2'), p.name, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE( p.unit, '4', '$unit4' ),'3','$unit3'),'2','$unit2'),'1','$unit1'),'5','$unit5'), p.size, p.dose, CONCAT(p.sail_price_htva,' Euro'), CONCAT(p.tva,' %'), CONCAT(p.sail_price,' Euro') , p.stock, ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock, CONCAT(ROUND(SUM( pf.quantity * SIGN(pf.type) * p.sail_price ),2),' Euro') as stock_sail_price, REPLACE(CONCAT('+',ROUND(-1*(p.stock - SUM( pf.quantity * SIGN(pf.type) )),2)),'+-','-') as commande, p.description FROM product p, product_flow pf WHERE p.ID = pf.product_ID GROUP BY p.ID";
			
			$_SESSION['productlist']=$sql;
			*/
			$title = $langfile["navigation_title_management_product_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			
			$template->display("template_management_product_list.tpl");
			
			break;
			
		case "flowlist":
			
			$begda = getArrayVal($_POST, "begda");
			$endda = getArrayVal($_POST, "endda");
			
			if($begda == '')
				$begda = date("Y").'-01-01';
			
				
			if($endda == '')
				$endda = date("Y").'-12-31';
			
																																																																																																																																																											
			//$sql = "SELECT CONCAT('<div style=display:none>',pf.date,'</div>',date_format(pf.date, '%d/%m/%Y')), p.name, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE( p.unit, '4', '$unit4' ),'3','$unit3'),'2','$unit2'),'1','$unit5'),'1','$unit5'), p.size, REPLACE(CONCAT('+',ROUND(pf.quantity * SIGN(pf.type),2)),'+-','-'), ROUND((pf.quantity * SIGN(pf.type) * p.sail_price_htva),2), CONCAT(p.tva,'%'), ROUND((pf.quantity * SIGN(pf.type) * p.sail_price),2), pf.consumer_name, pf.lot_number, pf.comment FROM product p, product_flow pf WHERE pf.quantity!=0 AND p.ID = pf.product_ID AND date_format(pf.date, '%Y-%m-%d') BETWEEN '$begda' AND '$endda' ORDER BY pf.date DESC, pf.id DESC";
			//$sql = "SELECT CONCAT('<div style=display:none>',pf.date,'</div>',date_format(pf.date, '%d/%m/%Y')), p.name, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE( p.unit, '4', '$unit4' ),'3','$unit3'),'2','$unit2'),'1','$unit5'),'1','$unit5'), p.size, REPLACE(CONCAT('+',ROUND(pf.quantity * SIGN(pf.type),2)),'+-','-'), pf.consumer_name, pf.consumer_type, CONCAT(patients.prenom, ' ', patients.nom) as proprietaire, CONCAT(patients.rue, ' ', patients.code_postal, ' ', patients.commune) as adresse, pf.lot_number, pf.comment FROM product p, product_flow pf LEFT JOIN patients ON patients.id = pf.patient_ID WHERE pf.quantity!=0 AND p.ID = pf.product_ID AND date_format(pf.date, '%Y-%m-%d') BETWEEN '$begda' AND '$endda' ORDER BY pf.date DESC, pf.id DESC";
		
			//$_SESSION['productflowlist']=$sql;
			$_SESSION['begda'] = $begda;
			$_SESSION['endda'] = $endda;
						
			$title = $langfile["navigation_title_management_product_flow_list"];
	
			$template->assign("title", $title);
			$template->assign("workspaceclass", "fullpage");
			$template->assign("begda", $begda);
			$template->assign("endda", $endda);
			
			$template->display("template_management_product_flow_list.tpl");
			
			break;
		
		case "json_product_list":
			//product list à implémenter
			$examp 	= $_REQUEST["q"]; //query number
			$page 	= $_REQUEST['page']; // get the requested page
			$limit 	= $_REQUEST['rows']; // get how many rows we want to have into the grid
			$sidx 	= $_REQUEST['sidx']; // get index row - i.e. user click to sort
			$sord 	= $_REQUEST['sord']; // get the direction
				
			$product_name 		= $_REQUEST['product_name']; // get the search
				
			// search on
			$searchOn = $_REQUEST['_search'];
				
			// filter
			$filterOn = $_REQUEST['filters'];
				
			$wh = " 1 = 1 ";
				
			if($searchOn  || $filterOn) {
				 
				$searchString = html_entity_decode ($_REQUEST['filters'], ENT_COMPAT | ENT_HTML401, 'ISO-8859-1');
				 
				// add simple search
				if ($product_name) {
					$wh .= "AND name like '%".$product_name."%'";
				}
				 
			}
				
			// pagination
			$count = $product->countProduct($product_name);
			$total_pages = ($count > 0) ? ceil($count/$limit) : 0;
			$page = ($page > $total_pages) ? $total_pages : $page;
			$start = $limit * $page - $limit;
			$start = ($start < 0) ? 0 : $start;

			$sqlglobal= "SELECT p.ID, p.name, p.unit, p.size, p.dose, CONCAT(p.sail_price_htva,' Euro') as price_htva, CONCAT(p.tva,' %') as tva, CONCAT(p.sail_price,' Euro') as sail_price, p.stock as stock, ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock, CONCAT(ROUND(SUM( pf.quantity * SIGN(pf.type) * p.sail_price ),2),' Euro') as stock_sail_price FROM product p, product_flow pf WHERE p.ID = pf.product_ID AND ".$wh." GROUP BY p.ID";;
			//$sqlglobal= "SELECT concat('$edit1',p.ID,'$edit2',' ','$detail1',p.ID,'$detail2'), p.name, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE( p.unit, '4', '$unit4' ),'3','$unit3'),'2','$unit2'),'1','$unit1'),'5','$unit5'), p.size, p.dose, CONCAT(p.sail_price_htva,' Euro'), CONCAT(p.tva,' %'), CONCAT(p.sail_price,' Euro') , p.stock, ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock, CONCAT(ROUND(SUM( pf.quantity * SIGN(pf.type) * p.sail_price ),2),' Euro') as stock_sail_price, REPLACE(CONCAT('+',ROUND(-1*(p.stock - SUM( pf.quantity * SIGN(pf.type) )),2)),'+-','-') as commande, p.description FROM product p, product_flow pf WHERE p.ID = pf.product_ID GROUP BY p.ID";
			
			$_SESSION['productlist']=$sqlglobal;
			
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $product->countProduct($product_name);
				
			$responce->rows = $product->get_json_product($sqlglobal, $langfile,'management_product.php');
				
			echo json_encode($responce);
			
			break;
			
		case "json_flow_list":
			$examp 	= $_REQUEST["q"]; //query number
			$page 	= $_REQUEST['page']; // get the requested page
			$limit 	= 15;//$_REQUEST['rows']; // get how many rows we want to have into the grid
			$sidx 	= $_REQUEST['sidx']; // get index row - i.e. user click to sort
			$sord 	= $_REQUEST['sord']; // get the direction
		
			$product_name		= $_REQUEST['name']; // get the search
			$date				= $_REQUEST['flowdate']; // get the search
			$product_es			= $_REQUEST['quantity']; // get the search
			$consumer_name		= $_REQUEST['consumer_name']; // get the search
			$product_lot		= $_REQUEST['lot_number']; // get the search
			$product_comment	= $_REQUEST['flowcomment']; // get the search
		
			// search on
			$searchOn = $_REQUEST['_search'];
		
			// filter
			$filterOn = $_REQUEST['filters'];
			
			$begda = $_SESSION['begda'];
			$endda = $_SESSION['endda'];
			$wh = "AND date_format(pf.date, '%Y-%m-%d') BETWEEN '$begda' AND '$endda'";
			
			//$wh = " 1 = 1 ";
		
			if($searchOn  || $filterOn) {
					
				$searchString = html_entity_decode ($_REQUEST['filters'], ENT_COMPAT | ENT_HTML401, 'ISO-8859-1');
					
				// add simple search
				if ($product_name) {
					$wh .= "AND name like '%".$product_name."%'";
				}
				
				// add simple search
				if ($product_es) {
					if($product_es == '-')
					$wh .= "AND pf.type < 0";
					elseif ($product_es == '+')
					$wh .= "AND pf.type > 0";
					else 
					$wh .= "AND quantity = ".$product_es;
				}
				// add simple search
				if ($consumer_name) {
					$wh .= "AND consumer_name like '%".$consumer_name."%'";
				}
				// add simple search
				if ($product_comment) {
					$wh .= "AND flowcomment like '%".$product_comment."%'";
				}
				// add simple search
				if ($product_lot) {
					$wh .= "AND lot_number like '%".$product_lot."%'";
				}
				
					
			}
		
			// pagination
			$count = $product->countFlow($wh);
			$total_pages = ($count > 0) ? ceil($count/$limit) : 0;
			$page = ($page > $total_pages) ? $total_pages : $page;
			$start = $limit * $page - $limit;
			$start = ($start < 0) ? 0 : $start;
				
			//$sqlglobal= "SELECT p.ID, pf.date as flowdate, p.name, p.unit, p.size, p.dose, CONCAT(p.sail_price_htva,' Euro') as price_htva, CONCAT(p.tva,' %') as tva, CONCAT(p.sail_price,' Euro') as sail_price, p.stock as stock, ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock, CONCAT(ROUND(SUM( pf.quantity * SIGN(pf.type) * p.sail_price ),2),' Euro') as stock_sail_price, pf.consumer_name as consumer_name, pf.lot_number as lot_number, pf.comment as flowcomment FROM product p, product_flow pf WHERE p.ID = pf.product_ID ".$wh;
			//$sqlglobal= "SELECT concat('$edit1',p.ID,'$edit2',' ','$detail1',p.ID,'$detail2'), p.name, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE( p.unit, '4', '$unit4' ),'3','$unit3'),'2','$unit2'),'1','$unit1'),'5','$unit5'), p.size, p.dose, CONCAT(p.sail_price_htva,' Euro'), CONCAT(p.tva,' %'), CONCAT(p.sail_price,' Euro') , p.stock, ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock, CONCAT(ROUND(SUM( pf.quantity * SIGN(pf.type) * p.sail_price ),2),' Euro') as stock_sail_price, REPLACE(CONCAT('+',ROUND(-1*(p.stock - SUM( pf.quantity * SIGN(pf.type) )),2)),'+-','-') as commande, p.description FROM product p, product_flow pf WHERE p.ID = pf.product_ID GROUP BY p.ID";
			$sqlglobal = "SELECT p.ID, pf.date as flowdate, p.name, p.unit, p.size, REPLACE(CONCAT('+',ROUND((pf.quantity * SIGN(pf.type)),2)),'+-','-') as quantity, CONCAT(ROUND(pf.quantity * SIGN(pf.type) * p.sail_price,2),' Euro') as sail_price, pf.consumer_name, pf.lot_number, pf.comment as flowcomment FROM product p, product_flow pf WHERE pf.quantity!=0 AND p.ID = pf.product_ID ".$wh." ORDER BY pf.date DESC, sail_price ASC ";
			$_SESSION['productflowlist']=$sqlglobal;
				
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $count;
		
			$responce->rows = $product->getJsonFlowProduct($sqlglobal, $langfile,'management_product.php');
		//echo $sqlglobal;
			echo json_encode($responce);
				
			break;
			
			case "jsonStockCritique":
				$examp 	= $_REQUEST["q"]; //query number
				$page 	= $_REQUEST['page']; // get the requested page
				$limit 	= 15;//$_REQUEST['rows']; // get how many rows we want to have into the grid
				$sidx 	= $_REQUEST['sidx']; // get index row - i.e. user click to sort
				$sord 	= $_REQUEST['sord']; // get the direction
			
				$product_name		= $_REQUEST['product_name']; // get the search
			
				// search on
				$searchOn = $_REQUEST['_search'];
			
				// filter
				$filterOn = $_REQUEST['filters'];
					
					
				$wh = " 1 = 1 ";
			
				if($searchOn  || $filterOn) {
						
					$searchString = html_entity_decode ($_REQUEST['filters'], ENT_COMPAT | ENT_HTML401, 'ISO-8859-1');
						
					// add simple search
					if ($product_name) {
						$wh .= "AND name like '%".$product_name."%'";
					}
						
				}
			
				// pagination
				$count = $product->countStockCritique($wh);
				$total_pages = ($count > 0) ? ceil($count/$limit) : 0;
				$page = ($page > $total_pages) ? $total_pages : $page;
				$start = $limit * $page - $limit;
				$start = ($start < 0) ? 0 : $start;
			
				$sql = "SELECT p.ID, p.name, p.sail_price, p.stock as stock_minimum, ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock, REPLACE(CONCAT('+',ROUND(-1*(p.stock - SUM( pf.quantity * SIGN(pf.type) )),2)),'+-','-') as commande, REPLACE(CONCAT('+',ROUND(-1*(p.stock - SUM( pf.quantity * SIGN(pf.type) )) * p.sail_price,2)),'+-','-') as stock_sail_price FROM product p, product_flow pf WHERE p.ID = pf.product_ID AND ".$wh." GROUP BY p.ID HAVING commande <= 0";
					
				$_SESSION['stockcritique'] = $sql;
			
				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
			
				$responce->rows = $product->getJsonStockCritique($sql, $langfile,'management_product.php');
		//echo $sql;
				echo json_encode($responce);
			
				break;			
			
			case "stock_critique":
				
				$title = $langfile["navigation_title_management_product_stock_critique"];
			
				$template->assign("title", $title);
				$template->assign("workspaceclass", "fullpage");
					
				$template->display("template_management_product_stock_critique.tpl");
					
				break;
		
		case "modulesearch":
			
			$unit1 = $langfile["dico_management_product_unit1"];
			$unit2 = $langfile["dico_management_product_unit2"];
			$unit3 = $langfile["dico_management_product_unit3"];
			$unit4 = $langfile["dico_management_product_unit4"];
			$unit5 = $langfile["dico_management_product_unit5"];
			
			$edit_alt = $langfile["dico_management_product_edit_alt"];
			$detail_alt = $langfile["dico_management_product_detail_alt"];
			$delete_alt = $langfile["dico_management_product_delete_alt"];
			
			$products = $product->modulesearch($id,$value,$limit,$unit1,$unit2,$unit3,$unit4,$unit5);
			
			$template->assign("products", $products);
			$template->assign("edit_alt", $edit_alt);
			$template->assign("detail_alt", $detail_alt);
			$template->assign("delete_alt", $delete_alt);
			
			if ($type != 'simple') {
				$template->display("template_management_gestion_complete_search.tpl");
			} else {
				$template->display("template_management_gestion_simple_search.tpl");
			}
			
			break;
			
			case "modulesearchDoctor":
					
				$doctors = $product->modulesearchDoctor($id,$value,$limit);
					
				$template->assign("medecins", $doctors);
					
				if ($type != 'simple') {
					$template->display("template_management_gestion_complete_search.tpl");
				} else {
					$template->display("template_management_gestion_simple_search.tpl");
				}
					
				break;
			
		case "autocomplete":
			$products = $product->autocomplete($value,$id);
			
			break;

		case "doctorautocomplete":
			$doctors = $product->doctorAutoComplete($value,$id);
				
			break;

		case "pdf":
			
			include("./include/class.fpdf.php");
			
			$begda = $_SESSION['begda'];
			$endda = $_SESSION['endda'];
			
			$w=array(50, 150, 120, 30, 50, 65, 100, 50, 150);
			
			$begda = substr($begda, 8, 2).'/'.substr($begda, 5, 2).'/'.substr($begda, 0, 4);
			$endda = substr($endda, 8, 2).'/'.substr($endda, 5, 2).'/'.substr($endda, 0, 4);
			
			$sql = explode('LIMIT',$_SESSION['productflowlist']);
			$sel = mysql_query($sql[0]);
			
			$trans = get_html_translation_table(HTML_ENTITIES);
    		$trans = array_flip($trans);
    		
    		$title1 = strtr($langfile["dico_management_product_search_colum_date"], $trans);
			$title2 = strtr($langfile["dico_management_product_search_colum_name"], $trans);
			$title3 = strtr($langfile["dico_management_product_search_colum_unit"], $trans);
			$title4 = strtr($langfile["dico_management_product_search_colum_size_light"], $trans);
			$title5 = strtr($langfile["dico_management_product_search_colum_es"], $trans);
			$title6 = strtr($langfile["dico_management_product_search_colum_sail_price"], $trans);
			$title7 = strtr($langfile["dico_management_product_search_colum_consumer_name"], $trans);
			$title8 = strtr($langfile["dico_management_product_search_colum_lot_number"], $trans);
			$title9 = strtr($langfile["dico_management_product_search_colum_comment"], $trans);

			$title10 = strtr($langfile["dico_management_product_pdf_title_part1"], $trans);
			$title11 = strtr($langfile["dico_management_product_pdf_title_part2"], $trans);
			
			$intro1 = strtr("La Polyclinique du Borinage", $trans);
			//$intro2 = strtr("SPRL", $trans);
			$intro3 = strtr("Route Provinciale, 15A - 7340 Colfontaine", $trans);
			
		    $pdf = (object) new pdfhtml('L', 'pt', 'A4');
		    
		    $pdf->AddPage();
		    
		    $pdf->Image('./templates/standard/img/logo/mariquecalcus.jpg', '750', '525', 45, 30);
		    
		    $pdf->SetFont('Arial', '', '13');

			$pdf->Cell(500, 12, $intro1, 'L', 2, 'L');
			$pdf->Cell(500, 12, $intro2, 'L', 2, 'L');
			$pdf->Cell(500, 12, $intro3, 'L', 2, 'L');

			$pdf->Ln();
			$pdf->Ln();
			
			$pdf->SetFont('Arial', 'BU', '13');
			$pdf->Cell(800, 12, $title10." ".$begda." ".$title11." ".$endda, '', 2, 'C');
	
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			
			$pdf->SetFont('Arial', 'B', '8');
			
			$header=array($title1,$title2,$title3,$title4,$title5,$title6,$title7,$title8,$title9);
		    $pdf->Cell($w[0], 9, stripcslashes(mysql_escape_string($header[0])), 'LR');
		    $pdf->Cell($w[1], 9, stripcslashes(mysql_escape_string($header[1])), 'LR');
		    $pdf->Cell($w[2], 9, stripcslashes(mysql_escape_string($header[2])), 'LR');
		    $pdf->Cell($w[3], 9, stripcslashes(mysql_escape_string($header[3])), 'LR');
		    $pdf->Cell($w[4], 9, stripcslashes(mysql_escape_string($header[4])), 'LR');
		    $pdf->Cell($w[5], 9, stripcslashes(mysql_escape_string($header[5])), 'LR');
		    $pdf->Cell($w[6], 9, stripcslashes(mysql_escape_string($header[6])), 'LR');
		    $pdf->Cell($w[7], 9, stripcslashes(mysql_escape_string($header[7])), 'LR');
			$pdf->Cell($w[8], 9, stripcslashes(mysql_escape_string($header[8])), 'LR');
		    $pdf->Ln();
		    $pdf->Cell(array_sum($w),0,'','T');
		    $pdf->Ln(); 
		
			$pdf->SetFont('Arial', '', '8');

			$i = 12;
    
			WHILE($product = mysql_fetch_row($sel)){
      	
		        $p_date = explode('</div>',$product[0]);
		        //$pdf->Cell($w[0], 9, $p_date[1], 'LR');
		        $pdf->Cell($w[0], 9, $begda = substr($product[1], 8, 2).'/'.substr($product[1], 5, 2).'/'.substr($product[1], 0, 4), 'LR');
		        $pdf->Cell($w[1], 9, stripcslashes($product[2]), 'LR');
		        $pdf->Cell($w[2], 9, strtr($langfile["dico_management_product_unit".$product[3]], $trans), 'LR');
		        $pdf->Cell($w[3], 9, $product[4], 'LR');
		        $pdf->Cell($w[4], 9, $product[5], 'LR');
		        $pdf->Cell($w[5], 9, $product[6], 'LR');
		        $pdf->Cell($w[6], 9, $product[7], 'LR');
		        $pdf->Cell($w[7], 9, $product[8], 'LR');
				$pdf->Cell($w[8], 9, $product[9], 'LR');
		        $pdf->Ln();
        
		        $i++;
        
		        if($i%50 == 0){
		        	
		        	$pdf->AddPage();
					$pdf->SetFont('Arial', 'B', '8');
		        	$pdf->Cell($w[0], 9, $header[0], 'LR');
				    $pdf->Cell($w[1], 9, $header[1], 'LR');
				    $pdf->Cell($w[2], 9, $header[2], 'LR');
				    $pdf->Cell($w[3], 9, $header[3], 'LR');
				    $pdf->Cell($w[4], 9, $header[4], 'LR');
				    $pdf->Cell($w[5], 9, $header[5], 'LR');
				    $pdf->Cell($w[6], 9, $header[6], 'LR');
				    $pdf->Cell($w[7], 9, $header[7], 'LR');
				    $pdf->Cell($w[8], 9, $header[8], 'LR');
				    $pdf->Ln();
				    $pdf->Cell(array_sum($w),0,'','T');
				    $pdf->Ln();
					$pdf->SetFont('Arial', '', '8');
				    
        		$pdf->Image('./templates/standard/img/logo/mariquecalcus.jpg', '750', '525', 45, 30);
        		$i = 0;
     	  	 	
     		   }
        
		    }
		    
		    $pdf->Output("stock_gestion.pdf", "d");
			
			break;
		
		case "pdfstock":
			include("./include/class.fpdf.php");
			
			$w=array(170, 120, 100, 100, 100, 100);
			
			$sql = explode('LIMIT',$_SESSION['productlist']);
			$sel = mysql_query($sql[0]);
			
			$trans = get_html_translation_table(HTML_ENTITIES);
    		$trans = array_flip($trans);
    		
			$title1 = strtr($langfile["dico_management_product_search_colum_name"], $trans);
			$title2 = strtr($langfile["dico_management_product_search_colum_sail_price_htva"], $trans);
			$title3 = strtr($langfile["dico_management_product_search_colum_tva"], $trans);
			$title4 = strtr($langfile["dico_management_product_search_colum_sail_price"], $trans);
			$title5 = strtr($langfile["dico_management_product_search_colum_current_stock"], $trans);
			$title6 = strtr($langfile["dico_management_product_search_colum_stock_sail_price"], $trans);
			$title7 = strtr($langfile["dico_management_product_pdfstock_title"], $trans);

			$intro1 = strtr("La Polyclinique du Borinage", $trans);
			//$intro2 = strtr("SPRL", $trans);
			$intro3 = strtr("Route Provinciale, 15A - 7340 Colfontaine", $trans);
			
		    $pdf = (object) new pdfhtml('L', 'pt', 'A4');
		    
		    $pdf->AddPage();
		    
		    $pdf->Image('./templates/standard/img/logo/mariquecalcus.jpg', '750', '525', 45, 30);
		    
		    $pdf->SetFont('Arial', '', '13');

			$pdf->Cell(500, 12, $intro1, 'L', 2, 'L');
			$pdf->Cell(500, 12, $intro2, 'L', 2, 'L');
			$pdf->Cell(500, 12, $intro3, 'L', 2, 'L');

			$pdf->Ln();
			$pdf->Ln();
			
			$datedujour = date("d")."/".date("m")."/".date("Y");
			
			$pdf->SetFont('Arial', 'BU', '13');
			$pdf->Cell(800, 12, $title7." ".$datedujour, '', 2, 'C');
	
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			
			$pdf->SetFont('Arial', 'B', '8');
			
			$total = 0;
			
			$header=array($title1,$title2,$title3,$title4,$title5,$title6);
		    $pdf->Cell($w[0], 9, $header[0], 'LR');
		    $pdf->Cell($w[1], 9, $header[1], 'LR');
		    $pdf->Cell($w[2], 9, $header[2], 'LR');
		    $pdf->Cell($w[3], 9, $header[3], 'LR');
		    $pdf->Cell($w[4], 9, $header[4], 'LR');
		    $pdf->Cell($w[5], 9, $header[5], 'LR');
		 
		    $pdf->Ln();
		    $pdf->Cell(array_sum($w),0,'','T');
		    $pdf->Ln(); 
		
			$pdf->SetFont('Arial', '', '8');

			$i = 12;
    
			WHILE($product = mysql_fetch_row($sel)){
      	
		        $p_date = explode('</div>',$product[0]);
		        $pdf->Cell($w[0], 9, $product[1],  'LR');
		        $pdf->Cell($w[1], 9, $product[5],  'LR');
		        $pdf->Cell($w[2], 9, $product[6],  'LR');
		        $pdf->Cell($w[3], 9, $product[7],  'LR');
		        $pdf->Cell($w[4], 9, $product[9],  'LR');
		        $pdf->Cell($w[5], 9, $product[10], 'LR');
		        $pdf->Ln();
        
        		$total += $product[10];
        
		        $i++;
        
		        if($i%50 == 0){
		        	
		        	$pdf->AddPage();
					$pdf->SetFont('Arial', 'B', '8');
		        	$pdf->Cell($w[0], 9, $header[0], 'LR');
		    		$pdf->Cell($w[1], 9, $header[1], 'LR');
		    		$pdf->Cell($w[2], 9, $header[2], 'LR');
		    		$pdf->Cell($w[3], 9, $header[3], 'LR');
		    		$pdf->Cell($w[4], 9, $header[4], 'LR');
		    		$pdf->Cell($w[5], 9, $header[5], 'LR');
				    $pdf->Ln();
				    $pdf->Cell(array_sum($w),0,'','T');
				    $pdf->Ln();
					$pdf->SetFont('Arial', '', '8');
				    
        		$pdf->Image('./templates/standard/img/logo/mariquecalcus.jpg', '750', '525', 45, 30);
        		$i = 0;
     	  	 	
     		   }
        
		    }
		    
		    $pdf->SetFont('Arial', 'B', '8');
		    $pdf->Cell(array_sum($w),0,'','T');
		    $pdf->Ln();
		    
		    $pdf->Cell($w[0], 9, "Montant total du stock",  'LR');
		    $pdf->Cell($w[1], 9, '',  'LR');
		    $pdf->Cell($w[2], 9, '',  'LR');
		    $pdf->Cell($w[3], 9, '',  'LR');
		    $pdf->Cell($w[4], 9, '',  'LR');
		    $pdf->Cell($w[5], 9, $total." Euro", 'LR');
		    $pdf->Ln();
		    
		    $pdf->Output("stock_gestion.pdf", "d");
			
			break;
			
			
			case "pdfstockcritique":
				include("./include/class.fpdf.php");
					
				$w=array(170, 120, 100, 100, 100, 100);
					
				$sql = explode('LIMIT',$_SESSION['stockcritique']);
				$sel = mysql_query($sql[0]);
					
				$trans = get_html_translation_table(HTML_ENTITIES);
				$trans = array_flip($trans);
										
				$title1 = strtr($langfile["dico_management_product_search_colum_name"], $trans);
				$title2 = strtr($langfile["dico_management_product_sail_price"], $trans);
				$title3 = strtr($langfile["dico_management_product_stock"], $trans);
				$title4 = strtr($langfile["dico_management_product_search_colum_current_stock"], $trans);
				$title5 = strtr($langfile["dico_management_product_search_colum_commande"], $trans);
				$title6 = strtr($langfile["dico_management_product_search_colum_command_price"], $trans);
				$title7 = strtr($langfile["dico_management_product_pdfstockcritique_title"], $trans);
			
				$intro1 = strtr("La Polyclinique du Borinage", $trans);
				//$intro2 = strtr("SPRL", $trans);
				$intro3 = strtr("Route Provinciale, 15A - 7340 Colfontaine", $trans);
					
				$pdf = (object) new pdfhtml('L', 'pt', 'A4');
			
				$pdf->AddPage();
			
				$pdf->Image('./templates/standard/img/logo/mariquecalcus.jpg', '750', '525', 45, 30);
			
				$pdf->SetFont('Arial', '', '13');
			
				$pdf->Cell(500, 12, $intro1, 'L', 2, 'L');
				$pdf->Cell(500, 12, $intro2, 'L', 2, 'L');
				$pdf->Cell(500, 12, $intro3, 'L', 2, 'L');
			
				$pdf->Ln();
				$pdf->Ln();
					
				$datedujour = date("d")."/".date("m")."/".date("Y");
					
				$pdf->SetFont('Arial', 'BU', '13');
				$pdf->Cell(800, 12, $title7." ".$datedujour, '', 2, 'C');
			
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Ln();
					
				$pdf->SetFont('Arial', 'B', '8');
					
				$total = 0;
					
				$header=array($title1,$title2,$title3,$title4,$title5,$title6);
				$pdf->Cell($w[0], 9, $header[0], 'LR');
				$pdf->Cell($w[1], 9, $header[1], 'LR');
				$pdf->Cell($w[2], 9, $header[2], 'LR');
				$pdf->Cell($w[3], 9, $header[3], 'LR');
				$pdf->Cell($w[4], 9, $header[4], 'LR');
				$pdf->Cell($w[5], 9, $header[5], 'LR');
					
				$pdf->Ln();
				$pdf->Cell(array_sum($w),0,'','T');
				$pdf->Ln();
			
				$pdf->SetFont('Arial', '', '8');
			
				$i = 12;
			
				WHILE($product = mysql_fetch_row($sel)){
					 
					//$p_date = explode('</div>',$product[0]);
					$pdf->Cell($w[0], 9, $product[1],  'LR');
					$pdf->Cell($w[1], 9, $product[2],  'LR');
					$pdf->Cell($w[2], 9, $product[3],  'LR');
					$pdf->Cell($w[3], 9, $product[4],  'LR');
					$pdf->Cell($w[4], 9, $product[5],  'LR');
					$pdf->Cell($w[5], 9, $product[6], 'LR');
					$pdf->Ln();
			
					$total += $product[10];
			
					$i++;
			
					if($i%50 == 0){
						 
						$pdf->AddPage();
						$pdf->SetFont('Arial', 'B', '8');
						$pdf->Cell($w[0], 9, $header[0], 'LR');
						$pdf->Cell($w[1], 9, $header[1], 'LR');
						$pdf->Cell($w[2], 9, $header[2], 'LR');
						$pdf->Cell($w[3], 9, $header[3], 'LR');
						$pdf->Cell($w[4], 9, $header[4], 'LR');
						$pdf->Cell($w[5], 9, $header[5], 'LR');
						$pdf->Ln();
						$pdf->Cell(array_sum($w),0,'','T');
						$pdf->Ln();
						$pdf->SetFont('Arial', '', '8');
			
						$pdf->Image('./templates/standard/img/logo/mariquecalcus.jpg', '750', '525', 45, 30);
						$i = 0;
							
					}
			
				}
			
				$pdf->SetFont('Arial', 'B', '8');
				$pdf->Cell(array_sum($w),0,'','T');
				$pdf->Ln();
			/*
				$pdf->Cell($w[0], 9, "Montant total du stock",  'LR');
				$pdf->Cell($w[1], 9, '',  'LR');
				$pdf->Cell($w[2], 9, '',  'LR');
				$pdf->Cell($w[3], 9, '',  'LR');
				$pdf->Cell($w[4], 9, '',  'LR');
				$pdf->Cell($w[5], 9, $total." Euro", 'LR');
				$pdf->Ln();
			*/
				$pdf->Output("stock_gestion.pdf", "d");
					
				break;			
			
						
		
		case "view":
	    	$title = $langfile["navigation_title_management_product_view"];
			
	    	$uproduct = $product->get($id);
	    	
	    	$historys = $product->history($id);
	    	
			$template->assign("mode", $mode);
			$template->assign("title", $title);
			$template->assign("product", $uproduct);
			$template->assign("historys", $historys);
			
			$template->display("template_management_product_view.tpl");
			
			break;
			
		default:
	    	$title = $langfile["navigation_title_management_product_search"];
	
			$template->assign("title", $title);

			$template->display("template_management_product_search.tpl");
	}

?>
