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

  <form action="<?php echo URL; ?>/public/survivor/upload_profile" method="POST" enctype="multipart/form-data">

        Select image to upload:

        <label>Username</label>
        <input type="text" name="userName">
        <label>Email</label>
        <input type="text" name="email">
        <label>Country</label>
        <input type="text" name="country">
        <label>Website</label>
        <input type="text" name="website">
        <p>Upload Your Profile Image:</p>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="profile_upload">
    </form>
  </div>
  <div class="grid__item grid__item--md-span-4">

  </div>
</div>
</main>
<?php include('../app/views/inc/admin.footer.php'); ?>
