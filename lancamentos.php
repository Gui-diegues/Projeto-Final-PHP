<?php 
    $titulo = "Lançamentos | JSON CALÇADOS";
    $pagina_atual = "lancamentos";
    include 'header.php'; 
?>

<style>
    html { scroll-behavior: smooth; }
    .row-2 { margin-top: 50px; border-bottom: 2px solid #f1f1f1; padding-bottom: 10px; margin-bottom: 20px;}
    /* Cor das estrelas */
    .rating .fa { color: #ff523b; }
</style>

<div class="small-container">
    
    <div id="cat-1" class="row row-2">
        <h2>01. Novos Drops (Janeiro/25)</h2>
        <select>
            <option>Mais Recentes</option>
            <option>Menor Preço</option>
        </select>
    </div>

    <div class="row">
        <?php
        $drops = [
            // IDs mapeados para produto.php (5 e 6 existem lá, 7 e 8 são novos)
            ["id" => 5, "nome" => "Nike Dunk Low Retro Panda", "preco" => "R$ 899,00", "img" => "https://images.unsplash.com/photo-1607792246307-2c7ba687b50a?q=80&w=387&auto=format&fit=crop"],
            ["id" => 6, "nome" => "Adidas Yeezy Boost 350 V2", "preco" => "R$ 1.499,00", "img" => "https://images.unsplash.com/photo-1587563871167-1ee9c731aefb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["id" => 7, "nome" => "Air Jordan 1 Mid SE", "preco" => "R$ 1.199,00", "img" => "https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["id" => 8, "nome" => "Converse x Off-White", "preco" => "R$ 999,90", "img" => "https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"]
        ];

        foreach ($drops as $tenis) {
            echo '
            <div class="col-4" onclick="window.location.href=\'produto.php?id='.$tenis['id'].'\'" style="cursor: pointer;">
                <img src="'.$tenis['img'].'" alt="'.$tenis['nome'].'">
                <h4>'.$tenis['nome'].'</h4>
                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p>'.$tenis['preco'].'</p>
            </div>
            ';
        }
        ?>
    </div>

    <div id="cat-2" class="row row-2">
        <h2>02. Coleção Retro Basketball</h2>
        <p>Clássicos das quadras.</p>
    </div>

    <div class="row">
        <?php
        $retro = [
            ["id" => 2, "nome" => "Nike Air Force 1 '07", "preco" => "R$ 749,90", "img" => "https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["id" => 3, "nome" => "Air Jordan 1 High OG", "preco" => "R$ 1.599,00", "img" => "https://images.unsplash.com/photo-1556906781-9a412961d28c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["id" => 9, "nome" => "Adidas Forum Low", "preco" => "R$ 699,90", "img" => "https://images.unsplash.com/photo-1620794341491-76be6eeb6946?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["id" => 10, "nome" => "New Balance 550", "preco" => "R$ 899,90", "img" => "https://images.unsplash.com/photo-1512374382149-233c42b6a83b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"]
        ];

        foreach ($retro as $tenis) {
            echo '
            <div class="col-4" onclick="window.location.href=\'produto.php?id='.$tenis['id'].'\'" style="cursor: pointer;">
                <img src="'.$tenis['img'].'" alt="'.$tenis['nome'].'">
                <h4>'.$tenis['nome'].'</h4>
                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p>'.$tenis['preco'].'</p>
            </div>';
        }
        ?>
    </div>

    <div id="cat-3" class="row row-2">
        <h2>03. Linha Skateboarding & Casual</h2>
        <p>Resistência e estilo.</p>
    </div>

    <div class="row">
        <?php
        $skate = [
            ["id" => 11, "nome" => "Reebok Club C 85 Vintage", "preco" => "R$ 449,90", "img" => "https://images.unsplash.com/photo-1608231387042-66d1773070a5?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["id" => 12, "nome" => "Nike Air Max 90 Infra", "preco" => "R$ 749,90", "img" => "https://images.unsplash.com/photo-1543508282-6319a3e2621f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["id" => 4, "nome" => "Vans Old Skool Pro", "preco" => "R$ 399,90", "img" => "https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["id" => 13, "nome" => "Puma Suede Classic XXI", "preco" => "R$ 399,90", "img" => "https://images.unsplash.com/photo-1597045566677-8cf032ed6634?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"]
        ];

        foreach ($skate as $tenis) {
            echo '
            <div class="col-4" onclick="window.location.href=\'produto.php?id='.$tenis['id'].'\'" style="cursor: pointer;">
                <img src="'.$tenis['img'].'" alt="'.$tenis['nome'].'">
                <h4>'.$tenis['nome'].'</h4>
                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                </div>
                <p>'.$tenis['preco'].'</p>
            </div>';
        }
        ?>
    </div>

    <div class="page-btn">
        <span onclick="window.location.href='#cat-1'">1</span>
        <span onclick="window.location.href='#cat-2'">2</span>
        <span onclick="window.location.href='#cat-3'">3</span>
        <span>&#8594;</span>
    </div>

</div>

<?php include 'footer.php'; ?>