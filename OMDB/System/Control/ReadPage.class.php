<?php

class ReadPage
{
    public function __construct()
    {
        $name = $_GET['n'];
        $pass = $_GET['pw'];
        $query="SELECT * from user where name='$name' and pass='$pass'";
        $result=AppCore::getDB()->sendQuery($query);
        if(mysqli_num_rows($result) == 1)
        {
            echo "You are authorized!";
            echo "<br>";
        }
        else
        {
            echo "You are not authorized!";
            echo "<br>";
        }

 
        $check = "SELECT * FROM film";
        $rez=AppCore::getDB()->sendQuery($check);
        while($row = $rez->fetch_assoc()){
            echo "<table><tr><td>".$row['naziv']."</td><td>".$row['god']."</td><td>".$row['zanr']."</td><td>".$row['ocjena']."</td></tr></table>";
        }
        
        
    }
}