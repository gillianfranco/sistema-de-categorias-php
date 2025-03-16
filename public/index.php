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
        <h1 class="titulo-pagina">Registro de Produtos</h1>
        <div class="form-container">
            <div class="campo-form">
                <label for="input-nome-produto">Produto</label>
                <input type="text" placeholder="Digite o nome do produto" name="nome-produto" id="input-nome-produto" required autocomplete="off">
            </div>
            <div class="campo-form">
                <label for="input-qtde-produto">Quantidade</label>
                <input type="number" placeholder="Digite a quantidade de unidades" name="qtde-produto" id="input-qtde-produto" required autocomplete="off">
            </div>
            <div class="campo-form">
                <label for="input-categoria-produto">Categoria</label>
                <select name="categoria-produto" id="input-categoria-produto" required autocomplete="off">
                    <option value="" disabled selected>Selecione a Categoria</option>
                    <?php
                        $sql = "SELECT * FROM `$table_categories`";
                        $result = mysqli_query($connection, $sql);

                        while ($category = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo strtolower($category['id']); ?>"><?php echo $category['nome']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="botoes">
            <a href="criar-categoria.php" id="criar-categoria">Criar Nova Categoria</a>
            <a href="" id="visualizar-produtos">Visualizar os Produtos</a>
            <button type="button" id="registrar-produto">Registrar Produto</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>
</html>