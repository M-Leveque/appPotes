<?php
//---------- Page de test -----------
//---------- Class UtilisateurDAO  -----------
require_once('modeles/src/DAO/UtilisateurDAO.class.php');

$utilisateurDao = new UtilisateurDAO();
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

//---------- Test de la methode login ----------
echo "Test<BR><BR>";

echo "---- fonction login<BR>";
//Connexion reussi -----
//Test de cas Reussi (Bon login / bon mdp)
echo "Cas Reussi : Administrateur : bon login / bon mdp :<BR>";
if ($utilisateurDao->login("Administrateur@administrateur.com", "Administrateur1")) echo $reussi; else echo $echec;

echo "<BR>Cas Reussi : Utilisateur : bon login / bon mdp :<BR>";
if ($utilisateurDao->login("Utilisateur@utilisateur.com", "Utilisateur1")) echo $reussi; else echo $echec;

echo "<BR>Cas Reussi : Visiteur : bon login / bon mdp :<BR>";
if ($utilisateurDao->login("Visiteur@visiteur.com", "Visiteur1")) echo $reussi; else echo $echec;

//Connexion echec -----
//Test de cas Echec (Mauvais login / Mauvais mdp)
echo "<BR>Cas Echec : mauvais login / mauvais mdp :<BR>";
if (!$utilisateurDao->login("Administrateur@admin.com", "Administrateur")) echo $reussi; else echo $echec;

//Test de cas Echec (bon login / Mauvais mdp)
echo "<BR>Cas Echec : bon login / mauvais mdp :<BR>";
if (!$utilisateurDao->login("Administrateur@administrateur.com", "Administrateur")) echo $reussi; else echo $echec;

//Test de cas Echec (Mauvais login / bon mdp)
echo "<BR>Cas Echec : mauvais login / bon mdp :<BR>";
if (!$utilisateurDao->login("Administrateur@admin.com", "Administrateur1")) echo $reussi; else echo $echec;

//Test de cas Echec (null)
echo "<BR>Cas Echec : donnees null :<BR>";
if (!$utilisateurDao->login(null, null)) echo $reussi; else echo $echec;

//---------- Test de la methode get ----------
echo "<BR><BR>---- fonction get<BR>";
//Recuperation reussi -----
//Test de cas Reussi (Donnees correct)
echo "Cas Reussi : donnees correct :<BR>";
if ($utilisateurDao->get(1)) echo $reussi; else echo $echec;
//Recuperation echoc -----
//Test de cas Echec
echo "<BR>Cas Echec : non numerique :<BR>";
if (!$utilisateurDao->get("echec")) echo $reussi; else echo $echec;

echo "<BR>Cas Echec : superieur a 0 :<BR>";
if (!$utilisateurDao->get(-1)) echo $reussi; else echo $echec;

echo "<BR>Cas Echec : utilisateur inconnu :<BR>";
if (!$utilisateurDao->get(12)) echo $reussi; else echo $echec;

//---------- Test de la methode getAll  ----------
echo "<BR><BR>---- fonction getAll<BR>";
//Creation d'un tableau d'utilisateurs comforme aux donnees attendu
$i = 0;
$utilisateurs = array(new Utilisateur(
  1, 0,'Visiteur@visiteur.com', 'Visiteur1', 'Visiteur', 'img.png', false
), new Utilisateur(
  2, 1,'Utilisateur@utilisateur.com', 'Utilisateur1', 'Utilisateur', 'img.png', false
), new Utilisateur(
  3, 2,'Administrateur@administrateur.com', 'Administrateur1', 'Administrateur', 'img.png', false
));
//Test si la fonction retourne le bon resultat
foreach ($utilisateurDao->getAll() as $utilisateur) {
  if ($i >= sizeof($utilisateurs)){ $result = false; break; }
  if ($utilisateur->getId() == $utilisateurs[$i]->getId()){
    $result = true;}else{$result = false; break;}
  if ($utilisateur->getNiveau() == $utilisateurs[$i]->getNiveau()){
   $result = true;} else {$result = false; break;}
  if ($utilisateur->getMail() == $utilisateurs[$i]->getMail()){
   $result = true;} else {$result = false; break;}
  if ($utilisateur->getPseudo() == $utilisateurs[$i]->getPseudo()){
   $result = true;} else {$result = false; break;}
  if ($utilisateur->getPhoto() == $utilisateurs[$i]->getPhoto()){
   $result = true;} else {$result = false; break;}
  if ($utilisateur->getTmp() == $utilisateurs[$i]->getTmp()){
   $result = true;} else {$result = false; break;}
  $i++;
}
if($result) echo $reussi; else echo $echec;

//---------- Test de la methode set ----------
echo "<BR><BR>---- fonction set<BR>";
//Utilisateur a mettre a jour
$utilisateur = $utilisateurDao->get(1);
$utilisateur->setPseudo("Visiteur1");
$utilisateurDao->set($utilisateur);
if($utilisateurDao->get(1)->getPseudo() == "Visiteur1") echo $reussi; else echo $echec;
//Initialisation du pseudo a Visiteur
$utilisateur->setPseudo("Visiteur");
$utilisateurDao->set($utilisateur);

//---------- Test de la methode add ----------
echo "<BR><BR>---- fonction add<BR>";
//Utilisateur a ajouter
$utilisateur = new utilisateur(4, 0,'Administrateur2@administrateur.com', 'Administateur1', 'Admin2', 'img.png', false);
$utilisateurDao->add($utilisateur);
if(boolVal($utilisateurDao->get(4))) echo $reussi; else echo $echec;

//---------- Test de la methode delete ----------
echo "<BR><BR>---- fonction delete<BR>";
//supression de l'utilisateur 4
$utilisateurDao->delete(4);
if(!$utilisateurDao->get(4)) echo $reussi; else echo $echec;

//---------- Test de la methode setMdp ----------
echo "<BR><BR>---- fonction setMdp<BR>";
//Modification du mdp de l utilisateur 1
$utilisateurDao->setMdp(1, "Visiteur1", "Visiteur");
if($utilisateurDao->login("Visiteur@visiteur.com", "Visiteur"))echo $reussi; else echo $echec;

// ferme la connexion à MySQL :
unset($dao);
