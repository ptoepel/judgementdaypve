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
  </div>
  <div class="grid__item grid__item--md-span-4">

  </div>
</div>
</main>
<?php include('../app/views/inc/admin.footer.php'); ?>
