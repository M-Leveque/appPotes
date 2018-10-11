<?php
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

  private function constructMessageValid(){
    $evenement = $this->constructEvenementValid();
    $utilisateur = $this->constructUtilisateurValid();

    $message = new Message($this->id, $this->contenu, $evenement, $utilisateur);
    return $message;
  }

  public function testConstruct()
  {
      $utilisateur = $this->constructUtilisateurValid();
      $evenement = $this->constructEvenementValid();
      $message = $this->constructMessageValid();

      $this->assertSame($message->getId(), $this->id);
      $this->assertSame($message->getContenu(), $this->contenu);
      $this->assertSame($message->getEvenement()->getId(), $evenement->getId());
      $this->assertSame($message->getUtilisateur()->getId(), $utilisateur->getId());
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
  public  function  testSetUtilisateurException(){
    $message = $this->constructMessageValid();
    $message->setUtilisateur(35);
  }

  /**
   * @expectedException Exception
   */
  public function testSetUtilisateurObjectException(){
    $message = $this->constructMessageValid();
    $message->setUtilisateur($message);
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetEvenementException(){
    $message = $this->constructMessageValid();
    $message->setEvenement("chaine de caracteres");
  }

  /**
   * @expectedException Exception
   */
  public  function  testSetEvenementObjectException(){
    $message = $this->constructMessageValid();
    $message->setEvenement($message);
  }
}
