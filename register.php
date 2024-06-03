<?php
session_start();
require 'connect.php';
$username = $_POST["username"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];

$_SESSION['username'] = $username;

$query_sql = "INSERT INTO client (username, no_telpon, email, password) VALUES ('$username', '$phone','$email', '$password')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: Login.html");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}