<?php
session_start();
require_once "core/Carro.php";
require_once "config.php";
if (isset($_POST['enviar'])) {

    //verificação das inputs
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
    $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_SPECIAL_CHARS);
    $chassi = filter_input(INPUT_POST, 'chassi', FILTER_SANITIZE_SPECIAL_CHARS);
    $renavam = filter_input(INPUT_POST, 'renavam', FILTER_SANITIZE_SPECIAL_CHARS);
    $ipva = filter_input(INPUT_POST, 'ipva', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $multas = filter_input(INPUT_POST, 'multa', FILTER_VALIDATE_FLOAT);
    $licenciamento = filter_input(INPUT_POST, 'licenciamento', FILTER_SANITIZE_SPECIAL_CHARS);

    function returnError($error)
    {
        $error == 'data' ? $msg = "Preencha todos os campos" : $msg = "Formato de imagem não permitido";
        $_SESSION['warning'] = $msg;
        header("Location: form.php");
        exit;
    }

    //verificação dos dados do proprietario
    $cpf != null ? $id_proprietario = $cpf : $id_proprietario = $cnpj;
    $id_proprietario = filter_var($id_proprietario, FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($nome) || empty($id_proprietario) || empty($placa) || empty($chassi) || empty($renavam)) {
        $error = 'data';
        returnError($error);
    }

    //validação da imagem
    if (!in_array($_FILES['foto-veiculo']['type'], array('image/png', 'image/jpg', 'image/jpeg'))) {
        $error = 'foto';
        returnError($error);
    }

    //movendo a imagem 
    $foto_carro = md5(time() * rand(0, 1000)) . ".png";
    move_uploaded_file($_FILES['foto-veiculo']['tmp_name'], 'public/images/' . $foto_carro);

    //enviando os dados para a classe carro
    global $pdo;
    $carro = new Carro($pdo);


    $res = $carro->adicionarCarro($nome, $id_proprietario, $placa, $chassi, $renavam, $foto_carro, $ipva, $multas, $licenciamento);

    if ($res) {
        header("Location:index.php");
        exit;
    }
}
