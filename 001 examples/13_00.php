<?php

$pdo = new PDO("mysql:host=localhost;dbname=myDataBase", "root", "");

$query = $pdo->prepare("insert into users values (null,:name)"); 
$name="john"; 
$query->bindParam(":name",$name); 
$query->execute();

$result = $pdo->query("select * from users");
foreach($result as $row) 
    echo $row["name"];

$pdo=null; 

//create table users (id int primary key auto_increment, name varchar(50)) 