<?php

class EmployeeController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function dashboard()
    {
        $this->view->render("employee/dashboard");
    }
}