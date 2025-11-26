<?php 
    // =====================================================
    // 1. BANCO DE DADOS SIMULADO (Todos os seus produtos)
    // =====================================================
    // DICA: O ID (número na esquerda) é o que define qual produto abrir.
    $banco_de_dados = [
        1 => [
            "nome" => "Nike Air Zoom Pegasus", 
            "preco" => 599.90, 
            "img" => "https://images.unsplash.com/photo-1491553895911-0055eca6402d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80", 
            "desc" => "Ideal para corridas diárias, o Pegasus traz responsividade e ajuste perfeito para seus pés. Tecnologia Zoom Air para máximo conforto."
        ],
        2 => [
            "nome" => "Nike Air Force 1 '07", 
            "preco" => 749.90, 
            "img" => "https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80", 
            "desc" => "O brilho continua no Nike Air Force 1 '07, o tênis original de basquete que dá um toque de frescor ao que você conhece bem."
        ],
        3 => [
            "nome" => "Jordan 1 Retro High", 
            "preco" => 1.299, 
            "img" => "https://images.unsplash.com/photo-1560769629-975ec94e6a86?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80", 
            "desc" => "Familiar, mas sempre novo. O Air Jordan 1 Retro High remasteriza o tênis clássico, dando a você um visual novo com uma sensação familiar."
        ],
        4 => [
            "nome" => "Vans Old Skool Classic", 
            "preco" => 399.90, 
            "img" => "https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80", 
            "desc" => "O Old Skool foi o primeiro tênis a apresentar a icônica Sidestripe da Vans. Um clássico do skate e do streetwear."
        ],
        5 => [
            "nome" => "Nike Dunk Low Retro Panda", 
            "preco" => 899.00, 
            "img" => "https://images.unsplash.com/photo-1607792246307-2c7ba687b50a?q=80&w=1000&auto=format&fit=crop", 
            "desc" => "Criado para as quadras, mas levado para as ruas, o ícone do basquete dos anos 80 retorna com detalhes clássicos e estilo retrô."
        ],
        6 => [
            "nome" => "Adidas Yeezy Boost 350 V2", 
            "preco" => 1499.00, 
            "img" => "https://images.unsplash.com/photo-1587563871167-1ee9c731aefb?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80", 
            "desc" => "O Yeezy Boost 350 V2 apresenta um cabedal composto de Primeknit recriado em duas cores. A entressola utiliza a tecnologia BOOST™ inovadora da Adidas."
        ]
        // Você pode adicionar quantos IDs quiser aqui...
    ];

    // =====================================================
    // 2. LÓGICA PARA PEGAR O PRODUTO
    // =====================================================
    
    // Verifica se existe um ID na URL (ex: produto.php?id=2)
    $id_atual = isset($_GET['id']) ? (int)$_GET['id'] : 1;
    
    // Se o ID não existir no banco, usa o produto 1 como padrão (para não dar erro)
    $produto = isset($banco_de_dados[$id_atual]) ? $banco_de_dados[$id_atual] : $banco_de_dados[1];

    $titulo = $produto['nome'] . " | JSON CALÇADOS";
    $pagina_atual = "produto";
    
    // CSS Específico desta página para garantir o layout
    $css_extra = "
    <style>
        .small-container { margin-top: 80px; }
        .row { display: flex; align-items: center; flex-wrap: wrap; justify-content: space-around; }
        .col-2 img { width: 100%; padding: 0; border-radius: 10px; cursor: pointer; transition: transform 0.3s; }
        .col-2 img:hover { transform: scale(1.02); }
        .single-product h4 { margin: 20px 0; font-size: 22px; font-weight: bold; }
        .single-product select { display: block; padding: 10px; margin-top: 20px; border: 1px solid #ff523b; border-radius: 5px; outline: none; }
        .single-product input { width: 50px; height: 40px; padding-left: 10px; font-size: 20px; margin-right: 10px; border: 1px solid #ff523b; border-radius: 5px; outline: none; }
        .price { color: #ff523b; font-size: 26px; font-weight: bold; margin-bottom: 20px; display: block; }
        
        /* Galeria de imagens pequenas */
        .small-img-row { display: flex; justify-content: space-between; margin-top: 15px; }
        .small-img-col { flex-basis: 24%; cursor: pointer; border-radius: 5px; overflow: hidden; }
        .small-img-col img { width: 100%; height: 100%; object-fit: cover; }
    </style>
    ";

    include 'header.php'; 
?>

<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="<?php echo $produto['img']; ?>" width="100%" id="ProductImg" alt="<?php echo $produto['nome']; ?>">
            
            <div class="small-img-row">
                <div class="small-img-col">
                    <img src="<?php echo $produto['img']; ?>" width="100%" class="small-img" onclick="trocarImagem(this.src)">
                </div>
                <div class="small-img-col">
                    <img src="<?php echo $produto['img']; ?>" width="100%" class="small-img" style="filter: hue-rotate(45deg);" onclick="trocarImagem(this.src)">
                </div>
                <div class="small-img-col">
                    <img src="<?php echo $produto['img']; ?>" width="100%" class="small-img" style="filter: hue-rotate(90deg);" onclick="trocarImagem(this.src)">
                </div>
                <div class="small-img-col">
                    <img src="<?php echo $produto['img']; ?>" width="100%" class="small-img" style="filter: hue-rotate(180deg);" onclick="trocarImagem(this.src)">
                </div>
            </div>
        </div>

        <div class="col-2">
            <p style="color:#555;">Home / Tênis / <?php echo $produto['nome']; ?></p>
            <h1 style="font-size: 40px; line-height: 1.2; margin: 15px 0;"><?php echo $produto['nome']; ?></h1>
            <span class="price">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></span>
            
            <select>
                <option>Selecione o Tamanho</option>
                <option>38</option>
                <option>39</option>
                <option>40</option>
                <option>41</option>
                <option>42</option>
                <option>43</option>
            </select>

            <br>
            <input type="number" value="1" min="1">
            <a href="#" class="btn" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</a>

            <h3 style="margin-top: 30px;">Detalhes do Produto <i class="fa fa-indent" style="color: #ff523b;"></i></h3>
            <br>
            <p style="line-height: 1.6; color: #555;"><?php echo $produto['desc']; ?></p>
            
            <p style="margin-top: 20px; color: #999; font-size: 12px;">
                SKU: JSON-<?php echo str_pad($id_atual, 4, '0', STR_PAD_LEFT); ?>
            </p>
        </div>
    </div>
</div>

<div class="small-container">
    <div class="row row-2">
        <h2>Veja Também</h2>
        <p>Clientes que viram este produto também compraram</p>
    </div>
    <div class="row">
        <?php 
        // Loop simples para mostrar produtos 1 a 4 como exemplo
        for ($i = 1; $i <= 4; $i++) {
            if ($i == $id_atual) continue; // Não mostra o mesmo produto que já está na tela
            $p = $banco_de_dados[$i];
            echo '
            <div class="col-4" onclick="window.location.href=\'produto.php?id='.$i.'\'" style="cursor: pointer;">
                <img src="'.$p['img'].'" alt="'.$p['nome'].'">
                <h4>'.$p['nome'].'</h4>
                <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                <p>R$ '.number_format($p['preco'], 2, ',', '.').'</p>
            </div>';
        }
        ?>
    </div>
</div>

<script>
    var ProductImg = document.getElementById("ProductImg");
    
    function trocarImagem(srcNova) {
        ProductImg.src = srcNova;
    }

    function adicionarAoCarrinho() {
        // Aqui você pode integrar com o script.js que já fizemos para salvar no localStorage
        // Por enquanto, um alerta simples:
        alert("Produto adicionado ao carrinho!");
    }
</script>

<?php include 'footer.php'; ?>