<?php
include_once('modeles/DAO/AlbumDAO.class.php');
include_once ('modeles/DAO/EvenementDAO.class.php');

$userId = intVal($_SESSION['user_id']);
//----- Récuperation des albums
try{
    $albumDAO = new AlbumDAO();
    $albumInfos = $albumDAO->getByUser($userId);
}
catch(Exception $e){
    echo $e->getMessage();
}

//Initialisation de la variable d'affichage des albums
$albums = "";

foreach ($albumInfos as $albumInfo){
    $albums .= Album::toHTML($albumInfo->getId(), $albumInfo->getNom(), $albumInfo->getVisuel(), 0);
}

try {
    $evenementDAO = new EvenementDAO();
    $evenementsInfos = $evenementDAO->getByUser($userId);
    $evenements = "";

    if ($albumsInfos !== false) {
        foreach ($evenementsInfos as $evenementInfo) {

            $evenements .= Evenement::toHTML($evenementInfo->getId(), $evenementInfo->getTitre(), $evenementInfo->getDescription(), $evenementInfo->getDateTime());
        }
    } else {
        $evenements = null;
    }
}catch (Exception $e){
    echo $e->getMessage();
}

include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');
include_once('ressources/vues/VueCompte.php');
include_once('ressources/vues/VueFooter.php');
