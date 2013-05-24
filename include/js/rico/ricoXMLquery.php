<?
if (!isset ($_SESSION)) session_start();
header("Cache-Control: no-cache");
header("Pragma: no-cache");
header("Expires: ".gmdate("D, d M Y H:i:s",time()+(-1*60))." GMT");
header("Content-type: text/xml");
echo "<?xml version='1.0' encoding='ISO-8859-15'?".">\n";

require "applib.php";
require "ricoXmlResponse.php";

$id=isset($_GET["id"]) ? $_GET["id"] : "";
$offset=isset($_GET["offset"]) ? $_GET["offset"] : "0";
$size=isset($_GET["page_size"]) ? $_GET["page_size"] : "";
$total=isset($_GET["get_total"]) ? strtolower($_GET["get_total"]) : "false";
$distinct=isset($_GET["distinct"]) ? $_GET["distinct"] : "";

echo "\n<ajax-response><response type='object' id='".$id."_updater'>";
if (empty($id)) {
  ErrorResponse("No ID provided!");
} elseif ($distinct=="" && !is_numeric($offset)) {
  ErrorResponse("Invalid offset!");
} elseif ($distinct=="" && !is_numeric($size)) {
  ErrorResponse("Invalid size!");
} elseif ($distinct!="" && !is_numeric($distinct)) {
  ErrorResponse("Invalid distinct parameter!");
} elseif (!isset($_SESSION[$id])) {
  ErrorResponse("Your connection with the server was idle for too long and timed out. Please refresh this page and try again.");
} elseif (!OpenDB()) {
  ErrorResponse(htmlspecialchars($oDB->LastErrorMsg));
} else {
  $oDB->DisplayErrors=false;
  $oDB->ErrMsgFmt="MULTILINE";
  $oXmlResp= new ricoXmlResponse();
  $oXmlResp->sendDebugMsgs=true;
  $oXmlResp->convertCharSet=true;  // MySQL sample database is encoded with ISO-8859-1
  if ($distinct=="") {
    $oXmlResp->Query2xml($_SESSION[$id], intval($offset), intval($size), $total!="false", $_SESSION[$id . ".filters"]);
  } else {
    $oXmlResp->Query2xmlDistinct($_SESSION[$id], intval($distinct), 999, $_SESSION[$id . ".filters"]);
    echo "khjgkhjhjjjjjjjjjjjjjjjjjjj".$_SESSION[$id . ".filters"];
  }
  if (!empty($oDB->LastErrorMsg)) {
    echo "\n<error>";
    echo "\n".htmlspecialchars($oDB->LastErrorMsg);
    echo "\n</error>";
  }
  $oXmlResp=NULL;
  CloseApp();
}
echo "\n</response></ajax-response>";


function ErrorResponse($msg) {
  echo "\n<rows update_ui='false' /><error>" . $msg . "</error>";
}

?>