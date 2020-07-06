<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
    //include '../../control/ClienteController.php';
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Veículo</title>
</head>

<body>
    <?php

    $objVeiculoController = new VeiculoController();

    if (!empty($_POST)) {
        //chama o metodo UPDATE recebendo os dados do usuário através do metodo $_POST
        $objVeiculoController->update($_POST);
        //metodo header faz uma chamada para a tela de listagem
        //depois que realizou a edicao
        header("Location: listarVeiculoView.php");
    }   

    //Busca os dados no banco de dados pelo ID da URL passando como parametro no metodo FIND
    $objVeiculo = $objVeiculoController->find($_GET['id']);

    $objClienteModel = new ClienteModel();
    $resultCliente =  $objClienteModel::selectAll();

    ?>

    <form action="formEditarVeiculoView.php" method="POST">
        <!-- Input Hidden tag que fica oculta para receber o valor do ID do form--->
        <!-- passo os id para a propriedade value -->
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

        <label>Placa</label>
        <!-- passo valor do atributo nome para a propriedade value -->
        <input type="text" name="placa" value="<?php echo $objVeiculo->placa; ?>"> <br>

        <label>Tipo Veículo</label>
        <!-- passo valor do atributo cpf para a propriedade value -->
        <input type="text" name="tipo_veiculo" value="<?php echo $objVeiculo->tipo_veiculo; ?>"> <br>

        <label>Fabricante</label>
        <!-- passo valor do atributo telefone para a propriedade value -->
        <input type="text" name="fabricante" value="<?php echo $objVeiculo->fabricante; ?>"> <br>

        <label>Modelo</label>
        <!-- passo valor do atributo e-mail para a propriedade value -->
        <input type="text" name="modelo" value="<?php echo $objVeiculo->modelo; ?>"> <br>

        <label>Cliente</label>
        <select name="cliente_id">
            <?php
            //percorre os municipios 
            foreach ($resultCliente as $itens) {
                // operador ternario IF para verificar se o id do municipio da listagem é o mesmo ID do campo municipio_id do cliente
                $selected = ($itens['id'] == $objVeiculo->cliente_id ? "selected" : "");
                // se a operação a cima for verdadeiro ele vai setar o municipio correto na Tag Select
                echo "<option value='" . $itens['id'] . "' " . $selected . " >" .
                  $itens['nome'] . "</option>";
            }
            ?>
        </select>
        <br>

        <input type="submit" value="Editar">
       
    </form>
    <a href="listarVeiculoView.php"><button>Voltar</button></a>
</body>
<style>
    body{
        background-color: #CCC;
    }   
</style>
</html>