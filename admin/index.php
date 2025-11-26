
<style>
    .botaomenu{
        text-decoration: none;
        border-bottom: blue solid 2px;
        padding: 10px;
        margin: 10px;
    }
    .frase{
        font-family: Arial, Helvetica, sans-serif;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 32px;
        text-align: center;        
    }
</style>
<?php
    include_once "topoadmin.php";
echo"<br>";

echo"<a class='botaomenu' href='?pg=clientes_admin'>Listar Clientes   </a>";
echo"<a class='botaomenu' href='?pg=clientes_form'>Cadastrar Clientes </a>";
echo"<a class='botaomenu' href='?pg=vendas_admin'>Listar Produto </a>";
echo"<a class='botaomenu' href='?pg=vendas_form'>Cadastrar Produto </a>";


//área de conteudo 
if(empty($_SERVER['QUERY_STRING'])){
    echo"<h2 class='frase'>Bem vindo ao painel Administrativo.</h2>";
}else {
    $pg = "$_GET[pg]";
    include_once "$pg.php";
}

?>
