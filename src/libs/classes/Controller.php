<?php

class Controller
{
    protected $view;
    protected $model;

    function __construct()
    {
        $this->view = new View;
    }

    // function loadModel($name)
    // {
    //     require_once MODELS . "/{$name}Model.php";
    //     $name = ucfirst(strtolower($name));
    //     $model = "{$name}Model";
    //     $this->model = new $model;
    // }

    // protected function throw_error($code, $message)
    // {
    //     die(json_encode(['message' => $message, 'code' => $code]));
    // }

    // public static function isAjaxRequest()
    // {
    //     return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    // }
}