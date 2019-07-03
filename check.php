<?php

    header("Content-type: text/javascript");
    $IDBashed = $_GET['id'];
    $ID10 = base64_decode($IDBashed);
    $ID = substr($ID10, 0, 5);
    $REFERER = $_SERVER['HTTP_REFERER'];
if ( strpos($REFERER, $ID) == true ) {
    $ReponseJSON = file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/'.$ID.'.json'); // Change http to https (optional, but important :v)
    $ReponseArray = json_decode($ReponseJSON, true);
    $URLDrive = $ReponseArray['drive_url'];
    $IDDrive = substr($URLDrive, 33, strlen($URLDrive)); // Fix ID Google :v, P/s: Đếm lộn rồi Hiệp :D
    //preg_match_all('#content="(.+?)"><#', CURL($URLDrive.'/edit'), $ArrayTitle);
    //$Title = $ArrayTitle[1][3];
     echo json_encode(array(
        'id' => $ID,
        'drive_id' => $IDDrive,
        //'filename' => $Title,
        'poster' => $ReponseArray['poster'],
        'logo' => $ReponseArray['logo'],
        'added_on' => $ReponseArray['date'],
        'file' => 'https://www.googleapis.com/drive/v3/files/'.$IDDrive.'?alt=media&key=<API KEY>' // Add Drive APi :v
    )); 
   }
else {
       echo 'Method Incorrect!!';
   }
