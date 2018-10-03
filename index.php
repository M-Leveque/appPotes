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
{	unset ($_SESSION['id']);
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
		case 'Photos': {
				include_once ('controleurs/CtrlPhotos.php'); break;
		}
		case 'Compte': {
				include_once ('controleurs/CtrlCompte.php'); break;
		}
		case 'Connexion': {
				include_once ('controleurs/CtrlConnexion.php'); break;
		}
	}
	//Connexion administrateur
	if ($niveauUtilisateur == 2){
		switch($action){
			case 'TestUtilisateur':{
				include_once ('modeles/tests/Utilisateur.test.php'); break;
			}
			case 'TestUtilisateurDAO':{
				include_once ('modeles/tests/DAO/UtilisateurDAO.test.php'); break;
			}
			case 'TestPhoto':{
				include_once ('modeles/tests/Photo.test.php'); break;
			}
			case 'TestPhotoDAO':{
				include_once ('modeles/tests/DAO/PhotoDAO.test.php'); break;
			}
			case 'TestMessage':{
				include_once ('modeles/tests/Message.test.php'); break;
			}
			case 'TestMessageDAO':{
				include_once ('modeles/tests/DAO/MessageDAO.test.php'); break;
			}
			case 'TestEvenement':{
				include_once ('modeles/tests/Evenement.test.php'); break;
			}
			case 'TestEvenementDAO':{
				include_once ('modeles/tests/DAO/EvenementDAO.test.php'); break;
			}
			case 'TestEmoticon':{
				include_once ('modeles/tests/Emoticon.test.php'); break;
			}
			case 'TestEmoticonDAO':{
				include_once ('modeles/tests/DAO/EmoticonDAO.test.php'); break;
			}
			case 'TestCagnotte':{
				include_once ('modeles/tests/Cagnotte.test.php'); break;
			}
			case 'TestCagnotteDAO':{
				include_once ('modeles/tests/DAO/CagnotteDAO.test.php'); break;
			}
			case 'TestAlbum':{
				include_once ('modeles/tests/Album.test.php'); break;
			}
			case 'TestAlbumDAO':{
				include_once ('modeles/tests/DAO/AlbumDAO.test.php'); break;
			}
			case 'TestAcces': {
				include_once ('modeles/tests/Acces.test.php'); break;
			}
			case 'TestAccesDAO': {
				include_once ('modeles/tests/DAO/AccesDAO.test.php'); break;
			}
			default : {
				// toute autre tentative est automatiquement redirigee vers la page de connexion
				include_once ('controleurs/CtrlHomePage.php'); break;
			}
		}
	}
}
//autre connexion
else {
	// toute autre tentative est automatiquement redirigee vers la page de connexion
	include_once ('controleurs/CtrlConnexion.php');
}
