<?php

// Link : http://localhost/ProjektPHP/index.php?page=fetch&name=ivan&pw=123&movie=Se7en&ocijena=5


 require_once('./System/Util/AuthorizeUser.class.php');
 require_once('./System/Util/GetApi.class.php');
 require_once('./System/Util/PrintMovie.class.php');
 require_once('./System/Util/GetUserInfo.php');
 require_once('./System/Util/GetMovieInfo.php');
 require_once('./System/Util/SaveDatabase.class.php');
 require_once('./System/Util/CheckForDuplicate.class.php');
 
class FetchPage
{
    public function __construct() {

        if(AuthorizeUser::checkUser($_GET['name'], $_GET['pw']))
        {
            if(!isset($_GET['ocijena'])) {
            PrintMovie::printM(APIKEY, $_GET['movie']);
            }else {
                $korisnik = new GetUserInfo($_GET['name'], $_GET['pw']);
                $ocijena = $_GET['ocijena'];
                $movie = new GetMovieInfo($_GET['movie']);
                if(CheckForDuplicate::check($movie, $korisnik)) {
                    SaveDatabase::dodajUBazu($korisnik, $movie, $ocijena);
                }
                else {
                    echo "Film je već unesen u bazu.";
                }
            }

        }else {
            echo "Niste autorizirani.";
        }
    }
}