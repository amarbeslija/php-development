<?php
$hostname = "localhost";
$username = "username";
$password = "password";

try {
  $connection = new PDO("mysql:host=$hostname", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "CREATE TABLE User (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(200),
  datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  $connection->exec($sql);
  echo "Table User created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$connection = null;
?>