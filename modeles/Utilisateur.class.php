<?php 
//-----------------------------------------------------
//-------------------| Class Utilisateur |-------------
//-----------------------------------------------------

class Utilisateur
{
    private $_Id;
    private $_Niveau;
    private $_Mail;
    private $_Mdp;
    private $_Pseudo;
    private $_Photo;
    
    public function __construct($id, $niveau, $mail, $mdp, $pseudo, $photo){
        $this->_Id = $id;
        $this->_Niveau = $niveau;
        $this->_Mail = $mail;
        $this->_Mdp = $mdp;
        $this->_Pseudo = $pseudo;
        $this->_Photo = $photo;
    }
    
    //-------------------------------
    //-----| Liste des getters |-----
    //-------------------------------
    
    public function getId(){
        return $this->_Id;
    }
    
    public function getNiveau(){
        return $this->_Niveau;
    }
    
    public function getMail(){
        return $this->_Mail;
    }
    
    public function getMdp(){
        return $this->_Mdp;
    }
    
    public function getPseudo(){
        return $this->_Pseudo;
    }
    
    public function getPhoto(){
        return $this->_Photo;
    }

    
    //-------------------------------
    //-----| Liste des setters |-----
    //-------------------------------
    
    public function setId($id){
        $this->_Id = $id;
    }
    
    public function setNiveau($niveau){
         $this->_Niveau = $niveau;
    }
    
    public function setMail($mail){
        $this->_Mail = $mail;
    }
    
    public function setMdp($mdp){
        $this->_Mdp = $mdp;
    }
    
    public function setPseudo($pseudo){
        $this->_Pseudo = $pseudo;
    }
    
    public function setPhoto($photo){
        $this->_Photo = $photo;
    }
    
    //------------------------------
    //-----| Methode toString |-----
    //------------------------------
    
    public function toString() {
        $msg = "Utilisateur :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "niveau : ".$this->_Niveau."<br>";
        $msg .= "mail : ".$this->_Mail."<br>";
        $msg .= "mdp : ".$this->_Mdp."<br>";
        $msg .= "pseudo : ".$this->_Pseudo."<br>";
        $msg .= "photo : ".$this->_Photo."<br>";
        
        return $msg;
    }
}
?>