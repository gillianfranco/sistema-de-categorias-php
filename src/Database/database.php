<?php
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

    function register_product($conn, $table_name, $product_name, $amount=0, $id_category){
        $sql = "INSERT INTO $table_name (nome, unidades, id_categoria) VALUES ('" . cleanString($product_name) . "', $amount, $id_category)";

        $register = mysqli_query($conn, $sql);

        if(!$register){
            die("Falha ao registrar o produto: " . mysqli_error($conn));
        }
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
?>