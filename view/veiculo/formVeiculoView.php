<?php

//includes
include '../../control/VeiculoController.php';
include '../../model/ClienteModel.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Veículo</title>
</head>

<body>
    <div class='center'>
        <?php

        $objVeiculoController = new VeiculoController();

        if (!empty($_POST)) {
            //chama o metodo INSERT recebendo os dados do usuário através do metodo $_POST
            $objVeiculoController->create($_POST);
        }  

        $objClienteModel = new ClienteModel();
        $resultCliente =  $objClienteModel::selectAll();

        ?>

        <!-- propriedade action faz a chamada do BD.php para pegar o valor do form
            o restante e um formulario comum usando o metodo POST
        -->
        <form action="formVeiculoView.php" method="POST">
            <label>Placa</label>
            <input type="text" name="placa"> <br>

            <label>Tipo</label>
            <input type="text" name="tipo_veiculo"> <br>

            <label>Fabricante</label>
            <input type="text" name="fabricante"> <br>

            <label>Modelo</label>
            <input type="text" name="modelo"> <br>

            <label>Cliente</label>
            <select name="cliente_id">
                <?php
                //listagem dos municipios
                foreach ($resultCliente as $itens) {
                    echo "<option value='" . $itens['id'] . "'>" . $itens['nome'] . "</option>";
                }
                ?>
            </select><br>

            <input type="submit" value="Enviar">
        </form>
        <a href="listarVeiculoView.php"><button>Voltar</button></a>
    </div>
</body>
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