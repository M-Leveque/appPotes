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
  public  function  testSetIdNonIntegerException(){
    $emoticon = $this->constructEmoticonValid();
    $emoticon->setId('s');
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetIdNullException(){
    $emoticon = $this->constructEmoticonValid();
    $emoticon->setId(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetIdinfZeroException(){
    $emoticon = $this->constructEmoticonValid();
    $emoticon->setId(-1);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetTitreSup20Exception(){
    $emoticon = $this->constructEmoticonValid();
    $emoticon->setTitre("CeTitreEstBeaucoupTropLong"); //chaine de 23 caracteres
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetTitreNullException(){
    $emoticon = $this->constructEmoticonValid();
    $emoticon->setTitre(null); //chaine de 23 caracteres
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetCheminNullException(){
    $emoticon = $this->constructEmoticonValid();
    $emoticon->setTitre(null); //chaine de 23 caracteres
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetCheminSup255Exception(){
    $emoticon = $this->constructEmoticonValid();
    $emoticon->setTitre("5mlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlskdjfheymlkjh");
    //chaine de 256 caracteres
  }
}
