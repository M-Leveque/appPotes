<?php
//---------- Page de test -----------
//---------- Class Utilisateur  -----------

include('Utilisateur.class.php');

//test des methodes get
//---------------------
$utilisateur = new Utilisateur(1, 0,'test@test.fr', 'Administrateur1', 'test', '/ressources/images/test.jpg');

//Affichage du r�sultat
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
$res1 = $utilisateur->setId(2);
$res2 = $utilisateur->setNiveau(1);
$res3 = $utilisateur->setMail('test2@test2.fr');
$res4 = $utilisateur->setPseudo('test2');
$res5 = $utilisateur->setPhoto('/ressources/images/test2.jpg');

//Affichage des nouvelles donn�es
$msg = "----------Test des methods set()-----------<br>";
$msg .= "(cas reussi ) Nouvelles donnees :<br>";
$msg .= "(id: 2, niveau : 1, mail : test2@test2.fr, pseudo : test2, photo : /ressources/images/test2.jpg)<br><br>";
$msg .= "Id : ".$res1."<br>";
$msg .= "Niveau : ".$res2."<br>";
$msg .= "Mail : ".$res3."<br>";
$msg .= "Pseudo : ".$res4."<br>";
$msg .= "Photo : ".$res5."<br>";
$msg .= "<br><br>";

echo $msg;

//Mise à jour des données
$res1 = $utilisateur->setId('test');
$res2 = $utilisateur->setNiveau(3);
$res3 = $utilisateur->setMail('test2test2');
$res4 = $utilisateur->setPseudo('test2test2test2test2test2');
$res5 = $utilisateur->setPhoto('/ressources/images/test2.jpg');

$msg = "(cas erreur ) Nouvelles donnees :<br>";
$msg .= "(id: test, niveau : 3, mail : test2test2, pseudo : test2test2test2test2test2, photo : /ressources/images/test2.jpg)<br><br>";
$msg .= "Id : ".$res1."<br>";
$msg .= "Niveau : ".$res2."<br>";
$msg .= "Mail : ".$res3."<br>";
$msg .= "Pseudo : ".$res4."<br>";
$msg .= "Photo : ".$res5."<br>";
$msg .= "<br><br>";

echo $msg;

?>
