<?php
/*
 * The class 'settings' provides methods to deal with the global system settings
 *
 * @author Open Dynamics <info@o-dyn.de>
 * @name settings
 * @package Collabtive
 * @version 0.4.7
 * @link http://www.o-dyn.de
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License v3 or later
 */
class settings
{
    public $mylog;

    /*
     * Constructor
     */
    function __construct()
    {
    }

    /*
     * Returns all global settings
     *
     * @return array $settings Global system settings
     */
    function getSettings()
    {
        $sel = mysql_query("SELECT * FROM settings LIMIT 1");
        $settings = array();
        $settings = mysql_fetch_array($sel);

        if (!empty($settings))
        {
            return $settings;
        }
        else
        {
            return false;
        }
    }
    
    /*
     * Returns all global modules
     *
     * @return array $modules Global modules settings
     */
    function getModules() {
        $sel = mysql_query("SELECT module, action, adminstate FROM module");
        $modules = array();
        
        while ($module = mysql_fetch_array($sel)) {
        	$modules[$module['module']."_adminstate"] = $module['adminstate'];
            $modules[$module['module']."_action"] = $module['action'];
        }

        if (!empty($modules)) {
            return $modules;
        } else {
            return false;
        }

    }

    /*
     * Edits the global system settings
     *
     * @param string $name System name
     * @param string $subtitle Subtitle is displayed under the system name
     * @param string $locale Standard locale
     * @param string $timezone Standard timezone
     * @param string $templ Template
     * @param string $sounds System sounds on or off
     * @return bool
     */
    function editSettings($name, $subtitle, $locale, $timezone, $templ, $sounds)
    {
        $name = mysql_real_escape_string($name);
        $subtitle = mysql_real_escape_string($subtitle);
        $locale = mysql_real_escape_string($locale);
		$timezone = mysql_real_escape_string($timezone);
        $templ = mysql_real_escape_string($templ);
        $sounds = mysql_real_escape_string($sounds);
        
        $sql = "UPDATE settings SET name='$name', subtitle='$subtitle', `locale`='$locale', `timezone`='$timezone', `template`='$templ', `favicon`='$sounds'";
        $upd = mysql_query($sql);
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }

	function editMailsettings($onoff,$mailfrom,$method,$mailhost,$mailuser,$mailpass)
	{
		$onoff = (int) $onoff;
		$mailfrom = mysql_real_escape_string($mailfrom);
		$method =  mysql_real_escape_string($method);
		$mailhost = mysql_real_escape_string($mailhost);
		$mailuser = mysql_real_escape_string($mailuser);
		$mailpass = mysql_real_escape_string($mailpass);
		
		$upd = mysql_query("UPDATE settings SET mailnotify=$onoff,mailfrom='$mailfrom',mailmethod='$method',mailhost='$mailhost',mailuser='$mailuser',mailpass='$mailpass'");
		if($upd)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
    /*
     * Returns all available templates
     *
     * @return array $templates
     */
    function getTemplates()
    {
        $handle = opendir(CL_ROOT . "/templates");
        $templates = array();
        while (false !== ($file = readdir($handle)))
        {
            $type = filetype(CL_ROOT . "/templates/" . $file);
            if ($type == "dir" and $file != "." and $file != "..")
            {
                $template = $file;
                array_push($templates, $template);
            }
        }
        if (!empty($templates))
        {
            return $templates;
        }
        else
        {
            return false;
        }
    }
}
