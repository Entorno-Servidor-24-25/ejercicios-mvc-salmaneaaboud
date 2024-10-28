<?php

class User {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    // Método para guardar el usuario en la base de datos
    public function save($connection) {
        // Insertar el usuario en la base de datos
        $sql = "INSERT INTO Usuario (name) VALUES ('$this->name')";
        
        if ($connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Método para conseguir los usuarios de la base de datos
    public static function getUsersQuery($connection) {
        try {
            $sql = "SELECT * FROM Usuario";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            } else {
                return null;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }   
    }

    // Método para borrar un usuario de la base de datos mediante un id
    public static function deleteUserQuery($connection, $id) {
        try {
            $sql = "DELETE FROM Usuario WHERE id = '$id'";
            return $connection->query($sql);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
