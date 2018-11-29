<?php
include_once "modeles/DAO/DAO.class.php";
include_once "modeles/Utilisateur.class.php";

class UtilisateurDAO extends DAO{

  public function __construct(){
    DAO::__construct();
  }

  public function login($email, $password) {

    // L�utilisation de d�clarations emp�che les injections SQL
    $stmt = $this->cnx->prepare("SELECT Id_U, Niveau_U, Pseudo_U, Mdp_U FROM Utilisateur WHERE Mail_U = :mail LIMIT 1");
    $stmt->bindValue(':mail', $email, PDO::PARAM_STR);  // Lie "$email" aux param�tres.
    $stmt->execute();    // Ex�cute la d�claration.
    $ligne = $stmt->fetch(PDO::FETCH_OBJ);

    if($ligne){
      // Verifie si les deux mots de passe sont les memes
      // Le mot de passe que l utilisateur a donne.
      if (password_verify($password, $ligne->Mdp_U)) {
          // Le mot de passe est correct!

          // Protection XSS car nous pourrions conserver cette valeur
          $ligne->Id_U = preg_replace("/[^0-9]+/", "", $ligne->Id_U);
          $_SESSION['user_id'] = $ligne->Id_U;
          $_SESSION['user_type'] = intval($ligne->Niveau_U);

          // Protection XSS car nous pourrions conserver cette valeur
          $ligne->Pseudo_U = preg_replace("/[^a-zA-Z0-9_\-]+/","",$ligne->Pseudo_U);
          $_SESSION['username'] = $ligne->Pseudo_U;

          // Ouverture de session reussie.
          return true;

      } else {

          //Le mot de passe est mauvais
          return false;
      }
    }
    else{
      throw new Exception("Aucun utilisateur trouvé");
    }
  }

  //---------------------------------------------------------------------------------------------------------------------
  //--------------------------------------------- Fonctions Utilisateurs ---------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------

  public function get($id){

      //On verifie si la donnees rentree est non null, de type integer et si elle est superieur a 0
      if(isset($id) && is_int($id) && $id > 0){

        // Requete SQL
        $stmt = $this->cnx->prepare("SELECT * FROM Utilisateur WHERE Id_U = :id LIMIT 1");
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();    // Execute la declaration
        $ligne = $stmt->fetch(PDO::FETCH_OBJ);

        //Si on obtient un resultat
        if($ligne){
          // Construction d'un nouvel utilsateur avec les donnees de la BDD
          $utilisateur = new Utilisateur(intval($ligne->Id_U), intval($ligne->Niveau_U), $ligne->Mail_U, $ligne->Mdp_U, $ligne->Pseudo_U, $ligne->Photo_U, boolval($ligne->Tmp) );
          return $utilisateur;
        }
        else{
          throw new Exception("Aucun utilisateur trouvé");
        }
      }
      else{
        throw new Exception("L'id de l'utilisateur doit être valide");
      }
  }

  public function getAllUser(){
      //init compteur
      $i = 0;

      // Requete SQL
      $stmt = $this->cnx->prepare("SELECT * FROM Utilisateur");
      $stmt->execute();    // Execute declaration
      $ligne = $stmt->fetch(PDO::FETCH_OBJ);

      if($ligne){

        while($ligne) {
          // Construction des utilisateurs
          $utilisateurs[$i] = new Utilisateur(intval($ligne->Id_U), intval($ligne->Niveau_U), $ligne->Mail_U, $ligne->Mdp_U, $ligne->Pseudo_U, $ligne->Photo_U, boolval($ligne->Tmp) );
          $i++;

          $ligne =  $stmt->fetch(PDO::FETCH_OBJ);
        }

        return $utilisateurs;
      }
      else{
        return false;
      }
  }

  public function set($utilisateur){
    try{
      if(isset($utilisateur) && get_class($utilisateur) == "Utilisateur"){
        // Requete SQL
        $stmt = $this->cnx->prepare("UPDATE Utilisateur SET Niveau_U = :Niveau, Mail_U = :Mail, Pseudo_U = :Pseudo, Photo_U = :Photo, Tmp = :Tmp WHERE Id_U = :id");
        $stmt->bindValue(':id', intval($utilisateur->getId()), PDO::PARAM_INT);
        $stmt->bindValue(':Niveau', $utilisateur->getNiveau(), PDO::PARAM_STR);
        $stmt->bindValue(':Mail', $utilisateur->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':Pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);
        $stmt->bindValue(':Photo', $utilisateur->getPhoto(), PDO::PARAM_STR);
        $stmt->bindValue(':Tmp', intval($utilisateur->getTmp()), PDO::PARAM_INT);
        return $stmt->execute();    // Ex�cute la d�claration
      }
      else{
        throw new \Exception("L'utilisateur doit être non null et une instance de la classe Utilisateur");
      }
    }
    catch(Exception $e){
      throw new Exception($e);
    }
  }

  public function add($utilisateur){
    try{
      if(isset($utilisateur) && get_class($utilisateur) == "Utilisateur"){
        $stmt = $this->cnx->prepare("INSERT INTO Utilisateur(Id_U, Niveau_U, Mail_U, Mdp_U, Pseudo_U, Photo_U, Tmp) VALUES (:id, :Niveau, :Mail, :Mdp, :Pseudo, :Photo, :Tmp)");
        $stmt->bindValue(':id', intval($utilisateur->getId()), PDO::PARAM_INT);
        $stmt->bindValue(':Niveau', $utilisateur->getNiveau(), PDO::PARAM_STR);
        $stmt->bindValue(':Mail', $utilisateur->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':Mdp', $utilisateur->getMdp(), PDO::PARAM_STR);
        $stmt->bindValue(':Pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);
        $stmt->bindValue(':Photo', $utilisateur->getPhoto(), PDO::PARAM_STR);
        $stmt->bindValue(':Tmp', intval($utilisateur->getTmp()), PDO::PARAM_INT);

        return $stmt->execute(); // Ex�cute la d�claration
      }
      else{
        throw new \Exception("L'utilisateur doit être non null et une instance de la classe Utilisateur");
      }
    }
    catch(Exception $e){
      throw new Exception($e);
    }
  }

  public function delete($id){
    if (empty($id) || !is_int($id) || $id < 0)
          throw new Exception("id non conforme");
          
    $stmt = $this->cnx->prepare("DELETE FROM Utilisateur WHERE Id_U = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();

    }

  public function setMdp($id, $oldMdp, $newMdp){

    if(empty($oldMdp) || empty($newMdp) || !is_string($oldMdp) || !is_string($newMdp) || strlen($oldMdp) > 70 || strlen($newMdp) > 70)
      throw new Exception("nouveau ou ancien mot de passe non conforme");

    elseif (empty($id) || !is_int($id) || $id < 0)
      throw new Exception("id non conforme");

    // L utilisation de declarations empeche les injections SQL
    $stmt = $this->cnx->prepare("SELECT Pseudo_U, Mdp_U FROM Utilisateur WHERE Id_U = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);  // Lie "$id" aux param�tres.

    if(!$stmt->execute())
         throw new Exception("Erreur de la requête");

    $ligne = $stmt->fetch(PDO::FETCH_OBJ);

    // V�rifie si les deux mots de passe sont les m�mes
    // Le mot de passe que l�utilisateur a donn�.
    if (password_verify($oldMdp, $ligne->Mdp_U)){

        // Requete SQL
        $stmt = $this->cnx->prepare("UPDATE Utilisateur SET Mdp_U= :Mdp WHERE Id_U = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);  // Lie "$id" aux parametres.
        $stmt->bindValue(':Mdp', password_hash($newMdp, PASSWORD_DEFAULT), PDO::PARAM_STR);

        return $stmt->execute();
    }
    else{
        throw new Exception('Erreur : mauvais mot de passe');
    }
  }

}
