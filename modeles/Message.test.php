<?php 
//---------- Page de test -----------
//---------- Class Message  -----------
include('Message.class.php');

//test des methodes get
//---------------------
$utilisateur = new Utilisateur(1, 0,'test@test.fr', 'motdepasse', 'test', '/ressources/images/test.jpg');
$evenement = new Evenement(1, 'Anniv','Annivairsaire de frank', '15/10/2018', $utilisateur);
$message = new Message(1, 'Elle commence quand les vacances ?', $evenement, $utilisateur);

//Affichage du résultat
$msg = "----------Test des methods get()-----------<br>";
$msg .= "getId() : ".$message->getId()."<br>";
$msg .= "getContenu() : ".$message->getContenu()."<br>";
$msg .= "getEvenement() : ".$message->getEvenement()->toString()."<br>";
$msg .= "getUtilisateur() : ".$message->getUtilisateur()->toString()."<br>";
$msg .= "<br><br>";

echo $msg;

//test des methodes set
//---------------------
$utilisateur = new Utilisateur(2, 1,'test2@test.fr', 'motdepasse2', 'test2', '/ressources/images/test2.jpg');
$evenement = new Evenement(2, 'Anniv2','Annivairsaire de frank2', '15/10/2019', $utilisateur);

//Mise à jour des données
$message->setId(2);
$message->setContenu('Elle commence demain il me semble bien');
$message->setEvenement($evenement);
$message->setUtilisateur($utilisateur);

//Affichage des nouvelles données
$msg = "Nouvelles donnees :<br>";
$msg .= $message->toString()."<br>";
$msg .= "<br><br>";

echo $msg;


?>