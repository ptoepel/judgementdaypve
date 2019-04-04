<?php

Class Post{
    private $id;
    private $postText;
    private $body;
    private $addedByID;
    private $userToID;
    private $dateAdded;
    private $userClosed;
    private $deleted;
    private $likes;
    private $image;
    private $dislikes;



    function insert($body,$addedByID,$userToID,$dateAdded,$userClosed,$deleted,$likes,$image,$dislikes){
        $this->body = $body;
        $this->addedByID = $addedByID;
        $this->userToID = $userToID;
        $this->dateAdded = $dateAdded;
        $this->userClosed = $userClosed;
        $this->deleted = $deleted;
        $this->likes = $likes;
        $this->image = $image;
        $this->dislikes = $dislikes;


        Database::query('INSERT INTO posts (body,added_by,user_to,date_added,user_closed,deleted,likes,image,dislikes) VALUES(:body,:added_by,:user_to,:date_added,:user_closed,:deleted,:likes,:image,:dislikes)', array(':body'=> $this->body,':added_by'=>$this->addedByID,':user_to' => $userToID,':date_added'=>$this->dateAdded,':user_closed' => $this->userClosed, ':deleted'=> $this->deleted,':likes'=> $this->likes,':image'=> $this->image, ':dislikes'=> $this->dislikes));
    }


function getProfileByID(){

}


    function allPostsByUser($userID){

      $result =  Database::query('SELECT * FROM posts WHERE added_by=:id ORDER BY date_added DESC', array(':id'=> $userID));
      return $result;
    }


    function getRecentPosts(){

      $result =  Database::query('SELECT * FROM posts ORDER BY date_added DESC');
   
      return $result;
    }




}