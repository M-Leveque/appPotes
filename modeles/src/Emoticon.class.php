<?php
//-----------------------------------------------------
//-------------------| Class Emoticon |----------------
//-----------------------------------------------------

class Emoticon
{
  private $_Id;
  private $_Titre;
  private $_Chemin;

  public function __construct($id, $titre, $chemin){
    $this->setId($id);
    $this->setTitre($titre);
    $this->setChemin($chemin);
  }

  public function getId(){
    return $this->_Id;
  }

  public function getTitre(){
    return $this->_Titre;
  }

  public function getChemin(){
    return $this->_Chemin;
  }

  public function setId($id){
    if(is_int($id) && $id >= 0){
      $this->_Id = $id;
    }
  }

  public function setTitre($titre){
    if(strlen($titre) < 20){
      $this->_Titre = $titre;
    }
  }

  public function setChemin($chemin){
    if(strlen($chemin) < 255){
      $this->_Chemin = $chemin;
    }
  }

  public function toString(){
    $msg = "Emoticon :<br>";
    $msg .= "id : ".$this->_Id."<br>";
    $msg .= "titre : ".$this->_Titre."<br>";
    $msg .= "chemin : ".$this->_Chemin."<br>";

    return $msg;
  }
}
