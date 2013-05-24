<?
require "dbClass2.php";

require "../../../config/standard/config.php";

$appDB=$db_name;
$appUSER=$db_user;
$appPASS=$db_pass;

function CreateDbClass() {
  global $oDB;
  $oDB = new dbClass();
  //$oDB->Dialect="Oracle";
  //$oDB->Dialect="TSQL";
  //$oDB->Dialect="Access";
}

function OpenDB() {
  $_retval=false;
  CreateDbClass();
  return $GLOBALS['oDB']->MySqlLogon($GLOBALS['appDB'], $GLOBALS['appUSER'], $GLOBALS['appPASS']);
  //return $GLOBALS['oDB']->OdbcLogon("northwind2","Northwind","userid","password");
  //return $GLOBALS['oDB']->OracleLogon("XE","northwind","password");
}

function OpenApp($title) {
  $_retval=false;
  if (!OpenDB()) {
    return $_retval;
  }
  if (!empty($title)) {
    AppHeader($GLOBALS['appName']."-".$title);
  }
  $GLOBALS['accessRights']="rw";
  // CHECK APPLICATION SECURITY HERE  (in this example, "r" gives read-only access and "rw" gives read/write access)
  if (empty($GLOBALS['accessRights']) || !isset($GLOBALS['accessRights']) || substr($GLOBALS['accessRights'],0,1) != "r") {
    echo "<p class='error'>You do not have permission to access this application";
  }
  else {
    $_retval=true;
  }
  return $_retval;
}

function OpenTE($title, $tabname) {
  $_retval=false;
  if (!OpenApp($title)) {
    return $_retval;
  }
  $GLOBALS['oTE']= new TableEditClass();
  $GLOBALS['oTE']->SetTableName($tabname);
  $GLOBALS['oTE']->options["XMLprovider"]="ricoXMLquery.php";
  $CanModify=($GLOBALS['accessRights'] == "rw");
  $GLOBALS['oTE']->options["canAdd"]=$CanModify;
  $GLOBALS['oTE']->options["canEdit"]=$CanModify;
  $GLOBALS['oTE']->options["canDelete"]=$CanModify;
  session_set_cookie_params(60*60);
  $GLOBALS['sqltext']='.';
  return true;
}

function CloseApp() {
  global $oDB;
  if (is_object($oDB)) $oDB->dbClose();
  $oDB=NULL;
  $GLOBALS['oTE']=NULL;
}

function AppHeader($hdg) {
  echo "<h2 class='appHeader'>".str_replace("<dialect>",$GLOBALS['oDB']->Dialect,$hdg)."</h2>";
}
?>

