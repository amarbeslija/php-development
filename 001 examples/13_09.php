<?php
$hostname = "localhost";
$username = "username";
$password = "password";
$database = "User";

try {
  $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = $connection->prepare("SELECT id, first_name, last_name FROM User ORDER BY first_name");
  $sql->execute();

  $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
  $results = $sql->fetchAll();
  
  foreach($results as $column => $value) {
    echo $value . "<br>";
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$connection = null;
?>