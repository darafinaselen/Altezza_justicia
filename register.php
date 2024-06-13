<?php
session_start();
require 'connect.php';
$username = $_POST["username"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
// $S1 = $_POST["S1"];
// $S2 = $_POST["S2"];
// $biaya = $_POST["biaya"];

$_SESSION['username'] = $username;

$foto = 'default.jpg';

$query_sql = "INSERT INTO client (username, no_telpon, email, password, foto) VALUES ('$username', '$phone','$email', '$password', '$foto')";
// $query_sql = "INSERT INTO lawyer (username, email, password, S1, S2, biaya, foto) VALUES ('$username', '$email', '$password', '$S1', '$S2', '$biaya', '$foto')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: Login.html");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}