<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Altezza Justicia</title>
    <link rel="stylesheet" href="schedule_lawyer.css">
</head>

<body>
<nav>
    <div class="wrapper">
        <div class="logo"><a href=""><img src="Assets/logo altezza 2.png" alt="Logo"></a></div>
        <div class="menu">
            <ul>
                <li><a href="homeLog_lawyer.php">Home</a> <b> > </b> </li>
                <li><a href="schedule.php">Schedule</a></li>
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
    <section>
        <div class="tengahCenter">
            <div class="kolom">
                <h1>Scheduled Appoitment</h1>
            </div>
            <div class="square">
                <div class="option">
                    <div class="lingkaran">
                        <!-- Kode untuk menampilkan data janji disini -->
                        <div class="appointment-data">
                            <h1></h1>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
</div>

</body> 
</html>