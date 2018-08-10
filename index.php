<?php
session_start();		// permet d'utiliser des variables de session

// on v�rifie le param�tre action de l'URL
if ( ! isset ($_GET['action']) == true)  $action = '';  else   $action = $_GET['action'];

//--------------------------------- D�connexion ---------------------------------------------------------
// lors d'une premi�re connexion, ou apr�s une d�connexion, on initialise � vide les variables de session
if ($action == 'Deconnecter')
{	unset ($_SESSION['id']);
	header("Location: index.php");
}

//---------------------------- Initialisation des variables sessions -------------------------------------
// tests des variables de session
if ( ! isset ($_SESSION['id']) == true)  $id = '';  else  $id = $_SESSION['id'];
if ( ! isset ($_SESSION['ident']) == true)  $ident = '';  else  $ident = $_SESSION['ident'];
if ( ! isset ($_SESSION['niveauUtilisateur']) == true)  $niveauUtilisateur = '';  else  $niveauUtilisateur = $_SESSION['niveauUtilisateur'];

//--------------------------------------------------------------------------------------------------------
//------------------------------------- Routes -----------------------------------------------------------
//--------------------------------------------------------------------------------------------------------

switch($action){
	case 'HomePage': {
	    include_once ('controleurs/CtrlHomePage.php'); break;
	}
	case 'Photos': {
	    include_once ('controleurs/CtrlPhotos.php'); break;
	}
	case 'Compte': {
	    include_once ('controleurs/CtrlCompte.php'); break;
	}
    //-------------------------------- Modules ----------------------------------------------------------
    
	//---------------------------------------------------------------------------------------------------
	default : {
		// toute autre tentative est automatiquement redirig�e vers la page de connexion
		include_once ('controleurs/CtrlConnexion.php'); break;
	}
}