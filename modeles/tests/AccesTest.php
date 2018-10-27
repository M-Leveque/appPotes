<?php
ini_set('error_reporting', false);
use PHPUnit\Framework\TestCase;

include_once "../Acces.class.php";
include_once "../Utilisateur.class.php";
include_once "../Evenement.class.php";
include_once "../Emoticon.class.php";

class AccesTest extends TestCase
{


    //Valid Acces
    private $idE = 1;
    private $idU = 2;

    public function testConstruct()
    {
      $acces = new Acces($this->idU, $this->idE);

      $this->assertEquals($acces->getIdU(), $this->idU);
      $this->assertEquals($acces->getIdE(), $this->idE);
    }

    /**
    * @expectedException Exception
    */
    public function testSetAccesNullIdU(){
        $acces = new Acces($this->idU, $this->idE);
        $acces->setIdU(null);
    }

    /**
     * @expectedException Exception
     */
    public function testSetAccesTrueIdU(){
        $acces = new Acces($this->idU, $this->idE);
        $acces->setIdU(true);
    }

    /**
     * @expectedException Exception
     */
    public function testSetAccesInf0IdU(){
        $acces = new Acces($this->idU, $this->idE);
        $acces->setIdU(-2);
    }

    /**
     * @expectedException Exception
     */
    public function testSetAccesNonIntIdU(){
        $acces = new Acces($this->idU, $this->idE);
        $acces->setIdU("string");
    }



    /**
     * @expectedException Exception
     */
    public function testSetAccesNullIdE(){
        $acces = new Acces($this->idU, $this->idE);
        $acces->setIdE(null);
    }

    /**
     * @expectedException Exception
     */
    public function testSetAccesInf0IdE(){
        $acces = new Acces($this->idU, $this->idE);
        $acces->setIdE(-2);
    }

    /**
     * @expectedException Exception
     */
    public function testSetAccesNonIntIdE(){
        $acces = new Acces($this->idU, $this->idE);
        $acces->setIdE("string");
    }

}
