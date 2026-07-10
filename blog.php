<?php include 'includes/header.php'; ?>
<?php include 'db.php'; ?>
<?php include './helpers/helper.php'; ?>





   <h1>Comments Section</h1>

<p><strong>Start a comment here: start</strong> feel free to leave a comment here, but make sure to register first:</p>

<div class="comment-content-box">
  <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique, possimus.</div>
  <div>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>
  <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto consequuntur quae magni?</div>  
  <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, hic voluptatum quas consequuntur ratione quis.</div>
  <div><button id="toggleBtn">Change Color</button></div>
  <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, architecto sit? Accusantium delectus nam omnis ut veritatis optio dolor dicta laboriosam minus rerum molestiae nulla, repellendus odit, nobis reiciendis placeat.</div>

</div>
   
<div class="wrapper">
  <?php comments($conn) ?>
  
</div>
    

</div>






<?php include 'includes/footer.php'; ?>