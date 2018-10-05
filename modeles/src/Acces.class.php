<?php
//-----------------------------------------------------
//-------------------| Class Acces |----------------
//-----------------------------------------------------

class Acces
{
  private $_Utilisateur;
  private $_Evenement;

  public function __construct($utilisateur, $Evenement){
    $this->setIdUtilisateur($utilisateur);
    $this->setIdEvenement($Evenement);
  }

  public function getUtilisateur(){
    return $this->_Utilisateur;
  }

  public function getEvenement(){
    return $this->_Evenemenet;
  }

  public function setIdUtilisateur($idU){
    if(){
      $this->_IdU = $idU;
    }
  }

  public function setIdEvenement($idE){
    if(is_int($idE) && $idE >= 0){
      $this->_IdE = $idE;
    }
  }
  
  public function isValidAcces($acces){
    if(get_Class($acces) == "Acces"){
      if(get_class($acces->getUtilisateur()->isUtilisateurValid() && $acces->getEvenement()->isUtilisateurValid()))
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
