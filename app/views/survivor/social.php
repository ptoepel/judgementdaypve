<?php include('../app/views/inc/admin.header.php'); ?>
<main id="survivor-home">

	
<div class="grid">
  <div class="grid__item grid__item--md-span-4">

  </div>
  <div class="grid__item grid__item--md-span-4">

  </div>
  <div class="grid__item grid__item--md-span-4">

  </div>

</div>

<div class="grid">
  <div class="grid__item grid__item--md-span-4">
   
  </div>
  <div class="grid__item grid__item--md-span-4">
 
  </div>
  <div class="grid__item grid__item--md-span-4">
  
  </div>
</div>

<div class="grid">
  <div class="grid__item grid__item--md-span-4">
 
  </div>
  <div class="grid__item grid__item--md-span-4">
  <h4>Social</h4>
    <?php
    
   
    foreach($data['data'] as $post){
     
      
       
        echo "<div class='post'>";
        echo "<div class='post-text-body'>";
        echo  $post['body'];
        echo  $post['added_by'];
        echo  $post['user_to'];
        echo  $post['date_added'];
        echo  $post['user_closed'];
        echo  $post['deleted'];
        echo  $post['likes'];
        echo  $post['image'];
        echo  $post['dislikes'];
        echo "</div>";
        echo "</div>";
      
      
    }


    ?>
  </div>
  <div class="grid__item grid__item--md-span-4">

  </div>
</div>
</main>
<?php include('../app/views/inc/admin.footer.php'); ?>
