<?php
$servername = "localhost";
$database = "altezzajusticia";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("koneksi gagal : " . mysqli_connect_error());
} else {
    // echo "koneksi berhasil";
    if (basename($_SERVER['SCRIPT_NAME']) == basename(__FILE__)) {
        echo "koneksi berhasil";
    }
}