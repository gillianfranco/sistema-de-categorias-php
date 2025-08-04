<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Sistema de Categorias</title>
</head>
<body>
    <div class="main">
        <h1 class="title-page">Criação de Categoria</h1>
        <div class="form-container">
            <div class="field-form">
                <label for="input-category_name">Categoria</label>
                <input type="text" placeholder="Digite o nome da categoria" name="category_name" id="input-category_name" required autocomplete="off">
            </div>
        </div>
        <div class="btns">
            <a href="<?= url("/")?>">Voltar</a>
            <button id="create-category">Criar Categoria</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>
</html>