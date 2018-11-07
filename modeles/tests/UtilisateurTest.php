<?php
ini_set('error_reporting', false);
use PHPUnit\Framework\TestCase;

include_once "../Utilisateur.class.php";

class UtilisateurTest extends TestCase
{
  //Valid User
  private $id = 1;
  private $niveau = 0;
  private $mail = 'visiteur@visiteur.com';
  private $mdp = 'visiteur';
  private $pseudo = 'Visiteur1';
  private $photo = 'photo.png';
  private $tmp = false;

  private function constructUtilisateurValid(){
    $utilisateur = new Utilisateur($this->id, $this->niveau, $this->mail, $this->mdp, $this->pseudo, $this->photo, $this->tmp);
    return $utilisateur;
  }

  public function testConstruct()
  {
      $utilisateur = $this->constructUtilisateurValid();

      $this->assertSame($utilisateur->getId(), $this->id);
      $this->assertSame($utilisateur->getNiveau(), $this->niveau);
      $this->assertSame($utilisateur->getMail(), $this->mail);
      $this->assertSame($utilisateur->getMdp(), $this->mdp);
      $this->assertSame($utilisateur->getPseudo(), $this->pseudo);
      $this->assertSame($utilisateur->getPhoto(), $this->photo);
      $this->assertSame($utilisateur->getTmp(), $this->tmp);

  }

  /**
   * @expectedException Exception
   */
  public  function  testSetIdNonIntegerException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setId('s');
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdNullException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setId(null);
  }

  /**
   * @expectedException Exception
   */
  public function testSetIdInfZeroException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setId(-2);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetNiveauException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setNiveau(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetMailException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setMail(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetMdpInf70Exception(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setMdp('sdfremdlfpeorjfkghvjcndbfhjgjefredfrtghrnfdkrjtkgfsdfremdlfpeorjfkghvjcndbfhjgjefredfrtghrnfdkrjtkgf'); //Chaine de 102 caractères
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetMdpNullException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setMdp(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetPseudoSup20Exception(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setPseudo('sjdkfleoritufhryetdgd'); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetPseudoNullException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setPseudo(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetPhotoException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setPhoto(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetTmpNullException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setTmp(null);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetTmp1Exception(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setTmp(1);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetTmp0Exception(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setTmp(0);
  }
}
