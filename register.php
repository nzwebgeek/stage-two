<?php
//session_start();
include 'includes/header.php';
require 'db.php';

$message = "";
//$role_id = 5; // User

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if ($password != $confirm_password) {
        $message = "Passwords do not match.";
    } else {

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Look up by Name
        $roleStmt = $conn->prepare("SELECT id FROM roles WHERE name = ?");
        $role = "User";
        $roleStmt->bind_param("s", $role);
        $roleStmt->execute();
        $result = $roleStmt->get_result();
        $roleRow = $result->fetch_assoc();

        $role_id = $roleRow['id'];

        // check if name exists first
            $check = $conn->prepare("
    SELECT id
    FROM users
    WHERE username = ? OR email = ?
");

$check->bind_param("ss", $username, $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    $message = "That username or email is already registered.";
} else {

    $stmt = $conn->prepare("
        INSERT INTO users (username, email, password, role_id)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->bind_param("sssi", $username, $email, $hashedPassword, $role_id);

    if ($stmt->execute()) {
        $message = "Registration successful!";
    }

    $stmt->close();
}

$check->close();
      

     
       

    }
}
?>

<main>
<section>

<h1>Register</h1>

<?php if (!empty($message)): ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>

<form method="post">

<label for="username">Username</label>
<input type="text" id="username" name="username" required>

<label for="email">Email</label>
<input type="email" id="email" name="email" required>

<label for="password">Password</label>
<input type="password" id="password" name="password" required>

<label for="confirm_password">Confirm Password</label>
<input type="password" id="confirm_password" name="confirm_password" required>

<input type="submit" value="Register">

</form>
        <button id="toggleBtn">Change Color</button>

</section>

</main>

<?php include 'includes/footer.php'; ?>