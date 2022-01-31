<?php

include_once BASE_PATH . '/src/models/Employee.php';

class DashboardModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get() {
       
        $employees = [];

        try{
            
            $query = $this->db->connect()->query("SELECT * FROM employees");

            while($row = $query->fetch()){
                $employee = new Employee();
                $employee->id = $row['id'];
                $employee->name = $row['name'];
                $employee->lastName = $row['lastName'];
                $employee->email = $row['email'];
                $employee->gender = $row['gender'];
                $employee->age = $row['age'];
                $employee->streetAddress = $row['streetAddress'];
                $employee->city = $row['city'];
                $employee->state = $row['state'];
                $employee->postalCode = $row['postalCode'];
                $employee->phoneNumber = $row['phoneNumber'];

                array_push($employees, $employee);
            }
            return $employees;

        } catch (PDOException $e) {
            return [];
        }
    }
}