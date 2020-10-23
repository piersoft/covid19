<?php
//mortalit_map Foglio2
$contenuto1=file_get_contents("https://docs.google.com/spreadsheets/d/e/2PACX-1vR4iCaZRPJsARcb-64Yj3PllcYINrLPxqVyA_wNuGffsV1CDIHsWaV8kf36GlFSQ92yzoukpdCUnU1n/pub?gid=674299754&single=true&output=csv");
//echo $file;

$file1="/usr/www/piersoft/covid19/datadec.txt";


$fr1 = fopen($file1, 'w');
// inseriamo la riga
fwrite($fr1, $contenuto1);

fclose($fr1);


$fh = fopen('/usr/www/piersoft/covid19/datadec.txt','r');

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
if (strpos($data[3], '.') !== false) {
	$entry = Array(
		'type' => 'Feature',
		'geometry' => Array(
			'type' => 'Point',
			'coordinates' => Array((float)$data[4], (float)$data[3])
		),
		'properties' => Array(
			'id' => $data[0],
			'regione' => $data[2],
			'popolazione' => $data[1],


		)

	);

	$colonne1=array_keys($keys);
//echo count($colonne1);
	for ($i=2; $i < count($colonne1); $i++) {


//	if ($colonne1[$i] !==44)
		$entry['properties'][$colonne1[$i]]=(int)$data[$i+3];

	//	array_push($entry['properties'],$data[$i]);
	}
	$out['features'][] = $entry;
}
}
//var_dump($colonne);
$json=json_encode($out);

$filej = "datadec.geojson";

$f = fopen($filej, "w");
fwrite($f, $json);
fclose($f);

echo $json;
//var_dump($json1);
//echo "finito";

//  sendMessage($chatid,"finito import corretto per Regioni e Province CSV Coronavirus", $token);



 ?>
