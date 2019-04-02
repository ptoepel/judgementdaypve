<?php

Class Comment{
    private $id;
    private $postBody;
    private $postedBy;
    private $postedTo;
    private $dateAdded;
    private $removed;
    private $postID;



    function insert($var){
        $this->postBody = $var['replyBody'];
        $this->postedBy = 23;
        $this->postedTo = 0;
        $this->dateAdded = "DATE";
        $this->removed = "NO";
        $this->postID = $var['postID'];


        Database::query('INSERT INTO comments (post_body,posted_by,posted_to,date_added,removed,post_id) VALUES(:post_body,:posted_by,:posted_to,:date_added,:removed,:post_id)', array(':post_body'=> $this->postBody,':posted_by'=>$this->postedBy,':posted_to' => $this->postedTo,':date_added'=>$this->dateAdded,':removed' => $this->removed, ':post_id'=> $this->postID));
    }

    function getAllCommentsForPostID($postID){
        $this->postID = $postID;
        $result =  Database::query('SELECT * FROM comments WHERE post_id=:post_id ORDER BY date_added ASC', array(':post_id'=> $this->postID));
        return $result;
    }



}