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
  //-------------------------------- Tests ------------------------------------------------------------
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
	case 'TestEvenementDAO':{
		include_once ('modeles/tests/DAO/EmoticonDAO.test.php'); break;
	}
	case 'TestAlbum':{
		include_once ('modeles/tests/Album.test.php'); break;
	}
	case 'TestAlbumDAO':{
		include_once ('modeles/tests/DAO/AlbumDAO.test.php'); break;
	}
	//---------------------------------------------------------------------------------------------------
	default : {
		// toute autre tentative est automatiquement redirig�e vers la page de connexion
		include_once ('controleurs/CtrlConnexion.php'); break;
	}
}
