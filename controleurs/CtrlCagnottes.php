<?php
include_once('modeles/DAO/CagnotteDAO.class.php');

//Cagnottes
try{
    $cagnotteDAO = new CagnotteDAO();
    $cagnottesInfos = $cagnotteDAO->getAll();
    $cagnottes = "";

    foreach ($cagnottesInfos as $cagnotteInfo){
        $cagnottes .= Cagnotte::toHTML($cagnotteInfo->getId(), $cagnotteInfo->getTitre(), $cagnotteInfo->getDescription(), $cagnotteInfo->getArgentR(), $cagnotteInfo->getDateHeureFin());
    }
}
catch (Exception $e){
    echo $e->getMessage();
}

include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');
include_once('ressources/vues/VueCagnottes.php');
include_once('ressources/vues/VueFooter.php');
