<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Altezza Justicia</title>
    <link rel="stylesheet" href="lawyerList.css">
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
    <section>
        <div class="tengahCenter">
            <div class="kolom">
                <h1>Our Consultant Team</h1>
            </div>
            <div class="square" onclick="window.location.href='Form_Create_Appoitment.php';">
                <div class="option">
                    <div class="lingkaran">
                        <img src="Assets/Dara.jpg" alt="Consultant">
                    </div>
                </div>
                <div class="bio">
                        <p><b>Dara Finas Elen . SH., MH </b></p>
                        <p>S1 at Universitas Gadjah Mada</p>
                        <p>S2 at Harvard University</p>
                        <p><b>IDR. 500.000/ 2 hours</b></p>
                        <!-- <p><a href="CreatAppoitment.php" class="Appoitment" id="">Appointment</a></p> -->
                </div>
            </div> 

            <div class="square" onclick="window.location.href='Form_Create_Appoitment.php';">
                <div class="option">
                    <div class="lingkaran">
                        <img src="Assets/Azkiya.jpg" alt="Consultant">
                    </div>
                </div>
                <div class="bio">
                        <p><b> Nabila Azkiya Rosyida Wijayanti . SH., MH </b></p>
                        <p>S1 at Universitas Gadjah Mada</p>
                        <p>S2 at Melbourne University</p>
                        <p><b>IDR. 500.000/ 2 hours</b></p>
                        <!-- <p><a href="CreatAppoitment.php" class="Appoitment" id="">Appointment</a></p> -->
                </div>
            </div> 

            <div class="square" onclick="window.location.href='Form_Create_Appoitment.php';">
                <div class="option">
                    <div class="lingkaran">
                        <img src="Assets/Nadya.jpg" alt="Consultant">
                    </div>
                </div>
                <div class="bio">
                        <p><b> Nadya Azzahra . SH., MH </b></p>
                        <p>S1 at Universitas Gadjah Mada</p>
                        <p>S2 at Oxford University</p>
                        <p><b>IDR. 500.000/ 2 hours</b></p>
                        <!-- <p><a href="CreatAppoitment.php" class="Appoitment" id="">Appointment</a></p> -->
                </div>
            </div> 
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
                </ul>
    
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