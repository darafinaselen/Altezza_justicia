<?php
session_start();
require ('connect.php');

function getLawyerNameById($conn, $id_lawyer)
{
    $sql = "SELECT username FROM lawyer WHERE id_lawyer = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_lawyer);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['username'];
    } else {
        return "Consultant Not Found";
    }
}

function getClientInfoById($conn, $id_client)
{
    $sql = "SELECT username, email, no_telpon FROM client WHERE id_client = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_client);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

if (!isset($_SESSION['username'])) {
    header("Location: Login.html");
    exit();
}

if (isset($_GET['id'])) {
    $id_lawyer = $_GET['id'];
    $_SESSION['id_lawyer'] = $id_lawyer;
    $lawyer_name = getLawyerNameById($conn, $id_lawyer);
    // $_SESSION['username'] = $lawyer_name;
} elseif (isset($_SESSION['id_lawyer'])) {
    $id_lawyer = $_SESSION['id_lawyer'];
    $lawyer_name = getLawyerNameById($conn, $id_lawyer);
    echo '<input type="text" name="lawyer" id="lawyer" value="' . htmlspecialchars($lawyer_name) . '" readonly>';
} else {
    header("Location: LawyerList.php");
    exit();
}

$id_client = $_SESSION['id_client'];
$client_info = getClientInfoById($conn, $id_client);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kasus = $_POST['kasus'] ?? '';
    $tanggal = $_POST['tanggal'] ?? '';

    // // Debug statements
    // echo "Kasus: " . htmlspecialchars($kasus) . "<br>";
    // echo "Tanggal: " . htmlspecialchars($tanggal) . "<br>";

    if (!empty($kasus) && !empty($tanggal)) {
        $sql = "INSERT INTO appoitment (kasus, tanggal, id_client, id_lawyer) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $kasus, $tanggal, $id_client, $id_lawyer);

        if ($stmt->execute()) {
            echo '<script>
                    alert("Appointment created successfully!");
                    window.location.href = "Payment.php";
                  </script>';
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}
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
            <form action="" method="post" id="appointmentForm">

                <!-- <div class="form-group">
                    <label for="consultant">Your Consultant:</label>
                </div> -->

                <div class="form-group">
                    <label for="lawyer">Your Consultant</label>
                    <input type="text" name="lawyer" id="lawyer" value="<?php echo htmlspecialchars($lawyer_name); ?>"
                        readonly>
                </div>

                <div class="form-group">
                    <label for="username">Your Name</label>
                    <input type="text" name="username" id="username"
                        value="<?php echo htmlspecialchars($client_info['username']); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email"
                        value="<?php echo htmlspecialchars($client_info['email']); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number or WhatsApp</label>
                    <input type="tel" name="phone" id="phone"
                        value="<?php echo htmlspecialchars($client_info['no_telpon']); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="date">Appointment Date and Time:</label>
                    <input type="datetime-local" id="tanggal" name="tanggal" required>
                </div>

                <div class="form-group">
                    <label for="case">Your Case (max 150 char)</label>
                    <textarea name="kasus" id="kasus" maxlength="150" required></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="submit" id="submitButton">Submit</button>
                </div>
            </form>
        </section>
    </div>

    <script>
        document.getElementById('appointmentForm').addEventListener('submit', function (event) {
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