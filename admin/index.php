
<style>
    a{
        text-decoration: none;
        border-bottom: blue solid 2px;
        padding: 10px;
        margin: 10px;
    }
    h2{
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

echo"<a href='?pg=clientes_admin'>Listar Clientes   </a>";
echo"<a href='?pg=clientes_form'>Cadastrar Clientes </a>";
echo"<a href='?pg=vendas_form'>Efetuar Venda </a>";


//área de conteudo 
if(empty($_SERVER['QUERY_STRING'])){
    echo"<h2><br>Bem vindo ao painel Administrativo.</h2>";
}else {
    $pg = "$_GET[pg]";
    include_once "$pg.php";
}

?>
