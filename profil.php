<?php
session_start();
require ('connect.php');

$username = "";
$email = "";
$phone = "";
$foto = "";

if (!isset($_SESSION['id_client'])) {
    header("Location: Login.html");
    exit();
}

$id_client = $_SESSION['id_client'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $fileType = $_FILES['foto']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        $uploadFileDir = './Uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $query_update = "UPDATE client SET username = ?, email = ?, no_telpon = ?, foto = ? WHERE id_client = ?";
                if ($stmt_update = $conn->prepare($query_update)) {
                    $stmt_update->bind_param("ssssi", $username, $email, $phone, $newFileName, $id_client);
                    if ($stmt_update->execute()) {
                        echo "<script>alert('Profil berhasil diperbarui.');</script>";
                    } else {
                        echo "Error updating profile: " . $stmt_update->error;
                    }
                    $stmt_update->close();
                } else {
                    echo "Error preparing update statement: " . $conn->error;
                }
            } else {
                echo "Error moving the uploaded file.";
            }
        } else {
            echo "Upload failed. Allowed file types: " . implode(',', $allowedfileExtensions);
        }
    } else {
        $query_sql = "UPDATE client SET username = ?, email = ?, no_telpon = ? WHERE id_client = ?";
        if ($stmt = $conn->prepare($query_sql)) {
            $stmt->bind_param("sssi", $username, $email, $phone, $id_client);
            if ($stmt->execute()) {
                echo "<script>alert('Profil berhasil diperbarui.');</script>";
            } else {
                echo "Error updating profile: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $conn->error;
        }
    }
}

$query_sql = "SELECT username, email, no_telpon, foto FROM client WHERE id_client = ?";
if ($stmt = $conn->prepare($query_sql)) {
    $stmt->bind_param("i", $id_client);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $email = $row['email'];
        $phone = $row['no_telpon'];
        $foto = $row['foto'];

    } else {
        echo "Data pengguna tidak ditemukan.";
        exit();
    }
    $stmt->close();
} else {
    echo "Error preparing the statement: " . $conn->error;
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profil.css">
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=""><img src="Assets/logo altezza 2.png"></a></div>
            <div class="menu">
                <ul>
                    <li><a href="homeLog.php">Home</a> <b> > </b> </li>
                    <li><a href="profil.php">Profil</a></li>
                </ul>
            </div>
            <div class="logout">
                <a href="index.html" class="keluar">Logout</a>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <section id="YourProfile">
            <h1>Your Profile</h1>
            <div class="kotak">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="fotoPro">
                        <img id="profile-pic" class="profile-pic"
                            src="Uploads/<?php echo htmlspecialchars($foto ?: 'default.jpg'); ?>" alt="Foto Profil">
                        <!-- <input type="file" id="file-input" class="file-input" name="foto" accept="image/*"> -->
                    </div>
                </form>
                <div class="data">
                    <p>Username: <?php echo htmlspecialchars($username); ?></p>
                    <p>Email: <?php echo htmlspecialchars($email); ?></p>
                    <p>No Telpon: <?php echo htmlspecialchars($phone); ?></p>
                    <p>Client</p>
                </div>
            </div>
            <h1>Edit Profile</h1>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="profile-info">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="username" class="form-control"
                            value="<?php echo htmlspecialchars($username); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat Email:</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon:</label>
                        <input type="tel" id="no_telp" name="phone" class="form-control"
                            value="<?php echo htmlspecialchars($phone); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Profil:</label>
                        <input type="file" id="file-input" class="form-control" name="foto" accept="image/*">
                    </div>
                    <button type="submit" id="simpan-perubahan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </section>

        <div class="footer">
            <div class="footer-section-logo">
                <div class="logo-footer"><a href=""><img src="Assets/logo altezza 2.png">Altezza Justicia</a></div>
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

    <script src="script.js"></script>
    <script>
        // document.getElementById('profile-pic').addEventListener('click', function () {
        //     document.getElementById('file-input').click();
        // });

        document.getElementById('file-input').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('profile-pic').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>