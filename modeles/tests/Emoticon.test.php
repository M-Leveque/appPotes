<?php
//---------- Page de test -----------
//---------- Class Emoticon  -----------

include('Emoticon.class.php');

//test des methodes get
//---------------------
$emoticon = new Emoticon(1, 'Content', '/ressources/images/emoticons/content.jpg');
$msg = "----------Test des methodes get()----------<br>";
$msg .= $emoticon->getId()."<br>";
$msg .= $emoticon->getTitre()."<br>";
$msg .= $emoticon->getChemin()."<br><br>";

echo $msg;

//test de la methode $toString
//----------------------------
$msg = "----------Test de la methode toString()----------<br>";
$msg .= $emoticon->toString()."<br><br>";

echo $msg;
