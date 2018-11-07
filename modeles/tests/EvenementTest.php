<?php
ini_set('error_reporting', false);
use PHPUnit\Framework\TestCase;

include_once "../Evenement.class.php";
include_once "../Utilisateur.class.php";
include_once "../Emoticon.class.php";

class EvenementTest extends TestCase
{
  //Valid Evemenement
  private $id = 1;
  private $titre = "Annivairsaire frank";
  private $description = "Fete pour l'annivairsaire de franck :)";
  private $dateC = "2018-07-11";
  private $dateTime = "2018-08-11 21:02:03";
  private $archiver = false;
  private $idU = 2;
  private $idE = 1;


  private function constructEvenementValid(){

    $evenement = new Evenement($this->id, $this->titre, $this->description, $this->dateC, $this->dateTime, $this->archiver, $this->idU);
    return $evenement;
  }

  public function testConstruct()
  {
      $evenement = $this->constructEvenementValid();

      $this->assertSame($evenement->getId(), $this->id);
      $this->assertSame($evenement->getTitre(), $this->titre);
      $this->assertSame($evenement->getDescription(), $this->description);
      $this->assertSame($evenement->getDateC(), $this->dateC);
      $this->assertSame($evenement->getDateTime(), $this->dateTime);
      $this->assertSame($evenement->getArchiver(), $this->archiver);
      $this->assertSame($evenement->getIdU(), $this->idU);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetIdNonIntException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setId('s');
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetIdNullException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setId(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetIdInfZeroException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setId(-2);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetTitreSup20Exception(){
    $evenement = $this->constructEvenementValid();
    $evenement->setTitre('Anniversaire de franck'); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetTitreNullException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setTitre(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetDescriptionException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setDescription(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetDateCMauvaiseException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setDateC("2021-52-54"); //insertion d'une date non valid
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetDateCNullException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setDateC(null); //insertion d'une date non valid
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetDateTimeMauvaisException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setDateTime("2021-52-54 55:55:55");
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetDateTimeNullException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setDateTime(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetArchiverException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setArchiver(2);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetArchiverNullException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setArchiver(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetUtilisateurNonInt(){
    $evenement = $this->constructEvenementValid();
    $evenement->setIdU("qe");
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetUtilisateurInfZeroException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setIdU(-25);
  }
}
