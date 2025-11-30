<style>
    .excluir {
        margin-top: 20px;
        padding: 20px;
        font-size: 24px;
    }
</style>

<?php

    require_once "config.inc.php";
    $id = $_GET["id"];
    $sql = "DELETE FROM produtos WHERE id = '$id'";
    
    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        echo "<h3 class='excluir'>Produto excluido com sucesso!</h3>";
        echo "<a class='botaomenu' href='?pg=vendas_admin'>Voltar</a>";
    }else{
        echo "Erro ao excluir produto!";
    }
        mysqli_close($conexao);
?>