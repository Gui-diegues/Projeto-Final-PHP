<?php 
    $titulo = "Minha Conta | JSON CALÇADOS";
    $pagina_atual = "conta";
    
    // CSS Específico desta página (guardado na variável para o header imprimir)
    $css_extra = "
    <style>
        .account-page { position: relative; padding: 50px 0; background: radial-gradient(#fff, #f1f1f1); overflow: hidden; min-height: 80vh; display: flex; align-items: center; justify-content: center; }
        .form-container { background: #fff; width: 350px; height: 480px; position: relative; text-align: center; padding: 20px 0; margin: auto; box-shadow: 0 0 20px 0px rgba(0,0,0,0.1); border-radius: 20px; z-index: 10; overflow: hidden; }
        .promo-text { color: #ff523b; font-size: 13px; font-weight: 600; padding: 0 20px; margin-top: 15px; line-height: 1.4; }
        .floating-shoe { position: absolute; width: 180px; opacity: 0.8; z-index: 1; transition: transform 0.5s; filter: drop-shadow(5px 5px 15px rgba(0,0,0,0.2)); pointer-events: none; }
        .shoe-1 { top: 10%; left: 5%; transform: rotate(-15deg); }
        .shoe-2 { bottom: 10%; left: 10%; transform: rotate(15deg); }
        .shoe-3 { top: 15%; right: 5%; transform: rotate(15deg); }
        .shoe-4 { bottom: 15%; right: 10%; transform: rotate(-15deg); }
        @media only screen and (max-width: 800px) { .floating-shoe { display: none; } }
    </style>";

    include 'header.php'; 
?>

<div class="account-page">
    
    
    <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="floating-shoe shoe-1" alt="Tênis Decorativo">
    
    <img src="https://images.unsplash.com/photo-1560769629-975ec94e6a86?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="floating-shoe shoe-2" alt="Tênis Decorativo">
    
    <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="floating-shoe shoe-3" alt="Tênis Decorativo">
    
    <img src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="floating-shoe shoe-4" alt="Tênis Decorativo">

    <div class="form-container">
        <div class="form-btn">
            <span onclick="login()">Entrar</span>
            <span onclick="register()">Cadastro</span>
            <hr id="Indicator">
        </div>

        <p class="promo-text">
            <i class="fa fa-gift"></i> Clientes cadastrados ganham um 
            <br>cupom de <strong>20% OFF</strong> na primeira compra 
            <br>+ <strong>Entrega Grátis!</strong>
        </p>

        <form id="LoginForm">
            <input type="text" placeholder="Nome de Usuário">
            <input type="password" placeholder="Senha">
            <button type="submit" class="btn">Entrar</button>
            <a href="">Esqueceu a senha?</a>
        </form>

        <form id="RegForm">
            <input type="text" placeholder="Nome de Usuário">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Senha">
            <button type="submit" class="btn">Cadastrar</button>
        </form>

    </div>
</div>

<?php include 'footer.php'; ?>