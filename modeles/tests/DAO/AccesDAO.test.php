<?php
//---------- Page de test -----------
//---------- Class AccesDAO  -----------
require_once('modeles/src/DAO/AccesDAO.class.php');

$accesDAO = new AccesDAO();
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

//---------- Test de la methode login ----------
echo "Test<BR><BR>";
echo "---- fonction getAll<BR>";
echo "Cas normal : donnees valide<BR>";
if($accesDAO->getAll(1))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$accesDAO->getAll(null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees < 0<BR>";
if(!$accesDAO->getAll(-1))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees srting<BR>";
if(!$accesDAO->getAll("test"))echo $reussi; else echo $echec;

echo "<BR><BR><BR>---- fonction add<BR>";
echo "Cas normal : donnees valide<BR>";
if($accesDAO->add(1, 4))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$accesDAO->add(null, null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees srting<BR>";
if(!$accesDAO->add("test", 1))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction delete<BR>";
echo "Cas normal : donnees valide<BR>";
if($accesDAO->delete(1, 4))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$accesDAO->delete(null, 1))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees string<BR>";
if(!$accesDAO->delete("test", 3))echo $reussi; else echo $echec;
