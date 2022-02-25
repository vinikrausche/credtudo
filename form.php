<?php
session_start();
require_once "layout/header.php";
?>

<div class="container" id="container">
    <h1>Cadastro do Veículo</h1>
    <form id="form" enctype="multipart/form-data" method="POST" action="formAction.php">
        <?php if (isset($_SESSION['warning'])) : ?>
            <span id="warning">
                <?= $_SESSION['warning'];
                unset($_SESSION['warning']);
                ?></span>
        <?php endif; ?>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Proprietário</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="mb-3">
            <label for="juridica">Escolha Pessoa Física ou Jurídica</label>
            <select class="form-select" aria-label="Default select example" id="juridica">
                <option value="1">Pessoa Física</option>
                <option value="2">Pessoa Jurídica</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf">
        </div>
        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" disabled name="cnpj">
        </div>
        <div class="mb-3">
            <label for="placa" class="form-label">Placa do Veículo</label>
            <input type="text" class="form-control" id="placa" name="placa">
        </div>
        <div class="mb-3">
            <label for="chassi" class="form-label">Chassi</label>
            <input type="text" class="form-control" id="chassi" name="chassi">
        </div>
        <div class="mb-3">
            <label for="renavam" class="form-label">Renavam</label>
            <input type="text" class="form-control" id="renavam" name="renavam">
        </div>
        <div class="mb-3">
            <label for="foto-veiculo" class="form-label">Foto do Veículo</label>
            <input type="file" class="form-control" id="foto-veiculo" name="foto-veiculo">
        </div>
        <div class="mb-3">
            <label for="multa" class="form-label">Quantidade de Multas</label>
            <input type="number" class="form-control" min="0" name="multa">
        </div>
        <div class="mb-3">
            <label for="licenciamento" class="form-label">Veículo Licenciado ?</label>
            <select name="licenciamento" id="licenciamento" class="form-select">
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ipva" class="form-label">Alíquota do Ipva %</label>
            <input type="number" class="form-control" id="ipva" name="ipva" min="0" max="4">
        </div>
        <button type="submit" name="enviar" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<?php require_once "layout/footer.php" ?>