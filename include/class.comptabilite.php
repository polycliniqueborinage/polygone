<?php
/**
 * Provides methods to interact with users
 *
 * @author MariqueCalcus
 * @Benjamin
 * @version 3
 * @package Collabtive
 */
class comptabilite
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
     * Creates a comptabilite
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
    function addflow($product_ID, $date, $type, $quantity, $consumerName, $lotNumber, $comment) {
    	
        $product_ID = mysql_real_escape_string($product_ID);

        $date = mysql_real_escape_string($date);
		$date_day = strtok($date,"/");
		$date_month = strtok("/");
		$date_year = strtok("/");
		$date = $date_year."-".$date_month."-".$date_day;
		
		$type = mysql_real_escape_string($type);
        $quantity = mysql_real_escape_string($quantity);
        $consumerName = mysql_real_escape_string($consumerName);
        $lotNumber = mysql_real_escape_string($lotNumber);
        $comment = mysql_real_escape_string($comment);

        $product_ID = (int) $product_ID;
        
        $sql = "INSERT INTO product_flow (`product_ID`, `date`, `type`, `quantity`, `consumer_name`, `lot_number`, `comment`) VALUES ('$product_ID', '$date', '$type', '$quantity', '$consumerName', '$lotNumber', '$comment')";

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
    function update($compte_p, $mois_p, $annee_p, $libelle_p, $debit_p, $credit_p)  {
    	
        $libelle = mysql_real_escape_string($libelle_p);
        $debit = mysql_real_escape_string($debit_p);
        $credit = mysql_real_escape_string($credit_p);
        
        
        $sql = "UPDATE comptes set libelle='$libelle' , debit='$debit', credit='$credit' where numero ='$compte_p' 
        																			       AND mois   ='$mois_p'
        																			       AND annee  ='$annee_p'";
       
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
    function get() {
    	
    	$sql = "SELECT c.numero as numero, 
    			c.libelle as libelle, 
    			c.date as date, 
    			c.debit as debit, 
    			c.credit as credit 
    			FROM comptes AS c";

    	//echo $sql;
        
        $sel = mysql_query($sql);
        
        while( $comptabilite = mysql_fetch_array($sel) ){
        
	        if (!empty($comptabilite)) {
	            if (isset($comptabilite["numero"]))
	            {
	                $comptabilite["numero"] = stripcslashes($comptabilite["numero"]);
	            }
	            if (isset($comptabilite["libelle"]))
	            {
	                $comptabilite["libelle"] = stripcslashes($comptabilite["libelle"]);
	            }
	            if (isset($comptabilite["date"]))
	            {
	                $comptabilite["date"] = stripcslashes($comptabilite["date"]);
        $size = mysql_real_escape_string($size);
	            }
	            if (isset($comptabilite["debit"]))
	            {
	                $comptabilite["debit"] = stripcslashes($comptabilite["debit"]);
	            }
	            if (isset($comptabilite["credit"]))
	            {
	                $comptabilite["credit"] = stripcslashes($comptabilite["credit"]);
	            }
	            array_push($products, $product);
	        }    
        }
        if (!empty($comptabilite))  {	
            return $comptabilite;
        } else  {
            return false;
        }
    }

    function get_account($nr, $mois, $annee) {
    	
    	$sql = "SELECT  
    			c.numero  as numero,
    			c.mois    as mois,
    			c.annee   as annee,
    			c.libelle as libelle,
    			c.date    as date,
    			c.debit   as debit, 
    			c.credit  as credit 
    			FROM comptes AS c
    			WHERE c.numero LIKE '%$nr%'
    			AND   mois  = '$mois'
    			AND   annee = '$annee'";

    	   //echo $sql;
        
        $sel = mysql_query($sql);

		$account = mysql_fetch_array($sel);
        	
        $account["numero"]  = stripslashes($account["numero"]);
        $account["mois"]    = stripslashes($account["mois"]);
        $account["annee"]   = stripslashes($account["annee"]);
        $account["libelle"] = stripslashes($account["libelle"]);
        $account["date"]    = stripslashes($account["date"]);
        $account["debit"]   = stripslashes($account["debit"]);
        $account["credit"]  = stripslashes($account["credit"]);
         
        
        //if (!empty($account))  {
        if ($account["numero"] != "")  {	
            return $account;
        } else  {
            return false;
        }
    }
    
    function getList($nr, $annee1, $annee2) {
    	$sql = "SELECT DISTINCT 
    			c.numero  as numero
    			FROM comptes AS c
    			WHERE c.numero LIKE '$nr%'
    			AND ( c.annee = '$annee1'
    			OR    c.annee = '$annee2' )
    			ORDER BY c.numero";

        $sel = mysql_query($sql);
		$accounts = array();
		
		while($account = mysql_fetch_array($sel)){
			$account["numero"]  = stripslashes($account["numero"]);
	        array_push($accounts, $account);
		}
		
		if (!empty($accounts))  {	
            return $accounts;
        } else  {
            return false;
        }
    }
    	
    function getAccount($nr, $annee) {
    	
    	$sql = "SELECT  
    			c.numero  as numero,
    			c.mois    as mois,
    			c.annee   as annee,
    			c.libelle as libelle,
    			c.date    as date,
    			c.debit   as debit, 
    			c.credit  as credit 
    			FROM comptes AS c
    			WHERE c.numero LIKE '$nr%'
    			AND   c.annee = '$annee'
    			ORDER BY c.numero, c.mois";

        $sel = mysql_query($sql);
		$accounts = array();
		$prev_month = '12';
		while($account = mysql_fetch_array($sel)){ 
			if($account["debit"] == "")
				$account["debit"]   = 0;
		    if($account["credit"] == "")
		    	$account["credit"]  = 0;
        	//if( $prev_month != 12 && $account["mois"] == '01'){
        	if($account["numero"] != $prev_number && $account["mois"] != '01'){
        	 	if($account["mois"] != '10' && $account["mois"] != '11' && $account["mois"] != '12')
        	 		$month_limit = substr($account["mois"], 1, 1);
        	 	else
        	 		$month_limit = $account["mois"];	
        	 	
        	 	for($i=1; $i<$month_limit; $i++){
        	 		$account_bis["number"]  = $account["numero"];
			        //$account_bis["mois"]    = $i;
			        $account_bis["annee"]   = stripslashes($account["annee"]);
			        
			        switch($i){
		        		case 1:
		        			$account_bis["descr_jan"]   = "JAN - N";
					        $account_bis["debit_jan"]   = "0";
					        $account_bis["credit_jan"]  = "0";
					        $account_bis["mois"]        = '01';
				        	break;
			        	case 2:
		        			$account_bis["descr_feb"]  = "FEB - N";
					        $account_bis["debit_feb"]   = "0";
					        $account_bis["credit_feb"]  = "0";
					        $account_bis["mois"]        = '02';
				        	break;
			        	case 3:
				        	$account_bis["descr_mar"] = "MAR - N";
					        $account_bis["debit_mar"]   = "0";
					        $account_bis["credit_mar"]  = "0";
					        $account_bis["mois"]        = '03';
				        	break;
			        	case 4:
				        	$account_bis["descr_apr"] = "APR - N";
					        $account_bis["debit_apr"]   = "0";
					        $account_bis["credit_apr"]  = "0";
					        $account_bis["mois"]        = '04';
				        	break;
			        	case 5:
				        	$account_bis["descr_may"] = "MAY - N";
					        $account_bis["debit_may"]   = "0";
					        $account_bis["credit_may"]  = "0";
					        $account_bis["mois"]        = '05';
				        	break;
			        	case 6:
				        	$account_bis["descr_jun"] = "JUN - N";
					        $account_bis["debit_jun"]   = "0";
					        $account_bis["credit_jun"]  = "0";
					        $account_bis["mois"]        = '06';
				        	break;
			        	case 7:
				        	$account_bis["descr_jul"] = "JUL - N";
					        $account_bis["debit_jul"]   = "0";
					        $account_bis["credit_jul"]  = "0";
					        $account_bis["mois"]        = '07';
				        	break;
			        	case 8:
				        	$account_bis["descr_aug"] = "AUG - N";
					        $account_bis["debit_aug"]   = "0";
					        $account_bis["credit_aug"]  = "0";
					        $account_bis["mois"]        = '08';
				        	break;
			        	case 9:
				        	$account_bis["descr_sep"] = "SEP - N";
					        $account_bis["debit_sep"]   = "0";
					        $account_bis["credit_sep"]  = "0";
					        $account_bis["mois"]        = '09';
				        	break;
			        	case 10:
				        	$account_bis["descr_oct"] = "OCT - N";
					        $account_bis["debit_oct"]   = "0";
					        $account_bis["credit_oct"]  = "0";
					        $account_bis["mois"]        = '10';
				        	break;
			        	case 11:
				        	$account_bis["descr_nov"] = "NOV - N";
					        $account_bis["debit_nov"]   = "0";
					        $account_bis["credit_nov"]  = "0";
					        $account_bis["mois"]        = '11';
				        	break;
			        }
			        
			        array_push($accounts, $account_bis);
			        
        	 	}
        	} 	
        	 	
			if( $prev_month != 12 && $account["numero"] != $prev_number){
        		if($prev_month < 10){
	        		$prev_month = substr($prev_month, 1, 1);
	        	}
	        	
	        	for($i=$prev_month+1; $i<=12; $i++){
        			$account_bis["number"]  = $prev_number;
			        $account_bis["mois"]    = $i;
			        $account_bis["annee"]   = stripslashes($account["annee"]);
        			switch($i){
		        		case 2:
		        			$account_bis["descr_feb"]  = "FEB - N";
					        $account_bis["debit_feb"]   = "0";
					        $account_bis["credit_feb"]  = "0";
					        $account_bis["mois"]        = '02';
				        	break;
			        	case 3:
				        	$account_bis["descr_mar"] = "MAR - N";
					        $account_bis["debit_mar"]   = "0";
					        $account_bis["credit_mar"]  = "0";
					        $account_bis["mois"]        = '03';
				        	break;
			        	case 4:
				        	$account_bis["descr_apr"] = "APR - N";
					        $account_bis["debit_apr"]   = "0";
					        $account_bis["credit_apr"]  = "0";
					        $account_bis["mois"]        = '04';
				        	break;
			        	case 5:
				        	$account_bis["descr_may"] = "MAY - N";
					        $account_bis["debit_may"]   = "0";
					        $account_bis["credit_may"]  = "0";
					        $account_bis["mois"]        = '05';
				        	break;
			        	case 6:
				        	$account_bis["descr_jun"] = "JUN - N";
					        $account_bis["debit_jun"]   = "0";
					        $account_bis["credit_jun"]  = "0";
					        $account_bis["mois"]        = '06';
				        	break;
			        	case 7:
				        	$account_bis["descr_jul"] = "JUL - N";
					        $account_bis["debit_jul"]   = "0";
					        $account_bis["credit_jul"]  = "0";
					        $account_bis["mois"]        = '07';
				        	break;
			        	case 8:
				        	$account_bis["descr_aug"] = "AUG - N";
					        $account_bis["debit_aug"]   = "0";
					        $account_bis["credit_aug"]  = "0";
					        $account_bis["mois"]        = '08';
				        	break;
			        	case 9:
				        	$account_bis["descr_sep"] = "SEP - N";
					        $account_bis["debit_sep"]   = "0";
					        $account_bis["credit_sep"]  = "0";
					        $account_bis["mois"]        = '09';
				        	break;
			        	case 10:
				        	$account_bis["descr_oct"] = "OCT - N";
					        $account_bis["debit_oct"]   = "0";
					        $account_bis["credit_oct"]  = "0";
					        $account_bis["mois"]        = '10';
				        	break;
			        	case 11:
				        	$account_bis["descr_nov"] = "NOV - N";
					        $account_bis["debit_nov"]   = "0";
					        $account_bis["credit_nov"]  = "0";
					        $account_bis["mois"]        = '11';
				        	break;
			        	case 12:
				        	$account_bis["descr_dec"] = "DEC - N";
					        $account_bis["debit_dec"]   = "0";
					        $account_bis["credit_dec"]  = "0";
					        $account_bis["mois"]        = '12';
				        	break;
        			}
        			
        			array_push($accounts, $account_bis);
        			
        		}
        		$prev_month = '12';
        	}
        	
	        $account["number"]  = stripslashes($account["numero"]);
	        //$account["mois"]    = stripslashes($account["mois"]);
	        $account["annee"]   = stripslashes($account["annee"]);
	        $account["descr"] 	= stripslashes($account["libelle"]);
	        $cumul = $this->get_cumul_total($account["number"], '01', $account["mois"], $account["annee"]);
	        switch($account["mois"]){  
	        	case '01':
	        	$account["descr_jan"] 	  = "JAN";
		        $account["debit_jan"]     = stripslashes($account["debit"]);
		        $account["credit_jan"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_jan"] = $cumul["credit"];
		        $account["cumul_deb_jan"] = $cumul["debit"];
		        $account["solde_cum_jan"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        	case '02':
	        	$account["descr_feb"] 	  = "FEB";
		        $account["debit_feb"]     = stripslashes($account["debit"]);
		        $account["credit_feb"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_feb"] = $cumul["credit"];
		        $account["cumul_deb_feb"] = $cumul["debit"];
		        $account["solde_cum_feb"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        	case '03':
	        	$account["descr_mar"] 	  = "MAR";
		        $account["debit_mar"]     = stripslashes($account["debit"]);
		        $account["credit_mar"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_mar"] = $cumul["credit"];
		        $account["cumul_deb_mar"] = $cumul["debit"];
		        $account["solde_cum_mar"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        	case '04':
	        	$account["descr_apr"] 	  =	"APR";
		        $account["debit_apr"]     = stripslashes($account["debit"]);
		        $account["credit_apr"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_apr"] = $cumul["credit"];
		        $account["cumul_deb_apr"] = $cumul["debit"];
		        $account["solde_cum_apr"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        	case '05':
	        	$account["descr_may"] 	  = "MAY";
		        $account["debit_may"]     = stripslashes($account["debit"]);
		        $account["credit_may"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_may"] = $cumul["credit"];
		        $account["cumul_deb_may"] = $cumul["debit"];
		        $account["solde_cum_may"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        	case '06':
	        	$account["descr_jun"] 	  = "JUN";
		        $account["debit_jun"]     = stripslashes($account["debit"]);
		        $account["credit_jun"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_jun"] = $cumul["credit"];
		        $account["cumul_deb_jun"] = $cumul["debit"];
		        $account["solde_cum_jun"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        	case '07':
	        	$account["descr_jul"] 	  = "JUL";
		        $account["debit_jul"]     = stripslashes($account["debit"]);
		        $account["credit_jul"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_jul"] = $cumul["credit"];
		        $account["cumul_deb_jul"] = $cumul["debit"];
		        $account["solde_cum_jul"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        	case '08':
	        	$account["descr_aug"] 	  = "AUG";
		        $account["debit_aug"]     = stripslashes($account["debit"]);
		        $account["credit_aug"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_aug"] = $cumul["credit"];
		        $account["cumul_deb_aug"] = $cumul["debit"];
		        $account["solde_cum_aug"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        	case '09':
	        	$account["descr_sep"] 	  = "SEP";
		        $account["debit_sep"]     = stripslashes($account["debit"]);
		        $account["credit_sep"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_sep"] = $cumul["credit"];
		        $account["cumul_deb_sep"] = $cumul["debit"];
		        $account["solde_cum_sep"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        	case '10':
	        	$account["descr_oct"] 	  = "OCT";
		        $account["debit_oct"]     = stripslashes($account["debit"]);
		        $account["credit_oct"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_oct"] = $cumul["credit"];
		        $account["cumul_deb_oct"] = $cumul["debit"];
		        $account["solde_cum_oct"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        	case '11':
	        	$account["descr_nov"] 	  = "NOV";
		        $account["debit_nov"]     = stripslashes($account["debit"]);
		        $account["credit_nov"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_nov"] = $cumul["credit"];
		        $account["cumul_deb_nov"] = $cumul["debit"];
		        $account["solde_cum_nov"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        	case '12':
	        	$account["descr_dec"] 	  = "DEC";
		        $account["debit_dec"]     = stripslashes($account["debit"]);
		        $account["credit_dec"]    = stripslashes($account["credit"]);
		        $account["cumul_cre_dec"] = $cumul["credit"];
		        $account["cumul_deb_dec"] = $cumul["debit"];
		        $account["solde_cum_dec"] = $cumul["debit"] - $cumul["credit"];
	        	break;
	        }
	        
	        $prev_month  = $account["mois"];
	        $prev_number = $account["number"];
	        
	        $account["date"]    = stripslashes($account["date"]);
	  
	        array_push($accounts, $account);
		}    

        if( $prev_month < 12){
        	if($prev_month < 10){
        		$prev_month = substr($prev_month, 1, 1);
        	}
        	
        	for($i=$prev_month+1; $i<=12; $i++){
        	$account["number"]  = $prev_number;
	        $account["mois"]    = $i;
	        $account["annee"]   = stripslashes($account["annee"]);
        	switch($i){
        		case 2:
        			$account["descr_feb"]  = "FEB - N";
			        $account["debit_feb"]   = "0";
			        $account["credit_feb"]  = "0";
			        $account["mois"]        = '02';
		        	break;
	        	case 3:
		        	$account["descr_mar"] = "MAR - N";
			        $account["debit_mar"]   = "0";
			        $account["credit_mar"]  = "0";
			        $account["mois"]        = '03';
		        	break;
	        	case 4:
		        	$account["descr_apr"] = "APR - N";
			        $account["debit_apr"]   = "0";
			        $account["credit_apr"]  = "0";
			        $account["mois"]        = '04';
		        	break;
	        	case 5:
		        	$account["descr_may"] = "MAY - N";
			        $account["debit_may"]   = "0";
			        $account["credit_may"]  = "0";
			        $account["mois"]        = '05';
		        	break;
	        	case 6:
		        	$account["descr_jun"] = "JUN - N";
			        $account["debit_jun"]   = "0";
			        $account["credit_jun"]  = "0";
			        $account["mois"]        = '06';
		        	break;
	        	case 7:
		        	$account["descr_jul"] = "JUL - N";
			        $account["debit_jul"]   = "0";
			        $account["credit_jul"]  = "0";
			        $account["mois"]        = '07';
		        	break;
	        	case 8:
		        	$account["descr_aug"] = "AUG - N";
			        $account["debit_aug"]   = "0";
			        $account["credit_aug"]  = "0";
			        $account["mois"]        = '08';
		        	break;
	        	case 9:
		        	$account["descr_sep"] = "SEP - N";
			        $account["debit_sep"]   = "0";
			        $account["credit_sep"]  = "0";
			        $account["mois"]        = '09';
		        	break;
	        	case 10:
		        	$account["descr_oct"] = "OCT - N";
			        $account["debit_oct"]   = "0";
			        $account["credit_oct"]  = "0";
			        $account["mois"]        = '10';
		        	break;
	        	case 11:
		        	$account["descr_nov"] = "NOV - N";
			        $account["debit_nov"]   = "0";
			        $account["credit_nov"]  = "0";
			        $account["mois"]        = '11';
		        	break;
	        	case 12:
		        	$account["descr_dec"] = "DEC - N";
			        $account["debit_dec"]   = "0";
			        $account["credit_dec"]  = "0";
			        $account["mois"]        = '12';
		        	break;
        		}
        	
        		array_push($accounts, $account);
        	
        	}
        }
             
        if (!empty($accounts))  {	
            return $accounts;
        } else  {
            return false;
        }
    }    

    function get_classe($nr_classe, $mois, $annee) {
    	
    	$sql = "SELECT  
    			SUM(c.debit)  as debit, 
    			SUM(c.credit) as credit 
    			FROM comptes AS c
    			WHERE c.numero LIKE '$nr_classe%'
    			AND   mois  = '$mois'
    			AND   annee = '$annee'";

    	   //echo $sql;
        
        $sel = mysql_query($sql);
        
        $res = mysql_fetch_array($sel);
        
        if (!empty($res))  {	
            return $res;
        } else  {
            return false;
        }
    }
    
    function get_cumul($nr_classe, $beg_mois, $end_mois, $annee) {
    	
    	$i = 0;
    	$total = 0;
		while(($curr_month=$beg_mois+$i) <= $end_mois){
			if($curr_month < 10 )
				$curr_month = '0' . $curr_month;
			$classe = $this->get_classe($nr_classe, $curr_month, $annee);
			if($classe == false)
				$total += 0;
			else
				$total += $classe["debit"] - $classe["credit"];
				 
			$i++;
		}
        
        return round( $total, 2 ); 
    }
    
	function get_cumul_total($nr_classe, $beg_mois, $end_mois, $annee) {
    	
    	$i = 0;
    	$total_debit = 0;
    	$total_credit = 0;
		while(($curr_month=$beg_mois+$i) <= $end_mois){
			if($curr_month < 10 )
				$curr_month = '0' . $curr_month;
			$classe = $this->get_classe($nr_classe, $curr_month, $annee);
			$total_debit += $classe["debit"];
			$total_credit += $classe["credit"];
				 
			$i++;
		}
        $res['credit'] = $total_credit;
        $res['debit']  = $total_debit;
        return $res; 
    }
    
    function get_benefice_cumule($beg_classe, $end_classe, $beg_mois, $end_mois, $annee) {
    	
    	$i = 0;
    	$total = 0;
		while(($curr_classe=$beg_classe+$i) <= $end_classe){
			$total += $this->get_cumul($curr_classe, $beg_mois, $end_mois, $annee);				 
			$i++;
		}
        
        return $total; 
    }
    
    function getcomment($classe) {
    	
    	$sql = "SELECT  
    			c.classe      as classe,
    			c.nom         as nom,
    			c.faits       as faits,
    			c.conclusions as conclusions,
    			c.actions     as actions
    			FROM comptabilite_commentaire AS c
    			WHERE c.classe LIKE '%$classe%'";

    	   //echo $sql;
        
        $sel = mysql_query($sql);

		$account = mysql_fetch_assoc($sel);
        	
        $account["classe"]      = stripslashes($account["classe"]);
        $account["nom"]         = stripslashes($account["nom"]);
        $account["faits"]       = stripslashes($account["faits"]);
        $account["conclusions"] = stripslashes($account["conclusions"]);
        $account["actions"]     = stripslashes($account["actions"]);
         
        header('Content-Type: application/json');
		echo json_encode($account); 
        
    }

    function getcomment2($classe) {
    	
    	$sql = "SELECT  
    			c.classe      as classe,
    			c.nom         as nom,
    			c.faits       as faits,
    			c.conclusions as conclusions,
    			c.actions     as actions
    			FROM comptabilite_commentaire AS c
    			WHERE c.classe LIKE '%$classe%'";

    	   //echo $sql;
        
        $sel = mysql_query($sql);

		$account = mysql_fetch_assoc($sel);
        	
        $account["classe"]      = utf8_encode($account["classe"]);
        $account["nom"]         = utf8_encode($account["nom"]);
        $account["faits"]       = utf8_encode($account["faits"]);
        $account["conclusions"] = utf8_encode($account["conclusions"]);
        $account["actions"]     = utf8_encode($account["actions"]);
         
        if (!empty($account))  {	
            return $account;
        } else  {
            return false;
        }
        
    }

    function savecomment($classe, $nom, $faits, $conclusions, $actions)  {
    	
        $nom         = mysql_real_escape_string($nom);
        $faits       = mysql_real_escape_string($faits);
        $conclusions = mysql_real_escape_string($conclusions);
        $actions     = mysql_real_escape_string($actions);
        
        $sql = "UPDATE comptabilite_commentaire set nom='$nom' , faits='$faits', conclusions='$conclusions', actions='$actions' where classe='$classe'";
        
        $upd = mysql_query($sql);
        
        if ($upd) {
            return true;
        } else {
            return false;
        }

    }   

    function getComparison($account, $mois, $annee1, $annee2){
    	$results = array();
    	$list = $this->getList($account, $annee1, $annee2);
    	$totalCumul       = 0;
    	$totalPrevCumul   = 0;
    	if ($list != false){
	    	for($i=0; $i<count($list); $i++){
	    		//$account 				= $this->get_account($list[$i]["numero"], $mois, $annee1);
	    		$result["numero"]     	= $list[$i]["numero"];
	        	if(!($account = $this->get_account($list[$i]["numero"], $mois, $annee1)))
	        		$account = $this->get_account($list[$i]["numero"], $mois, $annee2);
	    		$result["descr"]      	= $account["libelle"];
	        	//$result["descr"]      	= $list[$i]["libelle"];
	        	$cumul 					= $this->get_cumul($list[$i]["numero"], 0, $mois, $annee1);
	        	$result["cumul"]        = $cumul;
	        	$totalCumul            += $cumul;
	        	$prevCumul              = $this->get_cumul($list[$i]["numero"], 0, $mois, $annee2);
	        	$result["prevcumul"]    = $prevCumul;
	        	$totalPrevCumul        += $prevCumul;
	        	$result["delta"]  	    = $cumul - $prevCumul;
	        	$result["pourcentage"]  = round( ( ($cumul / $prevCumul) - 1 ) * 100, 2);
	        	array_push($results, $result);
	    	}
	    	
	    	$result["numero"]      = "Total";
	    	$result["descr"]       = "Somme & Moyenne";
	    	$result["cumul"]       = $totalCumul;
	    	$result["prevcumul"]   = $totalPrevCumul;
	    	$result["delta"]       = $totalCumul - $totalPrevCumul;
	    	$result["pourcentage"] = round( ( ($totalCumul / $totalPrevCumul) - 1 ) * 100, 2);
	    	
	    	array_push($results, $result);
    	}
    	if (!empty($results))  {
            return $results;
        } else {
            return false;
        }
    	
    }
    
    function getOverview($account, $annee) {
    	
    	$results = array();
        $accounts = $this->getAccount($account, $annee);
        
        $totalDebJan = 0;
        $totalCreJan = 0;
        $totalCumDebJan = 0;
        $totalCumCreJan = 0;
        $totalSolCumJan = 0;
        
        $totalDebFeb = 0;
        $totalCreFeb = 0;
        $totalCumDebFeb = 0;
        $totalCumCreFeb = 0;
        $totalSolCumFeb = 0;
        
        $totalDebMar = 0;
        $totalCreMar = 0;
        $totalCumDebMar = 0;
        $totalCumCreMar = 0;
        $totalSolCumMar = 0;
        
        $totalDebApr = 0;
        $totalCreApr = 0;
        $totalCumDebApr = 0;
        $totalCumCreApr = 0;
        $totalSolCumApr = 0;
        
        $totalDebMay = 0;
        $totalCreMay = 0;
        $totalCumDebMay = 0;
        $totalCumCreMay = 0;
        $totalSolCumMay = 0;
        
        $totalDebJun = 0;
        $totalCreJun = 0;
        $totalCumDebJun = 0;
        $totalCumCreJun = 0;
        $totalSolCumJun = 0;
        
        $totalDebJul = 0;
        $totalCreJul = 0;
        $totalCumDebJul = 0;
        $totalCumCreJul = 0;
        $totalSolCumJul = 0;
        
        $totalDebAug = 0;
        $totalCreAug = 0;
        $totalCumDebAug = 0;
        $totalCumCreAug = 0;
        $totalSolCumAug = 0;
        
        $totalDebSep = 0;
        $totalCreSep = 0;
        $totalCumDebSep = 0;
        $totalCumCreSep = 0;
        $totalSolCumSep = 0;
        
        $totalDebOct = 0;
        $totalCreOct = 0;
        $totalCumDebOct = 0;
        $totalCumCreOct = 0;
        $totalSolCumOct = 0;
        
        $totalDebNov = 0;
        $totalCreNov = 0;
        $totalCumDebNov = 0;
        $totalCumCreNov = 0;
        $totalSolCumNov = 0;
        
        $totalDebDec = 0;
        $totalCreDec = 0;
        $totalCumDebDec = 0;
        $totalCumCreDec = 0;
        $totalSolCumDec = 0;
        
        for($i=0; $i<count($accounts); $i++){
        	
        	switch($i%12){
        		case 0:
        			$result["number"]     		= $accounts[$i]["number"];
        			$result["descr"]      		= $accounts[$i]["descr"];
        			$result["descr_jan"]  		= $accounts[$i]["descr_jan"];
        			$result["debit_jan"]  		= $accounts[$i]["debit_jan"];
        			$result["credit_jan"]   	= $accounts[$i]["credit_jan"];
        			$result["cumul_deb_jan"]  	= $accounts[$i]["cumul_deb_jan"];
        			$result["cumul_cre_jan"] 	= $accounts[$i]["cumul_cre_jan"];
        			$result["solde_cum_jan"] 	= $accounts[$i]["solde_cum_jan"];
        			
        			$totalDebJan += $accounts[$i]["debit_jan"];
			        $totalCreJan += $accounts[$i]["credit_jan"];
			        $totalCumDebJan += $accounts[$i]["cumul_deb_jan"];
			        $totalCumCreJan += $accounts[$i]["cumul_cre_jan"];
			        $totalSolCumJan += $accounts[$i]["solde_cum_jan"];
        			break;
        		case 1:
        			$result["descr_feb"]  		= $accounts[$i]["descr_feb"];
        			$result["debit_feb"]  		= $accounts[$i]["debit_feb"];
        			$result["credit_feb"] 		= $accounts[$i]["credit_feb"];
        			$result["cumul_deb_feb"]  	= $accounts[$i]["cumul_deb_feb"];
        			$result["cumul_cre_feb"] 	= $accounts[$i]["cumul_cre_feb"];
        			$result["solde_cum_feb"] 	= $accounts[$i]["solde_cum_feb"];
        			
        			$totalDebFeb += $accounts[$i]["debit_feb"];
			        $totalCreFeb += $accounts[$i]["credit_feb"];
			        $totalCumDebFeb += $accounts[$i]["cumul_deb_feb"];
			        $totalCumCreFeb += $accounts[$i]["cumul_cre_feb"];
			        $totalSolCumFeb += $accounts[$i]["solde_cum_feb"];
        			break;
        		case 2:
        			$result["descr_mar"]  		= $accounts[$i]["descr_mar"];
        			$result["debit_mar"]  		= $accounts[$i]["debit_mar"];
        			$result["credit_mar"] 		= $accounts[$i]["credit_mar"];
        			$result["cumul_deb_mar"]  	= $accounts[$i]["cumul_deb_mar"];
        			$result["cumul_cre_mar"] 	= $accounts[$i]["cumul_cre_mar"];
        			$result["solde_cum_mar"] 	= $accounts[$i]["solde_cum_mar"];
        			
        			$totalDebMar += $accounts[$i]["debit_mar"];
			        $totalCreMar += $accounts[$i]["credit_mar"];
			        $totalCumDebMar += $accounts[$i]["cumul_deb_mar"];
			        $totalCumCreMar += $accounts[$i]["cumul_cre_mar"];
			        $totalSolCumMar += $accounts[$i]["solde_cum_mar"];
        			break;
        		case 3:
        			$result["descr_apr"]  		= $accounts[$i]["descr_apr"];
        			$result["debit_apr"]  		= $accounts[$i]["debit_apr"];
        			$result["credit_apr"] 		= $accounts[$i]["credit_apr"];
        			$result["cumul_deb_apr"]  	= $accounts[$i]["cumul_deb_apr"];
        			$result["cumul_cre_apr"] 	= $accounts[$i]["cumul_cre_apr"];
        			$result["solde_cum_apr"] 	= $accounts[$i]["solde_cum_apr"];
        			
        			$totalDebApr += $accounts[$i]["debit_apr"];
			        $totalCreApr += $accounts[$i]["credit_apr"];
			        $totalCumDebApr += $accounts[$i]["cumul_deb_apr"];
			        $totalCumCreApr += $accounts[$i]["cumul_cre_apr"];
			        $totalSolCumApr += $accounts[$i]["solde_cum_apr"];
        			break;
        		case 4:
        			$result["descr_may"]  		= $accounts[$i]["descr_may"];
        			$result["debit_may"]  		= $accounts[$i]["debit_may"];
        			$result["credit_may"] 		= $accounts[$i]["credit_may"];
        			$result["cumul_deb_may"]  	= $accounts[$i]["cumul_deb_may"];
        			$result["cumul_cre_may"] 	= $accounts[$i]["cumul_cre_may"];
        			$result["solde_cum_may"] 	= $accounts[$i]["solde_cum_may"];
        			
        			$totalDebMay += $accounts[$i]["debit_may"];
			        $totalCreMay += $accounts[$i]["credit_may"];
			        $totalCumDebMay += $accounts[$i]["cumul_deb_may"];
			        $totalCumCreMay += $accounts[$i]["cumul_cre_may"];
			        $totalSolCumMay += $accounts[$i]["solde_cum_may"];
        			break;
        		case 5:
        			$result["descr_jun"]  		= $accounts[$i]["descr_jun"];
        			$result["debit_jun"]  		= $accounts[$i]["debit_jun"];
        			$result["credit_jun"] 		= $accounts[$i]["credit_jun"];
        			$result["cumul_deb_jun"]  	= $accounts[$i]["cumul_deb_jun"];
        			$result["cumul_cre_jun"] 	= $accounts[$i]["cumul_cre_jun"];
        			$result["solde_cum_jun"] 	= $accounts[$i]["solde_cum_jun"];
        			
        			$totalDebJun += $accounts[$i]["debit_jun"];
			        $totalCreJun += $accounts[$i]["credit_jun"];
			        $totalCumDebJun += $accounts[$i]["cumul_deb_jun"];
			        $totalCumCreJun += $accounts[$i]["cumul_cre_jun"];
			        $totalSolCumJun += $accounts[$i]["solde_cum_jun"];
        			break;
        		case 6:
        			$result["descr_jul"]  		= $accounts[$i]["descr_jul"];
        			$result["debit_jul"]  		= $accounts[$i]["debit_jul"];
        			$result["credit_jul"] 		= $accounts[$i]["credit_jul"];
        			$result["cumul_deb_jul"]  	= $accounts[$i]["cumul_deb_jul"];
        			$result["cumul_cre_jul"] 	= $accounts[$i]["cumul_cre_jul"];
        			$result["solde_cum_jul"] 	= $accounts[$i]["solde_cum_jul"];
        			
        			$totalDebJul += $accounts[$i]["debit_jul"];
			        $totalCreJul += $accounts[$i]["credit_jul"];
			        $totalCumDebJul += $accounts[$i]["cumul_deb_jul"];
			        $totalCumCreJul += $accounts[$i]["cumul_cre_jul"];
			        $totalSolCumJul += $accounts[$i]["solde_cum_jul"];
        			break;
        		case 7:
        			$result["descr_aug"]  		= $accounts[$i]["descr_aug"];
        			$result["debit_aug"]  		= $accounts[$i]["debit_aug"];
        			$result["credit_aug"] 		= $accounts[$i]["credit_aug"];
        			$result["cumul_deb_aug"]  	= $accounts[$i]["cumul_deb_aug"];
        			$result["cumul_cre_aug"] 	= $accounts[$i]["cumul_cre_aug"];
        			$result["solde_cum_aug"] 	= $accounts[$i]["solde_cum_aug"];
        			
        			$totalDebAug += $accounts[$i]["debit_aug"];
			        $totalCreAug += $accounts[$i]["credit_aug"];
			        $totalCumDebAug += $accounts[$i]["cumul_deb_aug"];
			        $totalCumCreAug += $accounts[$i]["cumul_cre_aug"];
			        $totalSolCumAug += $accounts[$i]["solde_cum_aug"];
        			break;
        		case 8:
        			$result["descr_sep"]  		= $accounts[$i]["descr_sep"];
        			$result["debit_sep"]  		= $accounts[$i]["debit_sep"];
        			$result["credit_sep"] 		= $accounts[$i]["credit_sep"];
        			$result["cumul_deb_sep"]  	= $accounts[$i]["cumul_deb_sep"];
        			$result["cumul_cre_sep"] 	= $accounts[$i]["cumul_cre_sep"];
        			$result["solde_cum_sep"] 	= $accounts[$i]["solde_cum_sep"];
        			
        			$totalDebSep += $accounts[$i]["debit_sep"];
			        $totalCreSep += $accounts[$i]["credit_sep"];
			        $totalCumDebSep += $accounts[$i]["cumul_deb_sep"];
			        $totalCumCreSep += $accounts[$i]["cumul_cre_sep"];
			        $totalSolCumSep += $accounts[$i]["solde_cum_sep"];
        			break;
        		case 9:
        			$result["descr_oct"] 		= $accounts[$i]["descr_oct"];
        			$result["debit_oct"] 		= $accounts[$i]["debit_oct"];
        			$result["credit_oct"] 		= $accounts[$i]["credit_oct"];
        			$result["cumul_deb_oct"]  	= $accounts[$i]["cumul_deb_oct"];
        			$result["cumul_cre_oct"] 	= $accounts[$i]["cumul_cre_oct"];
        			$result["solde_cum_oct"] 	= $accounts[$i]["solde_cum_oct"];
        			
        			$totalDebOct += $accounts[$i]["debit_oct"];
			        $totalCreOct += $accounts[$i]["credit_oct"];
			        $totalCumDebOct += $accounts[$i]["cumul_deb_oct"];
			        $totalCumCreOct += $accounts[$i]["cumul_cre_oct"];
			        $totalSolCumOct += $accounts[$i]["solde_cum_oct"];
			        
        			break;
        		case 10: 
        			$result["descr_nov"]  		= $accounts[$i]["descr_nov"];
        			$result["debit_nov"]  		= $accounts[$i]["debit_nov"];
        			$result["credit_nov"] 		= $accounts[$i]["credit_nov"];
        			$result["cumul_deb_nov"]  	= $accounts[$i]["cumul_deb_nov"];
        			$result["cumul_cre_nov"] 	= $accounts[$i]["cumul_cre_nov"];
        			$result["solde_cum_nov"] 	= $accounts[$i]["solde_cum_nov"];
        			
        			$totalDebNov += $accounts[$i]["debit_nov"];
			        $totalCreNov += $accounts[$i]["credit_nov"];
			        $totalCumDebNov += $accounts[$i]["cumul_deb_nov"];
			        $totalCumCreNov += $accounts[$i]["cumul_cre_nov"];
			        $totalSolCumNov += $accounts[$i]["solde_cum_nov"];
        			break;
        		case 11:
        			$result["descr_dec"]  		= $accounts[$i]["descr_dec"];
        			$result["debit_dec"]  		= $accounts[$i]["debit_dec"];
        			$result["credit_dec"] 		= $accounts[$i]["credit_dec"];
        			$result["cumul_deb_dec"]  	= $accounts[$i]["cumul_deb_dec"];
        			$result["cumul_cre_dec"] 	= $accounts[$i]["cumul_cre_dec"];
        			$result["solde_cum_dec"] 	= $accounts[$i]["solde_cum_dec"];
        			
        			$totalDebDec += $accounts[$i]["debit_dec"];
			        $totalCreDec += $accounts[$i]["credit_dec"];
			        $totalCumDebDec += $accounts[$i]["cumul_deb_dec"];
			        $totalCumCreDec += $accounts[$i]["cumul_cre_dec"];
			        $totalSolCumDec += $accounts[$i]["solde_cum_dec"];
        			array_push($results, $result);
        			break;										
        				
        	}
        	
        			
        }
        
        $result["number"]     		= "0";
        $result["descr"]      		= "TOTAL";
        
        $result["descr_jan"]  		= "JAN - TOTAL";
        $result["debit_jan"]  		= $totalDebJan;
        $result["credit_jan"] 		= $totalCreJan;
        $result["cumul_deb_jan"]  	= $totalCumDebJan;
        $result["cumul_cre_jan"] 	= $totalCumCreJan;
        $result["solde_cum_jan"] 	= $totalSolCumJan;
        
        $result["descr_feb"]  		= "FEB - TOTAL";
        $result["debit_feb"]  		= $totalDebFeb;
        $result["credit_feb"] 		= $totalCreFeb;
        $result["cumul_deb_feb"]  	= $totalCumDebFeb;
        $result["cumul_cre_feb"] 	= $totalCumCreFeb;
        $result["solde_cum_feb"] 	= $totalSolCumFeb;
        
        $result["descr_mar"]  		= "MAR - TOTAL";
        $result["debit_mar"]  		= $totalDebMar;
        $result["credit_mar"] 		= $totalCreMar;
        $result["cumul_deb_mar"]  	= $totalCumDebMar;
        $result["cumul_cre_mar"] 	= $totalCumCreMar;
        $result["solde_cum_mar"] 	= $totalSolCumMar;
        
        $result["descr_apr"]  		= "APR - TOTAL";
        $result["debit_apr"]  		= $totalDebApr;
        $result["credit_apr"] 		= $totalCreApr;
        $result["cumul_deb_apr"]  	= $totalCumDebApr;
        $result["cumul_cre_apr"] 	= $totalCumCreApr;
        $result["solde_cum_apr"] 	= $totalSolCumApr;
        
        $result["descr_may"]  		= "MAY - TOTAL";
        $result["debit_may"]  		= $totalDebMay;
        $result["credit_may"] 		= $totalCreMay;
        $result["cumul_deb_may"]  	= $totalCumDebMay;
        $result["cumul_cre_may"] 	= $totalCumCreMay;
        $result["solde_cum_may"] 	= $totalSolCumMay;
        
        $result["descr_jun"]  		= "JUN - TOTAL";
        $result["debit_jun"]  		= $totalDebJun;
        $result["credit_jun"] 		= $totalCreJun;
        $result["cumul_deb_jun"]  	= $totalCumDebJun;
        $result["cumul_cre_jun"] 	= $totalCumCreJun;
        $result["solde_cum_jun"] 	= $totalSolCumJun;
        
        $result["descr_jul"]  		= "JUL - TOTAL";
        $result["debit_jul"]  		= $totalDebJul;
        $result["credit_jul"] 		= $totalCreJul;
        $result["cumul_deb_jul"]  	= $totalCumDebJul;
        $result["cumul_cre_jul"] 	= $totalCumCreJul;
        $result["solde_cum_jul"] 	= $totalSolCumJul;
        
        $result["descr_aug"]  		= "AUG - TOTAL";
        $result["debit_aug"]  		= $totalDebAug;
        $result["credit_aug"] 		= $totalCreAug;
        $result["cumul_deb_aug"]  	= $totalCumDebAug;
        $result["cumul_cre_aug"] 	= $totalCumCreAug;
        $result["solde_cum_aug"] 	= $totalSolCumAug;
        
        $result["descr_sep"]  		= "SEP - TOTAL";
        $result["debit_sep"]  		= $totalDebSep;
        $result["credit_sep"] 		= $totalCreSep;
        $result["cumul_deb_sep"]  	= $totalCumDebSep;
        $result["cumul_cre_sep"] 	= $totalCumCreSep;
        $result["solde_cum_sep"] 	= $totalSolCumSep;
        
        $result["descr_oct"]  		= "OCT - TOTAL";
        $result["debit_oct"]  		= $totalDebOct;
        $result["credit_oct"] 		= $totalCreOct;
        $result["cumul_deb_oct"]  	= $totalCumDebOct;
        $result["cumul_cre_oct"] 	= $totalCumCreOct;
        $result["solde_cum_oct"] 	= $totalSolCumOct;
        
        $result["descr_nov"]  		= "NOV - TOTAL";
        $result["debit_nov"]  		= $totalDebNov;
        $result["credit_nov"] 		= $totalCreNov;
        $result["cumul_deb_nov"]  	= $totalCumDebNov;
        $result["cumul_cre_nov"] 	= $totalCumCreNov;
        $result["solde_cum_nov"] 	= $totalSolCumNov;
        
        $result["descr_dec"]  		= "DEC - TOTAL";
        $result["debit_dec"]  		= $totalDebDec;
        $result["credit_dec"] 		= $totalCreDec;
        $result["cumul_deb_dec"]  	= $totalCumDebDec;
        $result["cumul_cre_dec"] 	= $totalCumCreDec;
        $result["solde_cum_dec"] 	= $totalSolCumDec;
        
        array_push($results, $result);
        
        
        if (!empty($results))  {
            return $results;
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
	
    function get_previous_month($month) {
    	
    	switch($month){
    		case '02':	
            	return '01';
            case '03':	
            	return '02';
            case '04':	
            	return '03';
            case '05':	
            	return '04';
            case '06':	
            	return '05';
            case '07':	
            	return '06';
            case '08':	
            	return '07';
            case '09':	
            	return '08';
            case '10':	
            	return '09';
            case '11':	
            	return '10';
            case '12':	
            	return '11';										
            default:
            	return false;
        }
    }
}

?>
