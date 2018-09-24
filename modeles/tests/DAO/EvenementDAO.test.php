<?php
//---------- Page de test -----------
//---------- Class MessageDAO  -----------
require_once('modeles/src/DAO/EvenementDAO.class.php');

$evenementDao = new EvenementDAO();
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

//---------- Test de la methode login ----------
echo "Test<BR><BR>";
echo "---- fonction get<BR>";
echo "Cas normal : donnees valide<BR>";
if($evenementDao->get(1))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$evenementDao->get(null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees < 0<BR>";
if(!$evenementDao->get(-1))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees srting<BR>";
if(!$evenementDao->get("test"))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction getAll()<BR>";
if($evenementDao->getAll())echo $reussi; else echo $echec;

echo "<BR><BR><BR>---- fonction set<BR>";
echo "Cas normal : donnees valide<BR>";
$evenement = $evenementDao->get(1);
$evenement->setTitre("Vacance 2011");
$evenementDao->set($evenement);
if($evenementDao->get(1)->getTitre() == "Vacance 2011")echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$evenementDao->set(null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees srting<BR>";
if(!$evenementDao->set("test"))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction add<BR>";
echo "Cas normal : donnees valide<BR>";
$evenement = new Evenement(3, "test", "Evenement de test", "2015-11-04", "2016-10-02 22:15:11", 0, 1, 1);
$evenementDao->add($evenement);
if($evenementDao->get(3))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$evenementDao->add(null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees string<BR>";
if(!$evenementDao->add("test"))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction delete<BR>";
$evenementDao->delete(3);
if(!$evenementDao->get(3))echo $reussi; else echo $echec;
