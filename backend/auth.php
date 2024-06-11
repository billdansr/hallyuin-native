<?php

    session_start();

    if (!isset($_SESSION["account_id"])) {
        http_response_code(400);
        echo json_encode([
            "message" => "Unauthorized.",
            "redirect" => "login"
        ]);
        exit;
    } else {
        http_response_code(200);
        echo json_encode([
            "message" => "Authorized.",
        ]);
        exit;
    }

?>