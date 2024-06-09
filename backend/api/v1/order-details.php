<?php

    session_start();
    require_once "../../config.php";
    include "../../auth.php";

    // GET
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $orderId = $_GET["order-id"];
        $merchId = $_GET["merch-id"];

        if ((isset($orderId) && is_int((int) $orderId)) && (isset($merchId) && is_int((int) $merchId))) {
            $query = "SELECT * FROM `order_details` WHERE `order_id` = '".$orderId."' AND `merch_id` = '".$merchId."';";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) === 1) {
                $data = mysqli_fetch_assoc($result);

                http_response_code(200);
                echo json_encode([
                    "message" => "Order detail retrieved succcessfully.",
                    "data" => $data
                ]);
                exit;
            } else {
                http_response_code(400);
                echo json_encode([
                    "message" => "Order detail not found."
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

        $query = "SELECT * FROM `order_details`;";
        $result = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($result);

        http_response_code(200);
        echo json_encode([
            "message" => "Order details retrieved successfully.",
            "data" => $data
        ]);
        exit;
    }

    // DELETE
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["method"])) {
        if ($_GET["method"] == "DELETE") {
            $orderId = $_GET["order-id"];
            $merchId = $_GET["merch-id"];

            if ((isset($orderId) && is_int((int) $orderId)) && (isset($merchId) && is_int((int) $merchId))) {
                $query = "DELETE FROM `order_details` WHERE `order_id` = ? AND `merch_id` = ?;";
                $statement = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($statement, "ii", $orderId, $merchId);

                if (mysqli_stmt_execute($statement)) {
                    http_response_code(200);
                    $response = [
                        "message" => "Order detail deleted successfully."
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
        }
    }

    // PUT
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["method"])) {
        if ($_POST["method"] == "put") {
            $orderId = $_POST["order-id"];
            $merchId = $_POST["merch-id"];
            $quantityOrdered = $_POST["quantity-ordered"];

            $query = "UPDATE `order_details` SET `quantity_ordered` = ? WHERE `order_id` = ? AND `merch_id` = ?;";
            $statement = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($statement, "iii", $quantityOrdered, $orderId, $merchId);

            if (mysqli_stmt_execute($statement)) {
                http_response_code(200);
                $response = [
                    "message" => "Order detail updated."
                ];
            } else {
                http_response_code(400);
                $response = [
                    "message" => mysqli_stmt_error($statement)
                ];
            }

            echo json_encode($response);
        }
    }

    // POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $orderId = $_POST["order-id"];
        $merchId = $_POST["merch-id"];
        $quantityOrdered = $_POST["quantity-ordered"];
        
        $query = "INSERT INTO `order_details` VALUES (?, ?, ?);";
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, "iii", $orderId, $merchId, $quantityOrdered);
        
        if (mysqli_stmt_execute($statement)) {
            http_response_code(200);
            $response = [
                "message" => "New order details created successfully."
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