<?php

//include
include '../../control/MultaController.php';
include '../../model/ClienteModel.php';
include '../../model/VeiculoModel.php';
include '../../model/LocacaoModel.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Multa</title>
</head>

<body>
    <div class='center'>
        <?php

        $objMultaController = new MultaController();

        if (!empty($_POST)) {
            //chama o metodo create recebendo os dados do usuário através do metodo $_POST
            $objMultaController->create($_POST);
        }  

        $objClienteModel = new ClienteModel();
        $resultCliente =  $objClienteModel::selectAll();

        $objVeiculoModel = new VeiculoModel();
        $resultVeiculo =  $objVeiculoModel::selectAll();
        
        $objLocacaoModel = new LocacaoModel();
        $resultLocacao =  $objLocacaoModel::selectAll();

        ?>
        
        <!-- formulario -->
        <form action="formMultaView.php" method="POST">

        <label>Cliente</label>
            <select name="cliente_id">
                <?php
                //listagem dos clientes
                foreach ($resultCliente as $itens) {
                    echo "<option value='" . $itens['id'] . "'>" . $itens['nome'] . "</option>";
                }
                ?>
            </select>
            <br>

            <label>Veiculo</label>
            <select name="veiculo_id">
                <?php
                //listagem dos veiculos
                foreach ($resultVeiculo as $itens) {
                    echo "<option value='" . $itens['id'] . "'>" . $itens['modelo'] . "</option>";
                }
                ?>
            </select><br>

            <label>Locacao</label>
            <select name="locacao_id">
                <?php
                //listagem das locacoes
                foreach ($resultLocacao as $itens) {
                    echo "<option value='" . $itens['id'] . "'>" . $itens['id'] . "</option>";
                }
                ?>
            </select><br>

            <label>Custo</label>
            <input type="double" name="custo"> <br>

            <label>Data-Multa</label>
            <input type="date" name="data_multa"> <br>

            <label>Hora-Multa</label>
            <input type="time" name="hora_multa"> <br>

            <input type="submit" value="Enviar">
        </form>
        <a href="listarMultaView.php"><button>Voltar</button></a>
    </div>
</body>
    <!-- css -->
    <style>
        body{
            background-color: #CCC;
        }
        .center{
            position: absolute;
            left: 50%;
            transform: translate(-50%, 0);  
        } 
    </style>
</html>