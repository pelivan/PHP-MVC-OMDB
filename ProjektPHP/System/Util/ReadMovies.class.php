<?php

require_once('./System/Util/AuthorizeUser.class.php');
require_once('./System/Util/PrintMovie.class.php');


class ReadMovies {
    
    public function __construct($korisnik) {
        $this->show($korisnik);
    }

    public function show($korisnik) {

        $sql = "SELECT * FROM film WHERE userid = '".$korisnik->userid."'";
        $result = AppCore::getDB()->sendQuery($sql);
        $rows = array();
        while($r = mysqli_fetch_array($result)) {
          $rows[] = $r;
        }

        if(sizeof($rows) === 0) {
            echo "Korisnik nema spremljenih filmova.";
        }else {
            echo json_encode($rows);
        }
    }
}