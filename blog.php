<?php include 'includes/header.php'; ?>
<?php include 'db.php'; ?>
<?php include './helpers/helper.php'; ?>

<main>

<h1>Comments Section</h1>

<p>
    <strong>Start a comment here:</strong>
    Feel free to leave a comment, but make sure to register first.
</p>

<div class="comment-content-box">

    <div class="comment-content-img"><img src="img/laravel.png" alt=""></div>

    <div  class="comment-content-img"><img src="img/php.jpg" alt=""></div>

    <div class="comment-content-img"><img src="img/css.jpg" alt=""></div>

</div>

<div class="wrapper">
    <?php blogPosts($conn); ?>
</div>


</main>

<?php include 'includes/footer.php'; ?>