<?php
include_once('modeles/DAO/DAO.class.php');
include_once('modeles/Album.class.php');

//Class Album, elle permet de gerer le transfert de donnees entre la
//bdd et l'application.
class AlbumDAO extends DAO{
  public function __construct(){
    DAO::__construct();
  }

  //------------------------------------------- Reception BDD ----------------------------------------------------------

  //Return le nom et l'image des albums
  public function getInfosBase(){

      //initialisation compteur

      $infos = [];

      //Requete SQL
      $stmt = $this->cnx->prepare("SELECT Id_A, Nom_A, Visuel_A FROM Album");
      $stmt->execute();
      $ligne = $stmt->fetch(PDO::FETCH_OBJ);

      if($ligne){
          $i = 0;

          while($ligne){

              $infos[$i] = array(intval($ligne->Id_A), $ligne->Nom_A, $ligne->Visuel_A);
              $i++;
              $ligne = $stmt->fetch(PDO::FETCH_OBJ);
          }
          return $infos;
      }
      else{return false;}
  }

  public function get($id){

    if(empty($id) || $id < 0 || !is_int($id) )
        throw new Exception("L'id de l'album doit être valide");

    //Requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Album WHERE Id_A = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);
    if($ligne){

      return new Album(intval($ligne->Id_A), $ligne->Nom_A, $ligne->Description_A, $ligne->DateCreation_A, boolval($ligne->Priver_A), $ligne->Visuel_A, intval($ligne->Id_E), intval($ligne->Id_U));
    }
    else{
      throw new Exception("L'album n'a pas était trouvé");
    }
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

            $albums[$i] =  new Album(intval($ligne->Id_A), $ligne->Nom_A, $ligne->Description_A, $ligne->DateCreation_A, boolval($ligne->Priver_A), $ligne->Visuel_A, $ligne->Id_E, $ligne->Id_U);
            $i++;
            $ligne = $stmt->fetch(PDO::FETCH_OBJ);
        }
        return $albums;
    }
    else{return false;}
  }

  //-------------------------------------------- Envoi BDD -------------------------------------------------------------
  //La function set permet de modifier la BDD
  public function set($album){

      if($album == null || get_class($album) != "Album")
          return false;


      //requete SQL
      $stmt = $this->cnx->prepare("UPDATE Album SET Nom_A= :nom, Description_A = :description, DateCreation_A = :dateCreation, Priver_A= :priver, Visuel_A= :visuel, Id_E= :idE, Id_U= :idU WHERE Id_A = :id");
      $stmt->bindValue(':nom', $album->getNom(), PDO::PARAM_STR);
      $stmt->bindValue(':description', $album->getDescription(), PDO::PARAM_STR);
      $stmt->bindValue(':dateCreation', $album->getDateCreation(), PDO::PARAM_STR);
      $stmt->bindValue(':priver', $album->getPriver(), PDO::PARAM_INT);
      $stmt->bindValue(':visuel', $album->getVisuel(), PDO::PARAM_STR);
      $stmt->bindValue(':idE', intval($album->getIdE()), PDO::PARAM_INT);
      $stmt->bindValue(':idU', intval($album->getIdU()), PDO::PARAM_INT);
      $stmt->bindValue(':id', intval($album->getId()), PDO::PARAM_INT);
      return $stmt->execute();

  }

  public function add($album){

      if($album == null || get_class($album) != "Album")
          return false;


      //requete SQL
      $stmt = $this->cnx->prepare("INSERT INTO Album (Id_A, Nom_A, Description_A, DateCreation_A, Priver_A, Visuel_A, Id_E, Id_U) VALUES ( :id, :nom, :description, :dateCreation, :priver, :visuel, :idE, :idU)");
      $stmt->bindValue(':nom', $album->getNom(), PDO::PARAM_STR);
      $stmt->bindValue(':description', $album->getDescription(), PDO::PARAM_STR);
      $stmt->bindValue(':dateCreation', $album->getDateCreation(), PDO::PARAM_STR);
      $stmt->bindValue(':priver', boolval($album->getPriver()), PDO::PARAM_INT);
      $stmt->bindValue(':visuel', $album->getVisuel(), PDO::PARAM_STR);
      $stmt->bindValue(':idE', intval($album->getIdE()), PDO::PARAM_INT);
      $stmt->bindValue(':idU', intval($album->getIdU()), PDO::PARAM_INT);
      $stmt->bindValue(':id', intval($album->getId()), PDO::PARAM_INT);
      return $stmt->execute();
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
