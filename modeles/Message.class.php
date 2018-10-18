<?php
class Message
{
    private $_Id;
    private $_Contenu;
    private $_idE;
    private $_idU;

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
        return $this->_idE;
    }

    public function getIdU(){
        return $this->_idU;
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
            $this->_idE = $idE;
        else
          throw new Exception("L'evenement doit être une instance de la class Evenement");
    }

    public function setUtilisateur($utilisateur){

        if(get_class($utilisateur) == "Utilisateur")
            $this->_Utilisateur = $utilisateur;
        else
          throw new Exception("L'utilisateur doit être une instance de la class Utilisateur");

    }


    //------------------------------
    //-----| Methode toString |-----
    //------------------------------

    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "contenu : ".$this->_Contenu."<br><br>";
        $msg .= "id Evenement : ".$this->_idE."<br><br>";
        $msg .= "utilisateur : ".$this->_idU."<br>";

        return $msg;
    }
}
?>
