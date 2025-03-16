<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Sistema de Categorias</title>
</head>
<body>
    <?php
        require_once "../src/Database/db-connection.php";
    ?>
    <div class="main">
        <h1 class="titulo-pagina">Criação de Categoria</h1>
        <div class="form-container">
            <div class="campo-form">
                <label for="input-nome-categoria">Categoria</label>
                <input type="text" placeholder="Digite o nome da categoria" name="nome-categoria" id="input-nome-categoria" required autocomplete="off">
            </div>
        </div>
        <div class="botoes">
            <a href="index.php" id="criar-categoria">Voltar</a>
            <button id="criar-categoria">Criar Categoria</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>
</html>