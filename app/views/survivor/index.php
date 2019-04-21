<?php include('../app/views/inc/admin.header.php'); ?>
<main id="survivor-home">

	
<div class="grid">
  <div class="grid__item grid__item--md-span-4">

  </div>
  <div class="grid__item grid__item--md-span-4">
Search Users
<form class="user-search" action="<?php echo URL; ?>/public/survivor/search" method="GET">

<input type="text" class="search" name="userSearch" />
<div class="search-result">
<?php

if(isset($data['search']) && !empty($data['search'])){
  echo"<ul>";
  foreach($data['search'] as $userStuff){
  echo"<li><a href='".URL ."/public/survivor/user/". $userStuff['id'] ."' a>". $userStuff['userName']."</a></li>";
  }
  echo "</ul>";
}
?>
</div>


</form>

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
    <div class="hash-box">
      <ul>
      <?php if(isset($data['hashtag']) && !empty($data['hashtag'])){ 

            echo "<li><span class='getValue'>". $data['hashtag']. "</li>";
          
     }?>
       <?php
       if(isset($data['mentions']) && !empty($data['mentions'])){ 
       echo"<li data-user='". $userStuff['id']."' data-post=''><a href='".URL ."/public/survivor/user/". $userStuff['id'] ."' a>". $userStuff['userName']."</a></li>";
       }
?>
      </ul>
    </div>
    <ul>
      <!-- GOT TO GET THIS WORKING -->
      <li><a class="photo-upload" href="/image/upload"><i class="fas fa-images"></i>Pics</a></li>
      <li><a class="youtube-upload" href="/image/upload"><i class="fab fa-youtube"></i>Youtube</a></li>
      <li><a class="link-upload"  href="/image/upload"><i class="fas fa-link"></i>Link</a></li>
      <li><a class="share-upload" href="/image/upload"><i class="fas fa-share-alt"></i>Tag</a></li>
    </ul>
    <button class="post-button" type="submit" name="postHomePage"><i class="fas fa-paper-plane"></i> POST</button>

  </form>
  </div>
  <div class="grid__item grid__item--md-span-4">
    <div class="trending-posts">
    <h3>Trending Posts</h3>
      <div>
        <ul>
          <?php
            /*echo "<pre>";
            print_r($data);
            echo "</pre>";*/
          ?>

        <?php if(isset($data['hashtagData']) && !empty($data['hashtagData'])){ 
                foreach($data['hashtagData'] as $hashtagData){
                  echo "<li><span class='simpleValue'>".$hashtagData['hashtag']."</span></li>";
                }
              }
        ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="grid">
  <div class="grid__item grid__item--md-span-4">
  <div class="new-bit-post">
    <h2>Upcoming Events</h2>
    <ul>
      <li>
      <div class="event-image-container">
      <img src="" attribute="thumbnail" />
      </div>
      <h4>Event Name</h4>
      <p>Start Date :<span></span></p>
      <p>End Date :<span></span></p>
    </li>
    </ul>
  </div>
  </div>
  <div class="grid__item grid__item--md-span-4">
    <article class="post-container">
    <?php

    foreach($data['data'] as $post){
     
      
        echo "<div class='post-comment-container postID-".$post['id']."'>";
        echo "<div class='post'>";
        echo '<img src='. URL . $post[10][0]['profileImage'].' />';
        echo '<p><span>'. $post[11][0]['userName'].'</span></p>';
        echo "<div class='post-text-body'>";
        echo  "<span>" . $post['body']. "</span>";

        echo "</div>";
        echo "<div class='date-added'>";
        echo  date("m-d-Y g:i:s",strtotime($post['date_added']));
        echo "</div>";
        echo "<div class='delete-post-container'>";
        echo  "<a href='#' class='delete-post'>X</a>";
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

            echo "<div class='delete-comment-container'>";
            if($comment->$commentBy == $userID ){
            echo  "<div class='delete-comment'>X</div>";
            }
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
  <div class="who-to-follow">
    <h3>Who To Follow:</h3>
  </div>
  </div>
</div>
</main>
<div class="grid">
  <div class="grid__item grid__item--md-span-12">
    <div class="pop-container">
      <div class="close-pop-up-container">
        <!--<div class="btn-line"></div>
        <div class="btn-line"></div> -->
        X
      </div>
      <div class="upload-photo hidden">
        <h3>Upload Photo</h3>
        <form class="photo-post" action="<?php echo URL; ?>/public/survivor/image_upload" method="POST">
          <input type="upload" name="post_photo_upload" />
          <button class="post-button" type="submit" name="postHomePage"><i class="fas fa-paper-plane"></i> POST</button>
        </form>
      </div>
      <div class="upload-youtube hidden">
        <h3>Youtube Video</h3>
        <form class="youtube-post" action="<?php echo URL; ?>/public/survivor/youtube_upload" method="POST">
          <input type="text" name="youtube_upload" />
          <button class="post-button" type="submit" name="postYouTube"><i class="fas fa-paper-plane"></i> POST</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include('../app/views/inc/admin.footer.php'); ?>
