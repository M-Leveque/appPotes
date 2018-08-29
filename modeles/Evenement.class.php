<?php 
//-----------------------------------------------------
//-------------------| Class Evenement |-------------------
//-----------------------------------------------------

//On inclut la classe utilisateur
include_once('Utilisateur.class.php');

class Evenement
{
    private $_Id;
    private $_Titre;
    private $_Description;
    private $_Date;
    private $_Utilisateur;
    
    public function __construct($id, $titre, $description, $date, $Utilisateur){
        $this->_Id = $id;
        $this->_Titre = $titre;
        $this->_Description = $description;
        $this->_Date = $date;
        $this->_Utilisateur = $Utilisateur;
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
    
    public function getDate(){
        return $this->_Date;
    }

    public function getUtilisateur(){
        return $this->_Utilisateur;
    }
    
    //-------------------------------
    //-----| Liste des setters |-----
    //-------------------------------
    
    public function setId($id){
        return $this->_Id = $id;
    }
    
    public function setTitre($titre){
        return $this->_Titre = $titre;
    }
    
    public function setDescription($description){
        return $this->_Description = $description;
    }
    
    public function setDate($date){
        return $this->_Date = $date;
    }
    
    public function setUtilisateur($utilisateur){
        return $this->_Utilisateur = $utilisateur;
    }
   
    //------------------------------
    //-----| Methode toString |-----
    //------------------------------
    
    public function toString() {
        $msg = "Evenement :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "titre : ".$this->_Titre."<br>";
        $msg .= "description : ".$this->_Description."<br>";
        $msg .= "date : ".$this->_Date."<br>";
        $msg .= "utilisateur : ".$this->_Utilisateur->toString()."<br>";
        
        return $msg;
    }
}
?>