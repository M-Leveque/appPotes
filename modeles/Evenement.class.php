<?php
//-----------------------------------------------------
//-------------------| Class Evenement |---------------
//-----------------------------------------------------

//On inclut la classe utilisateur
include_once('../Outils.class.php');

class Evenement
{
    private $_Id;
    private $_Titre;
    private $_Description;
    private $_DateC;
    private $_DateTime;
    private $_Archiver;
    private $_Utilisateur;
    private $_Emoticon;

    public function __construct($id, $titre, $description, $dateC, $dateTime, $archiver, $utilisateur, $emoticon){

        $this->setId($id);
        $this->setTitre($titre);
        $this->setDescription($description);
        $this->setDateC($dateC);
        $this->setDateTime($dateTime);
        $this->setArchiver($archiver);
        $this->setUtilisateur($utilisateur);
        $this->setEmoticon($emoticon);

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

    public function getUtilisateur(){
        return $this->_Utilisateur;
    }

    public function getEmoticon(){
        return $this->_Emoticon;
    }

    //-------------------------------
    //-----| Liste des setters |-----
    //-------------------------------

    public function setId($id){
      //Verif variable $id
      if(is_int($id) && $id > 0 && isset($id)){
        $this->_Id = $id;
      }
      else{
        throw new Exception("L'attribut id doit être un integer > 0 non null");
      }
    }

    public function setTitre($titre){
        //Verif variable $titre
        if(strlen($titre) < 20 && isset($titre)){
          $this->_Titre = $titre;
        }
        else{
          throw new Exception("L'attribut titre doit être < 20 non null");
        }
    }

    public function setDescription($description){
      if(isset($description)){
        $this->_Description = $description;
      }
      else{
        throw new Exception("L'attribut description ne doit pas être null");
      }
    }

    public function setDateC($dateC){
        if(Outils::estUneDateValide($dateC)){
          $this->_DateC = $dateC;
        }
        else{
          throw new Exception("L'attribut dateC doit être une date valid");
        }
    }

    public function setDateTime($dateTime){
        if(Outils::estUnDateTimeValide($dateTime)){
          $this->_DateTime = $dateTime;
        }
        else{
          throw new Exception("L'attribut dateC doit être un dateTime valid");
        }
    }

    public function setArchiver($archiver){
        if(is_bool($archiver)){
          $this->_Archiver = $archiver;
        }
        else{
          throw new Exception("L'attribut archiver doit être un booleen");
        }
    }

    public function setUtilisateur($utilisateur){
      try{
        $utilisateur->isValidUtilisateur();
        $this->_Utilisateur = $utilisateur;
      }
      catch(Exception $e){
        throw new \Error($e);
      }

    }

    public function setEmoticon($emoticon){
      try{
        if(get_class($emoticon) == "Emoticon"){
          $this->_Emoticon = $emoticon;
        }
        else{
          throw new Exception("L'attribut emoticon n'est pas une instance de la class emoticon");
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
        $msg = "Evenement :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "titre : ".$this->_Titre."<br>";
        $msg .= "description : ".$this->_Description."<br>";
        $msg .= "date : ".$this->_DateTime."<br>";
        $msg .= "date creation : ".$this->_DateC."<br>";
        $msg .= "Archiver : ".$this->_Archiver."<br>";
        $msg .= "utilisateur : ".$this->_Utilisateur->toString()."<br>";
        $msg .= "emoticon : ".$this->_Emoticon->toString()."<br>";

        return $msg;
    }
}
?>
