<?php
    require_once "config.inc.php";

    $sql = "SELECT * FROM clientes";

    $resultado = mysqli_query($conexao, $sql);

    echo "<a href='?pg=clientes_form'>Cadastrar clientes</a>";

    echo"<h2>Lista de clientes</h2>";

    if (mysqli_num_rows($resultado) > 0){
        while($dados = mysqli_fetch_array($resultado)) {
            echo "ID: " . $dados["id"] . "<br>";
            echo "Nome: " . $dados["cliente"] . "<br>";
            echo "Cidade: " . $dados["cidade"] . "<br>";
            echo "Estado: " . $dados["estado"] . "<br>";
            echo "<a href='?pg=clientes_form_alterar&id=$dados[id]'>Editar</a>";
            echo " | <a href='?pg=clientes_excluir&id=$dados[id]'>Excluir</a>";
            echo "<hr>";

        }
    }else{
        echo "<h2>Nenhum cliente cadastrado</h2>";
        echo "<a href='?pg=clientes_admin'>Voltar</a>";
    }
            
?>