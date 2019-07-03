<?php
    header("Content-type: text/javascript");
    $IDBashed = $_GET['id'];
    $ID10 = base64_decode($IDBashed);
    $ID = substr($ID10, 0, 5);
    $REFERER = $_SERVER['HTTP_REFERER'];
if ( strpos($REFERER, $ID) == true ) {
    $ReponseJSON = file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/link/'.$ID.'.json'); // Load JSON file. P/s: Change http to https if you use SSL :v
    $ReponseArray = json_decode($ReponseJSON, true);
    $URLDrive = $ReponseArray['drive_url'];
    $IDDrive = substr($URLDrive, 33, strlen($URLDrive));
    //preg_match_all('#content="(.+?)"><#', CURL($URLDrive.'/edit'), $ArrayTitle);
    //$Title = $ArrayTitle[1][3];
     echo json_encode(array(
        'id' => $ID,
        'drive_id' => $IDDrive,
        //'filename' => $Title,
        'poster' => $ReponseArray['poster'],
        'logo' => $ReponseArray['logo'],
        'added_on' => $ReponseArray['date'],
         'subtitle' => $ReponseArray['subtitle'],
        'file' => 'https://www.googleapis.com/drive/v3/files/'.$IDDrive.'?alt=media&key=<Your Drive API Key>'
    )); // Add you Drive API Key :v
   }
else {
       echo 'Method Incorrect!!';
   }
