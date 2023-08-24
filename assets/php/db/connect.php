<?php
    $host = "locahost";
    $username = "root";
    $password = "";
    $dbname = "tcn-shop";

    $conn = new mysqli($host, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Kết nối không thành công:". $conn->connect_error);
    }
    echo "Kết nối thành công";
?>