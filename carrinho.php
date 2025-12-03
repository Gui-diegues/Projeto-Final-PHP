<?php 
    session_start();
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar_compra'])) {
        header('Content-Type: application/json');

        if (!isset($_SESSION['id_cliente'])) {
            echo json_encode(['sucesso' => false, 'erro' => 'Faça login para finalizar a compra.']);
            exit;
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $carrinho = $input['carrinho'];
        $total = $input['total'];
        $id_cliente = $_SESSION['id_cliente'];

        if (empty($carrinho)) {
            echo json_encode(['sucesso' => false, 'erro' => 'Carrinho vazio.']);
            exit;
        }

        try {
            $pdo->beginTransaction();

            $sql_pedido = "INSERT INTO pedidos (id_cliente, data_pedido, status, total) VALUES (:id_cliente, NOW(), 'Processando', :total)";
            $stmt = $pdo->prepare($sql_pedido);
            $stmt->bindValue(':id_cliente', $id_cliente);
            $stmt->bindValue(':total', $total);
            $stmt->execute();
            $id_pedido = $pdo->lastInsertId();

            $sql_item = "INSERT INTO itens_pedido (id_pedido, id_produto, qtd, preco) VALUES (:id_pedido, :id_produto, :qtd, :preco)";
            $stmt_item = $pdo->prepare($sql_item);

            foreach ($carrinho as $item) {
                $stmt_item->bindValue(':id_pedido', $id_pedido);
                $stmt_item->bindValue(':id_produto', $item['id']);
                $stmt_item->bindValue(':qtd', $item['qtd']);
                $stmt_item->bindValue(':preco', $item['preco']);
                $stmt_item->execute();
            }

            $pdo->commit();
            echo json_encode(['sucesso' => true]);
            exit;

        } catch (Exception $e) {
            $pdo->rollBack();
            echo json_encode(['sucesso' => false, 'erro' => 'Erro no banco: ' . $e->getMessage()]);
            exit;
        }
    }

    $titulo = "Meu Carrinho | JSON CALÇADOS";
    $pagina_atual = "carrinho";
    include 'header.php'; 
?>

<style>
    .cart-page { margin: 80px auto; }
    table { width: 100%; border-collapse: collapse; }
    .cart-info { display: flex; flex-wrap: wrap; }
    th { text-align: left; padding: 10px; color: #fff; background: #ff523b; font-weight: normal; }
    td { padding: 10px 5px; }
    td input { width: 40px; height: 30px; padding: 5px; }
    td a { color: #ff523b; font-size: 12px; cursor: pointer; }
    td img { width: 80px; height: 80px; margin-right: 10px; border-radius: 5px; object-fit: cover;}
    .total-price { display: flex; justify-content: flex-end; margin-top: 20px; }
    .total-price table { border-top: 3px solid #ff523b; width: 100%; max-width: 400px; }
    td:last-child { text-align: right; }
    th:last-child { text-align: right; }
    .checkout-btn { background: #333; color: #fff; padding: 12px 20px; border: none; cursor: pointer; width: 100%; border-radius: 30px; font-size: 16px; margin-top: 10px; transition: 0.3s; }
    .checkout-btn:hover { background: #563434; }
    .coupon-box { margin-top: 20px; text-align: right; }
    .coupon-box input { padding: 8px; border: 1px solid #ccc; border-radius: 5px; }
    .coupon-btn { background: #ff523b; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer; }
    @media only screen and (max-width: 600px) { .cart-info p { display: none; } }
</style>

<div class="small-container cart-page">
    <table id="tabela-carrinho">
        <tr>
            <th>Produto</th>
            <th>Qtd</th>
            <th>Subtotal</th>
        </tr>
    </table>

    <div class="total-price">
        <div>
            <div class="coupon-box">
                <input type="text" id="cupomInput" placeholder="Cupom de desconto">
                <button class="coupon-btn" onclick="aplicarCupom()">Aplicar</button>
                <p id="msgCupom" style="font-size: 12px; margin-top: 5px;"></p>
            </div>

            <table>
                <tr>
                    <td>Subtotal</td>
                    <td id="cart-subtotal">R$ 0,00</td>
                </tr>
                <tr>
                    <td>Desconto</td>
                    <td id="cart-discount">R$ 0,00</td>
                </tr>
                <tr>
                    <td>Frete</td>
                    <td style="color: green;">Grátis</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td id="cart-total" style="font-weight: bold; font-size: 18px;">R$ 0,00</td>
                </tr>
            </table>
            <button class="checkout-btn" onclick="finalizarCompra()">Finalizar Compra</button>
        </div>
    </div>
</div>

<script>
    let carrinho = JSON.parse(localStorage.getItem('jsonCarrinho')) || [];
    const tabela = document.getElementById('tabela-carrinho');
    let descontoValor = 0;
    let totalParaEnvio = 0;

    function carregarCarrinho() {
        tabela.innerHTML = `<tr><th>Produto</th><th>Qtd</th><th>Subtotal</th></tr>`;
        let subtotalGeral = 0;

        if(carrinho.length === 0) {
            tabela.innerHTML += `<tr><td colspan="3" style="text-align:center; padding:30px;">Seu carrinho está vazio. <br><a href="lancamentos.php" style="font-size:16px;">Ir às compras</a></td></tr>`;
        }

        carrinho.forEach((item, index) => {
            let subtotal = item.preco * item.qtd;
            subtotalGeral += subtotal;

            let linha = `
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="${item.img}">
                        <div>
                            <p>${item.nome}</p>
                            <small>Preço: R$ ${item.preco.toFixed(2).replace('.', ',')}</small>
                            <br>
                            <p style="font-size:12px; color:#999;">Tam: ${item.tamanho}</p>
                            <a onclick="removerItem(${index})">Remover</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="${item.qtd}" min="1" onchange="alterarQtd(${index}, this.value)"></td>
                <td>R$ ${subtotal.toFixed(2).replace('.', ',')}</td>
            </tr>`;
            
            tabela.innerHTML += linha;
        });

        atualizarTotais(subtotalGeral);
    }

    function atualizarTotais(subtotal) {
        let total = subtotal - descontoValor;
        if(total < 0) total = 0;
        
        totalParaEnvio = total;

        document.getElementById('cart-subtotal').innerText = "R$ " + subtotal.toFixed(2).replace('.', ',');
        document.getElementById('cart-discount').innerText = "- R$ " + descontoValor.toFixed(2).replace('.', ',');
        document.getElementById('cart-total').innerText = "R$ " + total.toFixed(2).replace('.', ',');
    }

    function removerItem(index) {
        carrinho.splice(index, 1);
        localStorage.setItem('jsonCarrinho', JSON.stringify(carrinho));
        carregarCarrinho();
    }

    function alterarQtd(index, novaQtd) {
        if(novaQtd < 1) novaQtd = 1;
        carrinho[index].qtd = parseInt(novaQtd);
        localStorage.setItem('jsonCarrinho', JSON.stringify(carrinho));
        carregarCarrinho();
    }

    function aplicarCupom() {
        const cupom = document.getElementById('cupomInput').value.toUpperCase();
        const msg = document.getElementById('msgCupom');
        
        if(cupom === "JSON20") {
            let subtotalAtual = carrinho.reduce((acc, item) => acc + (item.preco * item.qtd), 0);
            descontoValor = subtotalAtual * 0.20;
            msg.style.color = "green";
            msg.innerText = "Cupom de 20% aplicado!";
            carregarCarrinho();
        } else {
            descontoValor = 0;
            msg.style.color = "red";
            msg.innerText = "Cupom inválido.";
            carregarCarrinho();
        }
    }

    function finalizarCompra() {
        if(carrinho.length === 0) {
            alert("Seu carrinho está vazio!");
            return;
        }

        const btn = document.querySelector('.checkout-btn');
        btn.innerText = "Processando...";
        btn.disabled = true;

        fetch('carrinho.php?finalizar_compra=true', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                carrinho: carrinho,
                total: totalParaEnvio
            })
        })
        .then(response => response.json())
        .then(data => {
            if(data.sucesso) {
                localStorage.removeItem('jsonCarrinho');
                alert("Compra realizada com sucesso!");
                window.location.href = "meus_pedidos.php";
            } else {
                if(data.erro.includes("Faça login")) {
                    alert("Você precisa fazer login para comprar.");
                    window.location.href = "conta.php";
                } else {
                    alert("Erro: " + data.erro);
                    btn.innerText = "Finalizar Compra";
                    btn.disabled = false;
                }
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert("Erro ao processar pedido.");
            btn.innerText = "Finalizar Compra";
            btn.disabled = false;
        });
    }

    carregarCarrinho();
</script>

<?php include 'footer.php'; ?>