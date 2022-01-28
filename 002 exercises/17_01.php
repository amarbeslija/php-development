Zadatak 17.01

Koristeći znanja stečena do sada unutar ovog kursa, kreirati jednostavnu login formu pomoću koje ćemo logovati korisnika u sistem.
Potrebno je da forma prihvata polje za username i password te da koristi POST slanje podataka.
Naravno, username i password ćemo čuvati unutar baze podataka tako da je potrebno kreirati i tabelu sa ovim kolonama te Iskoristiti
jednu od biblioteka za rad sa bazom podataka: mySQLi i PDO.
Nakon što se provjere podaci i korisnik se uloguje unutar aplikacije potrebno je da pokrenemo sesiju i sačuvamo njegov id unutar nje.
Ovaj zadatak je posebno orijentisan na znanja stečena vezana za baze podataka kao i za ovu i prethodne dvije lekciju unutar ovog kursa.

Napomena: Primjer rješenja ovog zadatka možete pogledati unutar repozitorijuma ovog kursa ili na sljedećem linku: https://github.com/amarbeslija/php-development

<?php
# index.php file
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User LogIn!</title>
</head>
<body>
    <form action="login.php" method="POST">
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

?>

<?php
# login.php file

if(isset($_POST['username']) && isset($_POST['password'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE name='{$username}' LIMIT 1";
        $results = $connection->query($sql);

        if ($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
                $usernameDB = $row['username'];
                $passwordDB = $row['password'];
            }
        } else {
            echo "No results! <br>";
        }


        if($username === $usernameDB && $password === $passwordDB){
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["logged"] = date("d.m.Y H:i:s");

            header("Location: index.php");
        }else{
            header("Location: index.php?message=Error!");
        }
    }
}
?>
