<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\WebFeatures
 */
namespace App\WebFeatures;

/**
 * Class ConfigXMLReader
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class ConfigsXMLReader implements XMLReader
{
    /**
     * Property stores
     * @var type $filePath description
     */
    protected $filePath;
    /**
     * Property stores
     * @var datatype $xmlContent description
     */
    protected $xmlContent;

    /**
     * The __construct method
     * @codeCoverageIgnore
     * @return datatype description
     */
    public function __construct($filePath = 'config/configs.xml')
    {
        $this->filePath = $filePath;
    }

    /**
     * The setFilePath method
     * @return datatype description
     * @param datatype $filePath description
     */
    public function setFilePath($filePath = 'config/configs.xml')
    {
        $this->filePath = $filePath;
    }

    /**
     * The getDatabaseCredentials method
     * @param datatype $dbms description
     * @return datatype description
     */
    public function getDatabaseCredentials($dbms)
    {
        $this->xmlContent = $this->getXMLData();
        $stage = $this->xmlContent->stage;
        $element = array_shift($this->xmlContent->xpath($stage.'/database[@dbms="'.$dbms.'"]'));
        if ($element) {
            return $element;
        } else {
            throw new \RangeException('Attributo não existe, para o elemento');
        }
    }


    /**
     * The getElementData method
     * @return datatype description
     * @param string $elementPath O 'path' do elemento a ser retornado. Ex: development/database
     */
    public function getElementData($elementPath)
    {
        $this->xmlContent = $this->getXMLData();
        // return $this->xmlContent->{$this->xmlContent->stage}->{$element};
        $element = array_shift($this->xmlContent->xpath($elementPath));
        if ($element) {
            return $element;
        } else {
            throw new \RangeException('Attributo não existe, para o elemento');
        }
    }

    /**
     * The getXPath method
     * @return object
     */
    public function getXPath($path, $xmlFile = 'config/configs.xml')
    {
        $xml = simplexml_load_file($xmlFile);
        return $xml->xpath($path);
    }

    /**
     * The getXMLData method
     * @return datatype description
     */
    public function getXMLData()
    {
        return simplexml_load_file($this->filePath);
    }
}
