<?php
$hostname = "localhost";
$username = "username";
$password = "password";
$database = "User";

try {
  $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "UPDATE User SET first_name = 'Thomas' WHERE id = 1";

  $result = $connection->prepare($sql);
  $result->execute();

  echo $result->rowCount() . " records updated!";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$connection = null;
?>