<?php

require "../configuration.php";

// Check do we have data sent through the POST method
if (isset($_POST['data'])) {
    // Decode data to associative array
    $data = json_decode($_POST['data'], true);

    // Check is data empty
    if (!empty($data)) {
        // Create new Router object
        $router = new Router;

        // Trying to call ajax function
        if ($content = $router->ajax($data)) {
            echo $content;
        } else {
            echo $content;
            // Uraditi error handler
        }
    } else {
        echo "error 2";
        // Uraditi error handler
    }
} else {
    echo "error 3";
    // Uraditi error handler
}
