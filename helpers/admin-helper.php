<?php 
    function blogImages(){
        
    if (isset($_SESSION['user_id']) && in_array($_SESSION['role'] ?? '', ['Super Admin', 'Admin'])){
        
        echo '<div class="comment-content-img"><img src="img/laravel.png" alt="">
                <a class="update-btn" href="admin/update-image.php?id=1">Update</a></div>

        <div  class="comment-content-img"><img src="img/php.jpg" alt=""><button >Update</button></div>

        <div class="comment-content-img"><img src="img/css.jpg" alt=""><button>Update</button></div>
    ';
    }
    else{
        echo '<div class="comment-content-img"><img src="img/laravel.png" alt=""></div>

            <div  class="comment-content-img"><img src="img/php.jpg" alt=""></div>

            <div class="comment-content-img"><img src="img/css.jpg" alt=""></div>
        ';
    }
       
    }

   