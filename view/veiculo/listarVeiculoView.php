<?php

include '../../control/VeiculoController.php';
//include '../../model/MunicipioModel.php';
include '../../model/ClienteModel.php';
include '../../lib/util.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículo</title>
</head>
<body>
<a href='../../index.php'><button>Tela Inicial</button></a></br>
</br>

    <!--    formulario com o botao para chamar o arquivo formCliente -->
    <form action="formVeiculoView.php" method="POST">
        <label>Cadastrar Veículo: </label>
        <input type="submit" value="Novo">
    </form></br>
    <form action="listarVeiculoView.php" method="POST">
        <label>Buscar: </label>
        <input type="text" name="valor" />
        <select name="tipo">
            <option value="placa">Placa</option>
            <option value="tipo_veiculo">Tipo</option>
            <option value="fabricante">Fabricante</option>
            <option value="modelo">Modelo</option>
        </select>
        <input type="submit" value="Buscar">
    </form>
    <?php

    $objVeiculoController = new VeiculoController();

    if (!empty($_POST['valor'])) {
        $result = $objVeiculoController->search($_POST);
    } else {
        //Faz a chamada do metodo selectAll para conecta com o Banco de Dados
        $result = $objVeiculoController->index();
    }
    
    $objClienteModel = new ClienteModel();
    //monta uma tabela e lista os dados atraves do foreach
    echo "
<table style=''>
<tr>
  <th>ID</th>
  <th>Placa</th>
  <th>Tipo</th>
  <th>Fabricante</th>
  <th>Modelo</th>
  <th>Cliente</th>
  <th>Ação</th>
</tr>";
    foreach ($result as $item) {
        $objCliente = $objClienteModel::find($item['cliente_id']);
        echo "
    <tr>
      <td>" . $item['id'] . "</td>
      <td>" . $item['placa'] . "</td>
      <td>" . $item['tipo_veiculo'] . "</td>
      <td>" . $item['fabricante'] . "</td>
      <td>" . $item['modelo'] . "</td>
      <td>" . $objCliente->nome  . "</td>
      <td><a href='formEditarVeiculoView.php?id=" . $item['id'] . "'><button>Editar</button></a></td>
      <td><a href='formDeletarVeiculoView.php?id=" . $item['id'] . "'><button>Deletar</button></a></td>
    </tr>
    ";
        //a ultima linha foi criado um link para passar o parameto do id para a pagina formEditarCliente
    }
    echo "</table>";

    ?>

</body>
<style>
    body{
        background-color: #CCC;
    }   
</style>

</html>