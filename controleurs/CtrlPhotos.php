<?php
include_once("modeles/DAO/AlbumDAO.class.php");
include_once("modeles/Album.class.php");

include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');

//Affichage de l'album selon la requete
if(isset($_GET["Album"])){
	//On recupere l'album en question dans la bdd
   //$albumDAO = new albumDAO();
   //$album = $albumDAO->get(intval($_GET["Album"]));
//  $dateCreation= "00/00/0000"; //A implementer
//  $titreAlbum = $album->getNom();
}

include_once('ressources/vues/VuePhotos.php');
include_once('ressources/vues/VueFooter.php');
