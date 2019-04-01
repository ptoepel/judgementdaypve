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
    <div class="profile-section">
      <div class="image-container">
        <div class="image-box" style="background-img:url(<?php ?>)"></div>
      </div>
      <ul>
        <li>Name:<span>Patrick Toepel</span></li>
        <li>Username:<span>Northern Cobra</span></li>
        <li>Class:<span>Admin</span></li>
        <li>Email:<span>patrick.toepel@gmail.com</span></li>
        <li>Member Since:<span>I made this site</span></li>
      </ul>
      <a href="profile-link">Profile</a>
    </div>

  </div>
  <div class="grid__item grid__item--md-span-4">
  <form class="home-post" action="<?php echo URL; ?>/public/survivor/post" method="POST">
    <textarea class="post-body" name="postBody" ></textarea>
  
    <button type="submit" name="postHomePage"><i class="fas fa-paper-plane"></i> POST</button>
    </form>
  </div>
  <div class="grid__item grid__item--md-span-4">
    Trending Posts
  </div>
</div>

<div class="grid">
  <div class="grid__item grid__item--md-span-4">
 
  </div>
  <div class="grid__item grid__item--md-span-4">
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
