<?php
include_once('modeles/DAO/EvenementDAO.class.php');

try {
    $evenementDAO = new EvenementDAO();
    $evenementsInfos = $evenementDAO->getAll();
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
include_once('ressources/vues/VueEvenements.php');
include_once('ressources/vues/VueFooter.php');
