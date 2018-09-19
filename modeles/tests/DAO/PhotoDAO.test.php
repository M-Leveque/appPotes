<?php
//---------- Page de test -----------
//---------- Class PhotoDAO  -----------
require_once('modeles/src/DAO/PhotoDAO.class.php');

$photoDao = new PhotoDAO();
$reussi = "<font color='#8FCF3C'>Reussi</font>";
$echec = "<font color='#DB0B32'>Echec</font>";

//---------- Test de la methode login ----------
echo "Test<BR><BR>";

echo "---- fonction get<BR>";
//Recuperation reussi -----
//Test de cas Reussi (donnes valid)
echo "Cas Reussi : donnees valid :<BR>";
if ($photoDao->get(1))echo $reussi; else echo $echec;


//Recuperation echec -----
//Test de cas echec (donnes null)
echo "<BR>Cas Echec : donnees null :<BR>";
if (!$photoDao->get(null))echo $reussi; else echo $echec;

//Test de cas echec (donnes string)
echo "<BR>Cas Echec : donnees string :<BR>";
if (!$photoDao->get("c"))echo $reussi; else echo $echec;

//Test de cas echec (donnes < 0)
echo "<BR>Cas Echec : donnees < 0 :<BR>";
if (!$photoDao->get(-1))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction getAll<BR>";
//Test recuperation
$i = 0;
$photos = array(
  new photo(2, "Photo1", "/ressources/images/photo1.jpg", 0, "2018-05-02", "2018-05-03", 1, 1),
  new photo(1, "img002","/ressources/images/photo.png", 0, "2018-09-12", "2018-09-19",1 ,1)
);
foreach ($photoDao->getAll() as $photo) {
  if(sizeof($photoDao->getAll()) <= $i){ $result = false; break;}
  if($photo->getId() == $photos[$i]->getId()){$result = true;} else {$result = false; break;}
  if($photo->getTitre() == $photos[$i]->getTitre()){$result = true;} else {$result = false; break;}
  if($photo->getChemin() == $photos[$i]->getChemin()){$result = true;} else {$result = false; break;}
  if($photo->getCompteur() == $photos[$i]->getCompteur()){$result = true;} else {$result = false; break;}
  if($photo->getDate() == $photos[$i]->getDate()){$result = true;} else {$result = false; break;}
  if($photo->getDateU() == $photos[$i]->getDateU()){$result = true; }else {$result = false; break;}
  if($photo->getIdUtilisateur() == $photos[$i]->getIdUtilisateur()){$result = true;} else {$result = false; break;}
  if($photo->getIdAlbum() == $photos[$i]->getIdAlbum()){$result = true;} else {$result = false; break;}
}
if ($result) echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction set<BR>";
//Test UPDATE
//Photo à modifier
$photo = $photoDao->get(1);
$photo->setChemin("ressources/test/img.png");
$photoDao->set($photo);
//Test du changement
if($photoDao->get(1)->getChemin() == "ressources/test/img.png")echo $reussi; else echo $echec;
//On remet le chemin de base
$photo->setChemin("/ressources/images/photo.png");
$photoDao->set($photo);

echo "<BR><BR>---- fonction add<BR>";
//Test ADD
//Photo a ajouter
$photo = new Photo(3, "img003","/ressources/images/photo3.png", 0, "2018-09-12", "2018-09-19",1 ,1);
$photoDao->add($photo);
if($photoDao->get(3))echo $reussi; else echo $echec;

echo "<BR><BR>---- fonction delete<BR>";
//Test DELETE
$photoDao->delete(3);
if(!$photoDao->get(3))echo $reussi; else echo $echec;
