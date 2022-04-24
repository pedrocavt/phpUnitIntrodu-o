<?php	

namespace App;

class Calculadora
{
    private $valorA;

    private $valorB;

    private $operador;

    private $resultado;

    public function __construct($valorA, $valorB, $operador)
    {
        $this->valorA = $valorA;
        $this->valorB = $valorB;
        $this->operador = $operador;
    }

    public function getValorA()
    {
        return $this->valorA;
    }

    public function getValorB()
    {
        return $this->valorB;
    }

    public function getOperador()
    {
        return $this->operador;
    }

    public function getResultado()
    {
        if ($this->getOperador() === "somar") {
            return $this->getValorA() + $this->getValorB();
        }
        
        if ($this->getOperador() === "subtrair") {
            return $this->getValorA() - $this->getValorB();
        }

        if ($this->getOperador() === "multiplicar") {
            return $this->getValorA() * $this->getValorB();
        }

        if ($this->getOperador() === "dividir") {

            if ($this->getValorB() === 0) {
                return "Não é um numero";
            }

            return $this->getValorA() / $this->getValorB();
        }
    }

    public static function calcular($valorA, $valorB, $operador)
    {
       $calc = new Calculadora($valorA, $valorB, $operador);
       return $calc->getResultado();
    }
}