<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        :root {
            --primary-color: #0a0a0aff; /* Azul médio para botões primários */
            --secondary-color: #e3f2fd; /* Azul muito claro para fundo */
            --accent-color: #1976d2; /* Azul escuro para remover */
            --clear-color: #42a5f5; /* Azul claro para limpar */
            --text-color: #0d47a1; /* Azul escuro para texto */
            --border-color: #bbdefb; /* Azul claro para bordas */
            --card-bg: #ffffff; /* Branco para cards */
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: var(--secondary-color);
            color: var(--text-color);
        }
        
        h1, h2 {
            text-align: center;
            color: var(--primary-color);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .produtos, .carrinho {
            flex: 1;
            min-width: 300px;
            background: var(--card-bg);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        
        .produto {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            background: var(--card-bg);
        }
        
        .produto input {
            width: 60px;
            padding: 5px;
            margin-right: 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
        }
        
        button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        
        button:hover {
            opacity: 0.9;
        }
        
        .btn-add {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-remove {
            background-color: var(--accent-color);
            color: white;
        }
        
        .btn-clear {
            background-color: var(--clear-color);
            color: white;
            width: 100%;
            margin-top: 10px;
        }
        
        .item-carrinho {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .item-carrinho .quantidade {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .quantidade button {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }
        
        .total {
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background: var(--primary-color);
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Loja Virtual - Carrinho de Compras</h1>
    
    <div class="container">
        <div class="produtos">
            <h2>Produtos Disponíveis</h2>
            <div id="produtos">
                <div class="produto">
                    <span>Produto 1 - R$ 10,00</span>
                    <div>
                        <input type="number" min="1" value="1" id="qtd-prod1">
                        <button class="btn-add" onclick="adicionarAoCarrinho('Produto 1', 10, 'qtd-prod1')">Adicionar</button>
                    </div>
                </div>
                <div class="produto">
                    <span>Produto 2 - R$ 20,00</span>
                    <div>
                        <input type="number" min="1" value="1" id="qtd-prod2">
                        <button class="btn-add" onclick="adicionarAoCarrinho('Produto 2', 20, 'qtd-prod2')">Adicionar</button>
                    </div>
                </div>
                <div class="produto">
                    <span>Produto 3 - R$ 15,00</span>
                    <div>
                        <input type="number" min="1" value="1" id="qtd-prod3">
                        <button class="btn-add" onclick="adicionarAoCarrinho('Produto 3', 15, 'qtd-prod3')">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="carrinho">
            <h2>Carrinho</h2>
            <div id="itens-carrinho"></div>
            <div class="total">Total: R$ <span id="total">0,00</span></div>
            <button class="btn-clear" onclick="limparCarrinho()">Limpar Carrinho</button>
        </div>
    </div>

    <script>
        let carrinho = [];
        
        function adicionarAoCarrinho(nome, preco, inputId) {
            const quantidade = parseInt(document.getElementById(inputId).value) || 1;
            const itemExistente = carrinho.find(item => item.nome === nome);
            if (itemExistente) {
                itemExistente.quantidade += quantidade;
            } else {
                carrinho.push({ nome, preco, quantidade });
            }
            atualizarCarrinho();
        }
        
        function ajustarQuantidade(nome, delta) {
            const item = carrinho.find(item => item.nome === nome);
            if (item) {
                item.quantidade += delta;
                if (item.quantidade <= 0) {
                    removerDoCarrinho(nome);
                } else {
                    atualizarCarrinho();
                }
            }
        }
        
        function removerDoCarrinho(nome) {
            carrinho = carrinho.filter(item => item.nome !== nome);
            atualizarCarrinho();
        }
        
        function atualizarCarrinho() {
            const itensDiv = document.getElementById('itens-carrinho');
            itensDiv.innerHTML = '';
            let total = 0;
            
            carrinho.forEach(item => {
                const subtotal = item.preco * item.quantidade;
                total += subtotal;
                itensDiv.innerHTML += `
                    <div class="item-carrinho">
                        <span>${item.nome} - R$ ${subtotal.toFixed(2)}</span>
                        <div class="quantidade">
                            <button onclick="ajustarQuantidade('${item.nome}', -1)">-</button>
                            <span>x${item.quantidade}</span>
                            <button onclick="ajustarQuantidade('${item.nome}', 1)">+</button>
                            <button class="btn-remove" onclick="removerDoCarrinho('${item.nome}')">Remover</button>
                        </div>
                    </div>
                `;
            });
            
            document.getElementById('total').textContent = total.toFixed(2);
        }
        
        function limparCarrinho() {
            carrinho = [];
            atualizarCarrinho();
        }
    </script>
</body>
</html>