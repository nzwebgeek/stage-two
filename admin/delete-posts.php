<?php

require 'includes/auth.php';
require 'includes/db.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $conn->prepare("
DELETE FROM posts
WHERE id=?
");

$stmt->bind_param("i",$id);
$stmt->execute();

header("Location: index.php?page=posts");
exit;

