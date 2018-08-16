<?php 
//-----------------------------------------------------
//-------------------| Class Album |-------------------
//-----------------------------------------------------

class Album
{
    private $_Id;
    private $_Nom;
    
    public function __construct($id, $nom){
        $this->_Id = $id;
        $this->_Nom = $nom;
    }
    
    //-------------------------------
    //-----| Liste des getters |-----
    //-------------------------------
    
    public function getId(){
        return $this->_Id;
    }
    
    public function getNom(){
        return $this->_Nom;
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