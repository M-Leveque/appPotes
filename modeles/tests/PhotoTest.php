<?php
use PHPUnit\Framework\TestCase;

include_once "../Photo.class.php";
include_once "../Utilisateur.class.php";
include_once "../Emoticon.class.php";
include_once "../Evenement.class.php";
include_once "../Album.class.php";

class PhotoTest extends TestCase
{
  //Valid Photo
  private $id = 1;
  private $titre = "002.png";
  private $chemin = '/images/img.png';
  private $compteur = 0;
  private $date = '2018-05-04';
  private $dateU = '2018-06-04';

  private function constructUtilisateurValid(){
    $utilisateur = new Utilisateur(1, 0, 'visiteur@visiteur.com', 'visiteur', 'Visiteur1', 'photo.png', false);
    return $utilisateur;
  }

  private function constructEmoticonValid(){
    $emoticon = new Emoticon(1, "emoticonTest", "/images/img.php");
    return $emoticon;
  }

  private function constructEvenementValid(){
    $utilisateur = $this->constructUtilisateurValid();
    $emoticon = $this->constructEmoticonValid();

    $evenement = new Evenement(1, "Annivairsaire frank", "Fete pour l'annivairsaire de franck :)", "2018-07-11", "2018-08-11 21:03:03", false, $utilisateur, $emoticon);
    return $evenement;
  }

  private function constructAlbumValid(){
    $evenement = $this->constructEvenementValid();
    $utilisateur = $this->constructUtilisateurValid();

    $album = new Album(1, "2017-2018", false, "/images/img.png", $evenement, $utilisateur);
    return $album;
  }

  private function constructPhotoValid(){
    $utilisateur = $this->constructUtilisateurValid();
    $album = $this->constructAlbumValid();
    $photo = new Photo($this->id, $this->titre, $this->chemin, $this->compteur, $this->date, $this->dateU, $utilisateur, $album);
    return $photo;
  }

  public function testConstruct()
  {
    $photo = $this->constructPhotoValid();

    $this->assertSame($photo->getId(), $this->id);
    $this->assertSame($photo->getTitre(), $this->titre);
    $this->assertSame($photo->getChemin(), $this->chemin);
    $this->assertSame($photo->getCompteur(), $this->compteur);
    $this->assertSame($photo->getDate(), $this->date);
    $this->assertSame($photo->getDateU(), $this->dateU);
  }

  /**
   * @expectedException Exception
   */
  public function testIdNullException(){
    $photo = $this->constructPhotoValid();
    $photo->setId(null);
  }

  /**
   * @expectedException Exception
   */
  public function testIdInfZeroException(){
    $photo = $this->constructPhotoValid();
    $photo->setId(-2);
  }

  /**
   * @expectedException Exception
   */
  public function testIdNonIntException(){
    $photo = $this->constructPhotoValid();
    $photo->setId("s");
  }

  /**
   * @expectedException Exception
   */
  public function testTitreNullException(){
    $photo = $this->constructPhotoValid();
    $photo->setTitre(null);
  }

  /**
   * @expectedException Exception
   */
  public function testTitreNotStringlException(){
    $photo = $this->constructPhotoValid();
    $photo->setTitre(33);
  }

  /**
   * @expectedException Exception
   */
  public function testTitreSup20Exception(){
    $photo = $this->constructPhotoValid();
    $photo->setTitre("mdlfkgjrheydurytufdhd"); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testCheminNullException(){
    $photo = $this->constructPhotoValid();
    $photo->setChemin(null); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testCompteurNullException(){
    $photo = $this->constructPhotoValid();
    $photo->setCompteur(null); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testCompteurNotIntException(){
    $photo = $this->constructPhotoValid();
    $photo->setCompteur("s"); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testCompteurInfZeroException(){
    $photo = $this->constructPhotoValid();
    $photo->setCompteur(-2); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testDateNullException(){
    $photo = $this->constructPhotoValid();
    $photo->setDate(null); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testDateInvalideException(){
    $photo = $this->constructPhotoValid();
    $photo->setDate("2018-25-32"); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testDateUNullException(){
    $photo = $this->constructPhotoValid();
    $photo->setDateU(null); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testDateUInvalideException(){
    $photo = $this->constructPhotoValid();
    $photo->setDateU("2018-25-32"); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testUtilisateurNullException(){
    $photo = $this->constructPhotoValid();
    $photo->setUtilisateur(null); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testUtilisateurMauvaisObjectException(){
    $photo = $this->constructPhotoValid();
    $photo->setUtilisateur($photo); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testAlbumNullException(){
    $photo = $this->constructPhotoValid();
    $photo->setAlbum(null); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testAlbumMauvaisObjectException(){
    $photo = $this->constructPhotoValid();
    $photo->setAlbum($photo); //chaine de 21 caracteres
  }

}
