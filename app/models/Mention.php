<?php

Class Mention{

    private $mentionID;
    private $mention;

    public function getMentions($mention){

        $mention = "%$mention%";
        $result =   Database::query('SELECT id,userName,profileImage FROM users WHERE userName LIKE :mention', array(':mention'=> $mention));
        return $result;

    }


}