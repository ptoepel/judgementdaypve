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

        
      </div>
      
        <?php 

   
    
          echo "<h2>".$data['userProfile'][0]['userName']."</h2>";

          
        ?>
      <div class="image-box" style="background-image:url(<?php echo URL.$data['userProfile'][0]['profileImage'] ?>)"></div>

      <a href="<?php echo URL; ?>/public/survivor/profile">Profile</a>
    </div>

  </div>
  <div class="grid__item grid__item--md-span-4">
  <form class="home-post" action="<?php echo URL; ?>/public/survivor/post" method="POST">

    <textarea class="post-body" name="postBody" ></textarea>
    <ul>
      <!-- GOT TO GET THIS WORKING -->
      <li><a href="/image/upload"><i class="fas fa-images"></i>Pics</a></li>
      <li><a href="/image/upload"><i class="fab fa-youtube"></i>Youtube</a></li>
      <li><a href="/image/upload"><i class="fas fa-link"></i>Link</a></li>
      <li><a href="/image/upload"><i class="fas fa-share-alt"></i>Tag</a></li>
    </ul>
    <button class="post-button" type="submit" name="postHomePage"><i class="fas fa-paper-plane"></i> POST</button>

  </form>
  </div>
  <div class="grid__item grid__item--md-span-4">
    <div class="trending-posts">
    <h3>Trending Posts</h3>
    </div>
  </div>
</div>

<div class="grid">
  <div class="grid__item grid__item--md-span-4">
 
  </div>
  <div class="grid__item grid__item--md-span-4">
    <article class="post-container">
    <?php
    /*
   echo"<pre>";
   print_r($data);
   echo"</pre>";
   */
    foreach($data['data'] as $post){
     
      
        echo "<div class='post-comment-container postID".$post['id']."'>";
        echo "<div class='post'>";
        echo '<img src='. URL . $post[10][0]['profileImage'].' />';
        echo '<p><span>'. $post[11][0]['userName'].'</span></p>';
        echo "<div class='post-text-body'>";
        echo  $post['body'];

        echo "</div>";
        echo "<div class='date-added'>";
        echo  date("m-d-Y g:i:s",strtotime($post['date_added']));
        echo "</div>";
        echo "<a class='reply' href='". URL ."/public/survivor/comment/".$post['id']."'>Reply</a>";
        echo "</div>";
        if(array_key_exists("comments",$post)){



          foreach($post['comments'] as $comment){


            echo"<div class='comment'>";
            echo "<img src=". URL . $comment[7][0]['profileImage']." />";
            echo $comment[8][0]['userName'];
            echo"<div class='comment-box'>";    
            echo $comment['post_body'];

            echo "<div class='date-added'>";
            echo  date("n-j-Y g:i:s",strtotime($comment['date_added']));
            echo "</div>";
              
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
          echo "</div>";
        }else{
        echo "<div class='reply-box'>";
        echo "<div class='reply-container'>";
        echo "<form class='reply-post' action='".URL."/public/survivor/comment' method='POST'>";
        echo "<textarea class='reply-body' name='replyBody'></textarea>";
        echo "<input name='postID' type='hidden' value='". $post['id'] ."'  />";
      
        echo "<button class='reply-button' type='submit' name='postHomePageReply'><i class='fas fa-paper-plane'></i> POST</button>";
        echo "</form>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
        }
    }


    ?>
    </article>
  </div>
  <div class="grid__item grid__item--md-span-4">
    <h2>Who To Follow:</h2>
  </div>
</div>
</main>
<?php include('../app/views/inc/admin.footer.php'); ?>
