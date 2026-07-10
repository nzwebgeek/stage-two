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
   echo '
    <div class="comment">
        <h3>' . htmlspecialchars($row['username']) . '</h3>
        <p>' . nl2br(htmlspecialchars($row['comment'])) . '</p>
    </div>';
       
      

    }
} else {
    echo "<p>No comments yet.</p>";
}

//$conn->close();
}
?>