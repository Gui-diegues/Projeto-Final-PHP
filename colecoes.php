<?php 
    $titulo = "Coleções | JSON CALÇADOS";
    $pagina_atual = "colecoes";
    include 'header.php'; 
?>

<style>
    /* Ajuste de espaçamento para os títulos das seções */
    .row-2 { margin-top: 50px; border-bottom: 2px solid #f1f1f1; padding-bottom: 10px; margin-bottom: 20px;}
    .rating .fa { color: #ff523b; }
</style>

<div class="small-container">

    <div class="row row-2">
        <h2>Coleção Performance</h2>
        <p>Tecnologia para ir mais longe.</p>
    </div>

    <div class="row">
        <?php
        $performance = [
            ["nome" => "Nike Air Zoom Alphafly", "preco" => "R$ 1.299,00", "img" => "https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["nome" => "Adidas Ultraboost 22", "preco" => "R$ 999,90", "img" => "https://images.unsplash.com/photo-1584735175097-719d848f8449?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["nome" => "Asics Gel-Nimbus 25", "preco" => "R$ 899,90", "img" => "https://images.unsplash.com/photo-1539185441755-769473a23570?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["nome" => "Mizuno Wave Prophecy", "preco" => "R$ 1.100,00", "img" => "https://images.unsplash.com/photo-1514989940723-e8e51635b782?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"]
        ];

        foreach ($performance as $tenis) {
            echo '
            <div class="col-4">
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

    <div class="row row-2">
        <h2>Coleção Urbana</h2>
        <p>Estilo e atitude para o dia a dia.</p>
    </div>

    <div class="row">
        <?php
        $urbana = [
            ["nome" => "Converse Chuck 70 High", "preco" => "R$ 499,00", "img" => "https://images.unsplash.com/photo-1607522370275-f14206abe5d3?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["nome" => "Vans Old Skool Pro", "preco" => "R$ 399,90", "img" => "https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["nome" => "Adidas Superstar Classic", "preco" => "R$ 449,90", "img" => "https://images.unsplash.com/photo-1605408499391-6368c628ef42?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["nome" => "Nike Air Force 1 Shadow", "preco" => "R$ 799,90", "img" => "https://images.unsplash.com/photo-1552346154-21d32810aba3?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"]
        ];

        foreach ($urbana as $tenis) {
            echo '
            <div class="col-4">
                <img src="'.$tenis['img'].'" alt="'.$tenis['nome'].'">
                <h4>'.$tenis['nome'].'</h4>
                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                </div>
                <p>'.$tenis['preco'].'</p>
            </div>';
        }
        ?>
    </div>

    <div class="row row-2">
        <h2>Edições Limitadas</h2>
        <p>Para quem busca exclusividade.</p>
    </div>

    <div class="row">
        <?php
        $limitadas = [
            ["nome" => "Air Jordan 4 Retro", "preco" => "R$ 1.899,00", "img" => "https://images.unsplash.com/photo-1611510338559-2f463335092c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            ["nome" => "Nike SB Dunk Low Pro", "preco" => "R$ 999,90", "img" => "https://images.unsplash.com/photo-1628253747716-0c4f5c90fdda?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            // IMAGEM DO TRAVIS SCOTT (Mantida)
            ["nome" => "Travis Scott x Jordan", "preco" => "R$ 3.500,00", "img" => "https://images.unsplash.com/photo-1514989940723-e8e51635b782?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"],
            // IMAGEM DO YEEZY 700 V3 CORRIGIDA AQUI:
            ["nome" => "Yeezy 700 V3 Azael", "preco" => "R$ 2.200,00", "img" => "https://images.unsplash.com/photo-1597248881519-db089d3744a5?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"]
        ];

        foreach ($limitadas as $tenis) {
            echo '
            <div class="col-4">
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

</div>

<?php include 'footer.php'; ?>