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
  <h2>Profile</h2>
  <?php
    
   
    foreach($data['data'] as $user){
     
      
       
        echo "<div class='profile'>";
        echo "<div class='profile-text-body'>";
        echo  $user['userName'];
        echo  $user['email'];
        echo  $user['steamID'];
        echo  $user['profileImage'];
        echo  $user['profileCover'];
        echo  $user['following'];
        echo  $user['followers'];
        echo  $user['bio'];
        echo  $user['country'];
        echo  $user['website'];
        echo  $user['userType'];
        echo  $user['country'];
        echo "</div>";
        echo "</div>";
  
    }


    ?>
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
</main>
<?php include('../app/views/inc/admin.footer.php'); ?>
