<?php

require ('./System/core.functions.php');
require ('./System/Util/RequestHandler.class.php');

require ('./System/Exception/SystemException.class.php');   


class AppCore 
{
    protected static $dbObj;

    public function __construct() 
    {
        $this->initDB();
        $this->initOptions();
        RequestHandler::handle();
    }

    public function handleException($e)
    {
            //var_dump($e); exit();
            try {
                //$e->show();
            }
            catch (Exception $e2) {
                print ("Ne mogu uvatit iznimku." );
            }
    }

    public function initDB()
    {
        require ('./System/config.inc.php');
        require ('./System/Model/MySQLiDatabase.class.php');

        // Na ovo se vrati
         self::$dbObj = new MySQLiDatabase($host, $user, $password, $database); 

    }
    
    public static final function getDB()
    {
        return self::$dbObj;
    }

    // Vrati se na ovo
    /*
    9. Unutar konstruktora iz zadatka 6. pozvati metodu initOptions() koja 
    učitava datoteku system/options.inc.php
    */
    public function initOptions() {
        require ('./System/options.inc.php');
    }

    //Definirati autoload funkciju koja učitava sve klase iz util mape.
    public function autoload($className) {
    }
}

?>