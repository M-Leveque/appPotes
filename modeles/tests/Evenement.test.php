<?php
//---------- Page de test -----------
//---------- Class Evenement  -----------

include('modeles/src/Evenement.class.php');
//test des methodes get
//---------------------
$evenement = new Evenement(1, 'Anniv','Annivairsaire de frank', '2018-12-04', '2018-12-05 21:00:00', 0, 1, 1);

//Affichage du résultat
$msg = "----------Test bonne données ----------<br>";
$msg .= "getId() : ".$evenement->getId()."<br>";
$msg .= "getTitre() : ".$evenement->getTitre()."<br>";
$msg .= "getDescription() : ".$evenement->getDescription()."<br>";
$msg .= "getDateFin() : ".$evenement->getDateTime()."<br>";
$msg .= "getDateC() : ".$evenement->getDateC()."<br>";
$msg .= "getUtilisateur() : ".$evenement->getIdUtilisateur()."<br>";
$msg .= "getEvenement() : ".$evenement->getIdEmoticon()."<br>";
$msg .= "<br><br>";

echo $msg;

//test des methodes set
//---------------------
//Mise à jour des données

$res1 = $evenement->setId('bonsoir');
$res2 = $evenement->setTitre('Soireergsseqrgqelzhflqiuzef');
$res3 = $evenement->setDescription('Cagnotte de financement des decorations');
$res4 = $evenement->setDateTime('2018-12-2018 24:21:21');
$res5 = $evenement->setDateC('2018-06-05');
$res6 = $evenement->setIdUtilisateur('salut');
$res7 = $evenement->setIdEmoticon('salut');

$msg = "----------Test mauvaise données -----------<br>";
$msg .= "(cas erreur) Modification des données : <br>";
$msg .= "Id : ".$res1."<br>";
$msg .= "Titre : ".$res2."<br>";
$msg .= "Description : ".$res3."<br>";
$msg .= "DateTime : ".$res4."<br>";
$msg .= "DateC : ".$res5."<br>";
$msg .= "Utilisateur : ".$res6." <br>";
$msg .= "Emoticon : ".$res7." <br><br>";
$msg .= "<br><br>";

echo $msg;

?>
