<?php

$q = strtolower($_GET["q"]);
if (!$q) return;
$items = array(
"Flandre-Occidentale"=>"Flandre-Occidentale",
"Flandre-Orientale"=>"Flandre-Orientale",
"Anvers"=>"Anvers",
"Limbourg"=>"Limbourg",
"Brabant Wallon"=>"Brabant",
"Brabant Flamand"=>"Brabant",
"Hainaut"=>"Hainaut",
"Lige"=>"Lige",
"Namur"=>"Namur",
"Luxembourg"=>"Luxembourg",
"Limbourg"=>"Limbourg"
);

foreach ($items as $key=>$value) {
    if (strpos(strtolower($key), $q) !== false) {
        echo "$q@$key|$value\n";
    }
}

?> 