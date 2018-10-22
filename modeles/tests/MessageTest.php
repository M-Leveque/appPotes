<?php
ini_set('error_reporting', false);
use PHPUnit\Framework\TestCase;

include_once "../Message.class.php";
include_once "../Utilisateur.class.php";
include_once "../Emoticon.class.php";
include_once "../Evenement.class.php";

class MessageTest extends TestCase
{
  //Valid Message
  private $id = 2;
  private $contenu = "Vous savez quand c'est les vacances ?";
  private $idE = 1;
  private $idU = 1;


  private function constructMessageValid(){

    $message = new Message($this->id, $this->contenu, $this->idE, $this->idU);
    return $message;
  }

  public function testConstruct()
  {
      $message = $this->constructMessageValid();

      $this->assertSame($message->getId(), $this->id);
      $this->assertSame($message->getContenu(), $this->contenu);
      $this->assertSame($message->getIdE(), $this->idE);
      $this->assertSame($message->getIdU(), $this->idU);
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdNonIntegerException(){
    $message = $this->constructMessageValid();
    $message->setId('s');
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdNullException(){
    $message = $this->constructMessageValid();
    $message->setId(null);
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdInfZeroException(){
    $message = $this->constructMessageValid();
    $message->setId(-2);
  }

  /**
  * @expectedException Exception
  */
  public function testSetContenuNullException(){
    $message = $this->constructMessageValid();
    $message->setContenu(null); //chaine > 50
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetIdUNullException(){
    $message = $this->constructMessageValid();
    $message->setIdU(null);
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdUNonIntException(){
    $message = $this->constructMessageValid();
    $message->setIdU("qzfe");
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetIdENullException(){
    $message = $this->constructMessageValid();
    $message->setIdE(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetIdEInfZeroException(){
    $message = $this->constructMessageValid();
    $message->setIdE(-25);
  }
}
