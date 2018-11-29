<?php
include_once('modeles/DAO/AlbumDAO.class.php');
include_once ('modeles/DAO/EvenementDAO.class.php');
include_once('modeles/DAO/CagnotteDAO.class.php');

$userId = intVal($_SESSION['user_id']);

//Initialisation de la variable d'affichage des albums
try{
    $albumDAO = new AlbumDAO();
    $albumInfos = $albumDAO->getByUser($userId);

    foreach ($albumInfos as $albumInfo){
        $albums .= Album::toHTML($albumInfo->getId(), $albumInfo->getNom(), $albumInfo->getVisuel(), 0);
    }
}
catch(Exception $e){
    echo $e->getMessage();
    $albums = null;
}

//Initialisation de la variable d'affichage des evenements
try {
    $evenementDAO = new EvenementDAO();
    $evenementsInfos = $evenementDAO->getByUser($userId);

    if ($albumsInfos !== false) {
        foreach ($evenementsInfos as $evenementInfo) {
            $evenements .= Evenement::toHTML($evenementInfo->getId(), $evenementInfo->getTitre(), $evenementInfo->getDescription(), $evenementInfo->getDateTime());
        }
    } else {
        $evenements = null;
    }
}catch (Exception $e){
    echo $e->getMessage();
    $evenements = null;
}

//Initialisation de la variable d'affichage des cagnottes
try{
    $cagnotteDAO = new CagnotteDAO();
    $cagnottesInfos = $cagnotteDAO->getByUser($userId);
    foreach ($cagnottesInfos as $cagnotteInfo){
        $cagnottes .= Cagnotte::toHTML($cagnotteInfo->getId(), $cagnotteInfo->getTitre(), $cagnotteInfo->getDescription(), $cagnotteInfo->getArgentR(), $cagnotteInfo->getDateHeureFin());
    }
}
catch (Exception $e){
    echo $e->getMessage();
    $cagnottes = null;
}

include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');
include_once('ressources/vues/VueCompte.php');
include_once('ressources/vues/VueFooter.php');
