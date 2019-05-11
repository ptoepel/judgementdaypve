<?php

Class Like{

   
   public $hashtag;
   public $createdOn;


    public function getTotalLikes($hashtag)
    {
        /* Limit Hashtag*/
        $this->hashtag = $hashtag ;
        $result =   Database::query('SELECT * FROM hashtags WHERE hashtag LIKE :hashtag', array(':hashtag'=> $hashtag));

        return $result;

    }
   
    public function like()
    {
        /* Limit Hashtag*/

        $result =   Database::query('SELECT * FROM hashtags LIMIT 5');

        return $result;

    }

    function getMostRecentLike()
    {

    }

    public function getHighestLiked($hashtag){
        /* Limit Hashtag*/
        $this->hashtag = $hashtag ;
        $this->createdOn = date("Y-m-d H:i:s");
        $result =  Database::query('INSERT INTO hashtags (hashtag,createdDate) VALUES (:hashtag,:createdOn)', array(':hashtag'=> $this->hashtag,':createdOn'=>$this->createdOn));

        return $result;

    }


    public function addTrend($hashtag){
        preg_match_all("/#+([a-zA-Z0-9_]+)/i",$hashtag,$matches);
        if($matches){
            $result = array_values($matches[1]);
        }
        $result =  Database::query('INSERT INTO hashtags (hashtag,createdDate) VALUES (:hashtag,:createdOn)', array(':hashtag'=> $this->hashtag,':createdOn'=>$this->createdOn));

    }




}