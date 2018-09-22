<?php
class Message
{
    private $_Id;
    private $_Contenu;
    private $_IdEvenement;
    private $_IdUtilisateur;

    public function __construct($id, $contenu, $idEvenement, $idUtilisateur){
        $this->setId($id);
        $this->setContenu($contenu);
        $this->setIdEvenement($idEvenement);
        $this->setIdUtilisateur($idUtilisateur);
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
        return $this->_IdEvenement;
    }

    public function getIdUtilisateur(){
        return $this->_IdUtilisateur;
    }

    //-------------------------------
    //-----| Liste des setters |-----
    //-------------------------------

    public function setId($id){
      //Verif variable $id
      if(is_int($id) && $id >= 0 ){
        $this->_Id = $id;
      }
    }


    public function setContenu($contenu){
        $this->_Contenu = $contenu;
    }

    public function setIdEvenement($evenement){
        if(is_int($evenement)){
          $this->_IdEvenement = $evenement;
      }
    }

    public function setIdUtilisateur($utilisateur){
      if(is_int($utilisateur)){
        $this->_IdUtilisateur = $utilisateur;
      }
    }


    //------------------------------
    //-----| Methode toString |-----
    //------------------------------

    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "contenu : ".$this->_Contenu."<br><br>";
        $msg .= "id evenement : ".$this->_IdEvenement."<br><br>";
        $msg .= "id utilisateur : ".$this->_IdUtilisateur."<br>";

        return $msg;
    }
}
?>
