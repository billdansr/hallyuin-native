<?php

    session_start();
    require_once "../../config.php";
    include "../../auth.php";

    // GET
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = isset($_GET["id"]) ? $_GET["id"] : null;

        if ($id && is_int((int) $id)) {
            $query = "SELECT * FROM `payments` WHERE `id` = '".$id."';";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) === 1) {
                $data = mysqli_fetch_assoc($result);

                http_response_code(200);
                echo json_encode([
                    "message" => "Payment retrieved.",
                    "data" => $data
                ]);
                exit;
            } else {
                http_response_code(400);
                echo json_encode([
                    "message" => "Payment not found."
                ]);
                exit;
            }
        }

        $query = "SELECT * FROM `payments`;";
        $result = mysqli_query($connection, $query);
        $data = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        http_response_code(200);
        echo json_encode([
            "message" => "Payments retrieved.",
            "data" => $data
        ]);
        exit;
    }

    // DELETE
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["method"])) {
        include "../../admin-auth.php";
        if ($_GET["method"] == "delete") {
            $id = $_GET["id"];

            $query = "DELETE FROM `payments` WHERE `id` = ?;";
            $statement = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($statement, "i", $id);
            
            if (mysqli_stmt_execute($statement)) {
                http_response_code(200);
                $response = [
                    "message" => "Payment deleted successfully."
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

    // PUT
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["method"])) {
        include "../../admin-auth.php";
        if ($_POST["method"] == "put") {
            $amount = $_POST["amount"];
            $paidDate = $_POST["paid-date"];

            $query = "UPDATE `payments` SET `amount` = ?, `paid_date` = ?;";
            $statement = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($statement, "ds", $amount, $paidDate);

            if (mysqli_stmt_execute($statement)) {
                http_response_code(200);
                $response = [
                    "message" => "Payment updated."
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
        $accountId = $_SESSION["account_id"];
        $orderId = $_POST["order-id"];

        $query = "CALL `pay`(?, ?);";
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, "ii", $accountId, $orderId);

        if (mysqli_stmt_execute($statement)) {
            http_response_code(200);
            $response = [
                "message" => "Payment successful."
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