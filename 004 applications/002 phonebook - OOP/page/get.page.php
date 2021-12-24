<?php


if (isset($_GET)) {
    $router = new Router();
    $data = $_GET;
    if (isset($_GET['function'])) {
        if ($router->ajax($data) == true) {
            header('Location: http://localhost/praksa/v0-starterkit/index');
        } else {
            header('Location: http://localhost/praksa/v0-starterkit/error');
        }
    }
}
