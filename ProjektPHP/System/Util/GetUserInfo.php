<?php

class GetUserInfo {

    // Atributi neka budu private, ali dodaj getere i setere

    public  $userid;
    public  $name;
    public  $pass;

    public function __construct($name, $pass) {
        $this->name=$name;
        $this->pass=$pass;
        $this->getId(); // Dodaj ID....
    }

    private function getId() {
        $query="SELECT * from user where name='$this->name' and pass='$this->pass'";
        $result=AppCore::getDB()->sendQuery($query);
        if(mysqli_num_rows($result) == 1)
        {
            while($row = $result->fetch_assoc())
            {
            $this->userid = $row['id'];
            }
        }
    }
}

?>