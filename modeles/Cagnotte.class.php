<?php 
//-----------------------------------------------------
//-----------------| Class cagnotte |------------------
//-----------------------------------------------------

class Cagnotte
{
    private $_Id;
    private $_Titre;
    private $_Description;
    private $_DateFin;
    
    public function __construct($id, $titre, $description, $dateFin){
        $this->_Id = $id;
        $this->_Titre = $titre;
        $this->_Description = $description;
        $this->_DateFin = $dateFin;
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
    
    public function getDatefin(){
        return $this->_DateFin;
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
    
    public function setDatefin($dateFin){
        return $this->_DateFin = $dateFin;
    }
    
    
    //------------------------------
    //-----| Methode toString |-----
    //------------------------------
    
    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "titre : ".$this->_Titre."<br>";
        $msg .= "description : ".$this->_Description."<br>";
        $msg .= "date de fin : ".$this->_DateFin."<br>";
        
        return $msg;
    }
}
?>