<?php
$name = $_GET['n'];
$pass = $_GET['pw'];
$connect = mysqli_connect("localhost","root","","testing");
$query="SELECT * from user where name='$name' and pass='$pass'";
$result=mysqli_query($connect,$query);
if(mysqli_num_rows($result) == 1)
{
    echo "Auth!";
}




?>
