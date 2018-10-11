<?php
error_reporting(E_ERROR | E_PARSE);

use PHPUnit\Framework\TestCase;

include_once "../DAO/DAO.class.php";
include_once "../parametres.localhost.php";
include_once "../Evenement.class.php";
include_once "../Emoticon.class.php";
include_once "../Utilisateur.class.php";
include_once "../DAO/EvenementDAO.class.php";
include_once "../DAO/EmoticonDAO.class.php";
include_once "../DAO/UtilisateurDAO.class.php";


class EvenementDAOTest extends TestCase
{

  public function testGetValid(){
    $evenementDAO = new EvenementDAO();

    $utilisateur = new Utilisateur(1, 0, 'Visiteur@visiteur.com', 'visiteur1', 'Visiteur', 'img.png', false);
    $emoticon = new Emoticon(1, "content", "/images/img.png");
    $evenement = new Evenement(1, "Vacance 2011", "Ete au camping", "2018-01-03", "2018-05-02 22:00:00", false, $utilisateur, $emoticon);

    $evenementDAO->get(1);
    $this->assertEquals($evenementDAO->get(1)->getId(), $evenement->getId());
  }

}
