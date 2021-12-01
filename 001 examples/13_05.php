<?php
$hostname = "localhost";
$username = "username";
$password = "password";
$database = "User";

try {
  $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "INSERT INTO User (first_name, last_name, email)
  VALUES ('Peter', 'Parker', 'peter@parker.com')";
  $connection->exec($sql);

  $last_inserted_id = $connection->lastInsertId();
  echo "User created successfully. Last inserted ID is: " . $last_inserted_id;
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$connection = null;
?>
