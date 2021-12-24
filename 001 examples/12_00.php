<?php

$mysqli = new mysqli("localhost", "root", "", "myDataBase"); 

if($mysqli->error) 
    echo $mysqli->error;

$stmt = $mysqli->prepare("insert into users values (null,?)"); 
$name = "Thomas"; 
$stmt->bind_param("s", $name); 
// Execute query 
$stmt->execute(); 

// Close prepared statement 
$stmt->close(); 

$mysqli->close(); 

//create table users (id int primary key auto_increment, name varchar(50)) 
