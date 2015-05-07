<?php

namespace App\OOProgramming;

class MagicMethods
{
    /**
     * @var Array $data
     * Armazenará propriedades não definidas e seus valores
     */
    protected $data = [];

    /**
     * @method returntype description
     * método mágico, utilizado para que métodos chamados via a instancia da classe,
     * que não possuam implementação, sejam interceptados - caso chame-se, através de
     * uma instância dessa classe, um método que não esteja em seu escopo, o método
     * __call() será executado.
     */
    public function __call($name, $args)
    {
        return $args;
    }

    /**
     * @method returntype description
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @method returntype description
     */
    public function __invoke()
    {

    }

    /**
     * @method returntype description
     */
    public function __serialize()
    {

    }

    /**
     * @method returntype description
     */
    public function __sleep()
    {

    }

    /**
     * @method returntype description
     * método é chamado toda vez que instância de classe é chamado como um string. ex:
     * echo $_magicMethods;
     * Quando ocorre uma chamada assim, o retorno do método __toString será exibido no echo.
     */
    public function __toString()
    {
        return 'Hey, this is not a string, this is the MagicMethods class. Welcome aboard, pirate!';
    }

    /**
     * @method returntype description
     */
    public function __debugInfo()
    {
        return [
        'msg'=>'What do you want here? This object is mine!'
        ];
    }
}
