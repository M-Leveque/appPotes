<?php
//---------- Page de test -----------
//---------- Class Cagnotte  -----------

include('Cagnotte.class.php');

//test des methodes get
//---------------------
$cagnotte = new Cagnotte(1, 'Anniv','Annivairsaire de frank', '15/10/2018');

//Affichage du r�sultat
$msg = "----------Test des methods get()-----------<br>";
$msg .= "getId() : ".$cagnotte->getId()."<br>";
$msg .= "getTitre() : ".$cagnotte->getTitre()."<br>";
$msg .= "getDescription() : ".$cagnotte->getDescription()."<br>";
$msg .= "getDateFin() : ".$cagnotte->getDateFin()."<br>";
$msg .= "<br><br>";

echo $msg;

//test des methodes set
//---------------------
//Mise � jour des donn�es
$res1 = $cagnotte->setId(1);
$res2 = $res1 = $cagnotte->setTitre('Soiree');
$res3 = $cagnotte->setDescription('Cagnotte de financement des decorations');
$res4 = $cagnotte->setDateFin('2018-05-06');

//Affichage des nouvelles donn�es
$msg = "----------Test des methods set()-----------<br>";
$msg .= "(Cas reussi) Nouvelles donnees :<br>";
$msg .= "(id: 1, titre : Soiree , description : Cagnotte de financement des decorations, date de fin : 2018-05-06)<br><br>";
$msg .= "Id : $res1 <br>";
$msg .= "Titre : $res2 <br>";
$msg .= "Description : $res3 <br>";
$msg .= "DateFin : $res4 <br>";
$msg .= "<br><br>";

echo $msg;

//Mise à jour des données
$res1 = $cagnotte->setId(-2);
$res2 = $cagnotte->setTitre('sgresqgresgsergsergserges');
$res3 = $cagnotte->setDescription('Cagnotte de financement des decorations');
$res4 = $cagnotte->setDateFin('2018-04-29 resg');

//Affichage des nouvelles donn�es
$msg = "----------Test des methods set()-----------<br>";
$msg .= "(Cas erreur) Nouvelles donnees :<br>";
$msg .= "Id : $res1 <br>";
$msg .= "Titre : $res2 <br>";
$msg .= "Description : $res3 <br>";
$msg .= "DateFin : $res4 <br>";
$msg .= "<br><br>";

echo $msg;

?>
