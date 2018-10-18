<?php
//-----------------------------------------------------
//-------------------| Class Utilisateur |-------------
//-----------------------------------------------------
include_once "Outils.class.php";

class Utilisateur
{
    private $_Id;
    private $_Niveau;
    private $_Mail;
    private $_Mdp;
    private $_Pseudo;
    private $_Photo;
    private $_Tmp;

    public function __construct($id, $niveau, $mail, $mdp, $pseudo, $photo, $tmp){
        $this->setId($id);
        $this->setNiveau($niveau);
        $this->setMail($mail);
        $this->setMdp($mdp);
        $this->setPseudo($pseudo);
        $this->setPhoto($photo);
        $this->setTmp($tmp);
    }


    //Getteurs -----
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

    public function getTmp(){
      return $this->_Tmp;
    }


    public function setId($id){

      if(isset($id) && is_int($id) && $id >= 0)
        $this->_Id = $id;
      else
        throw new Exception("L'attribut id doit être un entier > ou = à 0.");

    }

    public function setNiveau($niveau){

      if ( $niveau === 0 ||  $niveau === 1 ||  $niveau === 2 )
         $this->_Niveau = $niveau;
      else
        throw new Exception("L'attribut niveau doit être = à 0, 1 ou 2.");

    }

    public function setMail($mail){

      if (isset($mail) && Outils::estUneAdrMailValide($mail))
        $this->_Mail = $mail;
      else
        throw new Exception("L'attribut mail doi être une addresse mail valide");

    }

  	public function setMdp($mdp){

      if(strlen($mdp) < 70 && isset($mdp))
        $this->_Mdp = $mdp;
      else
        throw new Exception("L'attribut mdp doit être < à 50.");

    }

    public function setPseudo($pseudo){

      if ( strlen($pseudo) <=  20 && $pseudo)
        $this->_Pseudo = $pseudo;
      else
        throw new Exception("L'attribut pseudo doit être < ou = à 20.");

    }

    public function setPhoto($photo){

      if ( isset($photo) )
        $this->_Photo = $photo;
      else
        throw new Exception("L'attribut photo doit être non null");

    }

    public function setTmp($tmp){

      if( is_bool($tmp) )
        $this->_Tmp = $tmp;
      else
        throw new Exception("L'attribut Tmp doit être un boolean.");

    }

    //toString
    public function toString() {
        $msg = "Utilisateur :<br>";
        $msg .= "id : ".$this->_Id."<br>";
        $msg .= "niveau : ".$this->_Niveau."<br>";
        $msg .= "mail : ".$this->_Mail."<br>";
        $msg .= "mdp : ".$this->_Mdp."<br>";
        $msg .= "pseudo : ".$this->_Pseudo."<br>";
        $msg .= "photo : ".$this->_Photo."<br>";
        $msg .= "tmp : ".$this->_Tmp."<br>";

        return $msg;
    }
}
?>
