<?php
    $Drive_URL = $_POST['drive_url'];
    $Logo_URL = $_POST['logo'];
    $Subtitle_URL = $_POST['subtitle'];
    $Poster_URL = $_POST['poster'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $GetTime = date('H:i:s d-m-Y', time());
    //echo '<label class="font-weight-bold">Link</label>
    //<textarea class="form-control" style="resize: none;">haaa</textarea>';
    $PermittedChars = '0123456789abcdefghijklmnopqrstuvwxyz'; // Update permittedchars :v
    $RanDomKey = substr(str_shuffle($PermittedChars), 0, 5);
    $ArrayDrive = array(
        'date' => $GetTime,
        'drive_url' => $Drive_URL,
        'logo' => $Logo_URL,
        'subtitle' => $Subtitle_URL,
        'poster' => $Poster_URL
    );
    file_put_contents($RanDomKey.'.json', json_encode($ArrayDrive));
    
    echo '<label class="font-weight-bold">Link</label>
    <textarea class="form-control" style="resize: none;">http://'.$_SERVER['SERVER_NAME'].'/media.php?id='.$RanDomKey.'</textarea>'; // Change http to https (Optional but important :v)
