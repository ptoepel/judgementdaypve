<?php
class Functions{

  private $baseUrl;
  private $linkText;

  function base_url($param,$linkText){
    $this->baseUrl = $param;
    $this->linkText = $linkText;
    $link = "<a href=". $_SERVER[PHP_SELF].$this->base_url.'>'.$this->linkText.'</a>';
    return $link;
  }



}
