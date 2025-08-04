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
        <h1 class="title-page">Gerenciamento de Categorias</h1>
        <hr style="margin-top: 1em;">
        <div class="table">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Qtde. Produtos</th>
                    <th>Quantia Total</th>
                    <th>Opções</th>
                </thead>
                <tbody style="border-bottom: 1px solid black;">
                    <?php
                        $categories = $data["categories"];

                        foreach($categories as $category){
                    ?>
                    <tr>
                        <td>
                            <p><?= $category["id"] ?></p>
                        </td>
                        <td>
                            <input type="text" name="category-name" id="category-name-<?= $category["id"] ?>" value="<?= $category["nome"] ?>">
                        </td>
                        <td>
                            <p><?= $category["total_estoque"] ?></p>
                        </td>
                        <td>
                            <p>R$ <?= $category["total_dinheiro"] ?></p>
                        </td>
                        <td class="category-edit">
                            <button class="update-category" value="<?= $category["id"] ?>">U</button>
                            <button class="delete-category">D</button>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <hr style="margin-bottom: 1em;">
        <div class="btns">
            <a href="<?= url("/")?>" id="create-category">Voltar</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>
</html>