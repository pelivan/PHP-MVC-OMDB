<?php

class GetApi {

    public static function getMovie($key, $imeFilma) {
        $movie = file_get_contents("http://www.omdbapi.com/?apikey=$key&t='".$imeFilma."'");
        return json_decode(json_encode($movie, JSON_FORCE_OBJECT), JSON_PRETTY_PRINT);
    }
}