<?php

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role_id = (int)$_POST['role_id'];

    if ($username == "" || $email == "" || $password == "") {
        $error = "Please fill in all required fields.";
    } else {

        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("
            INSERT INTO users (username, email, password, role_id)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->bind_param("sssi", $username, $email, $passwordHash, $role_id);

        if ($stmt->execute()) {
            header("Location: index.php?page=users");
            exit; 
        } else {
            $error = "Error creating user.";
        }
    }
}

// Get roles
$roles = $conn->query("SELECT id, name FROM roles ORDER BY name");
?>

<h1>Add User</h1>

<?php if ($error): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post">

    <p>
        <label>Username</label><br>
        <input type="text" name="username" required>
    </p>

    <p>
        <label>Email</label><br>
        <input type="email" name="email" required>
    </p>

    <p>
        <label>Password</label><br>
        <input type="password" name="password" required>
    </p>

    <p>
        <label>Role</label><br>
        <select name="role_id">
            <?php while ($role = $roles->fetch_assoc()): ?>
                <option value="<?= $role['id'] ?>">
                    <?= htmlspecialchars($role['name']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </p>

    <button type="submit">Create User</button>

</form>

<p><a href="index.php?page=users">Back to Users</a></p>