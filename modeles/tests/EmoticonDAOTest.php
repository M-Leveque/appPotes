<?php
error_reporting(E_ERROR | E_PARSE);

use PHPUnit\Framework\TestCase;

include_once "../DAO/DAO.class.php";
include_once "../parametres.localhost.php";
include_once "../Emoticon.class.php";
include_once "../DAO/EmoticonDAO.class.php";


class EmoticonDAOTest extends TestCase
{


  public function testAddValid(){
    $emoticonDao = new EmoticonDAO();
    $emoticon = new Emoticon(2, 'content', '/images/img.png');
    $this->assertTrue($emoticonDao->add($emoticon));
  }

  public function testAddInvalidEmoticon(){
    $emoticonDao = new EmoticonDAO();
    $emoticon = new Emoticon( 1, 'content', '/images/img.png');
    $this->assertFalse($emoticonDao->add($emoticon));
  }

  /**
   * @expectedException Exception
   */
  public function testAddInvalidParametre(){
    $emoticonDao = new EmoticonDAO();
    $this->assertTrue($emoticonDao->add("d"));
  }

  /**
   * @expectedException Exception
   */
  public function testAddInvalidObject(){
    $emoticonDao = new EmoticonDAO();
    $this->assertTrue($emoticonDao->add($emoticonDao));
  }

  public function testGetValid(){
    $emoticonDao = new EmoticonDAO();
    $emoticon1 = new Emoticon(1, 'content', '/images/img.png');
    $emoticon2 = $emoticonDao->get(1);
    $this->assertEquals($emoticon1, $emoticon2);
  }

  /**
   * @expectedException Exception
   */
  public function testGetInvalid(){
    $emoticonDao = new EmoticonDAO();
    $emoticonDao->get("test");
  }

  /**
   * @expectedException Exception
   */
  public function testGetNotFound(){
    $emoticonDao = new EmoticonDAO();
    $emoticonDao->get(125);
  }


  public function testSetValid(){
    $emoticonDao = new EmoticonDAO();
    $emoticon = new Emoticon( 1, 'content', '/images/img.png');
    $this->assertTrue($emoticonDao->set($emoticon));
  }

  /**
   * @expectedException Exception
   */
  public function testSetInvalideParametre(){
    $emoticonDao = new EmoticonDAO();
    $emoticonDao->set("sss");
  }

  /**
   * @expectedException Exception
   */
  public function testSetInvalidObject(){
    $emoticonDao = new EmoticonDAO();
    $this->assertFalse($emoticonDao->set($emoticonDao));
  }

  public function testDeleteValid(){
    $emoticonDao = new EmoticonDAO();
    $this->assertTrue($emoticonDao->delete(2));
  }

  /**
   * @expectedException Exception
   */
  public function testDeleteInvalid(){
    $emoticonDao = new EmoticonDAO();
    $this->assertTrue($emoticonDao->delete(-2));
  }
}
