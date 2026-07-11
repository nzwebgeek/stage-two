<?php

include "db.php";
include "default_theme.php";

session_start();

$user_id = $_SESSION['user_id'];


$stmt = $conn->prepare(
    "SELECT theme FROM user_settings WHERE user_id=?"
);

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    $theme = json_decode(
        $row['theme'],
        true
    );

} else {

    $theme = $default_theme;

}