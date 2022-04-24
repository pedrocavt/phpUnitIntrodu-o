<?php

use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{

    public function testAtributosCalculadora()
    {
        $this->assertClassHasAttribute('valorA', Calculadora::class);
        $this->assertClassHasAttribute('valorB', Calculadora::class);
        $this->assertClassHasAttribute('operador', Calculadora::class);
        $this->assertClassHasAttribute('resultado', Calculadora::class);
    }

    /**
     * @depends testAtributosCalculadora
     */
    public function testMetodosCalculadora()
    {
        $this->assertTrue(method_exists(Calculadora::class, 'getValorA'), "falta o método getValorA na classe Calculadora");
        $this->assertTrue(method_exists(Calculadora::class, 'getValorB'), "falta o método getValorB na classe Calculadora");
        $this->assertTrue(method_exists(Calculadora::class, 'getOperador'), "falta o método getOperador na classe Calculadora");
        $this->assertTrue(method_exists(Calculadora::class, 'getResultado'), "falta o método getResultado na classe Calculadora");
    }

    /**
     * @depends testAtributosCalculadora
     */
    public function testConstrutorCalculadora()
    {
        $this->assertTrue(method_exists(Calculadora::class, '__construct'), "falta o método __construct na classe Calculadora");
        
        //verifica se o construtor esta atribuindo os valores
        $calc = new Calculadora(2,3,"soma");
        $this->assertEquals(2, $calc->getValorA());
        $this->assertEquals(3, $calc->getValorB());
        $this->assertEquals("soma", $calc->getOperador());
    }

    public function testAcessoAtributosPrivados()
    {
        $calc = new Calculadora(2,3,"soma");
        $this->assertFalse(isset($calc->valorA), 'atributo valorA deve ser privado');
        $this->assertFalse(isset($calc->valorB), 'atributo valorB deve ser privado');
        $this->assertFalse(isset($calc->valorOperador), 'atributo operador deve ser privado');
        $this->assertFalse(isset($calc->valorResultado), 'atributo resultado deve ser privado');
    }

    /**
     * @depends testConstrutorCalculadora
     */
    public function testGetResultadoCalculadora()
    {
        $calc = new Calculadora(2,3,"somar");
        $this->assertEquals(5, $calc->getResultado());

        $calc = new Calculadora(5,3,"subtrair");
        $this->assertEquals(2, $calc->getResultado());

        $calc = new Calculadora(6,3,"dividir");
        $this->assertEquals(2, $calc->getResultado());

        $calc = new Calculadora(6,0,"dividir");
        $this->assertEquals("Não é um numero", $calc->getResultado());

        $calc = new Calculadora(4,2,"multiplicar");
        $this->assertEquals(8, $calc->getResultado());
    }

    /**
     * @depends testGetResultadoCalculadora
     */
    public function testStaticCalculadora()
    {
        $result = Calculadora::calcular(2,4,'somar');
        $this->assertEquals(6, $result);
    }
}