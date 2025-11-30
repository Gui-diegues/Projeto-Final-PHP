<style>

.text{
    text-align: center;
    margin-top: 20px;
    font-size: 28px;
}
.forms {
    display: flex;            
    flex-wrap: wrap;          
    gap: 12px;                
    justify-content: center;  
    padding: 20px;
    box-sizing: border-box;
  }

 
  .item {
    
    width: 250px;          
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

<?php
    require_once "config.inc.php";

    $sql = "SELECT * FROM clientes";

    $resultado = mysqli_query($conexao, $sql);


    echo"<h2 class='text'>Lista de clientes</h2>";
    echo "<div class='forms'>";
    if (mysqli_num_rows($resultado) > 0){
        while($dados = mysqli_fetch_array($resultado)) {
            
            echo "<div class='item'>";
            echo "ID: " . $dados["id"] . "<br>";
            echo "Nome: " . $dados["cliente"] . "<br>";
            echo "Cidade: " . $dados["cidade"] . "<br>";
            echo "Estado: " . $dados["estado"] . "<br>";
            
            echo "<a class='editar' href='?pg=clientes_form_alterar&id=$dados[id]'>Editar</a>";
            echo " | <a class='excluir' href='?pg=clientes_excluir&id=$dados[id]'>Excluir</a>";
            echo "</div>";
        }
    echo "</div>";
    }else{
        echo "<h2>Nenhum cliente cadastrado</h2>";
        echo "<a href='?pg=index'>Voltar</a>";
    }
            
?>