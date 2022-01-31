<?php

// class Router 
// {
//     public function __construct() 
//     {
//         $url = isset($_GET['url']) ? $_GET['url'] : null;
//         $url = rtrim($url, '/');
//         $url = explode('/', $url);

//         $controller_file = CONTROLLERS . "/{$url[0]}Controller.php";
//         $controller = ucfirst($url[0]) . 'Controller';

//         if (file_exists($controller_file)) {
//             require_once $controller_file;
//             $controller = new $controller;

//             if (isset($url[1])) {
//                 $controller -> {$url[1]}();
//             }
//         }

//     }
// }



class Router
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        // si no hay controlador en la url
        // if (empty($url[0])) {
        //     $controller_file = 'controllers/main.php';
        //     require_once $controller_file;
        //     $controller = new Main();
        //     $controller->loadModel('main');
        //     $controller->render();
        //     return false;
        // }

        $controller_file = CONTROLLERS . "/{$url[0]}Controller.php";
        $controller = ucfirst($url[0]) . 'Controller';
        
        
        if (file_exists($controller_file)) {
            require_once $controller_file;
            $controller = new $controller;
            $controller->loadModel($url[0]);

            // numero de elementos del array de url
            $nparam = sizeof($url);

            if($nparam > 1) {
                if($nparam >2) {
                    $param = [];
                    for($i = 2; $i < $nparam; $i++) {
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                } else {

                    $controller -> {$url[1]}();
                }
            } else {
                $controller->render();
            }
        } else {
            require_once BASE_PATH . '/src/controllers/Errors.php';
            $controller = new Error_Page();
            
        }

    }
}