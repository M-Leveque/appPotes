<?php
ini_set('error_reporting', false);
use PHPUnit\Framework\TestCase;

include_once "../Photo.class.php";

class PhotoTest extends TestCase
{
  //Valid Photo
  private $id = 1;
  private $titre = "002.png";
  private $chemin = '/images/img.png';
  private $compteur = 0;
  private $date = '2018-05-04';
  private $dateU = '2018-06-04';
  private $idU = 1;
  private $idA = 1;

  private function constructPhotoValid(){

    $photo = new Photo($this->id, $this->titre, $this->chemin, $this->compteur, $this->date, $this->dateU, $this->idU, $this->idA);
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
    $this->assertSame($photo->getIdU(), $this->idU);
    $this->assertSame($photo->getIdA(), $this->idA);
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
  public function testSetIdUNullException(){
    $photo = $this->constructPhotoValid();
    $photo->setIdU(null); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdUNonIntException(){
    $photo = $this->constructPhotoValid();
    $photo->setIdU("qfe"); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdANullExeption(){
    $photo = $this->constructPhotoValid();
    $photo->setIdA(null); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdAInfZeroExeption(){
    $photo = $this->constructPhotoValid();
    $photo->setIdA(-65); //chaine de 21 caracteres
  }

}
