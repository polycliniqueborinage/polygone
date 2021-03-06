<?php
/**
 * Provides methods to interact with users
 *
 * @author Open Dynamics <info@o-dyn.de>
 * @name user
 */
class statistiques
{
    public $mylog;

    function __construct()
    {
        $this->mylog = new mylog;
    }

    /**
     * Add Exam
     *
     */
    function getPrestations($begda, $endda, $medecins, $filter) {
    
    	$prestations = array();
    	$prestations_tmp = array();
    	$total = 0;
    	for($i=0; $i<count($medecins); $i++){
    		$inami = $medecins[$i]["inami"];
    		//prob dans la s�lection de dates
	    	$sql = "SELECT 
					p.start as start,
					p.end   as end,
					p.date  as date
					FROM `$inami` p
	   				WHERE date >= '$begda' 
	   				AND   date <= '$endda'
	   				ORDER BY date";
	    			//echo $sql;
	   		$sel1 = mysql_query($sql);
	
	        $sumtime = intval(0);

	        while ($prestation = mysql_fetch_array($sel1)) {
	        	
	        	$prestation["date"]   = stripslashes($prestation["date"]);
	        	$prestation["start"]  = stripslashes($prestation["start"]);
	        	$prestation["end"]    = stripslashes($prestation["end"]);
	            $begtime = explode('H', $prestation["start"]);
	            $endtime = explode('H', $prestation["end"]);
	            $time = ($endtime[0] * 60 + $endtime[1]) - ($begtime[0] * 60 + $begtime[1]);
	        	$sumtime += intval($time);
			        	
	           	//array_push($prestations, $prestation);
	            
	        }
	        $prestation["duration"] = $sumtime;
	        $prestation["nom"]    = stripslashes($medecins[$i]["nom"]);
        	$prestation["prenom"] = stripslashes($medecins[$i]["prenom"]);
        	$prestation["inami"]  = stripslashes($medecins[$i]["inami"]);
	        $hours = floor($sumtime/60);
			$minutes = $sumtime%60;
			$prestation["duration2"] = $hours.' h '.$minutes.' min';
			$minutes = round($minutes/60*100, 0);
			$prestation["duration3"] = $hours.','.$minutes;	
	        
			$total += $sumtime;
			
			if($filter==''){
				//array_push($prestations, $prestation);
				$prestations_tmp[$prestation["nom"]]["duration"]   = $prestation["duration"];
				$prestations_tmp2[$prestation["nom"]]["nom"]       = $prestation["nom"];
				$prestations_tmp2[$prestation["nom"]]["prenom"]    = $prestation["prenom"];
				$prestations_tmp2[$prestation["nom"]]["inami"]     = $prestation["inami"];
				$prestations_tmp2[$prestation["nom"]]["duration"]  = $prestation["duration"];
				$prestations_tmp2[$prestation["nom"]]["duration2"] = $prestation["duration2"];
				$prestations_tmp2[$prestation["nom"]]["duration3"] = $prestation["duration3"];
			}	
			else{ 
				if($sumtime > 0){
					//array_push($prestations, $prestation);
					$prestations_tmp[$prestation["nom"]]["duration"]   = $prestation["duration"];
					$prestations_tmp2[$prestation["nom"]]["nom"]       = $prestation["nom"];
					$prestations_tmp2[$prestation["nom"]]["prenom"]    = $prestation["prenom"];
					$prestations_tmp2[$prestation["nom"]]["inami"]     = $prestation["inami"];
					$prestations_tmp2[$prestation["nom"]]["duration"]  = $prestation["duration"];
					$prestations_tmp2[$prestation["nom"]]["duration2"] = $prestation["duration2"];
					$prestations_tmp2[$prestation["nom"]]["duration3"] = $prestation["duration3"];
					//echo $prestations_tmp[$prestation["nom"]]["duration"].'-';				
				}	
			}	
    	}
    	
    	arsort($prestations_tmp);
    	$total_pourcentage = 0;
    	foreach($prestations_tmp as $i => $value){
    		$prestation["nom"]         		= $prestations_tmp2[$i]["nom"];
			$prestation["prenom"]      		= $prestations_tmp2[$i]["prenom"];
			$prestation["inami"]       		= $prestations_tmp2[$i]["inami"];
			$prestation["duration"]    		= $prestations_tmp2[$i]["duration"];
			$prestation["duration2"]   		= $prestations_tmp2[$i]["duration2"];
			$prestation["duration3"]   		= $prestations_tmp2[$i]["duration3"];
			$prestation["pourcentage"] 		= round((100/$total*$prestations_tmp2[$i]["duration"]), 2);
			$total_pourcentage         	    += 100/$total*$prestations_tmp2[$i]["duration"];
			$prestation["pourcentage_cum"]  = round($total_pourcentage, 2); 
			//echo $i."-";
			array_push($prestations, $prestation);
    	}
        if (!empty($prestations))  {	
            return $prestations;
        } else  {
            return false;
        }

    }    
    
	/**
     * get medecin
     *
     */
    function getAllMedecins() {
    	
        
        $sql = "select id, nom, prenom, inami FROM medecins";
        //$sel = mysql_query($sql);
	  	//$res = mysql_fetch_array($sel);
	  	
    	$sel1 = mysql_query($sql);
	
        $medecins = array();

        while ($medecin = mysql_fetch_array($sel1)) {
       
            $medecin["inami"]  = stripslashes($medecin["inami"]);
        	$medecin["nom"]    = stripslashes($medecin["nom"]);
        	$medecin["prenom"] = stripslashes($medecin["prenom"]);
            
           	array_push($medecins, $medecin);
            
        }
        if (!empty($medecins))  {	
            return $medecins;
        } else  {
            return false;
        }        
    }
    
}
?>
