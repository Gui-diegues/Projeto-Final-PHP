<?php 
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
        
        let historico = JSON.parse(localStorage.getItem('meusPedidos')) || [];
        let totalFinal = document.getElementById('cart-total').innerText;
        
        let novoPedido = {
            id: "#" + Math.floor(Math.random() * 9000 + 1000),
            data: new Date().toLocaleDateString('pt-BR'),
            produto: carrinho.length + " Itens (Via Carrinho)",
            status: "Processando",
            total: totalFinal
        };

        historico.push(novoPedido);
        localStorage.setItem('meusPedidos', JSON.stringify(historico));
        localStorage.removeItem('jsonCarrinho');
        
        alert("Compra realizada com sucesso! Obrigado.");
        window.location.href = "pedidos.php";
    }

    carregarCarrinho();
</script>

<?php include 'footer.php'; ?>