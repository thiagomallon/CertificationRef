<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\DatabasesSQL
 */
namespace App\DatabasesSQL;

/**
 * Class SqliteAdapter
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class SqliteDB implements DBAdapter
{
    /**
     * Propriedade armazena nome da base
     * @var string $dbName
     */
    private $dbName = null;
    /**
     * Propriedade armazena senha de usuário da base
     * @var string $dbPass
     */
    private $dbPass = null;
    /**
     * Propriedade armazena nome de usuário da base
     * @var string $dbUser
     */
    private $dbUser = null;

    /**
     * Propriedade armazena estaticamente uma instância do objeto
     * @var object $instance
     */
    private static $instance = null;

    /**
     * Método construtor, recebe e atribui dados de conexão às propriedades privadas da classe
     * @param array $dbCredentials Array de dados de conexão
     * @return null
     */
    private function __construct(\SimpleXMLElement $dbCredentials)
    {
        // Please note that this is Private Constructor
        $this->dbName = $dbCredentials->name;
        $this->dbUser = $dbCredentials->user;
        $this->dbPass = $dbCredentials->pass;

        // Your Code here to connect to database //
        $this->dbh = new PDO('sqlite:host='.$this->dbHost.';dbname='.$this->dbName, $this->dbUser, $this->dbPass);
    }

    /**
     * Método implementa verificação/criação de instância da classe.
     * @param array $dbCredentials Dados para conexão com a base
     * @return object Retorna instância única da classe
     */
    public static function connect(\SimpleXMLElement $dbCredentials)
    {
        // Check if instance is already exists
        if (self::$instance == null) {
            self::$instance = new static($dbCredentials);
        }

        return self::$instance;
    }

    /**
     * Método mágico de interceptação de clonagem de objetos. O modificador de acesso public, permite
     * que o prototype clone a presente classe, bem como o conteúdo do método impede que a
     * dependência XMLReader esteja compartilhando a mesma alocação em memória, ou seja, a dependência
     * não estará compartilhada entre os clones. Isso é uma medida esscencial, pois, senão não seria
     * possível a conexão com mais de um banco, ou mais de uma conexão como mesmo dbms
     * @return null
     */
    private function __clone()
    {
        // Stopping Clonning of Object
    }

    /**
     * Método mágico de interceptação de desserialização do objeto. O método foi propositalmente implementado
     * com o modificador de acesso private, para que se impeça a desserialização do objeto. Observe que a
     * serialização é permitida, uma vez que não foi implementado o método __sleep(), sendo assim a serialização
     * é totalmente possível, porém, irrelevante, uma vez que a desserialização da mesma, não ocorrerá, a menos
     * que altere-se o código único gerado através da serialização, contúdo uma tarefa complicada de ser feita,
     * mas uma brecha àqueles que compreendem o processo de serialização e gostam de desafios.
     * @return null
     */
    private function __wakeup()
    {
        // Stopping unserialize of object
    }
}
