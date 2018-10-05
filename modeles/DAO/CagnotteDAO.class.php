<?php
require_once('modeles/src/DAO/DAO.class.php');
require_once('modeles/src/Cagnotte.class.php');

//Class Cagnotte, elle permet de gerer le transfert de donnees entre la
//bdd et l'application.
class CagnotteDAO extends DAO{
  public function __construct(){
    DAO::__construct();
  }

  public function get($id){

    if($id == null || $id <0 || !is_int($id) ){
        return false;
    }

    //Requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Cagnotte WHERE Id_C = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);
    if($ligne){
      return new Cagnotte(intval($ligne->Id_C), $ligne->Titre_C, $ligne->Description_C, $ligne->DateHeureFin_C, intval($ligne->ArgentR_C), intval($ligne->Id_E) );
    }
    else{return false;}
  }

  public function getAll(){

    //initialisation compteur
    $i = 0;

    //Requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Cagnotte");
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);
    if($ligne){
        while($ligne){
          $cagnottes[$i] =  new Cagnotte(intval($ligne->Id_C), $ligne->Titre_C, $ligne->Description_C, $ligne->DateHeureFin_C, intVal($ligne->ArgentR_C), intval($ligne->Id_E));
          $i++;
          $ligne = $stmt->fetch(PDO::FETCH_OBJ);
        }
        return true;
    }
    else{return false;}
  }

  //La function set permet de modifier la BDD
  public function set($cagnotte){
    //Verif de la variable $evenement
    if($cagnotte == null || !is_object($cagnotte)){
      return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("UPDATE Cagnotte SET Titre_C= :titre, Description_C= :description, DateHeureFin_C= :dateHeureFin, ArgentR_C= :argentR, Id_E= :idE WHERE Id_C = :id");
    $stmt->bindValue(':titre', $cagnotte->getTitre(), PDO::PARAM_STR);
    $stmt->bindValue(':description', $cagnotte->getDescription(), PDO::PARAM_STR);
    $stmt->bindValue(':dateHeureFin', $cagnotte->getDateHeurefin(), PDO::PARAM_STR);
    $stmt->bindValue(':argentR', intval($cagnotte->getArgentR()), PDO::PARAM_STR);
    $stmt->bindValue(':idE', intval($cagnotte->getIdE()), PDO::PARAM_STR);
    $stmt->bindValue(':id', intval($cagnotte->getId()), PDO::PARAM_STR);
    $stmt->execute();
  }

  public function add($cagnotte){
    if($cagnotte != null && is_object($cagnotte)){

      //requete SQL
      $stmt = $this->cnx->prepare("INSERT INTO Cagnotte (Id_C, Titre_C, Description_C, DateHeureFin_C, ArgentR_C, Id_E) VALUES ( :id, :titre, :description, :dateHeureFin, :argentR, :idE)");
      $stmt->bindValue(':titre', $cagnotte->getTitre(), PDO::PARAM_STR);
      $stmt->bindValue(':description', $cagnotte->getDescription(), PDO::PARAM_STR);
      $stmt->bindValue(':dateHeureFin', $cagnotte->getDateHeurefin(), PDO::PARAM_STR);
      $stmt->bindValue(':argentR', $cagnotte->getArgentR(), PDO::PARAM_STR);
      $stmt->bindValue(':idE', $cagnotte->getIdE(), PDO::PARAM_STR);
      $stmt->bindValue(':id', $cagnotte->getId(), PDO::PARAM_STR);
      $stmt->execute();
    }
  }

  public function delete($id){
    if($id != null && $id > 0 && is_int($id) ){

      //Requete SQL
      $stmt = $this->cnx->prepare("DELETE FROM Cagnotte WHERE Id_C = :id");
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
    }
  }
}