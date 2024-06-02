<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Altezza Justicia</title>
    <link rel="stylesheet" href="Payment.css">
</head>

<body>
<nav>
    <div class="wrapper">
        <div class="logo"><a href=""><img src="Assets/logo altezza 2.png"></a></div>
        <div class="menu">
            <ul>
                <li><a href="homeLog.php">Home</a> <b> > </b> </li>
                <li><a href="Payment.php">Lawyer List</a> <b> > </b></li>
                <li><a href="Form_Create_Appoitment.php"> Form </a> <b> > </b></li>
                <li><a href="Payment.php">Payment</a></li>
            </ul>
        </div>
        <div class="hai">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<span class="welcome">Hai, ' . htmlspecialchars($_SESSION['username']) . '!</span>';
                } else {
                    echo '<a href="Login.html" class="masuk" id="">Login</a>';
                }
                ?>
        </div>
</nav>