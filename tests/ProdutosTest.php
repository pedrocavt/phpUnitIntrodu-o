<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class ProdutosTest extends TestCase
{
    use TestCaseTrait;

    public function getConnection()
    {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=teste_phpunit", "root", "root");
        return $this->createDefaultDBConnection($pdo, 'teste_phpunit');
    }

    public function getDataSet()
    {   
        return $this->createXMLDataSet('tests/produtos.xml');
    }

    public function testListaProdutos()
    {
        $conn = $this->getConnection()->getConnection();
        $query = $conn->query('SELECT * FROM produtos');
        $list = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->assertCount(2, $list);
        $this->assertEquals('Curso A', $list[0]['titulo']);
    }
}