<?php

include_once BASE_PATH . '/src/models/Employee.php';

class EmployeeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->message = "";
    }

    public function getById($id) {
        $employee = new Employee();

        $query = $this->db->connect()->prepare("SELECT * FROM employees WHERE id = :id");
        try {
            $query->execute(['id' => $id]);

            while($row = $query->fetch()) {
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
            }

            return $employee;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function update($item) {
        $query = $this->db->connect()->prepare("UPDATE employees SET name = :name, lastName = :lastName, email = :email, gender = :gender, age = :age, streetAddress = :streetAddress, city = :city, state = :state, postalCode = :postalCode, phoneNumber = :phoneNumber WHERE id = :id");

        try {
            $query->execute([
                'id' => $item['id'],
                'name' => $item['name'],
                'lastName' => $item['lastName'],
                'email' => $item['email'],
                'gender' => $item['gender'],
                'age' => $item['age'],
                'streetAddress' => $item['streetAddress'],
                'city' => $item['city'],
                'state' => $item['state'],
                'postalCode' => $item['postalCode'],
                'phoneNumber' => $item['phoneNumber']
            ]);
            return true;
        } catch (PDOException $e) {
            //return false;
            $this->message = "The user could not be added.<br>".$e->getMessage();
            //echo "The user could not be added.<br>".$e->getMessage();
        }
    }

    public function insert($data) {
        var_dump($data);
        try{
            //Insertar datos en la db
            $query = $this->db->connect()->prepare("INSERT INTO employees (name, lastName, email, gender, age, streetAddress, city, state, postalCode, phoneNumber) VALUES (:name, :lastName, :email, :gender, :age, :streetAddress, :city, :state, :postalCode, :phoneNumber)");
            $query->execute([
                'name' => $data['name'],
                'lastName' => $data['lastName'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'age' => $data['age'],
                'streetAddress' => $data['streetAddress'],
                'city' => $data['city'],
                'state' => $data['state'],
                'postalCode' => $data['postalCode'],
                'phoneNumber' => $data['phoneNumber']
            ]);
            return true;
        } catch(PDOException $e) {
            $this->message = "The user could not be added.<br>".$e->getMessage();
            return false;
        }
    }

    public function delete($id) {
        $query = $this->db->connect()->prepare("DELETE FROM employees WHERE id = :id");

        try {
            $query->execute([
                'id' => $id,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
            //$this->message = "The user could not be added.<br>".$e->getMessage();
        }
     }
}