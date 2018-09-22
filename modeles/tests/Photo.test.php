<?php
//---------- Page de test -----------
//---------- Class Photo  -----------

include_once('modeles/src/Photo.class.php');

//test des methodes get
//---------------------
$photo = new photo(1, 'img004.png', '/ressources/images/test.jpg', 5, '2015-05-12', '2015-05-13',1, 1);
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

//Test du constructeur
//Cas normal : donnees valide
$test = 0;
echo "Test du constructeur : cas normal<br>";
echo "    Id : ";
if ($photo->getId() == 1){echo $reussi; $test++;}else echo $echec;
echo "<br>    Titre : ";
if ($photo->getTitre() == 'img004.png'){echo $reussi; $test++;}else echo $echec;
echo "<br>    Chemin : ";
if ($photo->getChemin() == '/ressources/images/test.jpg'){echo $reussi; $test++;}else echo $echec;
echo "<br>    Compteur : ";
if ($photo->getCompteur() == 5){echo $reussi; $test++;}else echo $echec;
echo "<br>    Date : ";
if ($photo->getDate() == '2015-05-12'){echo $reussi; $test++;}else echo $echec;
echo "<br>   DateU : ";
if ($photo->getDateU() == '2015-05-13'){echo $reussi; $test++;}else echo $echec;
echo "<br>    IdUtilisateur : ";
if ($photo->getIdUtilisateur() == 1){echo $reussi; $test++;}else echo $echec;
echo "<br>    Titre : ";
if ($photo->getIdAlbum() == 1){echo $reussi; $test++;}else echo $echec;
echo "<br> <strong>Resultat :</strong> ";
if($test == 8 )echo $reussi; else echo $echec;

$test = 0;
$photo = new photo("d", 'TitreBeaucoupTropLong', 'test.jpg', -1, '2015-05-34', '2015-54-13', -1, "test");
echo "<br><br>Test du constructeur : cas echec<br>";
echo "Id : ";
if (!$photo->getId() == "d"){echo $reussi; $test++;}else echo $echec;
echo "<br>    Titre : ";
if (!$photo->getTitre() == 'TitreBeaucoupTropLong'){echo $reussi; $test++;}else echo $echec;
echo "<br>    Chemin : ";
if ($photo->getChemin() == 'test.jpg'){echo $reussi; $test++;}else echo $echec;
echo "<br>    Compteur : ";
if (!$photo->getCompteur() == -1){echo $reussi; $test++;}else echo $echec;
echo "<br>    Date : ";
if (!$photo->getDate() == '2015-05-34'){echo $reussi; $test++;}else echo $echec;
echo "<br>    DateU : ";
if (!$photo->getDateU() == '2015-54-13'){echo $reussi; $test++;}else echo $echec;
echo "<br>    IdUtilisateur : ";
if (!$photo->getIdUtilisateur() == -1){echo $reussi; $test++;}else echo $echec;
echo "<br>    Titre : ";
if (!$photo->getIdAlbum() == "test"){echo $reussi; $test++;}else echo $echec;
echo "<br> <strong>Resultat :</strong> ";
if($test == 8 )echo $reussi; else echo $echec;
