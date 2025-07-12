<?php
    // Limpa String

    function cleanString($str){
        return str_replace(str_split(",.|/\\()*&^%$#@!?><{}[]_+="), "", strtr(trim(strtolower($str)), " ", "-"));
    }
    
    // Registro de Categorias

    function register_category($conn, $table_name, $category_name) {
        $sql = "INSERT INTO $table_name (nome, qtde_produtos) VALUES ('" . cleanString($category_name) . "', 0)";

        $register = mysqli_query($conn, $sql);

        if(!$register){
            die("Falha ao registrar a categoria: " . mysqli_error($conn));
        }
    }

    // Verifica se a categoria existe

    function category_exists($conn, $table_name, $category_name) {
        $sql = "SELECT * FROM $table_name WHERE nome = '" . cleanString($category_name) . "'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return true;
        }

        return false;
    }

    // Registro de Produtos

    function register_product($conn, $category_table, $product_table, $product_name, $amount=0, $id_category){
        $sql = "INSERT INTO $product_table (nome, unidades, id_categoria) VALUES ('" . cleanString($product_name) . "', $amount, $id_category)";

        $register = mysqli_query($conn, $sql);

        if(!$register){
            die("Falha ao registrar o produto: " . mysqli_error($conn));
        }

        update_productsCategory($conn, $id_category, $category_table, $product_table);
    }

    // Verifica se o produto existe

    function product_exists($conn, $table_name, $product_name){
        $sql = "SELECT * FROM $table_name WHERE nome = '" . cleanString($product_name) . "'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return true;
        }

        return false;
    }

    // Verifica se há categoria cadastrada

    function hasCategories($conn, $table_name){
        $sql = "SELECT 1 FROM $table_name LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return true;
        }

        return false;
    }

    // Atualiza quantidade de produtos da categoria

    function update_productsCategory($conn, $id_category, $category_table, $product_table) {
        $sql_products = "SELECT * FROM $product_table WHERE id_categoria = $id_category";
        $products = mysqli_query($conn, $sql_products);

        $products_sum = 0;

        while ($product = mysqli_fetch_array($products)) {
            $products_sum += $product['unidades'];
        }

        $sql_category = "UPDATE $category_table SET qtde_produtos = $products_sum WHERE id = $id_category";

        $update = mysqli_query($conn, $sql_category);

        if (!$update){
            die("Falha ao atualizar a quantidade de produtos da categoria" . mysqli_error($conn));
        }
    }
?>