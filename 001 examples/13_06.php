<?php
$hostname = "localhost";
$username = "username";
$password = "password";
$database = "User";

try {
  $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $connection->beginTransaction();

  $connection->exec("INSERT INTO User (first_name, last_name, email)
  VALUES ('Bruce', 'Wayne', 'bruce@wayne.com')");
  $connection->exec("INSERT INTO User (first_name, last_name, email)
  VALUES ('Peter', 'Parker', 'peter@parker.com')");
  $connection->exec("INSERT INTO User (first_name, last_name, email)
  VALUES ('Klark', 'Kent', 'klark@kent.com')");

  $connection->commit();
  echo "New Users created successfully";
} catch(PDOException $e) {
  $connection->rollback();
  echo "Error: " . $e->getMessage();
}

$connection = null;
?>