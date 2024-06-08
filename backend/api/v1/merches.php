<?php
    session_start();
    require_once "../../config.php";

    if (!isset($_SESSION["user_id"])) {
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

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $query = "SELECT * FROM `merches`";
        $result = mysqli_query($connection, $query);
        $data = array();
        
        while ($row  = mysqli_fetch_assoc($result)) {
            $data[]  = $row;
        }

        http_response_code(200);
        echo json_encode([
            'data' => $data
        ]);
        exit;
    }

?>