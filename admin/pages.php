<?php
require 'includes/auth.php';
require __DIR__ . '/includes/db.php';


;


$result = $conn->query("SELECT * FROM pages ORDER BY slug");

?>

<main class="content">

<h1>Edit Website Pages</h1>

<?php while($page = $result->fetch_assoc()): ?>

<div class="card">

<form action="save_page.php" method="POST">

<input 
    type="hidden" 
    name="id" 
    value="<?= $page['id'] ?>"
>


<h3>
<?= htmlspecialchars($page['slug']) ?>
</h3>


<label>Heading</label>
<input 
    type="text" 
    name="main_heading"
    value="<?= htmlspecialchars($page['main_heading']) ?>"
>


<label>Content</label>
<textarea 
    name="main_content"
    rows="8"
><?= htmlspecialchars($page['main_content']) ?></textarea>


<label>Hero Title</label>
<input 
    type="text" 
    name="hero_title"
    value="<?= htmlspecialchars($page['hero_title']) ?>"
>


<label>Hero Subtitle</label>
<input 
    type="text" 
    name="hero_subtitle"
    value="<?= htmlspecialchars($page['hero_subtitle']) ?>"
>


<button type="submit">
Save Changes
</button>


</form>

</div>


<?php endwhile; ?>


</main>


