<?php

//include
include '../../control/ClienteController.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deletar Cliente</title>
</head>

<body>
    <div class='center'>
        <?php

        $objClienteController = new ClienteController();

        if (!empty($_POST['confirmar'])) {
            //chama o metodo DELETAR recebendo os dados através do metodo $_POST
            $objClienteController->remove($_GET['id']);

            header("Location: listarClienteView.php");
        }
        ?>

        <form action="formDeletarClienteView.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <label>Deseja Deletar o Registro?</label>
            <input type="hidden" name="confirmar" value="ok" /> <br>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />

            <input type="submit" value="Deletar">
        </form>
        <a href="listarClienteView.php"><button>Cancelar</button></a>
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