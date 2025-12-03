<?php 
    include 'conexao.php';
    $titulo = "Coleções | JSON CALÇADOS";
    $pagina_atual = "colecoes";
    include 'header.php'; 
?>

<style>
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
        $sql_perf = "SELECT * FROM produtos WHERE id IN (14, 15, 16, 17)";
        $stmt_perf = $pdo->query($sql_perf);
        $performance = $stmt_perf->fetchAll(PDO::FETCH_ASSOC);

        foreach ($performance as $tenis) {
            $preco = number_format($tenis['preco'], 2, ',', '.');
            $img = !empty($tenis['img']) ? $tenis['img'] : 'https://via.placeholder.com/500';

            echo '
            <div class="col-4" onclick="window.location.href=\'produto.php?id='.$tenis['id'].'\'" style="cursor: pointer;">
                <img src="'.$img.'" alt="'.$tenis['nome'].'">
                <h4>'.$tenis['nome'].'</h4>
                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p>R$ '.$preco.'</p>
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
        $sql_urb = "SELECT * FROM produtos WHERE id IN (18, 4, 19, 20)";
        $stmt_urb = $pdo->query($sql_urb);
        $urbana = $stmt_urb->fetchAll(PDO::FETCH_ASSOC);

        foreach ($urbana as $tenis) {
            $preco = number_format($tenis['preco'], 2, ',', '.');
            $img = !empty($tenis['img']) ? $tenis['img'] : 'https://via.placeholder.com/500';

            echo '
            <div class="col-4" onclick="window.location.href=\'produto.php?id='.$tenis['id'].'\'" style="cursor: pointer;">
                <img src="'.$img.'" alt="'.$tenis['nome'].'">
                <h4>'.$tenis['nome'].'</h4>
                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                </div>
                <p>R$ '.$preco.'</p>
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
        $sql_lim = "SELECT * FROM produtos WHERE id IN (21, 22, 23, 24)";
        $stmt_lim = $pdo->query($sql_lim);
        $limitadas = $stmt_lim->fetchAll(PDO::FETCH_ASSOC);

        foreach ($limitadas as $tenis) {
            $preco = number_format($tenis['preco'], 2, ',', '.');
            $img = !empty($tenis['img']) ? $tenis['img'] : 'https://via.placeholder.com/500';

            echo '
            <div class="col-4" onclick="window.location.href=\'produto.php?id='.$tenis['id'].'\'" style="cursor: pointer;">
                <img src="'.$img.'" alt="'.$tenis['nome'].'">
                <h4>'.$tenis['nome'].'</h4>
                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p>R$ '.$preco.'</p>
            </div>';
        }
        ?>
    </div>

</div>

<?php include 'footer.php'; ?>