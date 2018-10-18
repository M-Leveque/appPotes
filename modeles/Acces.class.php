<?php
//-----------------------------------------------------
//-------------------| Class Acces |----------------
//-----------------------------------------------------

class Acces
{
  private $_idU;
  private $_idE;

  public function __construct($idU, $idE){
    $this->setIdU($idU);
    $this->setIdE($idE);
  }

  public function getIdU(){
    return $this->_idU;
  }

  public function getIdE(){
    return $this->_idE;
  }

  public function setIdU($idU){

      if(is_int($idU) && $idU >= 0)
        $this->_idU = $idU;
      else
          throw new Exception("L'id Utilisateur doit être un integer > 0");

  }

  public function setIdE($idE){

      if(is_int($idE) && $idE >= 0)
        $this->_idE = $idE;
      else
          throw new Exception("L'id Evenement doit être un integer > 0");

  }

  public function toString(){
    $msg = "Acces :<br>";
    $msg .= "Utilisateur : ".$this->_idU."<br>";
    $msg .= "Evenement : ".$this->_idE."<br>";

    return $msg;
  }
}
