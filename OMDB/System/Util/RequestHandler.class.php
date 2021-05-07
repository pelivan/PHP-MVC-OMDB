<?php

class RequestHandler {


    public function __construct($className)
    {
        $className = $className.'Page';
        $classPath = 'C:/xampp/htdocs/OMDB/System/Control/' . $className . '.class.php'; // Ovo smo dodali...
        //var_dump($classPath);
        // $classPath = __DIR__ . 'inc/system/pages' . $className . '.class.php';

        if (!preg_match('/^[a-z0-9_]+$/i', $className) || !file_exists($classPath)) {
            //throw new RuntimeException();
            //throw new Exception();
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