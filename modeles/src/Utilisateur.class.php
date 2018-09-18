<?php
//-----------------------------------------------------
//-------------------| Class Utilisateur |-------------
//-----------------------------------------------------
include_once('Outils.class.php');

class Utilisateur
{
    private $_Id;
    private $_Niveau;
    private $_Mail;
    private $_Mdp;
    private $_Pseudo;
    private $_Photo;

    public function __construct($id, $niveau, $mail, $mdp, $pseudo, $photo){

      //Verif $id
      if(is_int($id) && $id >= 0 ){
        $this->_Id = $id;
      }

      //Verif $niveau
      if ( $niveau == 0 ||  $niveau == 1 ||  $niveau == 2 ){
        $this->_Niveau = $niveau;
      }

      //Verif $mail
      if (Outils::estUneAdrMailValide($mail)){
        $this->_Mail = $mail;
      }

      //Hashage de $mdp
      $this->_Mdp = password_hash($mdp, PASSWORD_DEFAULT);

      //verif $pseudo
      if ( strlen($pseudo) <  20){
        $this->_Pseudo = $pseudo;
      }

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

      //Verif $id
      if(is_int($id) && $id >= 0 ){
        $this->_Id = $id;
        $result = "Reussi";
      }
      else{
        $result = "Erreur : La donnée doit être un entier supérieur à 0";
      }
      return $result;
    }

    public function setNiveau($niveau){

      //Verif $niveau
      if ( $niveau == 0 ||  $niveau == 1 ||  $niveau == 2 ){
         $this->_Niveau = $niveau;
         $result = "Reussi";
      }
      else{
         $result = "Erreur : Le niveau doit être 0, 1 ou 2";
      }
      return $result;
    }

    public function setMail($mail){

      //Verif $mail
      if (Outils::estUneAdrMailValide($mail)){
        $this->_Mail = $mail;
        $result = "Reussi";
      }
      else{
        $result = "Erreur : Veuillez entrer une adresse mail valide";
      }
      return $result;
    }

  	public function setMdp($mdp){

      //verification du nouveau mdp
      if(password_verify($this->_Mdp, $mdp)){
        $this->_Mdp = $mdp;
        $result = 'Reussi';
      }
      else{
        $result = 'Erreur : mauvais mot de passe';
      }
      return $result;
    }

    public function setPseudo($pseudo){
      //verif $pseudo
      if ( strlen($pseudo) <  20){
        $this->_Pseudo = $pseudo;
        $result = 'Reussi';
      }
      else{
          $result = 'Erreur : Le pseudo doit contenir au maximum 20 caractères';
      }
      return $result;
    }

    public function setPhoto($photo){
        $this->_Photo = $photo;
        return "Reussi";
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
