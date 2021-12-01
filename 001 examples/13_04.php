<?php
$hostname = "localhost";
$username = "username";
$password = "password";
$database = "User";

try {
  $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "INSERT INTO User (first_name, last_name, email)
  VALUES ('Bruce', 'Wayne', 'bruce@wayne.com')";
  $connection->exec($sql);

  echo "User created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$connection = null;
?>