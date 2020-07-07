<?php

//include
include '../../control/ClienteController.php';
include '../../model/MunicipioModel.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Cliente</title>
</head>

<body>
    <div class='center'>
        <?php

        $objClienteController = new ClienteController();

        if (!empty($_POST)) {

            //chama o metodo INSERT recebendo os dados do metodo $_POST
            $objClienteController->create($_POST);

        }  

        $objMunicipioModel = new MunicipioModel();
        $resultMunicipios =  $objMunicipioModel::selectAll();

        ?>

        <form action="formClienteView.php" method="POST">
            <label>Nome</label>
            <input type="text" name="nome"> <br>

            <label>CPF</label>
            <input type="text" name="cpf"> <br>

            <label>Telefone</label>
            <input type="text" name="telefone"> <br>

            <label>E-mail</label>
            <input type="text" name="email"> <br>

            <label>Município</label>
            <select name="municipio_id">
                <?php
                //listagem dos municipios
                foreach ($resultMunicipios as $itens) {
                    echo "<option value='" . $itens['id'] . "'>" . $itens['nome'] . "</option>";
                }
                ?>
            </select>
            <br>
            <label>Ano de Nascimento</label>
            <input type="date" name="data_nascimento"> <br>

            <input type="submit" value="Enviar">
        </form>
        <a href="listarClienteView.php"><button>Voltar</button></a>
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