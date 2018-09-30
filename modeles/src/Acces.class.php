<?php
//-----------------------------------------------------
//-------------------| Class Acces |----------------
//-----------------------------------------------------

class Acces
{
  private $_IdU;
  private $_IdE;

  public function __construct($idU, $idE){
    $this->setIdUtilisateur($idU);
    $this->setIdEvenement($idE);
  }

  public function getIdUtilisateur(){
    return $this->_IdU;
  }

  public function getIdEvenement(){
    return $this->_Titre;
  }

  public function setIdUtilisateur($idU){
    if(is_int($idU) && $idU >= 0){
      $this->_IdU = $idU;
    }
  }

  public function setIdEvenement($idE){
    if(is_int($idE) && $idE >= 0){
      $this->_IdE = $idE;
    }
  }

  public function toString(){
    $msg = "Acces :<br>";
    $msg .= "id utilisateur : ".$this->_IdU."<br>";
    $msg .= "id Evenement : ".$this->_IdE."<br>";

    return $msg;
  }
}
