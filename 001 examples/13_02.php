<?php
$hostname = "localhost";
$username = "username";
$password = "password";

try {
  $connection = new PDO("mysql:host=$hostname", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "CREATE DATABASE my_database";
  $connection->exec($sql);

  echo "Database my_database created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$connection = null;
?>