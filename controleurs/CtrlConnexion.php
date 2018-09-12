<?php 
//-------------------------------------------------------------------------------------
//---------------------| Traitement php de la page Connexion |-------------------------
//-------------------------------------------------------------------------------------

//On inclut la class DAO (Data Access Objet)
include('modeles/DAO.class.php');

//On se connecte à la base de données
$dao = new DAO();

// on verifie les parametres de connexion
$ident = !empty($_POST['ident']) ? $_POST['ident'] : NULL;
$mdp = !empty($_POST['mdp']) ? $_POST['mdp'] : NULL; 

//Si on recoit en post les données de connexion utilisateur alors essaye de se logger
if(isset($ident) AND isset($mdp)){
    
    if($dao->login($ident , $mdp ) == true){
        //Si la connexion reussi, on envoie vers la HomePage 
        header("Location: index.php?action=HomePage");
    }
}

//-------------------------------------------------------------------------------------
//-------------------------------| Insertion des vues |--------------------------------
//-------------------------------------------------------------------------------------

//On inclut le menu
include('ressources/vues/VueHeader.php');

//On inclut la page Connexion  
include('ressources/vues/VueConnexion.php');

//On inclut le bas de page (Fermeture des balises html)
include('ressources/vues/VueFooter.php');

?>