<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($titulo) ? $titulo : "JSON CALÇADOS"; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <?php if(isset($css_extra)) echo $css_extra; ?>

    <style>
        .top-banner {
            background-color: #ff523b;
            color: #fff;
            text-align: center;
            padding: 8px 0;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

    <div class="top-banner">
        FRETE GRÁTIS PARA TODO BRASIL EM COMPRAS ACIMA DE R$ 299 &nbsp;|&nbsp; USE O CUPOM: <strong>JSON20</strong>
    </div>

    <div class="<?php echo ($pagina_atual == 'home') ? 'header' : 'container'; ?>">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php" style="text-decoration: none;">
                        <h2 style="color: #333; font-weight: bold;"> JSON <span style="color: #ff523b;"> CALÇADOS </span></h2>
                    </a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="lancamentos.php" style="<?php if($pagina_atual == 'lancamentos') echo 'color: #ff523b;'; ?>">Lançamentos</a></li>
                        <li><a href="colecoes.php" style="<?php if($pagina_atual == 'colecoes') echo 'color: #ff523b;'; ?>">Coleções</a></li>
                        <li><a href="conta.php" style="<?php if($pagina_atual == 'conta') echo 'color: #ff523b;'; ?>">Conta</a></li>
                        <li><a href="pedidos.php" style="<?php if($pagina_atual == 'pedidos') echo 'color: #ff523b;'; ?>">Meus Pedidos</a></li>
                    </ul>
                </nav>
                <a href="carrinho.php"><img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" width="30px" height="30px" alt="Carrinho"></a>
                <img src="https://i.ibb.co/6XbqwjD/menu.png" class="menu-icon" onclick="menutoggle()" alt="Menu">
            </div>
            
            <?php if($pagina_atual != 'home') echo "</div></div>"; ?>