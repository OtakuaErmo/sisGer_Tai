<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisGer</title>
</head>
<body>
    <?php
    echo "
    <table class='table'>
        <tr>
            <td><a href='view/cliente/listarClienteView.php'>Cliente</a></td>
            <td><a href='view/veiculo/listarVeiculoView.php'>Veículo</a></td>
            <td><a href='view/locacao/listarLocacaoView.php'>Locação</a></td>
            <td><a href='view/multa/listarMultaView.php'>Multa</a></td>
        </tr>  
    </table>";
 
    ?>
</body>

<style>
    body{
        background-color: #CCC;
    }   
    .table{

        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);  

    }
</style>

</html>