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

// Fetch all appointments
$sql = "SELECT * FROM appointment_db";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altezza Justicia</title>
    <link rel="stylesheet" href="clientlist.css">
</head>

<body>
<nav>
    <div class="wrapper">
        <div class="logo"><a href=""><img src="Assets/logo altezza 2.png" alt="Logo"></a></div>
        <div class="menu">
            <ul>
                <li><a href="admin.html">Home</a> <b> > </b> </li>
                <li><a href="LawyerList.php">Lawyer List</a></li>
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
                <h1>Client List</h1>
            </div>
            <div class="square">
                <div class="option">
                    <div class="lingkaran">
                        <!-- Kode untuk menampilkan data janji disini -->
                        <div class="appointment-data">
                            <h1>Data Janji</h1>
                            <?php if ($result->num_rows > 0): ?>
                                <table>
                                    <tr>
                                        <th>Consultant</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Appointment Date</th>
                                        <th>Case</th>
                                    </tr>
                                    <?php while($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['consultant']); ?></td>
                                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                            <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                                            <td><?php echo htmlspecialchars($row['case_description']); ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </table>
                            <?php else: ?>
                                <p>No appointments found.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
</div>

<!-- Footer dan lainnya di sini -->
</body> 
</html>

<?php
$conn->close();
?>