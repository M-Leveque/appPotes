<?php
//------------------------------------------------------------------------------
//DAO : Data Acces Objet - est une classe pour ce connecter �� la base de données
//Elle sert aussi �� acc�der au donn�es de la base de donn�es
//------------------------------------------------------------------------------

// certaines m�thodes n�cessitent les fichiers Utilisateur.class.php,

// inclusion des paramètres de l'application
include_once('utilisateur.class.php');
include_once ('parametres.localhost.php');

class DAO
{
	private $cnx;					// la connexion à la base de donn�es

	//---------------------------------------------------------------------------------------------------------------------
	//--------------------------------------------- Constructeur ---------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------

	public function __construct() {

		//Appel des variables global utile pour la connection à la Base de données
		global $PARAM_HOTE, $PARAM_PORT, $PARAM_BDD, $PARAM_USER, $PARAM_PWD;
		try
		{	$this->cnx = new PDO ("mysql:host=" . $PARAM_HOTE . ";port=" . $PARAM_PORT . ";dbname=" . $PARAM_BDD.';charset=utf8',
							$PARAM_USER,
							$PARAM_PWD);
			return true;
		}
		catch (Exception $ex)
		{	echo ("Echec de la connexion a la base de donnees <br>");
			echo ("Erreur numero : " . $ex->getCode() . "<br />" . "Description : " . $ex->getMessage() . "<br>");
			echo ("PARAM_HOTE = " . $PARAM_HOTE);
			return false;
		}
	}

	public function __destruct() {
		unset($this->cnx);
	}

	//---------------------------------------------------------------------------------------------------------------------
	//--------------------------------------------- Fonction login ---------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------

	public function login($email, $password) {

	    // L�utilisation de d�clarations emp�che les injections SQL
        $stmt = $this->cnx->prepare("SELECT Id_U, Pseudo_U, Mdp_U FROM utilisateurs WHERE Mail_U = :mail LIMIT 1");
        $stmt->bindValue(':mail', $email, PDO::PARAM_STR);  // Lie "$email" aux param�tres.
        $stmt->execute();    // Ex�cute la d�claration.
        $ligne = $stmt->fetch(PDO::FETCH_OBJ);

        // V�rifie si les deux mots de passe sont les m�mes
        // Le mot de passe que l�utilisateur a donn�.
        if (password_verify($password, $ligne->Mdp_U)) {
            // Le mot de passe est correct!
            // R�cup�re la cha�ne user-agent de l�utilisateur
            $user_browser = $_SERVER['HTTP_USER_AGENT'];

            // Protection XSS car nous pourrions conserver cette valeur
            $ligne->Id_U = preg_replace("/[^0-9]+/", "", $ligne->Id_U);
            $_SESSION['user_id'] = $ligne->Id_U;

            // Protection XSS car nous pourrions conserver cette valeur
            $ligne->Pseudo_U = preg_replace("/[^a-zA-Z0-9_\-]+/","",$ligne->Pseudo_U);
            $_SESSION['username'] = $ligne->Pseudo_U;
            $_SESSION['login_string'] = hash('sha512', $password . $user_browser);

            // Ouverture de session r�ussie.
            return true;

        } else {

            //Le mot de passe est mauvais
            return false;
        }
	}

	//---------------------------------------------------------------------------------------------------------------------
	//--------------------------------------------- Fonctions Utilisateurs ---------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------

	public function getUtilisateur($id){

	    // Requete SQL
	    $stmt = $this->cnx->prepare("SELECT Id_U, Niveau_U, Mail_U, Pseudo_U, Mdp_U, Pseudo_U, Photo_U FROM utilisateurs WHERE Id_U = :id LIMIT 1");
	    $stmt->bindValue(':id', $id, PDO::PARAM_STR);
	    $stmt->execute();    // Ex�cute la d�claration
	    $ligne = $stmt->fetch(PDO::FETCH_OBJ);

	    // Construction d'un nouvel utilsateur avec les donn�es de la BDD
	    $utilisateur = new Utilisateur($ligne->Id_U, $ligne->Niveau_U,$ligne->Mail_U, $ligne->Mdp_U, $ligne->Pseudo_U, $ligne->Photo_U );

	    return $utilisateur;
	}

	public function setUtilisateur($utilisateur){

	    // Requete SQL
	    $stmt = $this->cnx->prepare("UPDATE utilisateurs SET Niveau_U= :Niveau, Mail_U= :Mail, Pseudo_U= :Pseudo, Photo_U= :Photo WHERE Id_U = :id");
	    $stmt->bindValue(':id', $utilisateur->getId(), PDO::PARAM_STR);
	    $stmt->bindValue(':Niveau', $utilisateur->getNiveau(), PDO::PARAM_STR);
	    $stmt->bindValue(':Mail', $utilisateur->getMail(), PDO::PARAM_STR);
	    $stmt->bindValue(':Pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);
	    $stmt->bindValue(':Photo', $utilisateur->getPhoto(), PDO::PARAM_STR);
	    $stmt->execute();    // Ex�cute la d�claration
	    $ligne = $stmt->fetch(PDO::FETCH_OBJ);

	    // Construction d'un nouvel utilsateur avec les donn�es de la BDD
	    $utilisateur = new Utilisateur($ligne->Id_U, $ligne->Mail_U, $ligne->Mdp_U, $ligne->Pseudo_U, $ligne->Photo_U );

	    return $utilisateur;
	}

	public function addUtilisateur($utilisateur){

	    // Requete SQL
	    $stmt = $this->cnx->prepare("INSERT INTO utilisateurs(Id_U, Niveau_U, Mail_U, Mdp_U, Pseudo_U, Photo_U) VALUES (:Niveau, :Mail, :Mdp, :Pseudo, :Photo)");
	    $stmt->bindValue(':id', $utilisateur->getId(), PDO::PARAM_STR);
	    $stmt->bindValue(':Niveau', $utilisateur->getNiveau(), PDO::PARAM_STR);
	    $stmt->bindValue(':Mail', $utilisateur->getMail(), PDO::PARAM_STR);
	    $stmt->bindValue(':Mdp', $utilisateur->getMdp(), PDO::PARAM_STR);
	    $stmt->bindValue(':Pseudo', $utilisateur->getPseudo(), PDO::PARAM_STR);
	    $stmt->bindValue(':Photo', $utilisateur->getPhoto(), PDO::PARAM_STR);
	    $result = $stmt->execute();    // Exécute la déclaration

	    return $result;
	}

	public function deleteUtilisateur($id){

	    // Requete SQL
	    $stmt = $this->cnx->prepare("DELETE FROM utilisateur WHERE Id_U = :id");
	    $stmt->bindValue(':id', $id, PDO::PARAM_STR);
	    $result = $stmt->execute();    // Ex�cute la d�claration

	    return $result;
	}

	public function setMdp($id, $oldMdp, $newMdp){

	    // L�utilisation de d�clarations emp�che les injections SQL
	    $stmt = $this->cnx->prepare("SELECT Pseudo_U, Mdp_U FROM utilisateurs WHERE Id_U = :id");
	    $stmt->bindValue(':id', $id, PDO::PARAM_STR);  // Lie "$id" aux param�tres.
	    $stmt->execute();    // Ex�cute la d�claration.
	    $ligne = $stmt->fetch(PDO::FETCH_OBJ);

	    // V�rifie si les deux mots de passe sont les m�mes
	    // Le mot de passe que l�utilisateur a donn�.
	    if (password_verify($oldMdp, $ligne->Mdp_U)){

	        // Requete SQL
	        $stmt = $this->cnx->prepare("UPDATE utilisateurs SET Mdp_U= :Mdp WHERE Id_U = :id");
	        $stmt->bindValue(':id', $id, PDO::PARAM_STR);  // Lie "$id" aux param�tres.
	        $stmt->bindValue(':mdp', $oldMdp, PDO::PARAM_STR);
	        $result = $stmt->execute();    // Ex�cute la d�claration.

	        return $result;
	    }
	    else{
	        return 'Erreur : mauvais mot de passe';
	    }

	}
}

?>
