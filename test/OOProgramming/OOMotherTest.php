<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-05 at 09:01:34.
 */

/**
 * Classe de testes do objeto OOMotherTest
 * @group OOProgramming
 * @group OOMotherTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class OOMotherTest extends PHPUnit_Framework_TestCase
{
    /**
     * Instância da classe OOMother
     * @var object $_mother
     */
    protected $_mother;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        /* instancia classe, na propriedade $_mother */
        $this->_mother = new \App\OOProgramming\OOMother();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->_mother); // 'destroi' instância
    }
    
    /**
     * Método testa funções class_alias() e get_class() do PHP.
     *
     * class_alias() - Cria um alias da classe, ao qual novas instâncias podem ser geradas. As
     * instâncias geradas através de um alias se fazem novas instâncias e não compartilham por
     * referência os métodos e propriedades.
     *
     * get_class() - Recebe uma instância e retorna o nome da classe da mesma.
     *
     * @return void
     */
    public function testClassAlias()
    {
        $_localMother = new \App\OOProgramming\OOMother(); // cria instância da classe OOMother
        class_alias('\App\OOProgramming\OOMother', 'Father');
        $_father = new Father(); // cria instância via alias da classe OOMother
        $_stepFather = new Father(); // cria outra instância via alias da classe OOMother

        /* tests */
        $_localMother->setName('Davi'); // atribui valor à propriedade da classe
        $this->assertEquals('Davi', $_localMother->getName()); // verifica se valor da propriedade é o esperado
        $this->assertNotEquals('Davi', $_father->getName(), 'A instancia _father não recebe o valor
            atribuído à propriedade da instância _mother');
        /* verifica se a instancia $_father do alias Father, compartilha, por referência, as propriedades de $_localMother*/
        $_father->setName('Lilian'); // atribui valor à propriedade da classe
        $this->assertEquals('Lilian', $_father->getName()); // verifica valor atribuído
        $this->assertNotEquals('Lilian', $_stepFather->getName()); /* verifica se outra instancia do alias, compartilha,
                                                                    * por referência as propriedades da classe */
        /* verifica nomes das classes dos alias */
        $this->assertEquals('App\OOProgramming\OOMother', get_class($_father)); /* verifica se nome da classe
                                                                                             * é o nome original da classe, 
                                                                                             * não o alias */
        $this->assertNotEquals('Father', get_class($_stepFather)); /* verifica se nome da classe da instancia do alias é
                                                                    * diferente de Father */
        unset($_localMother);
        unset($_father);
        unset($_stepFather); // 'destroi' instancias
    }

    /**
     * Método testa duplicação de instâncias, abordagem que cria instâncias por referência.
     * @return void
     */
    public function testDuplicatingInstance()
    {
        $_sister = $this->_mother; // cria nova instancia à partir de $this->_mother
        $this->_mother->setName('Yeshua'); // atribui valor à propriedade, através da instância $this->_mother
        /* verifica se instancia $_sister, teve propriedade name alterada, depois de alterar-se a mesma,
         * na instância $this->_mother */
        $this->assertEquals('Yeshua', $_sister->getName()); // a instancia não foi clonada é sim referenciada
    }

    /**
     * Método testa 'destruição' de instância. Verifica-se que por mais que seja aplicada a função
     * unset() à instância, o objeto permanece até que qualquer outro compartilhamento por referência,
     * do mesmo, esteja em uso.
     * @return void
     */
    public function testDestructingObject()
    {
        $_sister = $this->_mother; // cria nova instancia por referência
        $this->_mother->setName('Luke'); // atribui valor à propriedade
        
        unset($this->_mother); // 'destroi' instância, mas não o objeto
        $this->assertEquals('Luke', $_sister->getName()); // verifica-se que, de fato, objeto não foi destruído

        $_brother = $_sister->getInstance(); /* cria nova instância, desta vez, totalmente nova, não compartilha o
                                              * mesmo endereço de memória de $_sister */
        $this->assertNotNull($_brother->getName());   /* verifica-se que instância criada não possui a propriedade setada,
                                                    * pois consiste-se de uma nova instância */
        unset($_sister);
        unset($_brother); // 'destroi' instancias de objetos
    }

    /**
     * Método testa retorno da função func_get_args(), que é o retorno do método returnArgsPassed(), do
     * objeto. Confirma-se que o PHP não espera um número máximo de argumentos passados à um método,
     * somente um número mínimo, ou seja, quando o método espera um parâmetro em sua assinatura, esse
     * um parâmetro (pelo menos) deve ser passado.
     * @return void
     */
    public function testReturnArgsPassed()
    {
        // passa argumentos à função, para captura de array dos mesmos
        $args = $this->_mother->returnArgsPassed('first', 'second', 'third');
        $this->assertCount(3, $args); // verifica se array de retorno contém 3 elementos
        $this->assertContains('first', $args); // verifica se valor existe em qualquer dos elementos
    }
    
    /**
     * Método testa retorno da função get_object_vars() do PHP, que é o retorno do método returnObjVars()
     * do objeto. A função é capaz de retornar todas as propriedades do objeto, bem como seus respectivos
     * valores, independentemente do encapsulamento que lhe(s) é(seja) atribuído.
     * @return void
     */
    public function testReturnObjVars()
    {
        $this->_mother->setName('The King David');
        $vars = $this->_mother->returnObjVars();
        /* valor retornado é resultado de chamada à função
         * get_object_vars(), como pode-se perceber, conseguimos acessar 
         * mesmo sendo essa protected.
         */
        $this->assertContains('The King David', $vars);
    }
}
