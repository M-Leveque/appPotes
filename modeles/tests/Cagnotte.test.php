<?php
//---------- Page de test -----------
//---------- Class Cagnotte  -----------

include('modeles/src/Cagnotte.class.php');

$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";


//test du Constructeur
//--------------------
$test = 0;
$cagnotte = new Cagnotte(1, 'Cagnotte', 'Cagnotte pour l anniv de chalene', '2018-05-03 23:00:00', 0, 1);
echo 'Test de la classe Cagnotte<BR>';
echo 'Constructeur : Cas normal : ';
echo "<BR>     id : ";
if($cagnotte->getId() == 1){echo $reussi; $test++;} else echo $echec;
echo "<BR>     titre : ";
if($cagnotte->getTitre() == 'Cagnotte'){echo $reussi; $test++;} else echo $echec;
echo "<BR>     description : ";
if($cagnotte->getDescription() == 'Cagnotte pour l anniv de chalene'){echo $reussi; $test++;} else echo $echec;
echo "<BR>     dateTime : ";
if($cagnotte->getDateHeurefin() == '2018-05-03 23:00:00'){echo $reussi; $test++;} else echo $echec;
echo "<BR>     ArgentR : ";
if($cagnotte->getArgentR() == 0){echo $reussi; $test++;} else echo $echec;
echo "<BR>     Id Evenement : ";
if($cagnotte->getIdE() == 1){echo $reussi; $test++;} else echo $echec;

echo "<BR> <strong>Resultat :</strong> ";
if($test == 6 )echo $reussi; else echo $echec;

$test = 0;
$cagnotte = new Cagnotte("s", 'Cagnottemelfkcjvnfhrj', null, '2018-33-03 23:00:00', -2, null);
echo '<BR><BR>Constructeur : Cas normal : ';
echo "<BR>     id : ";
if($cagnotte->getId() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     titre : ";
if($cagnotte->getTitre() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     description : ";
if($cagnotte->getDescription() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     dateTime : ";
if($cagnotte->getDateHeurefin() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     ArgentR : ";
if($cagnotte->getArgentR() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     Id Evenement : ";
if($cagnotte->getIdE() == null){echo $reussi; $test++;} else echo $echec;

echo "<BR> <strong>Resultat :</strong> ";
if($test == 6 )echo $reussi; else echo $echec;
