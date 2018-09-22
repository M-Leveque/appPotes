<?php
//---------- Page de test -----------
//---------- Class Album  -----------

include('modeles/src/Album.class.php');

$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

//test des methodes get

echo "---- Test constructeur";
echo "<BR>Test constructeur : Cas normal : ";
$album = new Album(1, 'Vacances 2017-2018', 0, 'img.png', 0, 1);
if($album)echo $reussi; else echo $ehec;

echo "<BR>Test constructeur : Cas echec : ";
$album = new Album("test", 'Vacances 2017-2018Vacances 2017-2018Vacances 2017-2018', -1, null, -2, null);
if($album->getId() == null && $album->getNom() == null && $album->getPriver() == null&& $album->getVisuel() == null && $album->getIdEvenement() == null && $album->getIdUtilisateur() == null)echo $reussi; else echo $echec;
