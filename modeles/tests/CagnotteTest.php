<?php
ini_set('error_reporting', false);
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
  private $idE = 1;

  private function constructCagnotteValid(){

    $cagnotte = new Cagnotte($this->id, $this->titre, $this->description, $this->dateHeureFin, $this->argentR, $this->idE);
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
  public function testSetIdENonIntException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setIdE("d");
  }

  /**
  * @expectedException Exception
  */
  public function testSetIdEInfZeroObjectException(){
    $cagnotte = $this->constructCagnotteValid();
    $cagnotte->setIdE(-25);
  }
}
