<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\Security
 */
namespace App\Security;

/**
 * Class Filtering
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class FilteringAndEscaping
{

    /**
     * Property stores dados que foram validados
     * @var array $clean description
     */
    public $clean;

    /**
     * Property stores
     * @var array $html description
     */
    public $html;

    /**
     * Property stores
     * @var array $colors description
     */
    protected $colors = ['green','cyan','magenta','yellow'];

    /**
     * The untainingInputs method implementa validação à dados da superglobal $_POST.
     * A função ctype_alpha, se tratando de validação de nomes, não é tão eficiente se na sua
     * lingua é comum nomes próprios possuírem acentos (português, espanhol, francês, italiano, etc).
     * Sendo a melhor opção para esse tipo de validaçao a função filter_input() ou uma expressão
     * regular. Abaixo é demonstrado como conseguir um resultado relevante com expressão regular
     * e alguns métodos abaixo existe um exemplo de como realizar a valição com a função filter_input()
     * @return null
     */
    public function untainingInputs()
    {
        $this->clean = null; // limpa propriedade
        /* faz validação de entrada de nome - caso não passe na validação de alfas (somente letras),
        faz-se verificação através de regex, que permite somente letras, letras com acento e espaços */
        if (ctype_alpha($_POST['name']) || preg_match('/^([\p{L}\s\.]+)$/iu', $_POST['name'])) {
            $this->clean['name'] = $_POST['name'];
        }
        // faz validação de entrada de senha - somente deve existir caracteres alfanuméricos
        if (ctype_alnum($_POST['pass'])) {
            $this->clean['pass'] = $_POST['pass'];
        }
        // faz validação de cor selecionada - comparando-se com array de cores pre-definido
        if (in_array($_POST['color'], $this->colors)) {
            $this->clean['color'] = $_POST['color'];
        }
    }

    /**
     * The escapingOutputs method
     * @param string $output Dado à ser escapado antes da exibição no html
     * @return null
     */
    public function escapingOutputs($output)
    {
        $this->html['output'] = htmlentities($output, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    /**
     * The sanitizingInputs method implementa uso da função filter_input()
     * @return null
     */
    public static function sanitizingInput()
    {
        // submete valor da superglobal $_POST à validação e sanitização, por regex
        $name = filter_input(INPUT_POST, 'name', FILTER_VALIDATE_REGEXP, ['options' =>
            ['regexp' => '/^([\p{L}\s\.]+)$/iu']
            ]);
        // print($name);
        return ($name)? $name : 'Invalid value';
    }

    /**
     * The sanitizingForm method valida não apenas um campo, mas é capaz de validar de uma só
     * vez todos os campos de um formulário.
     * @return array
     */
    public static function sanitizingFormInputs()
    {
        $data = [
            'id' =>  FILTER_VALIDATE_INT,
            'name' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => '/^([\p{L}\s\.]+)$/iu' // aceita-se qualquer letra, minúscula ou maiúscula, com e/ou sem acento, espaços e pontos
                ]
            ],
            'pass' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => '/^([\w\d]+)$/' // aceita-se apenas caracteres alfanuméricos
                ]
            ],
            'color' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => '/(green|cyan|magenta|yellow)/' // aceita-se apenas as palavras especifidas na regex
                ]
            ]
        ];
        /* aplica-se serialização, já que resultado vem em formato de array, sendo este
        impresso. Serializando-se o array, podemos converter a string gerada em um novo 
        array. */
        return serialize(filter_input_array(INPUT_POST, $data));
    }
}

/* A função filter_input(), quando utilizada sob a diretiva INPUT_POST, exige uma requisição de fato,
não bastando a simples criação de um índice na superglobal $_POST. Sendo assim, a solução abaixo, 
aliada a uma requisição criada via stream wrapper http, tornou possível o teste da função via PHPUnit */
if (isset($_POST['call'])) {
    print_r(FilteringAndEscaping::{$_POST['call']}());
}
