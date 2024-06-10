<?php

    session_start();
    require_once "../../config.php";
    include "../../auth.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $search = $_GET["search"];

        $query = "SELECT * FROM `merches` WHERE `name` LIKE '%".$search."%';";
        $result = mysqli_query($connection, $query);
        $data = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        echo json_encode([
            "message" => "Searched.",
            "data" => $data
        ]);
        exit;
    }

?>