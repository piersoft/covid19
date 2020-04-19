<?php

$token = "bot125236170:AAGK-sfU6VRB78on9lCthSiWWhi8_zcyQFI";
$chatid = "69668132";

function sendMessage($chatID, $messaggio, $token) {
  //echo "sending message to " . $chatID . "\n";


    $url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

/*
$contenuto=file_get_contents("https://docs.google.com/spreadsheets/d/e/2PACX-1vRx5j3Xw7f7C3TmCShTTXCy7T8tFu0cV_GrHPf28lDOh8cZjsjGsD5xriQSsS7TMFejYqwPf93wsGS5/pub?gid=876263882&single=true&output=csv");
$file="/usr/www/piersoft/covid19/data.txt";

if( isset($contenuto) && ($contenuto!==null) ){
//  header("Location:http://".get_ip_address());
$fr = fopen($file, 'w');
// inseriamo la riga
fwrite($fr, $contenuto);
echo ('province ok');
sendMessage($chatid,"finito import Province CSV Coronavirus", $token);
// chiudiamo il file
fclose($fr);
}else{
  header("Location:http://www.piersoft.it/update.php");
}
echo "</br>\n";
*/
//https://docs.google.com/spreadsheets/d/e/2PACX-1vRx5j3Xw7f7C3TmCShTTXCy7T8tFu0cV_GrHPf28lDOh8cZjsjGsD5xriQSsS7TMFejYqwPf93wsGS5/pub?gid=180193173&single=true&output=csv
$contenuto="";
$contenuto1=file_get_contents("https://docs.google.com/spreadsheets/d/e/2PACX-1vRx5j3Xw7f7C3TmCShTTXCy7T8tFu0cV_GrHPf28lDOh8cZjsjGsD5xriQSsS7TMFejYqwPf93wsGS5/pub?gid=180193173&single=true&output=csv");

/*
if( isset($contenuto1) && ($contenuto1!==null) ){


}else {
header("Location:http://www.piersoft.it/update.php");

}
*/

$search = 'SIGLA';
if (strpos($contenuto,$search) !== false) {
$file1="/usr/www/piersoft/covid19/datageo.txt";

//    $fr1 = fopen($file1, 'w');
    // inseriamo la riga
//    fwrite($fr1, $contenuto1);
    echo ('regioni ok');
    // chiudiamo il file
//    fclose($fr1);
//  sendMessage($chatid,"finito import Regioni CSV Coronavirus", $token);
  echo ($contenuto1);

echo "</br>\n";
echo "</br>\n";

  $contenuto=file_get_contents("https://docs.google.com/spreadsheets/d/e/2PACX-1vT_tOO1Bg5CKlW8l9cnHyVrI55bD5VKKoMZanFETS6POUsryLbsdQ5fk96Y49U5cO77BjB0HZ4RKhTF/pub?gid=1923702993&single=true&output=csv");
  //echo $file;

  $file="/usr/www/piersoft/covid19/datageojson.txt";


  $fr = fopen($file, 'w');
  // inseriamo la riga
  fwrite($fr, $contenuto);

  fclose($fr);


  $fh = fopen('/usr/www/piersoft/covid19/datageojson.txt','r');

  $out = Array(
  	'type' => 'FeatureCollection',
  	'features' => Array()
  );

  /* First row is a heading. This is our key. */
  $keys = fgetcsv($fh, 1000, ",");
  $keys = array_flip($keys);
  $colonne=0;

  foreach ($keys as $key => $value) {
  	$colonne++;
  }

  //echo $colonne;


  while (($data = fgetcsv($fh, 1000, ",")) !== FALSE) {

  	$entry = Array(
  		'type' => 'Feature',
  		'geometry' => Array(
  			'type' => 'Point',
  			'coordinates' => Array((float)$data[5], (float)$data[4])
  		),
  		'properties' => Array(
  			'id' => $data[0],
  			'popolazione' => (int)$data[1],
  			'name' => $data[$keys['denominazione_provincia']],
  			'sigla_provincia' => $data[$keys['sigla_provincia']],

  		)

  	);
  	$colonne1=array_keys($keys);

  	for ($i=4; $i < $colonne.lenght; $i++) {


  		$entry['properties'][$colonne1[$i]]=(int)$data[$i+3];
  	//	array_push($entry['properties'],$data[$i]);
  	}
  	$out['features'][] = $entry;
  }

  //var_dump($colonne);
  $json=json_encode($out);

  $filej = "data.geojson";

  $f = fopen($filej, "w");
  fwrite($f, $json);
  fclose($f);

  echo $json;
  //var_dump($json1);
  //echo "finito";


}else{
    echo 'errore!! riprova tra 10 secondi';

echo ($contenuto);
    //sleep(10);
    /*
    while ($a <= 9) {
      echo ('Riprova tra '.(10-$a).' secondi</br>');
      sleep(1);
    }
  //  header("Location:http://www.piersoft.it/covid19/update.php");
*/
}


 ?>
