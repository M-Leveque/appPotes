<?php
class Message
{
    private $_Id;
    private $_Contenu;
    private $_IdE;
    private $_IdU;

    public function __construct($id, $contenu, $idE, $idU){
        $this->setId($id);
        $this->setContenu($contenu);
        $this->setIdE($idE);
        $this->setIdU($idU);
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

    public function getIdE(){
        return $this->_IdE;
    }

    public function getIdU(){
        return $this->_IdU;
    }

    //-------------------------------
    //-----| Liste des setters |-----
    //-------------------------------

    public function setId($id){
        if(isset($id) && is_int($id) && $id >= 0 )
            $this->_Id = $id;
        else
            throw new Exception("L'id doit être un integer non null > 0");
    }


    public function setContenu($contenu){
        if(isset($contenu))
            $this->_Contenu = $contenu;
        else
            throw new Exception("Le contenu ne peux pas être null");
    }

    public function setIdE($idE){

        if(is_int($idE) && $idE >=0)
            $this->_IdE = $idE;
        else
            throw new Exception("L'id evenement doit être un integer > 0 non null");
    }

    public function setIdU($idU){

        if(is_int($idU) && $idU >=0)
            $this->_IdU = $idU;
        else
            throw new Exception("L'id utilisateur doit être un integer > 0 non null");

    }


    //------------------------------
    //-----| Methode toString |-----
    //------------------------------

    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "contenu : ".$this->_Contenu."<br><br>";
        $msg .= "id Evenement : ".$this->_IdE."<br><br>";
        $msg .= "id Utilisateur : ".$this->_IdU."<br>";

        return $msg;
    }
}
?>
