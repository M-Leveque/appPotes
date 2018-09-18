<?php
//-----------------------------------------------------
//-------------------| Class Photo |-------------
//-----------------------------------------------------

//On inclut lles class en lien avec photo
include_once('Outils.class.php');
include_once('Utilisateur.class.php');
include_once('Album.class.php');

class Photo
{
    private $_Id;
    private $_Titre;
    private $_Chemin;
    private $_Compteur;
    private $_Date;
    private $_Utilisateur;
    private $_Album;

    public function __construct($id, $titre, $chemin, $compteur, $date, $utilisateur, $album){

        //Verif variable $id
        if(is_int($id) && $id >= 0 ){
          $this->_Id = $id;
        }

        //Verif variable $titre
        if(strlen($titre) < 20){
          $this->_Titre = $titre;
        }

        $this->_Chemin = $chemin;

        //Verif variable $compteur
        if(is_int($compteur) && $compteur >= 0 ){
          $this->_Compteur = $compteur;
        }

        if(Outils::estUneDateValide($date)){
          $this->_Date = $date;
        }

        if(is_object($utilisateur)){
          $this->_Utilisateur = $utilisateur;
        }

        if(is_object($album)){
          $this->_Album = $album;
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

    public function getChemin(){
        return $this->_Chemin;
    }

    public function getCompteur(){
        return $this->_Compteur;
    }

    public function getDate(){
        return $this->_Date;
    }

    public function getUtilisateur(){
        return $this->_Utilisateur;
    }

    public function getAlbum(){
        return $this->_Album;
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

    public function setChemin($chemin){
        $this->_Chemin = $chemin;
    }

    public function setCompteur($compteur){
      //Verif variable $id
      if(is_int($compteur) && $compteur >= 0 ){
        $this->_Compteur = $compteur;
        $result = "Reussi";
      }
      else
      {
        $result = "Erreur : la donnée doit être un entier supérieur à 0";
      }
      return $result;
    }

    public function setDate($date){
      if(Outils::estUneDateValide($date)){
        $this->_Date = $date;
        $result = "Reussi";
      }
      else{
        $result = "Erreur : la donnée doit être un date valide";
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

    public function setAlbum($album){
      if(is_object($album)){
        $this->_Album = $album;
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
