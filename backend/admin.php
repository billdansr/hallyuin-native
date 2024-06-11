<?php

    session_start();

    if ($_SESSION["account_role"] != "admin") {
        http_response_code(400);
        echo json_encode([
            "message" => "Unauthorized. You are not an admin.",
            "redirect" => "login"
        ]);
        exit;
    } else {
        http_response_code(200);
        echo json_encode([
            "message" => "Authorized. You are an admin.",
            "redirect" => "admin"
        ]);
        exit;
    }
    
?>