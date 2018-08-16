<?php 
//---------- Page de test -----------
//---------- Class Utilisateur  -----------

include('Utilisateur.class.php');

//test des methodes get
//---------------------
$utilisateur = new Utilisateur(1, 0,'test@test.fr', 'motdepasse', 'test', '/ressources/images/test.jpg');

//Affichage du résultat
$msg = "----------Test des methods get()-----------<br>";
$msg .= "getId() : ".$utilisateur->getId()."<br>";
$msg .= "getNiveau() : ".$utilisateur->getNiveau()."<br>";
$msg .= "getMail() : ".$utilisateur->getMail()."<br>";
$msg .= "getMdp() : ".$utilisateur->getMdp()."<br>";
$msg .= "getPseudo() : ".$utilisateur->getPseudo()."<br>";
$msg .= "getPhoto() : ".$utilisateur->getPhoto()."<br>";
$msg .= "<br><br>";

echo $msg;

//test des methodes set
//---------------------
//Mise à jour des données
$utilisateur->setId(2);
$utilisateur->setNiveau(1);
$utilisateur->setMail('test2@test2.fr');
$utilisateur->setMdp('motdepasse2');
$utilisateur->setPseudo('test2');
$utilisateur->setPhoto('/ressources/images/test2.jpg');

//Affichage des nouvelles données
$msg = "----------Test des methods set()-----------<br>";
$msg .= "Nouvelles donnees :<br>";
$msg .= "(id: 2, niveau : 1, mail : test2@test2.fr, pseudo : test2, photo : /ressources/images/test2.jpg)<br><br>";
$msg .= $utilisateur->toString()."<br>";
$msg .= "<br><br>";

echo $msg;

?>