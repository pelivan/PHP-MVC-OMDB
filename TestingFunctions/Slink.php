<?php
$connect = mysqli_connect("localhost","root","","testing");
$key = "c11a1b3a";
$imefilma = $_GET['ime'];
$save = $_GET['save'];
$_GET['ime'] = $imefilma;
$key = "c11a1b3a";
$movie = file_get_contents("http://www.omdbapi.com/?apikey=$key&t=$imefilma&save=$save");
    $array = json_decode($movie,true);


if($save == "true")
{
$sql = "INSERT INTO test(naziv,god,zanr) VALUES ('".$array["Title"]."', '".$array["Year"]."', '".$array["Genre"]."')";
mysqli_query($connect,$sql);

echo'<br>';
echo "Film spremljen.";
}
else
{
    echo "Ma mrs";
}



?>

