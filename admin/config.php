<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecommerce";

    $conn = new mysqli($server, $username, $password, $dbname);

    if(!$conn)
    {
        die("Failed to connect" . mysqli_connect_error() );
    }
    else
    {
        //echo "Connected Successfully";
    }
?>