<?php
include_once('modeles/DAO/AlbumDAO.class.php');
include_once('modeles/DAO/EvenementDAO.class.php');
include_once('modeles/DAO/CagnotteDAO.class.php');
include_once('modeles/DAO/UtilisateurDAO.class.php');

// ----- Albums -----
try {
    $albumDAO = new AlbumDAO();
    $albumsInfos = $albumDAO->getInfos();
    $nbAlbums=0;

    if( $albumsInfos !== false ){
        foreach ($albumsInfos as $albumInfo){
            if($nbAlbums === 5){
                break;
            }
            if($albumInfo[0] === 1){
                $albumCommun = Album::toHTML($albumInfo[0], $albumInfo[1], $albumInfo[2], 1);
            }
            else {
                $albums .= Album::toHTML($albumInfo[0], $albumInfo[1], $albumInfo[2], 0);
            }
            $nbAlbums++;
        }
    }
    else{
        $albumCommun = null;
        $albums = null;
    }
}catch (Exception $e){
    echo $e->getMessage();
}

// ----- Evenements -----
try {
    $evenementDAO = new EvenementDAO();
    $evenementsInfos = $evenementDAO->getAll();
    $nbEvenement = 0;

    if ($albumsInfos !== false) {
        foreach ($evenementsInfos as $evenementInfo) {
            if($nbEvenement === 5){
                break;
            }
            $evenements .= Evenement::toHTML($evenementInfo->getId(), $evenementInfo->getTitre(), $evenementInfo->getDescription(), $evenementInfo->getDateTime());
            $nbEvenement++;
        }
    } else {
        $evenements = null;
    }
}catch (Exception $e){
    echo $e->getMessage();
}

// ----- Cagnottes -----
try{
    $cagnotteDAO = new CagnotteDAO();
    $cagnottesInfos = $cagnotteDAO->getAll();
    $nbCagnottes = 0;

    foreach ($cagnottesInfos as $cagnotteInfo){
        if($nbCagnottes === 5){
            break;
        }
        $cagnottes .= Cagnotte::toHTML($cagnotteInfo->getId(), $cagnotteInfo->getTitre(), $cagnotteInfo->getDescription(), $cagnotteInfo->getArgentR(), $cagnotteInfo->getDateHeureFin());
        $nbCagnottes++;
    }
}
catch (Exception $e){
    echo $e->getMessage();
}

include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');
include_once('ressources/vues/VueHomePage.php');
include_once('ressources/vues/VueFooter.php');
