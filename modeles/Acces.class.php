<?php
//-----------------------------------------------------
//-------------------| Class Acces |----------------
//-----------------------------------------------------

class Acces
{
  private $_Utilisateur;
  private $_Evenement;

  public function __construct($utilisateur, $Evenement){
    $this->setUtilisateur($utilisateur);
    $this->setEvenement($Evenement);
  }

  public function getUtilisateur(){
    return $this->_Utilisateur;
  }

  public function getEvenement(){
    return $this->_Evenement;
  }

  public function setUtilisateur($utilisateur){
      $this->_Utilisateur = $utilisateur;
  }

  public function setEvenement($evenement){
      $this->_Evenement = $evenement;
  }

  public function isValidAcces($acces){
    if(get_Class($acces) == "Acces"){
      return true;
    }
    else{
      return flase;
    }
  }

  public function toString(){
    $msg = "Acces :<br>";
    $msg .= "id utilisateur : ".$this->_IdU."<br>";
    $msg .= "id Evenement : ".$this->_IdE."<br>";

    return $msg;
  }
}
