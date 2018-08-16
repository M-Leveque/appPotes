<?php 
//-----------------------------------------------------
//-------------------| Class Evenement |-------------------
//-----------------------------------------------------

//On inclut la classe utilisateur
include('Utilisateur.class.php');

//On inclut la classe DAO
include('DAO.class.php');

class Evenement
{
    private $_Id;
    private $_Titre;
    private $_Description;
    private $_Date;
    private $_IdUtilisateur;
    
    public function __construct($id, $titre, $description, $date, $idUtilsateur){
        $this->_Id = $id;
        $this->_Titre = $titre;
        $this->_Description = $description;
        $this->_Date = $date;
        $this->_IdUtilisateur = $idUtilsateur;
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
        $dao = new DAO();
        return $dao->getUtilsateur($this->_IdUtilisateur);
    }
    
    //-------------------------------
    //-----| Liste des setters |-----
    //-------------------------------
    
    public function setId($id){
        return $this->_Id = $id;
    }
    
    public function setNom($nom){
        return $this->_Nom = $nom;
    }
    
    //------------------------------
    //-----| Methode toString |-----
    //------------------------------
    
    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "nom : ".$this->_Nom."<br>";
        
        return $msg;
    }
}
?>