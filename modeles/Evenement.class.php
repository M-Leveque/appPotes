<?php
//-----------------------------------------------------
//-------------------| Class Evenement |---------------
//-----------------------------------------------------

//On inclut la classe utilisateur
include_once('Outils.class.php');

class Evenement
{
    private $_Id;
    private $_Titre;
    private $_Description;
    private $_DateC;
    private $_DateTime;
    private $_Archiver;
    private $_idU;

    public function __construct($id, $titre, $description, $dateC, $dateTime, $archiver, $idU){

        $this->setId($id);
        $this->setTitre($titre);
        $this->setDescription($description);
        $this->setDateC($dateC);
        $this->setDateTime($dateTime);
        $this->setArchiver($archiver);
        $this->setIdU($idU);

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

    public function getIdU(){
        return $this->_idU;
    }

    //-------------------------------
    //-----| Liste des setters |-----
    //-------------------------------

    public function setId($id){
      //Verif variable $id
      if( $id && is_int($id) && $id > 0){
        $this->_Id = $id;
      }
      else{
        throw new Exception("L'attribut id doit être un integer > 0 non null");
      }
    }

    public function setTitre($titre){
        //Verif variable $titre
        if($titre && strlen($titre) < 20){
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
        if($dateC && Outils::estUneDateValide($dateC)){
          $this->_DateC = $dateC;
        }
        else{
          throw new Exception("L'attribut dateC doit être une date valid");
        }
    }

    public function setDateTime($dateTime){
        if($dateTime &&  Outils::estUnDateTimeValide($dateTime)){
          $this->_DateTime = $dateTime;
        }
        else{
          throw new Exception("L'attribut dateC doit être un dateTime valid");
        }
    }

    public function setArchiver($archiver){
        if(isset($archiver) && is_bool($archiver)){
          $this->_Archiver = $archiver;
        }
        else{
          throw new Exception("L'attribut archiver doit être un booleen");
        }
    }

    public function setIdU($idU){
        if(is_int($idU) && $idU >= 0){
            $this->_idU = $idU;
        }
        else{
          throw new Exception("L'id Utilisateur doit être > 0");
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
        $msg .= "id Utilisateur : ".$this->_idU."<br>";

        return $msg;
    }
}
?>
