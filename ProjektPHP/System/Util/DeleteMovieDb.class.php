<?php

class DeleteMovieDb {

    public static function deleteMovie($movie) {
            $check = "DELETE FROM film WHERE movieid = '$movie->movieid' ";
            AppCore::getDB()->sendQuery($check);
    }
}