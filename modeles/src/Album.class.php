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

    //Constructeurs
    public function __construct($id, $nom, $priver, $visuel, $idEvenement, $idUtilisateur){

      $this->setId($id);
      $this->setNom($nom);
      $this->setPriver($priver);
      $this->setvisuel($visuel);
      $this->setIdEvenement($idEvenement);
      $this->setIdUtilisateur($idUtilisateur);
    }

    //Getteurs

    public function getId(){
        return $this->_Id;
    }

    public function getNom(){
        return $this->_Nom;
    }

    public function getPriver(){
        return $this->_Priver;
    }

    public function getVisuel(){
        return $this->_Visuel;
    }

    public function getIdEvenement(){
        return $this->_IdE;
    }

    public function getIdUtilisateur(){
        return $this->_IdU;
    }

    //Setteurs

    public function setId($id){
      //Verif variable $id
      if(is_int($id) && $id >= 0 && $id){
        $this->_Id = $id;
      }

    }

    public function setNom($nom){
      //Verif variable $titre
      if(strlen($nom) <= 50 && $nom){
        $this->_Nom = $nom;
      }
    }

    public function setPriver($priver){
      //Verif variable $titre
      if(is_bool($priver)){
        $this->_Priver = $priver;
      }
    }

    public function setvisuel($visuel){
      //Verif variable $titre
      if(strlen($visuel) <= 255 && $visuel){
        $this->_Nom = $visuel;
      }
    }

    public function setIdEvenement($idEvenement){
      //Verif variable $id
      if(is_int($idEvenement) && $idEvenement >= 0 ){
        $this->_IdE = $idEvenement;
      }

    }

    public function setIdUtilisateur($idU){
      //Verif variable $id
      if(is_int($idU) && $idU >= 0 && $idU){
        $this->_IdU = $idU;
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
        $msg .= "idE : ".$this->_IdEvenement."<br>";
        $msg .= "idU : ".$this->_IdUtilisteur."<br>";

        return $msg;
    }
}
