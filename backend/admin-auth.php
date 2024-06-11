<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SESSION["account_role"] != "admin") {
        http_response_code(400);
        echo json_encode([
            "message" => "Unauthorized. You are not an admin.",
            "redirect" => "login"
        ]);
        exit;
    }
    
?>