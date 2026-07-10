<?php

include 'db.php';


function comments($conn){
  $sql = "SELECT blogg.comment, users.username
        FROM blogg
        INNER JOIN users
        ON blogg.user_id = users.id
        ORDER BY blogg.id DESC";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
   
        echo "<div>" . htmlspecialchars($row['username']) . "</div>";
        echo htmlspecialchars($row['comment']);
      

    }
} else {
    echo "<p>No comments yet.</p>";
}

//$conn->close();
}
?>