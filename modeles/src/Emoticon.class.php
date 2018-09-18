<?php
//-----------------------------------------------------
//-------------------| Class Emoticon |----------------
//-----------------------------------------------------

class Emoticon
{
  private $Id;
  private $Titre;
  private $Chemin;

  public function __construct($id, $titre, $chemin){
    $this->_Id = $id;
    $this->_Titre = $titre;
    $this->_Chemin = $chemin;
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

  public function toString(){
    $msg = "Emoticon :<br>";
    $msg .= "id : ".$this->_Id."<br>";
    $msg .= "titre : ".$this->_Titre."<br>";
    $msg .= "chemin : ".$this->_Chemin."<br>";

    return $msg;
  }
}
