<?php

class UpdatePage
{
    public function __construct()
    {
        $this->code();
    }

    public function code()
    {
        $name = $_GET['n'];
        $pass = $_GET['pw'];
        $imefilma = $_GET['ime'];
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
        //UPDATE film SET ocjena = 1 WHERE naziv = Texas AND userid = 4
        $check = "UPDATE film SET ocjena = '$ocjena' WHERE naziv='".$imefilma."' AND userid='".$userid."'";
        $rez=AppCore::getDB()->sendQuery($check);
        echo 'Movie updated';
    }
}