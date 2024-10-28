<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>
<body>
    <h2>Lista de usuarios</h2>
    <?php
        if ($usersList != null) {
            echo "<table border='1'>";
            foreach($usersList as $row) {
                echo "<tr>
                    <td>
                        <form action='deleteUser.php' method='post'>
                            <input type='hidden' name=id value=".$row['id'].">
                            <label>".$row['name']."</label>
                    </td>
                    <td>
                            <input type='submit' value='Borrar'>
                        </form>
                    </td>
                </tr>";
            }
            echo "</table>";
        }
    ?>
    <br>
    <a href="index.php">Create Another User</a>
</body>
</html>
