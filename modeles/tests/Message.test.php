<?php
//---------- Page de test -----------
//---------- Class Message  -----------
include('modeles/src/Message.class.php');
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

$test = 0;
$message = new Message(1, 'Elle commence quand les vacances ?', 1, 1);
echo 'Test de la classe Message<BR>';
echo 'Constructeur : Cas normal : ';
echo "<BR>     id : ";
if($message->getId() == 1){echo $reussi; $test++;} else echo $echec;
echo "<BR>     contenu : ";
if($message->getcontenu() == 'Elle commence quand les vacances ?'){echo $reussi; $test++;} else echo $echec;
echo "<BR>     id evenement : ";
if($message->getIdEvenement() == 1){echo $reussi; $test++;} else echo $echec;
echo "<BR>     id utilisateur : ";
if($message->getIdUtilisateur() == 1){echo $reussi; $test++;} else echo $echec;
echo "<BR> <strong>Resultat :</strong> ";
if($test == 4 )echo $reussi; else echo $echec;

$test = 0;
$message = new Message(-2, null, "s", "t");
echo '<BR><BR>Constructeur : Cas echec : ';
echo "<BR>     id : ";
if($message->getId() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     contenu : ";
if($message->getcontenu() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     id evenement : ";
if($message->getIdEvenement() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     id utilisateur : ";
if($message->getIdUtilisateur() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR> <strong>Resultat :</strong> ";
if($test == 4 )echo $reussi; else echo $echec;
