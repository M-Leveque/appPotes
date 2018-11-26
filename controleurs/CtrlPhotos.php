<?php
include_once('modeles/DAO/AlbumDAO.class.php');
include_once('modeles/DAO/PhotoDAO.class.php');

include_once('ressources/vues/VueHeader.php');
include_once('ressources/vues/VueNav.php');

$_GET["Album"] ? $album = intval($_GET["Album"]) : $album = null;

if($album == null){
    header("Location: index.php?action=Album");
}
elseif(isset($album)){
    $albumDAO = new AlbumDAO();
    $photoDAO = new PhotoDAO();

    try{
        $album = $albumDAO->get($album);
        $photos = $photoDAO->getByAlbum($album);

        $dateCreation = $album->getDateCreation();
        $titre = $album->getNom();
        $description = $album->getDescription();

        var_dump($photos);
        foreach ($photos as $photo){
            $htmlPhotos = $photo->toHtml();
        }
    }
    catch(Exception $e){

        $dateCreation = null;
        $titre = null;
        $description = $e;

        $htmlPhotos = null;
    }
}

include_once('ressources/vues/VuePhotos.php');
include_once('ressources/vues/VueFooter.php');
