<?php
$hostname = "localhost";
$username = "username";
$password = "password";

$connection = new mysqli($hostname, $username, $password);

if ($connection->connect_error) {
  die("Connection to server failed: " . $connection->connect_error);
}

$sql = "DELETE FROM User WHERE id=1";

if ($connection->query($sql) === true) {
  echo "User deleted successfully";
} else {
  echo "Error deleting User: " . $connection->error;
}

$connection->close();
?>