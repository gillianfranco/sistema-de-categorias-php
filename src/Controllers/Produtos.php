<?php
    require_once "../Database/db-connection.php";
    require_once "../Database/database.php";

    $product_name = $_POST['nome-produto'];
    $amount = $_POST['qtde-produto'];
    $id_category = $_POST['id-categoria'];

    if (!empty($product_name) && !empty($id_category)){
        if (!table_exists($connection, $table_products)){
            create_product_table($connection, $table_products);
        }

        register_produtct($connection, $table_products, $product_name, $amount, $id_category);
    }

    mysqli_close($connection);
?>