<?php
    $host = "localhost";
    $user = "lineuser";
    $pass = "1234@098";
    $db_name = "newsline";

    $conn = new mysqli($host, $user, $pass, $db_name);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

?>