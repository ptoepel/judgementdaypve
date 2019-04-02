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
  <h4>Other Survivors</h4>
    <?php
    
   
    foreach($data['data'] as $user){
     
      
       
        echo "<div class='user'>";
        echo "<div class='user-text-body'>";
        echo  "<a href=". URL . "/public/survivor/user/". $user['id'] .">".$user['userName']."</a>";
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
