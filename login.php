<?php
session_start();
require 'connect.php';

$email = $_POST["email"];
$password = $_POST["password"];

// $_SESSION['username'] = $username;

$query_sql = "SELECT* FROM client WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $full_username = $row['username'];
    $first_name = explode(' ', $full_username)[0];
    $_SESSION['username'] = $first_name;
    // $_SESSION['username'] = $row['username'];
    $_SESSION['id_client'] = $row['id_client'];
    header("Location: homeLog.php");
    exit();
} else {
    echo "<script>alert('Email atau Password Anda Salah. Silakan Coba Login Kembali.'); window.location.href='Login.html';</script>";
}

$query_sql = "SELECT* FROM lawyer WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $full_username = $row['username'];
    $first_name = explode(' ', $full_username)[0];
    $_SESSION['username'] = $first_name;
    // $_SESSION['username'] = $row['username'];
    $_SESSION['id_lawyer'] = $row['id_lawyer'];
    header("Location: homeLog_lawyer.php");
    exit();
} else {
    echo "<script>alert('Email atau Password Anda Salah. Silakan Coba Login Kembali.'); window.location.href='Login.html';</script>";
}

