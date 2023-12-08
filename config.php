<?php
    $host = "localhost";
    $user = "Database_User";
    $pass = "Your_PASS";
    $db_name = "Database";

    $conn = new mysqli($host, $user, $pass, $db_name);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

?>
