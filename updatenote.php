
<?php
$contenuto=file_get_contents("https://docs.google.com/spreadsheets/d/e/2PACX-1vRx5j3Xw7f7C3TmCShTTXCy7T8tFu0cV_GrHPf28lDOh8cZjsjGsD5xriQSsS7TMFejYqwPf93wsGS5/pub?gid=1540027436&single=true&output=csv");
$contenuto=str_replace("\n","</br>",$contenuto);
if( isset($contenuto) && ($contenuto!==null) ){
echo ($contenuto);
}
?>
