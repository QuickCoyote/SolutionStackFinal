<?php

    $host = "localhost";
    $username = "bluwub";
    $db_password = "bluwub";
    $db_name = "bluwub"; 


$mysqli = new mysqli($host, $username, $db_password, $db_name);

if(mysqli_connect_errno()) {
    echo "Error: Could not connect to database.";
    exit;
}
