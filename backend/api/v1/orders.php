<?php

    session_start();
    require_once "../../config.php";
    include "../../auth.php";

    // Get
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = isset($_GET["id"]) ? $_GET["id"] : null;

        if (isset($id) && is_int((int) $id)) {
            $query = "SELECT * FROM `orders` WHERE `id` = '".$id."';";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);

                http_response_code(200);
                echo json_encode([
                    "message" => "Order retrieved.",
                    "data" => $data
                ]);
                exit;
            } else {
                http_response_code(400);
                echo json_encode([
                    "message" => "Order not found."
                ]);
                exit;
            }
        } else {
            http_response_code(400);
            echo json_encode([
                "message" => "Id is invalid."
            ]);
            exit;
        }

        $query = "SELECT * FROM `orders`;";
        $result = mysqli_query($connection, $query);
        $data = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        http_response_code(200);
        echo json_encode([
            "message" => "Orders retrieved.",
            "data" => $data
        ]);
        exit;
    }

    // Delete
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["method"])) {
        if ($_GET["method"] == "delete") {
            $id = isset($_GET["id"]) ? $_GET["id"] : null;

            if ($id && is_int((int) $id)) {
                $query = "DELETE FROM `orders` WHERE `id` = ?;";
                $statement = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($statement, "i", $id);

                if (mysqli_stmt_execute($statement)) {
                    http_response_code(200);
                    $response = [
                        "message" => "Order deleted successfully."
                    ];
                    exit;
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

    // Put
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["method"])) {
        if ($_POST["method" == "put"]) {
            $status = $_POST["status"];
            $orderedDate = $_POST["ordered-date"];
            $shippedDate = $_POST["shipped-date"];
            $receivedDate = $_POST["received-date"];

            $query = "UPDATE `orders` SET `status` = ?, `orderDate` = ?, `shippedDate` = ?, `receivedDate` = ? WHERE `id` = ?;";
            $statement = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($statement, "ssssi", $status, $orderedDate, $shippedDate, $receivedDate);

            if (mysqli_stmt_execute($statement)) {
                http_response_code(200);
                $response = [
                    "message" => "Order updated successfully."
                ];
            } else {
                http_response_code(400);
                $response = [
                    "message" => "Order update failed."
                ];
            }

            echo json_encode($response);
        }
    }

    // Post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accountId = $_SESSION["account_id"];
        // $status = $_POST;
        // $orderedDate = $_POST["ordered-date"];
        // $shippedDate = $_POST["shipped-date"];
        // $receivedDate = $_POST["received-date"];

        // $query = "INSERT INTO `orders` (`account_id`, `status`, `ordered_date`, `shipped_date`, `received_date`) VALUES (?, ?, ?, ?, ?);";
        // $statement = mysqli_prepare($connection, $query);
        // mysqli_stmt_bind_param($statement, "issss", $accountId, $status, $orderedDate, $shippedDate, $receivedDate);
        $query = "INSERT INTO `orders` (`account_id`) VALUES (?);";
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, "i", $accountId);
        
        if (mysqli_stmt_execute($statement)) {
            http_response_code(200);
            $response = [
                "message" => "New order inserted.",
                "orderId" => mysqli_insert_id($connection)
            ];
        } else {
            http_response_code(400);
            $response = [
                "message" => mysqli_stmt_error($statement)
            ];
        }

        echo json_encode($response);
    }

?>