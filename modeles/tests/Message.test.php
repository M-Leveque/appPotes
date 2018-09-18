<?php
//---------- Page de test -----------
//---------- Class Message  -----------
include('Message.class.php');

//test des methodes get
//---------------------
$utilisateur = new Utilisateur(1, 0,'test@test.fr', 'motdepasse', 'test', '/ressources/images/test.jpg');
$evenement = new Evenement(1, 'Anniv','Annivairsaire de frank', '2015-05-06', 0 ,$utilisateur);
$message = new Message(1, 'Elle commence quand les vacances ?', $evenement, $utilisateur);

//Affichage du r�sultat
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
$evenement = new Evenement(2, 'Anniv2','Annivairsaire de frank2', '2015-10-02', 0, $utilisateur);

//Mise � jour des donn�es
$res1 = $message->setId(2);
$res2 = $message->setContenu('Elle commence demain il me semble bien');
$res3 = $message->setEvenement($evenement);
$res4 = $message->setUtilisateur($utilisateur);

//Affichage des nouvelles donn�es
$msg = "( Cas reussi ) Nouvelles donnees :<br>";
$msg .= "Id : ".$res1."<br>";
$msg .= "Contenu : ".$res2."<br>";
$msg .= "Evenement : ".$res3."<br>";
$msg .= "Utilisateur : ".$res4."<br>";
$msg .= "<br><br>";

echo $msg;

//Mise � jour des donn�es
$res1 = $message->setId(-2);
$res2 = $message->setContenu('Elle commence demain il me semble bien');
$res3 = $message->setEvenement('test');
$res4 = $message->setUtilisateur(1);

//Affichage des nouvelles donn�es
$msg = "( Cas erreur ) Nouvelles donnees :<br>";
$msg .= "Id : ".$res1."<br>";
$msg .= "Contenu : ".$res2."<br>";
$msg .= "Evenement : ".$res3."<br>";
$msg .= "Utilisateur : ".$res4."<br>";
$msg .= "<br><br>";

echo $msg;
?>
