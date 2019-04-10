<?php

Class Messsage{

    function recentMessages($userID){
        "SELECT * FROM messages LEFT JOIN users ON mesageFrom = id WHERE messageTo = :id"
    }

    function getMessages($messageFrom,$userID){
        "SELECT * FROM messages LEFT JOIN users ON mesageFrom = id WHERE messageFrom = :messageFrom AND messageTo = :id OR messageTO = :messageFrom AND messageFrom = :id:"
    }
}