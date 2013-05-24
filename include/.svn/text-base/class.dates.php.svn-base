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
class dates
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

    function getTimelineDate($date, $nbr) {
    	
   		$tok = strtok($date,"-");
		$this->Year = $tok;
		$tok = strtok("-");
		$this->Month = $tok;
		$tok = strtok("-");
		$this->Day = $tok;
		
		$date =  date("Y-m-d", mktime(0, 0, 0, $this->Month, $this->Day + $nbr, $this->Year)); 

		$tok = strtok($date,"-");
		$this->Year = $tok;
		$tok = strtok("-");
		$this->Month = $tok;
		$tok = strtok("-");
		$this->Day = $tok;
		
		
		//Nov 21 2008 06:00:00 GMT
		
		setlocale(LC_TIME, en);
		$date = $this->Month."/".$this->Day."/".$this->Year;
		
		$day =  strftime('%d',strtotime($date));
		$month =  strftime('%b',strtotime($date));
		$year =  strftime('%Y',strtotime($date));
		
		return $month." ".$day." ".$year;
		
	}
	
	function operationDate($date, $nbrday, $nbrmonth, $nbryear) {
    	
   		$year = strtok($date,"-");
		$month = strtok("-");
		$day = strtok("-");
		
		return $date =  date("Y-m-d", mktime(0, 0, 0, $month + $nbrmonth, $day + $nbrday, $year + $nbryear)); 
		
	}
	
	
	function getWeek($date){

		$year = strtok($date,"-");
		$month = strtok("-");
		$day = strtok("-");
		$daysOfWeek = array();
		
	    $loop_start = $day-(date('N', mktime(0, 0, 0, $month, $day, $year))-1);//lets start loop from first day of week
	    $loop_end = $day+(7-(date('N', mktime(0, 0, 0, $month, $day, $year))));//lets end loop to last day of week
	
	    $y = 1;
	    for($i = $loop_start; $i<=$loop_end; $i++){
	    	$daysOfWeek[$y] = date('Y-m-d', mktime(0, 0, 0, $month, $i, $year));
			$y++;
	    }
	   
	    return $daysOfWeek;
	    
	}

	
	function date_format_be2us($date){
	    list ($day , $month , $year) = split("[-./]",$date);
	    return($year."-".$month."-".$day);
	} 

}

?>