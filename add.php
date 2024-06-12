<?php
// Konfigurasi Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artikelDB";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fungsi untuk mengunggah artikel
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $url = htmlspecialchars($_POST['url']);
    $thumbnail = htmlspecialchars($_POST['thumbnail']);

    // Menyimpan artikel ke database
    $stmt = $conn->prepare("INSERT INTO articles (title, url, thumbnail) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $url, $thumbnail);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload and Display Articles</title>
    <!-- CSS Styling -->
</head>
<body>
    <div class="container">
        <h1>Upload New Article</h1>
        <form action="" method="post">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br><br>

            <label for="url">URL:</label><br>
            <input type="text" id="url" name="url" required><br><br>

            <label for="thumbnail">Thumbnail URL:</label><br>
            <input type="text" id="thumbnail" name="thumbnail" required><br><br>

            <input type="submit" value="Upload Article" name="submit">
        </form>

        <h1>Article List</h1>
        <?php
        // Menampilkan artikel dari database
        $sql = "SELECT title, url, thumbnail FROM articles ORDER BY created_at DESC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='article'>";
                echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
                echo "<a href='" . htmlspecialchars($row["url"]) . "' target='_blank'>";
                echo "<img src='" . htmlspecialchars($row["thumbnail"]) . "' alt='Thumbnail'></a>";
                echo "</div>";
            }
        } else {
            echo "No articles found.";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
