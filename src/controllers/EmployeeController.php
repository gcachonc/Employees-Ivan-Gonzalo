<?php

class EmployeeController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->mensaje = "";
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
            $this->view->mensaje = "Employee succesfully updated";

        } else {
            // mensaje de error
            //$this->view->mensaje = "Error al actualizar el alumno";
            $this->view->mensaje = $this->model->message;
        }
        $this->view->render('employee/employeeInfo');
    }

    
    function render() {
        $this->view->render('employee/addNewEmployee');
    }
    
    function addNewEmployee() {

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

        $result = $this->model->insert([ 
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
        
        $mensaje = "";
        
        if($result) {
            $mensaje = "Nuevo alumno creado";
        } else {
            $mensaje = "Error al crear el alumno";
        }
        
        $this->view->mensaje = $this->model->message;
        $this->render();
    }


    function deleteEmployee($param = null) {
        $id = $param[0];
        //unset($_SESSION['id_verAlumno']);
        
        $result = $this->model->delete($id);
    
        //if($result) {
            //actualizar alumno exito sync
            //$this->view->mensaje = "Alumno eliminado correctamente";
            //$this->view->mensaje = $this->model->message;
            //$mensaje = "Alumno eliminado correctamente";
        //} else {
            // mensaje de error sync
            //$this->view->mensaje = "Error al eliminar el alumno";
    
           // $this->view->mensaje = $this->model->message;
            //$mensaje = "Error al eliminar el alumno";
        //}
        //$this->render();
        //echo $mensaje;
    }
}