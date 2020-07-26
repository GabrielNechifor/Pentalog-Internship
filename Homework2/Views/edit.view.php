<!DOCTYPE html>
<html>

<head>
  <style>
    h1 {
      text-align: center;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
      font-weight: bold;
    }

    input[type=text],
    input[type=number] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit],
    form button {
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

    a:link,
    a:visited,
    a:hover,
    a:active {
      text-decoration: none;
      font-weight: bold;
      color: black;
    }


    button:hover,
    button:active,
    input[type=submit]:hover,
    input[type=submit]:active {
      background-color: rgb(153, 204, 255);
      box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }
  </style>
</head>

<body>

  <h1>Update informations about a book</h1>

  <form action="./update" method="POST">
    <input type="hidden" id="id" name="id" value="<?= $idBook ?>">

    <label for="Title">Title:</label>
    <input type="text" id="title" name="title" value="<?= $title ?>" required><br><br>

    <label for="Author">Author:</label>
    <input type="text" id="author" name="author" value="<?= $author ?>" required><br><br>

    <label for="Publisher">Publisher:</label>
    <input type="text" id="publisher" name="publisher" value="<?= $publisher ?>" required><br><br>

    <label for="Year">Year:</label>
    <input type="number" id="year" name="year" min="1000" max="9999" value="<?= $year ?>" required><br><br>

    <button><a href="index">Cancel</a></button>
    <input type="submit" value="Update">
  </form>

</body>

</html>