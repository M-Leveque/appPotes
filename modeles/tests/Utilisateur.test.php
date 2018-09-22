<?php
//---------- Page de test -----------
//---------- Class Utilisateur  -----------

include('modeles/src/Utilisateur.class.php');
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

$test = 0;
$utilisateur = new Utilisateur(1, 0,'test@test.fr', 'Visiteur1', 'test', '/ressources/images/test.jpg', false);
echo 'Test de la classe Utilisateur<BR>';
echo 'Constructeur : Cas normal : ';
echo "<BR>     id : ";
if($utilisateur->getId() == 1){echo $reussi; $test++;} else echo $echec;
echo "<BR>     niveau : ";
if($utilisateur->getNiveau() == 0){echo $reussi; $test++;} else echo $echec;
echo "<BR>     mail : ";
if($utilisateur->getMail() == 'test@test.fr'){echo $reussi; $test++;} else echo $echec;
echo "<BR>     mdp : ";
if(password_verify('Visiteur1', $utilisateur->getMdp())){echo $reussi; $test++;} else echo $echec;
echo "<BR>     pseudo : ";
if($utilisateur->getPseudo() == 'test'){echo $reussi; $test++;} else echo $echec;
echo "<BR>     photo : ";
if($utilisateur->getPhoto() == '/ressources/images/test.jpg'){echo $reussi; $test++;} else echo $echec;
echo "<BR>     tmp : ";
if(!$utilisateur->getTmp()){echo $reussi; $test++;} else echo $echec;
echo "<BR> <strong>Resultat :</strong> ";
if($test == 7 )echo $reussi; else echo $echec;

$test = 0;
$utilisateur = new Utilisateur(-2, 3,'test@test', 'Visiteurmpkdjfhrytugidjfhztsfcbfktiezytfhgnfmqoziehfmhfeozm', 'test1test1test1test11', null, 0);
echo '<BR><BR>Test de la classe Utilisateur<BR>';
echo 'Constructeur : Cas echec : ';
echo "<BR>     id : ";
if($utilisateur->getId() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     niveau : ";
if($utilisateur->getNiveau() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     mail : ";
if($utilisateur->getMail() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     mdp : ";
if($utilisateur->getMdp() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     pseudo : ";
if($utilisateur->getPseudo() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     photo : ";
if($utilisateur->getPhoto() ==null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     tmp : ";
if($utilisateur->getTmp() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR> <strong>Resultat :</strong> ";
if($test == 7 )echo $reussi; else echo $echec;
