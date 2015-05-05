<?php

namespace App\OOProgramming;

class MagicMethods
{
    protected $data = []; // array armazenará propriedades não definidas e seus valores

    private $particular;
    protected $familiar;
    public $informal;

    /* método mágico, utilizado para que métodos chamados via a instancia da classe,
     * que não possuam implementação, sejam interceptados - caso chame-se, através de
     * uma instância dessa classe, um método que não esteja em seu escopo, o método 
     * __call() será executado.
     */
    public function __call($name, $args)
    {
        return $args;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    /* método é chamado toda vez que instância de classe é chamado como um string. ex:
     * echo $_magicMethods; 
     * Quando ocorre uma chamada assim, o retorno do método __toString será exibido no echo.
     */
    public function __toString()
    {
        return 'Hey, this is not a string, this is the MagicMethods class. Welcome aboard, pirate!';
    }

    public function __debugInfo()
    {
        return [
        'msg'=>'What do you want here? This object is mine!'
        ];
    }
}
