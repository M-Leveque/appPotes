<?php
//---------- Page de test -----------
//---------- Class Emoticon  -----------

include('modeles/src/Emoticon.class.php');

$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";


//test du Constructeur
//--------------------

$test = 0;
$emoticon = new Emoticon(1, 'Content', 'ressources/images/emoticons/content.jpg');
echo 'Test de la classe Emoticon<BR>';
echo 'Constructeur : Cas normal : ';
echo "<BR>     id : ";
if($emoticon->getId() == 1){echo $reussi;} else echo $echec;
echo "<BR>     titre : ";
if($emoticon->getTitre() == 'Content'){echo $reussi;} else echo $echec;
echo "<BR>     chemin : ";
if($emoticon->getChemin() == 'ressources/images/emoticons/content.jpg'){echo $reussi;} else echo $echec;

//test Constructeur
//--------------------

$test = 0;
$emoticon = new Emoticon("d", 'Titre superieur a vinght caracteres', null);
echo '<BR><BR>Constructeur : Cas Erreur : ';
echo "<BR>     id : ";
if($emoticon->getId() == null){echo $reussi;} else echo $echec;
echo "<BR>     titre : ";
if($emoticon->getTitre() == null){echo $reussi;} else echo $echec;
echo "<BR>     chemin : ";
if($emoticon->getChemin() == null){echo $reussi;} else echo $echec;
