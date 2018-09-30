<?php
//---------- Page de test -----------
//---------- Class Acces  -----------

include('modeles/src/Acces.class.php');

$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";


//test du Constructeur
//--------------------

$test = 0;
$acces = new Acces(1, 1);
echo 'Test de la classe Acces<BR>';
echo 'Constructeur : Cas normal : ';
echo "<BR>     id Utilisateur : ";
if($emoticon->getIdUtilisateur() == 1){echo $reussi; $test++;} else echo $echec;
echo "<BR>     id Evenement : ";
if($emoticon->getIdEvenement() == 1){echo $reussi; $test++;} else echo $echec;

echo "<BR> <strong>Resultat :</strong> ";
if($test == 2 )echo $reussi; else echo $echec;

$test = 0;
$acces = new Acces("s", null);
echo '<BR><BR>Constructeur : Cas Erreur : ';
echo "<BR>     id utilisateur : ";
if($emoticon->getIdUtilisateur() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     id evenement : ";
if($emoticon->getIdEvenement() == null){echo $reussi; $test++;} else echo $echec;

echo "<BR> <strong>Resultat :</strong> ";
if($test == 2 )echo $reussi; else echo $echec;
