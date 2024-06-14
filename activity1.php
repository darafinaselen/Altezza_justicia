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

// Function to generate new ID
function generateNewID($conn) {
    $sql = "SELECT id FROM articleDB ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastID = $row['id'];
        $lastNum = (int)str_replace('artcl', '', $lastID);
        $newNum = $lastNum + 1;
        $newID = 'artcl' . str_pad($newNum, 4, '0', STR_PAD_LEFT);
    } else {
        $newID = 'artcl0001';
    }
    return $newID;
}


// Create
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $id = generateNewID($conn);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $photo = 'default_value'; // Ganti 'default_value' dengan nilai default atau nilai foto yang sesuai

    $sql = "INSERT INTO articleDB (id, title, content, photo) VALUES ('$id', '$title', '$content', '$photo')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New article created successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM articleDB WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Article deleted successfully');</script>";
    } else {
        echo "Error deleting article: " . $conn->error;
    }
}

// Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE articleDB SET title='$title', content='$content' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Article updated successfully');</script>";
    } else {
        echo "Error updating article: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altezza Justicia</title>
    <link rel="stylesheet" href="activity.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <style>
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 60px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    </style>
</head>

<body>
<nav>
    <div class="wrapper">
        <div class="logo"><a href=""><img src="Assets/logo altezza 2.png"></a></div>
        <div class="menu">
            <ul>
                <li><a href="LogAdmin.php">Home</a> <b> > </b> </li>
                <li><a href="activity.php">Activity</a></li>
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
                <h1>Manage Articles</h1>
                <table id="articles" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Thumbnail</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Read data
                        $sql = "SELECT id, title, content FROM articleDB";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td><a href='" . $row['content'] . "' style='color: blue;'>" . $row['content'] . "</a></td>";
                                echo "<td>Thumbnail</td>";
                                echo "<td>
                                        <a href='#' class='editBtn' data-id='" . $row['id'] . "' data-title='" . $row['title'] . "' data-content='" . $row['content'] . "'>Edit</a> | 
                                        <a href='?delete=" . $row['id'] . "'>Delete</a>
                                      </td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <button id="createBtn">Add New Article</button>
            </div>
        </div>
    </section>
</div>

<!-- Create Modal -->
<div id="createModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Add New Article</h2>
    <form method="post" action="" enctype="multipart/form-data"> <!-- tambahkan enctype="multipart/form-data" -->
        Title: <input type="text" name="title" required><br>
        Content Link: <input type="text" name="content" required><br> <!-- Ganti menjadi input type text untuk link -->
        Thumbnail: <input type="file" name="thumbnail" accept="image/*" required><br> <!-- Tambahkan input file untuk thumbnail -->
        <input type="submit" name="create" value="Create">
    </form>
  </div>
</div>


<!-- Edit Modal -->
<div id="editModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Edit Article</h2>
    <form method="post" action="">
        <input type="hidden" name="id" id="editId">
        Title: <input type="text" name="title" id="editTitle" required><br>
        Content: <input type="text" name="content" id="editContent" required><br> <!-- Change to input type text -->
        <input type="submit" name="update" value="Update">
    </form>
  </div>
</div>

<script>
$(document).ready(function() {
    $('#articles').DataTable();

    // Get the modal
    var createModal = document.getElementById("createModal");
    var editModal = document.getElementById("editModal");

    // Get the button that opens the modal
    var createBtn = document.getElementById("createBtn");

    // Get the <span> element that closes the modal
    var closeBtns = document.getElementsByClassName("close");

    // When the user clicks the button, open the modal 
    createBtn.onclick = function() {
        createModal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    for (var i = 0; i < closeBtns.length; i++) {
        closeBtns[i].onclick = function() {
            createModal.style.display = "none";
            editModal.style.display = "none";
        }
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == createModal) {
            createModal.style.display = "none";
        }
        if (event.target == editModal) {
            editModal.style.display = "none";
        }
    }

    // Edit button click event
    $('.editBtn').click(function() {
        var id = $(this).data('id');
        var title = $(this).data('title');
        var content = $(this).data('content');

        $('#editId').val(id);
        $('#editTitle').val(title);
        $('#editContent').val(content);

        editModal.style.display = "block";
    });
});
</script>
</body>
</html>

<?php $conn->close(); ?>