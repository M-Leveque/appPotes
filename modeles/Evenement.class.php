<?php
//-----------------------------------------------------
//-------------------| Class Evenement |-------------------
//-----------------------------------------------------

//On inclut la classe utilisateur
include_once('Utilisateur.class.php');
include_once('Outils.class.php');

class Evenement
{
    private $_Id;
    private $_Titre;
    private $_Description;
    private $_DateTime;
    private $_Archiver;
    private $_Utilisateur;

    public function __construct($id, $titre, $description, $dateTime, $archiver, $utilisateur){

        //Verif variable $id
        if(is_int($id) && $id >= 0 ){
          $this->_Id = $id;
        }

        //Verif variable $titre
        if(strlen($titre) < 20){
          $this->_Titre = $titre;
        }

        $this->_Description = $description;

        //Verif variable $dateHeure
        if(Outils::estUnDateTimeValide($dateTime)){
          $this->_DateTime = $dateTime;
        }

        //Verif variable $archiver
        if($archiver == TRUE){
          $this->_Archiver = $archiver;
        }

        if(is_object($utilisateur)){
          $this->_Utilisateur = $utilisateur;
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

    public function getDateTime(){
        return $this->_DateTime;
    }

    public function getUtilisateur(){
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

    public function setDateTime($dateTime){
        if(Outils::estUnDateTimeValide($dateTime)){
          $this->_DateTime = $dateTime;
          $result = "Reussi";
        }
        else{
          $result = "Erreur : La donnée doit être un dateTime valide";
        }
        return $result;
    }

    public function setUtilisateur($utilisateur){
      if(is_object($utilisateur)){
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
        $msg = "Evenement :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "titre : ".$this->_Titre."<br>";
        $msg .= "description : ".$this->_Description."<br>";
        $msg .= "date : ".$this->_DateTime."<br>";
        $msg .= "utilisateur : ".$this->_Utilisateur->toString()."<br>";

        return $msg;
    }
}
?>
