<?php include 'includes/header.php'; ?>
<?php include 'db.php'; ?>
<?php include './helpers/helper.php'; ?>
<?php include './helpers/admin-helper.php';?>

<main>

<h1>Comments Section</h1>

<p>
    <strong>Start a comment here:</strong>
    Feel free to leave a comment, but make sure to register first.
</p>

<div class="comment-content-box">
  
    <?php blogImages();  ?>
  

</div>

<div class="wrapper">
    <?php blogPosts($conn); ?>
</div>


</main>

<?php include 'includes/footer.php'; ?>