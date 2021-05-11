<?php

class RequestHandler {


    public function __construct($className)
    {
        $className = $className.'Page';
        $classPath = 'C:/xampp/htdocs/ProjektPHP/System/Pages/' . $className . '.class.php';


        if (!preg_match('/^[a-z0-9_]+$/i', $className) || !file_exists($classPath)) {

        }

        //include class

        require_once($classPath);

        // execute class

        if(!class_exists($className)) {
            throw new SystemException("Class '".$className."' not found");
        }
        new $className();

    }

    public static function handle() {
        if (!empty($_GET['page']) || !empty($_POST['page'])) {
            new RequestHandler((!empty($_GET['page']) ? $_GET['page'] : $_POST['page']));
        } else {
            new RequestHandler('Index');
        }
    }

}

?>