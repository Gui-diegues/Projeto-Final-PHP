<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0,
    }
    form {
        background: #fff;
        padding: 20px;
        width: 350px;
        margin: auto;
        border-radius: 8px;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 20px;
    }

    h2 {
        text-align: center;
        margin-top: 0px;
        padding: 0;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    input   {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        margin-top: 15px;
        width: 100%;
        padding: 10px;
        background-color: #ff523b;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #f62307ff;
    }
</style>
<body>
    <h2>Cadastro de Venda</h2>
    <form action="?pg=vendas_cadastro" method="post">
        <label>Nome do produto:</label>
        <input type="text" name="produto"><br>
        <label>Quantidade:</label>
        <input type="number" name="quantidade"><br> 
        <label>Valor:</label>
        <input type="number" name="valor"><br>
        <input type="submit" value="Cadastrar venda"> 
         
    </form>
</body>
</html> 