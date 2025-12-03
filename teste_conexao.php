<?php
include 'conexao.php';

try {
    $sql = "SELECT count(*) as total FROM produtos";
    $stmt = $pdo->query($sql);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<h1 style='color:green'>SUCESSO!</h1>";
    echo "<p>Conexão com o banco de dados <strong>json_calcados</strong> realizada.</p>";
    echo "<p>Total de produtos encontrados: <strong>" . $resultado['total'] . "</strong></p>";
    
} catch (Exception $e) {
    echo "<h1 style='color:red'>ERRO</h1>";
    echo "<p>Não foi possível conectar ou consultar dados.</p>";
    echo "<p>Detalhe: " . $e->getMessage() . "</p>";
}
?>