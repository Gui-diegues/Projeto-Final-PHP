<?php 
    include 'conexao.php';
    $titulo = "Lançamentos | JSON CALÇADOS";
    $pagina_atual = "lancamentos";
    include 'header.php'; 
?>

<style>
    html { scroll-behavior: smooth; }
    .row-2 { margin-top: 50px; border-bottom: 2px solid #f1f1f1; padding-bottom: 10px; margin-bottom: 20px;}
    .rating .fa { color: #ff523b; }
</style>

<div class="small-container">
    
    <!-- SEÇÃO 01: LANÇAMENTOS -->
    <div id="cat-1" class="row row-2">
        <h2>01. Lançamentos (Janeiro/25)</h2>
        <select onchange="location = this.value;">
            <option>Filtrar Visualização</option>
            <option value="lancamentos.php">Padrão</option>
        </select>
    </div>

    <div class="row">
        <?php
        // Seleciona exatamente os IDs que você usou na seção 1
        $sql1 = "SELECT * FROM produtos WHERE id IN (5, 6, 7, 8)";
        $stmt1 = $pdo->query($sql1);
        $drops = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        foreach ($drops as $tenis) {
            $preco = number_format($tenis['preco'], 2, ',', '.');
            echo '
            <div class="col-4" onclick="window.location.href=\'produto.php?id='.$tenis['id'].'\'" style="cursor: pointer;">
                <img src="'.$tenis['img'].'" alt="'.$tenis['nome'].'">
                <h4>'.$tenis['nome'].'</h4>
                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p>R$ '.$preco.'</p>
            </div>
            ';
        }
        ?>
    </div>

    <!-- SEÇÃO 02: RETRO BASKETBALL -->
    <div id="cat-2" class="row row-2">
        <h2>02. Coleção Retro Basketball</h2>
        <p>Clássicos das quadras.</p>
    </div>

    <div class="row">
        <?php
        // Seleciona exatamente os IDs que você usou na seção 2
        $sql2 = "SELECT * FROM produtos WHERE id IN (2, 3, 9, 10)";
        $stmt2 = $pdo->query($sql2);
        $retro = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        foreach ($retro as $tenis) {
            $preco = number_format($tenis['preco'], 2, ',', '.');
            echo '
            <div class="col-4" onclick="window.location.href=\'produto.php?id='.$tenis['id'].'\'" style="cursor: pointer;">
                <img src="'.$tenis['img'].'" alt="'.$tenis['nome'].'">
                <h4>'.$tenis['nome'].'</h4>
                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p>R$ '.$preco.'</p>
            </div>';
        }
        ?>
    </div>

    <!-- SEÇÃO 03: CASUAL -->
    <div id="cat-3" class="row row-2">
        <h2>03. Linha Casual</h2>
        <p>Estilo no dia a dia.</p>
    </div>

    <div class="row">
        <?php
        // Seleciona exatamente os IDs que você usou na seção 3
        $sql3 = "SELECT * FROM produtos WHERE id IN (11, 12, 4, 13)";
        $stmt3 = $pdo->query($sql3);
        $skate = $stmt3->fetchAll(PDO::FETCH_ASSOC);

        foreach ($skate as $tenis) {
            $preco = number_format($tenis['preco'], 2, ',', '.');
            echo '
            <div class="col-4" onclick="window.location.href=\'produto.php?id='.$tenis['id'].'\'" style="cursor: pointer;">
                <img src="'.$tenis['img'].'" alt="'.$tenis['nome'].'">
                <h4>'.$tenis['nome'].'</h4>
                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                </div>
                <p>R$ '.$preco.'</p>
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