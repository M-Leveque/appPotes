<?php
use PHPUnit\Framework\TestCase;

include_once "../Cagnotte.class.php";
include_once "../Utilisateur.class.php";
include_once "../Evenement.class.php";
include_once "../Emoticon.class.php";

class CagnotteTest extends TestCase
{
  private $id = 0;
  private $titre = "cagnote franck";
  private $description = "Acheter un cadeau";
  private $dateHeureFin = "2018-05-02 22:05:02";
  private $argentR = 100;

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
  public function testSetIdNullException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setId(null);
  }

 /**
  * @expectedException Exception
  */
  public function testSetIdNonIntException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setId("d");
  }

  /**
  * @expectedException Exception
  */
  public function testSetIdInfZeroException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setId(-2);
  }

  /**
  * @expectedException Exception
  */
  public function testSetDescriptionNullException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setDescription(null);
  }

  /**
  * @expectedException Exception
  */
  public function testSetDateHeureFinNullException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setDateHeureFin(null);
  }

  /**
  * @expectedException Exception
  */
  public function testSetDateHeureFinInvalideException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setDateHeureFin("2125-33-36 55:66:66");
  }

  /**
  * @expectedException Exception
  */
  public function testSetArgentRNullException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setArgentR(null);
  }

  /**
  * @expectedException Exception
  */
  public function testSetArgentRNonIntException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setArgentR("d");
  }

  /**
  * @expectedException Exception
  */
  public function testSetArgentRInfZeroException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setArgentR(-4);
  }

  /**
  * @expectedException Exception
  */
  public function testSetEvenementNonObjectException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setEvenement("d");
  }

  /**
  * @expectedException Exception
  */
  public function testSetEvenementMauvaisObjectException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setEvenement($cagnotte);
  }
}
