<div?php
session_start();
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
                <li><a href="index.html">Home</a> <b> > </b> </li>
                <li><a href="profil.php">Profil</a></li>
            </ul>
        </div>
        <div class="logout">
                <a href="index.html"class="keluar">Logout</a>
            </div>
            </div>
        </div>
    </nav>

    <div class="Wrapper">
    <section id="YourProfile">
        <h1>Your Profile</h1>
        <img id="profile-pic" class="profile-pic" src="path/to/default/profile-pic.jpg">
        <input type="file" id="file-input" class="file-input" accept="image/*">
        <div class="profile-info">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Alamat Email:</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="no_telp">Nomor Telepon:</label>
                <input type="tel" id="no_telp" name="no_telp" class="form-control">
            </div>
            <button id="simpan-perubahan" class="btn btn-primary">Simpan Perubahan</button>
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

<script src="script.js"></script>
<script>
document.getElementById('profile-pic').addEventListener('click', function() {
    document.getElementById('file-input').click();
});

document.getElementById('file-input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-pic').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script>

</body>
</html>