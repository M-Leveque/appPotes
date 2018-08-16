<?php 
//---------- Page de test -----------
//---------- Class Album  -----------

include('Album.class.php');

//test des methodes get
//---------------------
$album = new Album(1, 'Vacances 2017-2018');
$id = $album->getId();
$nom = $album->getNom();

//Affichage du résultat
$msg = "----------Test des methods get()-----------<br>";
$msg .= "getId() : ".$id."<br>";
$msg .= "getNom() : ".$nom."<br>";
$msg .= "<br><br>";

echo $msg;

//test des methodes set
//---------------------
$album = new Album(1, 'Vacances 2017-2018');

//Affichage des anciennes données
$msg = "----------Test des methodes set()----------<br>";
$msg .= "Anciennes donnees :<br>";
$msg .= $album->toString()."<br>";

echo $msg;

//Mise à jour des données
$album->setId(2);
$album->setNom('Vacances 2001 - 2002');

//Affichage des nouvelles données
$msg = "Nouvelles donnees :<br>";
$msg .= $album->toString()."<br>";
$msg .= "<br><br>";

echo $msg;


//test de la methods toString()
//-----------------------------
$album = new Album(1, 'Vacances 2017-2018');
$toString = $album->toString();

//Affichage du résultat
$msg = "----------Test de la method toString()----------<br>";
$msg .= $toString."<br>";
$msg .= "<br><br>";

echo $msg;


?>