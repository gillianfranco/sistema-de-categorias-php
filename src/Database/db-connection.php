<?php
    function db_exists($conn, $db_name){
        $sql = "SHOW DATABASES LIKE '$db_name'";
        $result = mysqli_query($conn, $sql);

        if ($result){
            return mysqli_num_rows($result) > 0;
        }

        return false;
    }

    function create_db($conn, $db_name){
        $sql = "CREATE DATABASE $db_name";
        $result = mysqli_query($conn, $sql);
        
        if(!$result) {
            die("Erro na criação do banco de dados: " . mysqli_error($conn));
        }
    }

    // Conexão com o MySQL
    $connection = mysqli_connect("localhost", "root", "");

    if(!$connection) {
        die("A conexão falhou: " . mysqli_connect_error());
    }

    // Criação do banco de dados

    $db_name = "sistema_de_categorias_DB";

    if (!db_exists($connection, $db_name)) {
        create_db($connection, $db_name);
    }

    mysqli_select_db($connection, $db_name); // Seleciona o banco de dados para as próximas consultas

    // Nome das tabelas

    $table_categories = "categorias";
    $table_products = "produtos";
?>