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
     * The hashingPass method testa a nova API de criptografia de senha, a password_hash(), que
     * provê melhor criptografia que o MD5 e o SHA-1.
     *
     * Com o PHP 5.5, um novo método de criptografia de senha foi adicionado. Essa nova API de
     * password-hashing promove a melhor bcrypt one-way hashing. Esta é superior ao MD5 e ao SHA-1.
     *
     * A função espera três parâmetros: o primeiro é o valor a ser criptografado, o segundo
     * sendo a forma de criptografia, já o terceiro parâmetro, que não é obrigatório, é do tipo array,
     * sendo possível especificar-se o salt e o cost, sendo o primeiro não recomendado e o último a
     * complexidade de criptografia a ser empregada, podendo ser valores de 4 a um número indefinido,
     * sendo o valor 10 o padao. Quando maior o número, mais demorado e mais seguro será o hash. Duas
     * constantes foram disponibilizadas, para preenchimento do
     * segundo parâmetro da função. Sendo esses:
     *
     * PASSWORD_BCRYPT
     * PASSWORD_DEFAULT
     *
     * @param string $pass Valor de senha a ser criptografado
     * @return datatype description
     */
    public function hashingPass($pass)
    {
        return password_hash($pass, PASSWORD_BCRYPT, ['cost' => '10']);
    }

    /**
     * The fullPassCheck method aplica funções de verificação de string de senha, confrontado
     * com valor de hash (seria o valor armazenado na base de dados) e verifica se a mesma
     * necessida de um rehash através da função password_needs_rehash(), ou seja, de um novo
     * valor de hash, sendo assim o código pode
     * ser tratado não apenas para verficação da senha, mas uma reatribuição ao valor hash
     * armazenado.
     * @param string $passEntry Esse seria o valor inserido no formulário
     * @param string $passHashStorage Esse seria o valor armazenado na base de dados
     * @return bool Retorna resultado da verificação da senha
     */
    public function fullPassCheck($passEntry, $passHashStorage)
    {
        if (password_verify($passEntry, $passHashStorage)) {
            if (password_needs_rehash($passHashStorage, PASSWORD_BCRYPT)) {
                /* caso o script entre nessa condição, então seria a hora de uma atualização do valor hash
                que consta na base de dados. */
                $newHash = password_hash($passEntry, PASSWORD_BCRYPT, ['cost' => '10']);
                return true;
            }
            return true;
        }
        return false;
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
        $data = array(
            'id' =>  FILTER_VALIDATE_INT,
            'name' => array(
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => array(
                    'regexp' => '/^([\p{L}\s\.]+)$/iu' // aceita-se qualquer letra, minúscula ou maiúscula, com e/ou sem acento, espaços e pontos
                    )
                ),
            'pass' => array(
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => array(
                    'regexp' => '/^([\w\d]+)$/' // aceita-se apenas caracteres alfanuméricos
                    )
                ),
            'color' => array(
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => array(
                    'regexp' => '/(green|cyan|magenta|yellow)/' // aceita-se apenas as palavras especifidas na regex
                    )
                )
            );
        /* aplica-se serialização, já que resultado vem em formato de array, sendo este
        impresso. Serializando-se o array, podemos converter a string gerada em um novo 
        array. */
        return serialize(filter_input_array(INPUT_POST, $data));
    }

    /**
     * The filteringRequestData method
     * @return datatype description
     */
    public static function filteringRequestData()
    {
        $data = [
        'ip' => FILTER_VALIDATE_IP,
        'mac' => FILTER_VALIDATE_MAC,
        'url' => FILTER_VALIDATE_URL
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
