<?php

    if ($_SESSION["account_role"] != "admin") {
        http_response_code(400);
        echo json_encode([
            "message" => "Unauthorized. You are not an admin.",
            "redirect" => "login.html   "
        ]);
        exit;
    }
    
?>