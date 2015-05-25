<?php
namespace Test\DatabasesSQL;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-24 at 17:13:32.
 */
class MySqlDBTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MySqlDB
     */
    protected $_mySqlDB;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $config = new \App\WebFeatures\ConfigsXMLReader();

        $mysql = $config->getElementDataByAttr(['element'=>'database','attribute'=>'dbms','value'=>'mysql']);
        $this->_mySqlDB = \App\DatabasesSQL\MySqlDB::connect($mysql);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * The test method
     * @return void
     * @covers \App\DatabasesSQL\MySqlDB::fetchAll
     */
    public function testFetchAll()
    {
        $res =  $this->_mySqlDB->fetchAll('select * from users where id > ?', ['1']);
        //print_r($res);
    }
}
