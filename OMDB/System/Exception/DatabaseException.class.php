<?php

class DatabaseException extends Exception
{
    public function __construct($message = "",$code = 0,$previous = null)
    {
        parent::__construct($message,$code,$previous);
    }
    public function show() {
        return ("Error: " . $this->getMessage() . "File: " . $this->getFile() . "Linija: " . $this->getLine() . "StackTrace: "  . $this->getTraceAsString());
    }
}

// MySQL vrati grešku , opis greške i kod greške - database exception