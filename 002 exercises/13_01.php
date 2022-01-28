Zadatak 13.01 

Koristeći znanja usvojena unutar ove lekcije kreirati jednu tabelu unutar baze podataka pod imenom user.
Tabela može da ima kolone id, name, password i status.
Nakon toga kreirati konekciju na bazu podataka i sam kod koji će unijeti 3 korisnika, izmijeniti podatke od drugog korisnika,
te zatim ispisati sve korisnike na izlaz.
Nakon što se završi ispis korisnika, obrisati sve unešene korisnike iz baze podataka.
Naravno, koristiti PDO biblioteku za rad, u objektno-orijentisanom maniru.

Napomena: Primjer rješenja ovog zadatka možete pogledati unutar repozitorijuma ovog kursa ili na sljedećem linku: https://github.com/amarbeslija/php-development


<?php
echo "<hr>";

// Create connection
$connection = new PDO("mysql:host=localhost;dbname=itacademy", "root", "");

// Prepare SQL query
$query = $connection->prepare("insert into user (id, name, password, status) values (null,:name, :password, :status)"); 

// Insert users
$name = "Bruces";
$password = "PasswordForBruce";
$status = "1";
$query->bindParam(":name",$name);
$query->bindParam(":password",$password);
$query->bindParam(":status",$status); 
$query->execute();

$name = "Thomas";
$password = "PasswordForThomas";
$status = "1";
$query->bindParam(":name",$name);
$query->bindParam(":password",$password);
$query->bindParam(":status",$status); 
$query->execute();

$name = "Martha";
$password = "PasswordForMartha";
$status = "1";
$query->bindParam(":name",$name);
$query->bindParam(":password",$password);
$query->bindParam(":status",$status); 
$query->execute();

// Update user
$sql = "UPDATE user SET name = 'Bruce' WHERE name = 'Bruces'";

$result = $connection->prepare($sql);
$result->execute();

echo $result->rowCount() . " records updated! <br>";

// Show users
$sql = $connection->prepare("SELECT * FROM user");
$sql->execute();

$result = $sql->setFetchMode(PDO::FETCH_ASSOC);
$results = $sql->fetchAll();

foreach($results as $column => $value) {
    echo "id: " . $value["id"]. " - Name: " . $value["name"]. " - Password: " . $value["password"]. " - Status: " . $value["status"] . "<br>"; 
}

// Delete users
$sql = "DELETE FROM user WHERE name = 'Bruce'";
$connection->exec($sql);
echo "User deleted successfully <br>";

$sql = "DELETE FROM user WHERE name = 'Thomas'";
$connection->exec($sql);
echo "User deleted successfully <br>";


$sql = "DELETE FROM user WHERE name = 'Martha'";
$connection->exec($sql);
echo "User deleted successfully <br>";