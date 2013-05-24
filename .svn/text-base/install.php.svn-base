<?php
error_reporting(0);
// Check if directory templates_c exists and is writable
if ((!file_exists("./templates_c")) or (!(is_writable("./templates_c"))))
{
    die("Required folder templates_c does not exist or is not writable. <br>Please create the folder or make it writable in order to proceed.");
}

include("init.php");
function file_perms($file, $octal = false)
{
    if (!file_exists($file)) return false;
    $perms = fileperms($file);
    $cut = $octal ? 2 : 3;
    return substr(decoct($perms), $cut);
}
$action = getArrayVal($_GET, "action");
$locale = getArrayVal($_GET, "locale");
if (!empty($locale))
{
    $_SESSION['userlocale'] = $locale;
}
else
{
    $locale = $_SESSION['userlocale'];
}
if (empty($locale))
{
    $locale = "en";
}
$template->assign("locale", $locale);
$template->config_dir = "./language/$locale/";
$template->template_dir = "./templates/standard/";
if (!$action)
{
    $configfilechk = file_perms(CL_ROOT . "/config/" . CL_CONFIG . "/config.php");
    $filesdir = is_writable("./files/");
    if ($filesdir)
    {
        $filesdir = 1;
    }
    else
    {
        $filesdir = 0;
    }

    $templatesdir = is_writable("./templates_c/");
    if ($templatesdir)
    {
        $templatesdir = 1;
    }
    else
    {
        $templatesdir = 0;
    }

    $phpver = phpversion();

    $template->assign("phpver", $phpver);
    $template->assign("configfile", $configfilechk);
    $template->assign("filesdir", $filesdir);
    $template->assign("templatesdir", $templatesdir);

    $template->display("install1.tpl");
} elseif ($action == "step2")
{
    $db_host = $_POST['db_host'];
    $db_name = $_POST['db_name'];
    $db_user = $_POST['db_user'];
    $db_pass = $_POST['db_pass'];

    $file = fopen(CL_ROOT . "/config/" . CL_CONFIG . "/config.php", "w+");
    $str = "<?php
\$db_host = \"$db_host\";\n
\$db_name = \"$db_name\";\n
\$db_user = \"$db_user\";\n
\$db_pass = \"$db_pass\";\n
?>
";
    $put = fwrite($file, "$str");
    if ($put)
    {
        @chmod(CL_ROOT . "/config/" . CL_CONFIG . "/config.php", 0755);
    }
    // connect database.
    $db = new datenbank();
    $conn = $db->connect($db_name, $db_user, $db_pass, $db_host);
    if (!($conn))
    {
        $template->assign("errortext", "Database connection could not be established. <br>Please check if database exists and check if login credentials are correct.");
        $template->display("error.tpl");
        die();
    }

    $table1 = mysql_query("CREATE TABLE `company` (
  `ID` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `phone` varchar(255) NOT NULL default '',
  `address1` varchar(255) NOT NULL default '',
  `address2` varchar(255) NOT NULL default '',
  `state` varchar(255) NOT NULL default '',
  `country` varchar(255) NOT NULL default '',
  `logo` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`),
  KEY `name` (`name`)
) TYPE=MyISAM;
");

    $table2 = mysql_query("CREATE TABLE `company_assigned` (
  `ID` int(10) NOT NULL auto_increment,
  `user` int(10) NOT NULL default '0',
  `company` int(10) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  KEY `company` (`company`),
  KEY `user` (`user`)
) TYPE=MyISAM;");

    $table3 = mysql_query("CREATE TABLE `files` (
  `ID` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `desc` varchar(255) NOT NULL default '',
  `project` int(10) NOT NULL default '0',
  `milestone` int(10) NOT NULL default '0',
  `tags` varchar(255) NOT NULL default '',
  `added` varchar(255) NOT NULL default '',
  `datei` varchar(255) NOT NULL default '',
  `type` varchar(50) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`),
  KEY `name` (`name`),
  KEY `datei` (`datei`),
  KEY `added` (`added`),
  KEY `project` (`project`),
  KEY `tags` (`tags`)
) TYPE=MyISAM;");

    $table4 = mysql_query("CREATE TABLE `log` (
  `ID` int(10) NOT NULL auto_increment,
  `user` int(10) NOT NULL default '0',
  `username` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `type` varchar(255) NOT NULL default '',
  `action` int(1) NOT NULL default '0',
  `project` int(10) NOT NULL default '0',
  `datum` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`),
  KEY `datum` (`datum`),
  KEY `type` (`type`),
  KEY `action` (`action`),
  FULLTEXT KEY `username` (`username`),
  FULLTEXT KEY `name` (`name`)
) TYPE=MyISAM;");

    $table5 = mysql_query("CREATE TABLE `messages` (
  `ID` int(10) NOT NULL auto_increment,
  `project` int(10) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `text` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `posted` varchar(255) NOT NULL default '',
  `user` int(10) NOT NULL default '0',
  `username` varchar(255) NOT NULL default '',
  `replyto` int(11) NOT NULL default '0',
  `milestone` int(10) NOT NULL,
  PRIMARY KEY  (`ID`),
  KEY `project` (`project`),
  KEY `user` (`user`),
  KEY `replyto` (`replyto`),
  KEY `tags` (`tags`)
) ENGINE=MyISAM");

    $table6 = mysql_query("CREATE TABLE `milestones` (
  `ID` int(10) NOT NULL auto_increment,
  `project` int(10) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `desc` text NOT NULL,
  `start` varchar(255) NOT NULL default '',
  `end` varchar(255) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  KEY `name` (`name`),
  KEY `end` (`end`),
  KEY `project` (`project`)
) TYPE=MyISAM;
");

    $table7 = mysql_query("CREATE TABLE `milestones_assigned` (
  `ID` int(10) NOT NULL auto_increment,
  `user` int(10) NOT NULL default '0',
  `milestone` int(10) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  KEY `user` (`user`),
  KEY `milestone` (`milestone`)
) TYPE=MyISAM;
");

    $table8 = mysql_query("CREATE TABLE `projekte` (
  `ID` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `desc` text NOT NULL,
  `start` varchar(255) NOT NULL default '',
  `end` varchar(255) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  KEY `status` (`status`)
) TYPE=MyISAM;
");

    $table9 = mysql_query("CREATE TABLE `projekte_assigned` (
  `ID` int(10) NOT NULL auto_increment,
  `user` int(10) NOT NULL default '0',
  `projekt` int(10) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  KEY `user` (`user`),
  KEY `projekt` (`projekt`)
) TYPE=MyISAM;
");

    $table10 = mysql_query("CREATE TABLE `settings` (
  `ID` tinyint(1) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `subtitle` varchar(255) NOT NULL default '',
  `locale` varchar(6) NOT NULL default '',
  `timezone` varchar(60) NOT NULL,
  `template` varchar(255) NOT NULL default '',
  `favicon` varchar(255) NOT NULL default '',
  `mailnotify` tinyint(1) NOT NULL default '1',
  `mailfrom` varchar(255) NOT NULL,
  `mailmethod` varchar(5) NOT NULL,
  `mailhost` varchar(255) NOT NULL,
  `mailuser` varchar(255) NOT NULL,
  `mailpass` varchar(255) NOT NULL,
  KEY `ID` (`ID`),
  KEY `name` (`name`),
  KEY `subtitle` (`subtitle`),
  KEY `locale` (`locale`),
  KEY `template` (`template`),
  KEY `favicon` (`favicon`)
) ENGINE=MyISAM");

    $table11 = mysql_query("CREATE TABLE `tasklist` (
  `ID` int(10) NOT NULL auto_increment,
  `project` int(10) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `desc` text NOT NULL,
  `start` varchar(255) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `access` tinyint(4) NOT NULL default '0',
  `milestone` int(10) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  KEY `status` (`status`),
  KEY `milestone` (`milestone`)
) TYPE=MyISAM;");

    $table12 = mysql_query("CREATE TABLE `tasks` (
  `ID` int(10) NOT NULL auto_increment,
  `start` varchar(255) NOT NULL default '',
  `end` varchar(255) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `text` text NOT NULL,
  `liste` int(10) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  `project` int(10) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  KEY `liste` (`liste`),
  KEY `status` (`status`),
  KEY `end` (`end`)
) TYPE=MyISAM;");

    $table13 = mysql_query("CREATE TABLE `tasks_assigned` (
  `ID` int(10) NOT NULL auto_increment,
  `user` int(10) NOT NULL default '0',
  `task` int(10) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  KEY `user` (`user`),
  KEY `task` (`task`)
) TYPE=MyISAM;
");
    $table14 = mysql_query("CREATE TABLE `user` (
  `ID` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `pass` varchar(255) NOT NULL default '',
  `admin` tinyint(1) NOT NULL default '0',
  `company` int(10) NOT NULL default '0',
  `lastlogin` varchar(255) NOT NULL default '',
  `zip` varchar(5) NOT NULL default '',
  `gender` char(1) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `adress` varchar(255) NOT NULL default '',
  `adress2` varchar(255) NOT NULL default '',
  `state` varchar(255) NOT NULL default '',
  `country` varchar(255) NOT NULL default '',
  `tags` varchar(255) NOT NULL default '',
  `locale` varchar(6) NOT NULL default '',
  `avatar` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `name` (`name`),
  KEY `pass` (`pass`),
  KEY `locale` (`locale`)
) TYPE=MyISAM;");

    $table15 = mysql_query("CREATE TABLE `chat` (
  `ID` int(10) NOT NULL auto_increment,
  `time` varchar(255) NOT NULL default '',
  `ufrom` varchar(255) NOT NULL default '',
  `ufrom_id` int(10) NOT NULL default '0',
  `userto` varchar(255) NOT NULL default '',
  `userto_id` int(10) NOT NULL default '0',
  `text` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM;");

    $table16 = mysql_query("CREATE TABLE `files_attached` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `file` int(10) unsigned NOT NULL default '0',
  `message` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  KEY `file` (`file`,`message`)
) TYPE=MyISAM;");

    $table17 = mysql_query("CREATE TABLE `timetracker` (
  `ID` int(10) NOT NULL auto_increment,
  `user` int(10) NOT NULL default '0',
  `project` int(10) NOT NULL default '0',
  `task` int(10) NOT NULL default '0',
  `comment` text NOT NULL,
  `started` varchar(255) NOT NULL default '',
  `ended` varchar(255) NOT NULL default '',
  `hours` float NOT NULL default '0',
  `pstatus` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  KEY `user` (`user`,`project`,`task`),
  KEY `started` (`started`),
  KEY `ended` (`ended`)
) ENGINE=MyISAM;");

    $table18 = mysql_query("
CREATE TABLE `projectfolders` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `project` int(11) NOT NULL default '0',
  `name` text NOT NULL,
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`),
  KEY `project` (`project`)
) ENGINE=MyISAM;

");
    // Checks if tables could be created
    if (!$table1 or !$table2 or !$table3 or !$table4 or !$table5 or !$table6 or !$table7 or !$table8 or !$table9 or !$table10 or !$table11 or !$table12 or !$table13 or !$table14 or !$table15 or !$table16 or !$table17 or !$table18)
    {
        $template->assign("errortext", "Error: Tables could not be created.");
        $template->display("error.tpl");
        die();
    }

	$timezone = date_default_timezone_get();
    $ins = mysql_query("INSERT INTO settings (ID,name,subtitle,locale,timezone,template,favicon,mailnotify,mailfrom,mailmethod) VALUES ('','Collabtive','Projectmanagement','$locale','$timezone','standard','on',1,'collabtive@localhost','mail')");

    $template->display("install2.tpl");
} elseif ($action == "step3")
{
	mkdir(CL_ROOT . "/files/" . CL_CONFIG . "/");
    mkdir(CL_ROOT . "/files/" . CL_CONFIG . "/avatar/", 0777);
    mkdir(CL_ROOT . "/files/" . CL_CONFIG . "/ics/", 0777);

  require(CL_ROOT . "/config/" . CL_CONFIG . "/config.php");
    // Start database connection
    $db = new datenbank();
    $db->connect($db_name, $db_user, $db_pass, $db_host);
    $user = $_POST['name'];
    $pass = $_POST['pass'];
    // create the first user
    $usr = new user();
    $usr->add($user, "", 0, $pass, 5);

    if (isset($_FILES["importfile"]))
    {
        $importer = new importer();
        $myfile = new datei();
        // import basecamp file
        $up = $myfile->upload("importfile", "files/" . CL_CONFIG . "/ics", 0);
        if ($up)
        {
            $importer->importBasecampXmlFile(CL_ROOT . "/files/" . CL_CONFIG . "/ics/$up");
        }
    }

    $template->display("install3.tpl");
}

?>