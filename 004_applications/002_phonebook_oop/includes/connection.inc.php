<?php

// Create a new, simple connection for the database (nothing complicated)
// We use global constants for the data needed for database connection (you can find them inside configuration.php file)
$connection = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

// Check connection and redirect to error page if we have a problem with the database connection (because nothing else will work)
if ($connection->connect_error) {
    $error = new Error("34");
}