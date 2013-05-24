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
class agenda
{
    public $mylog;

    /**
     * Konstruktor
     * Initialisiert den Eventlog
     */
    function __construct() {
        $this->mylog = new mylog;
    }

    function changeDateFromNumber($from,$nbr) {
    	
    	$sessionDate = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
		$this->Year = strtok($sessionDate,"-");
		$this->Month = strtok("-");
		$this->Day = strtok("-");
		
		$sessionDate =  date("Y-m-d", mktime(0, 0, 0, $this->Month, $this->Day + $nbr, $this->Year)); 
		$_SESSION['user_agenda_date']  = $sessionDate;

		$this->Year = strtok($sessionDate,"-");
		$this->Month = strtok("-");
		$this->Day = strtok("-");
		
		setlocale(LC_TIME, fr_FR);
		$dateFormat = $this->Month."/".$this->Day."/".$this->Year;
		echo $from." ".utf8_decode(ucfirst(strftime('%A, %d %B %Y',strtotime($dateFormat))));
		
	}
	
	function changeDateFromDate($from,$date) {

		$_SESSION['user_agenda_date']  = $date;
		
		$this->Year = strtok($date,"-");
		$this->Month = strtok("-");
		$this->Day = strtok("-");
		
		setlocale(LC_TIME, fr_FR);
		$dateFormat = $this->Month."/".$this->Day."/".$this->Year;
		echo $from." ".utf8_decode(ucfirst(strftime('%A, %d %B %Y',strtotime($dateFormat))));

	}
    
    /**
     * Creates a user
     *
     * @param string $name Name of the member
     * @param string $email Email Address of the member
     * @param int $company Company ID of the member (unused)
     * @param string $pass Password
     * @param int $admin Adminstate (0=client, 1=normal user, 5 = admin)
     * @param string $locale Localisation
     * @return int $insid ID of the newly created member
     */
	function add($userid,$color1,$color2,$day,$top,$length,$start,$end,$patient,$patientID,$motif,$motifID,$location,$comment) {

		$userid = mysql_real_escape_string($userid);
    	
        $midday = mysql_real_escape_string($midday);
    	
        $top = mysql_real_escape_string($top);
    	
    	$length = mysql_real_escape_string($length);
    	
    	$start = mysql_real_escape_string($start);
    	$end = mysql_real_escape_string($end);
    	
    	$patient = mysql_real_escape_string($patient);
    	$patientID = mysql_real_escape_string($patientID);
    	$motif = mysql_real_escape_string($motif);
    	$motifID = mysql_real_escape_string($motifID);
    	$location = mysql_real_escape_string($location);
    	$comment = mysql_real_escape_string($comment);
    	
    	$color1 = "#".mysql_real_escape_string($color1);
    	$color2 = "#".mysql_real_escape_string($color2);
    	
    	
    	//$color = "#5a94ce";
    	//2952a3 blue (comme le bord)
    	// c3d9ff blue clair
    	// f0f0ff blue tres clair
    	// 551a8b mauve
    	// faf7e6 red clair

    	$sql = "INSERT INTO `agenda_".$userid."` (`date`, `midday` ,`top` ,`length` ,`start` ,`end`, `position`, `size`, `number_brothers`, `color1`, `color2`, `patient`, `patient_ID`, `motif`, `motif_ID`, `location`, `comment`) VALUES ('$day', '$midday','$top', '$length', '$start','$end', 1, 1, 0, '$color1', '$color2', '$patient','$patientID','$motif','$motifID','$location','$comment')  ";
    	echo $sql;
        
        $ins = mysql_query($sql);
        $insid = mysql_insert_id();
		if ($ins) {
            return $insid;
        } else {
            return false;
        }
       
    }
    
	function update($userid,$id,$patient,$patientID,$motif,$motifID,$location,$comment) {

    	$id = mysql_real_escape_string($id);
    	$patient = mysql_real_escape_string($patient);
    	$patientID = mysql_real_escape_string($patientID);
    	$motif = mysql_real_escape_string($motif);
    	$motifID = mysql_real_escape_string($motifID);
    	$location = mysql_real_escape_string($location);
    	$comment = mysql_real_escape_string($comment);
    	$color = "#5a94ce";

    	$sql = "UPDATE`agenda_".$userid."` SET `patient`='$patient', `patient_ID`='$patientID', `motif`='$motif', `motif_id`='$motifID', `location`='$location', `comment`='$comment' WHERE ID=$id";
        
        $udp = mysql_query($sql);
        if ($udp) {
            return true;
        } else {
            return false;
        }
       
    }

    function move($userid,$id,$day,$top,$length,$start,$end) {
    	
    	// remove chip
		$id = substr($id, 4);
    	$id = mysql_real_escape_string($id);
        
        //clear
   	    $sql ="select * from `agenda_".$userid."` where ID='".$id."'";
    	echo "CLEAR".$sql."CLEAR  ";
		$result = mysql_query($sql);
		$data = mysql_fetch_assoc($result);
		$currentBrothers = $data['brothers'];
		$currentPosition = $data['position'];
		$currentSize = $data['size'];
		$currentNumberBrothers = $data['number_brothers'];
		
		echo "brothers ".$currentBrothers." ";
		echo "position ".$currentPosition." ";
		echo "size ".$currentSize." ";
		echo "number_brothers ".$currentNumberBrothers." ";
		
		if ($currentBrothers!=''){
				
			$tok = strtok($currentBrothers,"||");
				
			// FOR EACH BROTHERS
			while ($tok !== false) {
					
				//brotherID
				$brotherID = $tok;
					
				//brotherBrothers
				$sql = "select * from `agenda_".$userid."` WHERE ID=$brotherID";
				echo "CLEARCLEARCLEARCLEAR";
				$result1 = mysql_query($sql);
				$data1 = mysql_fetch_assoc($result1);
				
				$brotherBrothers = $data1['brothers'];
				$brotherSize = $data1['size'];
				$brotherNumberBrothers = $data1['number_brothers'];
				$brotherPosition = $data1['position'];
				
				echo "  brotherBrothers  ".$brotherBrothers."     ";
				echo "  brotherSize  ".$brotherSize."     ";
				echo "  brotherNumberBrothers  ".$brotherNumberBrothers."     ";
				echo "  brotherPosition  ".$brotherPosition."     ";
				
				// remove moving chip from current brothers
				$brotherBrothers = str_replace("|".$id."|", "", $brotherBrothers);
				
				// si le chip en mouvement est avant le frere on peut !! reduire !! (verifier taille)
				if ($currentPosition<$brotherPosition) {
					echo "moving chip is before !";
					// si brotherSize (2) > brotherNumberBrothers (2)
					if ($brotherSize > $brotherNumberBrothers) $brotherPosition = $brotherPosition-1;
				}

				// brothersSize = 2    2
				// brothersNumber = 2   1
				if ($brotherSize > $brotherNumberBrothers) {
					// we can reduce the size
					$brotherSize = $brotherSize-1;
					echo "we can reduce!";
				}
				
				$brotherNumberBrothers = $brotherNumberBrothers-1;
				
				// UDPATE
				$sql = "UPDATE `agenda_".$userid."` set `brothers`='$brotherBrothers', `size`=$brotherSize, `number_brothers`=$brotherNumberBrothers, `position`=$brotherPosition WHERE ID=$brotherID";
				echo "CLEAR UPDATE 2".$sql."     ";
				$resultok = mysql_query($sql);

					
				$tok = strtok("||");
					
			}

				$sql = "UPDATE `agenda_".$userid."` set `brothers`='', `position`=1, `size`=1, `number_brothers`=0  WHERE ID=$id";
				echo "CLEAR UPDATE 3".$sql."     ";
				$resultok = mysql_query($sql);
				
		}
        //clear
			
        
		$top = mysql_real_escape_string($top);
    	$length = mysql_real_escape_string($length);

    	// CHECK THE CONCURENT
   		$sql ="select distinct ID, position, size from `agenda_".$userid."` where id!='".$id."' and date='$day' and midday='$midday' and (   (top >=".$top." and top + length <=".($top+$length).")  or  (top <".($top+$length)." and top + length >=".($top+$length).")  or  (top <=".$top." and top + length >".$top.") ) order by position";
    	echo "CHECK CONCURRENT ".$sql."     ";
    	$result = mysql_query($sql);

    	// next value for the current chip
    	$currentNextPosition = 0;
    	$currentNextSize = 0;
    	    	
    	// by default, the position and size off current chip will be :
    	$currentPosition = mysql_num_rows($result) + 1;
    	$findCurrentPosition = false;
    	$currentSize = mysql_num_rows($result) + 1;
    	echo "    currentPosition --->".$currentPosition;
    	echo "    currentSize --->".$currentSize;
    	echo "    findCurrentPosition --->".$findCurrentPosition;
    		    		
		if(mysql_num_rows($result)!=0) {
			
			$i = 0;
				
			while($data = mysql_fetch_assoc($result)) 	{
				
				// Value of the current brother
				$brotherId = $data['ID'];
				$brotherPosition = $data['position'];
				$brotherSize = $data['size'];
				
				// we store the possible next position
				$currentPosition = $brotherPosition + 1;
				
				$i ++;
				
				// check if we find a possible position for the current chip (the brothers could have a vacant position)
				if ($i < $brotherPosition && !($findCurrentPosition)) {
					$currentNextPosition = $i;
					$findCurrentPosition = true;
					echo "we find a vacant position";
				}
				
				
				// in each case, the number of brothers will grown
				
				// if the current size is bigger or equal the current size, it will not be augmented (1 3) (1 2)
				if ($brotherSize<$currentSize){
						
					$sql = "UPDATE `agenda_".$userid."` set `brothers`=concat(`brothers`,'|".$id."|'), `number_brothers`=`number_brothers`+1, `size`=`size`+1  WHERE ID=$brotherId";
					echo "UPDATE CONCURRENT (+size) ".$sql."     ";
	    			$result2 = mysql_query($sql);
	    			
	    			if ($currentNextSize < ($brotherSize+1)) {
	    				echo "dddd";
	    				$currentNextSize = $brotherSize+1;
	    				echo " currentNextSize ".$currentNextSize;
	    			} else {
	    				echo " curentNextSize unchanged";
	    			}
					
				} else {
						
					$sql = "UPDATE `agenda_".$userid."` set `brothers`=concat(`brothers`,'|".$id."|'), `number_brothers`=`number_brothers`+1  WHERE ID=$brotherId";
					echo "UPDATE CONCURRENT (equal size) ".$sql."     ";
	    			$result2 = mysql_query($sql);

	    			if ($currentNextSize < $brotherSize) {
	    				echo "dddd";
	    				$currentNextSize = $brotherSize;
	    				echo " currentNextSize ".$currentNextSize;
	    			} else {
	    				echo " curentNextSize unchanged";
	    			}
	    							
				}
				
				echo " currentNextSize ".$currentNextSize;
				

				$sql = "UPDATE `agenda_".$userid."` set `brothers`=concat(`brothers`,'|".$brotherId."|'), `number_brothers`=`number_brothers`+1 WHERE ID=$id";
				echo "UPDATE CURRENT ".$sql."     ";
				$result3 = mysql_query($sql);

			}
			
			echo " currentNextSize ".$currentNextSize;
			echo " currentNextPosition ".$currentNextPosition;
			// if we find a position, we use it if not, we use the default one (a the botton)
			if (!$findCurrentPosition) {
				$currentNextPosition = $currentPosition;
			} else {
				// if we don find a place we take the max positio + 1
			}
			echo " currentNextPosition ".$currentNextPosition;
						

			$sql = "UPDATE `agenda_".$userid."` set `size`=$currentNextSize, `position`=$currentNextPosition WHERE ID=$id";
	    	echo "UPDATE CURRENT ".$sql."     ";
	   		$result3 = mysql_query($sql);
				
		}
		
		
        $userid = mysql_real_escape_string($userid);
        
        $midday = mysql_real_escape_string($midday);
    	
    	$start = mysql_real_escape_string($start);
    	
    	$end = mysql_real_escape_string($end);

    	$sql = "UPDATE `agenda_".$userid."` set `midday`='$midday', `top`='$top' ,`length`='$length', `start`='$start' ,`end`='$end' WHERE ID='$id'";
        $upd1 = mysql_query($sql);
		
		// CORRECT SOME COMMON ERROR
		$sql = "UPDATE `agenda_".$userid."` set `position` = 1, `size` = 1, `number_brothers` = 0 WHERE date='$day' and brothers=''";
		$upd2 = mysql_query($sql);
		
	    if ($upd1) {
            return true;
        } else {
            return false;
        }
       
    }
    
    function getAgendaDay($id,$day,$topMin,$topMax,$pixelPerSlot,$minutePerSlot) {
    	
    	$pixelPerMinute = $pixelPerSlot/$minutePerSlot;
    	
		$sql = "SELECT * 
				FROM `agenda_".$id."` 
				WHERE `date`='$day' 
				AND `top`>='$topMin' 
				AND `top`<='$topMax' 
				ORDER BY top, position";
        
       	$sel = mysql_query($sql);

        $agendas = array();
        
        while ($agenda = mysql_fetch_array($sel)) {
        	
            $agenda["ID"] = stripslashes($agenda["ID"]);
            
            $agenda["top"] = $pixelPerMinute * ($agenda["top"] - $topMin);
            $agenda["length"] = $pixelPerMinute * $agenda["length"];
            
            $agenda["start"] = stripslashes($agenda["start"]);
            $agenda["end"] = stripslashes($agenda["end"]);
            $agenda["position"] = stripslashes($agenda["position"]);
            $agenda["brothers"] = stripslashes($agenda["brothers"]);
            $agenda["size"] = stripslashes($agenda["size"]);
            $agenda["color1"] = stripslashes($agenda["color1"]);
            $agenda["color2"] = stripslashes($agenda["color2"]);
            $agenda["patient"] = stripslashes($agenda["patient"]);
            $agenda["patient_ID"] = stripslashes($agenda["patient_ID"]);
            $agenda["tarification_ID"] = stripslashes($agenda["tarification_ID"]);
            $agenda["motif"] = stripslashes($agenda["motif"]);
            $agenda["motif_ID"] = stripslashes($agenda["motif_ID"]);
            $agenda["location"] = stripslashes($agenda["location"]);
            $agenda["comment"] = stripslashes($agenda["comment"]);
            $agenda["date"] = stripslashes($agenda["date"]);
            
            // current time
            
            // agenda time
            
            // switch tarifcation_ID and time
            
            if ($agenda["position"]==1 && $agenda["size"]==1) {
	            $agenda["size"] = "99";
    	        $agenda["left"] = "0";
            }

            if ($agenda["position"]==1 && $agenda["size"]=="2") {
	            $agenda["size"] = "49.5";
    	        $agenda["left"] = "0";
            }

            if ($agenda["position"]==2 && $agenda["size"]=="2") {
	            $agenda["size"] = "49.5";
    	        $agenda["left"] = "49.5";
            }

            if ($agenda["position"]==1 && $agenda["size"]=="3") {
	            $agenda["size"] = "33";
    	        $agenda["left"] = "0";
            }

            if ($agenda["position"]==2 && $agenda["size"]=="3") {
	            $agenda["size"] = "33";
    	        $agenda["left"] = "33";
            }
            
            if ($agenda["position"]==3 && $agenda["size"]=="3") {
	            $agenda["size"] = "33";
    	        $agenda["left"] = "66";
            }
            
            if ($agenda["position"]==1 && $agenda["size"]=="4") {
	            $agenda["size"] = "24.75";
    	        $agenda["left"] = "0";
            }

            if ($agenda["position"]==2 && $agenda["size"]=="4") {
	            $agenda["size"] = "24.75";
    	        $agenda["left"] = "24.75";
            }
            
            if ($agenda["position"]==3 && $agenda["size"]=="4") {
	            $agenda["size"] = "24.75";
    	        $agenda["left"] = "49.5";
            }
            
            if ($agenda["position"]==4 && $agenda["size"]=="4") {
	            $agenda["size"] = "24.75";
    	        $agenda["left"] = "74.25";
            }

            if ($agenda["position"]==1 && $agenda["size"]=="5") {
	            $agenda["size"] = "19.75";
    	        $agenda["left"] = "0";
            }

            if ($agenda["position"]==2 && $agenda["size"]=="5") {
	            $agenda["size"] = "19.75";
    	        $agenda["left"] = "19.75";
            }
            
            if ($agenda["position"]==3 && $agenda["size"]=="5") {
	            $agenda["size"] = "19.75";
    	        $agenda["left"] = "39.5";
            }
            
            if ($agenda["position"]==4 && $agenda["size"]=="5") {
	            $agenda["size"] = "19.75";
    	        $agenda["left"] = "59.25";
            }

            if ($agenda["position"]==5 && $agenda["size"]=="5") {
	            $agenda["size"] = "19.75";
    	        $agenda["left"] = "79";
            }
            
            array_push($agendas, $agenda);
        }

        if (!empty($agendas)) {	
            return $agendas;
        }
        else {
            return false;
        }

    }

	function getAgendaDayResume($id,$size) {
    	
    	$sessionDate = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
	
        $sql = "SELECT * FROM `agenda_".$id."` WHERE `date`='$sessionDate' order by top, position";
        $sel = mysql_query($sql);
        
        $agendas = array();
        
        while ($agenda = mysql_fetch_array($sel)) {
        	$agenda["top"] = round(($agenda["top"]/6048)*$size);
        	$agenda["length"] = round(($agenda["length"]/6048)*$size);
        	array_push($agendas, $agenda);
		}

        if (!empty($agendas)) {	
            return $agendas;
        } else {
            return false;
        }

    }
    
	function getAgendaHour($id,$day,$topMin,$topMax,$pixelPerSlot,$minutePerSlot) {
    	
		$pixelPerSlot = $pixelPerSlot * 2;
		$minutePerSlot = $minutePerSlot * 2;
		
		if ($day == 7) $day = 0;
		
        $sql = "SELECT ID, top, hour, `color_".$day."` AS color 
        		FROM `schedule_".$id."` 
        		WHERE `top` >= $topMin 
        		AND `top` <= $topMax 
        		AND (MOD(`top`,$minutePerSlot) = 0 OR `top` = '$topMin')
        		ORDER BY ID";
        		
        //echo $sql;
        //echo "<br/>".$pixelPerSlot;
        //echo "<br/>".$topMin % $pixelPerSlot;
        //echo "<br/>".$topMax % $pixelPerSlot;
        
        $sel = mysql_query($sql);
        
        $agendas = array();
        
        while ($agenda = mysql_fetch_array($sel)) {
        	$agenda["ID"] 		= $agenda["ID"];
        	$agenda["hour"] 	= $agenda["hour"];
        	$agenda["color"] 	= $agenda["color"];
        	$agenda["height"] 	= $pixelPerSlot;
        	array_push($agendas, $agenda);
		}
		
		if (sizeof($agendas)>0)
		$agendas[0]["height"] = $agendas[0]["height"] - ( $topMin % $pixelPerSlot );
		
		
        return $agendas;
        
    }
    
    function delete($userid,$id) {
    	
    	$sessionDate = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
    	
		$id = mysql_real_escape_string($id);
        
        //clear
   	    $sql ="select * from `agenda_".$userid."` where ID='".$id."'";
		$result = mysql_query($sql);
		$data = mysql_fetch_assoc($result);
		$currentBrothers = $data['brothers'];
		$currentPosition = $data['position'];
		$currentSize = $data['size'];
		$currentNumberBrothers = $data['number_brothers'];
		
		if ($currentBrothers!=''){
				
			$tok = strtok($currentBrothers,"||");
				
			// FOR EACH BROTHERS
			while ($tok !== false) {
					
				//brotherID
				$brotherID = $tok;
					
				//brotherBrothers
				$sql = "select * from `agenda_".$userid."` WHERE ID=$brotherID";
				$result1 = mysql_query($sql);
				$data1 = mysql_fetch_assoc($result1);
				
				$brotherBrothers = $data1['brothers'];
				$brotherSize = $data1['size'];
				$brotherNumberBrothers = $data1['number_brothers'];
				$brotherPosition = $data1['position'];
				
				// remove moving chip from current brothers
				$brotherBrothers = str_replace("|".$id."|", "", $brotherBrothers);
				
				// si le chip en mouvement est avant le frere on peut !! reduire !! (verifier taille)
				if ($currentPosition<$brotherPosition) {
					// si brotherSize (2) > brotherNumberBrothers (2)
					if ($brotherSize > $brotherNumberBrothers) $brotherPosition = $brotherPosition-1;
				}

				// brothersSize = 2    2
				// brothersNumber = 2   1
				if ($brotherSize > $brotherNumberBrothers) {
					// we can reduce the size
					$brotherSize = $brotherSize-1;
				}
				
				$brotherNumberBrothers = $brotherNumberBrothers-1;
				
				// UDPATE
				$sql = "UPDATE `agenda_".$userid."` set `brothers`='$brotherBrothers', `size`=$brotherSize, `number_brothers`=$brotherNumberBrothers, `position`=$brotherPosition WHERE ID=$brotherID";
				$resultok = mysql_query($sql);

				$tok = strtok("||");
					
			}

				$sql = "UPDATE `agenda_".$userid."` set `brothers`='', `position`=1, `size`=1, `number_brothers`=0  WHERE ID=$id";
				$resultok = mysql_query($sql);
				
		}
        //clear
			
		// CORRECT SOME COMMON ERROR
		$sql = "UPDATE `agenda_".$userid."` set `position` = 1, `size` = 1, `number_brothers` = 0 WHERE date='$sessionDate' and brothers=''";
		$upd = mysql_query($sql);
       
		// DELETE
		$sql = "DELETE FROM `agenda_".$userid."` WHERE ID = $id";
		$del = mysql_query($sql);
		
		if ($del) {
            return true;
        } else {
            return false;
        }
    
    }
    
    function getList($id){
    	
    	$sessionDate = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
	
        $sql = "SELECT * FROM `agenda_".$id."` where date='$sessionDate' order by top, position";
        
        $sel = mysql_query($sql);

        $agendas = array();
                
        while ($agenda = mysql_fetch_array($sel))
        {
            $agenda["ID"] = stripslashes($agenda["ID"]);
            $agenda["start"] = stripslashes($agenda["start"]);
            $agenda["end"] = stripslashes($agenda["end"]);
            $agenda["length"] = stripslashes($agenda["length"]);
            
            array_push($agendas, $agenda);
        }

        if (!empty($agendas))
        {	
            return $agendas;
        }
        else
        {
            return false;
        }

    }
    
	function checkIfExist($id){
    	
        $sql = "SELECT * FROM `agenda_".$id."`";
         
        $sel = mysql_query($sql);
        
        if ($sel) {	
            return true;
        } else {
            return false;
        }

    }
    
    
	function getTimeLine($id)
    {
    	
    	$sessionDate = isset($_SESSION['user_agenda_date']) ? $_SESSION['user_agenda_date'] : date("Y-m-d");
	
        $_xml = "<data>";
    	
        $sql = "SELECT * FROM `agenda_".$id."` order by date";
        
        $sel = mysql_query($sql);

        while ($agenda = mysql_fetch_array($sel))
        {

        	$date= stripslashes($agenda["date"]);
        	
        	$tok = strtok($date,"-");
			$this->Year = $tok;
			$tok = strtok("-");
			$this->Month = $tok;
			$tok = strtok("-");
			$this->Day = $tok;
		
			setlocale(LC_TIME, en);
			$date = $this->Month."/".$this->Day."/".$this->Year;
			
			$day =  strftime('%d',strtotime($date));
			$month =  strftime('%b',strtotime($date));
			$year =  strftime('%Y',strtotime($date));
			
			$start = stripslashes($agenda["start"]);
            if (strlen($start)<5) $start ="0".$start;
            $start = str_replace("H", ":", $start);
            
            $end = stripslashes($agenda["end"]);
            if (strlen($end)<5) $end ="0".$end;
            $end = str_replace("H", ":", $end);
            
            $patient = stripslashes($agenda["patient"]);
            $patientID = stripslashes($agenda["patient_ID"]);
            $motif = stripslashes($agenda["motif"]);
            $motifID = stripslashes($agenda["motif_ID"]);
            $comment = stripslashes($agenda["comment"]);
            $location = stripslashes($agenda["location"]);
            $color1 = stripslashes($agenda["color1"]);
            
			$_xml .= "<event start=\"$month $day $year $start:00\" end=\"$month $day $year $end:00\" isDuration=\"true\" color=\"$color1\" title=\"$patient\" image=\"\">";
			$_xml .= "$location";
			$_xml .= "$motif";
			$_xml .= "$comment";
			$_xml .= "</event>";
			
        }
        
		$_xml .= "</data>";
        
		header ("Content-type: text/xml");

		echo "$_xml";
		

    }

	 /* Make a autocomplete
     *
     * @param value
     * @return array
     */
    function detail($userid, $id) {
    
	    $sql = "SELECT * FROM `agenda_$userid` WHERE ID = $id";

	    $result = mysql_query($sql);
	
		if(mysql_num_rows($result)==1) {
		
			$data = mysql_fetch_assoc($result);
			$agendaID = $data['ID'];
			$agendaStart = $data['start'];
			$agendaEnd = $data['end'];
			$agendaLength = (int)($data['length']/16)*5;
			$agendaPatient = $data['patient'];
			$agendaMotif = $data['motif'];
			$agendaLocation = $data['location'];
			$agendaComment = $data['comment'];

			$agendaPatientID = (int) $data['patient_ID'];
			$agendaMotifID = (int) $data['motif_ID'];
			
			if ($agendaPatientID>0) {

				$sql = "SELECT * FROM `patients` WHERE id = $agendaPatientID";
				$result = mysql_query($sql);
				$data = mysql_fetch_assoc($result);
				if(mysql_num_rows($result)==1) {
			    	$patientAddresse = $data['rue']." ".$data['code_postal']." ".$data['commune'];
			    	$patientAddresse;
			    }
				
			}
						
			if ($agendaMotifID>0) {
				
				$sql = "SELECT * FROM `actes` WHERE id = $agendaMotifID";
				$result = mysql_query($sql);
				$data = mysql_fetch_assoc($result);
			    if(mysql_num_rows($result)==1) {
			    	$motifDescription = $data['description'];
			    }
			    
			}
			
			
		
		}
	
		$reponse['ID'] = $agendaID;
		$reponse['start'] = utf8_encode($agendaStart);
		$reponse['end'] = utf8_encode($agendaEnd);
		$reponse['length'] = utf8_encode($agendaLength);
		$reponse['patient'] = utf8_encode($agendaPatient);
		$reponse['motif'] = utf8_encode($agendaMotif);
		$reponse['location'] = utf8_encode($agendaLocation);
		$reponse['comment'] = utf8_encode($agendaComment);
				
		$reponse['patient_id'] = utf8_encode($agendaPatientID);
		$reponse['patient_addresse'] = utf8_encode($patientAddresse);
		
		$reponse['motif_id'] = utf8_encode($agendaMotifID);
		$reponse['motif_description'] = utf8_encode($motifDescription);
		
		header('Content-Type: application/json');
		echo json_encode($reponse);

    }
    
    function getLogInfo($userid, $id) {

    	$userid = (int) $userid;
    	$id = (int) $id;
    	
    	$sql = "SELECT concat(`patient`,' - ',date_format(date, '%d/%m/%Y')) FROM `agenda_$userid` WHERE ID = $id";
    	echo $sql;
    	
        $sel = mysql_query($sql);
        echo $sel;
        
        $profile = mysql_fetch_row($sel);
        $profile = $profile[0];
        
        if (!empty($profile)) {
            return $profile;
        } else {
            return false;
        }
    }
    
    function changeScheduleColor($userid, $day, $hours, $color) {

    	$userid = mysql_real_escape_string($userid);
    	$day = mysql_real_escape_string($day);
    	$ids = mysql_real_escape_string($ids);
    	$color = mysql_real_escape_string($color);
    	
    	$userid = (int) $userid;
    	$day = (int) $day;

    	if ($day == 7) $day = 0;
    	
    	$sql = "UPDATE `schedule_$userid` SET `color` = '$color' WHERE `hour` in ($hours) AND `day` = $day";
    	echo $sql;
    	
        $udp = mysql_query($sql);
        if ($udp) {
            return true;
        } else {
            return false;
    	}
	}
    
    function init_agenda($userid) {

    	$sql = "CREATE TABLE IF NOT EXISTS  `agenda_$userid` ( 
    	`ID` int(11) NOT NULL auto_increment,
  		`type` varchar(32) NOT NULL,
  		`start_date` int(11) NOT NULL,
  		`end_date` int(11) NOT NULL,
  		`color1` varchar(7) NOT NULL,
  		`color2` varchar(7) NOT NULL,
  		`patient` varchar(32) NOT NULL,
  		`patient_ID` int(11) NOT NULL default '0',
  		`motif` varchar(32) NOT NULL,
  		`motif_ID` int(11) NOT NULL default '0',
  		`location` varchar(32) NOT NULL,
  		`comment` varchar(256) NOT NULL,
  		PRIMARY KEY  (`ID`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1";
    	
        $init = mysql_query($sql);
        
        if ($init) {
            return true;
        } else {
            return false;
    	}
	}
    
    
}

?>