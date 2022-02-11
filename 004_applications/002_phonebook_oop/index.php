<?php

require 'configuration.php';

$router = new Router();

if (isset($_GET['page'])){
    $router->load($_GET['page']);
}else{
    $router->load('index');
}

// index.php?page=delete
// index.php?page=update