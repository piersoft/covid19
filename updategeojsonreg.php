<?php
// coronavirus_import-timeline_reg sheet2 (1923702993)
// prova --> 59550806
//https://docs.google.com/spreadsheets/d/e/2PACX-1vSRoFrktiAAw7mNVG_K_xcXWmNHNY25cP7hudVa8Pm6JzOSpF1HMoy-Da3A03kaBEX3mWNvtUY-WMs_/pub?gid=1923702993&single=true&output=csv
$contenuto1=file_get_contents("https://docs.google.com/spreadsheets/d/e/2PACX-1vSRoFrktiAAw7mNVG_K_xcXWmNHNY25cP7hudVa8Pm6JzOSpF1HMoy-Da3A03kaBEX3mWNvtUY-WMs_/pub?gid=1000241216&single=true&output=csv");
//echo $contenuto1;


$file1="/usr/www/piersoft/covid19/datageoreg.txt";


$fr1 = fopen($file1, 'w');
// inseriamo la riga
fwrite($fr1, $contenuto1);

fclose($fr1);


$fh = fopen('/usr/www/piersoft/covid19/datageoreg.txt','r');

$out = Array(
	'type' => 'FeatureCollection',
	'features' => Array()
);

/* First row is a heading. This is our key. */
$keys = fgetcsv($fh, 5000, ",");
$keys = array_flip($keys);
$colonne=0;

foreach ($keys as $key => $value) {
	$colonne++;
}

//echo $colonne;


while (($data = fgetcsv($fh, 3000, ",")) !== FALSE) {
if (strpos($data[2], '.') !== false && strlen($data[0]) >0) {
	$entry = Array(
		'type' => 'Feature',
		'geometry' => Array(
			'type' => 'Point',
			'coordinates' => Array((float)$data[3], (float)$data[2])
		),
		'properties' => Array(
			'id' => $data[0],
			'regione' => $data[1],


		)

	);
	$colonne1=array_keys($keys);
//echo count($colonne1);
	for ($i=1; $i < count($colonne1); $i++) {

	if ($colonne1[$i] !==440) $entry['properties'][$colonne1[$i]]=(int)$data[$i+2];
	}
	$out['features'][] = $entry;
}
}

//var_dump($colonne);
$json=json_encode($out);

$filej = "datareg.geojson";

$f = fopen($filej, "w");
fwrite($f, $json);
fclose($f);

echo $json;
//var_dump($json1);
//echo "finito";

  sendMessage($chatid,"finito import corretto per Regioni e Province CSV Coronavirus", $token);



 ?>
