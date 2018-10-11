<?php
use PHPUnit\Framework\TestCase;

include_once "../Cagnotte.class.php";
include_once "../Utilisateur.class.php";
include_once "../Evenement.class.php";
include_once "../Emoticon.class.php";

class CagnotteTest extends TestCase
{
  private $id;
  private $titre;
  private $description;
  private $dateHeureFin;
  private $argentR;

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

  private function constructCagnotteValid(){
    $evenement = $this->constructEvenementValid();

    $cagnotte = new Cagnotte($this->id, $this->titre, $this->description, $this->dateHeureFin, $this->argentR, $evenement);
    return $cagnotte;
  }

  public function testConstruct()
  {
      $cagnotte = $this->constructCagnotteValid();

      $this->assertSame($cagnotte->getId(), $this->id);
      $this->assertSame($cagnotte->getTitre(), $this->titre);
      $this->assertSame($cagnotte->getDescription(), $this->description);
      $this->assertSame($cagnotte->getDateHeurefin(), $this->dateHeureFin);
      $this->assertSame($cagnotte->getArgentR(), $this->argentR);
      
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
