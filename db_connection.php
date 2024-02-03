<?php
    $servername = "172.20.0.4";
    $port = 3306;
    $username = "root";
    $password = "password";
    $dbname = "WEBPRO_ESTKIT1";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>