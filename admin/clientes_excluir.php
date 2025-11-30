<link rel="stylesheet" href="style.css">
<?php

    require_once "config.inc.php";
    $id = $_GET["id"];
    $sql = "DELETE FROM clientes WHERE id = '$id'";
    
    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        echo "<h3 class='print'>Registro excluido com sucesso!</h3>";
        echo "<a class='botaomenu' href='?pg=clientes_admin'>Voltar</a>";
    }else{
        echo "<h3 class='print'>Erro ao excluir registro!</h3>";
    }
        mysqli_close($conexao);
?>