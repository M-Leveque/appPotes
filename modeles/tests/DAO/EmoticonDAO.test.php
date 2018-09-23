<?php
//---------- Page de test -----------
//---------- Class EmoticonDAO  -----------
require_once('modeles/src/DAO/EmoticonDAO.class.php');

$emoticonDAO = new EmoticonDAO();
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

//---------- Test de la methode login ----------
echo "Test<BR><BR>";

//---------- Test de la methode get ----------
echo "<BR><BR>---- fonction get<BR>";
//Recuperation reussi -----
//Test de cas Reussi (Donnees correct)
echo "Cas Reussi : donnees correct :<BR>";
if ($emoticonDAO->get(1)) echo $reussi; else echo $echec;
//Recuperation echec -----
//Test de cas Echec
echo "<BR>Cas Echec : non numerique :<BR>";
if (!$emoticonDAO->get("echec")) echo $reussi; else echo $echec;

echo "<BR>Cas Echec : superieur a 0 :<BR>";
if (!$emoticonDAO->get(-1)) echo $reussi; else echo $echec;

echo "<BR>Cas Echec : utilisateur inconnu :<BR>";
if (!$emoticonDAO->get(12)) echo $reussi; else echo $echec;

//---------- Test de la methode set ----------
echo "<BR><BR>---- fonction set<BR>";
//Utilisateur a mettre a jour
$emoticon = $emoticonDAO->get(1);
$emoticon->setTitre("content2");
$emoticonDAO->set($emoticon);
if($emoticonDAO->get(1)->getTitre() == "content2") echo $reussi; else echo $echec;
//Initialisation du pseudo a Visiteur
$emoticon->setTitre("Titre");
$emoticonDAO->set($emoticon);

//---------- Test de la methode add ----------
echo "<BR><BR>---- fonction add<BR>";
//Utilisateur a ajouter
$emoticon = new Emoticon(4, "triste", "triste.png");
$emoticonDAO->add($emoticon);
if(boolVal($emoticonDAO->get(4))) echo $reussi; else echo $echec;

//---------- Test de la methode delete ----------
echo "<BR><BR>---- fonction delete<BR>";
//supression de l'utilisateur 4
$emoticonDAO->delete(4);
if(!$emoticonDAO->get(4)) echo $reussi; else echo $echec;

// ferme la connexion à MySQL :
unset($dao);
