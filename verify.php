<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';

echo "Verify page loaded<br>";

$token = $_GET['token'] ?? '';

echo "Token: " . htmlspecialchars($token) . "<br>";

if (!$token) {
    die("No token supplied.");
}


$stmt = $conn->prepare("
    UPDATE users
    SET email_verified = 1,
        verification_token = NULL
    WHERE verification_token = ?
");


$stmt->bind_param("s", $token);

$stmt->execute();


echo "Rows updated: " . $stmt->affected_rows . "<br>";


if ($stmt->affected_rows > 0) {

    echo "Email verified successfully. You can now login.";

} else {

    echo "Invalid or expired verification link.";

}

?>