<?php

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'hallyuin-native');

    $connection = mysqli_connect(HOST, USER, PASS, DB) or die("Gagal menghubungkan ke db");

?>