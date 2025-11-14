<?php
echo"<h1>Painel administrativo</h1>";

echo"<a href='?pg=clientes_admin'>Listar Clientes | </a>";


//área de conteudo 
if(empty($_SERVER['QUERY_STRING'])){
    echo"<h3>Bem vindo ao painel administrativo.</h3>";
}else {
    $pg = "$_GET[pg]";
    include_once "$pg.php";
}