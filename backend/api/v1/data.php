<?php

    include '../../cors.php';
    require_once '../../connection.php';

    $result = mysqli_query($connection, "SELECT * FROM `accounts`");

    $data = array();

    while ($row = mysqli_fetch_row($result)) {
        array_push($data, array(
            'id' => $row[0],
            'name' => $row[1]
        ));
    }

    http_response_code(200);

    echo json_encode(
        array('result' => $result)
    );

?>