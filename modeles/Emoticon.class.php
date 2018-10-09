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

  //Getteurs
  public function getId(){
    return $this->_Id;
  }

  public function getTitre(){
    return $this->_Titre;
  }

  public function getChemin(){
    return $this->_Chemin;
  }

  //Setteurs
  public function setId($id){
    if(is_int($id) && $id >= 0 && isset($id)){
      $this->_Id = $id;
    }
    else{
      throw new Exception("L'attribut id doit être un integer > à 0 non null");
    }
  }

  public function setTitre($titre){
    if(strlen($titre) < 20 && isset($titre)){
      $this->_Titre = $titre;
    }
    else{
      throw new Exception("L'attribut titre doit être < 20 et non null");
    }
  }

  public function setChemin($chemin){
    if(strlen($chemin) < 255 && isset($chemin)){
      $this->_Chemin = $chemin;
    }
    else{
      throw new Exception("L'attribut chemin doit être < 255 et non null");
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
