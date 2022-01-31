<?php

class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function login($email, $password)
    {
        
    }
    // public function login($datos) {
    //     //Insertar datos en la db
    //     $query = $this->db->connect()->prepare('INSERT INTO ALUMNOS (MATRICULA, NOMBRE, APELLIDO) VALUES (:matricula, :nombre, :apellido)');
    //     $query->execute(['matricula' => $datos['matricula'], 'nombre' => $datos['nombre'], 'apellido' => $datos['apellido']]);
    //     echo "<br>"."Insertar datos";
    // }
}