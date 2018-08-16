<?php
//---------- Page de test -----------
//---------- Class Utilisateur  -----------

// connexion du serveur web à la base MySQL
include_once ('DAO.class.php');
$dao = new DAO();

//test de la methode login
//-------------------------------------------------------------------------------------

echo '------------------------------------------------------------<br><br>';
$connection = $dao->login('admin@admin.fr', 'motdepasse');
$connection2 = $dao->login('admin@admin.fr', 'mauvaismotdepasse');
$connection3 = $dao->login('leveque.melvin@gmail.com', 'motdepasse');
$connection4 = $dao->login('leveque.melvin@gmail.com', 'mauvaismotdepasse');
echo ('<b>Test de la fonction login: </b><br><br>');
echo ('Administrateur : Bon login / Bon mot de passe<br>');
var_dump($connection);
echo ('Administrateur : Bon login / Mauvais mot de passe<br>');
var_dump($connection2);
echo ('Utilisateur : Bon login / Bon mot de passe<br>');
var_dump($connection3);
echo ('Utilisateur : Bon login / Mauvais mot de passe<br>');
var_dump($connection4);


echo '------------------------------------------------------------<br><br>';

//test des methodes Utilisateur
//-------------------------------------------------------------------------------------

//test des methodes get
//---------------------

$utilisateur = $dao->getUtilisateur(1);
$msg = "<b>Test de la fonction getUtilisateur: </b><br><br>";
$msg .= "getUtilisateur(1) : ".$utilisateur->toString()."<br>";
$msg .= "<br><br>";

echo $msg;

echo '------------------------------------------------------------<br><br>';


// ferme la connexion Ã  MySQL :
unset($dao);
?>