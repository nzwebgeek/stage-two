<?php
require 'includes/auth.php';
require __DIR__ . '/includes/db.php';


$id = $_POST['id'];

$heading = $_POST['main_heading'];
$content = $_POST['main_content'];

$hero_title = $_POST['hero_title'];
$hero_subtitle = $_POST['hero_subtitle'];


$stmt = $conn->prepare("
UPDATE pages SET
main_heading=?,
main_content=?,
hero_title=?,
hero_subtitle=?
WHERE id=?
");


$stmt->bind_param(
"ssssi",
$heading,
$content,
$hero_title,
$hero_subtitle,
$id
);


$stmt->execute();


header("Location: pages.php");

exit;