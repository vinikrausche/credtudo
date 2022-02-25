<?php
session_start();
require_once "core/Carro.php";
require_once "config.php";
if (isset($_POST['salvar'])) {
    $id = $_GET['id'];
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
    $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_SPECIAL_CHARS);
    $chassi = filter_input(INPUT_POST, 'chassi', FILTER_SANITIZE_SPECIAL_CHARS);
    $renavam = filter_input(INPUT_POST, 'renavam', FILTER_SANITIZE_SPECIAL_CHARS);
    $ipva = filter_input(INPUT_POST, 'ipva', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $multas = filter_input(INPUT_POST, 'multas', FILTER_VALIDATE_FLOAT);
    $licenciamento = filter_input(INPUT_POST, 'licenciamento', FILTER_SANITIZE_SPECIAL_CHARS);

    //verificação dos dados do proprietario
    $cpf != null ? $id_proprietario = $cpf : $id_proprietario = $cnpj;
    $id_proprietario = filter_var($id_proprietario, FILTER_SANITIZE_SPECIAL_CHARS);


    if (!in_array($_FILES['foto_carro']['type'], array('image/png', 'image/jpg', 'image/jpeg'))) {
        $_SESSION['warning'] = "FORMATO DE IMAGEM INVÁLIDO";
        header("Location: edit.php?id=" . $_GET['id']);
        exit;
    }


    if (empty($nome) || empty($placa) || empty($chassi) || empty($renavam) || empty($id_proprietario)) {
        $_SESSION['warning'] = "PREENCHA TODOS OS CAMPOS";
        header("Location: edit.php?id=" . $_GET['id']);
        exit;
    }

    $foto_carro = md5(time() * rand(0, 9999)) . ".png";
    move_uploaded_file($_FILES['foto_carro']['tmp_name'], 'public/images/' . $foto_carro);

    $carro = new Carro($pdo);
    $res = $carro->atualizarInfo($id, $nome, $id_proprietario, $placa, $chassi, $renavam, $foto_carro, $ipva, $multas, $licenciamento);

    if ($res) {
        $_SESSION['success'] = "Dados atualizados com sucesso!";
        header("Location:index.php");
        exit;
    }
}
