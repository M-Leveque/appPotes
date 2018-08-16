<?php 
include('modeles/DAO.class.php');
//On se connection a la base de données
$dao = new DAO();

// on verifie les parametres de connexion
$ident = !empty($_POST['ident']) ? $_POST['ident'] : NULL;

$mdp = !empty($_POST['mdp']) ? $_POST['mdp'] : NULL; 

//Si on recoit en post les données de connexion utilisateur alors essaye de se logger
if(isset($ident) AND isset($mdp)){
    
    if($dao->login($ident , $mdp ) == true){
        header("Location: index.php?action=HomePage");
    }
}

include('/ressources/vues/VueConnexion.php');
?>