<?php 
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
    </div> <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="https://images.unsplash.com/photo-1552346154-21d32810aba3?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Categoria Running">
                    <h3>Tênis de corrida</h3>
                </div>
                <div class="col-3">
                    <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Categoria Streetwear">
                    <h3>Estilo Urbano</h3>
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
            // Lista de produtos em destaque na Home
            // Note que adicionei o "id" para funcionar com a página produto.php
            $destaques = [
                [
                    "id" => 1, 
                    "nome" => "Nike Air Zoom Pegasus", 
                    "preco" => "R$ 599,90", 
                    "img" => "https://images.unsplash.com/photo-1491553895911-0055eca6402d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                    "nota" => 5
                ],
                [
                    "id" => 2,
                    "nome" => "Nike Air Force 1 '07", 
                    "preco" => "R$ 749,90", 
                    "img" => "https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                    "nota" => 5
                ],
                [
                    "id" => 3,
                    "nome" => "Jordan 1 Retro High", 
                    "preco" => "R$ 1.299,00", 
                    "img" => "https://images.unsplash.com/photo-1560769629-975ec94e6a86?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                    "nota" => 5
                ],
                [
                    "id" => 4,
                    "nome" => "Vans Old Skool Classic", 
                    "preco" => "R$ 399,90", 
                    "img" => "https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                    "nota" => 4
                ]
            ];

            foreach ($destaques as $item) {
                // O onclick aqui faz o redirecionamento mágico para a página de detalhes
                echo '
                <div class="col-4" onclick="window.location.href=\'produto.php?id='.$item['id'].'\'" style="cursor: pointer;">
                    <img src="'.$item['img'].'" alt="'.$item['nome'].'">
                    <h4>'.$item['nome'].'</h4>
                    
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        ';
                        
                        if($item['nota'] == 5) {
                            echo '<i class="fa fa-star"></i>';
                        } else {
                            echo '<i class="fa fa-star-half-o"></i>';
                        }

                echo '
                    </div>
                    
                    <p>'.$item['preco'].'</p>
                </div>';
            }
            ?>
        </div>
    </div>

    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="https://images.unsplash.com/photo-1608667508764-33cf0726b13a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8eWVlenklMjA3MDB8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" class="offer-img" alt="Yeezy 700 Wave">
                </div>
                <div class="col-2">
                    <p>Disponível Exclusivamente na Json Calçados</p>
                    <h1>Yeezy Boost 700 "Wave"</h1>
                    <small>O design Wuppie que redefiniu a moda urbana nos anos 90. Solado com tecnologia Boost encapsulada para conforto extremo.</small>
                    <br>
                    <a href="" class="btn">Comprar Agora &#8594;</a>
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
                    <p>"Comprei esse tênis para usar no trabalho, já que eu ando bastante lá, e eles são muito bons, confortáveis, amortecedor é bom e são fáceis de colocar ou tirar. Vale super a pena."</p>
                    <div class="rating">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                    <img src="https://scontent.fjpa1-1.fna.fbcdn.net/v/t39.30808-6/465042387_8844839832228195_199461304037484210_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=zRSJkq-FWlQQ7kNvwHdUDPc&_nc_oc=Adm7xpkndquMfs_3NSEZx_Jg4ZCcnMDDsZVTmlavgtspu93Ur87Cu8jVHVwgjwWUIJmVH4QTXIaV6vPxYNmBE0Mu&_nc_zt=23&_nc_ht=scontent.fjpa1-1.fna&_nc_gid=Jqzug1rTLkju9rq3Va8Mqw&oh=00_AfjutSS8bjZnq-Bo09x-dMrjsxDql9AQqgddOtXZBCitpQ&oe=692F9129" alt="Carlos">
                    <h3>Carlos Herriot</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>"Este tênis é extremamente confortável. O material é bom, o custo benefício é ótimo e o tamanho indicado na descrição bateu certinho. Meus treinos melhoraram 100%."</p>
                    <div class="rating">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="https://media.licdn.com/dms/image/v2/D4D03AQGObCSg2zjQuA/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1687782388636?e=2147483647&v=beta&t=EMyyG9qmIPnB_eAVDvLoOEd85u0R1QpnBpBoECvQ9VA" alt="Daniel">
                    <h3>Daniel Brandão</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>"Fico deveras impressionado com o esmero deste calçado, que remete aos áureos tempos dos velhos mestres sapateiros. Recebam meus sinceros cumprimentos pela fidalguia do produto"</p>
                    <div class="rating">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                    <img src="https://media.licdn.com/dms/image/v2/C4E03AQGKiRvuHb-V6w/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1627990737248?e=2147483647&v=beta&t=Nt4WQVVo1PM0G2r10ZyyuqvNISEnp-pgOXR6RiYJ2vA" alt="Jadilson">
                    <h3>Jadilson Paiva</h3>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>