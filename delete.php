<?php
session_start();
require_once "config.php";
require_once "core/Carro.php";
//recebendo id do proprietário



if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = addslashes($_GET['id']);

if ($id) {
    $carro = new Carro($pdo);
    $res =  $carro->deletarCarro($id);

    if ($res) {
        $_SESSION['msg'] = "Dados deletado com sucesso!";
        header("Location: index.php");
        exit;
    }
}
