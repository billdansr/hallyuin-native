<?php

    session_start();
    require_once "../../config.php";
    include "../../auth.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $query = "SELECT * FROM `new_releases`;";
        $result = mysqli_query($connection, $query);
        $data = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        http_response_code(200);
        echo json_encode([
            "message" => "New releases retrieved successfully.",
            "data" => $data
        ]);
    }

?>