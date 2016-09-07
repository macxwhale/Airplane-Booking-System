<?php 
class Books {
  public $price;
  public $title;
  function __construct($par1, $par2){
    $this->title = $par1;
    $this->price = $par2;
  }
  function setPrice($par1){
    $this->price = $par;
  }
  function getPrice(){
    echo $this->price . "<br>";
  }
  function setTitle($par2){
    $this->title = $par;
  }
  function getTitle(){
    echo $this->title . "<br>";
  }
}

$physics = new Books("PHP", 10);
$physics->getTitle();
$physics->getPrice();
?>