<?php

class EmployeeController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function getEmployee($param = null) {
        $idEmployee = $param[0];
        $employee = $this->model->getById($idEmployee);

        //session_start();
        //$_SESSION['id_veremployee'] = $employee->matricula;
        $this->view->employee = $employee;
        $this->view->render('employee/employeeInfo');
    }

    function updateEmployee() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $id = $url[2];
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];
        $streetAddress = $_POST['streetAddress'];
        $state = $_POST['state'];
        $age = $_POST['age'];
        $postalCode = $_POST['postalCode'];
        $phoneNumber = $_POST['phoneNumber'];

        $result = $this->model->update([
            'id' => $id, 
            'name' => $name, 
            'lastName' => $lastName, 
            'email' => $email, 
            'gender' => $gender, 
            'city' => $city, 
            'streetAddress' => $streetAddress, 
            'state' => $state, 
            'age' => $age, 
            'postalCode' => $postalCode, 
            'phoneNumber' => $phoneNumber 
        ]);

        if($result) {
            //actualizar alumno exito
            $employee = new Employee();
            $employee->name = $name;
            $employee->lastName = $lastName;
            $employee->email = $email;
            $employee->gender = $gender;
            $employee->city = $city;
            $employee->streetAddress = $streetAddress;
            $employee->state = $state;
            $employee->age = $age;
            $employee->postalCode = $postalCode;
            $employee->phoneNumber = $phoneNumber;

            $this->view->employee = $employee;
            $this->view->mensaje = "Employee succes updated";

        } else {
            // mensaje de error
            //$this->view->mensaje = "Error al actualizar el alumno";
            $this->view->mensaje = $this->model->message;
        }
        $this->view->render('employee/employeeInfo');
    }
}