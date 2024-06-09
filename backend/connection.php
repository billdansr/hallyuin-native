<?php

    // define('HOST', 'localhost');
    // define('USER', 'id22222540_hallyuin');
    // define('PASS', 'H4llyu.1n');
    // define('DB', 'id22222540_hallyuin');

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'hallyuin-native');

    $connection = mysqli_connect(HOST, USER, PASS, DB) or die("Failed to connect to db.");

?>