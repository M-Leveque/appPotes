<?php
//-----------------------------------------------------
//-----------------| Class Cagnotte |------------------
//-----------------------------------------------------

//On inclut lles class en lien avec Cagnotte
include_once('modeles/src/Outils.class.php');

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
      $this->setHeureDateFin($dateHeureFin);
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
      if(is_int($id) && $id >= 0 ){
        $this->_Id = $id;
      }
    }

    public function setTitre($titre){

        //Verif variable $titre
        if(strlen($titre) < 20){
          $this->_Titre = $titre;
        }
    }


    public function setDescription($description){
        $this->_Description = $description;
    }

    public function setHeureDateFin($dateHeureFin){
      if(Outils::estUnDateTimeValide($dateHeureFin)){
        $this->_DateHeureFin = $dateHeureFin;
      }
    }

    public function setArgentR($argentR){
      if(is_int($argentR) && $argentR > 0){
        $this->_ArgentR = $argentR;
      }
    }

    public function setIdE($idE){
      if(is_int($idE) && $idE > 0){
        $this->_IdE = $idE;
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
        $msg .= "id Evenement : ".$this->_IdE."<br>";

        return $msg;
    }
}
?>
