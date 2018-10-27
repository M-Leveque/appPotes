<?php
ini_set('error_reporting', false);
use PHPUnit\Framework\TestCase;

include_once "../parametres.localhost.php";
include_once "../DAO/DAO.class.php";
include_once "../Outils.class.php";

include_once "../Album.class.php";
include_once "../DAO/AlbumDAO.class.php";

class AlbumDAOTest extends TestCase
{
    public function testGet(){

        $albumDAO = new AlbumDAO();
        $album = $albumDAO->get(1);
        try{
            $albumAttendu = new Album(1, "Album Commun", "Photos communs", "2018-05-02", false, "ressources/img/vignettes/pic-2.jpg", 1, 1);
        }
        catch(Exception $e){
            echo "Erreur lors de la création de l'album : ".$e;
        }

        $this->assertEquals($album, $albumAttendu);
    }

    /**
     * @expectedException Exception
     */
    public function testGetInexistantException(){
        $albumDAO = new AlbumDAO();
        $albumDAO->get(99999);
    }

    /**
     * @expectedException Exception
     */
    public function testGetNonIntException(){
        $albumDAO = new AlbumDAO();
        $albumDAO->get("s");
    }

    /**
     * @expectedException Exception
     */
    public function testGetNullException(){
        $albumDAO = new AlbumDAO();
        $albumDAO->get(null);
    }

    /**
     * @expectedException Exception
     */
    public function testGetInf0Exception(){
        $albumDAO = new AlbumDAO();
        $albumDAO->get(-25);
    }
}