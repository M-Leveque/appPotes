<?php
//-----------------------------------------------------
//-------------------| Class Acces |----------------
//-----------------------------------------------------

class Acces
{
  private $_IdU;
  private $_IdE;

  public function __construct($idU, $idE){
    $this->setIdU($idU);
    $this->setIdE($idE);
  }

  public function getIdU(){
    return $this->_IdU;
  }

  public function getIdE(){
    return $this->_IdE;
  }

  public function setIdU($idU){

      if(is_int($idU) && $idU >= 0)
        $this->_IdU = $idU;
      else
          throw new Exception("L'id Utilisateur doit être un integer > 0");

  }

  public function setIdE($idE){

      if(is_int($idE) && $idE >= 0)
        $this->_IdE = $idE;
      else
          throw new Exception("L'id Evenement doit être un integer > 0");

  }

  public function toString(){
    $msg = "Acces :<br>";
    $msg .= "Utilisateur : ".$this->_IdU."<br>";
    $msg .= "Evenement : ".$this->_IdE."<br>";

    return $msg;
  }
}
