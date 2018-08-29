<?php 
//-----------------------------------------------------
//-----------------| Class Message |------------------
//-----------------------------------------------------

//On inclut la classe utilisateur
include_once('Utilisateur.class.php');
include_once('Evenement.class.php');

class Message
{
    private $_Id;
    private $_Contenu;
    private $_Evenement;
    private $_Utilisateur;
    
    public function __construct($id, $contenu, $evenement, $utilisateur){
        $this->_Id = $id;
        $this->_Contenu = $contenu;
        $this->_Evenement = $evenement;
        $this->_Utilisateur = $utilisateur;
    }
    
    //-------------------------------
    //-----| Liste des getters |-----
    //-------------------------------
    
    public function getId(){
        return $this->_Id;
    }
    
    public function getContenu(){
        return $this->_Contenu;
    }
    
    public function getEvenement(){
        return $this->_Evenement;
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
    
    public function setContenu($contenu){
        return $this->_Contenu = $contenu;
    }
    
    public function setEvenement($evenement){
        return $this->_Evenement = $evenement;
    }
    
    public function setUtilisateur($utilisateur){
        return $this->_Utilisateur = $utilisateur;
    }
    
    
    //------------------------------
    //-----| Methode toString |-----
    //------------------------------
    
    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "contenu : ".$this->_Contenu."<br><br>";
        $msg .= "evenement : ".$this->_Evenement->toString()."<br><br>";
        $msg .= "utilisateur : ".$this->_Utilisateur->toString()."<br>";
        
        return $msg;
    }
}
?>