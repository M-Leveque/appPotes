<?php
require_once('modeles/src/DAO/DAO.class.php');
require_once('modeles/src/Message.class.php');

//Class Message DAO permet la gestion des messages avec la bdd
class MessageDAO extends DAO{

  //Constructeur
  public function __construct(){
    DAO::__construct();
  }

  //La function get recupere les données lie a 1 messsage
  public function get($id){
    //Verid du param $id
    if($id == null || $id < 0 || !is_int($id) ){
     return false;
    }

    //Requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Message WHERE Id_M = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);

    if($ligne){
      //On return un objet photo a partir des resultats
      return new Message(intval($ligne->Id_M), $ligne->Contenu_M, intval($ligne->Id_E), intval($ligne->Id_U));
    }
    else{
      return false;
    }
  }

  //La function getforEvent() return tous les messages lie a un evenement par ordre chronologique
  public function getForEvent($idE){
    //Verid du param $id
    if($idE == null || $idE < 0 || !is_int($idE) ){
     return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Message WHERE Id_E = :id");
    $stmt->bindValue(':id', $idE, PDO::PARAM_INT);
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);

    //Si aucune ligne n'est retourne alors on retourne false
    if($ligne){

      //On creer un compteur pour assigner les messages au sein du tableau
      $i = 0;

      //On return un tableau de messages
      while($ligne){
        $messages[$i] = new Message(intval($ligne->Id_M), $ligne->Contenu_M, intval($ligne->Id_E), intval($ligne->Id_U));
        $ligne = $stmt->fetch(PDO::FETCH_OBJ);
      }

      //On retourne le tableau
      return $messages;
    }
    else{return false;}
  }

  //la function add ajoute un message dans la bdd
  public function add($message){
    //Verif de la variable $photo
    if($message == null || !is_object($message)){
      return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("INSERT INTO Message(Id_M, Contenu_M, Id_E, Id_U) VALUES (:id ,:contenu, :idE, :idU)");
    $stmt->bindValue(':id', $message->getId(), PDO::PARAM_INT);
    $stmt->bindValue(':contenu', $message->getContenu(), PDO::PARAM_STR);
    $stmt->bindValue(':idE', intval($message->getIdEvenement()), PDO::PARAM_INT);
    $stmt->bindValue(':idU', $message->getIdUtilisateur(), PDO::PARAM_STR);
    $stmt->execute();
  }

  //la function delete supprime un message dans la bdd
  public function delete($id){
    //Verid du param $id
    if($id == null || $id < 0 || !is_int($id) ){
     return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("DELETE FROM Message WHERE Id_M = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
}
