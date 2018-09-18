<?php
//-----------------------------------------------------
//-----------------| Class Cagnotte |------------------
//-----------------------------------------------------

//On inclut lles class en lien avec Cagnotte
include_once('Outils.class.php');

class Cagnotte
{
    private $_Id;
    private $_Titre;
    private $_Description;
    private $_DateFin;

    public function __construct($id, $titre, $description, $dateFin){
        //Verif variable $id
        if(is_int($id) && $id >= 0 ){
          $this->_Id = $id;
        }

        //Verif variable $titre
        if(strlen($titre) < 20){
          $this->_Titre = $titre;
        }

        $this->_Description = $description;

        //Verif variable $date
        if(Outils::estUneDateValide($dateFin)){
          $this->_DateFin = $dateFin;
        }
    }

    //-------------------------------
    //-----| Liste des getters |-----
    //-------------------------------

    public function getId(){
        return $this->_Id;
    }

    public function getTitre(){
        return $this->_Titre;
    }

    public function getDescription(){
        return $this->_Description;
    }

    public function getDatefin(){
        return $this->_DateFin;
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

    public function setTitre($titre){

        //Verif variable $titre
        if(strlen($titre) < 20){
          $this->_Titre = $titre;
          $result = "Reussi";
        }
        else {
          $result = "Erreur: le titre doit contenir un maximum de 20 caractères";
        }
        return $result;

    }


    public function setDescription($description){
        $this->_Description = $description;
        return "Reussi";
    }

    public function setDateFin($dateFin){
      if(Outils::estUneDateValide($dateFin)){
        $this->_DateFin = $dateFin;
        $result = "Reussi";
      }
      else{
        $result = "Erreur : la donnée doit être un date valide";
      }
      return $result;
    }


    //------------------------------
    //-----| Methode toString |-----
    //------------------------------

    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "titre : ".$this->_Titre."<br>";
        $msg .= "description : ".$this->_Description."<br>";
        $msg .= "date de fin : ".$this->_DateFin."<br>";

        return $msg;
    }
}
?>
