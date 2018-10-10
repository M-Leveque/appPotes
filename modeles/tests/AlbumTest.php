<?php
use PHPUnit\Framework\TestCase;

include_once "../Album.class.php";
include_once "../Utilisateur.class.php";
include_once "../Emoticon.class.php";
include_once "../Evenement.class.php";

class AlbumTest extends TestCase
{
  //Valid Emoticon
  private $id = 1;
  private $nom = "2017-2018";
  private $priver = false;
  private $visuel = "/images/img.png";

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

  private function constructAlbumValid(){
    $evenement = $this->constructEvenementValid();
    $utilisateur = $this->constructUtilisateurValid();

    $album = new Album($this->id, $this->nom, $this->priver, $this->visuel, $evenement, $utilisateur);
    return $album;
  }

  public function testConstruct()
  {
      $album = $this->constructAlbumValid();

      $this->assertSame($album->getId(), $this->id);
      $this->assertSame($album->getNom(), $this->nom);
      $this->assertSame($album->getPriver(), $this->priver);
      $this->assertSame($album->getVisuel(), $this->visuel);
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
   * @expectedException Error
   */
  public  function  testSetUtilisateurException(){
    $album = $this->constructEvenementValid();
    $album->setUtilisateur(35);
  }

  /**
   * @expectedException Exception
   */
  public function testSetUtilisateurObjectException(){
    $album = $this->constructAlbumValid();
    $album->setUtilisateur($album);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetEvenementException(){
    $album = $this->constructAlbumValid();
    $album->setEvenement("chaine de caracteres");
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetEvenementObjectException(){
    $album = $this->constructAlbumValid();
    $album->setEvenement($album);
  }
}
