<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @package App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Classe implementa diversos métodos mágicos. A chamada e retorno de todos os métodos
 * é realizado na classe de testes.
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class MagicMethods
{
    /**
     * Armazenará propriedades não definidas e seus valores
     * @var array $data
     */
    protected $data = [];

    /**
     * método mágico, utilizado para que métodos chamados via a instancia da classe,
     * que não possuam implementação, sejam interceptados - caso chame-se, através de
     * uma instância dessa classe, um método que não esteja em seu escopo, o método
     * __call() será executado.
     * @return array
     * @param string $name
     * @param array $args
     */
    public function __call($name, $args)
    {
        return $args;
    }

    /**
     * Método mágico __set() cria, caso não exista, e atribui valor à uma propriedade
     * inexistente, portanto, inacessível por métodos comuns. No exemplo abaixo armazeno
     * também em um array criado para propriedades inacessíveis para, possível futuro
     * controle.
     * @return void
     * @param string $name Nome da propriedade inacessível
     * @param mixed $value Valor à ser atribuído à propriedade inacessível
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        $this->$name = $value;
    }

    /**
     * Retorna variável não declarada no escopo da classe, desde que essa tenha sido
     * criada pelo método mágico __set(), caso contrário é exibido um notice de propriedade
     * undefined.
     * @return mixed
     * @param string $name Nome da variável inacessível (não declarada no esocpo da classe)
     * que solicita-se acesso.
     */
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * @return datatype description
     */
    public function __invoke()
    {

    }

    /**
     * @return datatype description
     */
    public function __serialize()
    {

    }

    /**
     * @return datatype description
     */
    public function __sleep()
    {

    }

    /**
     * método é chamado toda vez que instância de classe é chamado como um string. ex:
     * echo $_magicMethods;
     * Quando ocorre uma chamada assim, o retorno do método __toString será exibido no echo.
     * @return string
     */
    public function __toString()
    {
        return 'Hey, this is not a string, this is the MagicMethods class. Welcome aboard, pirate!';
    }

    /**
     * À partir do PHP 5.6 o método mágico abaixo sobrescreve o var_dump do objeto, sendo assim,
     * caso seja executado um var dump de uma instância dessa classe, o array de retorno é o que
     * será exibido.
     * @return array Array de retorno para sobrescrição do var_dump
     */
    public function __debugInfo()
    {
        return [
        'msg'=>'What do you want here? This object is mine!'
        ];
    }
}
