<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "housing-co";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
?>