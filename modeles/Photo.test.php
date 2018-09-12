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
$photo = new photo(1, 'img004.png', '/ressources/images/test.jpg', 5, '2015-05-12', $utilisateur, $album);

//Affichage du r�sultat
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

$res1 = $photo->setId(2);
$res2 = $photo->setTitre('img005.png');
$res3 = $photo->setChemin('/ressources/images/test.png');
$res4 = $photo->setCompteur($photo->getCompteur() + 1);
$res5 = $photo->setDate('1996-12-02');
$res6 = $photo->setUtilisateur($utilisateur);
$res7 = $photo->setAlbum($album);

//Affichage des nouvelles donn�es
$msg = "----------Test des methods set()-----------<br>";
$msg .= "(cas réussi) Nouvelles donnees :<br>";
$msg .= "(id: 2, titre: img005.png, chemin : /ressources/images/test/png, Compteur : 6, date : 1996-12-02<br><br>";
$msg .= "Id : ".$res1." <br><br>";
$msg .= "Titre : ".$res2." <br><br>";
$msg .= "Chemin : ".$res3." <br><br>";
$msg .= "Compteur : ".$res4." <br><br>";
$msg .= "Date : ".$res5." <br><br>";
$msg .= "Utilisauteur : ".$res6." <br><br>";
$msg .= "Album : ".$res7." <br><br>";
$msg .= "<br><br>";

echo $msg;

$res1 = $photo->setId('t');
$res2 = $photo->setTitre('img005.pngqe468qz4f65e4zf');
$res3 = $photo->setChemin('/ressources/images/test.png');
$res4 = $photo->setCompteur($photo->getCompteur() -52);
$res5 = $photo->setDate('1996-32-33');
$res6 = $photo->setUtilisateur('bonsoir');
$res7 = $photo->setAlbum(1234);

//Affichage des nouvelles données
$msg = "----------Test des methods set()-----------<br>";
$msg .= "(cas erreur) Nouvelles donnees :<br>";
$msg .= "(id: 2, titre: img005.png, chemin : /ressources/images/test/png, Compteur : 6, date : 1996-12-02<br><br>";
$msg .= "Id : ".$res1." <br><br>";
$msg .= "Titre : ".$res2." <br><br>";
$msg .= "Chemin : ".$res3." <br><br>";
$msg .= "Compteur : ".$res4." <br><br>";
$msg .= "Date : ".$res5." <br><br>";
$msg .= "Utilisateur : ".$res6." <br><br>";
$msg .= "Album : ".$res7." <br><br>";
$msg .= "<br><br>";

echo $msg;
?>
