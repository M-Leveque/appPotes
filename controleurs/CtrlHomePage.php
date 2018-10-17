<?php
include_once('modeles/Album.class.php');
include_once('modeles/DAO/AlbumDAO.class.php');

include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');

//Affichage de tous les albums
$albumDAO = new AlbumDAO();
$albums = $albumDAO->getALL();

foreach($albums as $album){
    if($album->getId() != 1){
        $aff_albums = "
                    <a href=\"?action=Photos&Album=".$album->getId()."\">
                        <div class=\"album album-grid\">
                        <img src=\"".$album->getVisuel()."\" alt=\"vignette de l'album\">
                        <p>".$album->getNom()."</p>
                    </div>
                    </a>";
    }
}

//Affichage de tous les evenements
$evenementDAO = new EvenementDAO();
$evenements = $evenementDAO->getALL();

foreach($evenements as $evenement){
    $aff_Evenements = "
            <a class=\"even\" href=\"#\">
                <div class=\"content-even\">
                    <span>🎁</span>
    
                    <div class=\"desc-even\">
                        <h6>".$evenement->getTitre()."</h6>
                        <p>".$evenement->getDescription()."</p>
                    </div>
    
                    <div class=\"date-even\">
                        <p>JOUR</p>
                        <span>00</span>
                        <p>MOIS</p>
                    </div>
                </div>
            </a>";
}

include_once('ressources/vues/VueHomePage.php');
include_once('ressources/vues/VueFooter.php');
