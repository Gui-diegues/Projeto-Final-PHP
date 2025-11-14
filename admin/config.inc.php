<?php
    $conexao = mysqli_connect("localhost", "root", "");
    
    $dg = mysqli_select_db($conexao, "loja1");

    if(!$conexao){
        echo"<h2>Erro ao conectar com o banco de dados</h2>";
    }


    