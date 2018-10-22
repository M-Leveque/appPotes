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
    private $_DateHeureFin;
    private $_ArgentR;
    private $_IdE;

    public function __construct($id, $titre, $description, $dateHeureFin, $argentR, $idE){
      $this->setId($id);
      $this->setTitre($titre);
      $this->setDescription($description);
      $this->setDateHeureFin($dateHeureFin);
      $this->setArgentR($argentR);
      $this->setIdE($idE);
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

    public function getDateHeurefin(){
        return $this->_DateHeureFin;
    }

    public function getArgentR(){
      return $this->_ArgentR;
    }

    public function getIdE(){
      return $this->_IdE;
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
        throw new Exception("L'id doit être un integert non null > 0");
      }
    }

    public function setTitre($titre){

        //Verif variable $titre
        if(isset($titre) && is_string($titre) && strlen($titre) < 20){
          $this->_Titre = $titre;
        }
        else{
          throw new Exception("Le titre doit être une chaine de caracteres non null < 20 caracteres");
        }
    }

    public function setDescription($description){
      if(isset($description)){
        $this->_Description = $description;
      }
      else{
        throw new Exception("La description ne doit pas être null");

      }
    }

    public function setDateHeureFin($dateHeureFin){
      if(isset($dateHeureFin) && Outils::estUnDateTimeValide($dateHeureFin)){
        $this->_DateHeureFin = $dateHeureFin;
      }
      else{
        throw new Exception("La dateHeureFin doit être un dateTime valid non null");
      }
    }

    public function setArgentR($argentR){
      if(isset($argentR) && is_int($argentR) && $argentR >= 0){
        $this->_ArgentR = $argentR;
      }
      else{
        throw new Exception("L'argentR doit être un integer non null >= à 0");
      }
    }

    public function setIdE($idE){
        if(is_int($idE) && $idE >= 0){
          $this->_IdE = $idE;
        }
        else{
          throw new Exception("L'id Evenement doit être un integer > 0");
        }
    }


    //------------------------------
    //-----| Methode toString |-----
    //------------------------------

    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "titre : ".$this->_Titre."<br>";
        $msg .= "description : ".$this->_Description."<br>";
        $msg .= "date et heure de fin : ".$this->_DateHeureFin."<br>";
        $msg .= "Argent récolté : ".$this->_ArgentR."<br>";
        $msg .= "Evenement : ".$this->_IdE."<br>";

        return $msg;
    }
}
?>
