<?php
$hostname = "localhost";
$username = "username";
$password = "password";

$connection = new mysqli($hostname, $username, $password);

if ($connection->connect_error) {
  die("Connection to server failed: " . $connection->connect_error);
}

$sql = "CREATE DATABASE my_database";

if ($connection->query($sql) === true) {
  echo "Database is created successfully!";
} else {
  echo "Error creating database: " . $connection->error;
}

$connection->close();
?>