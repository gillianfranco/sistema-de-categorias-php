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
    ?>
    <div class="main">
        <h1 class="title-page">Registro de Produtos</h1>
        <div class="form-container">
            <div class="field-form">
                <label for="input-product-name">Produto</label>
                <input type="text" placeholder="Digite o nome do produto" name="product-name" id="input-product-name" required autocomplete="off">
            </div>
            <div class="field-form">
                <label for="input-product-category">Categoria</label>
                <select name="product-category" id="input-product-category" required autocomplete="off">
                    <option value="" disabled selected>Selecione a Categoria</option>
                    <?php
                        $categories = $data["categories"];

                        foreach($categories as $category){
                    ?>
                    <option value="<?= $category["id"] ?>"><?= $category["nome"] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="field-form">
                <label for="input-price">Preço</label>
                <input type="number" placeholder="Digite o Preço do Produto" name="price" id="input-price" required autocomplete="off">
            </div>
            <div class="field-form">
                <label for="input-amount-product">Quantidade</label>
                <input type="number" placeholder="Digite a quantidade de unidades" name="amount-product" id="input-amount-product" required autocomplete="off">
            </div>
        </div>
        <div class="btns">
            <a href="<?= url("/categoria/gerenciar") ?>" id="manager-category">Gerenciar Categorias</a>
            <a href="<?= url("/categoria/criar") ?>" id="create-category">Criar Nova Categoria</a>
            <a href="<?= url("/produto/gerenciar") ?>" id="manager-products">Gerenciar Produtos</a>
            <button type="button" id="create-product">Registrar Produto</button>
        </div>
    </div>
    <?php 
        if (count($categories) > 0) {
        echo "<script>document.getElementById('create-product').disabled = false;</script>";
        } else {
            echo "<script>
                const btn = document.getElementById('create-product');
                btn.disabled = true;
                btn.style.backgroundColor = 'gray';
            </script>";
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>