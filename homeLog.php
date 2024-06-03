<?php
session_start();
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
                    <li><a href="homeLog.php">Home</a></li>
                    <!-- <li><a href="#artikel">Artikel</a></li> -->
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
                            <p><a href="profil.php" class="Profile" id="">Profile</a></p>
                        </div>
                    </div>

                    <div class="option">
                        <div class="lingkaran">
                            <img src="Assets/Gmail Logo.png">
                        </div>
                        <div class="ket">
                            <p><a href="onlineConsultation.php" class="Gmail" id="">Online Consultation</a></p>
                        </div>
                    </div>

                    <div class="option">
                        <div class="lingkaran">
                            <img src="Assets/Reception.png">
                        </div>
                        <div class="ket">
                            <p><a href="CreatAppoitment.php" class="Reception" id="">Create Appointment</a></p>
                        </div>
                    </div>

                    <div class="option">
                        <div class="lingkaran">
                            <img src="Assets/Ask Question.png">
                        </div>
                        <div class="ket">
                            <p><a href="" class="Ask" id="">Information</a></p>
                        </div>
                    </div>

                    <div class="option">
                        <div class="lingkaran">
                            <img src="Assets/Address.png">
                        </div>
                        <div class="ket">
                            <p><a href="" class="Address" id="">Nearest Law Office</a></p>
                        </div>
                    </div>

                    <div class="option">
                        <div class="lingkaran">
                            <img src="Assets/Lawyer.png">
                        </div>
                        <div class="ket">
                            <p><a href="LawyerList.php" class="Lawyer" id="">Lawyer List</a></p>
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
                    <div class="box">
                        <div class="boxAtas">
                            <img
                                src="https://duniadosen.com/wp-content/uploads/2017/07/hak-atas-kekayaan-intelektual.jpg">
                        </div>
                        <div class="boxBawah">
                            <p><a
                                    href="https://duniadosen.com/hak-kekayaan-intelektual-memperkuat-menghadapi-masyarakat-ekonomi-asia/">
                                    <h4>Hak Kekayaan Intelektual Memperkuat Menghadapi Masyarakat Ekonomi Asia</h4>
                                    <br>Pentingnya Hak Kekayaan Intelektual (HKI) di kancah MEA (Masyarakat Ekonomi
                                    Asia) terus diperkenalkan...read more
                                </a></p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="boxAtas">
                            <img src="https://images.hukumonline.com/frontend/lt4fc583987ab36/lt4fc63a4de32b2.jpg">
                        </div>
                        <div class="boxBawah">
                            <p><a
                                    href="https://www.hukumonline.com/berita/a/tabrak-peraturan--kontrak-batal-demi-hukum-lt4fc583987ab36">
                                    <h4>Tabrak Peraturan, Kontrak Batal Demi Hukum</h4>
                                    <br>Perjanjian kerjasama yang tertuang dalam kontrak seharusnya batal demni hukum
                                    jika substansi kontrak itu bertentangan...read more
                                </a></p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="boxAtas">
                            <img
                                src="https://asset.kompas.com/crops/KNdP3s4Lvhlhn0nDA2NUge2kb1w=/195x0:780x390/1200x800/data/photo/2014/12/15/1236290Palu780x390.jpg">
                        </div>
                        <div class="boxBawah">
                            <p><a
                                    href="https://money.kompas.com/read/2021/09/02/140317126/mk-tegaskan-eksekusi-jaminan-fidusia-lewat-pengadilan-hanya-alternatif">
                                    <h4>MK Tegaskan Eksekusi Jaminan Fidusia lewat Pengadilan Hanya Alternatif</h4>
                                    <br>Mahkamah Konstitusi (MK) menegaskan, eksekusi sertifikat jaminan fidusia melalui
                                    pengadilan...read more
                                </a></p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <div class="regisLawyer">
        <div class="tulisan">
            <h3>Are You a Lawyer?</h3>
            <P class="tengah">click here for register as a lawyer</P>
        </div>
        <div class="registerTombol">
            <a href="lawyerRegister.php" class="daftar" id="">Register</a>
        </div>
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