<?php
//-----------------------------------------------------
//-------------------| Class Evenement |-------------------
//-----------------------------------------------------

//On inclut la classe utilisateur
include_once('modeles/src/Outils.class.php');

class Evenement
{
    private $_Id;
    private $_Titre;
    private $_Description;
    private $_DateC;
    private $_DateTime;
    private $_Archiver;
    private $_IdUtilisateur;
    private $_IdEmoticon;

    public function __construct($id, $titre, $description, $dateC, $dateTime, $archiver, $idUtilisateur, $idEmoticon){

        $this->setId($id);
        $this->setTitre($titre);
        $this->setDescription($description);
        $this->setDateC($dateC);
        $this->setDateTime($dateTime);
        $this->setArchiver($archiver);
        $this->setIdUtilisateur($idUtilisateur);
        $this->setIdEmoticon($idEmoticon);

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

    public function getDateC(){
      return $this->_DateC;
    }

    public function getDateTime(){
        return $this->_DateTime;
    }

    public function getArchiver(){
        return $this->_Archiver;
    }

    public function getIdUtilisateur(){
        return $this->_IdUtilisateur;
    }

    public function getIdEmoticon(){
        return $this->_IdEmoticon;
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

    public function setDateC($dateC){
        if(Outils::estUneDateValide($dateC)){
          $this->_DateC = $dateC;
          $result = "Reussi";
        }
        else{
          $result = "Erreur : La donnée doit être un dateTime valide";
        }
        return $result;
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

    public function setArchiver($archiver){
        if(is_bool($archiver) || $archiver == 0 || $archiver == 1){
          $this->_Archiver = $archiver;
          $result = "Reussi";
        }
        else{
          $result = "Erreur : La donnée doit être un dateTime valide";
        }
        return $result;
    }

    public function setIdUtilisateur($idUtilisateur){
      if(is_int($idUtilisateur)){
        $this->_IdUtilisateur = $idUtilisateur;
        $result = "Reussi";
      }
      else{
        $result = "Erreur : la donnée doit être un entier supérieur à 0";
      }
      return $result;
    }

    public function setIdEmoticon($idEmoticon){
      if(is_int($idEmoticon)){
        $this->_IdEmoticon = $idEmoticon;
        $result = "Reussi";
      }
      else{
        $result = "Erreur : la donnée doit être un entier supérieur à 0";
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
        $msg .= "date creation : ".$this->_DateC."<br>";
        $msg .= "Archiver : ".$this->_Archiver."<br>";
        $msg .= "utilisateur : ".$this->_IdUtilisateur."<br>";
        $msg .= "emoticon : ".$this->_IdEmoticon."<br>";

        return $msg;
    }
}
?>
