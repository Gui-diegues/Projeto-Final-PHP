<?php 
    $titulo = "Meus Pedidos | JSON CALÇADOS";
    $pagina_atual = "pedidos";
    include 'header.php'; 
?>

<div class="small-container cart-page">
    <h2 class="title" style="text-align: left; margin-bottom: 20px;">Histórico de Pedidos</h2>
    
    <table class="orders-table">
        <thead>
            <tr>
                <th>Pedido #</th>
                <th>Produto</th> <th>Data</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="tabela-corpo">
        </tbody>
    </table>
    
    <div style="margin-top: 20px; text-align: right;">
        <button onclick="limparHistorico()" class="btn" style="background: #333;">Limpar Histórico</button>
    </div>
</div>

<script>
    let pedidosSalvos = JSON.parse(localStorage.getItem('meusPedidos')) || [];
    const tabelaCorpo = document.getElementById('tabela-corpo');

    if (pedidosSalvos.length === 0) {
        tabelaCorpo.innerHTML = "<tr><td colspan='5' style='text-align:center; padding: 20px;'>Nenhum pedido encontrado. Vá às compras!</td></tr>";
    } else {
        pedidosSalvos.reverse().forEach(pedido => {
            let linha = `
                <tr>
                    <td>${pedido.id}</td>
                    <td style="font-size: 14px; color: #ff523b;">${pedido.produto || 'Item Diverso'}</td>
                    <td>${pedido.data}</td>
                    <td><span class="status processing">${pedido.status}</span></td>
                    <td>${pedido.total}</td>
                </tr>
            `;
            tabelaCorpo.innerHTML += linha;
        });
    }

    function limparHistorico() {
        if(confirm("Tem certeza que deseja apagar todo o histórico?")) {
            localStorage.removeItem('meusPedidos');
            location.reload(); 
        }
    }
</script>

<?php include 'footer.php'; ?>