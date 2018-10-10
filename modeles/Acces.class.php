<?php
//-----------------------------------------------------
//-------------------| Class Acces |----------------
//-----------------------------------------------------

class Acces
{
  private $_Utilisateur;
  private $_Evenement;

  public function __construct($utilisateur, $evenement){
    $this->setUtilisateur($utilisateur);
    $this->setEvenement($evenement);
  }

  public function getUtilisateur(){
    return $this->_Utilisateur;
  }

  public function getEvenement(){
    return $this->_Evenement;
  }

  public function setUtilisateur($utilisateur){
    try{
      if(get_Class($utilisateur) == "Utilisateur"){
        $this->_Utilisateur = $utilisateur;
      }
      else{
        throw new Exception("L'object doit être une instance de la class Utilisateur");
      }
    }
    catch(Exception $e){
      throw new Exception("Vous devez passer un objet en parametre");
    }
  }

  public function setEvenement($evenement){
    try{
      if(get_Class($evenement) == "Evenement"){
        $this->_Evenement = $evenement;
      }
      else{
        throw new Exception("L'object doit être une instance de la class Evenement");
      }
    }
    catch(Exception $e){
      throw new Exception("Vous devez passer un objet en parametre");
    }
  }

  public function toString(){
    $msg = "Acces :<br>";
    $msg .= "Utilisateur : ".$this->_Utilisateur."<br>";
    $msg .= "Evenement : ".$this->_Evenement."<br>";

    return $msg;
  }
}
