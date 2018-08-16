<?php
// Projet Réservations M2L - version web mobile
// fichier : modele/Outils.class.php
// Rôle : boite à outils de fonctions courantes proposées sous forme de méthodes statiques
// Création : 30/6/2016 par JM CARTRON
// Mise à jour : 4/9/2016 par JM CARTRON

// liste des méthodes statiques de cette classe (dans l'ordre alphabétique) :

// convertirEnDateFR        : convertit une date US (a-m-j) au format Français (j/m/a)
// convertirEnDateUS        : convertit une date française (j/m/a) au format US (a-m-j)
// corrigerDate             : remplace les "/" par des "-"
// corrigerPrenom           : met en majuscules le premier caractère, et le caractère qui suit un éventuel tiret
// corrigerTelephone        : met le numéro sous la forme de 5 groupes de 2 chiffres séparés par des points
// corrigerVille            : met la ville en majuscules et remplace les "SAINT" par "St"
// creerMdp                 : créer un mot de passe aléatoire de 8 caractères
// envoyerMail              : envoyer un mail à un destinataire
// estUnCodePostalValide    : validation d'un code postal (il doit comporter 5 chiffres)
// estUneAdrMailValide      : validation d'une adresse mail
// estUneDateValide         : validation d'une date (format jj/mm/aaaa ou bien jj-mm-aaaa)
// estUnNumTelValide        : validation d'un numéro de téléphone (5 groupes de 2 chiffres EVENTUELLEMENT séparés)

// ce fichier est destiné à être inclus dans les pages PHP qui ont besoin des fonctions qu'il contient
// 2 possibilités pour inclure ce fichier :
//     include_once ('Class.Outils.php');
//     require_once ('Class.Outils.php');

// ces méthodes statiques sont appelées avec la notation suivante :
//     Outils::methode(parametres);

// début de la classe Outils
class Outils
{

	// La fonction dateFR convertit une date US (a-m-j) au format Français (j/m/a)
	// par exemple, le paramètre '2007-05-16' donnera '16/05/2007'
	public static function convertirEnDateFR ($laDate)
	{	$tableau = explode ("-", $laDate);		// on extrait les segments de la chaine $laDate séparés par des "/"
		$an = $tableau[0];
		$mois = $tableau[1];
		$jour = $tableau[2];
		return ($jour . "/" . $mois . "/" . $an);		// on les reconcatène dans un ordre différent
	}
			
	// La fonction dateUS convertit une date française (j/m/a) au format US (a-m-j)
	// par exemple, le paramètre '16/05/2007' donnera '2007-05-16'
	public static function convertirEnDateUS ($laDate)
	{	$tableau = explode ("/", $laDate);		// on extrait les segments de la chaine $laDate séparés par des "/"
		$jour = $tableau[2];
		$mois = $tableau[1];
		$an = $tableau[0];
		return ($an . "-" . $mois . "-" . $jour);		// on les reconcatène dans un ordre différent
	}
	
	// remplace les "/" par des "-"
	public static function corrigerDate ($laDate)
	{
		$temporaire = str_replace ("-", "/", $laDate);
		return $temporaire;
	}
	
	// met en majuscules le premier caractère, et le caractère qui suit un éventuel tiret (le reste en minuscules)
	public static function corrigerPrenom ($lePrenom)
	{	if ($lePrenom != "")
		{	$longueur = strlen($lePrenom);
			$position = strpos($lePrenom, "-");
			if ($position = 0)
			{	$partie1 = substr ($lePrenom, 0 , 1);
				$partie2 = substr ($lePrenom, 1 , $longueur-1);
				$lePrenom = strtoupper($partie1) . strtolower($partie2);
			}
			else
			{	$partie1 = substr ($lePrenom, 0 , 1);
				$partie2 = substr ($lePrenom, 1 , $position-1);
				$partie3 = substr ($lePrenom, $position + 1, 1);
				$partie4 = substr ($lePrenom, $position + 2, $longueur-$position-2);
				$lePrenom = strtoupper($partie1) . strtolower($partie2) . "-" . strtoupper($partie3) . strtolower($partie4);
			}
		}
		return $lePrenom;
	}
	
	// met le numéro sous la forme de 5 groupes de 2 chiffres séparés par des points
	public static function corrigerTelephone ($leNumero)
	{	$temporaire = $leNumero;
		$temporaire = str_replace (" ", "", $temporaire);	// supprime les espaces
		$temporaire = str_replace (".", "", $temporaire);	// supprime les points
		$temporaire = str_replace (",", "", $temporaire);	// supprime les virgules
		$temporaire = str_replace ("-", "", $temporaire);	// supprime les tirets
		$temporaire = str_replace ("_", "", $temporaire);	// supprime les underscore
		$temporaire = str_replace ("/", "", $temporaire);	// supprime les slash
		
		if (strlen($temporaire) == 10 )		// il ne doit rester que les 10 chiffres...
		{   $resultat =             substr ($temporaire, 0, 2) . ".";
			$resultat = $resultat . substr ($temporaire, 2, 2) . ".";
			$resultat = $resultat . substr ($temporaire, 4, 2) . ".";
			$resultat = $resultat . substr ($temporaire, 6, 2) . ".";
			$resultat = $resultat . substr ($temporaire, 8, 2);
			return $resultat;
		}
		else
		{   return $leNumero;
		}
	}
	
	// met la ville en majuscules et remplace les "SAINT" par "St"
	public static function corrigerVille ($laVille)
	{	$temporaire = $laVille;
		$temporaire = str_replace ("é", "e", $temporaire);
		$temporaire = str_replace ("è", "e", $temporaire);
		$temporaire = str_replace ("ê", "e", $temporaire);
		$temporaire = str_replace ("à", "a", $temporaire);
		$temporaire = str_replace ("ô", "o", $temporaire);
		$temporaire = str_replace ("î", "i", $temporaire);
		$temporaire = strtoupper ($temporaire);
		$temporaire = str_replace ("SAINTE ", "Ste ", $temporaire);
		$temporaire = str_replace ("SAINTE-", "Ste ", $temporaire);
		$temporaire = str_replace ("SAINT ", "St ", $temporaire);
		$temporaire = str_replace ("SAINT-", "St ", $temporaire);
		return $laVille;
	}

	// crée un mot de passe aléatoire de 8 caractères (4 syllabes avec 1 consonne et 1 voyelle)
	public static function creerMdp ()
	{   $consonnes = "bcdfghjklmnpqrstvwxz";
		$voyelles = "aeiouy";
		$mdp = "";
		// on construit 4 syllabes de 2 caractères
		for ($i = 1 ; $i <= 4 ; $i++)
		{   // on tire d'abord une consonne (position aléatoire entre 0 et le nombre de consonnes - 1)
			$position = rand (0, strlen($consonnes)-1);
			// on récupère la consonne correspondant à la position dans $consonnes
			$unCaract = substr ($consonnes, $position, 1);
			// on ajoute cette consonne au mot de passe
			$mdp = $mdp . $unCaract;
			// puis on tire une voyelle (position aléatoire entre 0 et le nombre de voyelles - 1)
			$position = rand (0, strlen($voyelles)-1);
			// on récupère la voyelle correspondant à la position dans $voyelles
			$unCarac = substr ($voyelles, $position, 1);
			// on ajoute cette voyelle au mot de passe
			$mdp = $mdp . $unCaract;
		}
		return $mdp;
	}

	// envoie un mail à un destinataire
	// retourne true si envoi correct, false en cas de problème d'envoi
	public static function  envoyerMail ($adresseDestinataire="leveque.melvin@gmail.com", $sujet, $message, $adresseEmetteur)
	{	// utilisation d'une expression régulière pour vérifier si c'est une adresse Gmail :
		if ( preg_match ( "#^.+@gmail\.com$#" , $adresseDestinataire) == true) {
			// on commence par enlever les points dans l'adresse gmail car ils ne sont pas pris en compte
			$adresseDestinataire = str_replace(".", "", $adresseDestinataire);
			// puis on remet le point de "@gmail.com"
			$adresseDestinataire = str_replace("@gmailcom", "@gmail.com", $adresseDestinataire);
		}
		// envoi du mail avec la fonction mail de PHP
		try {
			$ok = mail($adresseDestinataire , $sujet , $message, "From: " . $adresseEmetteur);
			return $ok;
		}
		catch (Exception $ex) {
			return false;
		}
	}

	//verifie et insert une photo dans le fichier images du serveur
	//retourne true si insertion correcte, false si probleme
	public static function ajoutPhoto ($photo)
	{

	}
	
	// fournit true si $codePostalAvalider est un code postal valide (5 chiffres), false sinon
	public static function estUnCodePostalValide($codePostalAvalider)
	{	// utilisation d'une expression régulière pour vérifier un code postal :
		$EXPRESSION = "#^[0-9]{5,5}$#";
		// on retourne true si le code est bon, mais aussi si le code est vide :
		if ( preg_match ( $EXPRESSION , $codePostalAvalider ) == true || $codePostalAvalider == "" ) return true; else return false;
	}	

	// fournit true si $adrMailAvalider est une adresse valide, false sinon
	public static function  estUneAdrMailValide ($adrMailAvalider)
	{	// utilisation d'une expression régulière pour vérifier une adresse mail :
		$EXPRESSION = "#^.+@.+\..+$#";
		// on retourne true si l'adresse est bonne, mais aussi si l'adresse est vide :
		if ( preg_match ( $EXPRESSION , $adrMailAvalider) == true || $adrMailAvalider == "" ) return true; else return false;
	}
	
	// fournit true si $laDateAvalider est une date valide (format jj/mm/aaaa ou bien jj-mm-aaaa), false sinon
	public static function estUneDateValide ($laDateAvalider)
	{	// on retourne true si la date est vide :
		if ( $laDateAvalider == "" ) return true;
		
		// utilisation d'une expression régulière pour vérifier le format de la date :
		$EXPRESSION = "#^[0-9]{2,2}(/|-)[0-9]{2,2}(/|-)[0-9]{4,4}$#";
		if ( preg_match ( $EXPRESSION , $laDateAvalider) == false) return false;
		
		// jusque là, tout va bien ! on extrait les 3 sous-chaines et on les convertit en 3 entiers :
		$chaine1 = substr ($laDateAvalider, 0, 2);
		$chaine2 = substr ($laDateAvalider, 3, 2);
		$chaine3 = substr ($laDateAvalider, 6, 4);
		$jour = (int)($chaine1);
		$mois = (int)($chaine2);
		$an = (int)($chaine3);
	
		// test des valeurs
		if ( $mois < 0 && $mois > 12 && $jour < 0 && $jour > 31 )
			return false;
		else
		{   // cas des mois de 30 jours
			if ( ( $mois == 4 || $mois == 6 || $mois == 9 || $mois == 11 ) && ( $jour > 30 ) )
				return false;
			else
			{   // cas du mois de février
				// % est l'opérateur modulo ; il permet de tester si $an est multiple de 4, de 100 ou de 400
				if ((($an % 4) == 0 && ($an % 100) != 0) || ($an % 400) == 0)
					$bissextile = true;
				else
					$bissextile = false;
				if ( $mois == 2 && $bissextile == false && $jour > 28 )
					return false;
				else
				{   if ( $mois == 2 && $bissextile == true && $jour > 29 )
					{   return false;
					}
				}
			}
		}
		// si on arrive ici, c'est que la date est bonne :
		return true;
	}
	
	// fournit true si $numTelAvalider est un numéro de téléphone valide, false sinon
	public static function  estUnNumTelValide ($numTelAvalider)
	{	// utilisation d'une expression régulière pour vérifier un numéro de téléphone
		// les séparateurs entre les groupes de 2 chiffres sont facultatifs
		// les seuls séparateurs autorisés sont l'espace, le point, le tiret, le tiret bas (underscore) et le slash (/)
		$EXPRESSION = "#^([0-9]{2,2}( |.|-|_|/)?){4,4}[0-9]{2,2}$#";
		// on retourne true si le numéro est bon, mais aussi si le numéro est vide :
		if ( preg_match ( $EXPRESSION , $numTelAvalider) == true || $numTelAvalider == "" ) return true; else return false;
	}
	
	public static function sec_session_start() {
	    $session_name = 'sec_session_id';   // Attribue un nom de session
	    $secure = SECURE;
	    // Cette variable emp�che Javascript d�acc�der � l�id de session
	    $httponly = true;
	    // Force la session � n�utiliser que les cookies
	    if (ini_set('session.use_only_cookies', 1) === FALSE) {
	        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
	        exit();
	    }
	    // R�cup�re les param�tres actuels de cookies
	    $cookieParams = session_get_cookie_params();
	    session_set_cookie_params($cookieParams["lifetime"],
	        $cookieParams["path"],
	        $cookieParams["domain"],
	        $secure,
	        $httponly);
	    // Donne � la session le nom configur� plus haut
	    session_name($session_name);
	    session_start();            // D�marre la session PHP
	    session_regenerate_id();    // G�n�re une nouvelle session et efface la pr�c�dente
	}
} // fin de la classe Outils

// ATTENTION : on ne met pas de balise de fin de script pour ne pas prendre le risque
// d'enregistrer d'espaces après la balise de fin de script !!!!!!!!!!!!
