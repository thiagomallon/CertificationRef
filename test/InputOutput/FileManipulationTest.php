<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-11 at 11:48:45.
 */

/**
 * @subpackage Test\InputOutput
 */
namespace Test\InputOutput;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-11 at 11:48:45.
 * Classe implementa testes à objeto de FileManipulation
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group InputOutput
 * @group InputOutput/FileManipulationTest
 */
class FileManipulationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Property stores
     * @var object $_fileManipulation
     */
    protected $_fileManipulation;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->_fileManipulation = new \App\InputOutput\FileManipulation;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        unset($this->_fileManipulation); // limpa variável que armazena handle
    }

    /**
     * The testGetMasterFileHandle method testa tentativa de criação de dois handles para escrita
     * com lock de exclusividade para ambos. O que gerará exceção para o segundo.
     * @expectedException \App\ErrorsAndExceptions\FileLockedException
     * @expectedExceptionMessage This file is locked
     * @covers App\InputOutput\FileManipulation::getMasterFileHandle
     * @return null
     */
    public function testGetMasterFileHandle()
    {
        $this->markTestSkipped('Skipping');
        ${007} = $this->_fileManipulation->getMasterFileHandle(); // tenta capturar handle do arquivo
        ${007.1} = $this->_fileManipulation->getMasterFileHandle(); // tenta capturar handle do arquivo, o que gerará a exceção
    }

    /**
     * The testTempFileFactory method implementa testes ao método tempFileFactory
     * @covers App\InputOutput\FileManipulation::tempFileFactory
     * @covers App\InputOutput\FileManipulation::getTempFiles
     */
    public function testTempFileFactory()
    {
        $this->markTestSkipped('Skipping cause it creates new temp file');
        $justCreated = $this->_fileManipulation->tempFileFactory(); // cria novo arquivo temporário
        $tempFiles = $this->_fileManipulation->getTempFiles(); // pega lista de arquivos temporários
        
        $this->assertContains($justCreated, $tempFiles); // verifica se existe nome do arquivo
        $this->assertFileExists($justCreated); // verifica se arquivo existe
    }

    /**
     * The testgetTempFiles method
     * @covers App\InputOutput\FileManipulation::getTempFiles
     */
    public function testGetTempFiles()
    {
        $this->markTestSkipped('Skipping');
        $tempFiles = $this->_fileManipulation->getTempFiles();
        $this->assertRegExp('/TESTING\w+/m', $tempFiles);
    }

    /**
     * The testReadFile method
     * @covers App\InputOutput\FileManipulation::tempFileFactory
     * @covers App\InputOutput\FileManipulation::writingFile
     * @covers App\InputOutput\FileManipulation::readingFile
     */
    public function testWritingFile()
    {
        $this->markTestSkipped('Skipping cause it creates new temp file');
        $justCreated = $this->_fileManipulation->tempFileFactory(); // cria arquivo temporário
        $this->_fileManipulation->writingFile($justCreated, 'Nova linha, recém criada'); // escreve no arquivo
        $content = $this->_fileManipulation->readingFile($justCreated); // pega conteúdo do arquivo

        $this->assertContains('Nova linha', $content);
    }

    /**
     * The testReadingFile method verifica captura de exceção definida pelo usuário, para
     * passagem de nome de arquivo inexistente à função da classe testada
     * @expectedException \App\ErrorsAndExceptions\FileNotFoundException
     * @expectedExceptionMessage File not found
     * @covers App\InputOutput\FileManipulation::readingFile
     */
    public function testReadingFile()
    {
        $content = $this->_fileManipulation->readingFile('mingal'); // tenta ler arquivo não existente
    }

    /**
     * The testDeleteFileLine method
     * @covers App\InputOutput\FileManipulation::deleteFileLine()
     */
    public function testDeleteFileLine()
    {
        $this->markTestSkipped('Skipping cause it creates new temp file');
        $this->_fileManipulation->deleteFileLine('data/streams/tempFilesList', '/Olanda/');
    }

    /**
     * The testDeleteFileLineEx method
     * @expectedException \App\ErrorsAndExceptions\FileNotFoundException
     * @expectedExceptionMessage File not found
     * @covers App\InputOutput\FileManipulation::deleteFileLine
     */
    public function testDeleteFileLineEx()
    {
        $this->markTestSkipped('Skipping');
        $this->_fileManipulation->deleteFileLine('mingal', '/Olanda/');
        $content = file_get_contents('data/streams/tempFilesList');
        $this->assertNotContains('Olanda', $content);
    }

    /**
     * The testDeleteTempFiles method
     * @covers App\InputOutput\FileManipulation::deleteTempFiles
     */
    public function testDeleteTempFiles()
    {
        $this->markTestSkipped('Skipping');
        $this->_fileManipulation->deleteTempFiles();
        $this->assertEquals(0, filesize('data/streams/tempFilesList'));
    }

    /**
     * The testPutData method implementa testes à método que faz uso da função
     * file_put_content().
     * @covers App\InputOutput\FileManipulation::putData
     * @return null
     */
    public function testPutData()
    {
        $this->markTestSkipped('Skipping');
        $testFile = 'data/streams/testingPutContents';
        $this->_fileManipulation->putData($testFile, 'Hi, how are you?'.PHP_EOL);
        $this->assertContains('Hi, how are you?', file_get_contents($testFile));
    }

    /**
     * The testForceFileDownload method
     * @covers App\InputOutput\FileManipulation::forceFileDownload
     * @return null
     */
    public function testForceFileDownload()
    {
        $this->markTestSkipped('Skipping');
        $this->_fileManipulation->forceFileDownload();
    }
}
