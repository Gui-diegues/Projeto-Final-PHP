<style>

.text{
    text-align: center;
    margin-top: 20px;
    font-size: 28px;
}
.forms {
    display: flex;            /* usa flexbox */
    flex-wrap: wrap;          /* permite quebrar para a próxima linha */
    gap: 12px;                /* espaço entre as caixas */
    justify-content: center;  /* centraliza as caixas na linha */
    padding: 20px;
    box-sizing: border-box;
  }

  /* cada caixa */
  .item {
    
    width: 250px;          /* não cresce, pode encolher, base 300px */
    box-sizing: border-box;
    border: 1px solid #ddd;
    padding: 15px;
    background-color: #fff;
    border-radius: 6px;
  }
.editar {
    background-color: #3491f5ff;
    border: 1px solid #0f0f0fff;
    color: white;
    padding: 1px 5px;
    margin: 1px;
}

.excluir {
    background-color: #f14153ff;
    border: 1px solid #0f0f0fff;
    color: white;
    padding: 1px 5px;
    margin: 1px;
}
</style>
<link rel="stylesheet" href="style.css">
<?php
    require_once "config.inc.php";

    $sql = "SELECT * FROM produtos";

    $resultado = mysqli_query($conexao, $sql);


    echo"<h2 class='text'>Lista de produtos</h2>";

    echo "<div class='forms'>";

    if (mysqli_num_rows($resultado) > 0){
        while($dados = mysqli_fetch_array($resultado)) {
            
            
            echo "<div class='item'>";

            echo "ID: " . $dados["id"] . "<br>";
            echo "Produto: " . $dados["produto"] . "<br>";
            echo "Quantidade: " . $dados["quantidade"] . "<br>";
            echo "Valor: " . $dados["valor"] . "<br>";


            echo "<a class='editar' href='?pg=vendas_form_alterar&id=$dados[id]'>Editar</a>";
            echo " | <a class='excluir'href='?pg=vendas_excluir&id=$dados[id]'>Excluir</a>";   
        echo "</div>";
    
        }
    echo "</div>";
    }else{
        echo "<h2 class='print'>Nenhum produto cadastrado</h2>";
        echo "<a href='?pg=index'>Voltar</a>";
    }
            
?>