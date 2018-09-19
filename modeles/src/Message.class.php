<?php
//-----------------------------------------------------
//-----------------| Class Message |------------------
//-----------------------------------------------------

//On inclut la classe utilisateur
include_once('Utilisateur.class.php');
include_once('Evenement.class.php');

class Message
{
    private $_Id;
    private $_Contenu;
    private $_Evenement;
    private $_Utilisateur;

    public function __construct($id, $contenu, $evenement, $utilisateur){

        //Verif variable $id
        if(is_int($id) && $id >= 0 ){
          $this->_Id = $id;
        }

        $this->_Contenu = $contenu;

        //Verif variable $evenement
        if(is_int($evenement)){
          $this->_Evenement = $evenement;
        }

        //Verif variable $utilisateur
        if(is_int($utilisateur)){
          $this->_Utilisateur = $utilisateur;
        }
    }

    //-------------------------------
    //-----| Liste des getters |-----
    //-------------------------------

    public function getId(){
        return $this->_Id;
    }

    public function getContenu(){
        return $this->_Contenu;
    }

    public function getIdEvenement(){
        return $this->_Evenement;
    }

    public function getIdUtilisateur(){
        return $this->_Utilisateur;
    }

    //-------------------------------
    //-----| Liste des setters |-----
    //-------------------------------

    public function setId($id){

      //Verif variable $id
      if(is_int($id) && $id >= 0 ){
        $this->_Id = $id;
        $result = "Reussi";
      }
      else
      {
        $result = "Erreur : la donnée doit être un entier supérieur à 0";
      }
      return $result;
    }


    public function setContenu($contenu){
        $this->_Contenu = $contenu;
        return "Reussi";
    }

    public function setIdEvenement($evenement){
        if(is_int($evenement)){
          $this->_Evenement = $evenement;
          $result = "Reussi";
        }
        else{
          $result = "Erreur : La donnée doit être un objet";
        }
        return $result;
    }

    public function setIdUtilisateur($utilisateur){
      if(is_int($utilisateur)){
        $this->_Utilisateur = $utilisateur;
        $result = "Reussi";
      }
      else{
        $result = "Erreur : La donnée doit être un objet";
      }
      return $result;
    }


    //------------------------------
    //-----| Methode toString |-----
    //------------------------------

    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "contenu : ".$this->_Contenu."<br><br>";
        $msg .= "evenement : ".$this->_Evenement->toString()."<br><br>";
        $msg .= "utilisateur : ".$this->_Utilisateur->toString()."<br>";

        return $msg;
    }
}
?>
