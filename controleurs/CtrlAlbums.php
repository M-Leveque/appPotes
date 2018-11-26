<?php
include_once('modeles/DAO/AlbumDAO.class.php');
include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');

//Ctrl pour la page albums
//----- Récuperation des albums
$albumDAO = new AlbumDAO();
$albumsInfos = $albumDAO->getInfos();

//Initialisation de la variable d'affichage des albums
$albums = "";

foreach ($albumsInfos as $albumInfo){

    if($albumInfo[0] == 1){
        $albumCommun = Album::toHTML($albumInfo[0], $albumInfo[1], $albumInfo[2], 1);
    }
    else {
        $albums .= Album::toHTML($albumInfo[0], $albumInfo[1], $albumInfo[2], 0);
    }
}

include_once('ressources/vues/VueAlbums.php');
include_once('ressources/vues/VueFooter.php');
