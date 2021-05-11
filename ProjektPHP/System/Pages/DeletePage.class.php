<?php

require_once('./System/Util/AuthorizeUser.class.php');
require_once('./System/Util/GetApi.class.php');
require_once('./System/Util/PrintMovie.class.php');
require_once('./System/Util/GetUserInfo.php');
require_once('./System/Util/GetMovieInfo.php');
require_once('./System/Util/SaveDatabase.class.php');
require_once('./System/Util/DeleteMovieDb.class.php');
require_once('./System/Util/CheckForDuplicate.class.php');

class DeletePage {

    public function __construct() {

        if(AuthorizeUser::checkUser($_GET['name'], $_GET['pw']))
        {
            if(isset($_GET['movie'])) {

                $korisnik = new GetUserInfo($_GET['name'], $_GET['pw']);
                $movie = new GetMovieInfo($_GET['movie']);

                if(CheckForDuplicate::check($movie,$korisnik)) {
                    echo "Film ili nije upisan ili ne postoji u bazi.";
                }else {
                    DeleteMovieDb::deleteMovie($movie);
                    echo ("Film je uspiješno izbrisan.");
                }
            }
        }
    }
}