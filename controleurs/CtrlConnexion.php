<?php
//-------------------------------------------------------------------------------------
//---------------------| Traitement php de la page Connexion |-------------------------
//-------------------------------------------------------------------------------------

//On inclut la class DAO (Data Access Objet)
include('modeles/src/DAO/UtilisateurDAO.class.php');

//On se connecte � la base de donn�es
$utilisateurDao = new UtilisateurDAO();

// on verifie les parametres de connexion
$ident = !empty($_POST['ident']) ? $_POST['ident'] : NULL;
$mdp = !empty($_POST['mdp']) ? $_POST['mdp'] : NULL;

//Si on recoit en post les donn�es de connexion utilisateur alors essaye de se logger
if(isset($ident) AND isset($mdp)){

   if($utilisateurDao->login($ident , $mdp ) == true){
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
