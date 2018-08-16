<?php

//------------------------------------------------------------------------------
//DAO : Data Acces Objet - est une classe pour ce connecter � la base de données
//Elle sert aussi � acc�der au donn�es de la base de donn�es
//------------------------------------------------------------------------------

// certaines m�thodes n�cessitent les fichiers Utilisateur.class.php,

// inclusion des paramètres de l'application
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
	//--------------------------------------------- Fonction connection ---------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------
	
	public function login($email, $password) {
	    
	    // L�utilisation de d�clarations emp�che les injections SQL
        $stmt = $this->cnx->prepare("SELECT Id_U, Pseudo_U, Mdp_U, Salt_U FROM utilisateurs WHERE Mail_U = :mail LIMIT 1");
        $stmt->bindValue(':mail', $email, PDO::PARAM_STR);  // Lie "$email" aux param�tres.
        $stmt->execute();    // Ex�cute la d�claration.
        $ligne = $stmt->fetch(PDO::FETCH_OBJ);
        
        
        // Hashe le mot de passe avec le salt unique
        $password = hash('sha512', $password . $ligne->Salt_U);
        
        // V�rifie si les deux mots de passe sont les m�mes
        // Le mot de passe que l�utilisateur a donn�.
        if ($ligne->Mdp_U == $password) {
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
}

?>