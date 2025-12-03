<link rel="stylesheet" href="style.css">

<?php
    require_once "config.inc.php";

    $id = $_GET["id"];
    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    
    $resultado = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($resultado) > 0){
        while($dados = mysqli_fetch_array($resultado)){
            $nome = $dados['cliente'];
            $cidade = $dados['cidade'];
            $estado = $dados['estado'];
            $id = $dados['id'];
        }
    
?>

<h2 class='print'>Cadastro de cliente</h2>
    <form action="?pg=clientes_alterar" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        
        <label>Nome:</label>
        <input type="text" name="cliente" value="<?=$cliente?>"><br>
        <label>cidade:</label>
        <input type="text" name="cidade" value="<?=$cidade?>"><br> 
        <label>Estado:</label>
        <input type="text" name="estado" value="<?=$estado?>"><br>
        <input type="submit" value="Cadastrar cliente"> 

    </form>

    <?php
    }else{
        echo "<h2>Nenhum cliente encontrado</h2>";
    }
    ?>