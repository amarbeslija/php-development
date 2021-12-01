<?php
$hostname = "localhost";
$username = "username";
$password = "password";

try {
  $connection = new PDO("mysql:host=$hostname;dbname=myDB", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  echo "Connected successfully!";
} catch(PDOException $e) {
  echo "Connection to server has failed: " . $e->getMessage();
}
?>