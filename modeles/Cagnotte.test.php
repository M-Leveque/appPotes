<?php 
//---------- Page de test -----------
//---------- Class Cagnotte  -----------

include('Cagnotte.class.php');

//test des methodes get
//---------------------
$cagnotte = new Cagnotte(1, 'Anniv','annivairsaire de frank', '15/10/2018');

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
$cagnotte->setId(1);
$cagnotte->setTitre('Soir�e');
$cagnotte->setDescription('Cagnotte de financement des d�corations');
$cagnotte->setDateFin('29/11/2018');

//Affichage des nouvelles donn�es
$msg = "----------Test des methods set()-----------<br>";
$msg .= "Nouvelles donnees :<br>";
$msg .= "(id: 1, titre : Soir�e , description : Cagnotte de financement des d�corations, date de fin : 29/11/2018)<br><br>";
$msg .= $cagnotte->toString()."<br>";
$msg .= "<br><br>";

echo $msg;

?>