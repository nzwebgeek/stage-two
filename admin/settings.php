<?php
require 'includes/auth.php';
?>

<h2>Settings</h2>

<form method="post">

    <h3>General</h3>

    <label>Site Name</label><br>
    <input type="text" name="site_name" placeholder="stage-one.test blog/cms"><br><br>

    <label>Site Description</label><br>
    <textarea name="site_description"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil asperiores necessitatibus sed illo ipsam nulla totam dolores laboriosam, optio expedita beatae omnis aut, eum, fuga corporis sint natus alias eius?</textarea><br><br>

    <label>Admin Email</label><br>
    <input type="email" name="admin_email" placeholder="Email here"><br><br>

    <h3>Appearance</h3>

    <label>Theme</label>
    <select name="theme">
        <option>Light</option>
        <option>Dark</option>
    </select><br><br>

    <label>
        <input type="checkbox" name="maintenance">
        Maintenance Mode
    </label><br><br>

    <button class="button" type="submit">Save Settings</button>

</form>