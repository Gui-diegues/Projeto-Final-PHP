<?php 
    include 'conexao.php';

    $titulo = "JSON CALÇADOS | Sneakers & Streetwear";
    $pagina_atual = "home";
    include 'header.php'; 
?>

<div class="row">
    <div class="col-2">
        <h1>Sua Jornada <br>Começa Pelos Pés!</h1>
        <p>Não é apenas sobre caminhar. É sobre deixar sua marca no mundo.<br>Descubra a fusão perfeita entre conforto, custo benefício e estilo.</p>
        <a href="lancamentos.php" class="btn">Ver Coleção Nova &#8594;</a>
    </div>

    <div class="col-2">
        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80" alt="Nike Vermelho Destaque">
    </div>
</div>

</div> 
</div>

<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="https://images.unsplash.com/photo-1552346154-21d32810aba3?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Categoria Running">
                <h3>Tênis de corrida</h3>
            </div>

            <div class="col-3">
                <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Categoria Streetwear">
                <h3>Moderno Urbano</h3>
            </div>

            <div class="col-3">
                <img src="https://images.unsplash.com/photo-1600185365926-3a2ce3cdb9eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Categoria Casual">
                <h3>Clássicos atemporais</h3>
            </div>
        </div>
    </div>
</div>

<div class="small-container">
    <h2 class="title">Mais Vendidos da Semana</h2>

    <div class="row">
        <?php
        try {
            $sql = "SELECT * FROM produtos LIMIT 4";
            $stmt = $pdo->query($sql);
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($produtos) > 0) {
                foreach ($produtos as $item) {
                    $precoFormatado = number_format($item['preco'], 2, ',', '.');
                    $imagem = !empty($item['img']) ? $item['img'] : 'https://via.placeholder.com/300';
                    $nome = $item['nome'];
                    $id = $item['id'];

                    echo "
                    <div class='col-4' onclick=\"window.location.href='produto.php?id=$id'\" style='cursor: pointer;'>
                        <img src='$imagem' alt='$nome'>
                        <h4>$nome</h4>
                        
                        <div class='rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        
                        <p>R$ $precoFormatado</p>
                    </div>";
                }
            } else {
                echo "<p style='text-align:center; width:100%;'>Nenhum produto cadastrado ainda.</p>";
            }
        } catch (Exception $e) {
            echo "<p style='text-align:center; width:100%; color:red;'>Erro ao carregar produtos. Verifique se a tabela 'produtos' existe e tem itens.</p>";
        }
        ?>
    </div>
</div>

<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="https://images.unsplash.com/photo-1608667508764-33cf0726b13a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="offer-img" alt="Yeezy 700 Wave">
            </div>

            <div class="col-2">
                <p>Linha feminina disponível só na JSON CALÇADOS</p>
                <h1>Yeezy Boost 700 "Wave"</h1>
                <small>O design moderno que redefiniu a moda urbana nos anos 90. Solado com tecnologia Boost para melhorar o seu dia a dia a um palmo de distância.</small>
                <br>
                <a href="produto.php?id=5" class="btn">Comprar Agora &#8594;</a>
            </div>
        </div>
    </div>
</div>

<div class="testimonial">
    <div class="small-container">

        <h2 class="title">Como foram as experiências de nossos últimos clientes</h2>

        <div class="row">

            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>"Comprei esse tênis para usar no trajeto da faculdade, já que eu ando bastante lá, e eles são muito bons, confortáveis, amortecedor é bom e são fáceis de colocar ou tirar. Vale super a pena."</p>

                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>

                <img src="https://scontent.fjpa1-1.fna.fbcdn.net/v/t39.30808-6/510974862_24180971788182542_4597947759565162940_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=a5f93a&_nc_ohc=AHYBt6gixQkQ7kNvwHNHetp&_nc_oc=AdnBUcho99Y81yHla4L1jM0Es_B4zbvKTMs_evIiPXq_-4y-etrjPF0BKcuAvFKn0DK5utrbzFaHLLLvpt3QdueI&_nc_zt=23&_nc_ht=scontent.fjpa1-1.fna&_nc_gid=hcT8fQWEYcvC6zxB32XPAw&oh=00_AflEMyUF5N46fZqsi8CADqhHzN-lvBat_6YHHICfu7rI2A&oe=6935F5D0" alt="Julia">
                <h3>Ionara Sarai</h3>
            </div>

            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>"O sapato é extremamente confortável. O material é bom, o custo benefício é ótimo e o tamanho indicado na descrição bateu certinho. Meus treinos melhoraram 100%."</p>

                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                </div>

                <img src="https://media.licdn.com/dms/image/v2/D4D03AQGObCSg2zjQuA/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1687782388636?e=2147483647&v=beta&t=EMyyG9qmIPnB_eAVDvLoOEd85u0R1QpnBpBoECvQ9VA" alt="Ricardo">
                <h3>Daniel Brandão</h3>
            </div>

            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>"Fico deveras impressionado com o esmero deste calçado, que remete aos áureos tempos dos velhos mestres sapateiros. Recebam meus sinceros cumprimentos pela fidalguia do produto"</p>

                <div class="rating">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>

                <img src="https://media.licdn.com/dms/image/v2/C4E03AQGKiRvuHb-V6w/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1627990737248?e=2147483647&v=beta&t=Nt4WQVVo1PM0G2r10ZyyuqvNISEnp-pgOXR6RiYJ2vA" alt="Roberto">
                <h3>Jadilson Paiva</h3>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>