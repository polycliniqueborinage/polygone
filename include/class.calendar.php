<?php
/**
 * Class to provide a calendar with additional data (tasks, milestones) as array
 *
 * @author Philipp Kiszka <info@o-dyn.de>
 * @name calendar
 * @package Collabtive
 * @version 0.4.9
 * @link http://www.o-dyn.de
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License v3 or later
 */
class calendar {

	private $daysInMonth;
	private $daysLastMonth;
	private $weeksInMonth;
	private $firstDay;
	private $month;
	private $year;
	private $userID;
	public $calendar;
	
	function __construct()
	{
		$this->calendar = array();
	}
	
	/**
     * Get the calendar array for a given month
     *
     * @param int $month Month without leading zero (e.g. 5 for march)
     * @param int $year Year in the format yyyy (e.g. 2008)
     * @return array
     */
	public function getCal($month, $year, $userID) {
		
		$this->month = $month;
		$this->year = $year;
		
		//get number of days in the given and the previous month
		$this->daysInMonth = date("t",mktime(0,0,0,$month,1,$year));
		$this->daysLastMonth = date("t",mktime(0,0,0,$month-1,1,$year));
		// get first day of the month
		$this->firstDay = date("w", mktime(0,0,0,$month,1,$year))-1;
		$tempDays = $this->firstDay + $this->daysInMonth;
		$this->weeksInMonth = ceil($tempDays/7);
		
		$this->userID = $userID;
		
		return $this->buildCal();
	}
	
	 /**
     * Private function to populate the array
     * @return array
     */
	private function buildCal() {
		$counter = 0;
		
		$a = new agenda();
		$ms = new milestone();
		$tsk = new task();
		
		for($j=0;$j<$this->weeksInMonth;$j++) {
			for($i=0;$i<7;$i++) {
				$counter++;
				$theday = $counter-$this->firstDay;
				//$theday = $theday - 1;
				
				if ($theday < 1) {	
					$this->calendar[$j][$i]["val"] = $this->daysLastMonth+$theday;
					$this->calendar[$j][$i]["currmonth"] = 0;
				}
				elseif($theday > $this->daysInMonth)
				{
					$this->calendar[$j][$i]["val"] = $theday-$this->daysInMonth;
					$this->calendar[$j][$i]["currmonth"] = 0;
				}
				else
				{
					$agendas = $a->getAgendaDay($this->userID,$this->year."-".$this->month."-".$theday);
					if ($agendas == false) $agendasnum = 0; else $agendasnum = 1; 
					$tasks = $tsk->getTaskDay($theday, $this->month, $this->year, $this->userID);
					$tasksnum = count($tasks);
					
					$this->calendar[$j][$i] = array(
												"date"=>$this->year."-".$this->month."-".$theday,
												"val"=>$theday,
												"agendas"=>$agendas,
												"agendasnum"=>$agendasnum,
												"milestones"=>$miles,
												"milesnum"=>$milesnum,
												"tasks"=>$tasks,
												"tasksnum"=>$tasksnum,
												"currmonth"=>1
												);
				}
			}
		}
	return $this;
	}
}
?>
