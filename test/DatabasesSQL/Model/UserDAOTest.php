<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\DatabasesSQL\Model
 */
namespace Test\DatabasesSQL\Model;

/**
 * Class UserDAOTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group DatabasesSQL/Model
 * @group DatabasesSQL/Model/UserDAOTest
 */
class UserDAOTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Protected property stores object instance
     * @var object $_userDAO
     */
    protected $_userDAO;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->_userDAO = new \App\DatabasesSQL\Model\UserDAO;
    }
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->_userDAO);
    }
    /**
     * The testGetUser method
     * @return null
     * @covers \App\Model\Mapper\UserDAO::getUsers
     */
    public function testGetUser()
    {
        print_r($this->_userDAO->getUsers());
    }
}
