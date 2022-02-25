<?php


class Veiculo
{
    public static function addCarro($pdo, $nome, $id_proprietario, $placa, $chassi, $renavam, $foto_carro, $ipva, $multas, $licenciamento)
    {
        $cmd = "INSERT INTO carros (proprietario,id_proprietario,placa,chassi,renavam,foto_carro,ipva,multas,licenciamento) 
        VALUES(:proprietario,:id_proprietario,:placa,:chassi,:renavam,:foto_carro,:ipva,:multas,:licenciamento)";

        $cmd = $pdo->prepare($cmd);
        $cmd->bindValue(":proprietario", $nome);
        $cmd->bindValue(":id_proprietario", $id_proprietario);
        $cmd->bindValue(":placa", $placa);
        $cmd->bindValue(":chassi", $chassi);
        $cmd->bindValue(":renavam", $renavam);
        $cmd->bindValue(":foto_carro", $foto_carro);
        $cmd->bindValue(":ipva", $ipva);
        $cmd->bindValue(":multas", $multas);
        $cmd->bindValue(":licenciamento", $licenciamento);
        $cmd->execute();
        return true;
    }

    public static function showCarros($pdo)
    {
        $data  = $pdo->query("SELECT * FROM carros ORDER BY id");


        if ($data->rowCount() > 0) {
            $carros = $data->fetchall(PDO::FETCH_ASSOC);
            return $carros;
        } else {
            return false;
        }
    }

    public static function deleteCarro($id, $pdo)
    {
        $cmd = "SELECT * FROM carros WHERE id = :id";
        $cmd = $pdo->prepare($cmd);
        $cmd->bindValue(":id", $id);
        $cmd->execute();

        if ($cmd->rowCount() > 0) {
            $cmd = "DELETE FROM carros WHERE id = :id";
            $cmd = $pdo->prepare($cmd);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            return true;
        } else {
            return false;
        }
    }

    public static function getCarro($id, $pdo)
    {
        $cmd = "SELECT * FROM carros WHERE id = :id";
        $cmd = $pdo->prepare($cmd);
        $cmd->bindValue(":id", $id);
        $cmd->execute();

        if ($cmd->rowCount() > 0) {
            $data = $cmd->fetch(PDO::FETCH_ASSOC);

            return $data;
        } else {
            return false;
        }
    }

    public static function updateInfo($pdo, $id, $nome, $id_proprietario, $placa, $chassi, $renavam, $foto_carro, $ipva, $multas, $licenciamento)
    {
        $cmd = "SELECT * FROM carros WHERE id = :id";
        $cmd = $pdo->prepare($cmd);
        $cmd->bindValue(":id", $id);
        $cmd->execute();

        if ($cmd->rowCount() > 0) {

            $cmd = "UPDATE carros SET proprietario=:pro, id_proprietario=:id_pro, placa =:placa, chassi = :chassi, renavam = :renavam, foto_carro = :foto_carro, ipva = :ipva, multas = :multas, licenciamento = :licenciamento WHERE id = :id";

            $cmd = $pdo->prepare($cmd);
            $cmd->bindValue(":pro", $nome);
            $cmd->bindValue(":id_pro", $id_proprietario);
            $cmd->bindValue(":placa", $placa);
            $cmd->bindValue(":chassi", $chassi);
            $cmd->bindValue(":renavam", $renavam);
            $cmd->bindValue(":foto_carro", $foto_carro);
            $cmd->bindValue(":ipva", $ipva);
            $cmd->bindValue(":multas", $multas);
            $cmd->bindValue(":licenciamento", $licenciamento);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            return true;
        }
    }
}
