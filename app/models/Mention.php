<?php

Class Mention{

    private $mentionID;
    private $mention;

    public function getMention($mention){
        $result =  Database::query('SELECT id, usernName FROM users WHERE userName LIKE :mention LIMIT 5', array(':mention'=> $this->mention));



    }


}