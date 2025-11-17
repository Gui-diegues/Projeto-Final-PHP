
<style>
    a{
        text-decoration: none;
        border-bottom: blue solid 2px;
        padding: 10px;
        margin: 10px;
    }
</style>
<?php
    include_once "topoadmin.php";
echo"<br>";

echo"<a href='?pg=clientes_admin'>Listar Clientes   </a>";
echo"<a href='?pg=clientes_form'>Cadastrar Clientes </a>";


//área de conteudo 
if(empty($_SERVER['QUERY_STRING'])){
    echo"<h3><br>Bem vindo ao painel Administrativo.</h3>";
}else {
    $pg = "$_GET[pg]";
    include_once "$pg.php";
}

?>
