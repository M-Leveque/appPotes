<?php 
//---------- Page de test -----------
//---------- Class Evenement  -----------

include('Evenement.class.php');
include_once('Utilisateur.class.php');
//test des methodes get
//---------------------
$utilisateur = new Utilisateur(1, 0,'test@test.fr', 'motdepasse', 'test', '/ressources/images/test.jpg');
$evenement = new Evenement(1, 'Anniv','Annivairsaire de frank', '15/10/2018', $utilisateur);

//Affichage du résultat
$msg = "----------Test des methods get()-----------<br>";
$msg .= "getId() : ".$evenement->getId()."<br>";
$msg .= "getTitre() : ".$evenement->getTitre()."<br>";
$msg .= "getDescription() : ".$evenement->getDescription()."<br>";
$msg .= "getDateFin() : ".$evenement->getDate()."<br>";
$msg .= "getUtilisateur() : ".$evenement->getUtilisateur()->toString()."<br>";
$msg .= "<br><br>";

echo $msg;

//test des methodes set
//---------------------
//Mise à jour des données
$utilisateur = new Utilisateur(2, 0,'admin@test.fr', 'motdepasse1', 'test2', '/ressources/images/test2.jpg');

$evenement->setId(1);
$evenement->setTitre('Soiree');
$evenement->setDescription('Cagnotte de financement des decorations');
$evenement->setDate('29/11/2018');
$evenement->setUtilisateur($utilisateur);



//Affichage des nouvelles données
$msg = "----------Test des methods set()-----------<br>";
$msg .= "Nouvelles donnees :<br>";
$msg .= "(id: 1, titre : Soiree , description : Cagnotte de financement des decorations, date de fin : 29/11/2018,<br>";
$msg .= "utilisateur: 2, 0,'admin@test.fr', 'motdepasse1', 'test2', '/ressources/images/test2.jpg')<br><br>";
$msg .= $evenement->toString()."<br>";
$msg .= "<br><br>";

echo $msg;

?>