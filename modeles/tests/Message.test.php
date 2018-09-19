<?php
//---------- Page de test -----------
//---------- Class Message  -----------
include('modeles/src/Message.class.php');

//test des methodes get
//---------------------
$message = new Message(1, 'Elle commence quand les vacances ?', 1, 1);

//Affichage du r�sultat
$msg = "----------Test des methods get()-----------<br>";
$msg .= "getId() : ".$message->getId()."<br>";
$msg .= "getContenu() : ".$message->getContenu()."<br>";
$msg .= "getEvenement() : ".$message->getIdEvenement()."<br>";
$msg .= "getUtilisateur() : ".$message->getIdUtilisateur()."<br>";
$msg .= "<br><br>";

echo $msg;

//test des methodes set
//---------------------

//Mise � jour des donn�es
$res1 = $message->setId(2);
$res2 = $message->setContenu('Elle commence demain il me semble bien');
$res3 = $message->setIdEvenement(2);
$res4 = $message->setIdUtilisateur(2);

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
$res3 = $message->setIdEvenement('test');
$res4 = $message->setIdUtilisateur(null);

//Affichage des nouvelles donn�es
$msg = "( Cas erreur ) Nouvelles donnees :<br>";
$msg .= "Id : ".$res1."<br>";
$msg .= "Contenu : ".$res2."<br>";
$msg .= "Evenement : ".$res3."<br>";
$msg .= "Utilisateur : ".$res4."<br>";
$msg .= "<br><br>";

echo $msg;
?>
