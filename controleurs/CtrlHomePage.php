<?php
include_once('modeles/DAO/AlbumDAO.class.php');
include_once('modeles/DAO/EvenementDAO.class.php');
include_once('modeles/DAO/CagnotteDAO.class.php');
include_once('modeles/DAO/UtilisateurDAO.class.php');

$albumDAO = new AlbumDAO();
$albumsInfos = $albumDAO->getInfosBase();
$albums = "";


foreach ($albumsInfos as $albumInfo){

    if($albumInfo[0] == 1){
        $albumCommun = Album::toHTML($albumInfo[0], $albumInfo[1], $albumInfo[2], 1);
    }
    else {
        $albums .= Album::toHTML($albumInfo[0], $albumInfo[1], $albumInfo[2], 0);
    }
}


include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');
include_once('ressources/vues/VueHomePage.php');
include_once('ressources/vues/VueFooter.php');
