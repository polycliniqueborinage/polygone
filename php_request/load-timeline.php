<? 

$_xml = "<data>";
$_xml .= "<event start=\"May 28 2006 09:00:00 GMT\" end=\"May 28 2006 13:00:00 GMT\" isDuration=\"true\" title=\"Calcus\" image=\"http://simile.mit.edu/images/csail-logo.gif\">";
$_xml .= "A few days to write some documentation for &lt;a href=\"http://simile.mit.edu/timeline/\"&gt;Timeline&lt;/a&gt;.";
$_xml .= "</event>";
$_xml .= "</data>";

header ("Content-type: text/xml");

echo "$_xml";
  
?>
