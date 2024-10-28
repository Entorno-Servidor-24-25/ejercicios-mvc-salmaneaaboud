<?php
// Cargar el modelo de usuario y la conexión a la base de datos
require_once BASE_PATH . '/models/User.php';
require_once BASE_PATH . '/db.php';

class UserController {
    // Método para mostrar el formulario
    public function showForm() {
        // Cargar la vista del formulario
        require_once BASE_PATH . '/views/userForm.php';
    }

    // Método para manejar el guardado de usuario
    public function saveUser() {
        global $connection; // Usamos la conexión a la base de datos

        // Obtener los datos del formulario
        $name = $_POST['name'];

        // Crear un nuevo objeto usuario
        $user = new User($name);

        // Guardar el usuario en la base de datos
        if ($user->save($connection)) {
            // Cargar la vista de éxito
            require_once BASE_PATH . '/views/userSuccess.php';
        } else {
            echo "Error al guardar el usuario.";
        }
    }

    public function showUsers() {
        // Lista con los usuarios de la BD
        $usersList = $this->getAllUsers();
        // Cargar la vista de la lista de usuarios
        require_once BASE_PATH . '/views/showUsers.php';
    }

    public function getAllUsers() {
        global $connection; // Usamos la conexión a la base de datos
        return User::getUsersQuery($connection); // Llamada a la consulta que devuelve todos los usuarios y sus atributos (ID, name)
    }

    public function deleteUser() {
        global $connection; // Usamos la conexión a la base de datos
    
        // Obtener los datos del formulario
        $id = $_POST["id"];
    
        // Intentar borrar el registro
        $result = User::deleteUserQuery($connection, $id);
    
        // Verificar si la eliminación fue exitosa
        if ($result) {
            // Eliminación exitosa
            echo 'Usuario eliminado correctamente.';
        } else {
            // Fallo en la eliminación
            echo 'Error al eliminar el usuario.';
        }

        // Cargar la vista de la lista de usuarios después de realizar la acción de eliminar usuario
        $this->showUsers();
    }
    
}
