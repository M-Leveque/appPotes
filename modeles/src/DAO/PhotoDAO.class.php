<?php
require_once('modeles/src/DAO/DAO.class.php');
require_once('modeles/src/Photo.class.php');

//Class PhotoDAO, elle permet de gerer le transfert de donnees entre la
//bdd et l'application.
class PhotoDAO extends DAO{

  //Constructeur
  public function __construct(){
    DAO::__construct();
  }

  //Methode de la class PhotoDAO : get / set / add / delete
  //Methode get
  public function get($id){
    //verif $id (si null, superieur a 0 ou autre que integer)
    if($id == null || $id < 0 || !is_int($id) ){
      return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Photo WHERE Id_P = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);

    if($ligne){
      //On return un objet photo a partir des resultats
      return new Photo(intval($ligne->Id_P), $ligne->Titre_P, $ligne->Chemin_P, $ligne->Compteur_P,
                          $ligne->Date_P, $ligne->DateU_P, intval($ligne->Id_User), intval($ligne->Id_Album));
    }
    else{
      return false;
    }
  }

  //Methode getAll()
  public function getAll(){
    //requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Photo");
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);

    //Si aucune ligne n'est retourne alors on retourne false
    if($ligne){

      //On creer un compteur pour assigner les photos au sein du tableau
      $i = 0;

      //On return un tableau de photo
      while($ligne){
        $photos[$i] = new Photo(intval($ligne->Id_P), $ligne->Titre_P, $ligne->Chemin_P, $ligne->Compteur_P,
                            $ligne->Date_P, $ligne->DateU_P, intval($ligne->Id_User), intval($ligne->Id_Album));
        $ligne = $stmt->fetch(PDO::FETCH_OBJ);
      }

      //On retourne le tableau
      return $photos;
    }
    else{return false;}
  }

  //Methode set
  public function set($photo){

    //Verif de la variable $photo
    if($photo == null || !is_object($photo)){
      return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("UPDATE Photo SET Titre_P = :titre, Chemin_P = :chemin, Compteur_P = :compteur, Date_P = :dateP, DateU_P = :dateU, Id_User = :idU, Id_Album = :idA WHERE Id_P = :id");
    $stmt->bindValue(':titre', $photo->getTitre(), PDO::PARAM_STR);
    $stmt->bindValue(':chemin', $photo->getChemin(), PDO::PARAM_STR);
    $stmt->bindValue(':compteur', intval($photo->getCompteur()), PDO::PARAM_INT);
    $stmt->bindValue(':dateP', $photo->getDate(), PDO::PARAM_STR);
    $stmt->bindValue(':dateU', $photo->getDateU(), PDO::PARAM_STR);
    $stmt->bindValue(':idU', $photo->getIdUtilisateur(), PDO::PARAM_INT);
    $stmt->bindValue(':idA', $photo->getIdAlbum(), PDO::PARAM_INT);
    $stmt->bindValue(':id', intval($photo->getId()), PDO::PARAM_INT);
    $stmt->execute();
  }

  public function add($photo){
    //Verif de la variable $photo
    if($photo == null || !is_object($photo)){
      return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("INSERT INTO Photo(Id_P, Titre_P, Chemin_P, Compteur_P, Date_P, DateU_P, Id_User, Id_Album) VALUES (:id ,:titre, :chemin, :compteur, :dateP, :dateU, :idU, :idA)");
    $stmt->bindValue(':titre', $photo->getTitre(), PDO::PARAM_STR);
    $stmt->bindValue(':chemin', $photo->getChemin(), PDO::PARAM_STR);
    $stmt->bindValue(':compteur', intval($photo->getCompteur()), PDO::PARAM_INT);
    $stmt->bindValue(':dateP', $photo->getDate(), PDO::PARAM_STR);
    $stmt->bindValue(':dateU', $photo->getDateU(), PDO::PARAM_STR);
    $stmt->bindValue(':idU', $photo->getIdUtilisateur(), PDO::PARAM_INT);
    $stmt->bindValue(':idA', $photo->getIdAlbum(), PDO::PARAM_INT);
    $stmt->bindValue(':id', intval($photo->getId()), PDO::PARAM_INT);
    $stmt->execute();
  }

  public function delete($id){
    //verif $id (si null, superieur a 0 ou autre que integer)
    if($id == null || $id < 0 || !is_int($id) ){
      return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("DELETE FROM Photo WHERE Id_P = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
}
