<?php

/**
 * 
 * Define full, absolute path to be used everywhere inside the application.
 * Change APP definition so you can easily try this project on any machine (local or remote).
 * Inside the application we use APP anywhere where we need to create a path.
 * 
 */

define("APP", $_SERVER['DOCUMENT_ROOT'] . "/praksa/v0-starterkit");



/**
 * 
 * Define full url which can be used for redirections inside the application.
 * Change definition of the $url so you can easily try this project on any machine (local or remote).
 * Inside the application we use URL anywhere where we need to call a url (for example for Error redirection)
 * 
 */

if(isset($_SERVER['HTTPS'])){
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
}
else{
    $protocol = 'http';
}
$url = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/praksa/v0-starterkit";

define("URL", $url);



/**
 * 
 * Define constants which will use our Connection class for connecting to the main database.
 * They are here because it is easier to maintain them here in configuration file than any other place!
 * 
 */

define('DB_HOSTNAME', "localhost");
define("DB_PORT", "3306");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "developly_test");



/**
 *
 *  Require Autoloader for all of our classes (static and regular ones).
 *  With this autoloader, there is no need to include or require any kind of files (we have File class with methods if we need to include custom file)
 * 
 */

require 'includes/autoloader.inc.php';



/**
 * 
 * Create a new database connection and save connect as a constant so we don't need to make new connection anywhere else.
 * There is no need to have a connection class, singelton is slow, so we are directly calling mysqli here.
 * 
 */

require 'includes/connection.inc.php';