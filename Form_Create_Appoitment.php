<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altezza Justicia</title>
    <link rel="stylesheet" href="Form_Create_Appoitment.css">
</head>
<body>
<nav>
    <div class="wrapper">
        <div class="logo"><a href=""><img src="Assets/logo altezza 2.png" alt="Logo"></a></div>
        <div class="menu">
            <ul>
                <li><a href="homeLog.php">Home</a> <b> > </b> </li>
                <li><a href="LawyerList.php">Lawyer List</a> <b> > </b></li>
                <li><a href="Form_Create_Appoitment.php"> Form </a></li>
            </ul>
        </div>
        <div class="hai">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<span class="welcome">Hai, ' . htmlspecialchars($_SESSION['username']) . '!</span>';
            } else {
                echo '<a href="Login.html" class="masuk">Login</a>';
            }
            ?>
        </div>
    </div>
</nav>

<div class="wrapper">
    <section class="create-appointment">
        <h1>Create an Appointment With Your Law Consultant</h1>
        <p>Please Fill this Form</p>
        <form action="Payment.php" method="post" id="appointmentForm">

            <div class="form-group">
                <label for="consultant">Your Consultant:</label>
                <?php
                if (isset($_SESSION['consultant_name'])) {
                    echo '<span>' . htmlspecialchars($_SESSION['consultant_name']) . '</span>';
                } else {
                    echo '<span></span>';
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
                <button type="submit" class="submit" id="submitButton">Submit</button>
            </div>
        </form>
    </section>
</div>

<script>
document.getElementById('appointmentForm').addEventListener('submit', function(event) {
    const form = event.target;

    // Check if all required fields are filled
    if (!form.checkValidity()) {
        event.preventDefault();
        alert('Please fill in all required fields.');
    }
});
</script>
</body>
</html>
