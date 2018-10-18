<?php
//-----------------------------------------------------
//-------------------| Class Photo |-------------
//-----------------------------------------------------

//On inclut lles class en lien avec photo
include_once ('Outils.class.php');

class Photo
{
    private $_Id;
    private $_Titre;
    private $_Chemin;
    private $_Compteur;
    private $_Date;
    private $_DateU;
    private $_idU;
    private $_idA;

    public function __construct($id, $titre, $chemin, $compteur, $date, $dateU, $idU, $idA){

        $this->setId($id);
        $this->setTitre($titre);
        $this->setChemin($chemin);
        $this->setCompteur($compteur);
        $this->setDate($date);
        $this->setDateU($dateU);
        $this->setIdU($idU);
        $this->setIdA($idA);
    }


    //Getteurs
    public function getId(){
        return $this->_Id;
    }

    public function getTitre(){
        return $this->_Titre;
    }

    public function getChemin(){
        return $this->_Chemin;
    }

    public function getCompteur(){
        return $this->_Compteur;
    }

    public function getDate(){
        return $this->_Date;
    }

    public function getDateU(){
        return $this->_DateU;
    }


    public function getIdU(){
        return $this->_idU;
    }

    public function getIdA(){
        return $this->_idA;
    }



    public function setId($id){

      if(isset($id) && is_int($id) && $id >= 0 )
        $this->_Id = $id;
      else
        throw new Exception("L'attribut id doit être un integer non null > 0 ");

    }

    public function setTitre($titre){

      if(isset($titre) && is_string($titre) && strlen($titre) < 20)
          $this->_Titre = $titre;
      else
        throw new Exception("L'attribut titre doit être une chaine de caracteres non null < 20 ");

    }

    public function setChemin($chemin){

      if(isset($chemin))
        $this->_Chemin = $chemin;
      else
        throw new Exception("L'attribut chemin ne doit pas être null");

    }

    public function setCompteur($compteur){

      if(isset($compteur) && is_int($compteur) && $compteur >= 0 )
        $this->_Compteur = $compteur;
      else
        throw new Exception("L'attribut compteur doit être un integer non null");

    }

    public function setDate($date){

      if(isset($date) && Outils::estUneDateValide($date))
        $this->_Date = $date;
      else
        throw new Exception("L'attribut date doit être non null et une date valide");

    }

    public function setDateU($dateU){

      if(isset($dateU) && Outils::estUneDateValide($dateU))
        $this->_DateU = $dateU;
      else
        throw new Exception("L'attribut dateU doit être non null et une date valide");

    }

    public function setIdU($idU){
        if(is_int($idU) && $idU >= 0)
          $this->$idU = $idU;
        else
          throw new Exception("L'id Utilisateur doit être un integer > 0");
    }

    public function setIdA($idA){

        if( is_int($idA) && $idA >= 0 )
          $this->_idA = $idA;
        else
          throw new Exception("L'id Album doit être un integer > 0");

    }

    //toString
    public function toString() {
        $msg = "Utilisateur :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "titre : ".$this->_Titre."<br>";
        $msg .= "chemin : ".$this->_Chemin."<br>";
        $msg .= "compteur : ".$this->_Compteur."<br>";
        $msg .= "date : ".$this->_Date."<br>";
        $msg .= "id Utilisateur : ".$this->_idU."<br>";
        $msg .= "id Album : ".$this->_idA."<br>";

        return $msg;
    }
}
?>
