
<?php include 'includes/header.php'; ?>

<form action="change_password.php" method="post">
    <label>Current Password</label>
    <input type="password" name="current_password" required>

    <label>New Password</label>
    <input type="password" name="new_password" required>

    <label>Confirm New Password</label>
    <input type="password" name="confirm_password" required>

    <button type="submit">Change Password</button>
</form>
<?php include 'includes/footer.php'; ?>
<?php
session_start();
require 'db.php'; // Contains your $conn MySQLi connection

$userId = $_SESSION['user_id'];

$currentPassword = $_POST['current_password'];
$newPassword = $_POST['new_password'];
$confirmPassword = $_POST['confirm_password'];

// Check new passwords match
if ($newPassword !== $confirmPassword) {
    die("New passwords do not match.");
}

// Optional password policy
if (strlen($newPassword) < 8) {
    die("Password must be at least 8 characters.");
}

// Get current password hash
$stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found.");
}

// Verify current password
if (!password_verify($currentPassword, $user['password'])) {
    die("Current password is incorrect.");
}

// Hash the new password
$newHash = password_hash($newPassword, PASSWORD_DEFAULT);

// Update the password
$update = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
$update->bind_param("si", $newHash, $userId);

if ($update->execute()) {
    session_regenerate_id(true);
    echo "Password changed successfully.";
} else {
    echo "Error changing password.";
}

$stmt->close();
$update->close();
$conn->close();
?>