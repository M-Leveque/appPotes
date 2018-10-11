<?php
include_once('modeles/DAO/AlbumDAO.class.php');
include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');

//Affichage de l'album selon la requete http
if (isset ($_GET['album'])){
  //Si un album passé en params alors on vas le chercher dans la bdd
  
}

$dateCreation;
$titreAlbum;
$descriptionAlbum;

include_once('ressources/vues/VuePhotos.php');
include_once('ressources/vues/VueFooter.php');
