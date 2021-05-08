<?php

class FetchPage
{
    
    public function __construct()
    {
        $this->code();
    }

    public function code()
    {
        $userid = 0;
        $name = $_GET['n'];
        $pass = $_GET['pw'];
        $save = $_GET['s'];
        $ocjena = $_GET['ocj'];
        $query="SELECT * from user where name='$name' and pass='$pass'";
        $result=AppCore::getDB()->sendQuery($query);
        if(mysqli_num_rows($result) == 1)
        {
            while($row = $result->fetch_assoc())
        {
            $userid = $row['id'];
        }
            echo "You are authorized!";
            echo "<br>";
        }
        else
        {
            echo "You are not authorized!";
            echo "<br>";
            exit();
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
        
        if($save == 'y')
        {
        $check = "SELECT * FROM film WHERE naziv='".$array["Title"]."' AND userid='".$userid."'" ;
        $rez=AppCore::getDB()->sendQuery($check);
        $numrow = mysqli_num_rows($rez);
        if($numrow > 0)
        {
            echo "<br><br>";
            echo "Duplikat.";
            exit();
        }

        $sql = "INSERT INTO film(naziv,god,zanr,ocjena,userid) VALUES ('".$array["Title"]."', '".$array["Year"]."', '".$array["Genre"]."', '".$ocjena."', '".$userid."')";
        $connect=AppCore::getDB()->sendQuery($sql);    
        echo'<br><br>';
        echo "Film spremljen.";

        }
    }
}