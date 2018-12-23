<?php

function db_connection() {

    $con = mysqli_connect("localhost", "root", "root", "improve");

    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
    }

    return $con;
}

?>
