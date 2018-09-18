<?php
//---------- Page de test -----------
//---------- Class Evenement  -----------

include('Evenement.class.php');
include_once('Utilisateur.class.php');
//test des methodes get
//---------------------
$utilisateur = new Utilisateur(1, 0,'test@test.fr', 'motdepasse', 'test', '/ressources/images/test.jpg');
$evenement = new Evenement(1, 'Anniv','Annivairsaire de frank', '2018-12-2018', 0, $utilisateur);

//Affichage du résultat
$msg = "----------Test des methods get()-----------<br>";
$msg .= "getId() : ".$evenement->getId()."<br>";
$msg .= "getTitre() : ".$evenement->getTitre()."<br>";
$msg .= "getDescription() : ".$evenement->getDescription()."<br>";
$msg .= "getDateFin() : ".$evenement->getDateTime()."<br>";
$msg .= "getUtilisateur() : ".$evenement->getUtilisateur()->toString()."<br>";
$msg .= "<br><br>";

echo $msg;

//test des methodes set
//---------------------
//Mise à jour des données
$utilisateur = new Utilisateur(2, 0,'admin@test.fr', 'motdepasse1', 'test2', '/ressources/images/test2.jpg');

$res1 = $evenement->setId(1);
$res2 = $evenement->setTitre('Soiree');
$res3 = $evenement->setDescription('Cagnotte de financement des decorations');
$res4 = $evenement->setDateTime('2018-12-04 00:12:53');
$res5 = $evenement->setUtilisateur($utilisateur);

//Affichage des nouvelles données
$msg = "----------Test des methods set()-----------<br>";
$msg .= "Nouvelles donnees :<br>";
$msg .= "(id: 1, titre : Soiree , description : Cagnotte de financement des decorations, date de fin : 2018-12-2018,<br>";
$msg .= "utilisateur: 2, 0,'admin@test.fr', 'motdepasse1', 'test2', '/ressources/images/test2.jpg')<br><br>";
$msg .= "(cas reussi) Modification des données : <br>";
$msg .= "Id : ".$res1."<br>";
$msg .= "Titre : ".$res2."<br>";
$msg .= "Description : ".$res3."<br>";
$msg .= "DateTime : ".$res4."<br>";
$msg .= "Utilisateur : ".$res5;
$msg .= "<br><br>";

$res1 = $evenement->setId('bonsoir');
$res2 = $evenement->setTitre('Soireergsseqrgqelzhflqiuzef');
$res3 = $evenement->setDescription('Cagnotte de financement des decorations');
$res4 = $evenement->setDateTime('2018-12-2018 24:21:21');
$res5 = $evenement->setUtilisateur('salut');

$msg .= "(cas erreur) Modification des données : <br>";
$msg .= "Id : ".$res1."<br>";
$msg .= "Titre : ".$res2."<br>";
$msg .= "Description : ".$res3."<br>";
$msg .= "DateTime : ".$res4."<br>";
$msg .= "Utilisateur : ".$res5." <br><br>";
$msg .= "<br><br>";

echo $msg;

?>
