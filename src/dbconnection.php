<?php
    $servername = "localhost";
    
    $username = "root";
    $password = "password";
    $dbname = "crudApp";

    
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>