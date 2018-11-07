<?php
ini_set('error_reporting', false);

use PHPUnit\Framework\TestCase;

include_once "../Album.class.php";
include_once "../Outils.class.php";


class AlbumTest extends TestCase
{
  //Valid Album
  private $id = 1;
  private $nom = "2017-2018";
  private $description = "Photo des vancances";
  private $dateCreation = "2015-05-02";
  private $priver = false;
  private $visuel = "/images/img.png";
  private $idU = 1;
  private $idE = 1;

  public function testConstruct()
  {
      $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);

      $this->assertSame($album->getId(), $this->id);
      $this->assertSame($album->getNom(), $this->nom);
      $this->assertSame($album->getDescription(), $this->description);
      $this->assertSame($album->getDateCreation(), $this->dateCreation);
      $this->assertSame($album->getPriver(), $this->priver);
      $this->assertSame($album->getVisuel(), $this->visuel);
      $this->assertSame($album->getIdE(), $this->idE);
      $this->assertSame($album->getIdU(), $this->idU);
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdNonIntegerException(){
      $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
      $album->setId('s');
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdNullException(){
    $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
    $album->setId(null);
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdInfZeroException(){
    $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
    $album->setId(-2);
  }

  /**
  * @expectedException Exception
  */
  public function testSetNomSup50Exception(){
    $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
    $album->setNom('msldkfjghvjfhgjfhgjrutyturifjghryeidkfjgkeiruthfjcf'); //chaine > 50
  }

  /**
  * @expectedException Exception
  */
  public function testSetNomNonStringException(){
    $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
    $album->setNom(2);
  }

  /**
  * @expectedException Exception
  */
  public function testSetNomNullException(){
    $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
    $album->setNom(null);
  }

  /**
  * @expectedException Exception
  */
  public function testSetDescriptionNullException(){
    $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
    $album->setDescription(null);
  }

  /**
  * @expectedException Exception
  */
  public function testSetDateNullException(){
    $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
    $album->setDateCreation("2015-35-32");
  }
  /**
   * @expectedException Exception
   */
  public function testSetPriverIntException(){
    $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
    $album->setPriver(2);
  }

  /**
   * @expectedException Exception
   */
  public function testSetPriverNullException(){
    $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
    $album->setPriver(null);
  }

  /**
   * @expectedException Exception
   */
  public function testSetVisuelNonStringException(){
    $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
    $album->setVisuel(2);
  }

  /**
   * @expectedException Exception
   */
  public function testSetVisuelSup255Exception(){
    $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
    $album->setVisuel("mlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeyhdjfhrytueidjfhr");
    //chaine de 256 caracteres
  }

    /**
     * @expectedException Exception
     */
    public function testSetIdENonIntegerException(){
        $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
        $album->setIdE('s');
    }

    /**
     * @expectedException Exception
     */
    public function testSetIdENullException(){
        $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
        $album->setIdE(null);
    }

    /**
     * @expectedException Exception
     */
    public function testSetIdEInfZeroException(){
        $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
        $album->setIdE(-2);
    }

    /**
     * @expectedException Exception
     */
    public function testSetIdUNonIntegerException(){
        $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
        $album->setIdU('s');
    }

    /**
     * @expectedException Exception
     */
    public function testSetIdUNullException(){
        $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
        $album->setIdU(null);
    }

    /**
     * @expectedException Exception
     */
    public function testSetIdUInfZeroException(){
        $album = new Album($this->id, $this->nom, $this->description, $this->dateCreation, $this->priver, $this->visuel, $this->idE, $this->idU);
        $album->setIdU(-2);
    }
}
