<?php

Class Mention{

    private $mentionID;
    private $mention;

    public function getMention($mention){

        $mention = "%$mention%";
        $result =   Database::query('SELECT id,userName FROM mention WHERE mention LIKE :mention', array(':mention'=> $mention));
        return $result;

    }


}