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


$parsed = get_string_between($page, 'data:', 'name:');

$parsed=str_replace("[[","[",$parsed);
$parsed=str_replace("]],","]",$parsed);
$parsed=str_replace("],[","|",$parsed);
$parsed=str_replace("[","",$parsed);
$parsed=str_replace("]","",$parsed);
$parsed=str_replace("\" ","\"",$parsed);
$parsed=str_replace(" \"","\"",$parsed);
$parsed=str_replace("\n","",$parsed);
//$parsed=str_replace("|","\n",$parsed);

$str = str_replace(array("\r\n", "\n", "\r"), ' ', $parsed);
$str=str_replace("|","\n",$str);

echo $str;
