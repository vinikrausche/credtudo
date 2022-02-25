<?php
session_start();
require_once "layout/header.php";
require_once "config.php";
require_once "core/Carro.php";
$veiculo = new Carro($pdo);
$id = $_GET['id'];
$veiculo = $veiculo->pegarCarro($_GET['id']);
?>
<div class="container">
    <?php if (isset($_SESSION['warning'])) : ?>
        <span><?= $_SESSION['warning'];
                unset($_SESSION['warning']); ?></span>
    <?php endif; ?>
    <h2>Editar Dados</h2>
    <form class="row g-3" method="POST" action="editAction.php?id=<?= $id ?>" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php $id; ?>">
        <div class="col-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $veiculo['proprietario'] ?>">
        </div>
        <div class="col-6">
            <label for="">Pessoa Física ou juridica</label>
            <select class="form-select" name="opcao" id="juridica">
                <option value="1">CPF</option>
                <option value="2">CNPJ</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf">
        </div>
        <div class="col-md-6">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" disabled>
        </div>
        <div class="col-md-4">
            <label for="placa" class="form-label">Placa</label>
            <input type="text" class="form-control" id="placa" name="placa">
        </div>
        <div class="col-md-4">
            <label for="chassi" class="form-label">Chassi</label>
            <input type="text" class="form-control" id="chassi" name="chassi">
        </div>
        <div class="col-md-4">
            <label for="renavam" class="form-label">Renavam</label>
            <input type="text" class="form-control" id="renavam" name="renavam">
        </div>
        <div class="col-md-4">
            <label for="foto_carro" class="form-label">Foto do Veículo</label>
            <input type="file" name="foto_carro" class="form-control">
        </div>
        <div class="col-md-2">
            <label for="multas" class="form-label">Quantidade de Multas</label>
            <input type="number" class="form-control" id="multas" name="multas">
        </div>
        <div class="col-md-2">
            <label for="licenciamento" class="form-label">Veículo Licenciado ?</label>
            <select name="licenciamento" id="licenciamento" class="form-select">
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="ipva" class="form-label">Alíquota de Ipva</label>
            <input type="number" class="form-control" id="ipva" name="ipva">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success" name="salvar">Salvar</button>
        </div>
    </form>
</div>
<?php include_once "layout/footer.php" ?>