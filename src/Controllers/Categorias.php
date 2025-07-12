<?php
    require_once "../Database/db-connection.php";
    require_once "../Database/database.php";

    $category_name = $_POST['nome-categoria'];

    if (!empty($category_name)) {
        if (!category_exists($connection, $table_categories, $category_name)){
            register_category($connection, $table_categories, $category_name);
        }
    }

    mysqli_close($connection);