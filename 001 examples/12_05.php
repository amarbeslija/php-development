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

if ($connection->query($sql) === true) {

  $last_inserted_id = $connection->insert_id;

  echo "New record created successfully. Last inserted ID is: " . $last_inserted_id;
} else {
  echo "Error in sql: " . $sql . "<br>" . $connection->error;
}

$connection->close();
?>