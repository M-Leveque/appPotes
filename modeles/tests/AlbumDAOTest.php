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
            $albumAttendu = new Album(1, "Vacance 2018", "Album des vacances de 2018", "2018-05-02", false, "ressources/img/vignettes/pic-2.jpg", 1, 1);
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

    public function testGetInfos(){
        $albumDAO = new AlbumDAO();
        $infos = $albumDAO->getInfos();
        $infosAttendu = array(array(1, "Vacance 2018", "ressources/img/vignettes/pic-2.jpg"), array(2, "Soirée anniversaire", "ressources/img/vignettes/pic-1.jpg"));

        $this->assertSame($infosAttendu[0][0], $infos[0][0]);
        $this->assertSame($infosAttendu[0][1], $infos[0][1]);
        $this->assertSame($infosAttendu[0][2], $infos[0][2]);
        $this->assertSame($infosAttendu[1][0], $infos[1][0]);
        $this->assertSame($infosAttendu[1][1], $infos[1][1]);
        $this->assertSame($infosAttendu[1][2], $infos[1][2]);
    }
}