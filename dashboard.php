
<?php session_start(); 

include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include 'includes/my-header.php';

?>

<?php
// Upload image
$message = "";
//$imagePath = "";

if (isset($_POST['submit'])) {

    $uploadDir = "uploads/";

    // Create uploads folder if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {

        $allowed = ["jpg", "jpeg", "png", "gif", "webp"];

        $extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        if (!in_array($extension, $allowed)) {

            $message = "Only JPG, JPEG, PNG, GIF and WebP images are allowed.";

        } elseif ($_FILES["image"]["size"] > (5 * 1024 * 1024)) {

            $message = "Image must be under 5MB.";

        } else {

            // Create a unique filename
            $newFileName = uniqid("img_", true) . "." . $extension;

            // Full path on the server
            $filePath = $uploadDir . $newFileName;

            // Move uploaded file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $filePath)) {

                // Save information to the database
                $stmt = $conn->prepare("INSERT INTO images (filename, filepath) VALUES (?, ?)");
                $stmt->bind_param("ss", $newFileName, $filePath);

                if ($stmt->execute()) {
                    $message = "Image uploaded and saved successfully!";
                } else {
                    $message = "Database Error: " . $stmt->error;                }

                $stmt->close();

            } else {

                $message = "Failed to upload image.";

            }
        }

    } else {

        $message = "Please select an image.";

    }
}
?>




<div class="container" id="container">
  <div class="header"><h1>Dashboard</h1></div>
  <div class="menu"><a href="edit-index.php">Edit Home Posts</a><br><a href="change_password.php">Change Password</a><br><a href="logout.php">Logout</a><br>
    <a href="#" onclick="showPanel();">Upload Image</a></div>
  <div class="content"><h3>Dashboard</h3>
<p>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>

<p>You are logged in.</p>
<button id="toggleBtn">Change Color</button>

<!--Form Section-->
<form method="post" enctype="multipart/form-data" style="background-color: navy;" id="panel">
  Select image to upload:
  <input type="file" name="image" accept="image/" required>
  <input type="submit" value="Upload Image" name="submit">
</form>
<a href="logout.php">Logout</a>
<?php if ($message): ?>
    <div class="message">
        <?php echo htmlspecialchars($message); ?>
    </div>
<?php endif; ?>

<?php
$result = $conn->query("SELECT * FROM images ORDER BY id DESC LIMIT 1");

if ($row = $result->fetch_assoc()) {
    echo '<img src="' . htmlspecialchars($row['filepath']) . '">';
}
?>

</div>
  <div class="footer"><h4>Footer</h4></div>
</div>

</div>
