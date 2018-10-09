<?php
//-----------------------------------------------------
//-------------------| Class Photo |-------------
//-----------------------------------------------------

//On inclut lles class en lien avec photo
include_once('modeles/Outils.class.php');

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

    public function setChemin($chemin){
        $this->_Chemin = $chemin;
    }

    public function setCompteur($compteur){
      //Verif variable $id
      if(is_int($compteur) && $compteur >= 0 ){
        $this->_Compteur = $compteur;
      }
    }

    public function setDate($date){
      if(Outils::estUneDateValide($date)){
        $this->_Date = $date;
      }
    }

    public function setDateU($dateU){
      if(Outils::estUneDateValide($dateU)){
        $this->_DateU = $dateU;
      }
    }

    public function setUtilisateur($utilisateur){
      if(is_int($utilisateur) && $utilisateur > 0 && !is_null($utilisateur)){
        $this->_Utilisateur = $utilisateur;
      }
    }

    public function setAlbum($album){
      if(is_int($album) && $album > 0 && $album != null){
        $this->_Album = $album;
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
        $msg .= "utilisateur : ".$this->_Utilisateur."<br>";
        $msg .= "album : ".$this->_Album."<br>";

        return $msg;
    }
}
?>
