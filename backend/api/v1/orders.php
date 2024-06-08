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

    // Get
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];

        if (isset($id) and is_int((int) $id)) {
            $query = "SELECT * FROM `orders` WHERE `id` = '".$id."';";
            $result = mysqli_query($connection, $query);
            $data = mysqli_fetch_assoc($result);

            http_response_code(200);
            echo json_encode([
                "message" => "Order retrieved.",
                "data" => $data
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
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["method"])) {
        if ($_POST["method"] == "delete") {
            $id = $_POST["id"];

            
        }
    }

    // Put
    // if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["method"])) {
    //     if ($_POST["method" = ])
    // }

?>