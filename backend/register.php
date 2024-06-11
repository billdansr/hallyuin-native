<?php

    require_once('config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordConfirmation = $_POST["password-confirmation"];

        if ($password != $passwordConfirmation) {
            http_response_code(400);
            echo json_encode([
                "message" => "Password confirmation failed.",
                "redirect" => "register"
            ]);
            exit;
        }

        $queryUsername = "SELECT `username` FROM `accounts` WHERE `username` = '".$username."'";
        $queryEmail = "SELECT `email` FROM `accounts` WHERE `email` = '".$email."'";

        $resultUsername = mysqli_query($connection, $queryUsername);
        $resultEmail = mysqli_query($connection, $queryEmail);

        $numRowsUsername = mysqli_num_rows($resultUsername);
        $numRowsEmail = mysqli_num_rows($resultEmail);

        if ($numRowsUsername > 0) {
            http_response_code(400);
            echo json_encode([
                "message" => "Username  already exists.",
                "redirect" => "register"
            ]);
            exit;
        }
        
        if ($numRowsEmail > 0) {
            http_response_code(400);
            echo json_encode([
                "message" => "Email already exists.",
                "redirect" => "register"
            ]);
            exit;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO `accounts` (`full_name`, `username`, `email`, `password`) VALUES (?, ?, ?, ?);";
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, "ssss", $fullname, $username, $email, $password);

        if (mysqli_stmt_execute($statement)) {
            http_response_code(200);
            $response = [
                "message" => "Registration success.",
                "redirect" => "login"
            ];
        } else {
            http_response_code(400);
            $response = [
                "message" => "Registration failed.",
                "redirect" => "register"
            ];
        }

        echo json_encode($response);
    }

?>