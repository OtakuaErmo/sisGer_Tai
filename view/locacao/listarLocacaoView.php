<?php

include '../../control/LocacaoController.php';

include '../../model/VeiculoModel.php';
include '../../lib/util.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locação</title>
</head>
<body>
<div class='center'>
<a href='../../index.php'><button>Tela Inicial</button></a></br>
</br>

    <!--    formulario com o botao para chamar o arquivo formCliente -->
    <form action="formLocacaoView.php" method="POST">
        <label>Cadastrar Locação: </label>
        <input type="submit" value="Novo">
    </form></br>
    <form action="listarLocacaoView.php" method="POST">
        <label>Buscar: </label>
        <input type="text" name="valor" />
        <select name="tipo">
            <option value="cliente_id">Cliente ID</option>
            <option value="veiculo_id">Veiculo ID</option>
        </select>
        <input type="submit" value="Buscar">
    </form>
    <?php

    $objLocacaoController = new LocacaoController();

    if (!empty($_POST['valor'])) {
        $result = $objLocacaoController->search($_POST);
    } else {
        //Faz a chamada do metodo selectAll para conecta com o Banco de Dados
        $result = $objLocacaoController->index();
    }

    $objVeiculoModel = new VeiculoModel();


    //monta uma tabela e lista os dados atraves do foreach
    echo "
<table style=''>
<tr>
  <th>ID</th>
  <th>Veículo</th>
  <th>Cliente</th>
  <th>Dia-Retirada</th>
  <th>Hora-Retirada</th>
  <th>Data-Devolução</th>
  <th>Hora-Devolução</th>
  <th>Ação</th>
</tr>";
    foreach ($result as $item) {        

        $objVeiculo = $objVeiculoModel::find($item['veiculo_id']);

        echo "
    <tr>
      <td>" . $item['id']  . "</td>
      <td>" . $objVeiculo->modelo . "</td>
      <td>" . $item['cliente_id']  . "</td>
      <td>" . $item['data_retirada'] . "</td>
      <td>" . $item['hora_retirada'] . "</td>
      <td>" . $item['data_devolucao'] . "</td>
      <td>" . $item['hora_devolucao'] . "</td>
      <td><a href='formEditarLocacaoView.php?id=" . $item['id'] . "'><button>Editar</button></a></td>
    </tr>
    ";
        //a ultima linha foi criado um link para passar o parameto do id para a pagina formEditarCliente
    }
    echo "</table>";

    ?>
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