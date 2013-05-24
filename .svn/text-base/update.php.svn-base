<?php
error_reporting(0);
require("./init.php");
function dircopy($srcdir, $dstdir, $breakdir)
{
    $num = 0;

    if (!is_dir($dstdir))
    {
        mkdir($dstdir);
    }
    if ($curdir = opendir($srcdir))
    {
        while ($file = readdir($curdir))
        {
            if ($file != '.' && $file != '..' and $file != $breakdir)
            {
                $srcfile = $srcdir . '\\' . $file;
                $dstfile = $dstdir . '\\' . $file;
                if (is_file($srcfile))
                {
                    if (copy($srcfile, $dstfile))
                    {
                        $num++;
                    }

                }
                else if (is_dir($srcfile) )
                {
                    $num += dircopy($srcfile, $dstfile, CL_CONFIG);
                }
            }
        }
        closedir($curdir);
    }
    return $num;
}

$table6 = mysql_query("ALTER TABLE `user` ADD `zip` VARCHAR( 5 ) NOT NULL AFTER `lastlogin` ,
ADD `gender` CHAR( 1 ) NOT NULL AFTER `zip` ,
ADD `url` VARCHAR( 255 ) NOT NULL AFTER `gender`");
$table7 = mysql_query("ALTER TABLE `settings` CHANGE `locale` `locale` CHAR( 6 ) NOT NULL");
$table8 = mysql_query("ALTER TABLE `settings` ADD `timezone` CHAR( 80 ) NOT NULL AFTER `locale`");
if ($table8)
{
	$timezone = date_default_timezone_get();
	$set_timezone = mysql_query("UPDATE `settings` SET `timezone`='$timezone'");
}
$table9 = mysql_query("ALTER TABLE `user` CHANGE `locale` `locale` CHAR( 6 ) NOT NULL");


$table16 = mysql_query("UPDATE user SET admin=5 WHERE ID = 1");
$table17 = mysql_query("ALTER TABLE `messages` ADD `tags` VARCHAR( 255 ) NOT NULL AFTER `text`");
$table18 = mysql_query("ALTER TABLE `user` ADD `tags` VARCHAR( 255 ) NOT NULL AFTER `country`");
$table19 = mysql_query("ALTER TABLE `projectfolders` ADD `description` VARCHAR( 255 ) NOT NULL");
$table21 = mysql_query("ALTER TABLE `messages` ADD `milestone` INT( 10 ) NOT NULL");
$table20 = mysql_query("ALTER TABLE `settings` ADD `mailnotify` TINYINT( 1 ) NOT NULL DEFAULT '1',
ADD `mailfrom` VARCHAR( 255 ) NOT NULL ,
ADD `mailmethod` VARCHAR( 5 ) NOT NULL ,
ADD `mailhost` VARCHAR( 255 ) NOT NULL ,
ADD `mailuser` VARCHAR( 255 ) NOT NULL ,
ADD `mailpass` VARCHAR( 255 ) NOT NULL");
if($table20)
{
	$upd = mysql_query("UPDATE settings SET mailnotify=1,mailfrom='Collabtive@localhost',mailmethod='mail'");
}

// optimize all tables
$opt1 = mysql_query("OPTIMIZE TABLE `files`");
$opt2 = mysql_query("OPTIMIZE TABLE `files_attached`");
$opt3 = mysql_query("OPTIMIZE TABLE `log`");
$opt4 = mysql_query("OPTIMIZE TABLE `messages`");
$opt5 = mysql_query("OPTIMIZE TABLE `milestones`");
$opt6 = mysql_query("OPTIMIZE TABLE `milestones_assigned`");
$opt7 = mysql_query("OPTIMIZE TABLE `projekte`");
$opt8 = mysql_query("OPTIMIZE TABLE `projekte_assigned`");
$opt8 = mysql_query("OPTIMIZE TABLE `timetracker`");


$docopy = false;
if (!file_exists(CL_ROOT . "/files/" . CL_CONFIG))
{
    mkdir(CL_ROOT . "/files/" . CL_CONFIG, 0777);
    $docopy = true;
}
if (!file_exists(CL_ROOT . "/files/" . CL_CONFIG . "/avatar/"))
{
    mkdir(CL_ROOT . "/files/" . CL_CONFIG . "/avatar/", 0777);
}
if ($docopy)
{
    dircopy("./files/","./files/" . CL_CONFIG . "/",CL_CONFIG);

}
$template->display("update.tpl");

?>