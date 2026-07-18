<?php 
    function blogImages($conn){

    $result = $conn->query("
        SELECT * FROM blog_settings LIMIT 1
    ");

    $images = $result->fetch_assoc();


    echo '
    <div class="comment-content-img">
        <img src="img/'.$images['image_one'].'" alt="Blog image">
    </div>

    <div class="comment-content-img">
        <img src="img/'.$images['image_two'].'" alt="Blog image">
    </div>
    ';

}

