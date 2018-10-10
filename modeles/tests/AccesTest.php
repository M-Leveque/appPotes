<?php
use PHPUnit\Framework\TestCase;

include_once "../Acces.class.php";
include_once "../Utilisateur.class.php";
include_once "../Evenement.class.php";
include_once "../Emoticon.class.php";

class AccesTest extends TestCase
{

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

  private function constructAccesValid(){
    $evenement = $this->constructEvenementValid();
    $utilisateur = $this->constructUtilisateurValid();

    $acces = new Acces($utilisateur ,$evenement);
    return $acces;
  }

  private function assertSameUtilisateur($utilisateur1, $utilisateur2){
      $this->assertEquals($utilisateur1->getId(), $utilisateur2->getId());
      $this->assertEquals($utilisateur1->getNiveau(), $utilisateur2->getNiveau());
      $this->assertEquals($utilisateur1->getMail(), $utilisateur2->getMail());
      $this->assertEquals($utilisateur1->getPseudo(), $utilisateur2->getPseudo());
      $this->assertEquals($utilisateur1->getPhoto(), $utilisateur2->getPhoto());
      $this->assertEquals($utilisateur1->getTmp(), $utilisateur2->getTmp());
  }

  private function assertSameEvenement($evenement1, $evenement2){
    $this->assertSame($evenement1->getId(), $evenement2->getId());
    $this->assertSame($evenement1->getTitre(), $evenement2->getTitre());
    $this->assertSame($evenement1->getDescription(), $evenement2->getDescription());
    $this->assertSame($evenement1->getDateC(), $evenement2->getDateC());
    $this->assertSame($evenement1->getDateTime(), $evenement2->getDateTime());
    $this->assertSame($evenement1->getArchiver(), $evenement2->getArchiver());
    $this->assertSameUtilisateur($evenement1->getUtilisateur(), $evenement2->getUtilisateur());
    $this->assertEquals($evenement1->getEmoticon(), $evenement2->getEmoticon());
  }

  public function testConstruct()
  {
      $acces = $this->constructAccesValid();

      $this->assertSameUtilisateur($acces->getUtilisateur(), $this->constructUtilisateurValid());
      $this->assertSameEvenement($acces->getEvenement(), $this->constructEvenementValid());
  }

  /**
   * @expectedException Exception
   */
   public function testSetEvenementMauvaisObjectException(){
     $acces = $this->constructAccesValid();
     $acces->setEvenement($acces);
   }

  /**
   * @expectedException Exception
   */
   public function testSetEvenementNonObjectException(){
     $acces = $this->constructAccesValid();
     $acces->setEvenement(2);
   }

   /**
    * @expectedException Exception
    */
    public function testSetEvenementNullException(){
      $acces = $this->constructAccesValid();
      $acces->setEvenement(null);
    }

  /**
   * @expectedException Exception
   */
   public function testSetUtilisateurMauvaisObjectException(){
     $acces = $this->constructAccesValid();
     $acces->setUtilisateur($acces);
   }

   /**
    * @expectedException Exception
    */
    public function testSetUtilisateurNonObjectException(){
      $acces = $this->constructAccesValid();
      $acces->setUtilisateur(2);
    }

  /**
   * @expectedException Exception
   */
   public function testSetUtilisateurNullException(){
     $acces = $this->constructAccesValid();
     $acces->setUtilisateur(null);
   }
}
