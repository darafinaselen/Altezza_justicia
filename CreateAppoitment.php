<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Altezza Justicia</title>
    <link rel="stylesheet" href="CreateAppoitment.css">
</head>

<body>
<nav>
    <div class="wrapper">
        <div class="logo"><a href=""><img src="Assets/logo altezza 2.png"></a></div>
        <div class="menu">
            <ul>
                <li><a href="homeLog.php">Home</a> <b> > </b> </li>
                <li><a href="CreateAppoitment.php">Create  Appoitment</a></li>
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
    <section>
        <div class="tengahCenter">
            <div class="kolom">
                <h1>Our Consultant Team</h1>
            </div>
        </div>

        <div class="square">
            <div class="option">
                <img src="Assets/Timeline Week.png" class="gambar">
                <div class="text-container">
                    <div class="ket">
                        <p>Name : </p>
                        <p>Valid Until : </p>
                        <p>Status : </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="option">
            <a href="LawyerList.php" class="box appointment-button"><b>+ New Appointment</b></a>
        </div>
    </section>
</div>


<!-- Footer -->
<div class="wrapper">
        <div class="footer">
            <div class="footer-section-logo">
                <div class="logo-footer"><a href=""><img src="Assets/logo altezza 2.png" />Altezza Justicia</a></div>
                <div class="iconMedsos">
                    <ul>
                        <li><img src="Assets/IconFb.svg" alt=""></li>
                        <li><img src="Assets/Iconlinkdin.svg" alt=""></li>
                        <li><img src="Assets/IconYtb.svg" alt=""></li>
                        <li><img src="Assets/IconInstg.svg" alt=""></li>
                    </ul
                </div>
            </div>
            <div class="footer-section-menu">
                <!-- Menu di bagian footer -->
                <div class="item">
                    <h4>Topic</h4>
                    <div class="topic">
                        <ul>
                            <li><a href="">Page</a></li>
                            <li><a href="">Page</a></li>
                            <li><a href="">Page</a></li>
                        </ul>
                    </div>
                </div>

                <div class="item">
                    <h4>Topic</h4>
                    <div class="topic">
                        <ul>
                            <li><a href="">Page</a></li>
                            <li><a href="">Page</a></li>
                            <li><a href="">Page</a></li>
                        </ul>
                    </div>
                </div>

                <div class="item">
                    <h4>Topic</h4>
                    <div class="topic">
                        <ul>
                            <li><a href="">Page</a></li>
                            <li><a href="">Page</a></li>
                            <li><a href="">Page</a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
</html>