<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\DatabasesSql
 */
namespace App\DatabasesSql;

/**
 * Classe SingWithTongue
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
final class SingWithTongue
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
     * @param array $dbDetails Array de dados de conexão
     * @return void
     */
    private function __construct($dbDetails = array())
    {
        // Please note that this is Private Constructor
        $this->dbms = $dbDetails['dbms'];
        $this->dbName = $dbDetails['name'];
        $this->dbUser = $dbDetails['user'];
        $this->dbPass = $dbDetails['pass'];

        // Your Code here to connect to database //
        //$this->dbh = new \PDO($this->dbms.':host='.$this->dbHost.';dbname='.$this->dbName, $this->dbUser, $this->dbPass);
        $this->dbh = new \PDO($this->dbms.':data/streams/'.$this->dbName, $this->dbUser, $this->dbPass);
    }

    /**
     * Método implementa verificação/criação de instância da classe.
     * @param array $dbDetails Dados para conexão com a base
     * @return object Retorna instância única da classe
     */
    public static function connect($dbDetails = array())
    {
        // Check if instance is already exists
        if (self::$instance == null) {
            self::$instance = new static($dbDetails);
        }

        return self::$instance;

    }

    /**
     * Método mágico de interceptação de clonagem de objetos. O método foi propositalmente implementado
     * com o modificador de acesso private, para que se evite clonagem, já que o objetivo do presente
     * pattern é que haja apenas uma instância do objeto.
     * @return void
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
     * @return void
     */
    private function __wakeup()
    {
        // Stopping unserialize of object
    }
}
