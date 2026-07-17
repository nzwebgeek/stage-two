<?php

include 'includes/header.php';
include 'db.php';
include 'helpers/helper.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid post ID.");
}

$postId = (int) $_GET['id'];

$sql = "SELECT posts.*, users.username
        FROM posts
        JOIN users
        ON posts.user_id = users.id
        WHERE posts.id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i",$postId);

$stmt->execute();

$result = $stmt->get_result();

$post = $result->fetch_assoc();

?>

<div class="posts-container">

<div class="posts-card">
    <h1><?= htmlspecialchars($post['title']) ?></h1>

<p>

By <?= htmlspecialchars($post['username']) ?>

</p>

<p>

<?= nl2br(htmlspecialchars($post['content'])) ?>

</p>

<hr>

<h2>Comments</h2>

<?php comments($conn,$postId); ?>
</div>

</div>

<?php include 'includes/footer.php'; ?>