Zadatak 12.01 

Koristeći znanja usvojena unutar ove lekcije kreirati jednu tabelu unutar baze podataka pod imenom user.
Tabela može da ima kolone id, name, password i status.
Nakon toga kreirati konekciju na bazu podataka i sam kod koji će unijeti 3 korisnika, izmijeniti podatke od drugog korisnika,
te zatim ispisati sve korisnike na izlaz.
Nakon što se završi ispis korisnika, obrisati sve unešene korisnike iz baze podataka.
Naravno, koristiti MySQLi biblioteku za rad, u objektno-orijentisanom maniru.

<?php
echo "<hr>";

// Create connection

$connection = new mysqli("localhost", "root", "", "itacademy"); 

if($connection->error) 
    echo $connection->error;


// Insert users
    
$stmt = $connection->prepare("insert into user (id, name, password, status) values (null, ?, ?, ?)"); 

$name = "Bruces";
$password = "PasswordForBruce";
$status = "1";
$stmt->bind_param("sss", $name, $password, $status); 
$stmt->execute(); 

$name = "Thomas";
$password = "PasswordForThomas";
$status = "1";
$stmt->bind_param("sss", $name, $password, $status); 
$stmt->execute();

$name = "Martha";
$password = "PasswordForMartha";
$status = "1";
$stmt->bind_param("sss", $name, $password, $status); 
$stmt->execute();

// Close prepared statement 
$stmt->close(); 

// Update user

$sql = "UPDATE user SET name = 'Bruce' WHERE name='Bruces'";

if ($connection->query($sql) === true) {
  echo "User updated successfully <br>";
} 

// Show users

$sql = "SELECT id, name, password, status FROM user";
$results = $connection->query($sql);

if ($results->num_rows > 0) {

  while($row = $results->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Password: " . $row["password"]. " - Status: " . $row["status"] . "<br>";
  }
} else {
  echo "No results! <br>";
}

// Delete users
$sql = "DELETE FROM user WHERE name='Bruce'";

if ($connection->query($sql) === true) {
  echo "User deleted successfully <br>";
}

$sql = "DELETE FROM user WHERE name='Thomas'";

if ($connection->query($sql) === true) {
  echo "User deleted successfully <br>";
}

$sql = "DELETE FROM user WHERE name='Martha'";

if ($connection->query($sql) === true) {
  echo "User deleted successfully <br>";
}



$connection->close(); 