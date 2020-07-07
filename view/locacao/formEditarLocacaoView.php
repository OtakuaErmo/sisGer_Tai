<?php

//include
include '../../control/LocacaoController.php';
include '../../model/ClienteModel.php';
include '../../model/VeiculoModel.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Locação</title>
</head>

<body>
    <div class='center'>
        <?php

        $objLocacaoController = new LocacaoController();

        if (!empty($_POST)) {
            //chama o metodo UPDATE recebendo os dados através do metodo $_POST
            $objLocacaoController->update($_POST);

            header("Location: listarLocacaoView.php");
        }   

        //Busca os dados no banco de dados pelo ID
        $objLocacao = $objLocacaoController->find($_GET['id']);

        $objClienteModel = new ClienteModel();
        $resultCliente =  $objClienteModel::selectAll();

        $objVeiculoModel = new VeiculoModel();
        $resultVeiculo =  $objVeiculoModel::selectAll();
        ?>

        <form action="formEditarLocacaoView.php" method="POST">
            <!-- Input Hidden tag que fica oculta para receber o valor do ID do form--->
            <!-- passo os id para a propriedade value -->
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

            <label>Cliente</label>
            <select name="cliente_id">
                <?php
                //percorre os clientes 
                foreach ($resultCliente as $itens) {

                    $selected = ($itens['id'] == $objLocacao->cliente_id ? "selected" : "");

                    echo "<option value='" . $itens['id'] . "' " . $selected . " >" .
                    $itens['nome'] . "</option>";

                }
                ?>
            </select><br>
            <label>Veiculo</label>
            <select name="veiculo_id">
                <?php
                //percorre os veiculos 
                foreach ($resultVeiculo as $itens) {

                    $selected = ($itens['id'] == $objLocacao->veiculo_id ? "selected" : "");

                    echo "<option value='" . $itens['id'] . "' " . $selected . " >" .
                    $itens['modelo'] . "</option>";

                }
                ?>
            </select><br>

            <label>Data Retirada</label>
            <!-- passo valor do atributo data retirada para a propriedade value -->
            <input type="date" name="data_retirada" value="<?php echo $objLocacao->data_retirada; ?>"> <br>

            <label>Hora Retirada</label>
            <!-- passo valor do atributo hora retirada para a propriedade value -->
            <input type="time" name="hora_retirada" value="<?php echo $objLocacao->hora_retirada; ?>"> <br>

            <label>Data Devolução</label>
            <!-- passo valor do atributo data devolucao para a propriedade value -->
            <input type="date" name="data_devolucao" value="<?php echo $objLocacao->data_devolucao; ?>"> <br>

            <label>Hora Devolucao</label>
            <!-- passo valor do atributo hora devolucao para a propriedade value -->
            <input type="time" name="hora_devolucao" value="<?php echo $objLocacao->hora_devolucao; ?>"> <br>

            <input type="submit" value="Editar">
        
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