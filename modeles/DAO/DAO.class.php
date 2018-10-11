<?php
//------------------------------------------------------------------------------
//DAO : Data Acces Objet - est une classe pour ce connecter �� la base de données
//Elle sert aussi �� acc�der au donn�es de la base de donn�es
//------------------------------------------------------------------------------

// certaines m�thodes n�cessitent les fichiers Utilisateur.class.php,

// inclusion des paramètres de l'application
include_once "modeles/parametres.localhost.php";

class DAO
{
	protected $cnx;					// la connexion à la base de donn�es

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
}
