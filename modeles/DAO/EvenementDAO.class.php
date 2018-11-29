<?php
include_once ('modeles/DAO/DAO.class.php');
include_once ('modeles/DAO/UtilisateurDAO.class.php');
include_once ('modeles/Evenement.class.php');

//Class Evenement, elle permet de gerer le transfert de donnees entre la
//bdd et l'application.
class EvenementDAO extends DAO{
  public function __construct(){
    DAO::__construct();
  }

  public function get($id){
    if(empty($id) || $id < 0 || !is_int($id) )
        throw new Exception("L'id de l'evenement doit être valide");

    //Requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Evenement, Acces WHERE Evenement.id_E = Acces.id_E AND Acces.id_U = :idU AND Id_E = :idE");
    $stmt->bindValue(':idU', $id, PDO::PARAM_INT);
    $stmt->bindValue(':idE', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);
    if($ligne){

      //Recuperation de l'emoticon selon l'id enregistre dans la bdd
      $emoticonDAO = new EmoticonDAO();
      //On essaye de trouver l'emoticon sinon on transmet l'exception
      try{
        $emoticon = $emoticonDAO->get(intval($ligne->Id_Em));
      }
      catch(Exception $e){
        throw new Exception($e);

      }

      //Recuperation de l'utilisateur selon l'id enregistre dans la bdd
      $utilisateurDAO = new UtilisateurDAO();
      //On essaye de trouver l'utilisateur sinon on transmet l'exception
      try{
        $utilisateur = $utilisateurDAO->get(intval($ligne->Id_U));
      }
      catch(Exception $e){
        throw new Exception($e);

      }

      //Construction de l'evenement
      return new Evenement(intval($ligne->Id_E), $ligne->Titre_E, $ligne->Description_E, $ligne->DateCreation_E, $ligne->DateHeureFin_E, boolval($ligne->Archiver_E), $utilisateur, $emoticon);
    }
    else{
      throw new Exception("L'evenement n'a pas était trouvé");
    }
  }

  public function getAll(){

    //initialisation compteur
    $i = 0;

    //Requete SQL
    $stmt = $this->cnx->prepare("SELECT * FROM Evenement, Acces WHERE Evenement.id_E = Acces.id_E AND Acces.id_U = :idU GROUP BY DateHeureFin_E DESC");
    $stmt->bindValue(':idU', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);

    while($ligne){
        $evenements[$i] =  new Evenement(intval($ligne->Id_E), $ligne->Titre_E, $ligne->Description_E, $ligne->DateCreation_E, $ligne->DateHeureFin_E, boolval($ligne->Archiver_E), intval($ligne->Id_U));
        $i++;
        $ligne = $stmt->fetch(PDO::FETCH_OBJ);
    }

    return $evenements;
  }

    public function getByUser($idU){
        if(empty($idU) || $idU < 0 || !is_int($idU) )
            throw new Exception("L'id de l'evenement doit être valide");

        //Requete SQL
        $stmt = $this->cnx->prepare("SELECT * FROM Evenement, Acces WHERE Evenement.id_E = Acces.id_E AND Acces.Id_U = :idU AND Evenement.Id_U = :idU");
        $stmt->bindValue(':idU', $idU, PDO::PARAM_INT);
        $stmt->execute();
        $ligne = $stmt->fetch(PDO::FETCH_OBJ);

        if($ligne){
            //Construction de l'evenement
            return new Evenement(intval($ligne->Id_E), $ligne->Titre_E, $ligne->Description_E, $ligne->DateCreation_E, $ligne->DateHeureFin_E, boolval($ligne->Archiver_E), intval($ligne->Id_U));
        }
        else{
            throw new Exception("L'evenement n'a pas était trouvé");
        }
    }

  //La function set permet de modifier la BDD
  public function set($evenement){
    //Verif de la variable $evenement
    if($evenement == null || !is_object($evenement)){
      return false;
    }

    //requete SQL
    $stmt = $this->cnx->prepare("UPDATE Evenement 
                                SET Titre_E= :titre, Description_E= :description, DateCreation_E= :dateC, DateHeureFin_E=:dateTime, Archiver_E= :archiver, Id_U= :idU, Id_Em= :idEm 
                                WHERE Id_E = :id");
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