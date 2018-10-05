<?php
//-----------------------------------------------------
//-------------------| Class Utilisateur |-------------
//-----------------------------------------------------
include_once('modeles/src/Outils.class.php');

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


    //Setteurs -----
    public function setId($id){

      //Verif $id
      if(is_int($id) && $id >= 0){
        $this->_Id = $id;
      }
    }

    public function setNiveau($niveau){

      //Verif $niveau
      if ( $niveau === 0 ||  $niveau === 1 ||  $niveau === 2 ){
         $this->_Niveau = $niveau;
      }
    }

    public function setMail($mail){

      //Verif $mail
      if (Outils::estUneAdrMailValide($mail)){
        $this->_Mail = $mail;
      }
    }

  	public function setMdp($mdp){
      if(strlen($mdp) < 50 ){
        $this->_Mdp = password_hash($mdp, PASSWORD_DEFAULT);
      }
    }

    public function setPseudo($pseudo){
      //verif $pseudo
      if ( strlen($pseudo) <=  20){
        $this->_Pseudo = $pseudo;
      }
    }

    public function setPhoto($photo){
        $this->_Photo = $photo;
    }

    public function setTmp($tmp){
      if(is_bool($tmp)){
        $this->_Tmp = $tmp;
      }
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