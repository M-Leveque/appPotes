<?php
use PHPUnit\Framework\TestCase;

include_once "../Emoticon.class.php";

class EmoticonTest extends TestCase
{
  //Valid Emoticon
  private $id = 1;
  private $titre = "emoticonTest";
  private $chemin = "/images/img.php";

  private function constructEmoticonValid(){
    $emoticon = new Emoticon($this->id, $this->titre, $this->chemin);
    return $emoticon;
  }

  public function testConstruct()
  {
      $emoticon = $this->constructEmoticonValid();

      $this->assertSame($emoticon->getId(), $this->id);
      $this->assertSame($emoticon->getTitre(), $this->titre);
      $this->assertSame($emoticon->getChemin(), $this->chemin);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetIdException(){
    $emoticon = $this->constructEmoticonValid();
    $emoticon->setId('s');
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetTitreException(){
    $emoticon = $this->constructEmoticonValid();
    $emoticon->setTitre("CeTitreEstBeaucoupTropLong"); //chaine de 23 caracteres
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetCheminException(){
    $emoticon = $this->constructEmoticonValid();
    $emoticon->setTitre(null); //chaine de 23 caracteres
  }
}
