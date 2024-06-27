<?php
session_start();
require ('connect.php');

if (!isset($_SESSION['id_lawyer'])) {
    echo 'Lawyer ID not set in session.';
    exit();
}

$query = "
    SELECT 
        client.username AS client_username,
        client.email AS client_email,
        client.foto AS client_foto,
        appoitment.kasus,
        appoitment.tanggal
    FROM 
        appoitment
    JOIN 
        client ON appoitment.id_client = client.id_client
    WHERE
        appoitment.id_lawyer = ?
";

$stmt = $conn->prepare($query);

if ($stmt === false) {
    die('Error preparing the statement: ' . $conn->error);
}

$stmt->bind_param("i", $_SESSION['id_lawyer']);
$stmt->execute();
$result = $stmt->get_result();
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

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="square">
                            <div class="option">
                                <div class="lingkaran">
                                    <img src="Uploads/' . htmlspecialchars($row['client_foto']) . '" alt="">
                                </div>
                                <div class="bio">
                                    <p><b>' . htmlspecialchars($row['client_username']) . '</b></p>
                                    <p>' . htmlspecialchars($row['client_email']) . '</p>
                                    <p>' . htmlspecialchars($row['kasus']) . '</p>
                                    <p>' . htmlspecialchars($row['tanggal']) . '</p>
                                </div>
                            </div>
                           </div>';
                    }
                } else {
                    echo '<p>No scheduled appointments found.</p>';
                }
                ?>

                <!-- <div class="square">
                <div class="option">
                    <div class="lingkaran">
                        <div class="appointment-data">
                            <h1></h1>
                        </div>
                    </div>
                </div>
            </div>  -->

            </div>
        </section>
    </div>

</body> 

</html>