<?php

//$documentRoot = dirname(__FILE__);
$documentRoot = getcwd();

//BASE PATH -> FOR REFERENCE FILES
define("BASE_PATH", $documentRoot);


define('PROTOCOL', (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://');
define('DOMAIN', $_SERVER['HTTP_HOST']);
define('BASE_URL', preg_replace("/\/$/", '', PROTOCOL . DOMAIN . str_replace(array('\\', "index.php", "index.html"), '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))), 1) . '/');

//LIBS
define("LIBS", BASE_PATH . '/src/libs');

//CONTROLLERS
define("CONTROLLERS", BASE_PATH . '/src/controllers');

//VIEWS
define("VIEWS", BASE_PATH . '/src/views');

//MODELS
define("MODELS", BASE_PATH . '/src/models');

//ENTITIES
define("ENTITIES", MODELS . '/src/entities');

//CSS
define('CSS', BASE_URL . '/public/assets/css');

//JS
define('JS', BASE_URL . '/public/assets/js');

//PARTIALS
define('PARTIALS', BASE_PATH . '/public/assets/partials');

// QUERIES
define("QUERIES", BASE_PATH . '/db');
