<?php

Class Message{

    private $userID;
    private $messageFrom;

    public function recentMessages($userID){

        $this->userID = $userID ;
        $result =   Database::query('SELECT * FROM messages LEFT JOIN users ON mesageFrom = id WHERE messageTo = :id', array(':userName'=> $username));
        return $result;

    }

    public function getMessages($messageFrom,$userID){

        $this->userID = $userID ;
        $this->messageFrom = $messageFrom;
        $result =   Database::query('SELECT * FROM messages LEFT JOIN users ON mesageFrom = id WHERE messageFrom = :messageFrom AND messageTo = :id OR messageTO = :messageFrom AND messageFrom = :id', array(':userName'=> $username));
        return $result;
       
    }

    public function sendMessage(){
        
    }
}