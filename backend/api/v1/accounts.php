<?php

    session_start();
    require_once "../../config.php";
    include "../../auth.php";

    // Admin endpoint
    // if ($_SESSION["account_role"] != "admin") {
    //     http_response_code(400);
    //     echo json_encode([
    //         "message" => "Unauthorized. You are not an admin."
    //     ]);
    // }
    include "../../admin.php";

    // GET
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $id = isset($_GET["id"]) ? $_GET["id"] : null;

        if (isset($id) && is_int((int) $id)) {
            $query = "SELECT * FROM `accounts` WHERE `id` = '".$_GET["id"]."';";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);

                http_response_code(200);
                echo json_encode([
                    "message" => "Account retrieved successfully.",
                    "data" => $data
                ]);
                exit;
            }

            http_response_code(400);
            echo json_encode([
                "message" => "Account does not exists."
            ]);
            exit;
        }

        $query = "SELECT * FROM `merches`";
        $result = mysqli_query($connection, $query);
        $data = array();

        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }

        http_response_code(200);
        echo json_encode([
            "message" => "Accounts retrieved.",
            "data" => $data
        ]);
        exit;
    }

    // DELETE
    if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["method"])) {
        if ($_GET["method"] == "delete") {
            $id = isset($_GET["id"]) ? $_GET["id"] : null;

            if (isset($id) && is_int((int) $id)) {
                $query = "DELETE FROM `accounts` WHERE `id` = ?;";
                $statement = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($statement, "i", $id);

                if (mysqli_stmt_execute($statement)) {
                    http_response_code(200);
                    $response = [
                        "message" => "Account deleted successfully."
                    ];
                } else {
                    http_response_code(400);
                    $response = [
                        "message" => mysqli_stmt_error($statement)
                    ];
                }
            } else {
                http_response_code(400);
                $response = [
                    "message" => "Id is invalid."
                ];
            }

            echo json_encode($response);
            exit;
        }
    }

    // PUT
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["method"])) {
        if ($_POST["method"] == "put") {
            $username = $_POST["username"];
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $credit = $_POST["credit"];
            $role = $_POST["role"];

            $query = "UPDATE `accounts` SET `username` = ?, `full_name` = ?, `email` = ?, `password` = ?, `credit` = ?, `role` = ? WHERE `id` = ?;";
            $statement = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($statement, "ssssdsi", $username, $fullname, $email, password_hash($password, PASSWORD_DEFAULT), $credit, $role);

            if (mysqli_stmt_execute($statement)) {
                http_response_code(200);
                $response = [
                    "message" => "Account updated."
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
    }

    // POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST["username"];
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role = $_POST["role"];

        $query = "INSERT INTO `accounts` (`username`, `full_name`, `email`, `password`, `role`) VALUES (?, ?, ?, ?, ?);";
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, "sssss", $username, $fullname, $email, password_hash($password, PASSWORD_DEFAULT), $role);

        if (mysqli_stmt_execute($statement))
        {
            http_response_code(200);
            $response = [
                "message" => "New account inserted."
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

?>