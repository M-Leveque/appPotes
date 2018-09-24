<?php
//---------- Page de test -----------
//---------- Class AlbumDAO  -----------
require_once('modeles/src/DAO/AlbumDAO.class.php');

$albumDAO = new AlbumDAO();
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

//---------- Test de la methode login ----------
echo "Test<BR><BR>";
echo "---- fonction get<BR>";
echo "Cas normal : donnees valide<BR>";
if($albumDAO->get(1))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$albumDAO->get(null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees < 0<BR>";
if(!$albumDAO->get(-1))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees srting<BR>";
if(!$albumDAO->get("test"))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction getAll()<BR>";
if($albumDAO->getAll())echo $reussi; else echo $echec;

echo "<BR><BR><BR>---- fonction set<BR>";
echo "Cas normal : donnees valide<BR>";
$album = $albumDAO->get(1);
$album->setNom("Vacance 2011");
$albumDAO->set($album);
if($albumDAO->get(1)->getNom() == "Vacance 2011")echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$albumDAO->set(null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees srting<BR>";
if(!$albumDAO->set("test"))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction add<BR>";
echo "Cas normal : donnees valide<BR>";
$album = new Album(3, 'Vacances 2017', 0, 'img.png', 1, 1);
$albumDAO->add($album);
if($albumDAO->get(3))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$albumDAO->add(null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees string<BR>";
if(!$albumDAO->add("test"))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction delete<BR>";
$albumDAO->delete(3);
if(!$albumDAO->get(3))echo $reussi; else echo $echec;
