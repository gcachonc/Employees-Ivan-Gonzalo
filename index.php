<?php

// Include the required constants
require_once './config/constants.php';
require_once './config/db.php';


// Include the router
require_once LIBS . '/Database.php';
// Include the base classes
include LIBS . '/classes/Controller.php';
include LIBS . '/classes/Model.php';
include LIBS . '/classes/View.php';
require_once LIBS . '/Router.php';



$router = new Router();

