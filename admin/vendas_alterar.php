<?php

require_once "config.inc.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $produto = $_POST["produto"];
    $quantidade = $_POST["quantidade"];
    $valor = $_POST["valor"];
    $id = $_POST["id"];

    $sql = "UPDATE produtos SET 
            produtos = '$produtos',
            quantidade = '$quantidade',
            valor = '$valor'
            WHERE id = '$id'";

    if(mysqli_query($conexao, $sql)){
        echo "<h3>Produto alterado com sucesso!</h3>";
        echo "<a class='botaomenu' href='?pg=index.php'>Voltar</a>";
    }else{
        echo "<h3>Erro ao alterar Produto!</h3>";
    }
}else{
    echo "<h2>Acesso negado!</h2>";
    echo "<a class='botaomenu' href='?pg=index.php'>Voltar</a>";
}

mysqli_close($conexao);
