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
    <?php

    foreach($data['data'] as $field){
     
      
       
        echo "<div class='post'>";
        echo "<div class='post-text-body'>";
        echo  $field['userName'];
        echo  $field['email'];
        echo  $field['steamID'];
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
