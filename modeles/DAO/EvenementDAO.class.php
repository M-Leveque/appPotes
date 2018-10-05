<?php
require_once('modeles/src/DAO/DAO.class.php');
require_once('modeles/src/Evenement.class.php');

//Class Evenement, elle permet de gerer le transfert de donnees entre la
//bdd et l'application.
class EvenementDAO extends DAO{
  public function __construct(){
    DAO::__construct();
  }

  public function get($id){

    if($id == null || $id <0 || !is_int($id) ){
        return false;
    }

    //Requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Evenement WHERE Id_E = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);
    if($ligne){
      return new Evenement(intval($ligne->Id_E), $ligne->Titre_E, $ligne->Description_E, $ligne->DateCreation_E, $ligne->DateHeureFin_E, intval($ligne->Archiver_E), intval($ligne->Id_U), intval($ligne->Id_Em));
    }
    else{return false;}
  }

  public function getAll(){

    //initialisation compteur
    $i = 0;

    //Requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Evenement");
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);

    while($ligne){
      $evenements[$i] =  new Evenement(intval($ligne->Id_E), $ligne->Titre_E, $ligne->Description_E, $ligne->DateCreation_E, $ligne->DateHeureFin_E, intval($ligne->Archiver_E), intval($ligne->Id_U), intval($ligne->Id_Em));
      $i++;
      $ligne = $stmt->fetch(PDO::FETCH_OBJ);
    }

    return $evenements;
  }

  //La function set permet de modifier la BDD
  public function set($evenement){
    //Verif de la variable $evenement
    if($evenement == null || !is_object($evenement)){
      return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("UPDATE Evenement SET Titre_E= :titre, Description_E= :description, DateCreation_E= :dateC, DateHeureFin_E=:dateTime, Archiver_E= :archiver, Id_U= :idU, Id_Em= :idEm WHERE Id_E = :id");
    $stmt->bindValue(':titre', $evenement->getTitre(), PDO::PARAM_STR);
    $stmt->bindValue(':description', $evenement->getDescription(), PDO::PARAM_STR);
    $stmt->bindValue(':dateC', $evenement->getDateC(), PDO::PARAM_STR);
    $stmt->bindValue(':dateTime', $evenement->getDateTime(), PDO::PARAM_STR);
    $stmt->bindValue(':archiver', intval($evenement->getArchiver()), PDO::PARAM_INT);
    $stmt->bindValue(':idU', intval($evenement->getIdUtilisateur()), PDO::PARAM_INT);
    $stmt->bindValue(':idEm',intval($evenement->getIdEmoticon()), PDO::PARAM_INT);
    $stmt->bindValue(':id', intval($evenement->getId()), PDO::PARAM_INT);
    $stmt->execute();
  }

  public function add($evenement){
    if($evenement == null || !is_object($evenement)){
      return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("INSERT INTO Evenement (Id_E, Titre_E, Description_E, DateCreation_E, DateHeureFin_E, Archiver_E, Id_U, Id_Em) VALUES ( :id, :titre, :description, :dateC, :dateTime, :archiver, :idU, :idEm)");
    $stmt->bindValue(':titre', $evenement->getTitre(), PDO::PARAM_STR);
    $stmt->bindValue(':description', $evenement->getDescription(), PDO::PARAM_STR);
    $stmt->bindValue(':dateC', $evenement->getDateC(), PDO::PARAM_STR);
    $stmt->bindValue(':dateTime', $evenement->getDateTime(), PDO::PARAM_STR);
    $stmt->bindValue(':archiver', intval($evenement->getArchiver()), PDO::PARAM_INT);
    $stmt->bindValue(':idU', intval($evenement->getIdUtilisateur()), PDO::PARAM_INT);
    $stmt->bindValue(':idEm',intval($evenement->getIdEmoticon()), PDO::PARAM_INT);
    $stmt->bindValue(':id', intval($evenement->getId()), PDO::PARAM_INT);
    $stmt->execute();

  }

  public function delete($id){
    if($id == null || $id <0 || !is_int($id) ){
        return false;
    }

    //Requete SQL
    $stmt = $this->cnx->prepare("DELETE FROM Evenement WHERE Id_E = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
}
