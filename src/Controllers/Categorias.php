<?php
    require_once "../Database/db-connection.php";
    require_once "../Database/database.php";

    $category_name = $_POST['nome-categoria'];
    $category_id = $_POST['id-categoria'];

    if (!empty($category_name)) {
        if (!category_exists($connection, $table_categories, $category_name) && empty($category_id)){
            register_category($connection, $table_categories, $category_name);
        } else{
            update_category($connection, $table_categories, $category_id, $category_name);
        }
    }
?>