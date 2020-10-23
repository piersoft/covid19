<?php

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}


$page = file_get_contents('https://www.dep.lazio.it/covid/covid_map.php');


//$page=str_replace($page,"data:   [[","<prova>");
//$page=str_replace($page,"]]","]]nome");
$data=get_string_between($page,"aggiornati al "," ");
$data=str_replace("-","/",$data);
//echo $data;

$parsed = get_string_between($page, 'date:"'.$data.'",data:', '];');

//$parsed=str_replace("[[","[",$parsed);
//$parsed=str_replace("]],","]",$parsed);
//$parsed=str_replace("],[","|",$parsed);
$parsed=str_replace("[","",$parsed);
$parsed=str_replace("]","",$parsed);
//$parsed=str_replace("\" ","\"",$parsed);
//$parsed=str_replace(" \"","\"",$parsed);
//$parsed=str_replace("\n","",$parsed);
//$parsed=str_replace("|","\n",$parsed);

$str = str_replace(array("\r\n", "\n", "\r"), ' ', $parsed);
$str=str_replace(",","\n",$str);
$str=str_replace("}","\n",$str);

echo $str;
