<?php

class DashboardController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->employees = [];
        //$this->view->render("dashboard/index");
    }

    function render() {
        $employees =  $this->model->get();
        $this->view->employees = $employees;
        $this->view->render('dashboard/index');
    }
}