<?php
/**
 * Die Klasse stellt Methoden bereit um Projekte zu bearbeiten
 *
 * @author Open Dynamics <info@o-dyn.de>
 * @name project
 * @package Collabtive
 * @version 0.4.7
 * @link http://www.o-dyn.de
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License v3 or later
 */
class group
{
    private $mylog;

    /**
     * Konstruktor
     * Initialisiert den Eventlog
     */
    function __construct()
    {
        $this->mylog = new mylog;
    }

    /**
     * Add a group
     *
     * @param string $name Name des Projekts
     * @param string $desc Projektbeschreibung
     * @param string $end Date on which the project is due
     * @param int $assignme Assign yourself to the project
     * @return int $insid ID des neu angelegten Projekts
     */
    function add($name, $desc, $assignme)
    {
        $name = mysql_real_escape_string($name);
        $desc = mysql_real_escape_string($desc);
        $assignme = mysql_real_escape_string($assignme);
        $assignme = (int) $assignme;
        $sql = "INSERT INTO `group` (`name`, `desc`, `status`) VALUES ('$name','$desc', 1)";
        $ins1 = mysql_query($sql);
        // get current ID
        $insid = mysql_insert_id();
        if ($ins1) {
            mkdir(CL_ROOT . "/files/" . CL_CONFIG . "/$insid/", 0777);
            //$this->mylog->add($name, 'projekt', 1, $insid);
            return $insid;
        }  else {
            return false;
        }
    }

    /**
     * Bearbeitet ein Projekt
     *
     * @param int $id Eindeutige Projektnummer
     * @param string $name Name des Projekts
     * @param string $desc Beschreibungstext
     * @param string $end Date on which the project is due
     * @return bool
     */
    function edit($id, $name, $desc, $end)
    {
        $id = mysql_real_escape_string($id);
        $name = mysql_real_escape_string($name);
        $desc = mysql_real_escape_string($desc);
        $end = mysql_real_escape_string($end);
        $end = strtotime($end);
        $id = (int) $id;

        $upd = mysql_query("UPDATE group SET name='$name',`desc`='$desc',`end`='$end' WHERE ID = $id");

        if ($upd)
        {
            $this->mylog->add($name, 'projekt' , 2, $id);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Deletes a group
     *
     * @param int $id Project ID
     * @return bool
     */
    function delete($id)
    {
        $id = mysql_real_escape_string($id);
        $id = (int) $id;
        
        $del_groupassignments = mysql_query("DELETE FROM group_assigned WHERE group = $id");
        $del = mysql_query("DELETE FROM `group` WHERE ID = $id");
        delete_directory(CL_ROOT . "/files/" . CL_CONFIG . "/$id");

        if ($del) {
            $this->mylog->add($userid, 'group', 3, $id);
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Weist ein Projekt einem bestimmten Mitglied zu
     *
     * @param int $user Eindeutige Mitgliedsnummer
     * @param int $id Eindeutige Projektnummer
     * @return bool
     */
    function assign($user, $id)
    {
        $user = mysql_real_escape_string($user);
        $id = mysql_real_escape_string($id);
        $user = (int) $user;
        $id = (int) $id;
		$sql = "INSERT INTO `group_assigned` (`user`,`group`) VALUES ($user,$id)";
		echo $sql;
        $ins = mysql_query($sql);
        if ($ins) {
            return true;
        }  else {
            return false;
        }
    }

    /**
     * Entfernt ein Projekt aus der Zuweisung an ein bestimmtes Mitglied
     *
     * @param int $user Eindeutige Mitgliedsnummer
     * @param int $id Eindeutige Projektnummer
     * @return bool
     */
    function deassign($user, $id)
    {
    	echo "kj"; 
        $user = mysql_real_escape_string($user);
        $id = mysql_real_escape_string($id);
        $user = (int) $user;
        $id = (int) $id;

        $sql = "DELETE FROM group_assigned WHERE `user` = $user AND `group` = $id";
        echo $sql;
        $del = mysql_query($sql);
        if ($del) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Gibt alle Daten eines Projekts aus
     *
     * @param int $id Eindeutige Projektnummer
     * @param int $status
     * @return array $project Projektdaten
     */
    function getGroup($id)
    {
        $id = mysql_real_escape_string($id);
        $id = (int) $id;

        $sel = mysql_query("SELECT * FROM `group` WHERE ID = $id");
        $project = mysql_fetch_array($sel);

        if (!empty($project))
        {
            if ($project["end"])
            {
                $daysleft = $this->getDaysLeft($project["end"]);
                $project["daysleft"] = $daysleft;
                $endstring = date("d.m.Y", $project["end"]);
                $project["endstring"] = $endstring;
            }

            $startstring = date("d.m.Y", $project["start"]);
            $project["startstring"] = $startstring;

            $project["name"] = stripslashes($project["name"]);
            $project["desc"] = stripslashes($project["desc"]);

            return $project;
        }
        else
        {
            return false;
        }
    }

    /**
     * Listet die aktuellsten group auf
     *
     * @param int $status Bearbeitungsstatus der group (1 = offenes Projekt)
     * @param int $lim Anzahl der anzuzeigenden group
     * @return array $group Active group
     */
    function getGroups($status = 1, $lim = 10)
    {
        $status = mysql_real_escape_string($status);
        $lim = mysql_real_escape_string($lim);
        $status = (int) $status;
        $lim = (int) $lim;

        $group = array();
        $sql = "SELECT * FROM `group` WHERE `status`=$status ORDER BY `name` LIMIT $lim";
        $sel = mysql_query($sql);
        
        while ($ogroup = mysql_fetch_array($sel)) {
            $ogroup["name"] = stripslashes($ogroup["name"]);
            $ogroup["desc"] = stripslashes($ogroup["desc"]);
            array_push($group, $ogroup);
        }

        if (!empty($group)) {
            return $group;
        }
        else
        {
            return false;
        }
    }

    /**
     * Listet alle einem Mitglied zugewiesenen group auf
     *
     * @param int $user Eindeutige Mitgliedsnummer
     * @param int $status Bearbeitungsstatus von groupn (1 = offenes Projekt)
     * @return array $mygroup group des Mitglieds
     */
    function getMyGroups($user, $status = 1)
    {
        $user = mysql_real_escape_string($user);
        $status = mysql_real_escape_string($status);
        $user = (int) $user;
        $status = (int) $status;

        $mygroup = array();
        $sel = mysql_query("SELECT projekt FROM group_assigned WHERE user = $user ORDER BY ID ASC");

        while ($projs = mysql_fetch_row($sel))
        {
            $projekt = mysql_fetch_array(mysql_query("SELECT * FROM group WHERE ID = $projs[0] AND status=$status"));
            if ($projekt)
            {
                if ($projekt["end"])
                {
                    $daysleft = $this->getDaysLeft($projekt["end"]);
                    $projekt["daysleft"] = $daysleft;
                    $endstring = date("d.m.Y", $projekt["end"]);
                    $projekt["endstring"] = $endstring;
                }
                $startstring = date("d.m.Y", $projekt["start"]);
                $projekt["startstring"] = $startstring;

                $projekt["name"] = stripslashes($projekt["name"]);
                $projekt["desc"] = stripslashes($projekt["desc"]);
                array_push($mygroup, $projekt);
            }
        }

        if (!empty($mygroup))
        {
            return $mygroup;
        }
        else
        {
            return false;
        }
    }

    /**
     * Listet alle IDs der group eines Mitglieds auf
     *
     * @param int $user Eindeutige Mitgliedsnummer
     * @return array $mygroup Projekt-Nummern
     */
    function getMyGroupIds($user)
    {
        $user = mysql_real_escape_string($user);
        $user = (int) $user;

        $mygroup = array();
        $sel = mysql_query("SELECT projekt FROM group_assigned WHERE user = $user ORDER BY end ASC");
        if ($sel)
        {
            while ($projs = mysql_fetch_row($sel))
            {
                $sel2 = mysql_query("SELECT ID FROM group WHERE ID = $projs[0]");
                $projekt = mysql_fetch_array($sel2);
                if ($projekt)
                {
                    array_push($mygroup, $projekt);
                }
            }
        }
        if (!empty($mygroup))
        {
            return $mygroup;
        }
        else
        {
            return false;
        }
    }

    /**
     * Listet alle einem bestimmen Projekt zugewiesenen Mitglieder auf
     *
     * @param int $project Eindeutige Projektnummer
     * @param int $lim Maximum auszugebender Mitglieder
     * @return array $members Projektmitglieder
     */
    function getGroupMembers($group, $lim = 10)
    {
        $group = mysql_real_escape_string($group);
        $lim = mysql_real_escape_string($lim);
        $group = (int) $group;
        $lim = (int) $lim;

        $members = array();

        $num = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM group_assigned WHERE `group` = $group"));
        $num = $num[0];
        $lim = (int)$lim;
        SmartyPaginate::connect();
        // set items per page
        SmartyPaginate::setLimit($lim);
        SmartyPaginate::setTotal($num);

        $start = SmartyPaginate::getCurrentIndex();
        $lim = SmartyPaginate::getLimit();

        $sel1 = mysql_query("SELECT user FROM group_assigned WHERE `group` = $group LIMIT $start,$lim");

        while ($user = mysql_fetch_array($sel1))
        {
            $sel2 = mysql_query("SELECT ID, name, avatar, lastlogin FROM user WHERE ID = $user[0]");
            $uname = mysql_fetch_row($sel2);
            $uid = $uname[0];
            $name = $uname[1];
            $avatar = $uname[2];
            $lastlogin = $uname[3];
            $user['lastlogin'] = $lastlogin;
            if ($user["lastlogin"])
            {
                $user['lastlogin'] = date("d.m.y / H:i:s", $user['lastlogin']);
            }

            $user["ID"] = $uid;
            $user["name"] = $name;
            $user["name"] = stripslashes($user["name"]);
            $user["avatar"] = $avatar;
            array_push($members, $user);
        }

        if (!empty($members))
        {
            return $members;
        }
        else
        {
            return false;
        }
    }

	function countMembers($group){
		$group = (int) $group;
		$num = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM group_assigned WHERE projekt = $group"));
        return $num[0];

	}
    /**
     * Get data for the calendar view of milestones
     *
     * @param int $project Eindeutige Projektnummer
     * @param int $start Start time for the calendar view
     * @param int $lim Maximum number of milestones to show
     * @return array $timeline Data for the calendar view of milestones
     */
    
}

?>