<?php
include_once('modeles/Album.class.php');
include_once('modeles/DAO/AlbumDAO.class.php');

include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');

//Affichage de tous les albums
$albumDAO = new AlbumDAO();

$albums = $albumDAO->getALL();

include_once('ressources/vues/VueHomePage.php');
include_once('ressources/vues/VueFooter.php');
