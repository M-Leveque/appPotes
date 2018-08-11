<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test de la classe DAO</title>
	<style type="text/css">body {font-family: Arial, Helvetica, sans-serif; font-size: small;}</style>
</head>
<body>

<?php
// connexion du serveur web à la base MySQL
include_once ('DAO.class.php');
$dao = new DAO();

//test de la function getRealisations ------------------------------------------------------------
$realisations = $dao->getRealisations();
echo ('<b>Test de la fonction getRealisations: </b><br>');
foreach ($realisations as $key => $realisation) {
	echo ('<b>'.$realisation->toString().'</b><br>');
}

echo '------------------------------------------------------------<br><br>';
echo '------------------------------------------------------------<br><br>';

//test de la function getCompetences ------------------------------------------------------------
$competences = $dao->getCompetences();
echo ('<b>Test de la fonction getCompetences: </b><br>');
foreach ($competences as $key => $competence) {
	echo ('<b>'.$competence->toString().'</b><br>');
}

echo '------------------------------------------------------------<br><br>';
echo '------------------------------------------------------------<br><br>';

//test de la function getEtablissements ------------------------------------------------------------
$etablissements = $dao->getEtablissements();
echo ('<b>Test de la fonction getEtablissements: </b><br>');
foreach ($etablissements as $key => $etablissement) {
	echo ('<b>'.$etablissement->toString().'</b><br>');
}

echo '------------------------------------------------------------<br><br>';
echo '------------------------------------------------------------<br><br>';

//test de la function getUtilisateurs ------------------------------------------------------------
$utilisateurs = $dao->getUtilisateurs();
echo ('<b>Test de la fonction getUtilisateurs: </b><br>');
foreach ($utilisateurs as $key => $utilisateur) {
	echo ('<b>'.$utilisateur->toString().'</b><br>');
}

echo '------------------------------------------------------------<br><br>';

//test de la function setUtilisateur ------------------------------------------------------------
$utilisateur = new Utilisateur(1, 'Administrateur', "photo.jpg","", "", 2, '06 01 31 36 07', 'amdin@admin.com', 1);
echo ('<b>Test de la fonction setUtilisateurs: </b><br>');
echo ('<b>'.$dao->setUtilisateur($utilisateur).'</b><br>');

//echo '------------------------------------------------------------<br><br>';

//test de la function setPhoto ------------------------------------------------------------
// echo ('<b>Test de la fonction setPhoto: </b><br>');
// echo ('<b>'.$dao->setPhoto(1, 'ressources/images/photo.jpg').'</b><br>');

// echo '------------------------------------------------------------<br><br>';

//test de la function getUtilisateur ------------------------------------------------------------
$utilisateur = $dao->getUtilisateur(1);
echo ('<b>Test de la fonction getUtilisateur: </b><br>');
echo ('<b>'.$utilisateur->toString().'</b><br>');


echo '------------------------------------------------------------<br><br>';
echo '------------------------------------------------------------<br><br>';

//test de la function getUtilisateurs ------------------------------------------------------------
$interets = $dao->getInterets();
echo ('<b>Test de la fonction getInterets: </b><br>');
foreach ($interets as $key => $interet) {
	echo ('<b>'.$interet->toString().'</b><br>');
}

echo '------------------------------------------------------------<br><br>';
echo '------------------------------------------------------------<br><br>';

//test de la function connection ------------------------------------------------------------
$connection = $dao->connection('admin', 'admin');
$connection2 = $dao->connection('Toto', 'toto');
$connection3 = $dao->connection('Toto', 'administrateur');
$connection4 = $dao->connection('admin', 'toto');
echo ('<b>Test de la fonction connection: </b><br>');
var_dump ($connection);
var_dump ($connection2);
var_dump ($connection3);
var_dump ($connection4);


echo '------------------------------------------------------------<br><br>';


// ferme la connexion à MySQL :
unset($dao);
?>

</body>
</html>