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
class product
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
     * Creates a product
     *
     */
    function add($name, $unit, $size, $dose, $stock, $startingStock, $sailPriceHTVA, $tva, $sailPrice, $description) {
    	
        $name = mysql_real_escape_string($name);
        $unit = mysql_real_escape_string($unit);
        $size = mysql_real_escape_string($size);
        $dose = mysql_real_escape_string($dose);
        $stock = mysql_real_escape_string($stock);
        $startingStock = mysql_real_escape_string($startingStock);
        $description = mysql_real_escape_string($description);
        $sailPrice = mysql_real_escape_string($sailPrice);
        $sailPriceHTVA = mysql_real_escape_string($sailPriceHTVA);
        $tva = mysql_real_escape_string($tva);
        
        $sql = "INSERT INTO product (name, unit, size, dose, stock, description, sail_price_htva, tva, sail_price) VALUES ('$name', '$unit', '$size', '$dose', '$stock', '$description', '$sailPriceHTVA', '$tva', '$sailPrice')";
		
        $ins = mysql_query($sql);
        
        $insid = mysql_insert_id();

        if ($ins) {
        	
        	$sql = "INSERT INTO product_flow (`product_ID`, `date`, `type`, `quantity`, `consumer_name`, `comment`) VALUES ('$insid', now(), '+1', $startingStock, '', '')";
	        echo $sql;
		    $ins = mysql_query($sql);
	        return $insid;

        }  else {
            return false;
        }
        
    }
    
    /**
     * ADD a flow
     *
     */
    function addflow($product_ID, $date, $type, $quantity, $consumerName, $consumerType, $client_ID, $lotNumber, $comment) {
    	
        $product_ID = mysql_real_escape_string($product_ID);

        $date = mysql_real_escape_string($date);
		$date_day = strtok($date,"/");
		$date_month = strtok("/");
		$date_year = strtok("/");
		$date = $date_year."-".$date_month."-".$date_day;
		
		$type = mysql_real_escape_string($type);
        $quantity = mysql_real_escape_string($quantity);
        $consumerName = mysql_real_escape_string($consumerName);
        $consumerType = mysql_real_escape_string($consumerType);
        
        $lotNumber = mysql_real_escape_string($lotNumber);
        $comment = mysql_real_escape_string($comment);

        $product_ID = (int) $product_ID;
        $client_ID = (int) $client_ID;
        
        $sql = "INSERT INTO product_flow (`product_ID`, `date`, `type`, `quantity`, `consumer_ID`, `consumer_name`, `consumer_type`, `lot_number`, `comment`) VALUES ('$product_ID', '$date', '$type', '$quantity', '$client_ID', '$consumerName', '$consumerType', '$lotNumber', '$comment')";
		echo $sql;
        $ins = mysql_query($sql);
        
        if ($ins) {
            return $product_ID;
        }  else {
            return false;
        }
        
    }
    
    /** Get history
     *
     * @param value
     * @return array
     */
    function history($id) {

		$sql = " SELECT date_format( `date` , '%d/%m/%Y' ) AS date, type, consumer_name, quantity, comment  FROM product_flow WHERE product_ID = '$id' AND quantity!=0 ORDER BY `ID` desc";

		//echo $sql;
        
		$sel = mysql_query($sql);

        $historys = array();

        while ($history = mysql_fetch_array($sel)) {
        	
            $history["date"] = stripslashes($history["date"]);
            $history["type"] = stripslashes($history["type"]);
            $history["quantity"] = stripslashes($history["quantity"]);
            $history["consumer_name"] = stripslashes($history["consumer_name"]);
            $history["comment"] = stripslashes($history["comment"]);
            $history["stock"] = stripslashes($history["stock"]);
            
            array_push($historys, $history);
            
        }

        if (!empty($historys))  {
            return $historys;
        } else  {
            return false;
        }

    }
    
    /**
     * UPDATE product
     *
     */
    function update($name, $unit, $size, $dose, $stock, $sailPriceHTVA, $tva, $sailPrice, $description, $id)  {
    	
        $name = mysql_real_escape_string($name);
        $unit = mysql_real_escape_string($unit);
        $size = mysql_real_escape_string($size);
        $dose = mysql_real_escape_string($dose);
        $stock = mysql_real_escape_string($stock);
        $description = mysql_real_escape_string($description);
        $sailPriceHTVA = mysql_real_escape_string($sailPriceHTVA);
        $tva = mysql_real_escape_string($tva);
        $sailPrice = mysql_real_escape_string($sailPrice);
        
        $id = mysql_real_escape_string($id);
        $id = (int) $id;
        
        $sql = "UPDATE product set name='$name' , unit='$unit', size='$size', dose='$dose', stock='$stock', sail_price_htva='$sailPriceHTVA', tva='$tva', sail_price='$sailPrice', description='$description' where ID='$id'";
        
        $upd = mysql_query($sql);
        
        if ($upd) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Delete a product
     *
     * @param int $id User ID
     * @return bool
     */
    function delete($id) {
        $id = (int) $id;
        $del = mysql_query("DELETE FROM product WHERE ID = $id");
        if ($del) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get a user product
     *
     * @param int $id User ID
     * @return array $profile Profile
     */
    function get($id) {
        
    	$id = (int) $id;
    	
    	$sql = "SELECT p.ID as ID, 
    			p.name as name, 
    			p.unit as unit, 
    			p.size as size, 
    			p.dose as dose,
    			p.stock as stock, 
    			p.sail_price_htva as sail_price_htva, 
    			p.tva as tva, 
    			p.sail_price as sail_price, 
    			p.description as description, 
    			ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock, 
    			ROUND(SUM( pf.quantity * SIGN(pf.type) * p.sail_price ),2) as total_price 
    			FROM product AS p 
    			LEFT JOIN product_flow AS pf 
    			ON p.ID = pf.product_ID 
    			WHERE p.ID =$id GROUP BY p.ID";

    	//echo $sql;
        
        $sel = mysql_query($sql);
        
        $product = mysql_fetch_array($sel);
        
        // get the latest product
        $sql = "SELECT lot_number as lot_number FROM product_flow WHERE product_ID =$id ORDER BY date DESC, ID DESC";
        $sel = mysql_query($sql);
        $lot_number = mysql_fetch_array($sel);
        $product["lot_number"] = $lot_number["lot_number"];
        
        if (!empty($product)) {
            if (isset($product["name"]))
            {
                $product["name"] = stripcslashes($product["name"]);
            }
            if (isset($product["current_stock"]))
            {
                $product["current_stock"] = round($product["current_stock"],2);
            }
            if (isset($product["description"]))
            {
                $product["description"] = stripcslashes($product["description"]);
            }
            if (isset($product["sail_price"]))
            {
                $product["sail_price"] = round($product["sail_price"],2);
            }
            if (isset($product["lot_number"]))
            {
                $product["lot_number"] = stripcslashes($product["lot_number"]);
            }
            return $product;
        } else {
            return false;
        }
    }

	/** Make a search
     *
     * @param value
     * @return array
     */
    function modulesearch($id,$value,$limit,$unit1,$unit2,$unit3,$unit4,$unit5) {

    	if ($id!='undefined' && $id!='undefined' && $id!= null)
    		$sql = "SELECT p.ID as ID, 
    				p.name as name, 
    				p.unit as unit, 
    				p.size as size, 
    				p.dose as dose,
    				p.stock as stock, 
    				p.description as description, 
    				p.sail_price_htva as sail_price_htva, 
    				p.tva as tva, 
    				p.sail_price as sail_price, 
    				ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock, 
   	 				ROUND(SUM( pf.quantity * SIGN(pf.type) * p.sail_price ),2) as total_price 
       				FROM product AS p
    					LEFT JOIN product_flow AS pf
    					ON p.ID = pf.product_ID
    					WHERE p.ID =$id GROUP BY p.ID";
		else
    		$sql = "SELECT p.ID as ID, 
    				p.name as name, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE( p.unit, '4', '$unit4' ),'3','$unit3'),'2','$unit2'),'1','$unit1'),'5','$unit5') as unit, 
    				p.size as size, 
    				p.dose as dose,
    				p.stock as stock, 
    				p.description as description, 
    				p.sail_price_htva as sail_price_htva, 
    				p.tva as tva, 
    				p.sail_price as sail_price, 
    				ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock, 
    				ROUND(SUM( pf.quantity * SIGN(pf.type) * p.sail_price ),2) as total_price 
    				FROM product AS p
    				LEFT JOIN product_flow AS pf 
    				ON p.ID = pf.product_ID
    				WHERE lower(name) regexp '$value' GROUP BY p.ID LIMIT $limit";
    				
    				
        $sel = mysql_query($sql);

        $products = array();

        while ($product = mysql_fetch_array($sel)) {
        	
            $product["ID"] = stripslashes($product["ID"]);
            $product["name"] = stripslashes($product["name"]);
            $product["unit"] = stripslashes($product["unit"]);
            $product["size"] = stripslashes($product["size"]);
            $product["dose"] = stripslashes($product["dose"]);
            $product["stock"] = stripslashes($product["stock"]);
            $product["sail_price"] = stripslashes($product["sail_price"])." Euro";
            $product["stock_sail_price"] = stripslashes($product["total_price"])." Euro";
            $product["current_stock"] = stripslashes($product["current_stock"]);
            $product["description"] = stripslashes($product["description"]);
            
            array_push($products, $product);
            
        }

        if (!empty($products))  {	
            return $products;
        } else  {
            return false;
        }

    }
    
    /** Make a search
     *
     * @param value
     * @return array
     */
    function modulesearchDoctor($id,$value, $limit) {
    
    	if ($id!='undefined' && $id!='undefined' && $id!= null)
    		$sql = "SELECT m.id as id,
    		m.nom as nom,
    		m.prenom as prenom,
    		m.inami as inami
    		FROM medecins AS m
    		WHERE m.id =$id GROUP BY m.id";
    	else
    		$sql = "SELECT m.id as id,
    		m.nom as nom,
    		m.prenom as prenom,
    		m.inami as inami
    		FROM medecins AS m
    		WHERE lower(concat(m.nom, ' ' ,m.prenom)) regexp '$value' GROUP BY m.id LIMIT $limit";
    
    		$sel = mysql_query($sql);
    
    		$medecins = array();
    
    		while ($medecin = mysql_fetch_array($sel)) {
    		 
    		$medecin["id"] 		= stripslashes($medecin["id"]);
    		$medecin["nom"] 	= stripslashes($medecin["nom"]);
    		$medecin["prenom"] 	= stripslashes($medecin["prenom"]);
    		$medecin["inami"] 	= stripslashes($medecin["inami"]);
    		
    		array_push($medecins, $medecin);
    
    	}
    
        if (!empty($medecins))  {
            return $medecins;
    	} else  {
    	return false;
        }
    
    	}
    
    	/** Make a autocomplete
    	 *
    	 * @param value
    	 * @return array
    	 */
    	function autocomplete($value,$id) {
    		 
    		if ($id!='undefined' && $id!= null)
    			$sql = "SELECT
    			p.ID as ID,
    			p.name as name,
    			p.unit as unit,
    			p.size as size,
    			p.dose as dose,
    			p.stock as stock,
    			ROUND(p.sail_price_htva,2) as sail_price_htva,
    			p.tva as tva,
    			ROUND(p.sail_price,2) as sail_price,
    			p.description as description,
    			ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock,
    			ROUND(SUM( pf.quantity * SIGN(pf.type) * p.sail_price ),2) as total_price
    			FROM product AS p
    			LEFT JOIN product_flow AS pf
    			ON p.ID = pf.product_ID
    			WHERE p.ID =$id
    			GROUP BY p.ID";
    			else
    			$sql = "SELECT p.ID AS ID,
    			p.name as name,
    			p.unit as unit,
    			p.size as size,
    			p.dose as dose,
    			p.stock as stock,
    			p.sail_price_htva as sail_price_htva,
    			p.tva as tva,
    			p.sail_price as sail_price,
    			p.description as description,
    			ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock,
    			ROUND(SUM( pf.quantity * SIGN(pf.type) * p.sail_price ),2) as total_price
    			FROM product AS p
    			LEFT JOIN product_flow AS pf
    			ON p.ID = pf.product_ID
    			WHERE lower(p.name) regexp '$value' GROUP BY p.ID";
    	
    			$result = mysql_query($sql);
    	
    			if(mysql_num_rows($result)==1) {
    	
    			$data = mysql_fetch_assoc($result);
    			$ID = $data['ID'];
    			$name = $data['name'];
    			$size = $data['size'];
    			$unit = $data['unit'];
    			$dose = $data['dose'];
    		$stock = $data['stock'];
    		$sailPrice = $data['sail_price']." Euro ( HTVA = ".$data['sail_price_htva']." Euro - TVA = ".$data['tva']."%)";
    		$description = $data['description'];
    				$currentStock = $data['current_stock'];
    				$stockSailPrice = $data['total_price']." Euro";
    					
    		}
    	
    		// get lot
    				$lot_number = '';
    						$sql = "SELECT lot_number as lot_number FROM product_flow WHERE product_ID =$ID ORDER BY date DESC, ID DESC";
    						$sel = mysql_query($sql);
    				if(mysql_num_rows($sel)>=1) {
			$data = mysql_fetch_assoc($sel);
    				$lot_number = $data['lot_number'];
    	}
    	
    	
    	$reponse['ID'] 					= $ID;
    	$reponse['name']	 			= utf8_encode($name);
    	$reponse['unit'] 				= utf8_encode($unit);
    	$reponse['size'] 				= utf8_encode($size);
    	$reponse['dose']	 			= utf8_encode($dose);
    	$reponse['stock'] 				= utf8_encode($stock);
    	$reponse["sail_price"] 			= utf8_encode($sailPrice);
    	$reponse['description'] 		= utf8_encode($description);
    			$reponse['current_stock'] 		= utf8_encode($currentStock);
    			$reponse["stock_sail_price"] 	= utf8_encode($stockSailPrice);
    			$reponse['lot_number']    		= utf8_encode($lot_number);
    	
		header('Content-Type: application/json');
    			echo json_encode($reponse);
    	
    	}	
    	
	/** Make a autocomplete
     *
     * @param value
     * @return array
     */
    function doctorAutoComplete($value,$id) {
    	
	    if ($id!='undefined' && $id!= null)
	    	$sql = "SELECT m.id as id,
    		m.nom as nom,
    		m.prenom as prenom,
    		m.inami as inami
    		FROM medecins AS m
    		WHERE m.id =$id GROUP BY m.id";
	    else
	    	$sql = "SELECT m.id as id,
    		m.nom as nom,
    		m.prenom as prenom,
    		m.inami as inami
    		FROM medecins AS m
    		WHERE lower(concat(m.nom, ' ' ,m.prenom)) regexp '$value' GROUP BY m.id LIMIT $limit";

		$result = mysql_query($sql);
	
		if(mysql_num_rows($result)==1) {
		
			$data = mysql_fetch_assoc($result);
			$id = $data['id'];
			$nom = $data['nom'];
			$prenom = $data['prenom'];
			$inami = $data['inami'];
			

			$reponse['id'] 					= $id;
			$reponse['nom']	 				= utf8_encode($nom);
			$reponse['prenom'] 				= utf8_encode($prenom);
			$reponse['inami'] 				= utf8_encode($inami);
		} else{
			$reponse['id'] 					= -1;
		}
	
		
		header('Content-Type: application/json');
		echo json_encode($reponse);

    }
    
	function getLogInfo($id) {

    	$id = (int) $id;
    	
    	$sql = "SELECT name FROM `product` WHERE ID = $id";
        $sel = mysql_query($sql);
        
        $profile = mysql_fetch_row($sel);
        $profile = $profile[0];
        
        if (!empty($profile)) {
            return $profile;
        } else {
            return false;
        }
    }

	function getAll() {
        
    	$id = (int) $id;
        
        $sql = "SELECT DISTINCT p.ID as ID, 
        		p.name as name, 
        		p.unit as unit, 
        		p.size as size, 
        		p.dose as dose,
        		p.stock as stock, 
        		p.sail_price_htva as sail_price_htva, 
        		p.tva as tva, 
        		p.sail_price as sail_price, 
        		p.description as description, 
        		SUM( pf.quantity * SIGN(pf.type) ) as current_stock,
        		SUM( pf.quantity * SIGN(pf.type) * p.sail_price ) as total_price 
        		FROM product AS p
        		LEFT JOIN product_flow AS 
        		ON p.ID = pf.product_ID
        		GROUP BY p.ID";
        
        $sel = mysql_query($sql);
        
        $product = mysql_fetch_array($sel);
        
        if (!empty($product)) {
            if (isset($product["name"]))
            {
                $product["name"] = stripcslashes($product["name"]);
            }
            if (isset($product["description"]))
            {
                $product["description"] = stripcslashes($product["description"]);
            }
            return $product;
        } else {
            return false;
        }
    }
    
    function getProductId($id) {
        
    	$id = (int) $id;
        
        $sql = "SELECT * FROM product WHERE supplier_ID =$id";
        
        $sel = mysql_query($sql);
        
        $product = mysql_fetch_array($sel);
        
        if (!empty($product)) {
            return stripcslashes($product["ID"]);
        } else {
            return false;
        }
    }       

	function splitAtSpace($str){
		$i=0;
		while($i<strlen($str)){
			
			if(! ($str[$i] == "0" || $str[$i] == "1" || $str[$i] == "2" || 
			      $str[$i] == "3" || $str[$i] == "4" || $str[$i] == "5" || 
			      $str[$i] == "6" || $str[$i] == "7" || $str[$i] == "8" || 
			      $str[$i] == "9" || $str[$i] == "/")){
				return array(substr($str, 0, $i-1), substr($str, $i+1, strlen($str)));
			}
			$i++;
		}
	}
	
	function countProduct($product_name){
		$sqlcount = "SELECT count(ID) FROM product WHERE name LIKE '%".$product_name."%'";
			
		$sel = mysql_query($sqlcount);
		$res = mysql_fetch_array($sel);
		return $res["total"];
	}
	
	function countFlow($wh){
		$sql = "SELECT count(pf.date) as total FROM product p, product_flow pf WHERE pf.quantity!=0 AND p.ID = pf.product_ID ".$wh." ORDER BY pf.date DESC, pf.id DESC";
		//$sqlcount = "SELECT count(ID) FROM product WHERE name LIKE '%".$product_name."%'";
			
		$sel = mysql_query($sql);
		$res = mysql_fetch_array($sel);
		return $res["total"];
	}
	
	function countStockCritique($wh){
		$sql = "SELECT count(p.ID) as total, p.name, p.stock, ROUND(SUM( pf.quantity * SIGN(pf.type) ),2) as current_stock, REPLACE(CONCAT('+',ROUND(-1*(p.stock - SUM( pf.quantity * SIGN(pf.type) )),2)),'+-','-') as commande, REPLACE(CONCAT('+',ROUND(-1*(p.stock - SUM( pf.quantity * SIGN(pf.type) )) * p.sail_price,2)),'+-','-') as stock_sail_price FROM product p, product_flow pf WHERE p.ID = pf.product_ID AND ".$wh." GROUP BY p.ID HAVING commande <= 0";
		//$sqlcount = "SELECT count(ID) FROM product WHERE name LIKE '%".$product_name."%'";
			
		$sel = mysql_query($sql);
		$res = mysql_fetch_array($sel);
		return $res["total"];
	}
	
	function get_json_product($sql, $langfile, $url){
		
		$unit1 = $langfile["dico_management_product_unit1"];
		$unit2 = $langfile["dico_management_product_unit2"];
		$unit3 = $langfile["dico_management_product_unit3"];
		$unit4 = $langfile["dico_management_product_unit4"];
		$unit5 = $langfile["dico_management_product_unit5"];
		
		$i = 0;
		$rows = array();
		
		$sel = mysql_query($sql);
		
		while ($res = mysql_fetch_array($sel)) {
			
			$rows[$i]['id']=$res[ID];
			switch ($res["unit"]){
				case "1" :
					$res["unit"] = $unit1;
					break;
				case "2" :
					$res["unit"] = $unit2;
					break;
				case "3" :
					$res["unit"] = $unit3;
					break;
				case "4" :
					$res["unit"] = $unit4;
					break;
				case "5" :
					$res["unit"] = $unit5;
					break;
			}
			
			$rows[$i]['cell']=array(
					"<a href=\"./".$url."?action=detail&id=".$res[ID]."\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-view-hover.png\" border=\"0\" /></a><a href=\"./".$url."?action=edit&id=".$res[ID]."\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-edit-hover.png\" border=\"0\" /></a>",
					stripcslashes($res[name]),
					$res[unit],
					$res[size],
					$res[dose],
					$res[price_htva],
					$res[sail_price],
					$res[stock],
					$res[current_stock],
					$res[stock_sail_price]
			);
			$i++;
		}
		
		if (!empty($rows)) {
			return $rows;
		} else {
			return false;
		}
	}
	
	function getJsonFlowProduct($sql, $langfile, $url){
	
		$unit1 = $langfile["dico_management_product_unit1"];
		$unit2 = $langfile["dico_management_product_unit2"];
		$unit3 = $langfile["dico_management_product_unit3"];
		$unit4 = $langfile["dico_management_product_unit4"];
		$unit5 = $langfile["dico_management_product_unit5"];
	
		$i = 0;
		$rows = array();
	//echo $sql;
		$sel = mysql_query($sql);
	
		while ($res = mysql_fetch_array($sel)) {
				
			$rows[$i]['id']=$res["ID"];
			switch ($res["unit"]){
				case "1" :
					$res["unit"] = $unit1;
					break;
				case "2" :
					$res["unit"] = $unit2;
					break;
				case "3" :
					$res["unit"] = $unit3;
					break;
				case "4" :
					$res["unit"] = $unit4;
					break;
				case "5" :
					$res["unit"] = $unit5;
					break;
			}
				
			$rows[$i]['cell']=array(
					stripcslashes(date("d-m-Y", strtotime($res["flowdate"]))),
					stripcslashes($res["name"]),
					stripcslashes(mysql_escape_string($res["unit"])),
					$res["size"],
					$res["quantity"],
					$res["sail_price"],
					stripcslashes($res["consumer_name"]),
					$res["lot_number"],
					stripcslashes($res["flowcomment"])
			);
			$i++;
		}
	
		if (!empty($rows)) {
			return $rows;
		} else {
			return false;
		}
	}
	
	
	function getJsonStockCritique($sql, $langfile, $url){
	
		$i = 0;
		$rows = array();
		//echo $sql;
		$sel = mysql_query($sql);
	
		while ($res = mysql_fetch_array($sel)) {
			$rows[$i]['id']=$res["ID"];
	
			$rows[$i]['cell']=array(
					stripcslashes($res["name"]),
					$res["sail_price"],
					$res["stock_minimum"],
					$res["current_stock"],
					$res["commande"],
					stripcslashes($res["stock_sail_price"])
			);
			$i++;
		}
	
		if (!empty($rows)) {
			return $rows;
		} else {
			return false;
		}
	}
}

?>