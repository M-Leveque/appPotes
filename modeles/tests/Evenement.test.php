<?php
//---------- Page de test -----------
//---------- Class Evenement  -----------

include('modeles/src/Evenement.class.php');
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

$test = 0;
$evenement = new Evenement(1, 'Anniv','Anniversaire de frank', '2018-02-04', '2018-01-05 21:00:00', false, 1, 1);
echo 'Test de la classe Evenement<BR>';
echo 'Constructeur : Cas normal : ';
echo "<BR>     id : ";
if($evenement->getId() == 1){echo $reussi; $test++;} else echo $echec;
echo "<BR>     titre : ";
if($evenement->getTitre() == 'Anniv'){echo $reussi; $test++;} else echo $echec;
echo "<BR>     description : ";
if($evenement->getDescription() == 'Anniversaire de frank'){echo $reussi; $test++;} else echo $echec;
echo "<BR>     dateTime : ";
if($evenement->getDateTime() == '2018-01-05 21:00:00'){echo $reussi; $test++;} else echo $echec;
echo "<BR>     dateC : ";
if($evenement->getDateC() == '2018-02-04'){echo $reussi; $test++;} else echo $echec;
echo "<BR>     archiver : ";
if($evenement->getArchiver() == false){echo $reussi; $test++;} else echo $echec;
echo "<BR>     id utilisateur : ";
if($evenement->getIdUtilisateur() == 1){echo $reussi; $test++;} else echo $echec;
echo "<BR>     id emoticon : ";
if($evenement->getIdEmoticon() == 1){echo $reussi; $test++;} else echo $echec;

echo "<BR> <strong>Resultat :</strong> ";
if($test == 8 )echo $reussi; else echo $echec;

$test = 0;
$evenement = new Evenement("t", 'Anniversaire de franck', null, '2018-33-04', '2018-12-05 21:65:00', 1, -4, 'fer');
echo '<br><br>Constructeur : Cas echec : ';
echo "<BR>     id : ";
if($evenement->getId() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     titre : ";
if($evenement->getTitre() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     description : ";
if($evenement->getDescription() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     dateTime : ";
if($evenement->getDateTime() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     dateC : ";
if($evenement->getDateC() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     archiver : ";
if($evenement->getArchiver() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     id utilisateur : ";
if($evenement->getIdUtilisateur() == null){echo $reussi; $test++;} else echo $echec;
echo "<BR>     id emoticon : ";
if($evenement->getIdEmoticon() == null){echo $reussi; $test++;} else echo $echec;

echo "<BR> <strong>Resultat :</strong> ";
if($test == 8 )echo $reussi; else echo $echec;

?>
