<?php
include_once('modeles/DAO/EvenementDAO.class.php');
include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');
//Affichage de tout les evenements
if($_GET["action"] === "Evenements") {
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
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    include_once('ressources/vues/VueEvenements.php');
}
//Affichage d'un evenement
elseif($_GET["action"] === "Evenement"){
    include_once('ressources/vues/VueContenuEvenement.php');
}
include_once('ressources/vues/VueFooter.php');
