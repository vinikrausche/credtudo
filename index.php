<?php
session_start();

include_once "layout/header.php";
include_once "core/Carro.php";
include_once "config.php";

global $pdo;
$carros = new Carro($pdo);
$veiculos = $carros->mostrarCarros();
?>

<div class="container-fluid" id="container">
    <?php if (isset($_SESSION['msg'])) : ?>
        <span>
            <?php $_SESSION['msg'];
            unset($_SESSION['msg']) ?>
        </span>
    <?php endif; ?>
    <h2>Tabela de Veículos</h2>
    <?php if (isset($veiculos) && !empty($veiculos)) : ?>
        <table class="table  table-light bg-light" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PROPRIETÁRIO</th>
                    <th>IDENTIFICAÇÃO</th>
                    <th>PLACA DO CARRO</th>
                    <th>FOTO DO VEÍCULO</th>
                    <th>CHASSI</th>
                    <th>RENAVAM</th>
                    <th>MULTAS</th>
                    <th>LICENCIAMENTO</th>
                    <th>ALIQUOTA DO IPVA</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($veiculos as $veiculo) : ?>
                    <tr>
                        <td><?= $veiculo['id'] ?></td>
                        <td><?= $veiculo['proprietario'] ?></td>
                        <td><?= $veiculo['id_proprietario'] ?></td>
                        <td><?= $veiculo['placa'] ?></td>
                        <td>
                            <img class="img-veiculo" src="public/images/<?= $veiculo['foto_carro']; ?>" alt="">
                        </td>
                        <td><?= $veiculo['chassi'] ?></td>
                        <td><?= $veiculo['renavam'] ?></td>
                        <td><?= $veiculo['multas'] ?></td>
                        <td><?= $veiculo['licenciamento'] ?></td>
                        <td><?= $veiculo['ipva'] ?></td>
                        <td id="acoes">
                            <a href="edit.php?id=<?= isset($veiculo['id']) ?  $veiculo['id'] : $_SESSION['id'] ?>" class="btn btn-sm btn-info">Editar</a>
                            <a id="danger" href="delete.php?id=<?= $veiculo['id'] ?>" class="btn btn-sm btn-danger">Deletar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <a class="btn btn-primary" href="form.php">Adicionar Carro</a>
        </div>
    <?php else : ?>
        <div style="border: 1px solid #ccc; box-shadow: 1px 1px 4px #ccc;width:50%;padding:15px ;margin:auto">
            <h2 style="text-align: center">Não há dados à serem mostrados</h2>
            <a class="btn btn-primary" href="form.php" style="margin:auto 38% ;width:150px">Adicionar Carro</a>
        </div>
    <?php endif; ?>
</div>

<?php include_once "layout/footer.php"; ?>