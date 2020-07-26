<!DOCTYPE html>
<html>

<head>
  <title>Books</title>
  <style>
    h1 {
      text-align: center;
    }

    table {
      border: 1px solid black;
      border-collapse: collapse;
      width: 100%;
      background-color: rgb(77, 163, 255);

    }

    th {
      border: 1px solid black;
      border-collapse: collapse;
      height: 50px;
    }

    td {
      border: 1px solid black;
      border-collapse: collapse;
      height: 100px;
      text-align: center;
      font-size: 18px;
    }

    td:nth-child(8),
    th:nth-child(8) {
      border-top: hidden;
      border-bottom: hidden;
      background-color: rgb(255, 255, 255);
    }

    td:nth-child(9),
    th:nth-child(9) {
      border: hidden;
      background-color: none;
      background-color: rgb(255, 255, 255);
    }

    table tr td button {
      background-color: rgb(0, 153, 204);
      color: black;
      font-weight: bold;
      padding: 5px 5px;
      border: none;
      border-radius: 50%;
      cursor: pointer;
    }

    table tr td button a {
      font: bold;
    }


    a:link,
    a:visited,
    a:hover,
    a:active {
      text-decoration: none;
      font-weight: bold;
      color: black;
    }

    button:hover,
    button:active {
      background-color: rgb(153, 204, 255);
      box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    div {
      width: 100%;
      text-align: center;
    }

    button {
      width: 100%;
      background-color: rgb(0, 153, 204);
      color: black;
      font-weight: bold;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <h1>List of books</h1>

  <?php
  require 'database-connection.php';

  $databaseConnection = getDatabaseConnection();

  $statement = $databaseConnection->prepare('SELECT * FROM books;');
  $statement->execute();

  $books = $statement->fetchAll();

  echo "<table>";
  echo "<tr>";
  echo "<th> ID </th>";
  echo "<th> Title </th>";
  echo "<th> Author </th>";
  echo "<th> Publisher </th>";
  echo "<th> Year </th>";
  echo "<th> Created </th>";
  echo "<th> Updated </th>";
  echo "<th></th>";
  echo "<th></th>";
  echo "</tr>";
  foreach ($books as $book) {
    echo "<tr>";
    echo "<td>" . $book['id'] . "</td>";
    echo "<td>" . $book['title'] . "</td>";
    echo "<td>" . $book['author_name'] . "</td>";
    echo "<td>" . $book['publisher_name'] . "</td>";
    echo "<td>" . $book['publish_year'] . "</td>";
    echo "<td>" . $book['created_at'] . "</td>";
    echo "<td>" . $book['updated_at'] . "</td> ";
    echo "<td> <button><a href='edit.php?id=" . $book['id'] . "'> Edit </a></button> </td> ";
    echo "<td> <button><a href='delete.php?id=" .  $book['id'] . "'> Delete </a></button> </td> ";
    echo "</tr>";
  }
  echo "</table>";
  ?>
  <br><br>
  <div><button><a href='create.php'>Add</a></button>
    <div>


</body>

</html>