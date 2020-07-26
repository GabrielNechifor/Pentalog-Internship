<!DOCTYPE html>
<html>

<head>
    <title>Add Book</title>
</head>

<body>

    <?php
    require 'database-connection.php';

    function storeData($title, $author, $publisher, $year): void
    {
        $databaseConnection = getDatabaseConnection();

        $databaseConnection->exec("INSERT INTO books(id, title, author_name, publisher_name, publish_year, created_at, updated_at) 
                            VALUES (null, '$title', '$author', '$publisher', $year, CURRENT_TIMESTAMP, null);");
    }

    if (
        isset($_POST['title']) && isset($_POST['author']) && isset($_POST['publisher']) && isset($_POST['year'])
        && !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['publisher']) && !empty($_POST['year'])
        && strlen((string)$_POST['year']) == 4
    ) {

        storeData($_POST['title'], $_POST['author'], $_POST['publisher'], $_POST['year']);
        header('location: index.php');
    } else {
        die('Invalid request');
    }

    ?>

</body>

</html>