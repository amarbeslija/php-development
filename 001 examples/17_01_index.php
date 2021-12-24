<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="17_02_login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password">
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php

if(count($_SESSION) > 0){
    echo "Username: " . $_SESSION['username'];
    echo "<br>";
    echo "Logged: " . $_SESSION['logged'];
}

if(isset($_GET['message'])){
    echo "<div>" . $_GET['message'] . "</div>";
}