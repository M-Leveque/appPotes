<?php
error_reporting(E_ERROR | E_PARSE);

use PHPUnit\Framework\TestCase;

include_once "../DAO/DAO.class.php";
include_once "../parametres.localhost.php";
include_once "../Evenement.class.php";
include_once "../Emoticon.class.php";
include_once "../Utilisateur.class.php";
include_once "../Album.class.php";
include_once "../DAO/EvenementDAO.class.php";
include_once "../DAO/EmoticonDAO.class.php";
include_once "../DAO/UtilisateurDAO.class.php";
include_once "../DAO/AlbumDAO.class.php";


class AlbumDAOTest extends TestCase
{

  public function testGetValid(){
    $albumDAO = new AlbumDAO();

    $utilisateur = new Utilisateur(1, 0, 'Visiteur@visiteur.com', 'visiteur1', 'Visiteur', 'img.png', false);
    $emoticon = new Emoticon(1, "content", "/images/img.png");
    $evenement = new Evenement(1, "Vacance 2011", "Ete au camping", "2018-01-03", "2018-05-02 22:00:00", false, $utilisateur, $emoticon);
    $album = new Album(1 ,"Vacance 2011", "Photos des vacances", "2015-05-02",false ,"ressources/images/visuel/visuel1.png", $evenement, $utilisateur);

    $this->assertEquals($albumDAO->get(1)->getId(), $album->getId());
  }

}
