<?php

class UpdateMovie {

    public static function update($movie,$korisnik,$ocijena) {

        $sql = "UPDATE film SET ocijena = '$ocijena' WHERE movieid='".$movie->movieid."' AND userid='".$korisnik->userid."'";
        AppCore::getDB()->sendQuery($sql);
    }
}

