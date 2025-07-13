<?php
    require_once "../Database/db-connection.php";
    require_once "../Database/database.php";

    $product_name = $_POST['nome-produto'];
    $amount = $_POST['qtde-produto'];
    $id_category = $_POST['id-categoria'];

    if (!empty($product_name) && !empty($id_category)){
        if (!product_exists($connection, $table_products, $product_name)){
            register_product($connection, $table_categories, $table_products, $product_name, $amount, $id_category);
        }
    }
?>