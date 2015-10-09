<?php
include("./init.php");
//check if user is logged in
      if (!isset($_SESSION['userid'])) {

$template->assign("loginerror", 0);
    $template->display("login.tpl");
    die();
}
$myfile = new datei();

$POST_MAX_SIZE = ini_get('post_max_size');
$POST_MAX_SIZE = $POST_MAX_SIZE . "B";

$id = getArrayVal($_GET, "id");
$thisfile = getArrayVal($_GET, "file");
$mode = getArrayVal($_GET, "mode");
$action = getArrayVal($_GET, "action");

$name = getArrayVal($_POST, "name");
$desc = getArrayVal($_POST, "desc");
$tags = getArrayVal($_POST, "tags");
$title = getArrayVal($_POST, "title");
$upfolder = getArrayVal($_POST,"upfolder");

$project = array('ID' => $id);
$template->assign("project", $project);

$template->assign("mode", $mode);

$classes = array("overview" => "overview",
    "msgs" => "msgs",
    "tasks" => "tasks",
    "miles" => "miles",
    "files" => "files_active",
    "users" => "users",
    "tracker" => "tracking"
    );
$template->assign("classes", $classes);
if (!chkproject($userid, $id))
{
    $errtxt = $langfile["notyourproject"];
    $noperm = $langfile["accessdenied"];
    $template->assign("errortext", "$errtxt<br>$noperm");
    $template->display("error.tpl");
    die();
}
if ($action == "upload")
{
    $num = $_POST['numfiles'];

	if($upfolder)
	{
    	$upath = "files/" . CL_CONFIG . "/$id/" . $upfolder;
	}
	else
	{
		$upath = "files/" . CL_CONFIG . "/$id";
	}
    
    $chk = 0;
    for($i = 1;$i <= $num;$i++)
    {
        if ($myfile->upload("userfile$i", $upath, $id))
        {
            $chk = $chk + 1;
        }
    }
    if ($chk == $num)
    {
        $loc = $url .= "managefile.php?action=showproject&id=$id&mode=added";
        header("Location: $loc");
    }

} elseif ($action == "editform")
{
    $file = $myfile->getFile($thisfile);
    $title = $langfile["editfile"];
    $template->assign("title",$title);
    $template->assign("file", $file);
    $template->display("editfileform.tpl");
} elseif ($action == "edit")
{
	$tagobj = new tags();
    $tags = $tagobj->formatInputTags($tags);
    if ($myfile->edit($thisfile, $title, $desc, $tags))
    {
        $loc = $url .= "managefile.php?action=showproject&id=$id&mode=edited";
        header("Location: $loc");
    }
} elseif ($action == "delete")
{
    if ($myfile->loeschen($thisfile))
    {
        $loc = $url .= "managefile.php?action=showproject&id=$id&mode=deleted";
        header("Location: $loc");
    }
} elseif ($action == "zipexport")
{
    $topfad = CL_ROOT . "/files/" . CL_CONFIG . "/$id" . "/projectfiles" . $id . ".zip";
    $zip = new PclZip($topfad);

    if (file_exists($topfad))
    {
        if (unlink($topfad))
        {
            $create = $zip->create(CL_ROOT . "/files/" . CL_CONFIG . "/$id/", PCLZIP_OPT_REMOVE_ALL_PATH);
        }
    }
    else
    {
        $create = $zip->create(CL_ROOT . "/files/" . CL_CONFIG . "/$id/", PCLZIP_OPT_REMOVE_ALL_PATH);
    }
    if ($create != 0)
    {
        $loc = $url . "files/" . CL_CONFIG . "/$id" . "/projectfiles" . $id . ".zip";
        header("Location: $loc");
    }
} elseif ($action == "showproject")
{
    $ordner = $myfile->getProjectFiles($id);
    $folders = $myfile->getProjectFolders($id);
    $myproject = new project();
    $pro = $myproject->getProject($id);
    $projectname = $pro["name"];
    $title = $langfile['files'];


    $template->assign("title", $title);
    $template->assign("projectname", $projectname);
    SmartyPaginate::assign($template);
    $template->assign("ordner", $ordner);
    $template->assign("folders",$folders);
    $template->assign("postmax", $POST_MAX_SIZE);
    $template->display("projectfiles.tpl");
}
elseif($action == "addfolder")
{
	$name = getArrayVal($_POST,"foldertitle");
	$desc = getArrayVal($_POST,"folderdesc");
	if($myfile->addFolder($id,$name,$desc))
	{
		$loc = $url .= "managefile.php?action=showproject&id=$id&mode=folderadded";
		header("Location: $loc");
	}
		
}
elseif($action == "delfolder")
{
	$folder = getArrayVal($_GET,"folder");
	if($myfile->deleteFolder($folder,$id))
	{
		$loc = $url .= "managefile.php?action=showproject&id=$id&mode=folderdel";
		header("Location: $loc");
	}
		
}

?>
