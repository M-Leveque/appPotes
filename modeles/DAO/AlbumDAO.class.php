<?php
require_once('modeles/src/DAO/DAO.class.php');
require_once('modeles/src/Album.class.php');

//Class Album, elle permet de gerer le transfert de donnees entre la
//bdd et l'application.
class AlbumDAO extends DAO{
  public function __construct(){
    DAO::__construct();
  }

  public function get($id){

    if($id == null || $id <0 || !is_int($id) ){
        return false;
    }

    //Requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Album WHERE Id_A = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);
    if($ligne){
      return new Album(intval($ligne->Id_A), $ligne->Nom_A, boolval($ligne->Priver_A), $ligne->Visuel_A, intval($ligne->Id_E), intval($ligne->Id_U) );
    }
    else{return false;}
  }

  public function getAll(){

    //initialisation compteur
    $i = 0;

    //Requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Album");
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);
    if($ligne){
        while($ligne){
          $albums[$i] =  new Album(intval($ligne->Id_A), $ligne->Nom_A, boolval($ligne->Priver_A), $ligne->Visuel_A, intval($ligne->Id_E), intval($ligne->Id_U) );
          $i++;
          $ligne = $stmt->fetch(PDO::FETCH_OBJ);
        }
        return $albums;
    }
    else{return false;}
  }

  //La function set permet de modifier la BDD
  public function set($album){
    //Verif de la variable $album
    if($album == null || !is_object($album)){
      return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("UPDATE Album SET Nom_A= :nom, Priver_A= :priver, Visuel_A= :visuel, Id_E= :idE, Id_U= :idU WHERE Id_A = :id");
    $stmt->bindValue(':nom', $album->getNom(), PDO::PARAM_STR);
    $stmt->bindValue(':priver', $album->getPriver(), PDO::PARAM_INT);
    $stmt->bindValue(':visuel', $album->getVisuel(), PDO::PARAM_STR);
    $stmt->bindValue(':idE', intval($album->getIdEvenement()), PDO::PARAM_INT);
    $stmt->bindValue(':idU', intval($album->getIdUtilisateur()), PDO::PARAM_INT);
    $stmt->bindValue(':id', intval($album->getId()), PDO::PARAM_INT);
    $stmt->execute();
  }

  public function add($album){
    if($album != null && is_object($album)){

      //requete SQL
      $stmt = $this->cnx->prepare("INSERT INTO Album (Id_A, Nom_A, Priver_A, Visuel_A, Id_E, Id_U) VALUES ( :id, :nom, :priver, :visuel, :idE, :idU)");
      $stmt->bindValue(':nom', $album->getNom(), PDO::PARAM_STR);
      $stmt->bindValue(':priver', boolval($album->getPriver()), PDO::PARAM_INT);
      $stmt->bindValue(':visuel', $album->getVisuel(), PDO::PARAM_STR);
      $stmt->bindValue(':idE', intval($album->getIdEvenement()), PDO::PARAM_INT);
      $stmt->bindValue(':idU', intval($album->getIdUtilisateur()), PDO::PARAM_INT);
      $stmt->bindValue(':id', intval($album->getId()), PDO::PARAM_INT);
      $stmt->execute();
    }
  }

  public function delete($id){
    if($id != null && $id > 0 && is_int($id) ){

      //Requete SQL
      $stmt = $this->cnx->prepare("DELETE FROM Album WHERE Id_A = :id");
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
    }
  }
}