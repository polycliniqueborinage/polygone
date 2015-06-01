<?php 

	include("../init.php");

  if (!isset($_SESSION['userid'])) {
		$template->assign("loginerror", 0);
		$template->display("login.tpl");
	    die();
	}

	
?>

TITLE

<hr />

<input type="text" size="15" name="contact" id="contact" value=""/><br/>
<input type="text" size="15" name="motif" id="motif" value=""/><br/>
<input type="text" size="15" name="comment" id="comment" value=""/><br/>

<a href="#" class="jqmClose">Click me</a> ... or 
<button class="jqmClose">me</button> ... or 
<div class="jqmClose" style="display: inline; background-color:blue;color:white;padding:4px;">even me</div>.


