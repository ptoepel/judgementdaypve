<?php include('../app/views/inc/admin.header.php'); ?>
<main id="survivor-profile">

	
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
    
   
    foreach($data['data'] as $user){
     $profileImage = $user['profileImage'];
     $profileCover = $user['profileCover'];
      
       
        echo "<div class='profile'>";
          echo "<div class='profile-text-body'>";
           echo "<div class='header-container'>";
            echo "<div class='header-background-img'><img src='". URL . $profileCover ."' /></div>";
           echo "<div class='profile-image-container'>";
            echo "<div class='profile-image'><img src='". URL . $profileImage ."' /></div>";
           echo "</div>";
          echo "</div>";
        echo "<div class='profile-fields'>";
        echo "<form action='". URL. "/public/survivor/upload_profile' method='POST' enctype='multipart/form-data'>";
        echo "<ul>";
        echo  "<li><label>user name :</label><input value='".$user['userName']."' name='userName' type='text' ></li>";
        echo  "<li><label>email :</label><input value='".$user['email']."' name='email' type='text' ></li>";
        echo  "<li><label>steam id :</label><input value='".$user['steamID']."' name='steamID' type='text' ></li>";

        echo  "<li><label>following :</label><input value='".$user['following']."' name='following' type='text' ></li>";
        echo  "<li><label>followers :</label><input value='".$user['followers']."' name='followers' type='text' ></li>";
        echo  "<li><label>bio :</label><input value='".$user['bio']."' name='bio' type='text' ></li>";
        echo  "<li><label>country :</label><input value='".$user['country']."' name='country' type='text' ></li>";
        echo  "<li><label>website :</label><input value='".$user['website']."' name='website' type='text' ></li>";
        echo  "<li><label>user type :</label><input value='".$user['userType']."' name='userType' type='text' ></li>";
        echo "<li><p>Upload Your Profile Image:</p></li>";
        echo "<li><input type='file' name='fileToUpload' id='fileToUpload'></li>";
        echo "<li><input type='submit' value='Upload Image' name='profile_upload'></li>";
        
        echo "</ul>";
        echo "</form>";
        echo "</div>";
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
