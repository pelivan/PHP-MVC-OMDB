<?php

class CheckForDuplicate {

    // Nazovi drukcije klasu jer cemo provjeravat istu stvar i kod brisanja filma odnosno postoji li 
    // film i korisnik upisani u bazu.....

    public static function check($movie, $korisnik) {

        $check = "SELECT * FROM film WHERE movieid='".$movie->movieid."' AND userid='".$korisnik->userid."'" ;
        $rez=AppCore::getDB()->sendQuery($check);
        $numrow = mysqli_num_rows($rez);
        if($numrow > 0)
        {
            return false;
        }
        return true;
    }
}