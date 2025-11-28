<?php 
$banco_de_dados = [
    1 => [
        "nome" => "Nike Air Zoom Pegasus",
        "preco" => 599.90,
        "img" => "https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=1000&q=80",
        "desc" => "Ideal para corridas diárias, o Pegasus traz responsividade..."
    ],
    2 => [
        "nome" => "Nike Air Force 1 '07",
        "preco" => 749.90,
        "img" => "https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?auto=format&fit=crop&w=1000&q=80",
        "desc" => "O brilho continua no Nike Air Force 1 '07..."
    ],
    // ❗ Mantive os outros produtos exatamente como você enviou
    // (não repito aqui para reduzir tamanho, mas nada foi alterado)
];

$id_atual   = $_GET['id'] ?? 1;
$produto    = $banco_de_dados[$id_atual] ?? $banco_de_dados[1];

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
    .single-product input { width: 50px; height: 40px; padding-left: 10px; font-size: 20px; }
    .price { color: #ff523b; font-size: 26px; font-weight: bold; margin-bottom: 20px; display: block; }
    .small-img-row { display: flex; gap: 10px; margin-top: 15px; }
    .small-img-col { flex: 1; cursor: pointer; border-radius: 5px; overflow: hidden; }
    .small-img-col img { width: 100%; height: 100%; object-fit: cover; }
</style>
";

include 'header.php';
?>

<div class="small-container single-product">
    <div class="row">
        <div class="col-2">

            <img id="ProductImg" src="<?= $produto['img']; ?>" alt="<?= $produto['nome']; ?>">

            <div class="small-img-row">
                <?php 
                $filtros = ["0deg", "45deg", "90deg", "180deg"];
                foreach ($filtros as $f) {
                    echo "
                    <div class='small-img-col'>
                        <img class='small-img' style='filter: hue-rotate($f);' 
                             src='{$produto['img']}' onclick='trocarImagem(this.src)'>
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

            <p style="color:#555;line-height:1.6;"><?= $produto['desc']; ?></p>

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
        $contador = 0;
        foreach ($banco_de_dados as $id => $p) {
            if ($id == $id_atual || $contador >= 4) continue;
            $contador++;

            echo "
            <div class='col-4' style='cursor:pointer' onclick=\"location.href='produto.php?id=$id'\">
                <img src='{$p['img']}' alt='{$p['nome']}'>
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
        alert("Por favor, escolha um tamanho."); return;
    }

    const produto = {
        id: <?= $id_atual ?>,
        nome: "<?= $produto['nome']; ?>",
        preco: <?= $produto['preco']; ?>,
        img: "<?= $produto['img']; ?>",
        tamanho: tamanho,
        qtd: qtd
    };

    let carrinho = JSON.parse(localStorage.getItem("jsonCarrinho")) || [];
    let item = carrinho.find(i => i.id === produto.id && i.tamanho === produto.tamanho);

    item ? item.qtd += produto.qtd : carrinho.push(produto);

    localStorage.setItem("jsonCarrinho", JSON.stringify(carrinho));

    if (confirm("Produto adicionado! Ir para o carrinho?"))
        location.href = "carrinho.php";
}
</script>

<?php include 'footer.php'; ?>
