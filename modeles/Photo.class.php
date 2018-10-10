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
    private $_Utilisateur;
    private $_Album;

    public function __construct($id, $titre, $chemin, $compteur, $date, $dateU, $utilisateur, $album){

        $this->setId($id);
        $this->setTitre($titre);
        $this->setChemin($chemin);
        $this->setCompteur($compteur);
        $this->setDate($date);
        $this->setDateU($dateU);
        $this->setUtilisateur($utilisateur);
        $this->setAlbum($album);
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


    public function getUtilisateur(){
        return $this->_Utilisateur;
    }

    public function getAlbum(){
        return $this->_Album;
    }



    //Setteurs
    public function setId($id){
      //Verif variable $id
      if(isset($id) && is_int($id) && $id >= 0 ){
        $this->_Id = $id;
      }
      else{
        throw new Exception("L'attribut id doit être un integer non null > 0 ");
      }
    }

    public function setTitre($titre){
      //Verif variable $titre
      if(isset($titre) && is_string($titre) && strlen($titre) < 20){
          $this->_Titre = $titre;
      }
      else{
        throw new Exception("L'attribut titre doit être une chaine de caracteres non null < 20 ");
      }
    }

    public function setChemin($chemin){
      if(isset($chemin)){
        $this->_Chemin = $chemin;
      }
      else{
        throw new Exception("L'attribut chemin ne doit pas être null");
      }
    }

    public function setCompteur($compteur){
      //Verif variable $id
      if(isset($compteur) && is_int($compteur) && $compteur >= 0 ){
        $this->_Compteur = $compteur;
      }
      else{
        throw new Exception("L'attribut compteur doit être un integer non null");
      }
    }

    public function setDate($date){
      if(isset($date) && Outils::estUneDateValide($date)){
        $this->_Date = $date;
      }
      else{
        throw new Exception("L'attribut date doit être non null et une date valide");
      }
    }

    public function setDateU($dateU){
      if(isset($dateU) && Outils::estUneDateValide($dateU)){
        $this->_DateU = $dateU;
      }
      else{
        throw new Exception("L'attribut dateU doit être non null et une date valide");
      }
    }

    public function setUtilisateur($utilisateur){
      try{
        if( isset($utilisateur) && get_class($utilisateur) == "Utilisateur" ){
          $this->_Utilisateur = $utilisateur;
        }
        else{
          throw new \Exception("L'utilisateur doit être une instance de la class Utilisateur et ne doit pas être null");
        }
      }
      catch(Exception $e){
        throw new Exception($e);
      }
    }

    public function setAlbum($album){
      try{
        if( isset($album) && get_class($album) == "Album" ){
          $this->_Album = $album;
        }
        else{
          throw new \Exception("L'album doit être une instance de la class Album et ne doit pas être null");
        }
      }
      catch(Exception $e){
        throw new Exception($e);
      }
    }

    //toString
    public function toString() {
        $msg = "Utilisateur :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "titre : ".$this->_Titre."<br>";
        $msg .= "chemin : ".$this->_Chemin."<br>";
        $msg .= "compteur : ".$this->_Compteur."<br>";
        $msg .= "date : ".$this->_Date."<br>";
        $msg .= "utilisateur : ".$this->_Utilisateur->toString()."<br>";
        $msg .= "album : ".$this->_Album->toString()."<br>";

        return $msg;
    }
}
?>
