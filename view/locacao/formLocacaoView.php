<?php

//include
include '../../control/LocacaoController.php';
include '../../model/VeiculoModel.php';
include '../../model/ClienteModel.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Locação</title>
</head>

<body>
    <div class='center'>
        <?php

        $objLocacaoController = new LocacaoController();

        if (!empty($_POST)) {

            $objLocacaoController->create($_POST);

        }

        $objClienteModel = new ClienteModel();
        $resultCliente =  $objClienteModel::selectAll();

        $objVeiculoModel = new VeiculoModel();
        $resultVeiculo =  $objVeiculoModel::selectAll();

        ?>

        <!-- propriedade action faz a chamada do BD.php para pegar o valor do form
            o restante e um formulario comum usando o metodo POST
        -->
        <form action="formLocacaoView.php" method="POST">

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

            <label>data-retirada</label>
            <input type="date" name="data_retirada"> <br>

            <label>hora-retirada</label>
            <input type="time" name="hora_retirada"> <br>

            <label>data-devolucao</label>
            <input type="date" name="data_devolucao"> <br>

            <label>hora-devolucao</label>
            <input type="time" name="hora_devolucao"> <br>

            <input type="submit" value="Enviar">
        </form>
        <a href="listarLocacaoView.php"><button>Voltar</button></a>
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