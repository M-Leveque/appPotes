<?php
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
      $this->assertSame(true, password_verify( $this->mdp, $utilisateur->getMdp() ) );
      $this->assertSame($utilisateur->getPseudo(), $this->pseudo);
      $this->assertSame($utilisateur->getPhoto(), $this->photo);
      $this->assertSame($utilisateur->getTmp(), $this->tmp);

  }

  /**
   * @expectedException Exception
   */
  public  function  testSetIdException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setId('s');
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetNiveauException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setNiveau('s');
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetMailException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setMail('sezfze');
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetMdpException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setMdp('sdfremdlfpeorjfkghvjcndbfhjgjefredfrtghrnfdkrjtkgf'); //Chaine de 51 caractères
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetPseudoException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setPseudo('sjdkfleoritufhryetdgd'); //chaine de 21 caracteres
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetTmpException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setTmp(2);
  }

  public function testIsValidUtilisateur(){
    $utilisateur = $this->constructUtilisateurValid();
    $this->assertSame(true, $utilisateur->isValidUtilisateur());
  }

  /**
   * @expectedException Exception
   */
  public function testIsValidUtilisateurException(){
    $utilisateur = $this->constructUtilisateurValid();
    $utilisateur->setId(null);
    $utilisateur->isValidUtilisateur();

  }
}
