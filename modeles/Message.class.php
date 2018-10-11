<?php
class Message
{
    private $_Id;
    private $_Contenu;
    private $_Evenement;
    private $_Utilisateur;

    public function __construct($id, $contenu, $evenement, $utilisateur){
        $this->setId($id);
        $this->setContenu($contenu);
        $this->setEvenement($evenement);
        $this->setUtilisateur($utilisateur);
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

    public function getEvenement(){
        return $this->_Evenement;
    }

    public function getUtilisateur(){
        return $this->_Utilisateur;
    }

    //-------------------------------
    //-----| Liste des setters |-----
    //-------------------------------

    public function setId($id){
      //Verif variable $id
      if(isset($id) && is_int($id) && $id >= 0 ){
        $this->_Id = $id;
      }
      else{
        throw new Exception("L'id doit être un integer non null > 0");
      }
    }


    public function setContenu($contenu){
      if(isset($contenu))
        $this->_Contenu = $contenu;
      else
        throw new Exception("Le contenu ne peux pas être null");
    }

    public function setEvenement($evenement){
      try {
        if(get_class($evenement) == "Evenement"){
            $this->_Evenement = $evenement;
        }
        else{
          throw new Exception("L'evenement doit être une instance de la class Evenement");

        }
      } catch (Exception $e) {
        throw new Exception($e);
      }
    }

    public function setUtilisateur($utilisateur){
      try {
        if(get_class($utilisateur) == "Utilisateur"){
            $this->_Utilisateur = $utilisateur;
        }
        else{
          throw new Exception("L'utilisateur doit être une instance de la class Utilisateur");

        }
      } catch (Exception $e) {
        throw new Exception($e);
      }
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
