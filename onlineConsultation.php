<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Altezza Justicia</title>
    <link rel="stylesheet" href="onlineConsultation.css">
</head>

<body>    
<nav>
    <div class="wrapper">
        <div class="logo"><a href=""><img src="Assets/logo altezza 2.png"></a></div>
        <div class="menu">
            <ul>
                <li><a href="homeLog.php">Home</a> <b> > </b> </li>
                <li><a href="onlineConsultation.php">Online Consultation</a></li>
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

<main>
    <div class="wrapper">
        <div class = option>
        <h1>Online Consultation</h1>
        <p id = "p1" >Consulation through a platform that allows users to interact with lawyers anywhere and at any time.</p>
        <p id="p2">You can contact a lawyer two times a week (30 minutes per session) for <span class="red-text">free</span>.</p>
        <p id = "p3" ><b>Please contact us on WhatsApp for online consultation</b></p>
        <a href="https://wa.me/087845033099" class="box">WhatsApp</a>
    </div>
    </div>
</main>

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