<?php
require_once BASE_PATH . '/config/db.php';

class Model
{
    function __construct()
    {
        $this->db = new Database();
    }
}