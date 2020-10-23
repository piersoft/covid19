<?php

$file=file_get_contents("https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-province/dpc-covid19-ita-province.csv");
// You can use an array to store your search words, makes things more flexible.
// Supports any number of search words.
//$ieri=date("Y-m-d", time() - 60 * 60 * 24);
$ieri=date("Y-m-d", time());

//echo $ieri;
$Data = str_getcsv($file, "\n"); //parse the rows
foreach($Data as &$Row){
  if (strpos($Row, $ieri) !== false) {
  echo $Row."\n";
}
} //$Row = str_getcsv($Row, ";"); //parse the items in rows
//echo $Row."\n";
//echo $file;

 ?>
