<?php
//-----------------------------------------------------
//-------------------| Class Album |-------------------
//-----------------------------------------------------

include "modeles/Outils.class.php";

class Album
{
    private $_Id;
    private $_Nom;
    private $_Desciption;
    private $_DateCreation;
    private $_Priver;
    private $_Visuel;
    private $_Evenement;
    private $_Utilisateur;

    //Constructeurs
    public function __construct($id, $nom, $description, $dateCreation, $priver, $visuel, $evenement, $utilisateur){

      $this->setId($id);
      $this->setNom($nom);
      $this->setDescription($description);
      $this->setDateCreation($dateCreation);
      $this->setPriver($priver);
      $this->setvisuel($visuel);
      $this->setEvenement($evenement);
      $this->setUtilisateur($utilisateur);
    }

    //Getteurs

    public function getId(){
        return $this->_Id;
    }

    public function getNom(){
        return $this->_Nom;
    }

    public function getDescription(){
      return $this->_Desciption;
    }

    public function getDateCreation(){
      return $this->_DateCreation;
    }

    public function getPriver(){
        return $this->_Priver;
    }

    public function getVisuel(){
        return $this->_Visuel;
    }

    public function getEvenement(){
        return $this->_Evenement;
    }

    public function getUtilisateur(){
        return $this->_Utilisateur;
    }

    //Setteurs

    public function setId($id){
      //Verif variable $id
      if(isset($id) && is_int($id) && $id >= 0){
        $this->_Id = $id;
      }
      else{
        throw new Exception("L'id doit être un integer > 0 non null");
      }

    }

    public function setNom($nom){
      //Verif variable $titre
      if(is_string($nom) && strlen($nom) <= 50 && isset($nom)){
        $this->_Nom = $nom;
      }
      else{
        throw new Exception("Le Nom doit être une chaine de caracteres > 50 non null");
      }
    }

    public function setDescription($description){
      if(is_string($description) && strlen($description) <= 255 && isset($description)){
        $this->_Desciption = $description;
      }
      else{
        throw new Exception("La description n'est pas valid");
      }
    }

    public function setDateCreation($dateCreation){
      if(isset($dateCreation) && Outils::estUneDateValide($dateCreation)){
        $this->_DateCreation = $dateCreation;
      }
      else{
        throw new Exception("La date de creation doit être une date valide non null");
      }
    }

    public function setPriver($priver){
      //Verif variable $titre
      if(isset($priver) && is_bool($priver)){
        $this->_Priver = $priver;
      }
      else{
        throw new Exception("L'attribut priver doit être un booléen");
      }
    }

    public function setvisuel($visuel){
      //Verif variable $titre
      if(is_string($visuel) && strlen($visuel) <= 255){
        $this->_Visuel = $visuel;
      }
      else{
        throw new Exception("L'id doit être un integer > 0 non null");
      }
    }

    public function setEvenement($evenement){
      try{
        if(get_class($evenement) == "Evenement"){
          $this->_Evenement = $evenement;
        }
        else{
          throw new Exception("L'evenement doit être une instance de la class evenement");
        }
      }
      catch(Exception $e){
        throw new Exception($e);
      }
    }

    public function setUtilisateur($utilisateur){
      try{
        if(get_class($utilisateur) == "Utilisateur"){
            $this->_Utilisateur = $utilisateur;
        }
        else{
          throw new Exception("L'attribut utilisateur n'est pas une instance de la class Utilisateur");
        }
      }
      catch(Exception $e){
        throw new Exception($e);
      }
    }

    //------------------------------
    //-----| Methode toString |-----
    //------------------------------

    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "nom : ".$this->_Nom."<br>";
        $msg .= "priver : ".$this->_Priver."<br>";
        $msg .= "visuel : ".$this->_Visuel."<br>";
        $msg .= "idE : ".$this->_Evenement."<br>";
        $msg .= "idU : ".$this->_Utilisteur."<br>";

        return $msg;
    }
}
