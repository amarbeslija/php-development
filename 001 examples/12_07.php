<?php
$hostname = "localhost";
$username = "username";
$password = "password";

$connection = new mysqli($hostname, $username, $password);

if ($connection->connect_error) {
  die("Connection to server failed: " . $connection->connect_error);
}

$sql = "SELECT id, first_name, last_name FROM User";
$results = $connection->query($sql);

if ($results->num_rows > 0) {

  while($row = $results->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Full name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
  }
} else {
  echo "No results!";
}
$connection->close();
?>