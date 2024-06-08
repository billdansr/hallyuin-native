<?php

    session_start();
    require_once "config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        // $rememberMe = isset($_POST["remember-me"]);
        
        $query = "SELECT * FROM `accounts` WHERE `username` = ?";
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        $numRows = mysqli_num_rows($result);

        if ($numRows === 1) {
            $account = mysqli_fetch_assoc($result);

            if (password_verify($password, $account["password"])) {
                $_SESSION["account_id"] = $account["id"];
                $_SESSION["account_role"] = $account["role"];

                // $days = 30;
                // $cookieExpiration = time() + 60 * 60 * 24 * $days;

                // if ($rememberMe) {
                    // $token = bin2hex(random_bytes(16));
                    // $expiresAt = date("Y-m-d H:i:s", strtotime("+30 days"));

                    // $insertQuery = "INSERT INTO `user_tokens` (`user_id`, `token`, `expiresAt`) VALUES (?, ?, ?);";
                    // $insertStatement = mysqli_prepare($connection, $insertQuery);
                    // mysqli_stmt_bind_param($insertStatement, "iss", $user["id"], $token, $expiresAt);
                    // mysqli_stmt_execute($insertStatement);

                    // setcookie("remember_me", password_hash($token, PASSWORD_DEFAULT), time() + (30 * 24 * 60 * 60), "/");
                // }

                http_response_code(200);
                if ($account["role"] = "user") {
                    $response = [
                        "message" => "Login success",
                        "redirect" => "/"
                    ];
                }
            } else {
                http_response_code(400);
                $response = [
                    "message" => "Password is incorrect."
                ];
            }
        } else {
            http_response_code(400);
            $response = [
                "message" => "Account does not exists."
            ];
        }

        echo json_encode($response);
    }

?>