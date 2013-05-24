<?php

/**
 * The class provides methods for the realization of messages and replies.
 *
 * @author Open Dynamics <info@o-dyn.de>
 * @name message
 * @version 0.4.6
 * @package Collabtive
 * @link http://www.o-dyn.de
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License v3 or later
 */

class messages
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
     * Creates a new message or a reply to a message
     *
     * @param int $project Project ID the message belongs to
     * @param string $title Title/Subject of the message
     * @param string $text Textbody of the message
     * @param string $tags Tags for the message
     * @param int $user User ID of the user adding the message
     * @param string $username Name of the user adding the message
     * @param int $replyto ID of the message this message is replying to. Standardmessage: 0
     * @return bool
     */
    function add($project, $title, $text, $user, $username, $replyto)
    {
        $project = (int) $project;
        $title = mysql_real_escape_string($title);
        $text = mysql_real_escape_string($text);
        $user = (int) $user;
        $username = mysql_real_escape_string($username);
        $replyto = (int) $replyto;
        $posted = time();

		$sql = "INSERT INTO messages (`project`,`title`,`text`, `posted`,`user`,`username`,`replyto`) VALUES ($project,'$title','$text', '$posted',$user,'$username',$replyto) ";
		$ins = mysql_query($sql);

        $insid = mysql_insert_id();
        if ($ins)  {
            $this->mylog->add($title, 'message', 1, $project);
            return $insid;
        } else {
            return false;
        }
    }

    /**
     * Bearbeitet eine Nachricht
     *
     * @param int $id Eindeutige Nummer der Nachricht
     * @param string $title Titel der Nachricht
     * @param string $text Text der Nachricht
     * @param string $tags Tags for the message
     * @return bool
     */
    function edit($id, $title, $text, $tags)
    {
        $id = (int) $id;
        $title = mysql_real_escape_string($title);
        $text = mysql_real_escape_string($text);
        $tags = mysql_real_escape_string($tags);

        $upd = mysql_query("UPDATE messages SET title='$title', text='$text', tags='$tags' WHERE ID = $id");

        if ($upd)
        {
            $proj = mysql_query("SELECT project FROM messages WHERE ID = $id");
            $proj = mysql_fetch_row($proj);
            $proj = $proj[0];
            $this->mylog->add($title, 'message', 2, $proj);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * L�scht eine Nachricht und alle zugeh�rigen Antworten
     *
     * @param int $id Eindeutige Nummer der Nachricht
     * @return bool
     */
    function del($id)
    {
        $id = (int) $id;

        $msg = mysql_query("SELECT title,project FROM messages WHERE ID = $id");
        $msg = mysql_fetch_row($msg);

        $del = mysql_query("DELETE FROM messages WHERE ID = $id LIMIT 1");
        $del2 = mysql_query("DELETE FROM messages WHERE replyto = $id");
        $del3 = mysql_query("DELETE FROM files_attached WHERE message = $id");
        if ($del)
        {
            $this->mylog->add($msg[0], 'message', 3, $msg[1]);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Gibt eine Nachricht inklusive der Anzahl ihrer Antworten zur�ck
     *
     * @param int $id Eindeutige Nummer der Nachricht
     * @return array $message Eigenschaften der Nachricht
     */
    function getMessage($id)
    {
        $id = (int) $id;

        $sel = mysql_query("SELECT * FROM messages WHERE ID = $id LIMIT 1");
        $message = mysql_fetch_array($sel);

        $tagobj = new tags();
	$milesobj = new milestone();
        if (!empty($message))
        {
            $replies = mysql_query("SELECT COUNT(*) FROM messages WHERE replyto = $id");
            $replies = mysql_fetch_row($replies);
            $replies = $replies[0];

            $user = new user();
            $avatar = $user->getAvatar($message["user"]);

            $posted = date("d.m.y - H:i", $message["posted"]);
            $message["endstring"] = $posted;
            $message["replies"] = $replies;
            $message["avatar"] = $avatar;
            $message["title"] = stripslashes($message["title"]);
            $message["text"] = stripslashes($message["text"]);
            $message["username"] = stripslashes($message["username"]);
            $message["tagsarr"] = $tagobj->splitTagStr($message["tags"]);
            $message["tagnum"] = count($message["tagsarr"]);

            $attached = $this->getAttachedFiles($message["ID"]);
            $message["files"] = $attached;

            return $message;
        }
        else
        {
            return false;
        }
    }

    /**
     * Gibt alle Antworten auf eine Nachricht zur�ck
     *
     * @param int $id Eindeutige Nummer der Nachricht
     * @return array $replies Antworten zur Nachricht
     */
    function getReplies($id)
    {
        $id = (int) $id;

        $sel = mysql_query("SELECT * FROM messages WHERE replyto = $id");
        $replies = array();

        while ($reply = mysql_fetch_array($sel))
        {
            $tagobj = new tags();
            $milesobj = new milestone();
            if (!empty($reply))
            {
                $user = new user();
                $avatar = $user->getAvatar($reply["user"]);

                $postdate = date("d.m.y - H:i", $reply["posted"]);

                $attached = $this->getAttachedFiles($reply["ID"]);
                $reply["files"] = $attached;
                $reply["postdate"] = $postdate;
                $reply["avatar"] = $avatar;
                $reply["title"] = stripslashes($reply["title"]);
                $reply["text"] = stripslashes($reply["text"]);
                $reply["username"] = stripslashes($reply["username"]);
                $reply["tagsarr"] = $tagobj->splitTagStr($reply["tags"]);
                $reply["tagnum"] = count($reply["tagsarr"]);

                array_push($replies, $reply);
            }
        }
        if (!empty($replies))
        {
            return $replies;
        }
        else
        {
            return false;
        }
    }

    function getLatestMessages($limit = 5)
    {
        $limit = (int) $limit;

        $userid = $_SESSION["userid"];
        $sel3 = mysql_query("SELECT projekt FROM projekte_assigned WHERE user = $userid");
        $prstring = "";
        while ($upro = mysql_fetch_row($sel3))
        {
            $projekt = $upro[0];
            $prstring .= $projekt . ",";
        }

        $prstring = substr($prstring, 0, strlen($prstring)-1);
        if ($prstring)
        {
            $sel1 = mysql_query("SELECT * FROM messages WHERE project IN($prstring) ORDER BY posted DESC LIMIT $limit ");
            $messages = array();

            $tagobj = new tags();
	    $milesobj = new milestone();
            while ($message = mysql_fetch_array($sel1))
            {
                $sel = mysql_query("SELECT avatar FROM user WHERE ID = $message[user]");
                $avatar = mysql_fetch_row($sel);
                $avatar = $avatar[0];
                $message["avatar"] = $avatar;

                $datetime = date("d.m.y - H:i", $message["posted"]);
                $message["postdate"] = $datetime;
                $message["title"] = stripslashes($message["title"]);
                $message["text"] = stripslashes($message["text"]);
                $message["username"] = stripslashes($message["username"]);

                $message["tagsarr"] = $tagobj->splitTagStr($message["tags"]);
                $message["tagnum"] = count($message["tagsarr"]);

                $replies = mysql_query("SELECT COUNT(*) FROM messages WHERE replyto = $message[ID]");
                $replies = mysql_fetch_row($replies);
                $replies = $replies[0];
                $message["replies"] = $replies;

                $project = mysql_query("SELECT name FROM projekte WHERE ID = $message[project]");
                $project = mysql_fetch_row($project);
                $project = $project[0];
                $project["name"] = stripslashes($project["name"]);
                $message["pname"] = $project;

                $attached = $this->getAttachedFiles($message["ID"]);
                $message["files"] = $attached;

		if($message["milestone"] > 0)
	    	{
	   	 $miles = $milesobj->getMilestone($message["milestone"]);
	   	 }
	    	else
	   	 {
	    	$miles = array();
           	 }

	    $message["milestones"] = $miles;
	    

                array_push($messages, $message);
            }
        }
        if (!empty($messages))
        {
            return $messages;
        }
        else
        {
            return false;
        }
    }

    /**
     * Gibt alle Nachrichten eines Projekts zur�ck (ohne zugeh�rige Antworten)
     *
     * @param int $project Eindeutige Nummer des Projekts
     * @return array $messages Nachrichten zum Projekt
     */
    function getProjectMessages($project)
    {
        $project = (int) $project;

        $messages = array();
        $sel1 = mysql_query("SELECT * FROM messages WHERE project = $project AND replyto = 0 ORDER BY posted DESC");

        $tagobj = new tags();
	$milesobj = new milestone();
	
        while ($message = mysql_fetch_array($sel1))
        {
            $sel = mysql_query("SELECT avatar FROM user WHERE ID = $message[user]");
            $avatar = mysql_fetch_row($sel);
            $avatar = $avatar[0];
            $message["avatar"] = $avatar;

            $datetime = date("d.m.y - H:i", $message["posted"]);
            $message["postdate"] = $datetime;

            $replies = mysql_query("SELECT COUNT(*) FROM messages WHERE replyto = $message[ID]");
            $replies = mysql_fetch_row($replies);
            $replies = $replies[0];
            $message["replies"] = $replies;

            $project = mysql_query("SELECT name FROM projekte WHERE ID = $message[project]");
            $project = mysql_fetch_row($project);
            $project = $project[0];
            $project["name"] = stripslashes($project["name"]);
            $message["pname"] = $project;

            $attached = $this->getAttachedFiles($message["ID"]);
            $message["files"] = $attached;

            if (isset($message["title"]))
            {
                $message["title"] = stripslashes($message["title"]);
            }
            $message["text"] = stripslashes($message["text"]);
            $message["username"] = stripslashes($message["username"]);

            $message["tagsarr"] = $tagobj->splitTagStr($message["tags"]);
            $message["tagnum"] = count($message["tagsarr"]);

	    if($message["milestone"] > 0)
	    {
	    $miles = $milesobj->getMilestone($message["milestone"]);
	    }
	    else
	    {
	    $miles = array();
            }

	    $message["milestones"] = $miles;
	    
            array_push($messages, $message);
        }

        if (!empty($messages))
        {
            return $messages;
        }
        else
        {
            return false;
        }
    }

    function attachFile($fid, $mid, $id = 0)
    {
        $fid = (int) $fid;
        $mid = (int) $mid;
        $id = (int) $id;

        $myfile = new datei();
        if ($fid > 0)
        {
            $ins = mysql_query("INSERT INTO files_attached (ID,file,message) VALUES ('',$fid,$mid)");
        }
        else
        {
            $num = $_POST["numfiles"];

            $chk = 0;
            for($i = 1;$i <= $num;$i++)
            {
                $fid = $myfile->upload("userfile$i", "files/" . CL_CONFIG . "/$id", $id);
                $ins = mysql_query("INSERT INTO files_attached (ID,file,message) VALUES ('',$fid,$mid)");
            }
        }
        if ($ins)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    private function getAttachedFiles($msg)
    {
        $msg = (int) $msg;

        $files = array();
        $sel = mysql_query("SELECT file FROM files_attached WHERE message = $msg");
        while ($file = mysql_fetch_row($sel))
        {
            $sel2 = mysql_query("SELECT * FROM files WHERE ID = $file[0]");
            $thisfile = mysql_fetch_array($sel2);
            $thisfile["type"] = str_replace("/", "-", $thisfile["type"]);
            if (isset($thisfile["desc"]))
            {
                $thisfile["desc"] = stripslashes($thisfile["desc"]);
            }
            if (isset($thisfile["tags"]))
            {
                $thisfile["tags"] = stripslashes($thisfile["tags"]);
            }
            if (isset($thisfile["title"]))
            {
                $thisfile["title"] = stripslashes($thisfile["title"]);
            }
            $set = new settings();
            $settings = $set->getSettings();
            $myfile = "./templates/" . $settings["template"] . "/img/symbols/files/" . $thisfile["type"] . ".png";
            if (stristr($thisfile["type"], "image"))
            {
                $thisfile["imgfile"] = 1;
            } elseif (stristr($thisfile["type"], "text"))
            {
                $thisfile["imgfile"] = 2;
            }
            else
            {
                $thisfile["imgfile"] = 0;
            }

            if (!file_exists($myfile))
            {
                $thisfile["type"] = "none";
            }
            array_push($files, $thisfile);
        }

        if (!empty($files))
        {
            return $files;
        }
        else
        {
            return false;
        }
    }
}

?>