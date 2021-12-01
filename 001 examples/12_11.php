<?php
$hostname = "localhost";
$username = "username";
$password = "password";

$connection = new mysqli($hostname, $username, $password);

if ($connection->connect_error) {
  die("Connection to server failed: " . $connection->connect_error);
}

$sql = "UPDATE User SET first_name = 'Thomas' WHERE id=1";

if ($connection->query($sql) === true) {
  echo "User updated successfully";
} else {
  echo "Error updating User: " . $connection->error;
}

$connection->close();
?>
