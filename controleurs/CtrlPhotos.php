<?php
include_once("modeles/DAO/AlbumDAO.class.php");
include_once("modeles/Album.class.php");

include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');

//Affichage de l'album selon la requete
if(isset($_GET["Album"])){
	//On recupere l'album en question dans la bdd
   $albumDAO = new albumDAO();
   $album = $albumDAO->get(intval($_GET["Album"]));
  $dateCreation=  Outils::convertirEnDateFR($album->getDateCreation()); //A implementer
  $titreAlbum = $album->getNom();
  $descriptionAlbum = $album->getDescription();
}

include_once('ressources/vues/VuePhotos.php');
include_once('ressources/vues/VueFooter.php');
