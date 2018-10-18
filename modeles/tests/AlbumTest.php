<?php
ini_set('error_reporting', false);
use PHPUnit\Framework\TestCase;

include_once "../Album.class.php";

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
      $this->assertSale($album->getIdE(), $this->idE);
      $this->assertSale($album->getIdU(), $this->idU);
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdNonIntegerException(){
    $album = $this->constructAlbumValid();
    $album->setId('s');
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdNullException(){
    $album = $this->constructAlbumValid();
    $album->setId(null);
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdInfZeroException(){
    $album = $this->constructAlbumValid();
    $album->setId(-2);
  }

  /**
  * @expectedException Exception
  */
  public function testSetNomSup50Exception(){
    $album = $this->constructAlbumValid();
    $album->setNom('msldkfjghvjfhgjfhgjrutyturifjghryeidkfjgkeiruthfjcf'); //chaine > 50
  }

  /**
  * @expectedException Exception
  */
  public function testSetNomNonStringException(){
    $album = $this->constructAlbumValid();
    $album->setNom(2);
  }

  /**
  * @expectedException Exception
  */
  public function testSetNomNullException(){
    $album = $this->constructAlbumValid();
    $album->setNom(null);
  }

  /**
  * @expectedException Exception
  */
  public function testSetDescriptionNullException(){
    $album = $this->constructAlbumValid();
    $album->setDescription(null);
  }

  /**
  * @expectedException Exception
  */
  public function testSetDateNullException(){
    $album = $this->constructAlbumValid();
    $album->setDateCreation("2015-35-32");
  }
  /**
   * @expectedException Exception
   */
  public function testSetPriverIntException(){
    $album = $this->constructAlbumValid();
    $album->setPriver(2);
  }

  /**
   * @expectedException Exception
   */
  public function testSetPriverNullException(){
    $album = $this->constructAlbumValid();
    $album->setPriver(null);
  }

  /**
   * @expectedException Exception
   */
  public function testSetVisuelNonStringException(){
    $album = $this->constructAlbumValid();
    $album->setVisuel(2);
  }

  /**
   * @expectedException Exception
   */
  public function testSetVisuelSup255Exception(){
    $album = $this->constructAlbumValid();
    $album->setVisuel("mlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeymlkjhgdteyfurifhdjeyhdjfhrytueidjfhr");
    //chaine de 256 caracteres
  }

    /**
     * @expectedException Exception
     */
    public function testSetIdENonIntegerException(){
        $album = $this->constructAlbumValid();
        $album->setIdE('s');
    }

    /**
     * @expectedException Exception
     */
    public function testSetIdENullException(){
        $album = $this->constructAlbumValid();
        $album->setIdE(null);
    }

    /**
     * @expectedException Exception
     */
    public function testSetIdEInfZeroException(){
        $album = $this->constructAlbumValid();
        $album->setIdE(-2);
    }

    /**
     * @expectedException Exception
     */
    public function testSetIdUNonIntegerException(){
        $album = $this->constructAlbumValid();
        $album->setIdU('s');
    }

    /**
     * @expectedException Exception
     */
    public function testSetIdUNullException(){
        $album = $this->constructAlbumValid();
        $album->setIdU(null);
    }

    /**
     * @expectedException Exception
     */
    public function testSetIdUInfZeroException(){
        $album = $this->constructAlbumValid();
        $album->setIdU(-2);
    }
}
