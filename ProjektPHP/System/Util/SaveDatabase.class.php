<?php
// $korisnik, $movie, $ocijena
class SaveDatabase {

    public static function dodajUBazu($korisnik, $movie, $ocijena) {
        $sql = "INSERT INTO film(naziv,god,zanr,ocijena,userid,movieid) VALUES ('".$movie->naziv."', '".$movie->god."', '".$movie->zanr."', '".$ocijena."', '".$korisnik->userid."', '".$movie->movieid."')";
        AppCore::getDB()->sendQuery($sql); 
        echo "Film spremljen.";
    }
}