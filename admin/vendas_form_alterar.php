<?php
    require_once "config.inc.php";

    $id = $_GET["id"];
    $sql = "SELECT * FROM produtos WHERE id = '$id'";
    
    $resultado = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($resultado) > 0){
        while($dados = mysqli_fetch_array($resultado)){
            $produto = $dados['produto'];
            $quantidade = $dados['quantidade'];
            $valor = $dados['valor'];
            $id = $dados['id'];
        }
    
?>

<h2>Alteração de produto</h2>
    <form action="?pg=vendas_alterar" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        
        <label>Produto:</label>
        <input type="text" name="produto" value="<?=$produto?>"><br>
        <label>Quantidade:</label>
        <input type="text" name="quantidade" value="<?=$quantidade?>"><br> 
        <label>Valor:</label>
        <input type="text" name="valor" value="<?=$valor?>"><br>
        <input type="submit" value="Alterar produto"> 

    </form>

    <?php
    }else{
        echo "<h2>Nenhum produto encontrado</h2>";
    }
    ?>