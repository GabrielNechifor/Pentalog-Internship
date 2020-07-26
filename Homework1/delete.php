<!DOCTYPE html>
<html>

<head></head>

<body>

    <?php
    require 'database-connection.php';

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $databaseConnection = getDatabaseConnection();
        $id = $_GET['id'];

        $databaseConnection->exec("DELETE FROM books WHERE id=$id");
        header('location: index.php');
    } else {
        die('Invalid request');
    }


    ?>

</body>

</html>