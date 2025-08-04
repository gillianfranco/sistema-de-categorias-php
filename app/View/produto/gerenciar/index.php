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
        require_once "../src/Database/database.php";
    ?>
    <div class="main">
        <h1 class="titulo-pagina">Gerenciamento de Produtos</h1>
        <hr style="margin-top: 1em;">
        <div class="table">
            <table id="table-categories">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Qtde. Produtos</th>
                    <th></th>
                </thead>
                <tbody style="border-bottom: 1px solid black;">
                    <?php
                        $sql = "SELECT * FROM $table_categories";
                        $categories = mysqli_query($connection, $sql);

                        while ($category = mysqli_fetch_array($categories)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $category['id'];?>
                        </td>
                        <td>
                            <?php echo $category['nome'];?>
                        </td>
                        <td>
                            <?php echo $category['qtde_produtos'];?>
                        </td>
                        <td class="container-view">
                            <button class="view-products" value="<?php echo $category['id'];?>">Visualizar Produtos</button>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <table id="table-products">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Unidades</th>
                </thead>
                <tbody style="border-bottom: 1px solid black;">
                    <?php
                        require_once "../src/Controllers/Produtos.php";

                        // $id_category = $_POST['id-categoria'];
                        // $id_category = 1;

                        $sql = "SELECT * FROM $table_products WHERE id_categoria = '$id_category'";
                        $products = mysqli_query($connection, $sql);

                        while ($product = mysqli_fetch_array($products)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $product['id'];?>
                        </td>
                        <td>
                            <input type="text" name="nome-produto" id="product-name-<?php echo $id_category;?>" value="<?php echo $product['nome'];?>">
                        </td>
                        <td>
                            <?php echo $product['unidades'];?>
                        </td>
                        <td class="category-edit">
                            <button class="update-category" value="<?php echo $id_category;?>">U</button>
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
        <div class="botoes">
            <a href="index.php">Voltar</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>
</html>