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
  public  function  testSetIdException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setId('s');
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetTitreException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setTitre('Anniversaire de franck'); //chaine de 21 caracteres
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
  public  function  testSetDateCException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setDateC("2021-52-54"); //insertion d'une date non valid
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetDateTimeException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setDateTime("2021-52-54 55:55:55");
  }
  /**
   * @expectedException Exception
   */
  public  function  testSetArchiverException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setArchiver(2);
  }

  /**
   * @expectedException Error
   */
  public  function  testSetUtilisateurError(){
    $evenement = $this->constructEvenementValid();
    $evenement->setUtilisateur(35);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetEmoticonError(){
    $evenement = $this->constructEvenementValid();
    $evenement->setEmoticon("Chaine de caracteres");
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetEmoticonException(){
    $evenement = $this->constructEvenementValid();
    $evenement->setEmoticon($evenement);
  }

}
