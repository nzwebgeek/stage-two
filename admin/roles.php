<?php

$sql = "
SELECT
    r.id,
    r.name,
    r.description,
    COUNT(u.id) AS users
FROM roles r
LEFT JOIN users u
ON u.role_id = r.id
GROUP BY r.id
ORDER BY r.name
";

$result = $conn->query($sql);
?>

<h1>Roles</h1>



<table>

<tr>
    <th>Role</th>
    <th>Description</th>
    <th>Users</th>
</tr>

<?php while($role = $result->fetch_assoc()): ?>

<tr>
    <td><?= htmlspecialchars($role['name']) ?></td>
    <td><?= htmlspecialchars($role['description']) ?></td>
    <td><?= $role['users'] ?></td>
   
</tr>

<?php endwhile; ?>

</table>