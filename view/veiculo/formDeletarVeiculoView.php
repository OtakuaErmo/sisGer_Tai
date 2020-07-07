<?php

//include
include '../../control/VeiculoController.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deletar Veículo</title>
</head>

<body>
    <div class='center'>
        <?php

        $objVeiculoController = new VeiculoController();

        if (!empty($_POST['confirmar'])) {

            // chama o metodo REMOVE recebendo os dados do veiculo através do metodo $_POST

            $objVeiculoController->remove($_GET['id']);

            // metodo header faz uma chamada para a tela de listagem depois que realizou a adicao

            header("Location: listarVeiculoView.php");
        }
        ?>

        <form action="formDeletarVeiculoView.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <label>Deseja Deletar o Registro?</label>
            <input type="hidden" name="confirmar" value="ok" /> <br>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />

            <input type="submit" value="Deletar">
        </form>
        <a href="listarVeiculoView.php"><button>Cancelar</button></a>
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