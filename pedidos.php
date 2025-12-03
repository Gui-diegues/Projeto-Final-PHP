<?php 
    session_start();
    include 'conexao.php';

    $titulo = "Meus Pedidos | JSON CALÇADOS";
    $pagina_atual = "pedidos";
    include 'header.php'; 

    if (!isset($_SESSION['id_cliente'])) {
        echo "<script>alert('Faça login para ver seus pedidos.'); window.location.href='conta.php';</script>";
        exit;
    }

    $id_cliente = $_SESSION['id_cliente'];
?>

<div class="small-container cart-page">
    <h2 class="title" style="text-align: left; margin-bottom: 20px;">Histórico de Pedidos</h2>
    
    <table class="orders-table">
        <thead>
            <tr>
                <th>Pedido #</th>
                <th>Resumo do Pedido</th> 
                <th>Data</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $sql = "SELECT p.id, p.data_pedido, p.status, p.total 
                        FROM pedidos p 
                        WHERE p.id_cliente = :id_cliente 
                        ORDER BY p.data_pedido DESC";
                
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':id_cliente', $id_cliente);
                $stmt->execute();
                $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($pedidos) > 0) {
                    foreach ($pedidos as $pedido) {
                        $id_pedido = $pedido['id'];
                        $data = date('d/m/Y', strtotime($pedido['data_pedido']));
                        $status = $pedido['status'];
                        $total = number_format($pedido['total'], 2, ',', '.');
                        
                        $sql_itens = "SELECT pr.nome FROM itens_pedido ip 
                                      JOIN produtos pr ON ip.id_produto = pr.id 
                                      WHERE ip.id_pedido = :id_pedido LIMIT 1";
                        $stmt_itens = $pdo->prepare($sql_itens);
                        $stmt_itens->bindValue(':id_pedido', $id_pedido);
                        $stmt_itens->execute();
                        $primeiro_item = $stmt_itens->fetch(PDO::FETCH_ASSOC);
                        
                        $nome_produto = $primeiro_item ? $primeiro_item['nome'] : "Itens diversos";
                        
                        $sql_count = "SELECT COUNT(*) as qtd FROM itens_pedido WHERE id_pedido = :id_pedido";
                        $stmt_count = $pdo->prepare($sql_count);
                        $stmt_count->bindValue(':id_pedido', $id_pedido);
                        $stmt_count->execute();
                        $qtd_extra = $stmt_count->fetch(PDO::FETCH_ASSOC)['qtd'] - 1;

                        $texto_produto = $nome_produto;
                        if ($qtd_extra > 0) {
                            $texto_produto .= " + " . $qtd_extra . " item(ns)";
                        }

                        echo "
                        <tr>
                            <td>#{$id_pedido}</td>
                            <td style='font-size: 14px; color: #ff523b;'>{$texto_produto}</td>
                            <td>{$data}</td>
                            <td><span class='status processing'>{$status}</span></td>
                            <td>R$ {$total}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align:center; padding: 20px;'>Você ainda não fez nenhum pedido.</td></tr>";
                }
            } catch (Exception $e) {
                echo "<tr><td colspan='5' style='text-align:center; color:red;'>Erro ao carregar pedidos.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
    <div style="margin-top: 20px; text-align: right;">
        <a href="index.php" class="btn">Continuar Comprando</a>
    </div>
</div>

<?php include 'footer.php'; ?>