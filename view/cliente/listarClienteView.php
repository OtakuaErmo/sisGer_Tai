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
    <title>Cliente</title>
</head>
<body>
    <div class='center'>
    <a href='../../index.php'><button>Tela Inicial</button></a></br>
    </br>

        <!-- formulario -->
        <form action="formClienteView.php" method="POST">
            <label>Cadastrar Cliente: </label>
            <input type="submit" value="Novo">
        </form></br>
        <form action="listarClienteView.php" method="POST">
            <label>Buscar: </label>
            <input type="text" name="valor" />
            <select name="tipo">
                <option value="nome">Nome</option>
                <option value="cpf">CPF</option>
            </select>
            <input type="submit" value="Buscar">
        </form>
        <?php

        $objClienteController = new ClienteController();

        if (!empty($_POST['valor'])) {

            $result = $objClienteController->search($_POST);

        } else {

            //Faz a chamada do metodo index
            $result = $objClienteController->index();

        }
        
        $objMunicipioModel = new MunicipioModel();

        //tabela com listagem de dados com foreach
        echo "
        <table style=''>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Município</th>
        <th>UF</th>
        <th>Ano-Nascimento</th>
        <th>Ação</th>
        </tr>";
        foreach ($result as $item) {
            $objMunicipio = $objMunicipioModel::find($item['municipio_id']);
            echo "
        <tr>
        <td>" . $item['id'] . "</td>
        <td>" . $item['nome'] . "</td>
        <td>" . $item['cpf'] . "</td>
        <td>" . $objMunicipio->nome  . "</td>
        <td>" . $objMunicipio->uf  . "</td>
        <td>" . $item['data_nascimento'] . "</td>
        <td><a href='formEditarClienteView.php?id=" . $item['id'] . "'><button>Editar</button></a></td>
        <td><a href='formDeletarClienteView.php?id=" . $item['id'] . "'><button>Deletar</button></a></td>
        </tr>
        ";

        }

        echo "</table>";

        ?>
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