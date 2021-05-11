<?php

require_once('./System/Util/AuthorizeUser.class.php');
require_once('./System/Util/GetApi.class.php');
require_once('./System/Util/PrintMovie.class.php');
require_once('./System/Util/GetUserInfo.php');
require_once('./System/Util/GetMovieInfo.php');
require_once('./System/Util/SaveDatabase.class.php');
require_once('./System/Util/DeleteMovieDb.class.php');
require_once('./System/Util/CheckForDuplicate.class.php');
require_once('./System/Util/UpdateMovie.class.php');

class UpdatePage {

    public function __construct() {

        if(AuthorizeUser::checkUser($_GET['name'], $_GET['pw']))
        {
            if(isset($_GET['movie']) && isset($_GET['ocijena'])) {

                $korisnik = new GetUserInfo($_GET['name'], $_GET['pw']);
                $ocijena = $_GET['ocijena'];
                $movie = new GetMovieInfo($_GET['movie']);

                if(CheckForDuplicate::check($movie,$korisnik)) {
                    echo "Film ili nije upisan ili ne postoji u bazi.";
                }else {
                   UpdateMovie::update($movie, $korisnik, $ocijena);
                   echo "Podatci su promijenjeni...";
                }
            }
        }
    }
}