<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "altezzajusticia";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altezza Justicia</title>
    <link rel="stylesheet" href="styleIndex.css">
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=""><img src="Assets/logo altezza 2.png"></a></div>
            <div class="menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <!-- <li><a href="#artikel">Artikel</a></li> -->
                </ul>
            </div>
            <div class="hai">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<span class="welcome">Hai, ' . htmlspecialchars($_SESSION['username']) . '!</span>';
                } else {
                    echo '<a href="admin.html" class="masuk" id="">Login</a>';
                }
                ?>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <section id="home">
            <div class="tengahCenter">
                <div class="kolom">
                    <h1>Altezza Justicia</h1>
                    <P class="tengah">Equum et Bonum est Lex Legum</P>
                </div>

                <div class="square">
                    <div class="option">
                        <div class="lingkaran">
                            <img src="Assets/Male User.png">
                        </div>
                        <div class="ket">
                            <p><a href="profiladmin.php" class="profile" id="">Profile</a></p>
                        </div>
                    </div>

                    <div class="option">
                        <div class="lingkaran">
                            <img src="Assets/Find User Male.png">
                        </div>
                        <div class="ket">
                            <p><a href="userinfo.php" class="UserInfo" id="">User Information</a></p>
                        </div>
                    </div>

                    <div class="option">
                        <div class="lingkaran">
                            <img src="Assets/Ask Question.png">
                        </div>
                        <div class="ket">
                            <p><a href="activity1.php" class="Ask" id="">Activity</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="artikel">
            <div class="tengahCenter">
                <div class="kolom1">
                    <h3>Related Article</h3>
                </div>

                <div class="artikelBox">
                    <?php
                    // Fetch the 3 latest articles from database
                    $sql = "SELECT id, title, content, photo FROM articleDB ORDER BY created_at DESC LIMIT 3";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="box">';
                            echo '<div class="boxAtas">';
                            echo '<img src="' . htmlspecialchars($row['photo']) . '">';
                            echo '</div>';
                            echo '<div class="boxBawah">';
                            echo '<p><a href="' . htmlspecialchars($row['content']) . '">';
                            echo '<h4>' . htmlspecialchars($row['title']) . '</h4>';
                            echo '<br>' . substr(htmlspecialchars($row['content']), 0, 100) . '...read more</a></p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No articles found.";
                    }
                    ?>
                </div>
            </section>
    </div>

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

<?php $conn->close(); ?>
