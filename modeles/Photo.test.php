<?php 
//---------- Page de test -----------
//---------- Class Photo  -----------

include_once('Photo.class.php');
include_once('Utilisateur.class.php');
include_once('Album.class.php');

//test des methodes get
//---------------------
$utilisateur = new Utilisateur(1, 0,'test@test.fr', 'motdepasse', 'test', '/ressources/images/test.jpg');
$album = new Album(1, 'vancance 2018');
$photo = new photo(1, 'img004.png', '/ressources/images/test.jpg', 5, '25/05/2015', $utilisateur, $album);

//Affichage du résultat
$msg = "----------Test des methods get()-----------<br>";
$msg .= "getId() : ".$photo->getId()."<br>";
$msg .= "getTitre() : ".$photo->getTitre()."<br>";
$msg .= "getChemin() : ".$photo->getChemin()."<br>";
$msg .= "getCompteur() : ".$photo->getCompteur()."<br>";
$msg .= "getDate() : ".$photo->getDate()."<br>";
$msg .= "getUtilisateur() : ".$photo->getUtilisateur()->toString()."<br>";
$msg .= "getAlbum() : ".$photo->getAlbum()->toString()."<br>";
$msg .= "<br><br>";

echo $msg;

//test des methodes set
//---------------------
//Mise à jour des données

$utilisateur = new Utilisateur(2, 0,'test2@test.fr', 'motdepasse2', 'test2', '/ressources/images/test2.jpg');
$album = new Album(2, 'vancance 2019');

$photo->setId(2);
$photo->setTitre('img005.png');
$photo->setChemin('/ressources/images/test.png');
$photo->setCompteur($photo->getCompteur() + 1);
$photo->setDate('25/05/2016');
$photo->setUtilisateur($utilisateur);
$photo->setAlbum($album);

//Affichage des nouvelles données
$msg = "----------Test des methods set()-----------<br>";
$msg .= "Nouvelles donnees :<br>";
$msg .= "(id: 2, titre: img005.png, chemin : /ressources/images/test/png, Compteur : 6, date : 25/05/2016<br><br>";
$msg .= $photo->toString()."<br>";
$msg .= "<br><br>";

echo $msg;

?>