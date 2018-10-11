<?php
error_reporting(E_ERROR | E_PARSE);

use PHPUnit\Framework\TestCase;

include_once "../DAO/DAO.class.php";
include_once "../parametres.localhost.php";
include_once "../Utilisateur.class.php";
include_once "../DAO/UtilisateurDAO.class.php";


class UtilisateurDAOTest extends TestCase
{

  public function testLoginAdministrateurValid()
  {
    $utilisateurDao = new UtilisateurDAO();
    $this->assertTrue($utilisateurDao->login("Administrateur@administrateur.com", "Administrateur1"));
  }

  public function testLoginUtilisateurValid()
  {
    $utilisateurDao = new UtilisateurDAO();
    $this->assertTrue($utilisateurDao->login("Administrateur@administrateur.com", "Administrateur1"));
  }

  public function testLoginVisiteurValid()
  {
    $utilisateurDao = new UtilisateurDAO();
    $this->assertTrue($utilisateurDao->login("Administrateur@administrateur.com", "Administrateur1"));
  }

  /**
   * @expectedException Exception
   */
  public function testLoginInvalidEmail(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateurDao->login("Administrateur@administrateurfez", "administrateur1");
  }

  public function testLoginInvalidMdp(){
    $utilisateurDao = new UtilisateurDAO();
    $this->assertFalse($utilisateurDao->login("Administrateur@administrateur.com", "administrateu"));
  }


  public function testAddValid(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateur = new Utilisateur(4, 0, 'visiteur@visiteur.com', 'visiteur', 'Visiteur1', 'photo.png', false);
    $this->assertTrue($utilisateurDao->add($utilisateur));
  }

  public function testAddInvalidUtilisateur(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateur = new Utilisateur(1, 0, 'visiteur@visiteur.com', 'visiteur', 'Visiteur1', 'photo.png', false);
    $this->assertFalse($utilisateurDao->add($utilisateur));
  }

  /**
   * @expectedException Exception
   */
  public function testAddInvalidParametre(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateurDao->add("sss");
  }

  /**
   * @expectedException Exception
   */
  public function testAddInvalidObject(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateur = new Utilisateur(1, 0, 'visiteur@visiteur.com', 'visiteur', 'Visiteur1', 'photo.png', false);
    $this->assertFalse($utilisateurDao->add($utilisateurDao));
  }

  public function testGetValid(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateur1 = new Utilisateur(1, 0, 'Visiteur@visiteur.com', 'visiteur', 'Visiteur', 'img.png', false);
    $utilisateur2 = $utilisateurDao->get(1);
    $this->assertEquals($utilisateur1->getId(), $utilisateur2->getId());
    $this->assertEquals($utilisateur1->getNiveau(), $utilisateur2->getNiveau());
    $this->assertEquals($utilisateur1->getMail(), $utilisateur2->getMail());
    $this->assertEquals($utilisateur1->getPseudo(), $utilisateur2->getPseudo());
    $this->assertEquals($utilisateur1->getPhoto(), $utilisateur2->getPhoto());
    $this->assertEquals($utilisateur1->getTmp(), $utilisateur2->getTmp());
  }

  /**
   * @expectedException Exception
   */
  public function testGetInvalid(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateurDao->get("test");
  }

  /**
   * @expectedException Exception
   */
  public function testGetNotFound(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateurDao->get(125);
  }


  public function testSetValid(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateur = new Utilisateur(4, 0, 'VVisiteur@visiteur.com', 'visiteur', 'Visiteur1', 'photo.png', false);
    $this->assertTrue($utilisateurDao->set($utilisateur));
  }

  /**
   * @expectedException Exception
   */
  public function testSetInvalideParametre(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateurDao->set("sss");
  }

  /**
   * @expectedException Exception
   */
  public function testSetInvalidObject(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateur = new Utilisateur(1, 0, 'visiteur@visiteur.com', 'visiteur', 'Visiteur1', 'photo.png', false);
    $this->assertFalse($utilisateurDao->set($utilisateurDao));
  }


  public function testSetMdpValid(){
    $utilisateurDao = new UtilisateurDAO();
    $this->assertTrue($utilisateurDao->setMdp(1, 'visiteur1', 'Visiteur'));
    $utilisateurDao->setMdp(1, 'Visiteur', 'visiteur1'); //On remet l'ancien mdp dans la bdd
  }

  /**
   * @expectedException Exception
   */
  public function testSetMdpNonValid(){
    $utilisateurDao = new UtilisateurDAO();
    $this->assertTrue($utilisateurDao->setMdp(1, null, 'visiteur1'));
  }

  /**
   * @expectedException Exception
   */
  public function testSetMdpIdNonValid(){
    $utilisateurDao = new UtilisateurDAO();
    $this->assertTrue($utilisateurDao->setMdp("s", 'visiteur', 'visiteur1'));
  }

  /**
   * @expectedException Exception
   */
  public function testSetMdpNotFound(){
    $utilisateurDao = new UtilisateurDAO();
    $this->assertTrue($utilisateurDao->setMdp(33, 'visiteur', 'visiteur1'));
  }

  /**
   * @expectedException Exception
   */
  public function testSetMdpMauvaisAncienMdp(){
    $utilisateurDao = new UtilisateurDAO();
    $this->assertTrue($utilisateurDao->setMdp(1, 'visiteurezf', 'visiteur1'));
  }

  public function testDeleteValid(){
    $utilisateurDao = new UtilisateurDAO();
    $this->assertTrue($utilisateurDao->delete(4));
  }

  /**
   * @expectedException Exception
   */
  public function testDeleteInvalid(){
    $utilisateurDao = new UtilisateurDAO();
    $utilisateurDao->delete(-2);
  }
}
