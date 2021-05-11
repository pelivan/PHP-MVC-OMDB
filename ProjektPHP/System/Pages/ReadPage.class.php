<?php

require_once('./System/Util/AuthorizeUser.class.php');
require_once('./System/Util/GetUserInfo.php');
require_once('./System/Util/ReadMovies.class.php');

class ReadPage {

    public function __construct() {

        if(AuthorizeUser::checkUser($_GET['name'], $_GET['pw']))
        {
            $korisnik = new GetUserInfo($_GET['name'], $_GET['pw']);
            new ReadMovies($korisnik);
        } else {
            echo "Niste autorizirani...";
        }
    }
}