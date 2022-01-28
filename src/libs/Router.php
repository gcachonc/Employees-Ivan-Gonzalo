<?php
class Router 
{
    public function __construct() 
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $controller_file = CONTROLLERS . "/{$url[0]}Controller.php";
        $controller = ucfirst($url[0]) . 'Controller';

        if (file_exists($controller_file)) {
            require_once $controller_file;
            $controller = new $controller;
        }

    }
}
