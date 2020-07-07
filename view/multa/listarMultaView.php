<?php

include '../../control/MultaController.php';

include '../../lib/util.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multa</title>
</head>
<body>
<div class='center'>
<a href='../../index.php'><button>Tela Inicial</button></a></br>
</br>

    <!--    formulario com o botao para chamar o arquivo formCliente -->
    <form action="formMultaView.php" method="POST">
        <label>Cadastrar Multa: </label>
        <input type="submit" value="Novo">
    </form></br>
    <form action="listarMultaView.php" method="POST">
        <label>Buscar: </label>
        <input type="text" name="valor" />
        <select name="tipo">
            <option value="veiculo_id">Veiculo</option> <!--buscar por nome-->
            <option value="cliente_id">Cliente</option>
        </select>
        <input type="submit" value="Buscar">
    </form>
    <?php

    $objMultaController = new MultaController();

    if (!empty($_POST['valor'])) {
        $result = $objMultaController->search($_POST);
    } else {
        //Faz a chamada do metodo selectAll para conecta com o Banco de Dados
        $result = $objMultaController->index();
    }
    

    //monta uma tabela e lista os dados atraves do foreach
    echo "
<table style=''>
<tr>
  <th>ID</th>
  <th>Cliente</th>
  <th>Veiculo</th>
  <th>Locação</th>
  <th>Custo</th>
  <th>Data-Multa</th>
  <th>Hora-Multa</th>
</tr>";
    foreach ($result as $item) {
        echo "
    <tr>
      <td>" . $item['id'] . "</td>
      <td>" . $item['cliente_id'] . "</td>
      <td>" . $item['veiculo_id'] . "</td>
      <td>" . $item['locacao_id']  . "</td>
      <td>" . $item['custo']  . "</td>
      <td>" . $item['data_multa'] . "</td>
      <td>" . $item['hora_multa'] . "</td>
      <td><a href='formEditarMultaView.php?id=" . $item['id'] . "'><button>Editar</button></a></td>
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