<?php
require_once('modeles/src/DAO/DAO.class.php');
require_once('modeles/src/Emoticon.class.php');

//Class Emoticon, elle permet de gerer le transfert de donnees entre la
//bdd et l'application.
class EmoticonDAO extends DAO{
  public function __construct(){
    DAO::__construct();
  }

  public function get($id){

    if($id == null || $id <0 || !is_int($id) ){
        return false;
    }

    //Requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Emoticon WHERE Id_Em = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);
    if($ligne){
      return new Emoticon(intval($ligne->Id_Em), $ligne->Titre_Em, $ligne->Chemin_Em );
    }
    else{return false;}
  }

  //La function set permet de modifier la BDD
  public function set($emoticon){
    //Verif de la variable $evenement
    if($emoticon == null || !is_object($emoticon)){
      return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("UPDATE Emoticon SET Titre_Em= :titre, Chemin_Em= :chemin WHERE Id_Em = :id");
    $stmt->bindValue(':titre', $emoticon->getTitre(), PDO::PARAM_STR);
    $stmt->bindValue(':chemin', $emoticon->getChemin(), PDO::PARAM_STR);
    $stmt->bindValue(':id', $emoticon->getId(), PDO::PARAM_STR);
    $stmt->execute();
  }

  public function add($emoticon){
    if($emoticon != null || is_object($emoticon)){

      //requete SQL
      $stmt = $this->cnx->prepare("INSERT INTO Emoticon (Id_Em, Titre_Em, Chemin_Em) VALUES ( :id, :titre, :chemin)");
      $stmt->bindValue(':titre', $emoticon->getTitre(), PDO::PARAM_STR);
      $stmt->bindValue(':chemin', $emoticon->getChemin(), PDO::PARAM_STR);
      $stmt->bindValue(':id', intval($emoticon->getId()), PDO::PARAM_INT);
      $stmt->execute();
    }
  }

  public function delete($id){
    if($id != null || $id > 0 || is_int($id) ){

      //Requete SQL
      $stmt = $this->cnx->prepare("DELETE FROM Emoticon WHERE Id_Em = :id");
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
    }
  }
}
