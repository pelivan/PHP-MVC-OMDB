<?php

class AuthorizeUser {
    
    public static function checkUser($name, $pass) {

        if(isset($name) && isset($pass)) {
            
             $query = "SELECT * FROM user WHERE name= '".$name."' AND pass= '".$pass."'";
             $result = AppCore::getDB()->sendQuery($query);

            if(mysqli_num_rows($result) === 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}