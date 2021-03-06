<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\OOProgramming
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
     * Armazena propriedades não definidas e seus valores
     * @var array $data
     */
    protected $data = [];

    /**
     * Propriedade para testes
     * @var mixed $property1
     */
    public $property1;

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
        return $this->data[$name];
    }

    /**
     * Método mágico __set() cria, caso não exista, e atribui valor à uma propriedade
     * inexistente, portanto, inacessível por métodos comuns. No exemplo abaixo armazeno
     * também em um array criado para propriedades inacessíveis para, possível futuro
     * controle.
     * @return null
     * @param string $name Nome da propriedade inacessível
     * @param mixed $value Valor à ser atribuído à propriedade inacessível
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        //$this->$name = $value;
    }

    /**
     * Método é chamado quando é atribuída uma propriedade do objeto à função isset(),
     * tendo então, na classe, a implementação do método __isset(), este interceptará
     * a chamada de isset(), possibilitando acrescentar-se funcionalidades à verificação.
     * @return datatype description
     * @param string $name Propriedade a ser verificada a existência
     */
    public function __isset($name)
    {
        // if (isset($this->data[$name])) {
        //     return 'yep! not a declared property, but we have it.';
        // }
        return 'anyway!';
    }

    /**
     * Método
     * @return datatype description
     */
    public function __empty()
    {

    }

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
     * Método
     * @return datatype description
     * @param string $name
     * @param array $args
     */
    public static function __callStatic($name, $args)
    {

    }

    /**
     * @return datatype description
     */
    public function __invoke()
    {
        return 'Hey matey, this is an object, not a function';
    }

    /**
     * Método é chamado e, tem poder de interceptar ação de clonagem (objeto submetido ao operador clone).
     * Tem-se a chande, através do seguinte método mágico, de criar novas instâncias para as dependências
     * para que as dependências da instancia clone e da clonada não compartilhem, por referência, mesmo alocamento em memória.
     * Isso é muito útil quando se está implementando o Pattern Prototype para classes que implementam injeção de dependência
     * e/ou OCP, DIP, etc.
     * @return datatype description
     */
    public function __clone()
    {

    }

    /**
     * O seguinte método mágico é usado para selecionar-se as propriedades as quais deseja-se que sejam incluídas após
     * um comando de serialização de uma instância da classe. Selecionam-se as propriedades atravez do retorno de
     * um array ao qual incluem-se os nomes da propriedades por literais de string.
     * @return datatype description
     */
    public function __sleep()
    {
        return ['data', 'property1'];
    }

    /**
     * Método é chamado quando valor de serialização da presente classe é submetido à função unserialize() do PHP.
     * @return datatype description
     *
     */
    public function __wakeup()
    {
        return 'Object waking up';
    }

    /**
     * Método intercepta chamada da função var_export(), com objeto da presente classe, como argumento.
     * @return datatype description
     */
    public static function __set_state()
    {

    }

    /**
     * método é chamado toda vez que instância de classe é chamado como um string. ex:
     * print $_magicMethods;
     * Quando ocorre uma chamada assim, o retorno do método __toString será exibido no print.
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
