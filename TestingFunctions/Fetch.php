<?php
$imefilma = $_GET['ime'];
$_GET['ime'] = $imefilma;
$key = "c11a1b3a";
$movie = file_get_contents("http://www.omdbapi.com/?apikey=$key&t=$imefilma");
    $array = json_decode($movie,true);

    echo '<tr>'.$array['Title'].'</tr>';
    echo '<br>';
    echo '<tr>'.$array['Year'].'</tr>';
    echo '<br>';
    echo '<tr>'.$array['Genre'].'</tr>';   

echo($imefilma);

?>