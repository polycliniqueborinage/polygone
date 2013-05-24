<?php
/**
 * The class datei (file) provides methods to handle files
 *
 * @author Open Dynamics <info@o-dyn.de>
 * @name datei
 * @version 0.4.8
 * @package Collabtive
 * @link http://www.o-dyn.de
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License v3 or later
 */
class datei
{
    /**
     * Constructor
     * Initialize the event log
     */
    function __construct()
    {
        $this->mylog = new mylog;
    }

    /**
     * Delete a file
     *
     * @param int $datei File ID
     * @return bool
     */
    function loeschen($datei)
    {
        $datei = (int) $datei;

        $sel1 = mysql_query("SELECT datei,name,project,title FROM files WHERE ID = $datei");
        $thisfile = mysql_fetch_row($sel1);
        if (!empty($thisfile))
        {
            $fname = $thisfile[1];
            $project = $thisfile[2];
            $ftitle = $thisfile[3];
            $thisfile = $thisfile[0];

            $delfile = "./" . $thisfile;

            if (!file_exists($delfile))
            {
                return false;
            }
            $del = mysql_query("DELETE FROM files WHERE ID = $datei");
            $del2 = mysql_query("DELETE FROM files_attached WHERE file = $datei");
            if ($del)
            {
                if (unlink($delfile))
                {
                    $this->mylog->add($ftitle, 'datei' , 3, $project);
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        else
        {
            return false;
        }
    }

    /**
     * Create a new folder
     *
     * @param int $project Project ID the folder belongs to
     * @param string $folder Name of the new folder
     * @param string $desc Description of the folder
     * @return bool
     */
    function addFolder($project, $folder, $desc)
    {
        $project = (int) $project;
        $folder = mysql_real_escape_string($folder);
        $desc = mysql_real_escape_string($desc);

        $ins = mysql_query("INSERT INTO projectfolders (ID,project,name,description) VALUES ('',$project,'$folder','$desc')");
        if ($ins)
        {
            $makefolder = CL_ROOT . "/files/" . CL_CONFIG . "/$project/$folder/";
echo $makefolder;
            if (!file_exists($makefolder))
            {
                if (mkdir($makefolder, 0777))
                {
                    // folder created return true
                    return true;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    
    
     /**
     * Get directory
     *
     * @param string $id Directory
     * @return array $files Found files and directories
     */
    function getFolder($id)
    {
       $id = (int) $id;
       $sel = mysql_query("SELECT * FROM projectfolders WHERE ID = $id LIMIT 1");
       $folder = mysql_fetch_array($sel);
       
       return $folder;
    }
    
    function getProjectFolders($project)
    {
    	$project =  (int) $project;
    	$sel = mysql_query("SELECT * FROM projectfolders WHERE project = $project");
    	$folders = array();
    	
    	while($folder = mysql_fetch_array($sel))
    	{
    		array_push($folders,$folder);
    	}
    	
    	if(!empty($folders))
    	{
    		return $folders;
    	}
    	else
    	{
    		return false;
    	}
    }
     
     /**
     * Delete a folder
     *
     * @param int $id folder id
     * @param int $id project id 
     * @return array $files Found files and directories
     */
	function deleteFolder($id,$project){
		$id = (int) $id;
		$folder = $this->getFolder($id);
		$files = $this->getProjectFiles($project,10000,$folder["name"]);
		//delete all the files in the folder from the database (and filesystem as well)
		foreach($files as $file)
		{
			$this->loeschen($file["ID"]);
		}
		$del = mysql_query("DELETE FROM projectfolders WHERE ID = $id");
		
		
		$foldstr = CL_ROOT . "/files/" . CL_CONFIG . "/$project/" . $folder["name"] . "/";
		delete_directory($foldstr);
		return true;

	}
    
    /**
     * Upload a file. Does filename sanitizing as well as MIME-type determination
     *
     * @param string $fname Name of the HTML form field POSTed from
     * @param string $ziel Destination directory
     * @param int $project Project ID of the associated project
     * @return bool
     */
    function upload($fname, $ziel, $project)
    {
        $name = $_FILES[$fname]['name'];
        $typ = $_FILES[$fname]['type'];
        $size = $_FILES[$fname]['size'];
        $tmp_name = $_FILES[$fname]['tmp_name'];
        $error = $_FILES[$fname]['error'];
        $root = CL_ROOT;

        if (empty($name))
        {
            return false;
        }

        // find the extension
        $teilnamen = explode(".", $name);
        $teile = count($teilnamen);
        $workteile = $teile - 1;
        $erweiterung = $teilnamen[$workteile];
        $subname = "";
        // if its a php file, treat it as plaintext so it gets not executed when opened in the browser.
        if (stristr($typ, "php"))
        {
            $erweiterung = "txt";
            $typ = "text/plain";
        }

        for ($i = 0; $i < $workteile; $i++)
        {
            $subname .= $teilnamen[$i];
        }
        $seed = $this->make_seed();
        srand($seed);
        $randval = rand(1, 999999);
        // only allow a-z , 0-9 in filenames, substitute other chars with _
        $subname = preg_replace("/[^-_0-9a-zA-Z]/", "_", $subname);
        // remove whitespace
        $subname = preg_replace("/\W/", "", $subname);
        // if filename is longer than 200 chars, cut it.
        if (strlen($subname) > 200)
        {
            $subname = substr($subname, 0, 200);
        }

        $name = $subname . "_" . $randval . "." . $erweiterung;
        $datei_final = $root . "/" . $ziel . "/" . $name;
        $datei_final2 = $ziel . "/" . $name;

        if (!file_exists($datei_final))
        {
            if (move_uploaded_file($tmp_name, $datei_final))
            {
                if ($project > 0)
                {
                    /**
                     * file did not already exist, was uploaded, and a project is set
                     * add the file to the database, add the upload event to the log and return the file ID.
                     */
                    chmod($datei_final, 0755);
                    $fid = $this->add_file($name, $desc, $project, 0, "$tags", $datei_final2, "$typ", $title);
                    $this->mylog->add($title, 'datei', 1, $project);
                    return $fid;
                }
                else
                {
                    // no project means the file is now added to the database wilfully. return file name.
                    return $name;
                }
            }
            else
            {
                // file was not uploaded return false
                return false;
            }
        }
        else
        {
            // file already exists. return false
            return false;
        }
    }

    /**
     * Edit a file
     *
     * @param int $id File ID
     * @param string $title Title of the file
     * @param string $desc Description text
     * @param string $tags Associated tags (not yet implemented)
     * @return bool
     */
    function edit($id, $title, $desc, $tags)
    {
        $id = (int) $id;
        $title = mysql_real_escape_string($title);
        $desc = mysql_real_escape_string($desc);
        $tags = mysql_real_escape_string($tags);
        // get project for logging
        $sel = mysql_query("SELECT project FROM files WHERE ID = $id");
        $proj = mysql_fetch_row($sel);
        $project = $proj[0];

        $sql = mysql_query("UPDATE files SET `title` = '$title', `desc` = '$desc', `tags` = '$tags' WHERE id = $id");
        if ($sql)
        {
            $this->mylog->add($title, 'datei' , 2, $project);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * List up all files associated to a given project
     *
     * @param string $id Project ID
     * @param int $lim Limit
     * @param string $folder Folder
     * @return array $files Found files
     */
    function getProjectFiles($id, $lim = 10, $folder = "")
    {
        $id = (int) $id;
        $lim = (int) $lim;
        $folder = mysql_real_escape_string($folder);

        if ($folder != "")
        {
        	$fold = "files/" . CL_CONFIG . "/$id/$folder/";
            $sel = mysql_query("SELECT COUNT(*) FROM files WHERE project = $id AND datei LIKE '$fold%'");
        }
        else
        {
            $sel = mysql_query("SELECT COUNT(*) FROM files WHERE project = $id");
        }
        $num = mysql_fetch_row($sel);
        $num = $num[0];
        SmartyPaginate::connect();
        // set items per page
        SmartyPaginate::setLimit($lim);
        SmartyPaginate::setTotal($num);

        $start = SmartyPaginate::getCurrentIndex();
        $lim = SmartyPaginate::getLimit();

        $files = array();

        if ($folder != "")
        {
            $sql = "SELECT * FROM files WHERE project = $id AND datei LIKE '$fold%' ORDER BY  added DESC LIMIT $start,$lim";
            $sel2 = mysql_query($sql);
        }
        else
        {
            $sel2 = mysql_query("SELECT * FROM files WHERE project = $id ORDER BY  added DESC LIMIT $start,$lim");
        }
        $tagobj = new tags();
        while ($file = mysql_fetch_array($sel2))
        {
            if (!empty($file))
            {
                $file['type'] = str_replace("/", "-", $file['type']);
                $set = new settings();
                $settings = $set->getSettings();
                $myfile = "./templates/" . $settings['template'] . "/img/symbols/files/" . $file['type'] . ".png";
                if (stristr($file['type'], "image"))
                {
                    $file['imgfile'] = 1;
                } elseif (stristr($file['type'], "text"))
                {
                    $file['imgfile'] = 2;
                }
                else
                {
                    $file['imgfile'] = 0;
                }

                if (!file_exists($myfile))
                {
                    $file['type'] = "none";
                }
                $thetags = $tagobj->splitTagStr($file["tags"]);;
                $file["tagsarr"] = $thetags;
                $file["tagnum"] = count($file["tagsarr"]);
                $file["title"] = stripslashes($file["title"]);
                $file["desc"] = stripslashes($file["desc"]);
                $file["tags"] = stripslashes($file["tags"]);
                array_push($files, $file);
            }
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

    /**
     * Return a file
     *
     * @param string $id File ID
     * @return array $file File details
     */
    function getFile($id)
    {
        $id = (int) $id;

        $sel = mysql_query("SELECT * FROM files WHERE ID=$id");

        $file = mysql_fetch_array($sel);
        if (!empty($file))
        {
            $file['type'] = str_replace("/", "-", $file["type"]);
            $set = new settings();
            $settings = $set->getSettings();
            $myfile = "./templates/" . $settings["template"] . "/img/symbols/files/" . $file['type'] . ".png";
            if (!file_exists($myfile))
            {
                $file['type'] = "none";
            }

            $file["title"] = stripslashes($file["title"]);
            $file["desc"] = stripslashes($file["desc"]);
            $file["tags"] = stripslashes($file["tags"]);

            return $file;
        }
        else
        {
            return false;
        }
    }
/**
     * Seed the random number generator
     *
     * @return float $value Initial value
     */
    private function make_seed()
    {
        list($usec, $sec) = explode(' ', microtime());
        $value = (float) $sec + ((float) $usec * 100000);
        return $value;
    }

    /**
     * Add a file to the database
     *
     * @param string $name Filename
     * @param string $desc Description
     * @param int $project ID of the associated project
     * @param int $milestone ID of the associated milestone
     * @param string $tags Tags for the file (not yet implemented)
     * @param string $datei File path
     * @param string $type MIME Type
     * @param string $title Title of the file
     * @return bool $insid
     */
    private function add_file($name, $desc, $project, $milestone, $tags, $datei, $type, $title)
    {
        $name = mysql_real_escape_string($name);
        $desc = mysql_real_escape_string($desc);
        $tags = mysql_real_escape_string($tags);
        $datei = mysql_real_escape_string($datei);
        $project = (int) $project;
        $milestone = (int) $milestone;
        $type = mysql_real_escape_string($type);
        $title = mysql_real_escape_string($title);
        $now = time();
        $ins = mysql_query("INSERT INTO files (`name`,`desc`,`project`,`milestone`,`tags`,`added`,`datei`,`type`,`title`) VALUES ('$name','$desc',$project,$milestone,'$tags','$now','$datei','$type','$title')");

        if ($ins)
        {
        	$insid = mysql_insert_id();
            return $insid;
        }
        else
        {
            return false;
        }
    }

}

?>