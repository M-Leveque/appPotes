<?php
//-----------------------------------------------------
//-------------------| Class Album |-------------------
//-----------------------------------------------------

class Album
{
    private $_Id;
    private $_Nom;
    private $_Priver;
    private $_Visuel;
    private $_IdE;
    private $_IdU;

    public function __construct($id, $nom){

      //Verif variable $id
      if(is_int($id) && $id >= 0 ){
        $this->_Id = $id;
      }

      //Verif variable $nom
      if(strlen($nom) < 20){
        $this->_Nom = $nom;
      }
    }

    //-------------------------------
    //-----| Liste des getters |-----
    //-------------------------------

    public function getId(){
        return $this->_Id;
    }

    public function getNom(){
        return $this->_Nom;
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
      else{
        $result = "Erreur : la donnée doit être un entier supérieur à 0";
      }
      return $result;

    }

    public function setNom($nom){
      //Verif variable $titre
      if(strlen($nom) <= 20){
        $this->_Nom = $nom;
        $result = "Reussi";
      }
      else {
        $result = "Erreur: le nom doit contenir un maximum de 20 caractères";
      }
      return $result;
    }

    //------------------------------
    //-----| Methode toString |-----
    //------------------------------

    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "nom : ".$this->_Nom."<br>";

        return $msg;
    }
}
?>
