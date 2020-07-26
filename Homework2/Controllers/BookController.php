<?php

class BookController
{

    public function index()
    {
        $queryBuilder = new QueryBuilder(DatabaseConnection::getInstance());

        $books = $queryBuilder->getAll("SELECT * FROM books", 'Book');

        loadView('index.view.php', ['books' => $books]);
    }

    public function create()
    {
        loadView('create.view.php');
    }

    public function store()
    {
        if (
            isset($_POST['title']) && !empty($_POST['title']) &&
            isset($_POST['author']) && !empty($_POST['author']) &&
            isset($_POST['publisher']) && !empty($_POST['publisher']) &&
            isset($_POST['year']) && !empty($_POST['year']) && strlen((string)$_POST['year']) == 4
        ) {

            $queryBuilder = new QueryBuilder(DatabaseConnection::getInstance());

            $bindParameters = array('author' => $_POST['author']);
            $authorExists = $queryBuilder->exists("SELECT * FROM authors WHERE name=:author", $bindParameters);
            if ($authorExists) {
                $authorId = $queryBuilder->getOne("SELECT * FROM authors WHERE name=:author", 'Author', $bindParameters)->id;
            } else {
                $authorId = $queryBuilder->insert("INSERT INTO authors VALUES (null, :author)", $bindParameters);
            }

            $bindParameters = array('publisher' => $_POST['publisher']);
            $publisherExists = $queryBuilder->exists("SELECT * FROM publishers WHERE name=:publisher", $bindParameters);
            if ($publisherExists) {
                $publisher = $queryBuilder->getOne("SELECT * FROM publishers WHERE name=:publisher", 'Publisher', $bindParameters);
                $publisherId = $publisher->id;
            } else {
                $publisherId = $queryBuilder->insert("INSERT INTO publishers VALUES (null, :publisher)", $bindParameters);
            }

            $bindParameters = array(
                'title' => $_POST['title'],
                'authorId' => $authorId,
                'publisherId' => $publisherId,
                'year' => $_POST['year']
            );
            $queryBuilder->insert(
                "INSERT INTO books(
                                id,
                                title,
                                author_id,
                                publisher_id,
                                publish_year,
                                created_at,
                                updated_at) 
                            VALUES (
                                null,
                                :title,
                                :authorId,
                                :publisherId,
                                :year,
                                CURRENT_TIMESTAMP,
                                null
                                );",
                $bindParameters
            );

            header('location: index');
        } else {
            throw new Exception('400');
        }
    }

    public function edit()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $queryBuilder = new QueryBuilder(DatabaseConnection::getInstance());

            $bindParameters = array('idBook' => $_GET['id']);
            $book = $queryBuilder->getOne("SELECT * FROM books WHERE id = :idBook;", 'Book', $bindParameters);


            $title = $book->title;
            $author = $book->author->name;
            $publisher = $book->publisher->name;
            $year = $book->publish_year;
        } else {
            die('Invalid request');
        }

        loadView('edit.view.php', [
            'idBook' => $_GET['id'],
            'title' => $title,
            'author' => $author,
            'publisher' => $publisher,
            'year' => $year
        ]);
    }


    public function update()
    {

        if (
            isset($_POST['id']) &&  !empty($_POST['id']) &&
            isset($_POST['title']) && !empty($_POST['title']) &&
            isset($_POST['author']) && !empty($_POST['author']) &&
            isset($_POST['publisher']) && !empty($_POST['publisher']) &&
            isset($_POST['year']) && !empty($_POST['year']) && strlen((string)$_POST['year']) == 4
        ) {
            $queryBuilder = new QueryBuilder(DatabaseConnection::getInstance());

            $idBook = $_POST['id'];

            $bindParameters = array('idBook' => $idBook);
            $book = $queryBuilder->getOne("SELECT * FROM books WHERE id=:idBook", 'Book', $bindParameters);
            $idAuthor = $book->author->id;

            $bindParameters = array('author' => $_POST['author'], 'idAuthor' => $idAuthor);
            $queryBuilder->execute(
                "UPDATE authors 
                    SET name=:author
                    WHERE id=:idAuthor",
                $bindParameters
            );

            $bindParameters = array('idBook' => $idBook);
            $idPublisher = $queryBuilder->getOne("SELECT * FROM books WHERE id=:idBook", 'Book', $bindParameters)->publisher->id;

            $bindParameters = array('publisher' => $_POST['publisher'], 'idPublisher' => $idPublisher);
            $queryBuilder->execute(
                "UPDATE publishers
                    SET name=:publisher
                    WHERE id=:idPublisher",
                $bindParameters
            );

            $bindParameters = array('title' => $_POST['title'], 'year' => $_POST['year'], "idBook" => $idBook);
            $queryBuilder->execute(
                "UPDATE
                    books
                    SET
                        title=:title,
                        publish_year=:year,
                        updated_at=CURRENT_TIMESTAMP
                    WHERE
                        id=:idBook",
                $bindParameters
            );

            header('location: index');
        } else {
            throw new Exception('400');
        }
    }

    public function delete()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $queryBuilder = new QueryBuilder(DatabaseConnection::getInstance());

            $bindParameters = array('id' => $_GET['id']);
            $book = $queryBuilder->getOne("SELECT * FROM books WHERE id = :id", 'Book', $bindParameters);

            $queryBuilder->execute("DELETE FROM books WHERE id = :id", $bindParameters);

            $authorId = $book->author->id;
            $bindParameters = array('authorId' => $authorId);
            $authorExists = $queryBuilder->exists(
                "SELECT * FROM books
                                JOIN authors 
                                    ON books.author_id = authors.id
                            WHERE authors.id = :authorId",
                $bindParameters
            );
            if (!$authorExists) {
                $queryBuilder->execute("DELETE FROM authors WHERE id = :authorId", $bindParameters);
            }

            $publisherId = $book->publisher->id;
            $bindParameters = array('publisherId' => $publisherId);
            $publisherExists = $queryBuilder->exists(
                "SELECT * FROM books
                                JOIN publishers 
                                    ON books.publisher_id = publishers.id
                            WHERE publishers.id = :publisherId",
                $bindParameters
            );
            if (!$publisherExists) {
                $queryBuilder->execute("DELETE FROM publishers WHERE id = :publisherId", $bindParameters);
            }

            header('location: index');
        } else {
            throw new Exception('400');
        }
    }
}
