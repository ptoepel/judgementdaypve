<?php

Class Follow{
    private $followID;
    private $followerID;
    private $userID;
    private $sender;
    private $receiver;
    private $followOn;

    function follow($var){
        
        $this->sender = $var['sender'];
        $this->receiver = $var['receiver'];;
        $this->followOn = date("m-d-Y H:i:s");

        Database::query('INSERT INTO follow (sender,receiver,followON) VALUES(:sender,:receiver,:followON)', array(':sender'=> $this->sender,':receiver'=>$this->receiver,':followOn' => $this->followOn));
    }

    function unfollow($var){
        
        $this->userID = $var['userID'];
        $this->followerID = $var['followerID'];;
    

        Database::query('DELETE FROM follow WHERE sender = :userID AND receiver = :followerID', array(':userID' => $this->userID,':followerID' => $this->followerID));
    }

    function getAllFollowingUsersForID($userID){

        $this->userID = $userID;
        $result =  Database::query('SELECT * FROM users JOIN follow ON users.id = follow.receiver WHERE id = :userID ORDER BY date_added ASC', array(':userID'=> $this->userID));
       
        return $result;
    }


}