<?php

class LoginController extends Controller
{
    function __construct()
    {
        parent::__construct();

        $this->view->render('login/index');
    }

    public function loginUser() {
        // Pick up the fields from the login page
        $email = $_POST['email'];
        $password = $_POST['password'];

        $this->model->login($email, $password);
    }
}