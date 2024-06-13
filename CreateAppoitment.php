<?php
session_start();
require ('connect.php');

if (!isset($_SESSION['username'])) {
    header("Location: Login.html");
    exit();
}

$id_client = $_SESSION['id_client'];


$sql = "SELECT 
           l.username AS lawyer_name, 
           a.tanggal AS valid_until
        FROM appoitment a
        LEFT JOIN lawyer l ON a.id_lawyer = l.id_lawyer
        WHERE a.id_client = ?
        ORDER BY a.id_appoitment DESC 
        LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_client);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lawyer_name = $row['lawyer_name'] ?? "Data tidak tersedia";
        $valid_until = $row['valid_until'] ?? "Data tidak tersedia";
        $id_lawyer = $row['id_lawyer'] ?? null;

        if ($id_lawyer !== null) {
            $status = determineLawyerStatus($id_lawyer);
        } else {
            $status = "Menunggu";
        }
    } else {
        $lawyer_name = "Data tidak tersedia";
        $valid_until = "Data tidak tersedia";
        $status = "Data tidak tersedia";
    }
} else {
    echo "Error executing query: " . $stmt->error;
}

function determineLawyerStatus($id_lawyer)
{
    return "Menunggu";
}
$stmt->close();
$conn->close();


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
                    <li><a href="CreateAppoitment.php">Create Appoitment</a></li>
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
                            <p>Name : <?php echo htmlspecialchars($lawyer_name); ?></p>
                            <p>Valid Until : <?php echo htmlspecialchars($valid_until); ?></p>
                            <p>Status : <?php echo htmlspecialchars($status); ?></p>
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
                    </ul </div>
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