<?php
//coronavirus_import-timeline_prov Sheet2
$contenuto1=file_get_contents("https://docs.google.com/spreadsheets/d/e/2PACX-1vT_tOO1Bg5CKlW8l9cnHyVrI55bD5VKKoMZanFETS6POUsryLbsdQ5fk96Y49U5cO77BjB0HZ4RKhTF/pub?gid=1923702993&single=true&output=csv");
//echo $file;

$file1="/usr/www/piersoft/covid19/datageojson.txt";


$fr1 = fopen($file1, 'w');
// inseriamo la riga
fwrite($fr1, $contenuto1);

fclose($fr1);


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
//echo count($colonne1);
	for ($i=3; $i < count($colonne1); $i++) {


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


$contenuto1=file_get_contents("https://docs.google.com/spreadsheets/d/e/2PACX-1vSRoFrktiAAw7mNVG_K_xcXWmNHNY25cP7hudVa8Pm6JzOSpF1HMoy-Da3A03kaBEX3mWNvtUY-WMs_/pub?gid=1923702993&single=true&output=csv");
//echo $file;

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


		$entry['properties'][$colonne1[$i]]=(int)$data[$i+2];
	//	array_push($entry['properties'],$data[$i]);
	}
	$out['features'][] = $entry;
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



 ?>
