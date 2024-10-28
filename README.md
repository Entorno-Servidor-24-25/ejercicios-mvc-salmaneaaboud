# Arquitectura MVC

### Pregunta 1: ¿Qué camino sigue el código cuando el usuario accede por primera vez a `index.php`?
**Descripción**: Explica qué ocurre desde que el usuario carga `index.php` hasta que se muestra algo en pantalla. Incluye cómo intervienen el controlador, las vistas y el modelo, si es necesario.

**RESPUESTA**:
    - Cuando el usuario accede al `index.php`, lo primero que hace es definir la variable 'BASE_PATH' que almacena la ruta completa de la carpeta 'src' ('./src:/var/www/html'). 
    Luego, se anexa el código del fichero 'UserController.php' mediante el uso del 'require_once', en la que se especificará la ruta con 'BASE_PATH'.  Después, se instancia un objeto de tipo 'UserController' para usar la función de este llamada 'showForm()'. Esta función cargará el formulario para el usuario.

### Pregunta 2: ¿Qué camino sigue el código cuando el usuario introduce datos en el formulario?
**Descripción**: Detalla el proceso desde que el usuario envía el formulario hasta que se guarda la información y se muestra una respuesta en pantalla.

> **Nota:** Al crear nuevas vistas, añade alguna forma de navegar entre ellas de modo que el usuario pueda acceder a todas las vistas sin tener que modificar la URL directamente.

**RESPUESTA**:
    Carga del formulario:
        El controlador UserController se inicializa y llama al método showForm(), que carga el formulario desde userForm.php.

    Envío del formulario:
        El usuario introduce su nombre y envía el formulario, que hace una solicitud POST a saveUser.php.

    Procesamiento de la solicitud:
        En saveUser.php, se obtiene el nombre del usuario usando $_POST['name'].
        Se crea un objeto User con el nombre proporcionado.

    Guardado del usuario:
        Se llama al método save($connection) del objeto User, que inserta el nombre en la tabla Usuario de la base de datos.

    Mostrar mensaje de éxito:
        Si la inserción funciona, se carga userSuccess.php, mostrando un mensaje de éxito y el nombre del usuario.

    Opción para crear otro usuario:
        Se proporciona un enlace para volver a crear otro usuario, redirigiendo a index.php.

### Ejercicio 1: Mostrar Todos los Usuarios
**Descripción**: Extiende la funcionalidad de la aplicación para que se muestre una lista de todos los usuarios que están en la base de datos.
- Añadir un nuevo método en el controlador `UserController` llamado `getAllUsers()`.
- Crear una nueva vista `showUsers.php` para mostrar una tabla con los nombres de los usuarios.

### Ejercicio 2: Eliminar Usuario
**Descripción**: Implementa la funcionalidad para eliminar un usuario de la base de datos.
- Crear un método `deleteUser()` en `UserController`.
- Crear una acción en `showUsers.php` que permita eliminar usuarios, mostrando un botón "Eliminar" al lado de cada nombre en la lista de usuarios.
