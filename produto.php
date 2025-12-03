<?php 
    include 'conexao.php';

   
    $id_atual = isset($_GET['id']) ? (int)$_GET['id'] : 1;

  
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id_atual);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) {
        $sql_fallback = "SELECT * FROM produtos LIMIT 1";
        $stmt_fallback = $pdo->query($sql_fallback);
        $produto = $stmt_fallback->fetch(PDO::FETCH_ASSOC);
        $id_atual = $produto['id'];
    }

    $descricao = "Sem descrição disponível.";
    if (isset($produto['descricao'])) {
        $descricao = $produto['descricao'];
    } elseif (isset($produto['desc'])) {
        $descricao = $produto['desc'];
    }

    
    $imagem = !empty($produto['img']) ? $produto['img'] : 'https://via.placeholder.com/1000';

    $titulo        = "{$produto['nome']} | JSON CALÇADOS";
    $pagina_atual  = "produto";

    $css_extra = "
    <style>
        .small-container { margin-top: 80px; }
        .row { display: flex; align-items: center; flex-wrap: wrap; justify-content: space-around; }
        .col-2 img { width: 100%; border-radius: 10px; cursor: pointer; transition: .3s; }
        .col-2 img:hover { transform: scale(1.02); }
        .single-product h4 { margin: 20px 0; font-size: 22px; font-weight: bold; }
        .single-product select,
        .single-product input {
            border: 1px solid #ff523b; border-radius: 5px; outline: none;
        }
        .single-product select { padding: 10px; margin-top: 20px; }
        .single-product input { width: 50px; height: 40px; padding-left: 10px; font-size: 20px; margin-left: 10px; }
        .price { color: #ff523b; font-size: 26px; font-weight: bold; margin-bottom: 20px; display: block; }
        .small-img-row { display: flex; gap: 10px; margin-top: 15px; }
        .small-img-col { flex: 1; cursor: pointer; border-radius: 5px; overflow: hidden; }
        .small-img-col img { width: 100%; height: 100%; object-fit: cover; }
        
        .btn { background: #ff523b; color: #fff; padding: 8px 30px; margin: 30px 0; border-radius: 30px; transition: background 0.5s; cursor: pointer; display: inline-block; border:none; }
        .btn:hover { background: #563434; }
    </style>
    ";

    include 'header.php';
?>

<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img id="ProductImg" src="<?= $imagem; ?>" alt="<?= $produto['nome']; ?>">

            <div class="small-img-row">
                <?php 
                $filtros = ["0deg", "45deg", "90deg", "180deg"];
                foreach ($filtros as $f) {
                    echo "
                    <div class='small-img-col'>
                        <img class='small-img' style='filter: hue-rotate($f);' 
                             src='$imagem' onclick='trocarImagem(this.src)'>
                    </div>";
                }
                ?>
            </div>
        </div>

        <div class="col-2">
            <p style="color:#555;">Home / Tênis / <?= $produto['nome']; ?></p>
            <h1 style="font-size: 40px; margin: 15px 0;"><?= $produto['nome']; ?></h1>

            <span class="price">
                R$ <?= number_format($produto['preco'], 2, ',', '.'); ?>
            </span>

            <select>
                <option>Selecione o Tamanho</option>
                <?php foreach(range(38,43) as $t) echo "<option>$t</option>"; ?>
            </select>

            <input type="number" value="1" min="1">
            <a class="btn" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</a>

            <h3 style="margin-top: 30px;">
                Detalhes do Produto <i class="fa fa-indent" style="color:#ff523b;"></i>
            </h3>
            <br>
            <!-- AQUI ESTAVA O ERRO, AGORA USA A VARIÁVEL SEGURA -->
            <p style="color:#555;line-height:1.6;"><?= $descricao; ?></p>

            <p style="margin-top: 20px;color:#999;font-size:12px;">
                SKU: JSON-<?= str_pad($id_atual, 4, '0', STR_PAD_LEFT); ?>
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
        
        $sql_rel = "SELECT * FROM produtos WHERE id != :id ORDER BY RAND() LIMIT 4";
        $stmt_rel = $pdo->prepare($sql_rel);
        $stmt_rel->bindValue(':id', $id_atual);
        $stmt_rel->execute();
        $veja_tambem = $stmt_rel->fetchAll(PDO::FETCH_ASSOC);

        foreach ($veja_tambem as $p) {
            $img_rel = !empty($p['img']) ? $p['img'] : 'https://via.placeholder.com/300';
            echo "
            <div class='col-4' style='cursor:pointer' onclick=\"location.href='produto.php?id={$p['id']}'\">
                <img src='$img_rel' alt='{$p['nome']}'>
                <h4>{$p['nome']}</h4>
                <div class='rating'>
                    <i class='fa fa-star'></i><i class='fa fa-star'></i>
                    <i class='fa fa-star'></i><i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                </div>
                <p>R$ " . number_format($p['preco'], 2, ',', '.') . "</p>
            </div>";
        }
        ?>
    </div>
</div>

<script>
function trocarImagem(src) {
    document.getElementById("ProductImg").src = src;
}

function adicionarAoCarrinho() {
    const tamanho = document.querySelector("select").value;
    const qtd = parseInt(document.querySelector('input[type="number"]').value);

    if (tamanho === "Selecione o Tamanho") {
        alert("Por favor, escolha um tamanho antes de comprar."); 
        return;
    }

    const produto = {
        id: <?= $id_atual ?>,
        nome: "<?= $produto['nome']; ?>",
        preco: <?= $produto['preco']; ?>,
        img: "<?= $imagem; ?>",
        tamanho: tamanho,
        qtd: qtd
    };

    let carrinho = JSON.parse(localStorage.getItem("jsonCarrinho")) || [];
    
    let item = carrinho.find(i => i.id === produto.id && i.tamanho === produto.tamanho);

    if (item) {
        item.qtd += produto.qtd;
    } else {
        carrinho.push(produto);
    }

    localStorage.setItem("jsonCarrinho", JSON.stringify(carrinho));

    if (confirm("Produto adicionado ao carrinho! Deseja ir para o carrinho agora?")) {
        location.href = "carrinho.php";
    }
}
</script>

<?php include 'footer.php'; ?>