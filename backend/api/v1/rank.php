<?php

    session_start();
    require_once "../../config.php";
    include "../../auth.php";

    // GET
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        include "../../admin-auth.php";

        $query = "SELECT * FROM `sales_rank`;";
        $result = mysqli_query($connection, $query);
        $data = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        http_response_code(200);
        echo json_encode([
            "message" => "Ranking retrieved successfully.",
            "data" => $data
        ]);
        exit;
    }

?>