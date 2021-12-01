<?php
$hostname = "localhost";
$username = "username";
$password = "password";

$connection = new mysqli($hostname, $username, $password);

if ($connection->connect_error) {
  die("Connection to server failed: " . $connection->connect_error);
}

$sql = "INSERT INTO User (first_name, last_name, email)
VALUES ('Bruce', 'Wayne', 'bruce@wayne.com')";

if ($connection->query($sql) === TRUE) {
  echo "User inserted";
} else {
  echo "Error inside query: " . $sql . "<br>" . $connection->error;
}

$connection->close();
?>