<?php
//---------- Page de test -----------
//---------- Class MessageDAO  -----------
require_once('modeles/src/DAO/MessageDAO.class.php');

$messageDao = new MessageDAO();
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

//---------- Test de la methode login ----------
echo "Test<BR><BR>";

echo "---- fonction get<BR>";
echo "Cas normal : donnees valide<BR>";
$message = $messageDao->get(1);
if($message)echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
$message = $messageDao->get(null);
if(!$message)echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees string<BR>";
$message = $messageDao->get("test");
if(!$message)echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees < 0<BR>";
$message = $messageDao->get(-1);
if(!$message)echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction getForEvent<BR>";
echo "<BR>Cas normal : donnees valide<BR>";
$messages = $messageDao->getForEvent(1);
if($messages)echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
$messages = $messageDao->getForEvent(null);
if(!$messages)echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees string<BR>";
$messages = $messageDao->getForEvent("test");
if(!$messages)echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees < 0<BR>";
$messages = $messageDao->getForEvent(-2);
if(!$messages)echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction add<BR>";
echo "<BR>Cas normal : donnees valide<BR>";
$message = new message(2, "Il me semble que c'est l'ocean", 1, 2);
$messageDao->add($message);
if($messageDao->get(2))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees null<BR>";
if(!$messageDao->add(null))echo $reussi; else echo $echec;
echo "<BR>Cas echec : donnees non-object<BR>";
if(!$messageDao->add(0))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction delete<BR>";
echo "<BR>Cas normal : donnees valide<BR>";
$messageDao->delete(2);
if(!$messageDao->get(2))echo $reussi; else echo $echec;
echo "<BR>Cas normal : donnees null<BR>";
if(!$messageDao->delete(null))echo $reussi; else echo $echec;
echo "<BR>Cas normal : donnees < 0<BR>";
if(!$messageDao->delete(-2))echo $reussi; else echo $echec;
echo "<BR>Cas normal : donnees string<BR>";
if(!$messageDao->delete("test"))echo $reussi; else echo $echec;
