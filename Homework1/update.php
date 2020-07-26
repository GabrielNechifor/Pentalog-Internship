<!DOCTYPE html>
<html>

<head>
    <title>Update Book</title>
</head>

<body>

    <?php
    require 'database-connection.php';

    function updateData($id, $title, $author, $publisher, $year): void
    {
        $databaseConnection = getDatabaseConnection();

        $databaseConnection->exec("UPDATE books SET title='$title', author_name='$author', publisher_name='$publisher', publish_year=$year,
                            updated_at=CURRENT_TIMESTAMP WHERE id=$id;");
    }

    if (
        isset($_POST['id']) && isset($_POST['title']) && isset($_POST['author']) && isset($_POST['publisher']) && isset($_POST['year'])
        && !empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['publisher']) && !empty($_POST['year'])
        && strlen((string)$_POST['year']) == 4
    ) {

        updateData($_POST['id'], $_POST['title'], $_POST['author'], $_POST['publisher'], $_POST['year']);
        header('location: index.php');
    } else {
        die('Invalid request');
    }

    ?>

</body>

</html>