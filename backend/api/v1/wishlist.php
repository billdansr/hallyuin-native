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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accountId = $_SESSION["account_id"];
        $merchId = $_POST["merch-id"];

        $query = "SELECT * FROM `wishlists` WHERE `account_id` = '".$accountId."' AND `merch_id` = '".$merchId."';";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            $query = "DELETE FROM `wishlists` WHERE `account_id` = ? AND `merch_id` = ?;";
            $statement = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($statement, "ii", $accountId, $merchId);
            mysqli_stmt_execute($statement);

            http_response_code(200);
            echo json_encode([
                "message" => "Merch unwishlisted."
            ]);
            exit;
        }
        
        $query = "INSERT INTO `wishlists` VALUES (?, ?);";
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, "ii", $accountId, $merchId);
        mysqli_stmt_execute($statement);

        http_response_code(200);
        echo json_encode([
            "message" => "Merch wishlisted."
        ]);
        exit;
    }

?>