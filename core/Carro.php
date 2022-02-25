<?php

require_once "helpers/Veiculo.php";
class Carro
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function adicionarCarro($proprietario, $id_proprietario, $placa, $chassi, $renavam, $foto_carro, $ipva, $multas, $licenciamento)
    {
        $res =  Veiculo::addCarro(
            $this->pdo,
            $proprietario,
            $id_proprietario,
            $placa,
            $chassi,
            $renavam,
            $foto_carro,
            $ipva,
            $multas,
            $licenciamento
        );

        return $res;
    }

    public function mostrarCarros()
    {
        $carros = Veiculo::showCarros($this->pdo);

        return $carros;
    }

    public function deletarCarro($id)
    {
        $res = Veiculo::deleteCarro($id, $this->pdo);
        return $res;
    }

    public function pegarCarro($id)
    {
        $data = Veiculo::getCarro($id, $this->pdo);
        return $data;
    }

    public function atualizarInfo($id, $nome, $id_proprietario, $placa, $chassi, $renavam, $foto_carro, $ipva, $multas, $licenciamento)
    {
        $res = Veiculo::updateInfo($this->pdo, $id, $nome, $id_proprietario, $placa, $chassi, $renavam, $foto_carro, $ipva, $multas, $licenciamento);

        return $res;
    }
}
