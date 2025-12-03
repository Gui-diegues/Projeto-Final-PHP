<?php 
    session_start();
    include 'conexao.php'; 

    $mensagem = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // --- PROCESSAMENTO DO CADASTRO ---
        if (isset($_POST['cadastro'])) {
            $nome = $_POST['usuario'];
            $email = $_POST['email']; 
            $senha = $_POST['senha']; 
            
            $check = $pdo->prepare("SELECT id FROM clientes WHERE email = :email");
            $check->bindValue(':email', $email);
            $check->execute();

            if($check->rowCount() > 0){
                 $mensagem = "<span style='color:red; font-size:12px;'>E-mail já cadastrado!</span>";
            } else {
                
                $sql = "INSERT INTO clientes (nome, email, senha) VALUES (:nome, :email, :senha)";
                $stmt = $pdo->prepare($sql);
                
                $stmt->bindValue(':nome', $nome);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':senha', $senha);
                
                if ($stmt->execute()) {
                    $mensagem = "<span style='color:green; font-size:12px;'>Cadastro sucesso! Faça login.</span>";
                } else {
                    $mensagem = "<span style='color:red; font-size:12px;'>Erro ao cadastrar.</span>";
                }
            }
        }

        // --- PROCESSAMENTO DO LOGIN ---
        if (isset($_POST['login'])) {
            $nome = $_POST['usuario'];
            $senha = $_POST['senha'];

            $sql = "SELECT * FROM clientes WHERE nome = :nome AND senha = :senha";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':senha', $senha);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $dados = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['id_cliente'] = $dados['id'];
                
                // Usando a coluna 'nome' para a sessão/localStorage
                $_SESSION['nome_cliente'] = $dados['nome']; 

                echo "<script>
                         localStorage.setItem('usuarioLogado', '" . $dados['nome'] . "');
                         window.location.href = 'index.php';
                       </script>";
            } else {
                $mensagem = "<span style='color:red; font-size:12px;'>Usuário ou senha incorretos.</span>";
            }
        }
    }

    $css_extra = "
    <style>
        .account-page { 
            position: relative; 
            padding: 50px 0; 
            background: radial-gradient(#fff, #f1f1f1); 
            overflow: hidden; 
            min-height: 80vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }
        
        .form-container { 
            background: #fff; 
            width: 350px; 
            height: 550px; 
            position: relative; 
            text-align: center; 
            padding: 20px 0; 
            margin: auto; 
            box-shadow: 0 0 20px 0px rgba(0,0,0,0.1); 
            border-radius: 20px; 
            z-index: 10; 
            overflow: hidden; 
        }

        .form-btn { 
            display: inline-block; 
            margin-bottom: 20px;
        }
        
        .form-btn span { 
            font-weight: bold; 
            padding: 0 10px; 
            color: #555; 
            cursor: pointer; 
            width: 100px; 
            display: inline-block; 
        }
        
        .form-container form { 
            max-width: 300px; 
            padding: 0 20px; 
            position: absolute; 
            top: 180px; 
            transition: transform 1s; 
            width: 100%; 
        }
        
        form input { 
            width: 100%; 
            height: 35px; 
            margin: 10px 0; 
            padding: 0 10px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
        }
        
        form .btn { 
            width: 100%; 
            border: none; 
            cursor: pointer; 
            margin: 10px 0; 
            background: #ff523b; 
            color: #fff; 
            padding: 10px; 
            border-radius: 20px; 
            transition: 0.5s; 
        }
        
        form .btn:hover { background: #563434; }
        
        form a { font-size: 12px; color: #555; text-decoration: none; }
        
        #LoginForm { left: 25px; }
        #RegForm { left: 350px; }
        
        #Indicator { 
            width: 100px; 
            border: none; 
            background: #ff523b; 
            height: 3px; 
            margin-top: 8px; 
            transform: translateX(0px); 
            transition: transform 1s; 
        }

        .promo-text { 
            color: #ff523b; 
            font-size: 13px; 
            font-weight: 600; 
            padding: 0 20px; 
            margin-top: 5px; 
            line-height: 1.4; 
        }
        
        .floating-shoe { 
            position: absolute; 
            width: 180px; 
            opacity: 0.8; 
            z-index: 1; 
            transition: transform 0.5s; 
            filter: drop-shadow(5px 5px 15px rgba(0,0,0,0.2)); 
            pointer-events: none; 
        }
        
        .shoe-1 { top: 10%; left: 5%; transform: rotate(-15deg); }
        .shoe-2 { bottom: 10%; left: 10%; transform: rotate(15deg); }
        .shoe-3 { top: 15%; right: 5%; transform: rotate(15deg); }
        .shoe-4 { bottom: 15%; right: 10%; transform: rotate(-15deg); }
        
        @media only screen and (max-width: 800px) { 
            .floating-shoe { display: none; } 
        }
    </style>";

    $titulo = "Minha Conta | JSON CALÇADOS";
    $pagina_atual = "conta";
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

        <div style="height: 20px; margin-top: 10px;">
            <?= $mensagem ?>
        </div>

        <form id="LoginForm" method="POST">
            <input type="text" name="usuario" placeholder="Nome de Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit" name="login" class="btn">Entrar</button>
            <a href="">Esqueceu a senha?</a>
        </form>

        <form id="RegForm" method="POST">
            <input type="text" name="usuario" placeholder="Nome de Usuário" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit" name="cadastro" class="btn">Cadastrar</button>
        </form>

    </div>
</div>

<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

    function register() {
        // Assume que 325px é o deslocamento necessário para centralizar
        RegForm.style.transform = "translateX(-325px)"; 
        LoginForm.style.transform = "translateX(-325px)";
        Indicator.style.transform = "translateX(100px)";
    }

    function login() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(0px)";
    }
</script>

<?php include 'footer.php'; ?>