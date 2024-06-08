<?php

    session_start();
    require_once "../../config.php";

    if (!isset($_SESSION["account_id"])) {
        http_response_code(400);
        echo json_encode([
            "message" => "Unauthorized"
        ]);
        exit;
    }
    // if (!isset($_COOKIE["remember_me"])) {
    //     $queryCookie = "SELECT ";
    //     http_response_code(400);
    //     echo json_encode([
    //         "message" => "Unauthorized"
    //     ]);
    //     exit;
    // }

    // GET (READ)
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $id = $_GET["id"];
        
        if (isset($id) and is_int((int) $id)) {
            $query = "SELECT * FROM `merches` WHERE `id` = '".$_GET["id"]."';";
            $result = mysqli_query($connection, $query);
            $data = mysqli_fetch_assoc($result);

            if (empty($data)) {
                http_response_code(400);
                echo json_encode([
                    "message" => "Merch does not exists."
                ]);
                exit;
            }

            http_response_code(200);
            echo json_encode([
                "message" => "Merch retrieved.",
                "data" => $data
            ]);
            exit;
        }

        $query = "SELECT * FROM `merches`;";
        $result = mysqli_query($connection, $query);
        $data = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        http_response_code(200);
        echo json_encode([
            "message" => "Merches retrieved.",
            "data" => $data
        ]);
        exit;
    }

    // DELETE
    if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET["method"])) {
        if ($_GET["method"] == "delete") {

            $id = $_GET["id"];

            if (isset($id) and is_int((int) $id)) {
                $query = "DELETE FROM `merches` WHERE `id` = ?;";
                $statement = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($statement, "i", $id);

                if (mysqli_stmt_execute($statement)) {
                    if (mysqli_stmt_affected_rows($statement) > 0) {
                        http_response_code(200);
                        $response = [
                            "message" => "Record deleted successfully."
                        ];
                    } else {
                        http_response_code(400);
                        $response = [
                            "message" => "No record found."
                        ];
                    }
                } else {
                    http_response_code(400);
                    $response = [
                        "message" => mysqli_stmt_error($statement)
                    ];
                }
            } else {
                http_response_code(400);
                $response = [
                    "message" => "Invalid request."
                ];
            }
            
            echo json_encode($response);
            exit;
        }
    }

    // PUT (EDIT)
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["method"])) {
        if ($_POST["method"] = "put") {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $price = $_POST["price"];
            $description = $_POST["description"];
            $stock = $_POST["stock"];
            $category = $_POST["category"];
            $image = loadImage();

            if (!empty($id) and is_int((int) $id)) {
                $query = "UPDATE `merches` SET `name` = ?, `price` = ?, `description` = ?, `stock` = ?, `image` = ?, `category` = ? WHERE `id` = ?;";
                $statement = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($statement, "sdsissi", $name, $price, $description, $stock, $image, $category, $id);

                if (mysqli_stmt_execute($statement)) {
                    if (mysqli_stmt_affected_rows($statement) > 0) {
                        http_response_code(200);
                        $response = [
                            "message" => "Record updated successfully."
                        ];
                    } else {
                        http_response_code(400);
                        $response = [
                            "message" => "No record found."
                        ];
                    }
                } else {
                    http_response_code(400);
                    $response = [
                        "message" => mysqli_stmt_error($statement)
                    ];
                }
            } else {
                http_response_code(400);
                $response = [
                    "message" => "Invalid request."
                ];
            }

            echo json_encode($response);
            exit;
        }
    }

    // POST (CREATE)
    if ($_SERVER["REQUEST_METHOD"] == "POST" and !isset($_POST["method"])) {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $stock = $_POST["stock"];
        $category = $_POST["category"];
        $image = loadImage();

        $query = "INSERT INTO `merches` (`name`, `price`, `description`, `stock`, `image`, `category`) VALUES (?, ?, ?, ?, ?, ?);";
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement,'sdsiss', $name, $price, $description, $stock, $image, $category);

        if (mysqli_stmt_execute($statement)) {
            http_response_code(200);
            $response = [
                "message" => "New merch inserted."
            ];
        } else {
            http_response_code(400);
            $response = [
                "message" => mysqli_stmt_error($statement)
            ];
        }

        echo json_encode($response);
        exit;
    }

    function loadImage() {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $error = $_FILES["image"]["error"];
        $tmpName = $_FILES["image"]["tmp_name"];

        if($error === 4) {
            http_response_code(400);
            echo json_encode([
                "message" => "Please upload an image."
            ]);
            exit;
        }

        $validImageExtensions = ["jpg", "jpeg", "png"];
        $imageExtension = explode(".", $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtensions)) {
            http_response_code(400);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([
                "message" => "Invalid file type."
            ]);
            exit;
        }

        if ($fileSize > 1000000) {
            http_response_code(400);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([
                "message" => "File size is too large. Please upload file with the size <1MB."
            ]);
            exit;
        }

        $newFileName = uniqid().".".$imageExtension;

        move_uploaded_file($tmpName, "../../image/".$newFileName);
        return $newFileName;
    }

?>