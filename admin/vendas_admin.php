<style>

.text{
    text-align: center;
    margin-top: 20px;
    font-size: 28px;
}
.forms {
    width: 400px;
    flex-wrap: wrap;          /* permite quebrar para a próxima linha */
    gap: 16px;                /* espaço entre as caixas */
    justify-content: center;  /* centraliza as caixas na linha */
    padding: 20px;
    box-sizing: border-box;
  }

  /* cada caixa */
  .item {
    width: 300px;          /* não cresce, pode encolher, base 300px */
    box-sizing: border-box;
    border: 1px solid #ddd;
    padding: 12px;
    background: #fff;
    border-radius: 6px;
  }
.editar {
    background-color: #007bff;
}

.excluir {
    background-color: #dc3545;
}
</style>

<?php
    require_once "config.inc.php";

    $sql = "SELECT * FROM produtos";

    $resultado = mysqli_query($conexao, $sql);


    echo"<h2 class='text'>Lista de produtos</h2>";

    if (mysqli_num_rows($resultado) > 0){
        while($dados = mysqli_fetch_array($resultado)) {
            
            echo "<div class='forms'>";
            echo "<div class='item'>";
            echo "ID: " . $dados["id"] . "<br>";
            echo "</div>";

            echo "<div class='item'>";
            echo "Produto: " . $dados["produto"] . "<br>";
            echo "</div>";

            echo "<div class='item'>";
            echo "Quantidade: " . $dados["quantidade"] . "<br>";
            echo "</div>";

            echo "<div class='item'>";
            echo "Valor: " . $dados["valor"] . "<br>";
            echo "</div>";
            
        echo "</div>";
            echo "<a class='editar' href='?pg=vendas_form_alterar&id=$dados[id]'>Editar</a>";
            echo " | <a class='excluir'href='?pg=vendas_excluir&id=$dados[id]'>Excluir</a>";
            

        }
    }else{
        echo "<h2>Nenhum produto cadastrado</h2>";
        echo "<a href='?pg=index'>Voltar</a>";
    }
            
?>