<?php
$name = $_GET['n'];
$pass = $_GET['pw'];
$connect = mysqli_connect("localhost","root","","testing");
$query="SELECT * from user where name='$name' and pass='$pass'";
$result=mysqli_query($connect,$query);
if(mysqli_num_rows($result) == 1)
{
    echo "Uspjesno ste prijavljeni!";
    echo "<br>";
}
$imefilma = $_GET['ime'];
$_GET['ime'] = $imefilma;
$key = "c11a1b3a";
$movie = file_get_contents("http://www.omdbapi.com/?apikey=$key&t=$imefilma");
    $array = json_decode($movie,true);
    echo '<br>';
    echo '<tr>'.$array['Title'].'</tr>';
    echo '<br>';
    echo '<tr>'.$array['Year'].'</tr>';
    echo '<br>';
    echo '<tr>'.$array['Genre'].'</tr>';   

echo($imefilma);


?>