<?php
session_start();
require 'connect.php';
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$_SESSION['username'] = $username;

$query_sql = "INSERT INTO admin (username, email, password) VALUES ('$username', '$email', '$password')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: LoginAdmin.php");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}