<?php
require 'db.php';

$token = $_GET['token'] ?? '';

$stmt = $conn->prepare("
SELECT id
FROM users
WHERE reset_token=?
AND reset_expires > NOW()
");

$stmt->bind_param("s",$token);
$stmt->execute();

$result = $stmt->get_result();

if(!$user = $result->fetch_assoc()){
    die("Invalid or expired reset link.");
}

if($_SERVER['REQUEST_METHOD']=="POST"){

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("
        UPDATE users
        SET password=?,
            reset_token=NULL,
            reset_expires=NULL
        WHERE id=?
    ");

    $stmt->bind_param(
        "si",
        $password,
        $user['id']
    );

    $stmt->execute();

    echo "Password changed successfully.";
    exit;
}
?>

<form method="post">

    <label>New Password</label>

    <input
        type="password"
        name="password"
        required
    >

    <button>Reset Password</button>

</form>