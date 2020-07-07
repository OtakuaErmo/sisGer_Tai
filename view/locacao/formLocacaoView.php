<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
include '../../control/LocacaoController.php';
include '../../model/VeiculoModel.php';
include '../../model/ClienteModel.php';
include '../../lib/util.php';
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
    <?php

    $objLocacaoController = new LocacaoController();

    if (!empty($_POST)) {
        //chama o metodo INSERT recebendo os dados do usuário através do metodo $_POST
        $objLocacaoController->create($_POST);
    }  

    $objClienteModel = new ClienteModel();
    $resultCliente =  $objClienteModel::selectAll();

    $objVeiculoModel = new VeiculoModel();
    $resultVeiculo =  $objVeiculoModel::selectAll();
   //         $date = new DateTime($itens['data_nascimento']);
   //         $date->sub(new DateInterval('P18Y'));

   
    ?>

    <!-- propriedade action faz a chamada do BD.php para pegar o valor do form
        o restante e um formulario comum usando o metodo POST
    -->
    <form action="formLocacaoView.php" method="POST">

        <label>Cliente</label>
        <select name="cliente_id">
            <?php

            //listagem dos municipios
            foreach ($resultCliente as $itens) {

                echo "<option value='" . $itens['id'] . "'>" . $itens['nome'] . "</option>";

            }
            ?>
        </select>
        <br>
        <label>Veiculo</label>
        <select name="veiculo_id">
            <?php
            //listagem dos municipios
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
</body>
<style>
    body{
        background-color: #CCC;
    }   
</style>
</html>