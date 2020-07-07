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
    <title>Editar Multa</title>
</head>

<body>
    <div class='center'>
        <?php

        $objMultaController = new MultaController();

        if (!empty($_POST)) {

            //chama o metodo UPDATE recebendo os dados através do metodo $_POST

            $objMultaController->update($_POST);

            //metodo header faz uma chamada para a tela de listagem depois que realizou a edicao

            header("Location: listarMultaView.php");

        }

        $objMulta = $objMultaController->find($_GET['id']);

        $objClienteModel = new ClienteModel();
        $resultCliente =  $objClienteModel::selectAll();

        $objVeiculoModel = new VeiculoModel();
        $resultVeiculo =  $objVeiculoModel::selectAll();
        
        $objLocacaoModel = new LocacaoModel();
        $resultLocacao =  $objLocacaoModel::selectAll();

        ?>

        <form action="formEditarMultaView.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

            <label>Cliente</label>
            <select name="cliente_id">
                <?php
                //percorre os clientes 
                foreach ($resultCliente as $itens) {
                    // operador ternario IF para verificar se o id do cliente da listagem é o mesmo 
                    // ID do campo cliente_id
                    $selected = ($itens['id'] == $objMulta->cliente_id ? "selected" : "");

                    echo "<option value='" . $itens['id'] . "' " . $selected . " >" .
                    $itens['nome'] . "</option>";
                }
                ?>
            </select><br>

            <label>Veiculo</label>
            <select name="veiculo_id">
                <?php
                //percorre os municipios 
                foreach ($resultVeiculo as $itens) {
                    
                    $selected = ($itens['id'] == $objMulta->veiculo_id ? "selected" : "");
                    
                    echo "<option value='" . $itens['id'] . "' " . $selected . " >" .
                    $itens['modelo'] . "</option>";
                }
                ?>
            </select>
            <br>

            <label>Locação</label>
            <select name="locacao_id">
                <?php
                //percorre as locacoes 
                foreach ($resultLocacao as $itens) {

                    $selected = ($itens['id'] == $objMulta->locacao_id ? "selected" : "");

                    echo "<option value='" . $itens['id'] . "' " . $selected . " >" .
                    $itens['id'] . "</option>";
                }
                ?>
            </select>
            <br>

            <label>Custo</label>
            <!-- passo valor do atributo custo para a propriedade value -->
            <input type="double" name="custo" value="<?php echo $objMulta->custo; ?>"> <br>

            <label>Data-Multa</label>
            <!-- passo valor do atributo data multa para a propriedade value -->
            <input type="date" name="data_multa" value="<?php echo $objMulta->data_multa; ?>"> <br>

            <label>Hora-Multa</label>
            <!-- passo valor do atributo hora multa para a propriedade value -->
            <input type="time" name="hora_multa" value="<?php echo $objMulta->hora_multa; ?>"> <br>

            <input type="submit" value="Editar">
        
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
