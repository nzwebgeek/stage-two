<?php
require 'includes/auth.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Admin</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/app.js" defer></script>
</head>

<body>

<header class="topbar">

    <button class="menu-toggle" id="menuToggle">
        ☰
    </button>

    <div class="logo">
        My CMS
    </div>

    <div class="user">
        Welcome,
        <strong><?= htmlspecialchars($_SESSION['username']); ?></strong>
        <a href="logout.php">Logout</a>
    </div>

</header>

<div class="wrapper">

