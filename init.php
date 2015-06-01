<?php
ini_set("arg_separator.output", "&amp;");
ini_set('default_charset','iso-8859-1');
// Start output buffering with gzip compression and start the session
ob_start('ob_gzhandler');
session_start();

//get full path to collabtive
define("CL_ROOT", realpath(dirname(__FILE__)));
//configuration to load
define("CL_CONFIG", "standard");
//collabtive version
define("CL_VERSION", 0.48);

//uncomment for debugging
ini_set('error_reporting', 1);
ini_set('display_errors',TRUE); 
//error_reporting(E_ALL | E_STRICT);

//include config file , pagination and global functions
require(CL_ROOT . "/config/" . CL_CONFIG . "/config.php");
require(CL_ROOT . "/include/SmartyPaginate.class.php");
require(CL_ROOT . "/include/initfunctions.php");

// Start database connection
if (!empty($db_name) and !empty($db_user))
{
	$tdb = new datenbank();
    $conn = $tdb->connect($db_name, $db_user, $db_pass, $db_host);
}

// Start template engine
$template = new Smarty();
// get the available languages
$languages = getAvailableLanguages();
// get URL to collabtive
$url = getMyUrl();
$template->assign("url", $url);
$template->assign("languages", $languages);
$template->assign("myversion", CL_VERSION);
$template->assign("cl_config",CL_CONFIG);

// Assign globals to all templates
if (isset($_SESSION['userid'])) {
	$userid = $_SESSION["userid"];
	$username = $_SESSION["username"];
	$adminstate = $_SESSION["adminstate"];
	$lastlogin = $_SESSION["lastlogin"];
	$locale = $_SESSION["userlocale"];

    $template->assign("userid", $userid);
    $template->assign("username", $username);
    $template->assign("adminstate", $adminstate);
    $template->assign("lastlogin", $lastlogin);
    $template->assign("loggedin", 1);
} else {
	$template->assign("loggedin",0);
}

//get system settings
if (isset($conn)) {
	$set = (object) new settings();
    $settings = $set->getSettings();
    
    date_default_timezone_set($settings["timezone"]);
    $template->assign("settings", $settings);
    
    $modules = $set->getModules();
    $template->assign("modules", $modules);
}


// Set Template directory
if (isset($settings['template']))
{
    $template->template_dir = CL_ROOT . "/templates/$settings[template]/";
}
else
{
    $template->template_dir = CL_ROOT . "/templates/standard/";
}

if (!isset($locale))
{
    if (isset($settings["locale"]))
    {
        $locale = $settings['locale'];
    }
    else
    {
        $locale = "en";
    }
    $_SESSION['userlocale'] = $locale;
}
// if detected locale doesnt have a corresponding langfile , use system default locale
// if, for whatever reason, no system default language is set, default to english as a last resort
if (!file_exists(CL_ROOT . "/language/$locale/lng.conf"))
{
    $locale = $settings['locale'];
    $_SESSION['userlocale'] = $locale;
}
// Set locale directory
$template->config_dir = CL_ROOT . "/language/$locale/";
//read language file into PHP array
$langfile = readLangfile($locale);
$template->assign("langfile",$langfile);
$template->assign("locale", $locale);

//css classes for headmenue
//this indicates which of the 3 main stages the user is on
$mainclasses = array("desktop" => "desktop",
    "profil" => "profil",
    "admin" => "admin"
    );
$template->assign("mainclasses", $mainclasses);
//clear session data for pagination
SmartyPaginate::disconnect();
?>