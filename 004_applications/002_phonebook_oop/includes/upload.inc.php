<?php

require "../configuration.php";

// Check do we have data sent through the POST method
if (isset($_POST)) {
    $database = new Database();
    $user = new User();
    if (isset($_POST['img'])) {
        $image_path = Uploader::image_upload($_FILES);
        if ($image_path !== false) {
            $insert_path_db = $database->insert("image", ["link", "status"], [$image_path[0], "1"], true);
            if ($insert_path_db !== "") {
                //If you want to insert in user db image id else return images_id
                if (isset($_POST['user'])) {
                    $data = [
                        "image_id" => $insert_path_db
                    ];
                    if ($user->change_data($data) == true) {
                        $niz = [
                            'valid' => 1,
                            'msg' => Language::get("toastr", "success_img")
                        ];

                        echo json_encode($niz);
                    } else {
                        $niz = [
                            'valid' => 0,
                            'msg' => Language::get("toastr", "error_img")
                        ];

                        echo json_encode($niz);
                    }
                } else {
                    return json_encode($insert_path_db);
                }
            }
        }
    } else {
        $file_path = Uploader::file_upload($_FILES);
        if ($file_path !== false) {
            $insert_path_db = $database->insert("file", ["link", "status"], [$file_path[0], "1"], true);
            if ($insert_path_db !== "") {
                //If you want to insert in user db file_id else return file_id
                if (isset($_POST['user'])) {
                    $data = [
                        "file_id" => $insert_path_db
                    ];
                    if ($user->change_data($data) == true) {
                        $niz = [
                            'valid' => 1,
                            'msg' => Language::get("toastr", "success_img")
                        ];

                        echo json_encode($niz);
                    } else {
                        $niz = [
                            'valid' => 0,
                            'msg' => Language::get("toastr", "error_img")
                        ];

                        echo json_encode($niz);
                    }
                } else {
                    return json_encode($insert_path_db);
                }
            }
        }
    }
}
