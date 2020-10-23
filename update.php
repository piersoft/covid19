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
$contenuto="";
$contenuto=file_get_contents("https://docs.google.com/spreadsheets/d/e/2PACX-1vRx5j3Xw7f7C3TmCShTTXCy7T8tFu0cV_GrHPf28lDOh8cZjsjGsD5xriQSsS7TMFejYqwPf93wsGS5/pub?gid=180193173&single=true&output=csv");
$search = 'SIGLA';
$search1 = '#';

if (strpos($contenuto,$search) !== false && strpos($contenuto,$search1) === false) {
$file1="/usr/www/piersoft/covid19/datageo.txt";
    $fr1 = fopen($file1, 'w');
    // inseriamo la riga
    fwrite($fr1, $contenuto);
  //  echo ('regioni ok');
    // chiudiamo il file
    fclose($fr1);
  echo ($contenuto);

echo "</br>\n";
echo "</br>\n";
sleep(3);

  sendMessage($chatid,"finito import corretto per Regioni e Province CSV Coronavirus", $token);


}else{
    echo 'errore!! riprova tra 2 minuti';
    echo "</br>\n";
    echo "</br>\n";
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
