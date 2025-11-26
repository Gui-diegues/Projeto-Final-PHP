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
        background-color: #4A90E2;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #1354ccff;
    }
</style>
<body>
    <h2>Cadastro de Cliente</h2>

    <form action="?pg=clientes_cadastro" method="post">
        <label>Nome:</label>
        <input type="text" name="cliente"><br>
        <label>Cidade:</label>
        <input type="text" name="cidade"><br> 
        <label>Estado:</label>
        <input type="text" name="estado"><br>
        <input type="submit" value="Cadastrar cliente"> 
         
    </form>
</body>
</html>