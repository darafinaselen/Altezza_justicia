<?php
session_start();
require 'connect.php';

// Periksa apakah pengguna telah login
if (!isset($_SESSION['id_client'])) {
    header("Location: Login.html");
    exit();
}

$id_client = $_SESSION['id_client'];

$query_sql = "SELECT username, email, no_telpon FROM client WHERE id_client = $id_client";
echo $query_sql;
$result = mysqli_query($conn, $query_sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $email = $row['email'];
    $no_telpon = $row['no_telpon'];
} else {
    echo "Data pengguna tidak ditemukan.";
    echo "Error: " . mysqli_error($conn);
    exit();
}