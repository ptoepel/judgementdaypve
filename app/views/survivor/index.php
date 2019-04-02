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
      <a href="<?php echo URL; ?>/public/survivor/profile">Profile</a>
    </div>

  </div>
  <div class="grid__item grid__item--md-span-4">
  <form class="home-post" action="<?php echo URL; ?>/public/survivor/post" method="POST">
    <textarea class="post-body" name="postBody" ></textarea>
  
    <button class="post-button" type="submit" name="postHomePage"><i class="fas fa-paper-plane"></i> POST</button>
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
        echo "<a class='reply' href='". URL ."/public/survivor/comment/".$post['id']."'>Reply</a>";
        echo "</div>";
        if(isset($post['id'])){

          $result = $this->comment->getAllCommentsForPostID($post['id']);


          foreach($result as $comment){
            echo"<div class='comment'>";
            echo"<div class='comment-box'>";    
              echo $comment['post_body'];
              echo $comment['posted_by'];
              echo $comment['posted_to'];
              echo $comment['date_added'];
              echo $comment['removed'];
              
            echo"</div>";
            echo"</div>";
          }
          echo "<div class='reply-box'>";
          echo "<div class='reply-container'>";
          echo "<form class='reply-post' action='".URL. "/public/survivor/comment' method='POST'>";
          echo "<textarea class='reply-body' name='replyBody' ></textarea>";
          echo "<input name='postID' type='hidden' value='". $post['id'] ."'  />";
          echo "<button class='reply-button' type='submit' name='postHomePageReply'><i class='fas fa-paper-plane'></i> POST</button>";
          echo "</form>";
  
          echo "</div>";
          echo "</div>";
        }else{
        echo "<div class='reply-box'>";
        echo "<div class='reply-container'>";
        echo "<form class='reply-post' action='".URL. "/public/survivor/comment' method='POST'>";
        echo "<textarea class='reply-body' name='replyBody' ></textarea>";
        echo "<input name='postID' type='hidden' value='". $post['id'] ."'  />";
      
        echo "<button class='reply-button' type='submit' name='postHomePageReply'><i class='fas fa-paper-plane'></i> POST</button>";
        echo "</form>";

        echo "</div>";
        echo "</div>";
        }
    }


    ?>
  </div>
  <div class="grid__item grid__item--md-span-4">

  </div>
</div>
</main>
<?php include('../app/views/inc/admin.footer.php'); ?>
