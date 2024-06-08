<?php

    // Allow from any origin
    header('Access-Control-Allow-Origin: *');

    // Allow specific methods
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

    // Allow specific headers
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    // Set the content type to JSON
    header("Content-Type: application/json; charset=UTF-8");
    
?>
