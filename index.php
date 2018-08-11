<?php
session_start();		// permet d'utiliser des variables de session

// on vérifie le paramètre action de l'URL
if ( ! isset ($_GET['action']) == true)  $action = '';  else   $action = $_GET['action'];

//--------------------------------- Déconnexion ---------------------------------------------------------
// lors d'une première connexion, ou après une déconnexion, on initialise à vide les variables de session
if ($action == 'Deconnecter')
{	unset ($_SESSION['id']);
	header("Location: index.php");
}

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
		// toute autre tentative est automatiquement redirigée vers la page de connexion
		include_once ('controleurs/CtrlConnexion.php'); break;
	}
}