<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Altezza Justicia</title>
    <link rel="stylesheet" href="Form_Create_Appoitment.css">
</head>

<body>
<nav>
    <div class="wrapper">
        <div class="logo"><a href=""><img src="Assets/logo altezza 2.png"></a></div>
        <div class="menu">
            <ul>
                <li><a href="homeLog.php">Home</a> <b> > </b> </li>
                <li><a href="LawyerList.php">Lawyer List</a></li>
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

<div class="wrapper">
<section class="create-appointment">
    <h1>Create an Appointment With Your Law Consultant</h1>
    <p>Please Fill this Form</p>
    <form action="*" method="post">

    <div class="form-group">
        <label for="consultant">Your Consultant:</label>
    <?php
        // Memeriksa apakah nama konsultan telah dipilih sebelumnya
        if (isset($_SESSION['consultant_name'])) {
        // Jika sudah dipilih, tampilkan nama konsultan yang dipilih
        echo '<span>' . htmlspecialchars($_SESSION['consultant_name']) . '</span>';
        } else {
        // Jika belum dipilih, tampilkan pesan placeholder
        echo '<span>...</span>';
        }
    ?>
    </div>

        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" required>
        </div>
        
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Phone Number or WhatsApp</label>
            <input type="tel" name="phone" id="phone" required>
        </div>

        <div class="form-group">
            <label for="date">Appointment Date and Time:</label>
            <input type="datetime-local" id="date" name="date" required>
        </div>

        <div class="form-group">
            <label for="case">Your Case (max 150 char)</label>
            <textarea name="case" id="case" maxlength="150" required></textarea>
        </div>
        
        <div class="form-group">
            <button type="submit">Summit</button>
        </div>
    </form>
</section>
</div>
</body>
</html>