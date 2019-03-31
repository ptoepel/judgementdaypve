<?php

Class Post{
    private $id;
    private $postText;



    function insert($body,$addedByID,$userToID,$dateAdded,$userClosed,$deleted,$likes,$image,$dislikes){

        Database::query('INSERT INTO posts (body,added_by,user_to,date_added,user_closed,deleted,likes,image,dislikes) VALUES(:body,:added_by,:user_to,:date_dded,:user_closed,:deleted,:likes,:image,:dislikes)', array(':body'=> $this->body,':added_by'=>$this->addedByID,':user_to' => $userToID,':date_added'=>$this->dateAdded,':user_closed' => $this->userClosed, ':deleted'=> $this->deleted,':likes'=> $this->likes,':image'=> $this->image, ':dislikes'=> $this->dislikes));
    }

}