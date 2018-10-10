<?php
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

  private function asserUtilisateur($utilisateur1, $utilisateur2){
    $this->assertEquals($utilisateur1->getId(), $utilisateur2->getId());
    $this->assertEquals($utilisateur1->getNiveau(), $utilisateur2->getNiveau());
    $this->assertEquals($utilisateur1->getMail(), $utilisateur2->getMail());
    $this->assertEquals($utilisateur1->getPseudo(), $utilisateur2->getPseudo());
    $this->assertEquals($utilisateur1->getPhoto(), $utilisateur2->getPhoto());
    $this->assertEquals($utilisateur1->getTmp(), $utilisateur2->getTmp());
  }

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

    $evenement = new Evenement($this->id, $this->titre, $this->description, $this->dateC, $this->dateTime, $this->archiver, $utilisateur, $emoticon);
    return $evenement;
  }

  public function testConstruct()
  {
      $evenement = $this->constructEvenementValid();
      $utilisateur = $this->constructUtilisateurValid();
      $emoticon = $this->constructEmoticonValid();

      $this->assertSame($evenement->getId(), $this->id);
      $this->assertSame($evenement->getTitre(), $this->titre);
      $this->assertSame($evenement->getDescription(), $this->description);
      $this->assertSame($evenement->getDateC(), $this->dateC);
      $this->assertSame($evenement->getDateTime(), $this->dateTime);
      $this->assertSame($evenement->getArchiver(), $this->archiver);
      $this->asserUtilisateur($evenement->getUtilisateur(), $utilisateur);
      $this->assertEquals($evenement->getEmoticon(), $emoticon);
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
   * @expectedException Error
   */
  public  function  testSetUtilisateurIntError(){
    $evenement = $this->constructEvenementValid();
    $evenement->setUtilisateur(35);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetUtilisateurMauvaisObjectException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setEmoticon($evenement);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetEmoticonChaineError(){
    $evenement = $this->constructEvenementValid();
    $evenement->setEmoticon("Chaine de caracteres");
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetEmoticonMauvaisObjectException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setEmoticon($evenement);
  }

}
