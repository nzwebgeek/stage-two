<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['title']);
    $slug = trim($_POST['slug']);
    $hero_title = trim($_POST['hero_title']);
    $hero_subtitle = trim($_POST['hero_subtitle']);
    $main_heading = trim($_POST['main_heading']);
    $main_content = trim($_POST['main_content']);
    $status = $_POST['status'];


    // Check duplicate slug
    $check = $conn->prepare(
        "SELECT id FROM pages WHERE slug = ?"
    );

    $check->bind_param("s", $slug);
    $check->execute();

    $result = $check->get_result();


    if ($result->num_rows > 0) {

        echo "<p style='color:red;'>That slug already exists.</p>";

    } else {


        $stmt = $conn->prepare("
            INSERT INTO pages 
            (
                title,
                slug,
                hero_title,
                hero_subtitle,
                main_heading,
                main_content,
                status
            )
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");


        $stmt->bind_param(
            "sssssss",
            $title,
            $slug,
            $hero_title,
            $hero_subtitle,
            $main_heading,
            $main_content,
            $status
        );


        if ($stmt->execute()) {

            header("Location: index.php?page=pages");
            exit;

        } else {

            echo "Error: " . $stmt->error;

        }
    }
}

?>


<h1>Create New Page</h1>

<form method="POST">

<label>Page Title</label>
<input type="text" name="title" required>


<label>Slug</label>
<input type="text" name="slug" placeholder="about-us" required>


<label>Hero Title</label>
<input type="text" name="hero_title">


<label>Hero Subtitle</label>
<textarea name="hero_subtitle"></textarea>


<label>Main Heading</label>
<input type="text" name="main_heading">


<label>Main Content</label>
<textarea name="main_content" rows="10"></textarea>


<label>Status</label>
<select name="status">
    <option value="published">Published</option>
    <option value="draft">Draft</option>
</select>


<button class="button" type="submit">
Create Page
</button>

</form>