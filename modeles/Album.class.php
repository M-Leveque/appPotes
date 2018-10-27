<?php
//-----------------------------------------------------
//-------------------| Class Album |-------------------
//-----------------------------------------------------

include_once "modeles/Outils.class.php";

class Album
{
    private $_Id;
    private $_Nom;
    private $_Desciption;
    private $_DateCreation;
    private $_Priver;
    private $_Visuel;
    private $_IdE;
    private $_IdU;

    //Constructeurs
    public function __construct($id, $nom, $description, $dateCreation, $priver, $visuel, $idE, $idU){

      $this->setId($id);
      $this->setNom($nom);
      $this->setDescription($description);
      $this->setDateCreation($dateCreation);
      $this->setPriver($priver);
      $this->setvisuel($visuel);
      $this->setidE($idE);
      $this->setIdU($idU);
    }

    //Getteurs

    public function getId(){
        return $this->_Id;
    }

    public function getNom(){
        return $this->_Nom;
    }

    public function getDescription(){
      return $this->_Desciption;
    }

    public function getDateCreation(){
      return $this->_DateCreation;
    }

    public function getPriver(){
        return $this->_Priver;
    }

    public function getVisuel(){
        return $this->_Visuel;
    }

    public function getIdE(){
        return $this->_IdE;
    }

    public function getIdU(){
        return $this->_IdU;
    }

    //Setteurs

    public function setId($id){

      if(isset($id) && is_int($id) && $id >= 0)
        $this->_Id = $id;
      else
        throw new Exception("L'id doit être un integer > 0 non null");

    }

    public function setNom($nom){

      if(is_string($nom) && strlen($nom) <= 50 && isset($nom))
        $this->_Nom = $nom;
      else
        throw new Exception("Le Nom doit être une chaine de caracteres > 50 non null");

    }

    public function setDescription($description){

      if(is_string($description) && strlen($description) <= 255 && isset($description))
        $this->_Desciption = $description;
      else
        throw new Exception("La description n'est pas valid");

    }

    public function setDateCreation($dateCreation){

      if(isset($dateCreation) && Outils::estUneDateValide($dateCreation))
        $this->_DateCreation = $dateCreation;
      else
        throw new Exception("La date de creation doit être une date valide non null");

    }

    public function setPriver($priver){

      if(isset($priver) && is_bool($priver))
        $this->_Priver = $priver;
      else
        throw new Exception("L'attribut priver doit être un booléen");

    }

    public function setvisuel($visuel){

      if(is_string($visuel) && strlen($visuel) <= 255)
        $this->_Visuel = $visuel;
      else
        throw new Exception("L'id doit être un integer > 0 non null");

    }

    public function setIdE($idE){

        if(is_int($idE) && $idE >= 0)
          $this->_IdE = $idE;
        else
            throw new Exception("L'id Evenement doit être un integer > 0");

    }

    public function setIdU($idU){

        if(is_int($idU) && $idU >= 0)
            $this->_IdU = $idU;
        else
            throw new Exception("L'id Utilisateur doit être un integer > 0");
    }

    //------------------------------
    //-----| Methode toString |-----
    //------------------------------

    public function toString() {
        $msg = "Album :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "nom : ".$this->_Nom."<br>";
        $msg .= "priver : ".$this->_Priver."<br>";
        $msg .= "visuel : ".$this->_Visuel."<br>";
        $msg .= "idE : ".$this->_IdE."<br>";
        $msg .= "idU : ".$this->_IdU."<br>";

        return $msg;
    }
}
