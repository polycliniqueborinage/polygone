<?php

require("./init.php");
$action = getArrayVal($_GET, "action");
$mode = getArrayVal($_GET, "mode");
$id = getArrayVal($_GET, "id");
$name = getArrayVal($_POST, "name");
$subtitle = getArrayVal($_POST, "subtitle");
$isadmin = getArrayVal($_POST, "isadmin");
$email = getArrayVal($_POST, "email");
$pass = getArrayVal($_POST, "pass");
$company = getArrayVal($_POST, "company");
$address1 = getArrayVal($_POST, "address1");
$address2 = getArrayVal($_POST, "address2");
$tags = getArrayVal($_POST, "tags");
$state = getArrayVal($_POST, "state");
$country = getArrayVal($_POST, "country");
$locale = getArrayVal($_POST, "locale");
$desc = getArrayVal($_POST, "desc");
$end = getArrayVal($_POST, "end");
$assign = getArrayVal($_POST, "assignme");
$assignto = getArrayVal($_POST, "assignto");
$language = getArrayVal($_POST, "language");
$timezone = getArrayVal($_POST, "timezone");
$templ = getArrayVal($_POST, "template");
$favicon = getArrayVal($_POST, "favicon");
$redir = getArrayVal($_GET, "redir");
$turl = getArrayVal($_POST, "web");
$gender = getArrayVal($_POST, "gender");
$zip = getArrayVal($_POST, "zip");
$newpass = getArrayVal($_POST, "newpass");
$repeatpass = getArrayVal($_POST, "repeatpass");

$template->assign("mode", $mode);

//get the available languages
$languages = getAvailableLanguages();
$template->assign("languages", $languages);

$user = new user();
$group = new group();
$theset = new settings();

$mainclasses = array("user" => "user", "management" => "management_active", "admin" => "admin", "logout" => "logout");
$template->assign("mainclasses", $mainclasses);

$mainmenu = array("agenda" => "active","tarification" => "","prothese" => "", "patient" => "", "prestation" => "", "caisse" => "");
$template->assign("mainmenu", $mainmenu);

if ($adminstate < 3)
{
    $errtxt = $langfile["nopermission"];
    $noperm = $langfile["accessdenied"];
    $template->assign("errortext", "$errtxt<br>$noperm");
    $template->display("error.tpl");
    die();
}

$title = $langfile['navigation_title_management_agenda_day'];
    
    $template->assign("title", $title);
    $template->assign("classes", $classes);
    $opros = $group->getGroups(1, 10000);
    $clopros = $group->getGroups(0, 10000);
    $i = 0;
    if (!empty($opros))
    {
        foreach($opros as $opro)
        {
            $membs = $group->getGroupMembers($opro["ID"], 1000);
            $opros[$i]['members'] = $membs;
            $i = $i + 1;
        }
        $template->assign("opros", $opros);
    }

    $users = $user->getAllUsers(1000000);
    $template->assign("users", $users);
    $template->assign("clopros", $clopros);
    
    $template->display("template_management_agenda_day.tpl");

?>