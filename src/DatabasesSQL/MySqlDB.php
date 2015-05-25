<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\DatabasesSql
 */
namespace App\DatabasesSQL;

/**
 * Classe SingWithTongue
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
final class MySqlDB extends DB
{
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
    private function __construct($dbDetails)
    {
        // Your Code here to connect to database //
        $this->dbh = new \PDO('mysql:host='.$dbDetails->host.
            ';dbname='.$dbDetails->name, $dbDetails->user, $dbDetails->pass);
    }

    /**
     * Método implementa verificação/criação de instância da classe.
     * @param array $dbDetails Dados para conexão com a base
     * @return object Retorna instância única da classe
     */
    public static function connect(\SimpleXMLElement $dbDetails)
    {
        // Check if instance is already exists
        if (self::$instance == null) {
            self::$instance = new static($dbDetails);
        }
        return self::$instance;
    }

    /**
     * The setDBConfigs method
     * @return datatype description
     */
    public static function setDBConfigs()
    {

    }

    /**
     * The fetchRow method
     * @return datatype description
     */
    public static function fetchRow($where, $order)
    {

    }

    /**
     * The fetchAll method
     * @return datatype description
     */
    public function fetchAll($statement, $args)
    {
        $stmt = $this->dbh->prepare($statement);
        $stmt->execute($args);
        return $stmt->fetchAll();
    }

    /**
     * Método mágico de interceptação de clonagem de objetos. O método foi propositalmente implementado
     * com o modificador de acesso private, para que se evite clonagem, já que o objetivo do presente
     * pattern é que haja apenas uma instância do objeto.
     * @return void
     */
    protected function __clone()
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
    protected function __wakeup()
    {
        // Stopping unserialize of object
    }
}
