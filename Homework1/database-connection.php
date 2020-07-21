<?php

function getDatabaseConnection() : PDO {
    try {
        $conn = new PDO('mysql:host=localhost;dbname=pentalog', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec('ALTER TABLE books AUTO_INCREMENT = 0');
      } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
      }
      return $conn;
} 

?>