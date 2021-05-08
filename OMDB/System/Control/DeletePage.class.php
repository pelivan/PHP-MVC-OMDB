<?php

class DeletePage
{
    public function __construct()
    {
        $this->code();
    }

    public function code()
    {
        $name = $_GET['n'];
        $pass = $_GET['pw'];
        $delete = $_GET['d'];
        $imefilma = $_GET['ime'];
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
            exit();
        }
        // $check = "DELETE FROM film WHERE naziv='".$imefilma.'";
        $check = "DELETE FROM film WHERE naziv = '$imefilma' ";
        var_dump($imefilma);
        $rez=AppCore::getDB()->sendQuery($check);
        echo 'Movie deleted';
    }



}
