<?php
require_once ('DAO.class.php');
require_once ('../Acces.class.php');

//Class AccesDAO, elle permet de gerer le transfert de donnees entre la
//bdd et l'application.
class AccesDAO extends DAO{
  
  public function __construct(){
    DAO::__construct();
  }

  //Recupere l'acces aux evenements
  public function getAll($idU){
    if(is_int($idU) && $idU >= 0){

      //initialisation compteur
      $i = 0;
      $acces = null;

      $stmt = $this->cnx->prepare("SELECT * FROM Acces WHERE Id_U = :idU ");
      $stmt->bindValue(":idU", $idU, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_OBJ);

      while($result){
        $acces[$i] =  new Acces(intVal($result->Id_U), intVal($result->Id_E));
        $i++;
        $result = $stmt->fetch(PDO::FETCH_OBJ);
      }

      return $acces;
    }
  }

  //Defini un acces a un evenement
  public function add($idU, $idE){
    if($idU != null && $idU > 0 && is_int($idU) && $idE != null && $idE > 0 && is_int($idE) ){

      $stmt = $this->cnx->prepare(" INSERT INTO Acces(Id_U, Id_E) VALUES (:idU, :idE) ");
      $stmt->bindValue(":idU", $idU, PDO::PARAM_INT);
      $stmt->bindValue(":idE", $idE, PDO::PARAM_INT);

      if ($stmt->execute()){
        return true;
      }
      else{
        return false;
      }
    }
  }

  //Supprime l'acces a un evenement

  public function delete($idU, $idE){
    if($idU != null && $idU > 0 && is_int($idU) && $idE != null && $idE > 0 && is_int($idE) ){
      $stmt = $this->cnx->prepare(" DELETE FROM Acces WHERE Id_E = :idE AND Id_U = :idU");
      $stmt->bindValue(":idU", $idU, PDO::PARAM_INT);
      $stmt->bindValue(":idE", $idE, PDO::PARAM_INT);
      if ($stmt->execute()){
        return true;
      }
      else{
        return false;
      }
    }
  }
}
