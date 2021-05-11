<?php

class PrintMovie {

    public static function printM() {
        print(GetApi::getMovie(APIKEY, $_GET['movie']));
    }
}