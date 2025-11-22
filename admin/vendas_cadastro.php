<?php
    require_once "config.inc.php";

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $prduto = $_POST["produto"];
        $quantidade = $_POST["quantidade"];
        $valor = $_POST["valor"];

        $sql = "INSERT INTO produtos (produto, quantidade, valor) VALUES ('$produto', '$quabtidade', '$valor')";

        if(mysqli_query($conexao, $sql)){
            echo "<h3>Produto cadastrado com sucesso</h3>";
            echo "<a href='?pg=clientes_admin'>Voltar</a>";
        }else{
            echo "<h3>Erro ao cadastrar produto</h3>";
        }

    }else{
        echo "<h2>Acesso negado!</h2>";
        echo "<a href='?pg=clientes_admin'>Voltar</a>";
    }
?>