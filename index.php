<?php
session_start();		// permet d'utiliser des variables de session
$niveauUtilisateur = null;
$action = '';

// on verifie le parametre action de l'URL
if ( isset ($_GET['action']))   $action = $_GET['action'];
if ( isset ($_SESSION['user_type'])) $niveauUtilisateur = $_SESSION['user_type'];

//--------------------------------- Deconnexion ---------------------------------------------------------
// lors d'une premiere connexion, ou apres une deconnexion, on initialise a vide les variables de session

if ($action == 'Deconnecter')
{	unset ($_SESSION['user_id']);
    unset ($_SESSION['user_type']);
    unset ($_SESSION['username']);
	header("Location: index.php");
}

//--------------------------------------------------------------------------------------------------------
//------------------------------------- Routes -----------------------------------------------------------
//--------------------------------------------------------------------------------------------------------
//Connexion utilisateur ou administrateur
if($niveauUtilisateur === 1 || $niveauUtilisateur === 2){
	switch($action){
		case 'HomePage': {
				include_once ('controleurs/CtrlHomePage.php'); break;
		}
		case 'Albums': {
				include_once ('controleurs/CtrlAlbums.php'); break;
		}
		case 'Photos': {
				include_once ('controleurs/CtrlPhotos.php'); break;
		}
		case 'Evenements': {
				include_once ('controleurs/CtrlEvenements.php'); break;
		}
        case 'Evenement': {
                include_once ('controleurs/CtrlEvenements.php'); break;
        }
		case 'Cagnottes': {
				include_once ('controleurs/CtrlCagnottes.php'); break;
		}
		case 'Compte': {
				include_once ('controleurs/CtrlCompte.php'); break;
		}
        case 'OptionCompte' :{
            include_once ('controleurs/CtrlOptionCompte.php'); break;
        }
        case 'AjoutAlbum' :{
            include_once ('controleurs/CtrlAjoutAlbum.php'); break;
        }
        case 'AjoutEvenement' :{
            include_once ('controleurs/CtrlAjoutEvenement.php'); break;
        }
        case 'AjoutCagnotte' :{
            include_once ('controleurs/CtrlAjoutCagnotte.php'); break;
        }
		case 'Connexion': {
				include_once ('controleurs/CtrlConnexion.php'); break;
		}
		default: {
			include_once ('controleurs/CtrlHomePage.php'); break;
		}
	}
}
//autre connexion
else {
	// toute autre tentative est automatiquement redirigee vers la page de connexion
	include_once ('controleurs/CtrlConnexion.php');
}
