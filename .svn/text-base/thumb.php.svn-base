<?php
define('CL_ROOT', realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR));

function getArrayVal(array $array, $name)
{
    if (array_key_exists($name, $array))
    {
        return $array[$name];
    }
}
error_reporting(0);
$pic = getArrayVal($_GET,"pic");
$height = getArrayVal($_GET,"height");
$width = getArrayVal($_GET,"width");
include("./include/class.hft_image.php");
$imagehw = GetImageSize($pic);
$imagewidth = $imagehw[0];
$imageheight = $imagehw[1];
$myThumb = new hft_image(CL_ROOT . "/" . $pic);

if (!isset($height))
{
    $height = 100;
}
if (!isset($width))
{
    $width = 100;
}
if ($imageheight > $imagewidth)
{
    $myThumb->resize($height, $width, "+");
}
else
{
    $myThumb->resize($height, $width, "-");
}
HEADER("Content-Type: image/jpeg");
$myThumb->output_resized("");

?>