<?php 
//-----------------------------------------------------
//-------------------| Class Photo |-------------
//-----------------------------------------------------

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
        $this->_Id = $id;
        $this->_Titre = $titre;
        $this->_Chemin = $chemin;
        $this->_Compteur = $compteur;
        $this->_Date = $date;
        $this->_Utilisateur = $utilisateur;
        $this->_Album = $album;
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
        $this->_Id = $id;
    }
    
    public function setTitre($titre){
         $this->_Titre = $titre;
    }
    
    public function setChemin($chemin){
        $this->_Chemin = $chemin;
    }
    
    public function setCompteur($compteur){
        $this->_Compteur = $compteur;
    }
    
    public function setDate($date){
        $this->_Date = $date;
    }
    
    public function setUtilisateur($utilisateur){
        $this->_Utilisateur = $utilisateur;
    }
    
    public function setAlbum($album){
        $this->_Album = $album;
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