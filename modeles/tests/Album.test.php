<?php
//---------- Page de test -----------
//---------- Class Album  -----------

include('Album.class.php');

//test des methodes get
//---------------------
$album = new Album(1, 'Vacances 2017-2018');
$id = $album->getId();
$nom = $album->getNom();

//Affichage du r�sultat
$msg = "----------Test des methods get()-----------<br>";
$msg .= "getId() : ".$id."<br>";
$msg .= "getNom() : ".$nom."<br>";
$msg .= "<br><br>";

echo $msg;

//test des methodes set
//---------------------
$album = new Album(1, 'Vacances 2017-2018');

//Affichage des anciennes donn�es
$msg = "----------Test des methodes set()----------<br>";
$msg .= "Anciennes donnees :<br>";
$msg .= $album->toString()."<br>";

echo $msg;

//Mise � jour des donn�es
$res1 = $album->setId(2);
$res2 = $album->setNom('Vacances 2001 - 2002');

//Affichage des nouvelles donn�es
$msg = "(cas reussi) Nouvelles donnees :<br>";
$msg .= "Id : $res1 <br>";
$msg .= "Nom : $res2 <br>";
$msg .= "<br><br>";

echo $msg;

//Mise � jour des donn�es
$res1 = $album->setId('test');
$res2 = $album->setNom('Vacances 2001 - 2002 : ski');

//Affichage des nouvelles donn�es
$msg = "(cas erreur) Nouvelles donnees :<br>";
$msg .= "Id : $res1 <br>";
$msg .= "Nom : $res2 <br>";
$msg .= "<br><br>";

echo $msg;




?>
