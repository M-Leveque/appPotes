<?php
//---------- Page de test -----------
//---------- Class CagnotteDAO  -----------
require_once('modeles/src/DAO/CagnotteDAO.class.php');

$cagnotteDAO = new CagnotteDAO();
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

//---------- Test de la methode login ----------
echo "Test<BR><BR>";
echo "---- fonction get<BR>";
echo "Cas normal : donnees valide<BR>";
if($cagnotteDAO->get(1))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$cagnotteDAO->get(null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees < 0<BR>";
if(!$cagnotteDAO->get(-1))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees srting<BR>";
if(!$cagnotteDAO->get("test"))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction getAll()<BR>";
if($cagnotteDAO->getAll())echo $reussi; else echo $echec;

echo "<BR><BR><BR>---- fonction set<BR>";
echo "Cas normal : donnees valide<BR>";
$cagnotte = $cagnotteDAO->get(1);
$cagnotte->setTitre("Vacance 2011");
$cagnotteDAO->set($cagnotte);
if($cagnotteDAO->get(1)->getTitre() == "Vacance 2011")echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$cagnotteDAO->set(null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees srting<BR>";
if(!$cagnotteDAO->set("test"))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction add<BR>";
echo "Cas normal : donnees valide<BR>";
$cagnotte = new Cagnotte(3, 'Cagnotte', 'Cagnotte pour l anniv de chalene', '2018-05-03 23:00:00', 0, 1);
$cagnotteDAO->add($cagnotte);
if($cagnotteDAO->get(3))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$cagnotteDAO->add(null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees string<BR>";
if(!$cagnotteDAO->add("test"))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction delete<BR>";
$cagnotteDAO->delete(3);
if(!$cagnotteDAO->get(3))echo $reussi; else echo $echec;
