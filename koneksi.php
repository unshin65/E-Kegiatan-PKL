<?php
// $user = "eyudhaunik";
// $pass = "intermilan";
// $database = "db_daftarhadir";
// $host = "172.16.25.57";

$user = "root";
$pass = "";
$database = "cek_db";
$host = "localhost";

$koneksi = mysqli_connect("localhost", $user, $pass, $database) or die("Connecting to MySQL failed");
try {
    $conpdo = new PDO("mysql:host={$host};dbname={$database}", $user, $pass);
}

// show error
catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
