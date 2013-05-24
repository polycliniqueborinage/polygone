<?php
/**
 * This class provides methods to realize milestones
 *
 * @author Open Dynamics <info@o-dyn.de>
 * @name milestone
 * @package Collabtive
 * @version 0.4.5
 * @link http://www.o-dyn.de
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License v3 or later
 * @global $mylog
 */
class milestone
{
    private $mylog;

    /**
     * Constructor
     * Initialize the event log
     */
    function __construct()
    {
        $this->mylog = new mylog;
    }

    /**
     * Add a milestone
     *
     * @param int $project ID of the associated project
     * @param string $name Name of the milestone
     * @param string $desc Description
     * @param string $end Day the milestone is due
     * @param int $status Status (0 = finished, 1 = open)
     * @return bool
     */
    function add($project, $name, $desc, $end, $status)
    {
        $project = (int) $project;
        $name = mysql_real_escape_string($name);
        $desc = mysql_real_escape_string($desc);
        $start = time();
        $end = strtotime($end);
        $status = (int) $status;

        $ins = mysql_query("INSERT INTO milestones (`project`,`name`,`desc`,`start`,`end`,`status`) VALUES ($project,'$name','$desc','$start','$end',$status)");

        if ($ins)
        {
        	$insid = mysql_insert_id();
            $this->mylog->add($name, 'milestone' , 1, $project);
            return $insid;
        }
        else
        {
            return false;
        }
    }

    /**
     * Edit a milestone
     *
     * @param int $id Milestone ID
     * @param string $name Name
     * @param string $desc Description
     * @param string $end Day it is due
     * @return bool
     */
    function edit($id, $name, $desc, $end)
    {
        $id = (int) $id;
        $name = mysql_real_escape_string($name);
        $desc = mysql_real_escape_string($desc);
        $end = strtotime($end);

        $upd = mysql_query("UPDATE milestones SET `name`='$name', `desc`='$desc', `end`='$end' WHERE ID=$id");
        if ($upd)
        {
            $nam = mysql_query("SELECT project,name FROM milestones WHERE ID = $id");
            $nam = mysql_fetch_row($nam);
            $project = $nam[0];
            $name = $nam[1];

            $this->mylog->add($name, 'milestone' , 2, $project);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Delete a milestone
     *
     * @param int $id Milestone ID
     * @return bool
     */
    function del($id)
    {
        $id = (int) $id;

        $nam = mysql_query("SELECT project,name FROM milestones WHERE ID = $id");
        $del = mysql_query("DELETE FROM milestones WHERE ID = $id");
        $del1 = mysql_query("DELETE FROM milestones_assigned WHERE milestone = $id");
        if ($del)
        {
            $nam = mysql_fetch_row($nam);
            $project = $nam[0];
            $name = $nam[1];

            $this->mylog->add($name, 'milestone', 3, $project);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Mark a milestone as open / active
     *
     * @param int $id Milestone ID
     * @return bool
     */
    function open($id)
    {
        $id = (int) $id;

        $upd = mysql_query("UPDATE milestones SET status = 1 WHERE ID = $id");

        if ($upd)
        {
            $nam = mysql_query("SELECT project,name FROM milestones WHERE ID = $id");
            $nam = mysql_fetch_row($nam);
            $project = $nam[0];
            $name = $nam[1];

            $this->mylog->add($name, 'milestone', 4, $project);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Marka milestone as finished
     *
     * @param int $id Milestone ID
     * @return bool
     */
    function close($id)
    {
        $id = (int) $id;

        $upd = mysql_query("UPDATE milestones SET status = 0 WHERE ID = $id");
        $tasklists = $this->getMilestoneTasklists($id);
        if (!empty($tasklists))
        {
            foreach ($tasklists as $tasklist)
            {
                $tl = new tasklist();
                $tasks = $tl->getTasksFromList($tasklist[ID]);
                foreach ($tasks as $task)
                {
                    $close_task = mysql_query("UPDATE tasks SET status = 0 WHERE ID = $task[ID]");
                }
                $close_tasklist = mysql_query("UPDATE tasklist SET status = 0 WHERE ID = $tasklist[ID]");
            }
        }

        if ($upd)
        {
            $nam = mysql_query("SELECT project,name FROM milestones WHERE ID = $id");
            $nam = mysql_fetch_row($nam);
            $project = $nam[0];
            $name = $nam[1];

            $this->mylog->add($name, 'milestone', 5, $project);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Assign a milestone to a user
     *
     * @param int $milestone Milestone ID
     * @param int $user User ID
     * @return bool
     */
    function assign($milestone, $user)
    {
        $milestone = (int) $milestone;
        $user = (int) $user;

        $upd = mysql_query("INSERT INTO milestones_assigned ('',$user,$milestone)");
        if ($upd)
        {
            $nam = mysql_query("SELECT project,name FROM milestones WHERE ID = $id");
            $nam = mysql_fetch_row($nam);
            $project = $nam[0];
            $name = $nam[1];

            $this->mylog->add($name, 'milestone', 6, $project);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Delete the assignment of a milestone to a given user
     *
     * @param int $milestone Milestone ID
     * @param int $user User ID
     * @return bool
     */
    function deassign($milestone, $user)
    {
        $milestone = (int) $milestone;
        $user = (int) $user;

        $upd = mysql_query("DELETE FROM milestones_assigned WHERE user = $user AND milestone = $milestone");
        if ($upd)
        {
            $nam = mysql_query("SELECT project,name FROM milestones WHERE ID = $id");
            $nam = mysql_fetch_row($nam);
            $project = $nam[0];
            $name = $nam[1];

            $this->mylog->add($name, 'milestone', 7, $project);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Return the latest milestones
     *
     * @param int $status Status (0 = finished, 1 = open)
     * @param int $num Number of milestones to return
     * @return array $milestones Details of the milestones
     */
    function getMilestones($status = 1, $num = 10)
    {
        $status = (int) $status;
        $num = (int) $num;

        $milestones = array();

        $sel = mysql_query("SELECT * FROM milestones WHERE `status`=$status LIMIT $num");

        while ($milestone = mysql_fetch_array($sel))
        {
            $fend = $datetime = date("d.m.Y", $milestone["end"]);
            $tasks = $this->getMilestoneTasklists($milestone["ID"]);
            $milestone["tasks"] = $tasks;
            $milestone["fend"] = $fend;
            $milestone["daysleft"] = $this->getDaysLeft($milestone["end"]);
            $milestone["name"] = stripslashes($milestone["name"]);
            $milestone["desc"] = stripslashes($milestone["desc"]);
            array_push($milestones, $milestone);
        }

        if (!empty($milestones))
        {
            return $milestones;
        }
        else
        {
            return false;
        }
    }

    /**
     * Return all finished milestones of a given project
     *
     * @param int $project Project ID
     * @return array $stones Details of the milestones
     */
    function getDoneProjectMilestones($project)
    {
        $project = (int) $project;

        $sel = mysql_query("SELECT * FROM milestones WHERE project = $project AND status = 0 ORDER BY ID ASC");
        $stones = array();

        while ($milestone = mysql_fetch_array($sel))
        {
            $milestone["name"] = stripslashes($milestone["name"]);
            $milestone["desc"] = stripslashes($milestone["desc"]);
            array_push($stones, $milestone);
        }

        if (!empty($stones))
        {
            return $stones;
        }
        else
        {
            return false;
        }
    }

    /**
     * Return all milestones of a given project
     *
     * @param int $project Project ID
     * @param int $lim Number of milestones to return
     * @return array $milestones Dateils of the late milestones
     */
    function getLateProjectMilestones($project, $lim = 5)
    {
        $project = (int) $project;
        $lim = (int) $lim;

        $tod = date("d.m.Y");
        $now = strtotime($tod);
        $milestones = array();

        $sql = "SELECT * FROM milestones WHERE project = $project AND end < $now AND status = 1 ORDER BY end ASC LIMIT $lim";

        $sel1 = mysql_query($sql);
        while ($milestone = mysql_fetch_array($sel1))
        {
            if (!empty($milestone))
            {
                $fend = $datetime = date("d.m.Y", $milestone["end"]);
                $tasks = $this->getMilestoneTasklists($milestone["ID"]);
                if (!empty($tasks))
                {
                    $milestone["tasks"] = $tasks;
                    $milestone["tasknum"] = count($tasks);
                }
                $milestone["fend"] = $fend;
                $psel = mysql_query("SELECT name FROM projekte WHERE ID = $milestone[project]");
                $pname = mysql_fetch_row($psel);
                $pname = $pname[0];
                $milestone["pname"] = $pname;
                $dayslate = $this->getDaysLeft($milestone["end"]);
                $dayslate = str_replace("-", "" , $dayslate);
                $milestone["dayslate"] = $dayslate;

                $milestone["pname"] = stripslashes($milestone["pname"]);
                $milestone["name"] = stripslashes($milestone["name"]);
                $milestone["desc"] = stripslashes($milestone["desc"]);

                if (!empty($milestone))
                {
                    array_push($milestones, $milestone);
                }
            }
        }

        if (!empty($milestones))
        {
            return $milestones;
        }
        else
        {
            return false;
        }
    }

    /**
     * Return all open milestones of a given project
     *
     * @param int $project Project ID
     * @param int $lim Number of milestones to return
     * @return array $milestones Details of the open milestones
     */
    function getAllProjectMilestones($project, $lim = 10)
    {
        $project = (int) $project;
        $lim = (int) $lim;

        $tod = date("d.m.Y");
        $now = strtotime($tod);
        $milestones = array();
        $sql = "SELECT * FROM milestones WHERE project = $project AND status = 1 ORDER BY end ASC LIMIT $lim";

        $sel1 = mysql_query($sql);
        while ($milestone = mysql_fetch_array($sel1))
        {
            if (!empty($milestone))
            {
                $fend = $datetime = date("d.m.y", $milestone["end"]);
                $tasks = $this->getMilestoneTasklists($milestone["ID"]);
                if (!empty($tasks))
                {
                    $milestone["tasks"] = $tasks;
                    $milestone["tasknum"] = count($tasks);
                }
                $milestone["fend"] = $fend;
                $psel = mysql_query("SELECT name FROM projekte WHERE ID = $milestone[project]");
                $pname = mysql_fetch_row($psel);
                $pname = $pname[0];
                $milestone["pname"] = $pname;
                $dayslate = $this->getDaysLeft($milestone["end"]);
                $milestone["daysleft"] = $dayslate;

                $milestone["pname"] = stripslashes($milestone["pname"]);
                $milestone["name"] = stripslashes($milestone["name"]);
                $milestone["desc"] = stripslashes($milestone["desc"]);

                if (!empty($milestone))
                {
                    array_push($milestones, $milestone);
                }
            }
        }

        if (!empty($milestones))
        {
            return $milestones;
        }
        else
        {
            return false;
        }
    }

    /**
     * Return all milestone of a given project, that are not late
     *
     * @param int $project Project ID
     * @param int $lim Number of milestones to return
     * @return array $milestones Details of the milestones
     */
    function getProjectMilestones($project, $lim = 5)
    {
        $project = (int) $project;
        $lim = (int) $lim;

        $now = time();
        $milestones = array();
        $sql = "SELECT * FROM milestones WHERE project = $project AND end > $now AND status = 1 ORDER BY end ASC LIMIT $lim";

        $sel1 = mysql_query($sql);
        while ($milestone = mysql_fetch_array($sel1))
        {
            $fend = $datetime = date("d.m.Y", $milestone["end"]);
            $tasks = $this->getMilestoneTasklists($milestone["ID"]);
            if (!empty($tasks))
            {
                $milestone["tasks"] = $tasks;
                $milestone["tasknum"] = count($tasks);
            }
            $milestone["fend"] = $fend;
            $psel = mysql_query("SELECT name FROM projekte WHERE ID = $milestone[project]");
            $pname = mysql_fetch_row($psel);
            $pname = $pname[0];
            $milestone["pname"] = $pname;
            $daysleft = $this->getDaysLeft($milestone["end"]);
            $daysleft = $daysleft + 1;
            $milestone["daysleft"] = $daysleft;

            $milestone["pname"] = stripslashes($milestone["pname"]);
            $milestone["name"] = stripslashes($milestone["name"]);
            $milestone["desc"] = stripslashes($milestone["desc"]);

	    $messages = $this->getMilestoneMessages($milestone["ID"]);
	    $milestone["messages"] = $messages;

            if (!empty($milestone))
            {
                array_push($milestones, $milestone);
            }
        }

        if (!empty($milestones))
        {
            return $milestones;
        }
        else
        {
            return false;
        }
    }

    /**
     * Return all milestones of a projects, that are due today
     *
     * @param int $project Project ID
     * @param int $lim Number of milestones to return
     * @return array $milestones Details of the milestones
     */
    function getTodayProjectMilestones($project, $lim = 5)
    {
        $project = (int) $project;
        $lim = (int) $lim;

        $tod = date("d.m.Y");
        $now = strtotime($tod);
        $milestones = array();

        $sql = "SELECT * FROM milestones WHERE project = $project AND end = '$now' AND status = 1 ORDER BY end ASC LIMIT $lim";

        $sel1 = mysql_query($sql);
        while ($milestone = mysql_fetch_array($sel1))
        {
            $fend = $datetime = date("d.m.y", $milestone["end"]);
            $tasks = $this->getMilestoneTasklists($milestone["ID"]);
            if (!empty($tasks))
            {
                $milestone["tasks"] = $tasks;
                $milestone["tasknum"] = count($tasks);
            }
            $milestone["fend"] = $fend;
            $psel = mysql_query("SELECT name FROM projekte WHERE ID = $milestone[project]");
            $pname = mysql_fetch_row($psel);
            $pname = $pname[0];
            $milestone["pname"] = $pname;
            $daysleft = $this->getDaysLeft($milestone["end"]);
            $daysleft = $daysleft + 1;
            $milestone["daysleft"] = $daysleft;

            $milestone["pname"] = stripslashes($milestone["pname"]);
            $milestone["name"] = stripslashes($milestone["name"]);
            $milestone["desc"] = stripslashes($milestone["desc"]);

	    $messages = $this->getMilestoneMessages($milestone["ID"]);
	    $milestone["messages"] = $messages;

            if (!empty($milestone))
            {
                array_push($milestones, $milestone);
            }
        }

        if (!empty($milestones))
        {
            return $milestones;
        }
        else
        {
            return false;
        }
    }

    /**
     * Return all open tasklists associated to a given milestones
     *
     * @param int $milestone Milestone ID
     * @return array $lists Details of the tasklists
     */
    private function getMilestoneTasklists($milestone)
    {
        $milestone = (int) $milestone;

        $sel = mysql_query("SELECT * FROM tasklist WHERE milestone = $milestone AND status = 1");
        $lists = array();
        if ($milestone)
        {
            while ($list = mysql_fetch_array($sel))
            {
                $list["name"] = stripslashes($list["name"]);
                $list["desc"] = stripslashes($list["desc"]);
                array_push($lists, $list);
            }
        }
        if (!empty($lists))
        {
            return $lists;
        }
        else
        {
            return false;
        }
    }

   private function getMilestoneMessages($milestone)
    {
	$milestone = (int) $milestone;
	$sel = mysql_query("SELECT ID,title FROM messages WHERE milestone = $milestone");
	$msgs = array();
	while($msg = mysql_fetch_array($sel))
	{
		array_push($msgs,$msg);
	}
	if(!empty($msgs))
	{
	    return $msgs;
	}
	
    }
    /**
     * Return a milestone with its tasklists
     *
     * @param int $id Milestone ID
     * @return array $milestone Milestone details
     */
    function getMilestone($id)
    {
        $id = (int) $id;

        $sel = mysql_query("SELECT * FROM milestones WHERE ID = $id");
        $milestone = mysql_fetch_array($sel);

        if (!empty($milestone))
        {
            $endstring = date("d.m.Y", $milestone["end"]);
            $milestone["endstring"] = $endstring;
            $startstring = date("d.m.Y", $milestone["start"]);
            $milestone["startstring"] = $startstring;
            $milestone["name"] = stripslashes($milestone["name"]);
            $milestone["desc"] = stripslashes($milestone["desc"]);

            $tasks = $this->getMilestoneTasklists($milestone["ID"]);
            $milestone["tasks"] = $tasks;
	    $messages = $this->getMilestoneMessages($milestone["ID"]);
	    $milestone["messages"] = $messages;

            return $milestone;
        }
        else
        {
            return false;
        }
    }

    /**
     * Return the days left from today until a given point in time
     *
     * @param int $end Point in time
     * @return int $days Days left
     */
    private function getDaysLeft($end)
    {
        $start = time();
        $diff = $end - $start;
        $days = floor($diff / 86400);
        return $days;
    }

    /**
     * Format a milestone's timestamp
     *
     * @param int $milestones Milestone ID
     * @param int $format Wanted time format
     * @return array $milestones Milestone with the formatted timestamp
     */
    function formatdate($milestones, $format = "d.m.y")
    {
        $cou = 0;

        if ($milestones)
        {
            foreach($milestones as $stone)
            {
                $datetime = date($format, $stone[5]);
                $milestones[$cou]["due"] = $datetime;
                $cou = $cou + 1;
            }
        }

        if (!empty($milestones))
        {
            return $milestones;
        }
        else
        {
            return false;
        }
    }
}

?>