<?php
$hostname = "localhost";
$username = "username";
$password = "password";

$connection = new mysqli($hostname, $username, $password);

if ($connection->connect_error) {
  die("Connection to server failed: " . $connection->connect_error);
}

$sql = "INSERT INTO User (first_name, last_name, email)
VALUES ('Bruce', 'Wayne', 'bruce@wayne.com');";
$sql .= "INSERT INTO User (first_name, last_name, email)
VALUES ('Peter', 'Parker', 'peter@parker.com');";
$sql .= "INSERT INTO User (first_name, last_name, email)
VALUES ('Klark', 'Kent', 'klark@kent.com')";

if ($connection->multi_query($sql) === true) {
  echo "New records created successfully";
} else {
  echo "Error in sql: " . $sql . "<br>" . $connection->error;
}

$connection->close();
?>