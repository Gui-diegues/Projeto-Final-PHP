<link rel="stylesheet" href="style.css">
<?php
    require_once "config.inc.php";

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $produto = $_POST["produto"];
        $quantidade = $_POST["quantidade"];
        $valor = $_POST["valor"];

        $sql = "INSERT INTO produtos (produto, quantidade, valor) VALUES ('$produto', '$quantidade', '$valor')";

        if(mysqli_query($conexao, $sql)){
            echo "<h3 class'print'>Produto cadastrado com sucesso</h3>";
            echo "<a href='?pg=clientes_admin'>Voltar</a>";
        }else{
            echo "<h3 class='print'>Erro ao cadastrar produto</h3>";
        }

    }else{
        echo "<h2 class='print'>Acesso negado!</h2>";
        echo "<a href='?pg=clientes_admin'>Voltar</a>";
    }
?>