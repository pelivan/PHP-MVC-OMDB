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
        // $e->show();
    }

    public function initDB()
    {
        require ('./System/config.inc.php');
        require ('./System/Model/MySQLiDatabase.class.php');

        // Na ovo se vrati
         self::$dbObj = new MySQLiDatabase(DB_HOST, DB_USER, DB_PASS, DB_NAME); 

    }
    
    public static final function getDB()
    {
        return self::$dbObj;
    }

    
    public function initOptions() {
        require ('./System/options.inc.php');
    }
    
    //Definirati autoload funkciju koja učitava sve klase iz util mape.
    public static function autoload($className) {

    }
}

?>